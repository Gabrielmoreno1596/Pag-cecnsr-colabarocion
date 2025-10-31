<?php
header('Content-Type: application/json; charset=UTF-8');
require __DIR__ . '/config.mail.php';

require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';
require __DIR__ . '/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Polyfill para PHP < 8 (evita fatal con str_ends_with)
if (!function_exists('str_ends_with')) {
    function str_ends_with($haystack, $needle)
    {
        if ($needle === '') return true;
        $len = strlen($needle);
        return substr($haystack, -$len) === $needle;
    }
}

session_start();
$now = time();
// ↓ Baja el rate-limit para pruebas
if (!empty($_SESSION['last_submit']) && ($now - $_SESSION['last_submit'] < 15)) {
    http_response_code(429);
    echo json_encode(['ok' => false, 'msg' => 'Espera 5 segundos antes de otro envío.']);
    exit;
}

function clean($v)
{
    return trim(filter_var($v, FILTER_UNSAFE_RAW));
}

// === Campos ===
$honeypot = $_POST['website'] ?? '';
$nombre   = clean($_POST['nombre_encargado'] ?? '');
$tel      = clean($_POST['telefono'] ?? '');
$correo   = clean($_POST['correo'] ?? '');
$grado    = clean($_POST['grado_interes'] ?? '');
$consulta = clean($_POST['consulta'] ?? '');

// === Validaciones básicas ===
if ($honeypot !== '') {
    http_response_code(400);
    echo json_encode(['ok' => false, 'msg' => 'Error de validación.']);
    exit;
}
if ($nombre === '' || $tel === '' || !filter_var($correo, FILTER_VALIDATE_EMAIL) || $grado === '') {
    http_response_code(400);
    echo json_encode(['ok' => false, 'msg' => 'Por favor completa los campos obligatorios.']);
    exit;
}

// === reCAPTCHA v2 ===
if (RECAPTCHA_ENABLED) {
    $resp = $_POST['g-recaptcha-response'] ?? '';
    if (!$resp) {
        http_response_code(400);
        echo json_encode(['ok' => false, 'msg' => 'Por favor marca el reCAPTCHA.']);
        exit;
    }
    $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query([
            'secret'   => RECAPTCHA_SECRET_KEY,
            'response' => $resp,
            'remoteip' => $_SERVER['REMOTE_ADDR'] ?? ''
        ]),
    ]);
    $result = curl_exec($ch);
    curl_close($ch);
    if ($result === false || empty(json_decode($result, true)['success'])) {
        http_response_code(400);
        echo json_encode(['ok' => false, 'msg' => 'Validación reCAPTCHA inválida. Intenta de nuevo.']);
        exit;
    }
}

// === Cuerpos ===
$nombreHtml   = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
$telHtml      = htmlspecialchars($tel,   ENT_QUOTES, 'UTF-8');
$correoHtml   = htmlspecialchars($correo, ENT_QUOTES, 'UTF-8');
$gradoHtml    = htmlspecialchars($grado, ENT_QUOTES, 'UTF-8');
$consultaHtml = nl2br(htmlspecialchars($consulta, ENT_QUOTES, 'UTF-8'));

$subject = 'Nueva solicitud de admisión desde la web';
$bodyHtml = "
  <h2>Nueva solicitud de admisión</h2>
  <p><strong>Nombre del encargado:</strong> {$nombreHtml}</p>
  <p><strong>Teléfono:</strong> {$telHtml}</p>
  <p><strong>Correo:</strong> {$correoHtml}</p>
  <p><strong>Grado de interés:</strong> {$gradoHtml}</p>
  <p><strong>Consulta:</strong><br>{$consultaHtml}</p>
  <hr><p>Enviado el " . date('Y-m-d H:i:s') . "</p>";
$bodyText = "Nueva solicitud de admisión\nNombre: {$nombre}\nTeléfono: {$tel}\nCorreo: {$correo}\nGrado de interés: {$grado}\nConsulta:\n{$consulta}\n";

// === Bitácora helpers ===
function log_to_csv($row)
{
    if (!LOG_CSV_ENABLED) return;
    $file = LOG_CSV_PATH;
    $dir  = dirname($file);
    if (!is_dir($dir)) @mkdir($dir, 0750, true);
    $isNew = !file_exists($file);
    $fh = @fopen($file, 'a');
    if (!$fh) return;
    if ($isNew) fputcsv($fh, ['fecha_iso', 'ip', 'ua', 'nombre', 'correo', 'telefono', 'grado', 'estado', 'detalle']);
    fputcsv($fh, $row);
    fclose($fh);
}
function log_to_db($data)
{
    if (!LOG_DB_ENABLED) return;
    try {
        $pdo = new PDO(LOG_DB_DSN, LOG_DB_USER, LOG_DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        $sql = "INSERT INTO admisiones_log
      (fecha_iso, ip, ua, nombre, correo, telefono, grado, estado, detalle)
      VALUES (:fecha,:ip,:ua,:nombre,:correo,:tel,:grado,:estado,:detalle)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
    } catch (Exception $e) { /* silencio */
    }
}

$ip    = $_SERVER['REMOTE_ADDR']      ?? '';
$ua    = $_SERVER['HTTP_USER_AGENT']  ?? '';
$fecha = date('c');

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USERNAME;
    $mail->Password   = SMTP_PASSWORD;
    $mail->SMTPSecure = (SMTP_SECURE === 'ssl') ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = SMTP_PORT;

    $mail->CharSet    = 'UTF-8';
    $mail->SMTPDebug  = 0;                 // pon 2 para ver trazas en error_log durante pruebas
    $mail->Debugoutput = 'error_log';

    $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
    $mail->Sender = MAIL_FROM;             // <-- Return-Path/Envelope-From

    $mail->addAddress(MAIL_TO, MAIL_TO_NAME);
    if (MAIL_BCC) $mail->addBCC(MAIL_BCC);

    // (Temporal) NO usar Reply-To del visitante hasta que depuremos del todo
    // $mail->addReplyTo($correo, $nombre);
    // Si quieres poder responder desde el buzón institucional:
    $mail->addReplyTo(MAIL_FROM, MAIL_FROM_NAME);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $bodyHtml;
    $mail->AltBody = $bodyText;

    $mail->send();

    // Autorespuesta (no afecta al envío principal si falla)
    try {
        $auto = new PHPMailer(true);
        $auto->isSMTP();
        $auto->Host       = SMTP_HOST;
        $auto->SMTPAuth   = true;
        $auto->Username   = SMTP_USERNAME;
        $auto->Password   = SMTP_PASSWORD;
        $auto->SMTPSecure = $mail->SMTPSecure;
        $auto->Port       = SMTP_PORT;
        $auto->CharSet    = 'UTF-8';
        $auto->setFrom(MAIL_FROM, MAIL_FROM_NAME);
        $auto->addAddress($correo, $nombre);
        $auto->isHTML(true);
        $auto->Subject = 'Hemos recibido tu solicitud - CECNSR';
        $auto->Body    = "<p>Hola {$nombreHtml},</p><p>Gracias por escribir a Complejo Educativo Católico Nuestra Señora del Rosario. Hemos recibido tu solicitud para <strong>{$gradoHtml}</strong>. Nuestro equipo de admisiones te contactará pronto.</p><p>Saludos,<br>Complejo Educativo Católico Nuestra Señora del Rosario</p>";
        $auto->AltBody = "Hola {$nombre}, hemos recibido tu solicitud para {$grado}.";
        $auto->send();
    } catch (Exception $e) { /* silencio */
    }

    log_to_csv([$fecha, $ip, $ua, $nombre, $correo, $tel, $grado, 'OK', '']);
    log_to_db([':fecha' => $fecha, ':ip' => $ip, ':ua' => $ua, ':nombre' => $nombre, ':correo' => $correo, ':tel' => $tel, ':grado' => $grado, ':estado' => 'OK', ':detalle' => '']);

    $_SESSION['last_submit'] = $now;
    echo json_encode(['ok' => true, 'msg' => '¡Solicitud enviada! Pronto te contactaremos.']);
} catch (Exception $e) {
    // Muestra motivo real
    $err = isset($mail) && !empty($mail->ErrorInfo) ? $mail->ErrorInfo : $e->getMessage();
    log_to_csv([$fecha, $ip, $ua, $nombre, $correo, $tel, $grado, 'ERROR', $err]);
    log_to_db([':fecha' => $fecha, ':ip' => $ip, ':ua' => $ua, ':nombre' => $nombre, ':correo' => $correo, ':tel' => $tel, ':grado' => $grado, ':estado' => 'ERROR', ':detalle' => $err]);
    http_response_code(500);
    echo json_encode(['ok' => false, 'msg' => 'Error SMTP: ' . $err]);
}

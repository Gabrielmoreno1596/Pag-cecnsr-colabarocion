<?php
header('Content-Type: application/json; charset=UTF-8');
require __DIR__ . '/config.mail.php';

require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';
require __DIR__ . '/PHPMailer/src/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;

// Polyfill para PHP < 8 (evita fatal con str_ends_with)
if (!function_exists('str_ends_with')) {
    function str_ends_with($haystack, $needle)
    {
        if ($needle === '') return true;
        $len = strlen($needle);
        return substr($haystack, -$len) === $needle;
    }
}

// Salida JSON robusta
ini_set('display_errors', '0'); // no mezclar errores con JSON
ini_set('log_errors', '1');     // errores a error_log

while (ob_get_level()) {
    ob_end_clean();
} // limpia buffers (BOM/espacios)

function echo_json($payload, int $status = 200)
{
    while (ob_get_level()) {
        ob_end_clean();
    }
    http_response_code($status);
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($payload, JSON_UNESCAPED_UNICODE);
    exit;
}


session_start();
$now = time();
// Rate-limit (15s) — y el mensaje coincide
if (!empty($_SESSION['last_submit']) && ($now - $_SESSION['last_submit'] < 15)) {
    http_response_code(429);
    echo json_encode(['ok' => false, 'msg' => 'Espera 15 segundos antes de otro envío.']);
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
$grado    = clean($_POST['grado_interes'] ?? ($_POST['interes'] ?? ($_POST['grado'] ?? '')));
$consulta = clean($_POST['consulta'] ?? ($_POST['mensaje'] ?? ''));
$canal    = strtolower(trim($_POST['canal'] ?? ''));

$CANAL_MAP = [
    'integracion' => ['to' => 'integracion@cecnsrosariosv.com', 'prefix' => '[Convenio Integración]'],
    'psicologia'  => ['to' => 'programa.pi@cecnsrosariosv.com', 'prefix' => '[Programa Psicología]'],
    'admisiones'  => ['to' => 'contacto@cecnsrosariosv.com', 'prefix' => '[Admisiones]'],
];
if (!isset($CANAL_MAP[$canal])) $canal = 'admisiones';

$destino = $CANAL_MAP[$canal]['to'];
$prefijo = $CANAL_MAP[$canal]['prefix'];
$subject = "{$prefijo} Nueva solicitud desde la web";

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
    $okCaptcha = $result !== false && !empty(json_decode($result, true)['success']);
    if (!$okCaptcha) {
        http_response_code(400);
        echo json_encode(['ok' => false, 'msg' => 'Validación reCAPTCHA inválida. Intenta de nuevo.']);
        exit;
    }
}

// === Cuerpos (escapados) ===
$nombreHtml   = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
$telHtml      = htmlspecialchars($tel,   ENT_QUOTES, 'UTF-8');
$correoHtml   = htmlspecialchars($correo, ENT_QUOTES, 'UTF-8');
$gradoHtml    = htmlspecialchars($grado, ENT_QUOTES, 'UTF-8');
$consultaHtml = nl2br(htmlspecialchars($consulta, ENT_QUOTES, 'UTF-8'));

$bodyHtml = "
  <h2>{$prefijo} Nueva solicitud</h2>
  <p><strong>Canal:</strong> {$canal}</p>
  <p><strong>Nombre del encargado:</strong> {$nombreHtml}</p>
  <p><strong>Teléfono:</strong> {$telHtml}</p>
  <p><strong>Correo:</strong> {$correoHtml}</p>
  <p><strong>Interés/Grado:</strong> {$gradoHtml}</p>
  <p><strong>Consulta:</strong><br>{$consultaHtml}</p>
  <hr><p>Enviado el " . date('Y-m-d H:i:s') . "</p>";

$bodyText = "{$prefijo} Nueva solicitud\n" .
    "Canal: {$canal}\n" .
    "Nombre: {$nombre}\n" .
    "Teléfono: {$tel}\n" .
    "Correo: {$correo}\n" .
    "Interés/Grado: {$grado}\n" .
    "Consulta:\n{$consulta}\n";

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
    } catch (\Throwable $e) { /* silencio */
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
    $mail->SMTPDebug  = 0;           // usa 2 en pruebas para ver trazas en error_log
    $mail->Debugoutput = 'error_log';

    $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
    $mail->Sender = MAIL_FROM;       // Return-Path/Envelope-From

    // Destinatario por canal
    /*   $mail->addAddress($destino, 'CECNSR');
    if (MAIL_BCC) $mail->addBCC(MAIL_BCC); */ // buzón de auditoría (opcional)
    // Destinatario por canal (primario)
    $mail->addAddress($destino, 'CECNSR');

    // SIEMPRE enviar al buzón central configurado en config.mail.php
    if (defined('MAIL_TO') && MAIL_TO) {
        $mail->addAddress(MAIL_TO, MAIL_TO_NAME ?: 'CECNSR');
    }

    // Buzón de auditoría (opcional)
    if (defined('MAIL_BCC') && MAIL_BCC) {
        $mail->addBCC(MAIL_BCC);
    }


    // Por ahora Reply-To institucional (evita bloqueos por DMARC)
    $mail->addReplyTo(MAIL_FROM, MAIL_FROM_NAME);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $bodyHtml;
    $mail->AltBody = $bodyText;

    $mail->send();

    // Autorespuesta (si falla, no rompe el flujo)
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
        $auto->Body    = "<p>Hola {$nombreHtml},</p><p>Gracias por escribir a Complejo Educativo Católico Nuestra Señora del Rosario. Hemos recibido tu solicitud para <strong>{$gradoHtml}</strong>. Nuestro equipo de admisiones te contactará pronto.</p><p>Saludos,<br><strong>Complejo Educativo Católico<br>Nuestra Señora del Rosario</strong></p>";
        $auto->AltBody = "Hola {$nombre}, hemos recibido tu solicitud para {$grado}.";
        $auto->send();
    } catch (\Throwable $e) {/* silencio */
    }

    // Bitácora OK
    log_to_csv([$fecha, $ip, $ua, $nombre, $correo, $tel, "{$canal}:{$grado}", 'OK', '']);
    log_to_db([
        ':fecha' => $fecha,
        ':ip' => $ip,
        ':ua' => $ua,
        ':nombre' => $nombre,
        ':correo' => $correo,
        ':tel' => $tel,
        ':grado' => "{$canal}:{$grado}",
        ':estado' => 'OK',
        ':detalle' => ''
    ]);

    $_SESSION['last_submit'] = $now;
    echo json_encode(['ok' => true, 'msg' => '¡Solicitud enviada! Pronto te contactaremos.']);
} catch (\Throwable $e) {
    // Motivo real
    $err = isset($mail) && !empty($mail->ErrorInfo) ? $mail->ErrorInfo : $e->getMessage();

    // Bitácora ERROR
    log_to_csv([$fecha, $ip, $ua, $nombre, $correo, $tel, "{$canal}:{$grado}", 'ERROR', $err]);
    log_to_db([
        ':fecha' => $fecha,
        ':ip' => $ip,
        ':ua' => $ua,
        ':nombre' => $nombre,
        ':correo' => $correo,
        ':tel' => $tel,
        ':grado' => "{$canal}:{$grado}",
        ':estado' => 'ERROR',
        ':detalle' => $err
    ]);

    http_response_code(500);
    echo json_encode(['ok' => false, 'msg' => 'Error SMTP: ' . $err]);
}


<?php
header('Content-Type: application/json; charset=UTF-8');

require __DIR__ . '/config.mail.php';

/**
 * Autoload opcional (si tienes Composer)
 */
$autoload = __DIR__ . '/vendor/autoload.php';
if (is_file($autoload)) {
    require_once $autoload;
}

/**
 * PHPMailer local (tu librería en raíz)
 */
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';
require __DIR__ . '/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;

// ===== Helpers =====
function echo_json(array $payload, int $status = 200)
{
    while (ob_get_level()) ob_end_clean();
    http_response_code($status);
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($payload, JSON_UNESCAPED_UNICODE);
    exit;
}

function clean($v)
{
    return trim((string)filter_var($v, FILTER_UNSAFE_RAW));
}

function clean_phone($v)
{
    $v = clean($v);
    return preg_replace('/[^0-9+]/', '', $v);
}

// ===== Rate limit =====
session_start();
$now = time();
if (!empty($_SESSION['last_submit_consulta']) && ($now - $_SESSION['last_submit_consulta'] < 15)) {
    echo_json(['ok' => false, 'message' => 'Espera 15 segundos antes de otro envío.'], 429);
}

// ===== Campos =====
$honeypot = $_POST['website'] ?? '';

$nombre   = clean($_POST['nombre'] ?? '');
$correo   = clean($_POST['correo'] ?? '');
$whatsapp = clean_phone($_POST['whatsapp'] ?? '');
$tema     = clean($_POST['tema'] ?? '');
$mensaje  = clean($_POST['mensaje'] ?? '');
$contacto = strtolower(clean($_POST['contacto'] ?? 'correo')); // correo | whatsapp | llamada

// ===== Validaciones =====
if ($honeypot !== '') {
    echo_json(['ok' => false, 'message' => 'Error de validación.'], 400);
}

if ($nombre === '' || !filter_var($correo, FILTER_VALIDATE_EMAIL) || $mensaje === '') {
    echo_json(['ok' => false, 'message' => 'Completa nombre, correo y mensaje.'], 400);
}

if (strlen($mensaje) < 10) {
    echo_json(['ok' => false, 'message' => 'Tu mensaje es muy corto. Por favor agrega más detalles.'], 400);
}

if ($whatsapp !== '' && strlen(preg_replace('/\D/', '', $whatsapp)) < 8) {
    echo_json(['ok' => false, 'message' => 'El WhatsApp parece inválido.'], 400);
}

$validContact = ['correo', 'whatsapp', 'llamada'];
if (!in_array($contacto, $validContact, true)) {
    $contacto = 'correo';
}

if ($tema === '') $tema = 'Consulta general';

// ===== reCAPTCHA v2 =====
if (defined('RECAPTCHA_ENABLED') && RECAPTCHA_ENABLED) {
    $resp = $_POST['g-recaptcha-response'] ?? '';
    if (!$resp) {
        echo_json(['ok' => false, 'message' => 'Por favor marca el reCAPTCHA.'], 400);
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

    $json = $result ? json_decode($result, true) : null;
    if (empty($json['success'])) {
        echo_json(['ok' => false, 'message' => 'Validación reCAPTCHA inválida. Intenta de nuevo.'], 400);
    }
}

// ===== WhatsApp link (sin API) =====
// ✅ Nuevo: si definiste WHATSAPP_PHONE en config.mail.php lo usa, si no, usa fallback
$WA_PHONE = defined('WHATSAPP_PHONE') && WHATSAPP_PHONE ? WHATSAPP_PHONE : '50370072945';

$waText = rawurlencode(
    "Hola CECNSR, soy {$nombre}. Hice una consulta en la web.\n" .
        "Tema: {$tema}\n" .
        "Mensaje: {$mensaje}\n" .
        "Mi correo: {$correo}"
);

$waLink = "https://wa.me/" . preg_replace('/\D/', '', $WA_PHONE) . "?text={$waText}";

// ===== Formateo =====
$nombreHtml   = htmlspecialchars($nombre,   ENT_QUOTES, 'UTF-8');
$correoHtml   = htmlspecialchars($correo,   ENT_QUOTES, 'UTF-8');
$whatsHtml    = htmlspecialchars($whatsapp ?: 'No proporcionado', ENT_QUOTES, 'UTF-8');
$temaHtml     = htmlspecialchars($tema,     ENT_QUOTES, 'UTF-8');
$contactoHtml = htmlspecialchars($contacto, ENT_QUOTES, 'UTF-8');
$mensajeHtml  = nl2br(htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'));

$subject = "[Consultas Web] {$tema}";

$bodyHtml = "
  <h2>Nueva consulta desde la web</h2>
  <p><strong>Nombre:</strong> {$nombreHtml}</p>
  <p><strong>Correo:</strong> {$correoHtml}</p>
  <p><strong>WhatsApp:</strong> {$whatsHtml}</p>
  <p><strong>Tema:</strong> {$temaHtml}</p>
  <p><strong>Preferencia de contacto:</strong> {$contactoHtml}</p>
  <p><strong>Mensaje:</strong><br>{$mensajeHtml}</p>
  <hr>
  <p>Enviado el " . date('Y-m-d H:i:s') . "</p>
";

$bodyText =
    "Consulta Web\n" .
    "Nombre: {$nombre}\n" .
    "Correo: {$correo}\n" .
    "WhatsApp: " . ($whatsapp ?: 'No proporcionado') . "\n" .
    "Tema: {$tema}\n" .
    "Preferencia: {$contacto}\n\n" .
    "Mensaje:\n{$mensaje}\n";

// ===== Envío SMTP =====
try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USERNAME;
    $mail->Password   = SMTP_PASSWORD;
    $mail->SMTPSecure = (SMTP_SECURE === 'ssl') ? PHPMailer::ENCRYPTION_SMTPS : PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = SMTP_PORT;

    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;

    $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
    $mail->Sender = MAIL_FROM;

    /**
     * ✅ FIX CRÍTICO:
     * Si MAIL_TO no existe o está vacío, usa MAIL_FROM
     */
    if (defined('MAIL_TO') && MAIL_TO) {
        $mail->addAddress(MAIL_TO, defined('MAIL_TO_NAME') ? MAIL_TO_NAME : 'CECNSR');
    } else {
        $mail->addAddress(MAIL_FROM, MAIL_FROM_NAME);
    }

    if (defined('MAIL_BCC') && MAIL_BCC) $mail->addBCC(MAIL_BCC);

    // Reply-To al correo del usuario
    $mail->addReplyTo($correo, $nombre);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $bodyHtml;
    $mail->AltBody = $bodyText;

    $mail->send();

    // ===== Auto-respuesta al usuario =====
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
        $auto->Subject = 'Hemos recibido tu consulta - CECNSR';

        $auto->Body =
            "<p>Hola {$nombreHtml},</p>
       <p>Gracias por escribirnos. Hemos recibido tu consulta sobre <strong>{$temaHtml}</strong>.</p>
       <p>Te contactaremos pronto por: <strong>{$contactoHtml}</strong>.</p>
       <p>Saludos,<br><strong>Complejo Educativo Católico Nuestra Señora del Rosario</strong></p>";

        $auto->AltBody = "Hola {$nombre}, recibimos tu consulta sobre {$tema}. Pronto te contactaremos.";
        $auto->send();
    } catch (\Throwable $e) {
        // silencioso
    }

    $_SESSION['last_submit_consulta'] = $now;

    echo_json([
        'ok' => true,
        'message' => '¡Consulta enviada! Pronto te contactaremos.',
        'wa_link' => $waLink
    ]);
} catch (\Throwable $e) {
    $err = isset($mail) && !empty($mail->ErrorInfo) ? $mail->ErrorInfo : $e->getMessage();
    echo_json(['ok' => false, 'message' => 'Error SMTP: ' . $err], 500);
}

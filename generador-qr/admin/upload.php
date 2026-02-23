<?php

declare(strict_types=1);
require_once __DIR__ . '/_guard.php';

require_once __DIR__ . '/../app/db.php';
require_once __DIR__ . '/../app/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

if (!isset($_FILES['file']) || ($_FILES['file']['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
    die('Error al subir archivo.');
}

$file = $_FILES['file'];

// ✅ Validar tamaño
if (($file['size'] ?? 0) > MAX_FILE_SIZE) {
    die('Archivo demasiado grande.');
}

// ✅ Detectar MIME real (con fallback)
$mime = '';
if (function_exists('finfo_open')) {
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    if ($finfo) {
        $mime = (string) finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
    }
}

if ($mime === '' && function_exists('mime_content_type')) {
    $mime = (string) mime_content_type($file['tmp_name']);
}

if ($mime === '') {
    die('No se pudo detectar el tipo de archivo (MIME).');
}

if (!in_array($mime, ALLOWED_MIME, true)) {
    die('Tipo de archivo no permitido: ' . htmlspecialchars($mime));
}

// ✅ Crear carpeta si no existe
if (!is_dir(UPLOAD_DIR)) {
    if (!mkdir(UPLOAD_DIR, 0755, true) && !is_dir(UPLOAD_DIR)) {
        die('No se pudo crear la carpeta uploads.');
    }
}

if (!is_writable(UPLOAD_DIR)) {
    die('La carpeta uploads no tiene permisos de escritura.');
}

// Generar código corto base62
function randomCode(int $len = 6): string
{
    $alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $max = strlen($alphabet) - 1;
    $out = '';
    for ($i = 0; $i < $len; $i++) {
        $out .= $alphabet[random_int(0, $max)];
    }
    return $out;
}

$pdo = db();

// ✅ Nombre almacenado seguro
$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
$ext = $ext ? '.' . strtolower($ext) : '';
$stored = bin2hex(random_bytes(16)) . $ext;

$destPath = UPLOAD_DIR . '/' . $stored;
if (!move_uploaded_file($file['tmp_name'], $destPath)) {
    die('No se pudo guardar el archivo en el servidor.');
}

// ✅ Insertar con code sin colisión
$uploadedBy = $_SESSION['admin_id'] ?? null;
$uploadedBy = ($uploadedBy !== null) ? (int)$uploadedBy : null;

$tries = 0;
do {
    $tries++;
    $code = randomCode(6);

    $exists = $pdo->prepare('SELECT 1 FROM file_links WHERE code = ? LIMIT 1');
    $exists->execute([$code]);
    $collision = (bool) $exists->fetchColumn();

    if (!$collision) {
        $ins = $pdo->prepare(
            'INSERT INTO file_links (code, original_name, stored_name, mime_type, file_size, uploaded_by)
             VALUES (?, ?, ?, ?, ?, ?)'
        );
        $ins->execute([
            $code,
            $file['name'],
            $stored,
            $mime,
            (int) $file['size'],
            $uploadedBy,
        ]);
        break;
    }
} while ($tries < 8);

if ($tries >= 8) {
    @unlink($destPath);
    die('No se pudo generar un link corto único.');
}

header('Location: index.php');
exit;

<?php

declare(strict_types=1);

require_once __DIR__ . '/../app/db.php';
require_once __DIR__ . '/../app/config.php';

$code = trim((string)($_GET['c'] ?? ''));

// Soporta /f/ABC123 usando PATH_INFO (por rewrite)
if ($code === '' && isset($_SERVER['PATH_INFO'])) {
    $code = trim($_SERVER['PATH_INFO'], '/');
}

if ($code === '') {
    http_response_code(404);
    echo "Enlace inválido.";
    exit;
}

$pdo = db();
$stmt = $pdo->prepare("SELECT * FROM file_links WHERE code = ? LIMIT 1");
$stmt->execute([$code]);
$file = $stmt->fetch();

if (!$file) {
    http_response_code(404);
    echo "Archivo no encontrado.";
    exit;
}

$path = UPLOAD_DIR . '/' . $file['stored_name'];
if (!file_exists($path)) {
    http_response_code(404);
    echo "Archivo no disponible.";
    exit;
}

// Estadísticas
$upd = $pdo->prepare("UPDATE file_links SET clicks = clicks + 1, last_access = NOW() WHERE id = ? LIMIT 1");
$upd->execute([(int)$file['id']]);

// Servir archivo
$mime = $file['mime_type'];
$filename = $file['original_name'];

header('Content-Type: ' . $mime);
header('Content-Length: ' . filesize($path));

// PDF e imágenes: se pueden abrir en navegador
$inlineTypes = ['application/pdf', 'image/jpeg', 'image/png', 'image/webp'];
if (in_array($mime, $inlineTypes, true)) {
    header('Content-Disposition: inline; filename="' . $filename . '"');
} else {
    header('Content-Disposition: attachment; filename="' . $filename . '"');
}

readfile($path);
exit;

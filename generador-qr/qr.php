<?php
// qr.php — Generador QR Institucional (local / sin anuncios)

declare(strict_types=1);

require_once __DIR__ . '/lib/phpqrcode/qrlib.php';

// ======================================================
// 🔐 Token institucional (cámbialo por uno fuerte)
// ======================================================
const INSTITUTIONAL_TOKEN = 'CECNSR-QR-2026';

// Validación token
$token = $_GET['token'] ?? '';
if ($token !== INSTITUTIONAL_TOKEN) {
    http_response_code(403);
    header('Content-Type: text/plain; charset=utf-8');
    echo "Acceso denegado. Token inválido.";
    exit;
}

// ======================================================
// Configuración anti abuso
// ======================================================
$maxLen = 1500;

// Entrada
$text = $_GET['text'] ?? '';
$text = trim($text);

if ($text === '') {
    http_response_code(400);
    header('Content-Type: text/plain; charset=utf-8');
    echo "Error: falta el parámetro ?text=";
    exit;
}

if (mb_strlen($text) > $maxLen) {
    http_response_code(413);
    header('Content-Type: text/plain; charset=utf-8');
    echo "Error: el texto es demasiado largo (máx $maxLen caracteres).";
    exit;
}

// Tamaño (1 a 20)
$size = isset($_GET['size']) ? (int) $_GET['size'] : 8;
$size = max(1, min(20, $size));

// Margen (0 a 10)
$margin = isset($_GET['margin']) ? (int) $_GET['margin'] : 2;
$margin = max(0, min(10, $margin));

// ECC: L, M, Q, H
$ecc = strtoupper($_GET['ecc'] ?? 'M');
$allowedECC = ['L', 'M', 'Q', 'H'];
if (!in_array($ecc, $allowedECC, true)) {
    $ecc = 'M';
}

// Descargar archivo
$download = isset($_GET['download']) && $_GET['download'] === '1';

// ======================================================
// Generar PNG en memoria
// ======================================================
ob_start();
QRcode::png($text, null, $ecc, $size, $margin);
$imageData = ob_get_clean();

if (!$imageData) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=utf-8');
    echo "Error: no se pudo generar el QR.";
    exit;
}

// Salida PNG
header('Content-Type: image/png');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

if ($download) {
    $filename = 'QR_CECNSR_' . date('Ymd_His') . '.png';
    header('Content-Disposition: attachment; filename="' . $filename . '"');
}

echo $imageData;
exit;

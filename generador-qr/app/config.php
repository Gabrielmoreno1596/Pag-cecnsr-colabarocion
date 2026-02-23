<?php

declare(strict_types=1);

// ======================================================
// Configuración general del proyecto
// ======================================================

// 🔐 Token QR institucional (debe coincidir con qr.php)
const QR_TOKEN = 'CECNSR-QR-2026';

/**
 * 📌 BASE_URL (opcional)
 * Si lo dejás vacío, el sistema intenta autodetectar la URL base.
 *
 * Ejemplos para forzar:
 * - 'http://localhost/generado-qr'
 * - 'https://tudominio.com/generador-qr'
 */
const BASE_URL = '';

// 📌 Carpeta de uploads (ruta absoluta en disco)
const UPLOAD_DIR = __DIR__ . '/../uploads';

// ✅ Límite por archivo (20MB recomendado)
const MAX_FILE_SIZE = 20 * 1024 * 1024;

// ✅ Tipos permitidos (podés agregar más si lo necesitás)
const ALLOWED_MIME = [
    'application/pdf',
    'image/jpeg',
    'image/png',
    'image/webp',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // docx
];

/**
 * Devuelve la URL base del proyecto.
 * - Si BASE_URL está definida y no está vacía, usa esa.
 * - Si no, autodetecta tomando la ruta actual y quitando /admin, /f o el archivo final.
 */
function app_base_url(): string
{
    if (defined('BASE_URL') && BASE_URL !== '') {
        return rtrim(BASE_URL, '/');
    }

    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
    $proto = $https ? 'https' : 'http';

    $script = $_SERVER['SCRIPT_NAME'] ?? '';

    // Si estamos en /admin/... o /f/... lo recortamos al root del proyecto
    $path = preg_replace('~/(admin|f)(/.*)?$~', '', $script);

    // Si estamos en /algo.php en raíz, quitamos el filename
    $path = preg_replace('~/[^/]+\.php$~', '', $path);

    // Normalizar
    if ($path === '/') {
        $path = '';
    }

    return $proto . '://' . $host . $path;
}

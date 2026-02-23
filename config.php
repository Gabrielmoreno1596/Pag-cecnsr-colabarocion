<?php

$__local = __DIR__ . '/config.local.php';
if (is_file($__local)) {
    require $__local;
}




if (!defined('PROJECT_PATH')) {
    define('PROJECT_PATH', rtrim(__DIR__, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR);
}


if (!function_exists('str_starts_with')) {
    function str_starts_with($haystack, $needle)
    {
        return $needle !== '' && substr($haystack, 0, strlen($needle)) === $needle;
    }
}

// 2) Detecta BASE_URL automáticamente (localhost / cPanel / subcarpeta)
//    Solo si no fue definida en config.local.php
if (!defined('BASE_URL')) {
    $docRoot = isset($_SERVER['DOCUMENT_ROOT'])
        ? rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/')
        : '';
    $projDir = rtrim(str_replace('\\', '/', realpath(__DIR__)), '/');

    $rel = '';
    if ($docRoot && str_starts_with($projDir, $docRoot)) {
        // ej.: contribuciones/sitececnsr
        $rel = trim(substr($projDir, strlen($docRoot)), '/');
    }
    // Resultado: "/" si es raíz del dominio, o "/subcarpeta/"
    define('BASE_URL', '/' . ($rel === '' ? '' : $rel . '/'));
}


if (!defined('ASSET_VER')) {
    define('ASSET_VER', '2025-11-05.1'); // cambia este valor en cada deploy si quieres invalidar TODO
}


if (!defined('ASSET_MANIFEST_PATH')) {
    define('ASSET_MANIFEST_PATH', PROJECT_PATH . 'manifest.json');
}

// Ruta absoluta al logo institucional (para PDFs/impresiones)
if (!defined('CECNSR_LOGO_FS')) {
    define('CECNSR_LOGO_FS', PROJECT_PATH . 'assets/1_CECNSR.png');
}


function asset(string $path): string
{
    static $manifest = null;

    // 0) URLs absolutas (CDN) → devolver tal cual
    if (preg_match('#^(https?:)?//#i', $path)) {
        return $path;
    }

    $base = defined('BASE_URL') ? BASE_URL : '/';

    // 1) Carga manifest.json una vez (si existe)
    if ($manifest === null) {
        $mf = ASSET_MANIFEST_PATH;
        $manifest = is_file($mf) ? json_decode(file_get_contents($mf), true) : [];
        if (!is_array($manifest)) $manifest = [];
    }

    // 2) Si está en el manifest, usar esa ruta (ya versionada) sin query extra
    //    Ej.: "assets/css/app.css" => "build/css/app.abc12345.css"
    if (isset($manifest[$path])) {
        return $base . ltrim($manifest[$path], '/');
    }

    // 3) Fallback: ?v=filemtime
    $trimmed = ltrim($path, '/\\');
    $abs     = realpath(PROJECT_PATH . $trimmed);
    $root    = realpath(PROJECT_PATH);

    // Si no existe archivo real o escapa del root, usamos ASSET_VER
    if ($abs === false || $root === false || strpos($abs, $root) !== 0) {
        $ver = ASSET_VER; // versión global de emergencia
        $sep = (strpos($trimmed, '?') === false) ? '?' : '&';
        return $base . $trimmed . $sep . 'v=' . rawurlencode((string)$ver);
    }

    // Si existe, usar mtime para invalidar por archivo
    $ver = filemtime($abs) ?: ASSET_VER;
    $sep = (strpos($trimmed, '?') === false) ? '?' : '&';
    return $base . $trimmed . $sep . 'v=' . rawurlencode((string)$ver);
}

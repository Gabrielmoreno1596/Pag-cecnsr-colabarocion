<?php
// ===============================
// config.php — núcleo del proyecto
// ===============================

// 0) (Opcional) Carga overrides locales ANTES (no commitear este archivo)
$local = __DIR__ . '/config.local.php';
if (file_exists($local)) {
    require $local; // aquí podrías definir BASE_URL o ASSET_VER
}

// 1) Ruta absoluta del proyecto (termina con /)
define('PROJECT_PATH', rtrim(__DIR__, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR);

// 2) Detecta BASE_URL automáticamente (localhost / cPanel / subcarpeta)
//    Solo si no fue definida en config.local.php
if (!defined('BASE_URL')) {
    $docRoot = isset($_SERVER['DOCUMENT_ROOT']) ? rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/') : '';
    $projDir = rtrim(str_replace('\\', '/', realpath(__DIR__)), '/');

    // Polyfill para PHP 7.x
    if (!function_exists('str_starts_with')) {
        function str_starts_with($haystack, $needle)
        {
            return $needle !== '' && substr($haystack, 0, strlen($needle)) === $needle;
        }
    }

    $rel = '';
    if ($docRoot && str_starts_with($projDir, $docRoot)) {
        $rel = trim(substr($projDir, strlen($docRoot)), '/'); // p.ej. contribuciones/sitececnsr
    }
    define('BASE_URL', '/' . ($rel === '' ? '' : $rel . '/')); // /o /subcarpeta/
}

// 3) Versión de assets (cache-busting). Si prefieres manual, define ASSET_VER en config.local.php
if (!defined('ASSET_VER')) {
    define('ASSET_VER', null); // si es null usaremos filemtime
}

/**
 * 4) Helper de assets con cache-busting por mtime (o ASSET_VER)
 *    - Maneja paths con query previa (?foo=bar)
 *    - Ignora URLs absolutas (CDN) para no generar URLs inválidas
 */
function asset(string $path): string
{
    $trimmed = ltrim($path, '/');

    // Si ya es URL absoluta o esquema relativo, devuélvela tal cual (sin versión)
    if (preg_match('#^(https?:)?//#i', $path)) {
        return $path;
    }

    // Construye ruta de archivo local y valida
    $file = realpath(PROJECT_PATH . $trimmed);
    if ($file === false || strpos($file, realpath(PROJECT_PATH)) !== 0) {
        // Si no existe, devolvemos URL igualmente con versionado de emergencia
        $ver = ASSET_VER !== null ? ASSET_VER : time();
        $sep = (strpos($trimmed, '?') === false) ? '?' : '&';
        return BASE_URL . $trimmed . $sep . 'v=' . $ver;
    }

    $ver = ASSET_VER !== null ? ASSET_VER : filemtime($file);

    // Si el path ya trae query, usamos &v= ; si no, ?v=
    $sep = (strpos($trimmed, '?') === false) ? '?' : '&';
    return BASE_URL . $trimmed . $sep . 'v=' . $ver;
}

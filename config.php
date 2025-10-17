<?php
// config.php (autodetecta la URL base del proyecto a partir de su ubicación en el servidor)

// Ruta absoluta en disco a la carpeta del proyecto (donde está este config.php)
define('PROJECT_PATH', __DIR__ . '/');

// Calcula la ruta pública (URL path) del proyecto, sin depender de nombres fijos:
$docRoot = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/');
$projDir = rtrim(str_replace('\\', '/', realpath(__DIR__)), '/');
$rel     = trim(str_replace($docRoot, '', $projDir), '/'); // p.ej: contribuciones/sitececnsr
$BASE_URL = '/' . ($rel === '' ? '' : $rel . '/');        // p.ej: /contribuciones/sitececnsr/

// Versión por timestamp del archivo (cache-busting automático)
function asset($path)
{
    global $BASE_URL;
    $path = ltrim($path, '/');
    $file = PROJECT_PATH . $path;                  // ruta física al archivo
    $ver  = file_exists($file) ? filemtime($file) : time();
    return "{$BASE_URL}{$path}?v={$ver}";
}

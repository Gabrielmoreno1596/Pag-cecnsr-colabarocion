<?php
// ===============================
// config.php — núcleo del proyecto
// ===============================

// Ruta absoluta del proyecto (termina con /)
define('PROJECT_PATH', rtrim(__DIR__, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR);

// Detecta BASE_URL automáticamente (localhost / cPanel / subcarpeta)
$docRoot = isset($_SERVER['DOCUMENT_ROOT']) ? rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']), '/') : '';
$projDir = rtrim(str_replace('\\', '/', realpath(__DIR__)), '/');

$rel = '';
if ($docRoot && str_starts_with($projDir, $docRoot)) {
    $rel = trim(substr($projDir, strlen($docRoot)), '/'); // p.ej. contribuciones/sitececnsr
}
if (!defined('BASE_URL')) {
    // Queda como /contribuciones/sitececnsr/ en local, o / si es raíz del dominio
    define('BASE_URL', '/' . ($rel === '' ? '' : $rel . '/'));
}

// Versión de assets (cache-busting). Puedes cambiarla manualmente si lo prefieres.
if (!defined('ASSET_VER')) {
    define('ASSET_VER', null); // si es null usaremos filemtime
}

// Helper de assets con cache-busting por mtime (o ASSET_VER si la defines)
function asset(string $path): string
{
    $path = ltrim($path, '/');
    $file = PROJECT_PATH . $path;
    $ver  = ASSET_VER !== null
        ? ASSET_VER
        : (file_exists($file) ? filemtime($file) : time());
    return BASE_URL . $path . '?v=' . $ver;
}

// (Opcional) Config local para sobrescribir BASE_URL/constantes sin subir al repo
// Crea config.local.php y define allí: define('BASE_URL', '/sitececnsr/');
$local = __DIR__ . '/config.local.php';
if (file_exists($local)) {
    require $local;
}

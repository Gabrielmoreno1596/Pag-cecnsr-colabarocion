<?php

/**
 * build-manifest.php
 * Genera archivos hasheados y manifest.json
 * Ejecutar antes de cada deploy
 */

$root   = __DIR__;
$srcDir = $root . '/assets';
$dstDir = $root . '/build';                 // ← build en la RAÍZ del proyecto
$manFi  = $root . '/manifest.json';         // ← manifest en la RAÍZ del proyecto (coincide con config.php)

@mkdir($dstDir, 0775, true);

$manifest = [];

/**
 * Copia CSS/JS a build con nombre hasheado y llena $manifest.
 */
$iter = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($srcDir, FilesystemIterator::SKIP_DOTS)
);

foreach ($iter as $file) {
    /** @var SplFileInfo $file */
    if (!$file->isFile()) continue;
    $ext = strtolower($file->getExtension());
    if (!in_array($ext, ['css', 'js'], true)) continue;

    $abs = $file->getRealPath();
    $rel = str_replace($srcDir . DIRECTORY_SEPARATOR, '', $abs);

    // Ignora si ya viene con hash tipo .xxxxxxxx.css
    if (preg_match('/\.[0-9a-f]{8}\.' . $ext . '$/i', $rel)) continue;

    $hash   = substr(md5_file($abs), 0, 8);
    $base   = pathinfo($rel, PATHINFO_FILENAME);
    $dirRel = pathinfo($rel, PATHINFO_DIRNAME);
    $dirRel = $dirRel === '.' ? '' : $dirRel;

    $hashedName = $base . '.' . $hash . '.' . $ext;
    $dstSubdir  = $dstDir . ($dirRel ? '/' . $dirRel : '');
    @mkdir($dstSubdir, 0775, true);

    $dstAbs = $dstSubdir . '/' . $hashedName;
    if (!copy($abs, $dstAbs)) {
        fwrite(STDERR, "Error al copiar: $abs -> $dstAbs\n");
        continue;
    }

    // Clave lógica (lo que usas en el código): asset('assets/...'):
    $logicalPath = 'assets/' . $rel;

    // Valor público que devolverá asset(): '/build/...'
    $publicPath  = 'build/' . ($dirRel ? $dirRel . '/' : '') . $hashedName;

    $manifest[$logicalPath] = $publicPath;
}

// Guardar manifest en la RAÍZ (coincide con config.php)
file_put_contents($manFi, json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

echo "✓ Manifest generado con " . count($manifest) . " archivos\n";

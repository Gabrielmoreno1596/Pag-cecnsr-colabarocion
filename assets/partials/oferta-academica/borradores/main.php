<?php
/**
 * main.php â€” orquesta la secciÃ³n 'oferta-academica'
 */
$data = require __DIR__ . '/data/oferta-academica-data.php';

// Helpers y constantes globales
require_once __DIR__ . '/../../includes/img.php';
if (!defined('BASE_URL')) {
  define('BASE_URL', '/contribuciones/sitececnsr/'); // ajusta si tu sitio vive en subcarpeta
}

// Cargar CSS/JS de la secciÃ³n (si tu layout no lo hace de forma global)
echo '<link rel="stylesheet" href="' . BASE_URL . 'assets/partials/oferta-academica/css/oferta-academica.css">';
// echo '<script defer src="' . BASE_URL . 'assets/partials/oferta-academica/js/oferta-academica.js"></script>';

// Componentes
require __DIR__ . '/components/hero.php';
require __DIR__ . '/components/block-a.php';

<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CECNSR - Colegios PASCH</title>

  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />

  <!-- Global del sitio -->
  <link rel="stylesheet" href="<?= asset('styles.css') ?>">

  <!-- CSS por componente PASCH -->
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/pasch/css/hero.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/pasch/css/que-es.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/pasch/css/informacion.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/pasch/css/requisitos.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/pasch/css/experiencias.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/pasch/css/galeria.css') ?>">

  <!-- Iconos -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <!-- Favicon básico (PNG) -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <meta name="theme-color" content="#7f2d3c">

  <!-- SEO/OG -->
  <link rel="canonical" href="https://www.cecnsrosariosv.com/contribuciones/sitececnsr/pasch.php">
  <meta name="description" content="El CECNSR participa en PASCH: alemán, interculturalidad y oportunidades para estudiantes.">
  <meta property="og:title" content="CECNSR — Colegios PASCH">
  <meta property="og:description" content="Aprendizaje de alemán, interculturalidad y oportunidades PASCH.">
  <meta property="og:image" content="<?= asset('assets/og/pasch-cover.jpg') ?>">
  <meta property="og:url" content="https://www.cecnsrosariosv.com/contribuciones/sitececnsr/pasch.php">
  <meta name="twitter:card" content="summary_large_image">
</head>

<body>

  <?php require_once PROJECT_PATH . 'assets/partials/header.php'; ?>
  <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

  <?php
  require_once PROJECT_PATH . 'assets/partials/convenios/pasch/main.php';
  ?>

  <?php require_once PROJECT_PATH . 'assets/partials/footer.php'; ?>

  <!-- JS por componente PASCH -->
  <script src="<?= asset('assets/partials/convenios/pasch/js/hero.js') ?>"></script>
  <script src="<?= asset('assets/partials/convenios/pasch/js/informacion.js') ?>"></script>
  <script src="<?= asset('assets/partials/convenios/pasch/js/experiencias.js') ?>"></script>
  <script src="<?= asset('assets/partials/convenios/pasch/js/galeria.js') ?>"></script>
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/pasch/css/pasch.css'); ?>">
  <script type="module" src="<?= asset('assets/partials/convenios/pasch/js/app.js'); ?>"></script>


</body>

</html>
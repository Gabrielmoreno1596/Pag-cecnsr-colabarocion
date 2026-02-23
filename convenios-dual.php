<?php require_once __DIR__ . '/config.php';
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CECNSR | Proyecto Dual</title>

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />

  <!-- CSS global del sitio -->
  <link rel="stylesheet" href="<?= asset('styles.css') ?>">

  <!-- Core compartido del módulo -->
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/proyecto-dual/css/core/tokens.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/proyecto-dual/css/core/base.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/proyecto-dual/css/core/helpers.css') ?>">

  <!-- CSS por sección -->
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/proyecto-dual/css/hero.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/proyecto-dual/css/que-es.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/proyecto-dual/css/ruta.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/proyecto-dual/css/requisitos.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/proyecto-dual/css/preparacion.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/proyecto-dual/css/galeria.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/proyecto-dual/css/coor.css') ?>">


  <!-- Favicons -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <meta name="theme-color" content="#7f2d3c">

  <!-- Iconos -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <!-- SEO/OG (adaptado a Proyecto Dual) -->
  <link rel="canonical" href="https://www.cecnsrosariosv.com/contribuciones/sitececnsr/proyecto-dual.php">
  <meta name="description" content="Proyecto DUAL del CECNSR: estudio + trabajo en Alemania, con preparación académica y cultural desde el colegio.">
  <meta property="og:title" content="CECNSR — Proyecto DUAL">
  <meta property="og:description" content="Oportunidad de formación técnico-laboral en Alemania (modelo dual). Acompañamiento, idioma y ruta clara para estudiantes.">
  <meta property="og:image" content="<?= asset('assets/og/proyecto-dual-cover.jpg') ?>">
  <meta property="og:url" content="https://www.cecnsrosariosv.com/contribuciones/sitececnsr/proyecto-dual.php">
  <meta name="twitter:card" content="summary_large_image">

  <script>
    document.documentElement.classList.add('has-js');
  </script>
</head>

<body>
  <?php require PROJECT_PATH . 'assets/partials/header.php'; ?>
  <?php require PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

  <?php require PROJECT_PATH . 'assets/partials/convenios/proyecto-dual/main.php'; ?>

  <?php require PROJECT_PATH . 'assets/partials/footer.php'; ?>

  <!-- JS del módulo Proyecto Dual (separados por responsabilidad) -->
  <script src="<?= asset('assets/partials/convenios/proyecto-dual/js/prep-cards-autorotate.js') ?>" defer></script>
  <script src="<?= asset('assets/partials/convenios/proyecto-dual/js/hero-carousel.js') ?>" defer></script>
  <script src="<?= asset('assets/partials/convenios/proyecto-dual/js/gallery-lightbox.js') ?>" defer></script>
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/proyecto-dual/css/proyecto-dual.css'); ?>">
  <script type="module" src="<?= asset('assets/partials/convenios/proyecto-dual/js/app.js'); ?>"></script>

</body>



</html>
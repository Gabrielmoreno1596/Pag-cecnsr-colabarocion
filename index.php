<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CECNSR - Complejo Educativo Católico Nuestra Señora del Rosario</title>

  <!-- CSS global existente -->
  <link rel="stylesheet" href="<?= asset('assets-ml/css/styles.css') ?>" />

  <!-- CSS del módulo INICIO -->
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/base.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/hero.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/quienes-somos.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/historia.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/filosofia.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/infraestructura.css') ?>">

  <!-- Favicon básico (PNG) -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <meta name="theme-color" content="#7f2d3c">

  <!-- Iconos -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
  <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>
  <?php require PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

  <?php
  // Módulo de la página de inicio
  require PROJECT_PATH . 'assets/partials/inicio/main.php';
  ?>


  <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>

  <!-- JS global de navegación -->
  <script defer src="<?= asset('script.js') ?>"></script>

  <!-- JS específico del inicio (si lo necesitas) -->
  <script defer src="<?= asset('assets/partials/inicio/js/app.js') ?>"></script>
</body>

</html>
<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>¿Quiénes Somos? - CECNSR</title>

  <link rel="stylesheet" href="<?= asset('styles.css') ?>">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- Base visual (mismo look & feel de Inicio) -->
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/components/reveal.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/elegant.css'); ?>" />

  <!-- Estilos compartidos del bloque Historia (los reutilizamos aquí) -->
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/quienes-somos.css'); ?>" />

  <!-- Estilos propios de esta página -->
  <link rel="stylesheet" href="<?= asset('assets/partials/quienes-somos/css/quienes-somos.css'); ?>" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <meta name="theme-color" content="#7f2d3c">
</head>

<body>

  <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>
  <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

  <?php require_once PROJECT_PATH . 'assets/partials/quienes-somos/main.php'; ?>

  <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>

  <!-- JS global -->
  <script defer src="<?= asset('script.js'); ?>"></script>

  <!-- JS de la página -->
  <script type="module" src="<?= asset('assets/partials/quienes-somos/js/app.js'); ?>"></script>

</body>

</html>
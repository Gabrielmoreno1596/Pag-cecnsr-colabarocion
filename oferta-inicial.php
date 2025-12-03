<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nivel Parvularia | CECNSR</title>

  <!-- CSS global del sitio (header, nav, etc.) -->
  <link rel="stylesheet" href="<?= asset('assets-ml/css/styles.css') ?>">

  <!-- CSS del módulo Parvularia -->
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-inicial/css/base.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-inicial/css/hero.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-inicial/css/perfil.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-inicial/css/grados.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-inicial/css/areas-clave.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-inicial/css/servicios.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-inicial/css/admision.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-inicial/css/entorno.css') ?>">

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <meta name="theme-color" content="#7f2d3c">
</head>

<body>
  <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>
  <?php require PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

  <?php require PROJECT_PATH . 'assets/partials/oferta-academica/oferta-inicial/main.php'; ?>

  <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>

  <!-- JS módulo Parvularia (solo acordeón y cosas propias de la página) -->
  <script src="<?= asset('assets/partials/oferta-academica/oferta-inicial/js/app.js') ?>" defer></script>

  <!-- JS global navegación -->
  <script src="<?= asset('script.js') ?>" defer></script>
</body>

</html>
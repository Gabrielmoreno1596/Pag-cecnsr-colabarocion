<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nivel Parvularia | CECNSR</title>

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- CSS por componentes -->
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-inicial/css/hero.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-inicial/css/perfil.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-inicial/css/grados-edades.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-inicial/css/areas.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-inicial/css/servicios.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-inicial/css/admision.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-inicial/css/entorno.css'); ?>" />

  <!-- Favicons -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/img/logos/cecnsr.png?v=1'); ?>">
  <link rel="shortcut icon" href="<?= asset('assets/img/logos/cecnsr.png?v=1'); ?>" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/img/logos/cecnsr.png?v=1'); ?>">
  <meta name="theme-color" content="#7f2d3c">
</head>

<body>

  <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>
  <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

  <?php
  require_once PROJECT_PATH . 'assets/partials/oferta-academica/oferta-inicial/main.php';
  ?>

  <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>

  <!-- JS específico -->
  <script src="<?= asset('assets/partials/oferta-academica/oferta-inicial/js/admision.js'); ?>" defer></script>

  <!-- JS global del sitio -->
  <script defer src="<?= asset('script.js'); ?>"></script>
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-inicial/css/oferta-inicial.css'); ?>">
  <script type="module" src="<?= asset('assets/partials/oferta-academica/oferta-inicial/js/app.js'); ?>"></script>

</body>

</html>
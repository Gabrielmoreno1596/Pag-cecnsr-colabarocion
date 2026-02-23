<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CECNSR - Educación Media (Bachillerato)</title>

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- CSS modularizado -->
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-bachillerato/css/hero.css'); ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-bachillerato/css/especialidades.css'); ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-bachillerato/css/perfil.css'); ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-bachillerato/css/valores.css'); ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-bachillerato/css/admision.css'); ?>">

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <meta name="theme-color" content="#7f2d3c">
</head>

<body>
  <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>
  <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

  <?php include PROJECT_PATH . 'assets/partials/oferta-academica/oferta-bachillerato/main.php'; ?>

  <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>

  <!-- JS modularizado -->
  <script src="<?= asset('assets/partials/oferta-academica/oferta-bachillerato/js/especialidades.js'); ?>"></script>
  <script src="<?= asset('assets/partials/oferta-academica/oferta-bachillerato/js/perfil.js'); ?>"></script>
  <script src="<?= asset('assets/partials/oferta-academica/oferta-bachillerato/js/admision.js'); ?>"></script>

  <!-- JS global del sitio -->
  <script defer src="<?= asset('script.js'); ?>"></script>
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-bachillerato/css/oferta-bachillerato.css'); ?>">
  <script type="module" src="<?= asset('assets/partials/oferta-academica/oferta-bachillerato/js/app.js'); ?>"></script>

</body>

</html>
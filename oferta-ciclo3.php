<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>III Ciclo (Premedia) - CECNSR</title>

  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- CSS específico de la página III Ciclo -->
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo3/css/hero.css'); ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo3/css/valores.css'); ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo3/css/metas.css'); ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo3/css/experiencias.css'); ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo3/css/trayectoria.css'); ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo3/css/admision.css'); ?>">

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/img/logos/cecnsr.png?v=1'); ?>">
  <link rel="shortcut icon" href="<?= asset('assets/img/logos/cecnsr.png?v=1'); ?>" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/img/logos/cecnsr.png?v=1'); ?>">
  <meta name="theme-color" content="#7f2d3c">
</head>

<body>
  <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>
  <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

  <?php include PROJECT_PATH . 'assets/partials/oferta-academica/oferta-ciclo3/main.php'; ?>

  <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>

  <!-- JS específico página III Ciclo -->
  <script src="<?= asset('assets/partials/oferta-academica/oferta-ciclo3/js/oferta-ciclo3.js'); ?>"></script>
  <!-- JS global del sitio -->
  <script defer src="<?= asset('script.js'); ?>"></script>
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo3/css/oferta-ciclo3.css'); ?>">
  <script type="module" src="<?= asset('assets/partials/oferta-academica/oferta-ciclo3/js/app.js'); ?>"></script>

</body>

</html>
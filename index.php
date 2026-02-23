<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CECNSR - Complejo Educativo Católico Nuestra Señora del Rosario</title>

  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <link rel="stylesheet" href="<?= asset('styles.css') ?>">

  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/inicio.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/elegant.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/home-previews.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/reveal.css'); ?>" />
  <!-- CSS por secciones -->
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/hero.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/quienes-somos.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/mision-vision-compromiso.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/infraestructura.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/redesign.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/components/reveal.css'); ?>" />

  <link rel="stylesheet" href="<?= asset('assets/partials/components/eventos/eventos.css'); ?>" />
  <script defer src="<?= asset('assets/partials/components/eventos/eventos.js'); ?>"></script>



  <link rel="stylesheet" href="<?= asset('assets/partials/ui/float-modal/float-modal.css'); ?>" />


  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <meta name="theme-color" content="#7f2d3c">
</head>

<body>

  <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>




  <?php include PROJECT_PATH . 'assets/partials/components/redes-sociales/redes-sociales.php'; ?>



  <?php require_once PROJECT_PATH . 'assets/partials/inicio/main.php'; ?>

  <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>

  <!-- JS global del sitio -->
  <script defer src="<?= asset('script.js'); ?>"></script>
  <link rel="stylesheet" href="<?= asset('assets/partials/inicio/css/inicio.css'); ?>">
  <script type="module" src="<?= asset('assets/partials/inicio/js/app.js'); ?>"></script>

</body>

</html>
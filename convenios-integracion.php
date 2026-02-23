<?php require_once __DIR__ . '/config.php'; ?>
<?php require_once __DIR__ . '/config.mail.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CECNSR - Proyecto de Integración</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
  <link rel="stylesheet" href="<?= asset('styles.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/css/style-convenios.css') ?>">

  <!-- Integración: CSS por secciones -->
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/integracion/css/hero.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/integracion/css/proposito-alcance.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/integracion/css/ruta-trabajo.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/integracion/css/convocatoria.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/integracion/css/requisitos.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/integracion/css/galeria.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/integracion/css/form.css') ?>">

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <meta name="theme-color" content="#7f2d3c">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <!-- SEO/OG (déjalos como los tienes o ajusta a Integración) -->
  <link rel="canonical" href="https://www.cecnsrosariosv.com/contribuciones/sitececnsr/convenios-integracion.php">
  <meta name="description" content="Proyecto de Integración del CECNSR: acompañamiento académico, social y espiritual.">
  <meta property="og:title" content="CECNSR — Proyecto de Integración">
  <meta property="og:description" content="Hábitos de estudio, convivencia, prevención y servicio en alianza familia–escuela–comunidad.">
  <meta property="og:image" content="<?= asset('assets/og/integracion-cover.jpg') ?>">
  <meta property="og:url" content="https://www.cecnsrosariosv.com/contribuciones/sitececnsr/convenios-integracion.php">
  <meta name="twitter:card" content="summary_large_image">
</head>

<body>
  <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>
  <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

  <?php include PROJECT_PATH . 'assets/partials/convenios/integracion/main.php'; ?>

  <?php if (defined('RECAPTCHA_ENABLED') && RECAPTCHA_ENABLED): ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <?php endif; ?>

  <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>

  <script src="script.js"></script>

  <!-- Integración: JS por secciones -->
  <script src="<?= asset('assets/partials/convenios/integracion/js/hero.js') ?>"></script>
  <script src="<?= asset('assets/partials/convenios/integracion/js/proposito-alcance.js') ?>"></script>
  <script src="<?= asset('assets/partials/convenios/integracion/js/ruta-trabajo.js') ?>"></script>
  <script src="<?= asset('assets/partials/convenios/integracion/js/convocatoria.js') ?>"></script>
  <script src="<?= asset('assets/partials/convenios/integracion/js/requisitos.js') ?>"></script>
  <script src="<?= asset('assets/partials/convenios/integracion/js/galeria.js') ?>"></script>
  <script src="<?= asset('assets/partials/convenios/integracion/js/form.js') ?>"></script>
</body>

</html>
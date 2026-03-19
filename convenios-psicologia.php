<?php require_once __DIR__ . '/config.php'; ?>
<?php
require_once __DIR__ . '/config.mail.php';  // ajusta la ruta si este archivo está en otra carpeta
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CECNSR - PI y 4PE</title>

  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />

  <!-- Global del sitio -->
  <link rel="stylesheet" href="<?= asset('styles.css') ?>">

  <!-- (Compat) CSS existente que ya tenías para esta página -->
  <link rel="stylesheet" href="<?= asset('assets/css/style-pi-4pe.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/css/style-convenios.css') ?>">

  <!-- CSS por componente 4PE -->
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/4pe/css/hero.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/4pe/css/que-es.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/4pe/css/itenerario-formativo.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/4pe/css/afiche.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/4pe/css/galeria.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/convenios/4pe/css/form.css') ?>">

  <!-- Iconos -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <!-- Favicon básico (PNG) -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/img/inicio/logos/cecnsr.png?v=1'); ?>">
  <link rel="shortcut icon" href="<?= asset('assets/img/inicio/logos/cecnsr.png?v=1'); ?>" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/img/inicio/logos/cecnsr.png?v=1'); ?>">
  <meta name="theme-color" content="#7f2d3c">

  <!-- SEO/OG -->
  <link rel="canonical" href="https://www.cecnsrosariosv.com/contribuciones/sitececnsr/convenios-psicologia.php">
  <meta name="description" content="Psicología Individual & 4 Puntos Esenciales: formación humana para fortalecer bienestar y convivencia en el CECNSR.">
  <meta property="og:title" content="CECNSR — Psicología Individual & 4 Puntos Esenciales">
  <meta property="og:description" content="Formación humana basada en Alfred Adler para convivencia pacífica y responsabilidad social.">
  <meta property="og:image" content="<?= asset('assets/og/pi-4pe-cover.jpg') ?>">
  <meta property="og:url" content="https://www.cecnsrosariosv.com/contribuciones/sitececnsr/convenios-psicologia.php">
  <meta name="twitter:card" content="summary_large_image">
</head>

<body>

  <?php require_once PROJECT_PATH . 'assets/partials/header.php'; ?>
  <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

  <?php
  require_once PROJECT_PATH . 'assets/partials/convenios/4pe/main.php';
  ?>

  <?php require_once PROJECT_PATH . 'assets/partials/footer.php'; ?>

  <!-- JS global del sitio (si existe) -->
  <script src="<?= asset('script.js') ?>"></script>

  <!-- JS por componente 4PE -->
  <script src="<?= asset('assets/partials/convenios/4pe/js/hero.js') ?>"></script>
  <script src="<?= asset('assets/partials/convenios/4pe/js/que-es.js') ?>"></script>
  <script src="<?= asset('assets/partials/convenios/4pe/js/itenerario-formativo.js') ?>"></script>
  <script src="<?= asset('assets/partials/convenios/4pe/js/afiche.js') ?>"></script>
  <script src="<?= asset('assets/partials/convenios/4pe/js/galeria.js') ?>"></script>
  <script src="<?= asset('assets/partials/convenios/4pe/js/form.js') ?>"></script>

  <?php if (defined('RECAPTCHA_ENABLED') && RECAPTCHA_ENABLED): ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <?php endif; ?>

  <!-- Utilidad: calcula alto del header y lo expone como CSS var -->
  <script>
    (function() {
      const header = document.querySelector(".main-header");
      const set = () =>
        document.documentElement.style.setProperty(
          "--header-h",
          header?.offsetHeight + "px"
        );
      window.addEventListener("load", set, {
        once: true
      });
      window.addEventListener("resize", set);
    })();
  </script>

</body>

</html>
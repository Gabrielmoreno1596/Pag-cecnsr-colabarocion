<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Segundo Ciclo - CECNSR</title>

  <!-- ESTILOS ESPECÍFICOS DEL SEGUNDO CICLO (MISMO DISEÑO, AHORA DIVIDIDO) -->
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo2/css/hero.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo2/css/metas.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo2/css/experiencias.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo2/css/trayectoria.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo2/css/valores.css'); ?>" />
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo2/css/admision.css'); ?>" />

  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- Favicon básico (PNG) -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <meta name="theme-color" content="#7f2d3c">
</head>

<body>

  <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>
  <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

  <main>
    <?php require PROJECT_PATH . 'assets/partials/oferta-academica/oferta-ciclo2/main.php'; ?>
  </main>

  <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>

  <!-- JS GLOBAL DEL MENÚ (YA LO TIENES) -->
  <script defer src="script.js"></script>

  <!-- JS ESPECÍFICO PARA TABS + ACORDEÓN DE II CICLO -->
  <script defer src="<?= asset('assets/partials/oferta-academica/oferta-ciclo2/js/ciclo2-tabs-accordion.js'); ?>"></script>
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo2/css/oferta-ciclo2.css'); ?>">
  <script type="module" src="<?= asset('assets/partials/oferta-academica/oferta-ciclo2/js/app.js'); ?>"></script>

</body>

</html>
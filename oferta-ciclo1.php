<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CECNSR - Primer Ciclo</title>

  <!-- Normalize (opcional, lo mantengo para respetar tu base previa) -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />

  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- CSS por componentes -->
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo1/css/hero.css'); ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo1/css/metas.css'); ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo1/css/trayectoria-academica.css'); ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo1/css/valores.css'); ?>">
  <link rel="stylesheet" href="<?= asset('assets/partials/oferta-academica/oferta-ciclo1/css/admision.css'); ?>">

  <!-- Favicon (si ya lo usas globalmente, puedes omitirlo aquí) -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <meta name="theme-color" content="#7f2d3c">
</head>

<body>

  <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>
  <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

  <?php require_once PROJECT_PATH . 'assets/partials/oferta-academica/oferta-ciclo1/main.php'; ?>

  <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>

  <!-- JS propios del I Ciclo -->
  <script defer src="<?= asset('assets/partials/oferta-academica/oferta-ciclo1/js/trayectoria-academica.js'); ?>"></script>
  <script defer src="<?= asset('assets/partials/oferta-academica/oferta-ciclo1/js/admision.js'); ?>"></script>

  <!-- JS global del sitio (si tu header depende de él) -->
  <script defer src="<?= asset('script.js'); ?>"></script>
</body>

</html>
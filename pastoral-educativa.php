<?php require_once __DIR__ . '/config.php'; ?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CECNSR | Pastoral Educativa</title>

    <!-- CSS de Pastoral (bundle) -->


    <!-- CSS global del sitio -->
    <link rel="stylesheet" href="<?= asset('styles.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/partials/pastoral-educativa/css/pastoral.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
    <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
    <meta name="theme-color" content="#7f2d3c">

    <script>
        document.documentElement.classList.add('has-js');
    </script>
</head>

<body>
    <?php require PROJECT_PATH . 'assets/partials/header.php'; ?>
    <?php require PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

    <?php require PROJECT_PATH . 'assets/partials/pastoral-educativa/main.php'; ?>

    <?php require PROJECT_PATH . 'assets/partials/footer.php'; ?>

    <!-- JS (module) de Pastoral -->
    <script type="module" src="<?= asset('assets/partials/pastoral-educativa/js/app.js') ?>"></script>
</body>

</html>
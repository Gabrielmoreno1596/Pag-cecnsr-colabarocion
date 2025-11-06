<?php require_once __DIR__ . '/config.php'; ?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CECNSR | Pastoral Educativa</title>

    <!-- CSS de Pastoral (componentes) -->
    <link rel="stylesheet" href="<?= asset('assets/partials/pastoral-educativa/css/components/tokens.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/partials/pastoral-educativa/css/components/base.css') ?>">

    <link rel="stylesheet" href="<?= asset('assets/partials/pastoral-educativa/css/components/hero.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/partials/pastoral-educativa/css/components/mision.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/partials/pastoral-educativa/css/components/desempenos.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/partials/pastoral-educativa/css/components/diagramas.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/partials/pastoral-educativa/css/components/oferta.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/partials/pastoral-educativa/css/components/galeria.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/partials/pastoral-educativa/css/components/himno.css') ?>">

    <link rel="stylesheet" href="<?= asset('assets/partials/pastoral-educativa/css/components/lightbox.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/partials/pastoral-educativa/css/components/reveal.css') ?>">

    <!-- CSS global del sitio -->
    <link rel="stylesheet" href="<?= asset('styles.css') ?>">

    <!-- Iconos / Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png') ?>">
    <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png') ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
    <script>
        window.__ASSET_VER = '<?= ASSET_VER ?>';
    </script>
    <script type="module" src="<?= asset('assets/partials/pastoral-educativa/js/app.js') ?>"></script>
</body>

</html>
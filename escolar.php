<?php require_once __DIR__ . '/config.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CECNSR - Listas de útiles</title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link rel="stylesheet" href="<?= asset('styles.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/partials/escolar/css/escolar.css') ?>">

    <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
    <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
    <meta name="theme-color" content="#7f2d3c">
</head>

<body>

    <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>

    <?php
    include PROJECT_PATH . 'assets/partials/escolar/main.php';
    ?>

    <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>

    <script src="<?= asset('assets/partials/escolar/js/levelbar.js') ?>"></script>
    <script src="<?= asset('assets/partials/escolar/js/checklist.js') ?>"></script>
    <script src="<?= asset('assets/partials/escolar/js/actions.js') ?>"></script>
    <script src="<?= asset('assets/partials/escolar/js/escolar.js') ?>"></script>
</body>

</html>
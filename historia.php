<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CECNSR - Nuestra historia</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />


    <link rel="stylesheet" href="<?= asset('styles.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/style-convenios.css') ?>">

    <!-- Iconos -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png') ?>" type="image/x-icon" />

    <?php
    require_once __DIR__ . '/config.php';

    /* SEO / HEAD específicos de la página */
    $PAGE_TITLE = 'CECNSR — Nuestra historia';
    $canonical  = BASE_URL . 'historia.php';

    $PAGE_HEAD = [
        '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">',
        '<link rel="stylesheet" href="' . asset('assets/css/under-dev.css') . '">',  // estilos del aviso
        '<link rel="shortcut icon" href="' . asset('assets/1_CECNSR.png') . '" type="image/x-icon">',

        '<link rel="canonical" href="' . $canonical . '">',
        '<meta name="description" content="Conoce la historia del Complejo Educativo Católico Nuestra Señora del Rosario (CECNSR).">',
        '<meta property="og:title" content="CECNSR — Nuestra historia">',
        '<meta property="og:description" content="Recorrido de nuestra identidad e hitos institucionales.">',
        '<meta property="og:image" content="' . asset('assets/og/historia-cover.jpg') . '">', /* opcional si tienes esta imagen */
        '<meta property="og:url" content="' . $canonical . '">',
        '<meta name="twitter:card" content="summary_large_image">',
    ];

    require_once PROJECT_PATH . 'assets/partials/header.php';
    ?>

</head>

<body>

    <?php require_once PROJECT_PATH . 'assets/partials/header.php'; ?>
    <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

    <?php require_once PROJECT_PATH . 'assets/partials/ui/under-dev.php'; ?>
    <?php require_once PROJECT_PATH . 'assets/partials/footer.php'; ?>




</body>

</html>
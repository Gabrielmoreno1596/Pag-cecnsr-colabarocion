<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/contribuciones/sitececnsr/config.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CECNSR | Proyecto Dual</title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />

    <link rel="stylesheet" href="<?= asset('styles.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/style-dual.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/style-convenios.css') ?>">

    <link rel="shortcut icon" href="assets/1_CECNSR.png" type="image/x-icon" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <!-- SEO/OG -->
    <link rel="canonical" href="https://www.cecnsrosariosv.com/contribuciones/sitececnsr/pasch.php">
    <meta name="description" content="El CECNSR participa en PASCH: alemán, interculturalidad y oportunidades para estudiantes.">
    <meta property="og:title" content="CECNSR — Colegios PASCH">
    <meta property="og:description" content="Aprendizaje de alemán, interculturalidad y oportunidades PASCH.">
    <meta property="og:image" content="<?= asset('assets/og/pasch-cover.jpg') ?>">
    <meta property="og:url" content="https://www.cecnsrosariosv.com/contribuciones/sitececnsr/pasch.php">
    <meta name="twitter:card" content="summary_large_image">

</head>

<body>
    <?php require __DIR__ . '/assets/partials/header.php'; ?>
    <main class="container legal-page">
        <?php require __DIR__ . '/assets/partials/legal/privacidad.php'; ?>
    </main>
    <?php require __DIR__ . '/assets/partials/footer.php'; ?>


</body>

</html>
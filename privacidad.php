<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CECNSR | Aviso Legal</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Favicon básico (PNG) -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
    <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
    <meta name="theme-color" content="#7f2d3c">
</head>

<body>
    <?php require_once PROJECT_PATH . 'assets/partials/header.php'; ?>
    <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>
    <main class="container legal-page">
        <?php require __DIR__ . '/assets/partials/legal/privacidad.php'; ?>
    </main>
    <?php require_once PROJECT_PATH . 'assets/partials/footer.php'; ?>


</body>

</html>
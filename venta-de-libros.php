<?php require_once __DIR__ . '/config.php'; ?>
<?php $notice = require PROJECT_PATH . 'assets/partials/avisos/data/libros-2026.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($notice['title']); ?> | CECNSR</title>

    <link rel="stylesheet" href="<?= asset('styles.css'); ?>">
    <link rel="stylesheet" href="<?= asset('assets/partials/avisos/css/notice.css'); ?>">
    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
    <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
    <meta name="theme-color" content="#7f2d3c">



</head>

<body>
    <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>
    <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

    <main style="background:#001e3f;">
        <?php include PROJECT_PATH . 'assets/partials/avisos/components/notice.php'; ?>
        <?php include PROJECT_PATH . 'assets/partials/components/consulta/consulta.php'; ?>
    </main>



    <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>
    <script defer src="<?= asset('assets/partials/avisos/js/notice.js'); ?>"></script>
</body>

</html>
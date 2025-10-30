<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CECNSR | Aviso Legal</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <?php require_once PROJECT_PATH . 'assets/partials/header.php'; ?>
    <main class="container legal-page" id="main-content">
        <?php require_once PROJECT_PATH . 'assets/partials/legal/aviso-legal.php'; ?>
    </main>
    <?php require_once PROJECT_PATH . 'assets/partials/footer.php'; ?>


</body>

</html>
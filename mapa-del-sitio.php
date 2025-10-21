<?php
// 1) Carga la config SIEMPRE primero
require_once __DIR__ . '/config.php';

// 2) Incluye header/footer y partials usando PROJECT_PATH
require_once PROJECT_PATH . 'assets/partials/header.php';
?>
<main class="container legal-page" id="main-content">
    <?php require_once PROJECT_PATH . 'assets/partials/legal/mapa-del-sitio.php'; ?>
</main>
<?php require_once PROJECT_PATH . 'assets/partials/footer.php'; ?>
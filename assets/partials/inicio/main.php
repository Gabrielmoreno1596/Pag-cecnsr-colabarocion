<?php
$BASE_INICIO = PROJECT_PATH . 'assets/partials/inicio/';

// Data del módulo Inicio
require_once $BASE_INICIO . 'data/hero-data.php';
require_once $BASE_INICIO . 'data/quienes-data.php';
?>

<main id="main-content">
    <?php require $BASE_INICIO . 'components/hero.php'; ?>
    <?php require $BASE_INICIO . 'components/quienes-somos.php'; ?>
</main>
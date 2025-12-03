<?php
$BASE_OFERTA_INICIAL = PROJECT_PATH . 'assets/partials/oferta-academica/oferta-inicial/';

// Data de la página
require_once $BASE_OFERTA_INICIAL . 'data/oferta-inicial-data.php';
?>

<main>
    <?php require $BASE_OFERTA_INICIAL . 'components/hero.php'; ?>
    <?php require $BASE_OFERTA_INICIAL . 'components/perfil-estudiante.php'; ?>
    <?php require $BASE_OFERTA_INICIAL . 'components/grados-edades.php'; ?>
    <?php require $BASE_OFERTA_INICIAL . 'components/areas-clave.php'; ?>
    <?php require $BASE_OFERTA_INICIAL . 'components/servicios-valores.php'; ?>
    <?php require $BASE_OFERTA_INICIAL . 'components/proceso-admision.php'; ?>
    <?php require $BASE_OFERTA_INICIAL . 'components/entorno-parvularia.php'; ?>
</main>
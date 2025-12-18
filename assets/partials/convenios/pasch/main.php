<?php
// Base pública para assets de PASCH
$PASCH_BASE = 'assets/partials/convenios/pasch';

// Cargar data
$heroData         = require __DIR__ . '/data/hero.php';
$queEsData        = require __DIR__ . '/data/que-es.php';
$informacionData  = require __DIR__ . '/data/informacion.php';
$requisitosData   = require __DIR__ . '/data/requisitos.php';
$experienciasData = require __DIR__ . '/data/experiencias.php';
$galeriaData      = require __DIR__ . '/data/galeria.php';
?>

<?php require __DIR__ . '/components/hero.php'; ?>

<section class="main-content">
    <?php require __DIR__ . '/components/que-es.php'; ?>
    <?php require __DIR__ . '/components/informacion.php'; ?>
    <?php require __DIR__ . '/components/requisitos.php'; ?>
    <?php require __DIR__ . '/components/experiencias.php'; ?>
    <?php require __DIR__ . '/components/galeria.php'; ?>
</section>
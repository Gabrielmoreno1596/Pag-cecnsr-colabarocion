<?php
// Base pública para assets de PI & 4PE
$PI4PE_BASE = 'assets/partials/convenios/4pe';

// Cargar data (cada archivo retorna un array)
$heroData        = require __DIR__ . '/data/hero.php';
$queEsData       = require __DIR__ . '/data/que-es.php';
$itinerarioData  = require __DIR__ . '/data/itenerario-formativo.php';
$aficheData      = require __DIR__ . '/data/afiche.php';
$galeriaData     = require __DIR__ . '/data/galeria.php';
$formData        = require __DIR__ . '/data/form.php';
?>

<?php require __DIR__ . '/components/hero.php'; ?>

<section class="main-content">
  <?php require __DIR__ . '/components/que-es.php'; ?>
  <?php require __DIR__ . '/components/itenerario-formativo.php'; ?>
  <?php require __DIR__ . '/components/afiche.php'; ?>
  <?php require __DIR__ . '/components/galeria.php'; ?>
  <?php require __DIR__ . '/components/form.php'; ?>
</section>

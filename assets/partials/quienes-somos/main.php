<?php
$data = require __DIR__ . '/data/quienes-somos.php';
?>

<?php require __DIR__ . '/components/hero.php'; ?>

<?php require __DIR__ . '/components/sticky-nav.php'; ?>

<main class="qs-main">
  <!-- Banda: Nuestra esencia (tarjeta editorial) -->
  <div class="band band--surface qs-band" id="qs-esencia">
    <?php require __DIR__ . '/components/esencia.php'; ?>
  </div>

  <!-- Banda: Identidad (Misión / Visión / Compromiso) en un bloque limpio y ordenado -->
  <div class="band band--surface qs-band" id="qs-identidad">
    <?php require __DIR__ . '/components/identidad.php'; ?>
  </div>

  <!-- Banda: Historia (mismo look & feel de Inicio) -->
  <div class="band band--light band--qs qs-band" id="qs-historia">
    <?php require __DIR__ . '/components/historia.php'; ?>
  </div>

  <!-- Banda: Principios Educativos (nuevo) -->
  <div class="band band--soft qs-band" id="qs-principios-educativos">
    <?php require __DIR__ . '/components/principios-educativos.php'; ?>
  </div>

  <!-- Banda: Principios congregacionales -->
  <div class="band band--surface qs-band" id="qs-principios">
    <?php require __DIR__ . '/components/principios.php'; ?>
  </div>

  <!-- Banda: Valores -->
  <div class="band band--surface qs-band" id="qs-valores">
    <?php require __DIR__ . '/components/valores.php'; ?>
  </div>

  <!-- Banda: CTA final -->
  <div class="band band--cta qs-band" id="qs-cta-final">
    <?php require __DIR__ . '/components/cta-final.php'; ?>
  </div>
</main>

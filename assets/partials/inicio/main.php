<?php
// Inicio (Home)
// Ajustes IU/UX solicitados:
// A) Reordenar secciones + crear bloque de confianza + accesos rápidos.
// C) Consistencia visual y uso controlado del “juego” de fondos.

$bgInfra = asset('assets/img/inicio/historia/h4.jpeg');

$home = require __DIR__ . '/data/home-structure.php';
?>

<?php require_once __DIR__ . '/components/hero.php'; ?>

<main class="home-main">
  <!-- 1) Accesos rápidos -->
  <div class="band band--light band--quicklinks">
    <?php
    $section = $home['quicklinks'];
    require __DIR__ . '/components/home-cards.php';
    ?>
  </div>

  <?php include __DIR__ . '/../components/eventos/eventos.php'; ?>


  <!-- 2) ¿Quiénes somos? (resumen + CTA) -->
  <div class="band band--light band--qs">
    <?php require_once __DIR__ . '/components/quienes-somos.php'; ?>
  </div>

  <!-- 3) Oferta Académica -->
  <div class="band band--light band--oferta">
    <?php
    $section = $home['oferta'];
    require __DIR__ . '/components/home-cards.php';
    ?>
  </div>

  <!-- 4) Convenios -->
  <div class="band band--light band--convenios">
    <?php
    $section = $home['convenios'];
    require __DIR__ . '/components/convenios-logos.php';
    ?>
  </div>

  <!-- 5) Pastoral Educativa -->
  <div class="band band--light band--pastoral">
    <?php
    $section = $home['pastoral'];
    require __DIR__ . '/components/home-cards.php';
    ?>
  </div>

  <!-- 6) Infraestructura (con “juego” de fondo) -->
  <div class="band band--pinned-bg band--infra" style="--band-bg: url('<?= $bgInfra; ?>');">
    <?php require_once __DIR__ . '/components/infraestructura.php'; ?>
  </div>

</main>
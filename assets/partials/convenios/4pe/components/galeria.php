<?php
$g = $galeriaData;
$images = $g['images'];
?>

<section class="section inf-carousel">
  <div class="container">
    <p class="eyebrow-pi"><?= $g['eyebrow'] ?></p>
    <h2 class="ic-title"><?= $g['title'] ?></h2>
    <div class="title-divider" aria-hidden="true"></div>

    <div class="infinite-reel" id="infinite-reel" aria-label="Carrusel de imágenes">
      <div class="track">
        <!-- Bloque A (original) -->
        <?php foreach ($images as $im): ?>
          <figure class="card">
            <img
              src="<?= $im['src'] ?>"
              data-full="<?= $im['src'] ?>"
              alt="<?= htmlspecialchars($im['alt']) ?>"
              loading="lazy" decoding="async">
          </figure>
        <?php endforeach; ?>

        <!-- Bloque B (duplicado para bucle perfecto) -->
        <?php foreach ($images as $im): ?>
          <figure class="card">
            <img
              src="<?= $im['src'] ?>"
              data-full="<?= $im['src'] ?>"
              alt="<?= htmlspecialchars($im['alt']) ?> (duplicada)"
              loading="lazy" decoding="async">
          </figure>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- Lightbox -->
  <div class="lightbox" id="glightbox" role="dialog" aria-modal="true" aria-labelledby="glb-title" hidden>
    <div class="lightbox__backdrop" data-close></div>
    <div class="lightbox__dialog">
      <header class="lightbox__head">
        <h3 id="glb-title" class="sr-only">Vista ampliada</h3>
        <div class="lightbox__count" aria-live="polite"></div>
        <button class="lightbox__close" aria-label="Cerrar" data-close>✕</button>
      </header>

      <div class="lightbox__stage">
        <button class="nav prev" aria-label="Anterior">‹</button>
        <img id="glb-img" alt="" loading="lazy" decoding="async">
        <button class="nav next" aria-label="Siguiente">›</button>
      </div>
    </div>
  </div>
</section>

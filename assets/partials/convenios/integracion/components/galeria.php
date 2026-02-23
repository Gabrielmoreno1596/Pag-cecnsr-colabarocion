<?php $data = require __DIR__ . '/../data/galeria.php'; ?>
<section class="section int-gallery">
  <div class="container">
    <h2 class="section-title"><?= htmlspecialchars($data['title'] ?? 'Galería') ?></h2>
    <div class="title-divider" aria-hidden="true"></div>

    <div class="gallery">
      <?php foreach (($data['images'] ?? []) as $im): ?>
        <a href="<?= htmlspecialchars($im['src'] ?? '') ?>" data-caption="<?= htmlspecialchars($im['alt'] ?? '') ?>">
          <img src="<?= htmlspecialchars($im['src'] ?? '') ?>"
               alt="<?= htmlspecialchars($im['alt'] ?? '') ?>"
               loading="lazy" decoding="async" />
        </a>
      <?php endforeach; ?>
    </div>

    <?php if (!empty($data['credits'])): ?>
      <p class="credits"><?= htmlspecialchars($data['credits']) ?></p>
    <?php endif; ?>
  </div>

  <div id="lb" class="lb" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Visor de imágenes">
    <button class="lb__close" aria-label="Cerrar (Esc)">✕</button>

    <figure class="lb__figure">
      <img class="lb__img" alt="" loading="lazy" decoding="async" />
      <figcaption class="lb__cap">
        <span class="lb__text"></span>
        <span class="lb__count"></span>
      </figcaption>
    </figure>

    <button class="lb__nav lb__prev" aria-label="Anterior">‹</button>
    <button class="lb__nav lb__next" aria-label="Siguiente">›</button>
  </div>
</section>

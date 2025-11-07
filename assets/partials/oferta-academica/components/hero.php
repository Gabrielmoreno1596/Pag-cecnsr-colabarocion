<?php if (!empty($data['hero'])): $h = $data['hero']; ?>
<section class="oferta-academica-hero">
  <div class="oferta-academica-hero__wrap container">
    <h1 class="oferta-academica-hero__title"><?= htmlspecialchars($data['title']) ?></h1>
    <?php if (!empty($data['lead'])): ?>
      <p class="oferta-academica-hero__lead"><?= htmlspecialchars($data['lead']) ?></p>
    <?php endif; ?>

    <?php
      // Usa el helper de imÃ¡genes: fuente en assets/, optimizadas en assets_web/
      echo picture_tag(
        $h['image'],
        $h['alt'] ?? $data['title'],
        $h['sizes'] ?? '100vw',
        $h['widths'] ?? [1200,1600,2000],
        true,              // AVIF habilitado (ajusta si tu IM no soporta)
        BASE_URL
      );
    ?>
  </div>
</section>
<?php endif; ?>

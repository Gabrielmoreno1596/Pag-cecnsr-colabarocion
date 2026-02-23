<?php
/**
 * Sección: Valores
 * - Nuevo diseño: limpio (grid + 1 valor destacado)
 * - Pensado para lectura rápida sin saturar fondos
 */

$val = $data['valores'] ?? [];
$items = $val['items'] ?? [];
$featured = $val['featured'] ?? ($items[0] ?? '');

// Si el valor destacado está dentro del listado, lo quitamos para no repetir
$gridItems = $items;
if ($featured && ($k = array_search($featured, $gridItems, true)) !== false) {
  unset($gridItems[$k]);
  $gridItems = array_values($gridItems);
}
?>

<section class="section-padding qs-valores">
  <header class="qs-head" data-reveal="up">
    <span class="qs-eyebrow">Convivencia y cultura institucional</span>
    <h2 class="section-title"><?= htmlspecialchars($val['title'] ?? 'Nuestros Valores'); ?></h2>
    <?php if (!empty($val['subtitle'])): ?>
      <p class="qs-lead" data-reveal="up" data-reveal-delay="70"><?= htmlspecialchars($val['subtitle']); ?></p>
    <?php else: ?>
      <p class="qs-lead" data-reveal="up" data-reveal-delay="70">Valores que guían nuestra vida, servicio y convivencia dentro de la comunidad educativa.</p>
    <?php endif; ?>
  </header>

  <div class="qs-values" data-reveal="fade" data-reveal-delay="140">
    <?php if ($featured): ?>
      <article class="qs-value-feature">
        <div class="qs-value-feature__icon" aria-hidden="true"><i class="fa-solid fa-star"></i></div>
        <div>
          <p class="qs-value-feature__eyebrow">Valor central</p>
          <h3 class="qs-value-feature__title"><?= htmlspecialchars($featured); ?></h3>
          <p class="qs-value-feature__text">Lo practicamos con acciones diarias: respeto, empatía, servicio y responsabilidad compartida.</p>
        </div>
      </article>
    <?php endif; ?>

    <div class="qs-values-grid">
      <?php foreach ($gridItems as $i => $label): ?>
        <article class="qs-value-card" data-reveal="up" data-reveal-delay="<?= 160 + ($i * 35); ?>">
          <span class="qs-value-card__dot" aria-hidden="true"></span>
          <span class="qs-value-card__text"><?= htmlspecialchars($label); ?></span>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

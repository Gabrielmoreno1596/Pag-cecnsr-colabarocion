<?php
/**
 * Componente reutilizable: grid de tarjetas para Inicio.
 * Requiere $section (array) con:
 * - id, eyebrow, title, subtitle, variant, items[]
 */

if (!isset($section) || !is_array($section)) {
  return;
}

$id = $section['id'] ?? '';
$eyebrow = $section['eyebrow'] ?? '';
$title = $section['title'] ?? '';
$subtitle = $section['subtitle'] ?? '';
$variant = $section['variant'] ?? 'grid';
$items = $section['items'] ?? [];

?>

<section id="<?= htmlspecialchars($id); ?>" class="home-cards home-cards--<?= htmlspecialchars($variant); ?> section-padding">
  <header class="home-cards__head" data-reveal="up">
    <?php if ($eyebrow): ?>
      <p class="home-cards__eyebrow"><?= htmlspecialchars($eyebrow); ?></p>
    <?php endif; ?>

    <?php if ($title): ?>
      <h2 class="section-title home-cards__title"><?= htmlspecialchars($title); ?></h2>
    <?php endif; ?>

    <?php if ($subtitle): ?>
      <p class="home-cards__sub"><?= htmlspecialchars($subtitle); ?></p>
    <?php endif; ?>
  </header>

  <div class="home-cards__grid" role="list">
    <?php foreach ($items as $i => $it): ?>
      <?php
        $href = $it['href'] ?? '#';
        $img = $it['image'] ?? '';
        $icon = $it['icon'] ?? 'fa-circle-arrow-right';
        $t = $it['title'] ?? '';
        $d = $it['desc'] ?? '';
        $delay = 80 + ($i * 60);
      ?>
      <a
        class="home-card"
        href="<?= htmlspecialchars($href); ?>"
        role="listitem"
        data-reveal="up"
        data-reveal-delay="<?= (int)$delay; ?>"
        <?php if (!empty($it['external'])): ?>
          target="_blank" rel="noopener"
        <?php endif; ?>
      >
        <span class="home-card__bg" aria-hidden="true" style="--card-bg: url('<?= htmlspecialchars($img); ?>');"></span>
        <span class="home-card__content">
          <span class="home-card__icon" aria-hidden="true">
            <i class="fa-solid <?= htmlspecialchars($icon); ?>"></i>
          </span>
          <span class="home-card__text">
            <span class="home-card__title"><?= htmlspecialchars($t); ?></span>
            <span class="home-card__desc"><?= htmlspecialchars($d); ?></span>
          </span>
          <span class="home-card__arrow" aria-hidden="true">
            <i class="fa-solid fa-arrow-right"></i>
          </span>
        </span>
      </a>
    <?php endforeach; ?>
  </div>
</section>

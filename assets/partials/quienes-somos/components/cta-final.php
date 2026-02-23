<?php
$cta = $data['cta_final'] ?? [];
if (empty($cta) || !is_array($cta)) {
  return;
}

$title = $cta['title'] ?? '';
$sub   = $cta['subtitle'] ?? '';
$items = (isset($cta['items']) && is_array($cta['items'])) ? $cta['items'] : [];
?>

<section class="qs-cta-final" aria-label="Llamados a la acción">
  <div class="qs-cta-final__inner">
    <div class="qs-cta-final__head" data-reveal="up">
      <?php if (!empty($title)): ?>
        <h2 class="qs-cta-final__title" data-reveal="up" data-reveal-delay="80">
          <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>
        </h2>
      <?php endif; ?>

      <?php if (!empty($sub)): ?>
        <p class="qs-cta-final__subtitle" data-reveal="up" data-reveal-delay="160">
          <?= htmlspecialchars($sub, ENT_QUOTES, 'UTF-8'); ?>
        </p>
      <?php endif; ?>
    </div>

    <?php if (!empty($items)): ?>
      <div class="qs-cta-final__grid" data-reveal="up" data-reveal-delay="220">
        <?php foreach ($items as $it): ?>
          <a class="qs-cta-final__card" href="<?= asset($it['href'] ?? '#'); ?>">
            <span class="qs-cta-final__icon" aria-hidden="true">
              <i class="<?= htmlspecialchars($it['icon'] ?? 'fa-solid fa-arrow-right', ENT_QUOTES, 'UTF-8'); ?>"></i>
            </span>
            <span class="qs-cta-final__meta">
              <strong class="qs-cta-final__label"><?= htmlspecialchars($it['title'] ?? 'Ver más', ENT_QUOTES, 'UTF-8'); ?></strong>
              <span class="qs-cta-final__desc"><?= htmlspecialchars($it['desc'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
            </span>
            <span class="qs-cta-final__chev" aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></span>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

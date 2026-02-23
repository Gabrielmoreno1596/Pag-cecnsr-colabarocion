<?php
$home = require __DIR__ . '/../data/home-structure.php';
$trust = $home['trust'] ?? [];
?>

<?php
$trust_context = $trust_context ?? '';
$trust_class = 'trust-strip' . ($trust_context ? (' trust-strip--' . $trust_context) : '');
?>

<section class="<?= htmlspecialchars($trust_class); ?>" aria-label="Datos de confianza">
  <div class="trust-strip__inner">
    <?php foreach ($trust as $i => $t): ?>
      <div class="trust-chip" data-reveal="up" data-reveal-delay="<?= (int)(80 * $i); ?>">
        <span class="trust-chip__icon" aria-hidden="true">
          <i class="fa-solid <?= htmlspecialchars($t['icon'] ?? 'fa-circle-check'); ?>"></i>
        </span>
        <span class="trust-chip__text">
          <strong class="trust-chip__value">
            <?= str_replace(' ', '&nbsp;', htmlspecialchars($t['value'] ?? '', ENT_QUOTES, 'UTF-8')); ?>
          </strong>
          <span class="trust-chip__label"><?= htmlspecialchars($t['label'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>

        </span>
      </div>
    <?php endforeach; ?>
  </div>
</section>
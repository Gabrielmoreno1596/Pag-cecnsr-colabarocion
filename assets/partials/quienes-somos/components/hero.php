<?php
$hero = $data['hero'] ?? [];
$bg = $hero['bg'] ?? '';
$trust = $hero['trust'] ?? [];
?>

<section class="qs-hero" style="--qs-hero-bg: url('<?= asset($bg); ?>');">
  <div class="qs-hero__overlay" aria-hidden="true"></div>

  <div class="qs-hero__content">
    <p class="qs-hero__breadcrumb" data-reveal="fade">
      <a href="<?= asset('index.php'); ?>">Inicio</a>
      <span aria-hidden="true">/</span>
      <span><?= htmlspecialchars($hero['title'] ?? '¿Quiénes Somos?'); ?></span>
    </p>

    <h1 class="qs-hero__title" data-reveal="up"><?= htmlspecialchars($hero['title'] ?? '¿Quiénes Somos?'); ?></h1>
    <p class="qs-hero__subtitle" data-reveal="up" data-reveal-delay="120">
      <?= htmlspecialchars($hero['subtitle'] ?? ''); ?>
    </p>

    <?php
      // Trust chips (mismo look & feel que Inicio)
      // Preferimos la versión estructurada ($hero['trust']). Si no existe, caemos en badges.
      $fallback = [];
      if (empty($trust) && !empty($hero['badges']) && is_array($hero['badges'])) {
        foreach ($hero['badges'] as $b) {
          $fallback[] = [
            'icon' => 'fa-circle-check',
            'value' => $b,
            'label' => '',
          ];
        }
      }
      $trustList = !empty($trust) ? $trust : $fallback;
    ?>

    <?php if (!empty($trustList)): ?>
      <div class="trust-strip trust-strip--hero" aria-label="Datos de confianza" data-reveal="up" data-reveal-delay="220">
        <div class="trust-strip__inner">
          <?php foreach ($trustList as $i => $t): ?>
            <div class="trust-chip" data-qs-trust data-reveal="up" data-reveal-delay="<?= (int)(260 + ($i * 80)); ?>">
              <span class="trust-chip__icon" aria-hidden="true">
                <i class="fa-solid <?= htmlspecialchars($t['icon'] ?? 'fa-circle-check'); ?>"></i>
              </span>
              <span class="trust-chip__text">
                <strong class="trust-chip__value"><?= htmlspecialchars($t['value'] ?? '', ENT_QUOTES, 'UTF-8'); ?></strong>
                <?php if (!empty($t['label'])): ?>
                  <span class="trust-chip__label"><?= htmlspecialchars($t['label'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                <?php endif; ?>
              </span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if (!empty($hero['cta'])): ?>
      <a class="qs-hero__cta" href="<?= asset($hero['cta']['href'] ?? 'index.php'); ?>" data-reveal="up" data-reveal-delay="320">
        <?= htmlspecialchars($hero['cta']['text'] ?? 'Volver'); ?>
      </a>
    <?php endif; ?>
  </div>
</section>

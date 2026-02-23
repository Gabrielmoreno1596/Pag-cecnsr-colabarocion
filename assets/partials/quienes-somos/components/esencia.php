<?php
$es = $data['esencia'] ?? [];
if (empty($es) || !is_array($es)) {
  return;
}

$eyebrow = $es['eyebrow'] ?? 'Nuestra esencia';
$title   = $es['title'] ?? '';
$text    = $es['text'] ?? '';
$quote   = $es['quote'] ?? '';
$high    = (isset($es['highlights']) && is_array($es['highlights'])) ? $es['highlights'] : [];
$image   = $es['image'] ?? '';
?>

<section class="qs-essence" aria-label="<?= htmlspecialchars($eyebrow, ENT_QUOTES, 'UTF-8'); ?>">
  <div class="qs-essence__grid">

    <div class="qs-essence__card" data-reveal="up">
      <p class="qs-eyebrow" data-reveal="fade"><?= htmlspecialchars($eyebrow, ENT_QUOTES, 'UTF-8'); ?></p>

      <?php if (!empty($title)): ?>
        <h2 class="section-title" data-reveal="up" data-reveal-delay="120">
          <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>
        </h2>
      <?php endif; ?>

      <?php if (!empty($text)): ?>
        <p class="qs-lead" data-reveal="up" data-reveal-delay="200">
          <?= htmlspecialchars($text, ENT_QUOTES, 'UTF-8'); ?>
        </p>
      <?php endif; ?>

      <?php if (!empty($quote)): ?>
        <blockquote class="qs-essence__quote" data-reveal="up" data-reveal-delay="280">
          <span class="qs-essence__quoteMark" aria-hidden="true">“</span>
          <span class="qs-essence__quoteText"><?= htmlspecialchars($quote, ENT_QUOTES, 'UTF-8'); ?></span>
        </blockquote>
      <?php endif; ?>

      <?php if (!empty($high)): ?>
        <div class="qs-essence__high" data-reveal="up" data-reveal-delay="360">
          <?php foreach ($high as $h): ?>
            <div class="qs-essence__pill">
              <span class="qs-essence__pillIcon" aria-hidden="true">
                <i class="<?= htmlspecialchars($h['icon'] ?? 'fa-solid fa-circle-check', ENT_QUOTES, 'UTF-8'); ?>"></i>
              </span>
              <span class="qs-essence__pillText">
                <strong><?= htmlspecialchars($h['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?></strong>
                <span><?= htmlspecialchars($h['desc'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
              </span>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    </div>

    <div class="qs-essence__media" data-reveal="fade" data-reveal-delay="180" style="--qs-es-bg: url('<?= asset($image); ?>');">
      <div class="qs-essence__mediaOverlay" aria-hidden="true"></div>
      <div class="qs-essence__mediaGlow" aria-hidden="true"></div>
    </div>

  </div>
</section>

<?php
$data = require __DIR__ . '/../data/hero.php';
$images = $data['hero_images'] ?? [];
$first = $images[0] ?? '';
?>
<section class="int-hero" aria-labelledby="int-hero-title">
  <div class="int-hero__bg" role="img" aria-label="<?= htmlspecialchars($data['bg_aria'] ?? '') ?>">
    <span class="slide is-on" style="background-image: url('<?= htmlspecialchars($first) ?>')"></span>
    <span class="slide" aria-hidden="true"></span>
  </div>

  <div class="int-hero__overlay"></div>

  <div class="container int-hero__inner">
    <p class="eyebrow"><?= htmlspecialchars($data['eyebrow'] ?? '') ?></p>
    <h1 id="int-hero-title"><?= $data['title'] ?? '' ?></h1>
    <p class="lead"><?= htmlspecialchars($data['lead'] ?? '') ?></p>

    <div class="cta-row">
      <?php foreach (($data['cta'] ?? []) as $cta): ?>
        <a class="<?= htmlspecialchars($cta['class'] ?? '') ?>" href="<?= htmlspecialchars($cta['href'] ?? '#') ?>">
          <?= htmlspecialchars($cta['text'] ?? '') ?>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="int-chips">
    <?php foreach (($data['chips'] ?? []) as $chip): ?>
      <div class="chip">
        <i class="fa-solid <?= htmlspecialchars($chip['icon'] ?? '') ?>"></i>
        <?= htmlspecialchars($chip['text'] ?? '') ?>
      </div>
    <?php endforeach; ?>
  </div>

  <script>
    // Fuente de imágenes para hero.js (sin hardcode en JS)
    window.CECNSR_INTEGRACION_HERO_IMAGES = <?= json_encode($images, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
  </script>
</section>

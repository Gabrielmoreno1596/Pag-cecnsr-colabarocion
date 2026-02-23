<?php
$h = $heroData;
?>

<section class="pi-hero" aria-labelledby="pi-title">
  <div class="pi-hero__content">
    <p class="pi-eyebrow"><?= $h['eyebrow'] ?></p>
    <h1 id="pi-title"><?= $h['title_html'] ?></h1>

    <p class="pi-lead"><?= $h['lead'] ?></p>

    <ul class="pi-badges" aria-label="4 Puntos Esenciales">
      <?php foreach ($h['badges'] as $b): ?>
        <li>
          <img width="34" height="34"
            src="<?= $b['icon'] ?>"
            alt="<?= htmlspecialchars($b['alt']) ?>"
            loading="lazy" decoding="async">
          <i class="fa-solid"></i> <?= $b['label'] ?>
        </li>
      <?php endforeach; ?>
    </ul>

    <div class="pi-cta">
      <?php foreach ($h['cta'] as $cta): ?>
        <a class="<?= $cta['class'] ?>" href="<?= $cta['href'] ?>"><?= $cta['label'] ?></a>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="pi-hero__photo">
    <!-- cinta de aliados -->
    <div class="ally-ribbon" aria-label="Aliados del programa">
      <?php foreach ($h['ally_logos'] as $lg): ?>
        <img src="<?= $lg['src'] ?>" alt="<?= htmlspecialchars($lg['alt']) ?>" loading="lazy" decoding="async" />
      <?php endforeach; ?>
    </div>

    <!-- FOTO PRINCIPAL -->
    <img class="pi-hero__main"
      src="<?= $h['main_image']['src'] ?>"
      alt="<?= htmlspecialchars($h['main_image']['alt']) ?>"
      loading="lazy" decoding="async">

    <!-- REEL animado -->
    <div class="pi-hero__reel" aria-label="Galería de momentos">
      <div class="reel-track">
        <?php foreach ($h['reel'] as $im): ?>
          <img
            src="<?= $im['src'] ?>"
            alt="<?= htmlspecialchars($im['alt']) ?>"
            role="button"
            tabindex="0"
            loading="lazy"
            decoding="async">
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<?php
// usa $heroData del main.php
$h = $heroData;
?>

<section class="hero hero--signature" aria-labelledby="hero-pasch-title">
    <div class="hero__container">

        <div class="hero__col hero__col--text">
            <div class="hero__creds" aria-label="Organizaciones asociadas">
                <?php foreach ($h['logos'] as $logo): ?>
                    <img src="<?= $logo['src'] ?>" alt="<?= htmlspecialchars($logo['alt']) ?>" loading="lazy" decoding="async">
                <?php endforeach; ?>
            </div>

            <p class="hero__eyebrow"><?= $h['eyebrow'] ?></p>
            <h1 id="hero-pasch-title" class="hero__title"><?= $h['title'] ?></h1>

            <div class="title-divider-hero"></div>


            <p class="hero__lead"><?= $h['lead'] ?></p>

            <div class="hero__cta">
                <?php foreach ($h['cta'] as $cta): ?>
                    <a class="<?= $cta['class'] ?>" href="<?= $cta['href'] ?>"><?= $cta['label'] ?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="hero__col hero__col--media">
            <div class="glass-card" id="sig-viewport">
                <figure class="hero__figure">
                    <img id="sig-img"
                        src="<?= $h['slides'][0]['src'] ?>"
                        alt="<?= htmlspecialchars($h['slides'][0]['alt']) ?>"
                        decoding="async" loading="lazy">
                    <figcaption id="sig-caption" class="hero__caption" aria-live="polite"></figcaption>

                    <div class="progress">
                        <div id="sig-progress" class="progress__bar"></div>
                    </div>
                </figure>

                <div class="thumbs" role="tablist" aria-label="Seleccionar imagen" id="sig-thumbs"></div>
            </div>
        </div>

    </div>

    <!-- Data para JS -->
    <script>
        window.__PASCH_HERO__ = <?= json_encode($h['slides'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
    </script>
</section>
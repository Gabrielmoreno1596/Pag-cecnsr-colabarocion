<?php
/* $dHero: eyebrow, title, lead, points[], slides[] */
?>
<section class="dual-hero dual-hero--elegant">
    <div class="dual-hero__container">
        <div class="dual-hero__col dual-hero__col--text">
            <p class="dual-hero__eyebrow"><?= htmlspecialchars($dHero['eyebrow']) ?></p>
            <h1 class="dual-hero__title"><?= htmlspecialchars($dHero['title']) ?></h1>
            <div class="dual-hero__divider"></div>
            <p class="dual-hero__lead"><?= $dHero['lead_html'] ?></p>
            <?php if (!empty($dHero['points'])): ?>
                <ul class="dual-hero__points">
                    <?php foreach ($dHero['points'] as $li): ?>
                        <li><?= htmlspecialchars($li) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <div class="dual-hero__col dual-hero__col--media">
            <figure class="dual-hero__figure dual-carousel" data-interval="5000" aria-labelledby="dual-caption">
                <img id="dual-slide" src="<?= htmlspecialchars($dHero['slides'][0]['src']) ?>"
                    alt="<?= htmlspecialchars($dHero['slides'][0]['alt']) ?>">
                <figcaption class="dual-hero__caption" id="dual-caption"></figcaption>
                <button class="dual-carousel__btn dual-carousel__btn--prev" aria-label="Imagen anterior">‹</button>
                <button class="dual-carousel__btn dual-carousel__btn--next" aria-label="Imagen siguiente">›</button>
                <div class="dual-carousel__dots" role="tablist" aria-label="Galería Proyecto DUAL">
                    <?php foreach ($dHero['slides'] as $i => $_): ?>
                        <button role="tab" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>" data-index="<?= $i ?>"></button>
                    <?php endforeach; ?>
                </div>
            </figure>
        </div>
    </div>
</section>
<script type="application/json" data-hero>
    <?= json_encode(array_map(
        fn($s) => ['src' => $s['src'], 'alt' => $s['alt'] ?? '', 'cap' => $s['cap'] ?? ''],
        $dHero['slides']
    ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>
</script>
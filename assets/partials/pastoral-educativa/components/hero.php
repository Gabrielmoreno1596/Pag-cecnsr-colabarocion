<?php

/**
 * HERO: slideshow + overlay + badge + CTA (data-driven)
 * Requiere que en main.php definas:
 *   $BASE = PROJECT_PATH . 'assets/partials/pastoral-educativa/';
 *   $DATA = $BASE . 'data/';
 */
$data = require $DATA . 'hero-data.php';

// Seguridad básica por si faltan claves
$slides = $data['slides'] ?? [];
$badge  = $data['badge']  ?? null;
$eyebrow = $data['eyebrow'] ?? '';
$title   = $data['title'] ?? '';
$subtitle = $data['subtitle'] ?? '';
$eyebrowSub = $data['eyebrow_sub'] ?? '';
$ctas = $data['ctas'] ?? [];
$duration = (int)($data['duration'] ?? 5000);
?>

<section class="hero" aria-label="Pastoral Educativa CECNSR" data-hero-dur="<?= $duration ?>">
    <!-- Slides -->
    <div class="hero-slideshow" aria-hidden="true">
        <?php foreach ($slides as $i => $s): ?>
            <figure class="hero-slide <?= $i === 0 ? 'active' : '' ?>">
                <img
                    src="<?= htmlspecialchars($s['src']) ?>"
                    alt="<?= htmlspecialchars($s['alt'] ?? '') ?>"
                    loading="<?= $s['loading'] ?? ($i === 0 ? 'eager' : 'lazy') ?>"
                    decoding="<?= $s['decoding'] ?? 'async' ?>"
                    sizes="(max-width: 768px) 100vw, 100vw" />
            </figure>
        <?php endforeach; ?>
    </div>

    <!-- Barra de progreso -->
    <div class="hero__progress" id="heroProgress" aria-hidden="true"></div>

    <!-- Contenido -->
    <div class="container">
        <?php if ($badge && !empty($badge['logo'])): ?>
            <!-- Badge / logotipo vidrio -->
            <div class="hero__badge" data-reveal="down" data-reveal-delay="100">
                <div class="hero__badge-logo">
                    <img
                        class="hero__badge-logo"
                        src="<?= htmlspecialchars($badge['logo']) ?>"
                        alt="<?= htmlspecialchars($badge['alt'] ?? 'Logotipo') ?>">
                </div>
            </div>
        <?php endif; ?>

        <div class="hero__content" data-reveal="up" data-reveal-delay="150">
            <?php if ($eyebrow): ?>
                <span class="eyebrow eyebrow--accent fx-sheen"><?= $eyebrow ?></span>
            <?php endif; ?>

            <?php if ($title): ?>
                <h1 class="hero__title sheen-gold"><?= $title ?></h1>
            <?php endif; ?>

            <?php if ($subtitle): ?>
                <h2 class="hero__title-sub"><?= $subtitle ?></h2>
            <?php endif; ?>

            <?php if ($eyebrowSub): ?>
                <span class="eyebrow-sub"><?= $eyebrowSub ?></span>
            <?php endif; ?>

            <?php if (!empty($ctas)): ?>
                <div class="hero__actions" data-reveal="up" data-reveal-delay="250">
                    <?php foreach ($ctas as $cta): ?>
                        <?php
                        $href = $cta['href'] ?? '#';
                        $label = $cta['label'] ?? 'Ver más';
                        $variant = $cta['variant'] ?? 'gold'; // gold | secondary
                        $class = $variant === 'secondary' ? 'btn btn--secondary' : 'btn btn--gold btn--shine';
                        ?>
                        <a href="<?= htmlspecialchars($href) ?>" class="<?= $class ?>">
                            <?= htmlspecialchars($label) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Indicadores (se generan según # de slides) -->
    <?php if (count($slides) > 1): ?>
        <div class="hero__indicators" id="heroIndicators" aria-label="Cambiar diapositiva">
            <?php foreach ($slides as $i => $_): ?>
                <button class="hero__indicator <?= $i === 0 ? 'active' : '' ?>" data-slide="<?= $i ?>"
                    aria-label="Diapositiva <?= $i + 1 ?>"></button>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Flecha scroll -->
    <a href="#desempenos" class="hero__scroll" aria-label="Ir a la siguiente sección">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </a>

    <!-- Preload de la primera imagen (si existe) -->
    <?php if (!empty($slides[0]['src'])): ?>
        <link rel="preload" as="image" href="<?= htmlspecialchars($slides[0]['src']) ?>">
    <?php endif; ?>
</section>
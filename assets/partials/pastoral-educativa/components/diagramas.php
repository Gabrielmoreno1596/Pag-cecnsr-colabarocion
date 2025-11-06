<?php

/**
 * DIAGRAMAS institucionales: grid de figuras (desde /data/diagramas-data.php)
 * Requiere que main.php defina $DATA = PROJECT_PATH . 'assets/partials/pastoral-educativa/data/';
 */
$cfg   = require $DATA . 'diagramas-data.php';
$title = $cfg['title'] ?? 'Diagramas institucionales';
$cards = $cfg['cards'] ?? [];
?>
<section class="band band--diagramas" aria-labelledby="diagramas-title">
    <div class="band__inner">
        <h2 id="diagramas-title" class="section-title" data-reveal="up">
            <?= htmlspecialchars($title) ?>
        </h2>

        <div class="diag-grid"><!-- <- SIN data-gallery="main" -->
            <?php
            $delay = 100;
            foreach ($cards as $card):
                $src     = $card['src']     ?? '';
                $alt     = $card['alt']     ?? '';
                $caption = $card['caption'] ?? '';
                if (!$src) continue;
            ?>
                <figure class="diag" data-reveal="up" data-reveal-delay="<?= $delay ?>">
                    <a
                        class="diag__link"
                        href="<?= htmlspecialchars($src) ?>"
                        data-gallery="diagramas"
                        data-title="<?= htmlspecialchars($caption !== '' ? $caption : ($card['title'] ?? '')) ?>">
                        <img loading="lazy" decoding="async"
                            src="<?= htmlspecialchars($src) ?>"
                            alt="<?= htmlspecialchars($alt) ?>">
                    </a>

                    <?php if ($caption !== ''): ?>
                        <figcaption><?= htmlspecialchars($caption) ?></figcaption>
                    <?php endif; ?>
                </figure>
            <?php
                $delay += 50;
            endforeach;
            ?>
        </div>
    </div>

    <!-- Lightbox propio de Diagramas -->
    <div id="lightbox-diagramas" class="lightbox" aria-hidden="true" hidden>
        <button class="lightbox__close" aria-label="Cerrar" data-close>×</button>
        <button class="lightbox__nav lightbox__nav--prev" aria-label="Anterior">◄</button>
        <img class="lightbox__img" alt="">
        <figcaption class="lightbox__cap"></figcaption>
        <button class="lightbox__nav lightbox__nav--next" aria-label="Siguiente">►</button>
    </div>
</section>
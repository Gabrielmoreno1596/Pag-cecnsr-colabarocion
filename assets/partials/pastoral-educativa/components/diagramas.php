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

        <div class="diag-grid" data-gallery="main">
            <?php
            // Stagger base para data-reveal-delay
            $delay = 100;
            foreach ($cards as $card):
                // defensivo
                $src     = $card['src']     ?? '';
                $alt     = $card['alt']     ?? '';
                $caption = $card['caption'] ?? '';
                if (!$src) continue;
            ?>
                <figure class="diag" data-reveal="up" data-reveal-delay="<?= $delay ?>">
                    <a class="diag__link" href="<?= htmlspecialchars($src) ?>">
                        <img
                            loading="lazy" decoding="async"
                            src="<?= htmlspecialchars($src) ?>"
                            alt="<?= htmlspecialchars($alt) ?>">
                    </a>
                    <?php if ($caption !== ''): ?>
                        <figcaption><?= htmlspecialchars($caption) ?></figcaption>
                    <?php endif; ?>
                </figure>
            <?php
                $delay += 50; // efecto escalonado 100,150,200...
            endforeach;
            ?>
        </div>
    </div>
</section>
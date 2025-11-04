<?php

/**
 * GALERÍA (masonry) — usa datos desde /data/galeria-data.php
 * Requiere que $DATA (ruta a /data/) esté definido en main.php
 */

/** @var string $DATA */
$data  = require $DATA . 'galeria-data.php';

$title = $data['title'] ?? 'Comunidad en acción';
$items = is_array($data['items'] ?? null) ? $data['items'] : [];
?>
<section id="galeria" class="band band--gallery-masonry pastoral" aria-labelledby="gal-title">
    <div class="band__inner">
        <h2 id="gal-title" class="section-title">
            <?= htmlspecialchars($title) ?>
        </h2>

        <?php if (empty($items)): ?>
            <p class="muted">Pronto agregaremos fotos de nuestras actividades.</p>
        <?php else: ?>
            <div class="masonry" data-gallery="main">
                <?php foreach ($items as $it):
                    // Cada item viene del data con: src (ya con asset()), alt y cap (opcional)
                    $src = $it['src'] ?? '';
                    if (!$src) continue; // si no hay imagen, saltar

                    $alt = $it['alt'] ?? 'Imagen de la comunidad';
                    $cap = $it['cap'] ?? null;
                ?>
                    <a class="masonry__item" href="<?= $src ?>">
                        <img
                            loading="lazy"
                            decoding="async"
                            src="<?= $src ?>"
                            alt="<?= htmlspecialchars($alt) ?>">
                        <?php if ($cap): ?>
                            <span class="masonry__cap"><?= htmlspecialchars($cap) ?></span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
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
            <!-- Masonry: SIN data-gallery=main para no activar lightbox global -->
            <div class="masonry">
                <?php foreach ($items as $it):
                    // Mantiene EXACTAMENTE lo que viene del data:
                    $src = $it['src'] ?? '';
                    if (!$src) continue;
                    $alt = $it['alt'] ?? 'Imagen de la comunidad';
                    $cap = $it['cap'] ?? null;
                ?>
                    <a class="masonry__item"
                        href="<?= $src ?>"
                        data-gallery="galeria"
                        title="<?= htmlspecialchars($cap ?? '') ?>">
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

    <!-- Lightbox PROPIO de Comunidad en acción -->
    <div id="lightbox-galeria" class="lightbox" aria-hidden="true" hidden>
        <button class="lightbox__close" aria-label="Cerrar" data-close>×</button>
        <button class="lightbox__nav lightbox__nav--prev" aria-label="Anterior">◄</button>
        <img class="lightbox__img" alt="">
        <figcaption class="lightbox__cap"></figcaption>
        <button class="lightbox__nav lightbox__nav--next" aria-label="Siguiente">►</button>
    </div>
</section>
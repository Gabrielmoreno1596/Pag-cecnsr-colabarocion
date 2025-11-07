<?php /* $dGal: title, items[]: {src, alt} */ ?>
<section class="section">
    <div class="card">
        <h2 class="section-title"><?= htmlspecialchars($dGal['title']) ?></h2>
        <div class="title-divider" aria-hidden="true"></div>
        <div class="galleryDual">
            <?php foreach ($dGal['items'] as $i => $g): ?>
                <a class="tile<?= in_array($i, $dGal['wide_idx'] ?? [], true) ? ' wide' : '' ?>"
                    href="<?= htmlspecialchars($g['src']) ?>">
                    <img src="<?= htmlspecialchars($g['src']) ?>" alt="<?= htmlspecialchars($g['alt']) ?>">
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Lightbox -->
    <div id="lb" class="lb" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Visor de imágenes">
        <button class="lb__close" aria-label="Cerrar (Esc)">✕</button>
        <figure class="lb__figure">
            <img class="lb__img" alt="">
            <figcaption class="lb__cap">
                <span class="lb__text"></span>
                <span class="lb__count"></span>
            </figcaption>
        </figure>
        <button class="lb__nav lb__prev" aria-label="Anterior">‹</button>
        <button class="lb__nav lb__next" aria-label="Siguiente">›</button>
    </div>
</section>
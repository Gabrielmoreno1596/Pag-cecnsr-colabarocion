<?php $e = $experienciasData; ?>

<section class="section" id="<?= $e['id'] ?>">
    <div class="card">
        <h2 class="section-title"><?= $e['title'] ?></h2>
        <div class="title-divider" aria-hidden="true"></div>

        <div class="grid-3 media-grid">
            <?php foreach ($e['cards'] as $card): ?>
                <article class="media-card xp-card">
                    <div class="xp-media">
                        <?php
                        $imgs = $card['images'];
                        $alts = $card['alts'];
                        ?>
                        <img class="main"
                            src="<?= $imgs[0] ?>"
                            alt="<?= htmlspecialchars($alts[0]) ?>"
                            loading="lazy" decoding="async">
                        <img class="thumbex"
                            src="<?= $imgs[1] ?>"
                            alt="<?= htmlspecialchars($alts[1]) ?>"
                            loading="lazy" decoding="async">
                        <img class="thumbex"
                            src="<?= $imgs[2] ?>"
                            alt="<?= htmlspecialchars($alts[2]) ?>"
                            loading="lazy" decoding="async">
                    </div>

                    <div class="media-info">
                        <h3><?= $card['name'] ?></h3>
                        <p><?= $card['desc'] ?></p>
                        <a class="btn-link"
                            href="<?= $card['pdf'] ?>"
                            target="_blank"
                            rel="noopener">
                            <?= $card['pdf_label'] ?>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Lightbox compartido (se usa para experiencias y galería) -->
    <div class="xp-lightbox" id="xpLightbox" hidden>
        <div class="xp-lb__backdrop" data-close></div>
        <div class="xp-lb__dialog" role="dialog" aria-modal="true" aria-labelledby="xpLbCount">
            <div class="xp-lb__head">
                <div class="xp-lb__count" id="xpLbCount"></div>
                <button class="xp-lb__close" data-close aria-label="Cerrar">✕</button>
            </div>

            <div class="xp-lb__stage">
                <button class="xp-lb__nav prev" id="xpPrev" aria-label="Anterior">‹</button>
                <img id="xpLbImg" alt="" draggable="false" loading="lazy" decoding="async">
                <button class="xp-lb__nav next" id="xpNext" aria-label="Siguiente">›</button>
            </div>
        </div>
    </div>
</section>
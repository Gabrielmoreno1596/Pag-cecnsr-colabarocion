<?php $entorno = $ofertaInicialData['entorno']; ?>

<section class="section-padding bg-light">
    <div class="content-wrapper">
        <h2 class="section-title">
            <i class="<?= htmlspecialchars($entorno['icon']) ?>"></i>
            <?= htmlspecialchars($entorno['title']) ?>
        </h2>

        <div class="photo-roll-container">
            <div class="photo-roll">
                <?php foreach ($entorno['images'] as $img): ?>
                    <div class="photo-item">
                        <img
                            src="<?= asset('assets/partials/oferta-academica/oferta-inicial/image/' . $img['file']) ?>"
                            alt="<?= htmlspecialchars($img['alt']) ?>"
                            loading="lazy"
                            decoding="async">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
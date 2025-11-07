<?php /* $dPrep: title, cards[]: {media: [src,alt]*3, h3, p} */ ?>
<section class="section prep" id="preparacion">
    <div class="card">
        <h2 class="section-title"><?= htmlspecialchars($dPrep['title']) ?></h2>
        <div class="title-divider" aria-hidden="true"></div>

        <div class="prep-grid">
            <?php foreach ($dPrep['cards'] as $c): ?>
                <article class="prep-card">
                    <div class="prep-media" role="group" aria-label="Galería de evidencias">
                        <?php foreach ($c['media'] as $j => $m): ?>
                            <img class="<?= $j === 0 ? 'main' : 'thumb' ?>"
                                src="<?= htmlspecialchars($m['src']) ?>"
                                alt="<?= htmlspecialchars($m['alt']) ?>">
                        <?php endforeach; ?>
                    </div>
                    <h3 class="prep-title"><?= htmlspecialchars($c['h3']) ?></h3>
                    <p class="prep-text"><?= htmlspecialchars($c['p']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php $g = $galeriaData; ?>

<section class="section">
    <div class="card">
        <h2 class="section-title"><?= $g['title'] ?></h2>
        <div class="title-divider" aria-hidden="true"></div>

        <div class="gal-quilt" id="<?= $g['id'] ?>">
            <?php foreach ($g['tiles'] as $t): ?>
                <a class="<?= $t['class'] ?>"
                    href="<?= $t['src'] ?>"
                    data-full="<?= $t['src'] ?>">
                    <img loading="lazy" src="<?= $t['src'] ?>" alt="<?= htmlspecialchars($t['alt']) ?>" decoding="async">
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
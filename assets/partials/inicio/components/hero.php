<?php
// Se espera que $inicioHero venga desde hero-data.php
?>

<section id="inicio" class="hero">
    <div class="hero-content">
        <?php foreach ($inicioHero['title_lines'] as $line): ?>
            <h2 class="hero-title"><?= htmlspecialchars($line) ?></h2>
        <?php endforeach; ?>

        <p class="hero-slogan">
            <i><?= htmlspecialchars($inicioHero['slogan']) ?></i>
        </p>
    </div>

    <div class="photo-roll-container">
        <div class="photo-roll">
            <?php foreach ($inicioHero['images'] as $img): ?>
                <div class="photo-item">
                    <img
                        src="<?= asset('assets/partials/inicio/image/hero/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['alt']) ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <a href="<?= htmlspecialchars($inicioHero['button']['href']) ?>" class="btn-primary">
        <?= htmlspecialchars($inicioHero['button']['label']) ?>
    </a>
</section>
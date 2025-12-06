<?php
$data = require __DIR__ . '/../data/hero.php';
$heroBase = 'assets/partials/inicio/image/hero/';
?>

<section id="inicio" class="hero">
    <div class="hero-content">
        <?php foreach ($data['titles'] as $t): ?>
            <h2 class="hero-title"><?= htmlspecialchars($t); ?></h2>
        <?php endforeach; ?>

        <p class="hero-slogan"><i><?= htmlspecialchars($data['slogan']); ?></i></p>
    </div>

    <div class="photo-roll-container">
        <div class="photo-roll">
            <?php foreach ($data['images'] as $img): ?>
                <div class="photo-item">
                    <img
                        src="<?= asset($heroBase . $img); ?>"
                        alt="Infraestructura Escolar"
                        loading="lazy"
                        decoding="async" />
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <a href="<?= htmlspecialchars($data['cta']['href']); ?>" class="btn-primary">
        <?= htmlspecialchars($data['cta']['text']); ?>
    </a>
</section>
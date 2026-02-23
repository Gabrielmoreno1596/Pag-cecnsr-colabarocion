<?php
$data = require __DIR__ . '/../data/hero.php';
$heroBase = 'assets/img/inicio/hero/';
$images = $data['images'] ?? [];
?>

<section id="inicio" class="hero">
    <div class="hero-content">
        <?php foreach ($data['titles'] as $t): ?>
            <h2 class="hero-title"><?= htmlspecialchars($t); ?></h2>
        <?php endforeach; ?>

        <p class="hero-slogan"><i><?= htmlspecialchars($data['slogan']); ?></i></p>

        <?php $trust_context = 'hero';
        require __DIR__ . '/trust-strip.php'; ?>

    </div>

    <!-- Carrusel continuo (sin detenerse) -->
    <div class="photo-roll-container" aria-label="Carrusel de infraestructura">
        <div class="photo-roll" role="list">
            <?php foreach ($images as $i => $img): ?>
                <div class="photo-item" role="listitem">
                    <img
                        src="<?= asset($heroBase . $img); ?>"
                        alt="Infraestructura Escolar <?= (int)($i + 1); ?>"
                        loading="lazy"
                        decoding="async" />
                </div>
            <?php endforeach; ?>

            <!-- Duplicado para loop infinito (seamless) -->
            <?php foreach ($images as $i => $img): ?>
                <div class="photo-item photo-item--dup" role="listitem" aria-hidden="true">
                    <img
                        src="<?= asset($heroBase . $img); ?>"
                        alt=""
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
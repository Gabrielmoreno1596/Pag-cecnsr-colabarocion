<?php
// assets/partials/oferta-academica/oferta-ciclo2/components/experiencias.php

$expData = require __DIR__ . '/../data/experiencias.php';

$baseImagePath = 'assets/img/oferta-academica/oferta-ciclo2/';
?>

<div class="photo-carousel-container">
    <h4 class="carousel-title">
        <?= htmlspecialchars($expData['title'], ENT_QUOTES, 'UTF-8'); ?>
    </h4>
    <div class="photo-roll-wrapper">
        <div class="photo-roll">
            <?php foreach ($expData['photos'] as $photo): ?>
                <div class="photo-item">
                    <img
                        src="<?= asset($baseImagePath . $photo['file']); ?>"
                        alt="<?= htmlspecialchars($photo['alt'], ENT_QUOTES, 'UTF-8'); ?>"
                        loading="lazy"
                        decoding="async">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <p class="carousel-caption">
        <?= htmlspecialchars($expData['caption'], ENT_QUOTES, 'UTF-8'); ?>
    </p>
</div>
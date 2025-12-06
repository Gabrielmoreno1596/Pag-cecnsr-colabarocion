<?php
$data   = require __DIR__ . '/../data/experiencias.php';
$images = $data['images'];
?>
<div class="photo-carousel-container">
    <h4 class="carousel-title">
        <?= htmlspecialchars($data['title'], ENT_QUOTES, 'UTF-8'); ?>
    </h4>

    <div class="photo-roll-wrapper">
        <div class="photo-roll">
            <?php foreach ($images as $img): ?>
                <div class="photo-item">
                    <img
                        src="<?= asset('assets/partials/oferta-academica/oferta-ciclo3/image/' . $img['file']); ?>"
                        alt="<?= htmlspecialchars($img['alt'], ENT_QUOTES, 'UTF-8'); ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <p class="carousel-caption">
        <?= htmlspecialchars($data['caption'], ENT_QUOTES, 'UTF-8'); ?>
    </p>
</div>
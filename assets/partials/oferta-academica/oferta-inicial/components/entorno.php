<?php
$data = require __DIR__ . '/../data/entorno.php';
$baseImg = 'assets/img/oferta-academica/parv-inicial/';
?>

<section class="section-padding bg-light" id="entorno">
    <div class="content-wrapper">
        <h2 class="section-title">
            <i class="fas fa-camera"></i> <?= htmlspecialchars($data['title']); ?>
        </h2>

        <div class="photo-roll-container">
            <div class="photo-roll">
                <?php foreach ($data['images'] as $img): ?>
                    <div class="photo-item">
                        <img
                            src="<?= asset($baseImg . $img); ?>"
                            alt="Entorno de Parvularia"
                            loading="lazy"
                            decoding="async" />
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
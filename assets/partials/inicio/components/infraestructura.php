<?php
$data = require __DIR__ . '/../data/infraestructura.php';
$infraBase = 'assets/partials/inicio/image/infraestructura/';
?>

<section id="infraestructura">
    <div class="infra-carousel-container">
        <div class="infra-carousel-track">
            <?php foreach ($data['images'] as $img): ?>
                <img
                    src="<?= asset($infraBase . $img); ?>"
                    alt="Infraestructura CECNSR"
                    class="infra-carousel-img"
                    loading="lazy"
                    decoding="async" />
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
$data = require __DIR__ . '/../data/servicios.php';
?>

<section class="value-added-section bg-blue-accent section-padding" id="servicios">
    <div class="content-wrapper">
        <h2 class="section-title text-gold">
            <i class="fas fa-star"></i> <?= htmlspecialchars($data['title']); ?>
        </h2>

        <div class="service-circles-grid">
            <?php foreach ($data['items'] as $item): ?>
                <div class="service-circle-item">
                    <div class="highlight-icon-box">
                        <i class="fas <?= htmlspecialchars($item['icon']); ?>"></i>
                    </div>
                    <h4><?= htmlspecialchars($item['title']); ?></h4>
                    <p><?= htmlspecialchars($item['text']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
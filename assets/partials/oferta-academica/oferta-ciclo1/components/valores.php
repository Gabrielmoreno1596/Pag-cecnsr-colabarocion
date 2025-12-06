<?php
$data = require __DIR__ . '/../data/valores.php';
?>
<section class="section-padding bg-blue-accent">
    <div class="content-wrapper">
        <h2 class="section-title text-white">
            <i class="fas fa-medal text-gold"></i> Valores Agregados
        </h2>

        <p class="valores-intro">
            <?= htmlspecialchars($data['intro']); ?>
        </p>

        <div class="service-circles-grid full-values">
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
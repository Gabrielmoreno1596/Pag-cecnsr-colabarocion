<?php
$valoresData = require __DIR__ . '/../data/valores.php';
?>

<section class="section-padding bg-blue-accent">
    <div class="content-wrapper">
        <h2 class="section-title text-white">
            <i class="fas fa-medal text-gold"></i> <?= htmlspecialchars($valoresData['title'], ENT_QUOTES, 'UTF-8'); ?>
        </h2>
        <p class="text-white" style="text-align: center; margin-bottom: 2rem">
            <?= htmlspecialchars($valoresData['intro'], ENT_QUOTES, 'UTF-8'); ?>
        </p>

        <div class="service-circles-grid full-values">
            <?php foreach ($valoresData['items'] as $item): ?>
                <div class="service-circle-item">
                    <div class="highlight-icon-box">
                        <i class="<?= htmlspecialchars($item['icon'], ENT_QUOTES, 'UTF-8'); ?>"></i>
                    </div>
                    <h4><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?></h4>
                    <p><?= htmlspecialchars($item['text'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
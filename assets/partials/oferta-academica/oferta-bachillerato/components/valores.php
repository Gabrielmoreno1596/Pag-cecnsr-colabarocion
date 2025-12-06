<?php
$valores = require __DIR__ . '/../data/valores.php';
?>
<section id="valores" class="section-padding bg-light">
    <h3 class="section-title">
        <i class="fas fa-handshake"></i> <?= htmlspecialchars($valores['title'], ENT_QUOTES, 'UTF-8'); ?>
    </h3>
    <p class="section-subtitle">
        <?= htmlspecialchars($valores['subtitle'], ENT_QUOTES, 'UTF-8'); ?>
    </p>

    <div class="value-cards-grid content-wrapper">
        <?php foreach ($valores['cards'] as $card): ?>
            <div class="value-card">
                <i class="fas <?= htmlspecialchars($card['icon'], ENT_QUOTES, 'UTF-8'); ?>
                  value-icon <?= htmlspecialchars($card['color'], ENT_QUOTES, 'UTF-8'); ?>"></i>
                <h4><?= htmlspecialchars($card['title'], ENT_QUOTES, 'UTF-8'); ?></h4>
                <p><?= htmlspecialchars($card['text'], ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
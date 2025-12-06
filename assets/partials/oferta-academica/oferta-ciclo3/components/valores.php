<?php
$cards = require __DIR__ . '/../data/valores.php';
?>
<h2 class="section-title text-center">
    <i class="fas fa-medal"></i> Valores Agregados Institucionales
</h2>
<p class="section-subtitle text-center">
    Una formación integral con enfoque científico, tecnológico y humano.
</p>

<div class="value-cards-grid">
    <?php foreach ($cards as $card): ?>
        <div class="value-card">
            <i class="fas <?= htmlspecialchars($card['icon'], ENT_QUOTES, 'UTF-8'); ?>
                value-icon <?= htmlspecialchars($card['icon_color_class'], ENT_QUOTES, 'UTF-8'); ?>"></i>
            <h4><?= htmlspecialchars($card['title'], ENT_QUOTES, 'UTF-8'); ?></h4>
            <p><?= htmlspecialchars($card['text'], ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
    <?php endforeach; ?>
</div>
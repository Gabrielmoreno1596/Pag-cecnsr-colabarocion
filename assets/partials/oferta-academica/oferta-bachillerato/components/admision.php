<?php
$adm = require __DIR__ . '/../data/admision.php';
?>
<section id="admision" class="section-padding">
    <h3 class="section-title">
        <i class="fas fa-file-alt"></i> <?= htmlspecialchars($adm['title'], ENT_QUOTES, 'UTF-8'); ?>
    </h3>

    <div class="accordion-container content-wrapper">
        <?php foreach ($adm['items'] as $index => $item): ?>
            <div class="accordion-item">
                <div class="accordion-header">
                    <?= ($index + 1) . '. ' . htmlspecialchars($item['header'], ENT_QUOTES, 'UTF-8'); ?>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="accordion-content">
                    <p><?= htmlspecialchars($item['content'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
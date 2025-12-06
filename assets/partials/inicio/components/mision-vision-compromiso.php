<?php
$data = require __DIR__ . '/../data/mision-vision-compromiso.php';
?>

<section id="mision-vision-compromiso" class="section-padding">
    <h3 class="sub-title mvc-title"><?= htmlspecialchars($data['title']); ?></h3>

    <div class="philosophy-grid">
        <?php foreach ($data['cards'] as $card): ?>
            <div class="mission-vision-card">
                <i class="fas <?= htmlspecialchars($card['icon']); ?>"></i>
                <h3><?= htmlspecialchars($card['title']); ?></h3>
                <p><?= htmlspecialchars($card['text']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
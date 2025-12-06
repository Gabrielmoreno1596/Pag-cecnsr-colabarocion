<?php
$data = require __DIR__ . '/../data/grados-edades.php';
?>

<section class="section-padding bg-white" id="grados-edades">
    <div class="content-wrapper">
        <h2 class="section-title">
            <i class="fas fa-calendar-alt"></i> <?= htmlspecialchars($data['title']); ?>
        </h2>

        <div class="grades-container">
            <?php foreach ($data['cards'] as $card): ?>
                <div class="grade-card">
                    <div class="grade-title-box bg-blue-accent text-gold">
                        <i class="fas <?= htmlspecialchars($card['icon']); ?>"></i>
                        <h3><?= htmlspecialchars($card['grade']); ?></h3>
                    </div>
                    <div class="grade-info">
                        <p><strong>Enfoque:</strong> <?= htmlspecialchars($card['focus']); ?></p>
                        <span class="grade-age"><?= htmlspecialchars($card['age']); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
$data = require __DIR__ . '/../data/perfil.php';
?>

<section class="section-padding bg-light" id="perfil">
    <div class="content-wrapper">
        <h2 class="section-title">
            <i class="fas fa-child"></i> <?= htmlspecialchars($data['title']); ?>
        </h2>

        <div class="profile-cards-grid">
            <?php foreach ($data['items'] as $item): ?>
                <div class="profile-item-card">
                    <div class="profile-icon-box">
                        <i class="fas <?= htmlspecialchars($item['icon']); ?>"></i>
                    </div>
                    <h4><?= htmlspecialchars($item['subtitle']); ?></h4>
                    <p><?= htmlspecialchars($item['text']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
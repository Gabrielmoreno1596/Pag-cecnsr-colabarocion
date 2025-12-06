<?php
$data = require __DIR__ . '/../data/trayectoria.php';
?>
<div class="trayectoria-section">
    <h3 class="trayectoria-title">
        <i class="fas fa-route text-gold"></i>
        <?= htmlspecialchars($data['title'], ENT_QUOTES, 'UTF-8'); ?>
    </h3>
    <p class="trayectoria-description">
        <?= htmlspecialchars($data['description'], ENT_QUOTES, 'UTF-8'); ?>
    </p>

    <ul class="requirements-list-enhanced trayectoria-list">
        <?php foreach ($data['items'] as $item): ?>
            <li>
                <i class="fas fa-check"></i>
                <?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
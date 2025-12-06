<?php
$data = require __DIR__ . '/../data/trayectoria-academica.php';
?>
<section class="section-padding bg-white">
    <div class="content-wrapper">
        <h2 class="section-title">
            <i class="fas fa-chalkboard-teacher"></i> Trayectoria Académica
        </h2>

        <div class="tabs-container" data-tabs="ciclo1">
            <div class="tabs-buttons">
                <?php foreach ($data['tabs'] as $index => $tab): ?>
                    <button class="tab-button <?= $index === 0 ? 'active' : ''; ?>"
                        data-tab="<?= htmlspecialchars($tab['id']); ?>">
                        <?= htmlspecialchars($tab['button']); ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <?php foreach ($data['tabs'] as $index => $tab): ?>
                <div id="<?= htmlspecialchars($tab['id']); ?>"
                    class="tab-content <?= $index === 0 ? 'active' : ''; ?>">
                    <h3>
                        <i class="fas fa-star text-gold"></i>
                        <?= htmlspecialchars($tab['title']); ?>
                    </h3>
                    <p><?= htmlspecialchars($tab['text']); ?></p>

                    <ul class="requirements-list-enhanced">
                        <?php foreach ($tab['items'] as $item): ?>
                            <li><i class="fas fa-check"></i> <?= $item; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
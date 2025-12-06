<?php
$data      = require __DIR__ . '/../data/metas.php';
$tabs      = $data['tabs'];
$defaultId = $data['default_tab'];
?>
<h2 class="section-title">
    <i class="fas <?= htmlspecialchars($data['section_icon'], ENT_QUOTES, 'UTF-8'); ?>"></i>
    <?= htmlspecialchars($data['section_title'], ENT_QUOTES, 'UTF-8'); ?>
</h2>

<div class="tabs-container">
    <div class="tabs-buttons">
        <?php foreach ($tabs as $id => $tab): ?>
            <button
                class="tab-button <?= $id === $defaultId ? 'active' : ''; ?>"
                data-tab="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>">
                <?= htmlspecialchars($tab['button_label'], ENT_QUOTES, 'UTF-8'); ?>
            </button>
        <?php endforeach; ?>
    </div>

    <?php foreach ($tabs as $id => $tab): ?>
        <div
            id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
            class="tab-content <?= $id === $defaultId ? 'active' : ''; ?>">
            <h3>
                <i class="fas <?= htmlspecialchars($tab['title_icon'], ENT_QUOTES, 'UTF-8'); ?> text-gold"></i>
                <?= htmlspecialchars($tab['title'], ENT_QUOTES, 'UTF-8'); ?>
            </h3>
            <p><?= htmlspecialchars($tab['description'], ENT_QUOTES, 'UTF-8'); ?></p>

            <ul class="requirements-list-enhanced">
                <?php foreach ($tab['items'] as $item): ?>
                    <li>
                        <i class="fas fa-check"></i>
                        <?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8'); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>
</div>
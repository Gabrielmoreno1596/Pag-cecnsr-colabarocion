<?php
$perfil = require __DIR__ . '/../data/perfil.php';
$tabs = $perfil['tabs'];
?>
<section id="perfil" class="section-padding">
    <h3 class="section-title">
        <i class="fas fa-user-tie"></i> <?= htmlspecialchars($perfil['title'], ENT_QUOTES, 'UTF-8'); ?>
    </h3>
    <p class="section-subtitle">
        <?= htmlspecialchars($perfil['subtitle'], ENT_QUOTES, 'UTF-8'); ?>
    </p>

    <div class="content-wrapper">
        <div class="tabs-buttons">
            <?php foreach ($tabs as $id => $tab): ?>
                <button
                    class="tab-button <?= $id === $perfil['default'] ? 'active' : ''; ?>"
                    data-tab="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>">
                    <?= htmlspecialchars($tab['button'], ENT_QUOTES, 'UTF-8'); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="tabs-container">
            <?php foreach ($tabs as $id => $tab): ?>
                <div id="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>"
                    class="tab-content <?= $id === $perfil['default'] ? 'active' : ''; ?>">
                    <h4><?= htmlspecialchars($tab['title'], ENT_QUOTES, 'UTF-8'); ?></h4>
                    <p><?= htmlspecialchars($tab['description'], ENT_QUOTES, 'UTF-8'); ?></p>

                    <?php if (!empty($tab['bullets'])): ?>
                        <ul class="requirements-list-enhanced">
                            <?php foreach ($tab['bullets'] as $b): ?>
                                <li><i class="fas fa-check"></i> <?= htmlspecialchars($b, ENT_QUOTES, 'UTF-8'); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
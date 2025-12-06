<?php
// assets/partials/oferta-academica/oferta-ciclo2/components/metas.php

$metasData = require __DIR__ . '/../data/metas.php';
?>

<h2 class="section-title">
    <i class="fas fa-bullseye"></i> Metas del Nivel
</h2>

<div class="goals-list-container">
    <p><?= $metasData['intro']; ?></p>

    <div class="goal-cards-grid">
        <?php foreach ($metasData['goals'] as $goal): ?>
            <div class="profile-item-card">
                <div class="profile-icon-box">
                    <i class="<?= htmlspecialchars($goal['icon'], ENT_QUOTES, 'UTF-8'); ?>"></i>
                </div>
                <div>
                    <h4><?= htmlspecialchars($goal['title'], ENT_QUOTES, 'UTF-8'); ?></h4>
                    <p><?= htmlspecialchars($goal['text'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
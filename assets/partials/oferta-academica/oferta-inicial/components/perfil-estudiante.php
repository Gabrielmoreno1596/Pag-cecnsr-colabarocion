<?php $perfil = $ofertaInicialData['perfil']; ?>

<section class="section-padding bg-light">
    <div class="content-wrapper">
        <h2 class="section-title">
            <i class="<?= htmlspecialchars($perfil['icon']) ?>"></i>
            <?= htmlspecialchars($perfil['title']) ?>
        </h2>

        <div class="profile-cards-grid">
            <?php foreach ($perfil['items'] as $item): ?>
                <div class="profile-item-card">
                    <div class="profile-icon-box">
                        <i class="<?= htmlspecialchars($item['icon']) ?>"></i>
                    </div>
                    <h4><?= htmlspecialchars($item['title']) ?></h4>
                    <p><?= htmlspecialchars($item['text']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
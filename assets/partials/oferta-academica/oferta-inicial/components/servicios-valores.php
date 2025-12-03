<?php $servicios = $ofertaInicialData['servicios']; ?>

<section class="value-added-section bg-blue-accent section-padding">
    <div class="content-wrapper">
        <h2 class="section-title text-gold">
            <i class="<?= htmlspecialchars($servicios['icon']) ?>"></i>
            <?= htmlspecialchars($servicios['title']) ?>
        </h2>

        <div class="service-circles-grid">
            <?php foreach ($servicios['items'] as $item): ?>
                <div class="service-circle-item">
                    <div class="highlight-icon-box">
                        <i class="<?= htmlspecialchars($item['icon']) ?>"></i>
                    </div>
                    <h4><?= htmlspecialchars($item['title']) ?></h4>
                    <p><?= htmlspecialchars($item['text']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
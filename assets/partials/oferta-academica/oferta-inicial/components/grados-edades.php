<?php $grados = $ofertaInicialData['grados']; ?>

<section class="section-padding bg-white">
    <div class="content-wrapper">
        <h2 class="section-title">
            <i class="<?= htmlspecialchars($grados['icon']) ?>"></i>
            <?= htmlspecialchars($grados['title']) ?>
        </h2>

        <div class="grades-container">
            <?php foreach ($grados['cards'] as $card): ?>
                <div class="grade-card">
                    <div class="grade-title-box bg-blue-accent text-gold">
                        <i class="<?= htmlspecialchars($card['icon']) ?>"></i>
                        <h3><?= htmlspecialchars($card['title']) ?></h3>
                    </div>
                    <div class="grade-info">
                        <p>
                            <strong>Enfoque:</strong>
                            <?= htmlspecialchars($card['enfoque']) ?>
                        </p>
                        <span class="grade-age">
                            <?= htmlspecialchars($card['edad_min']) ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
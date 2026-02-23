<?php
$data = require __DIR__ . '/../data/metas.php';
$imgBase = 'assets/img/oferta-academica/oferta-ciclo1/';
?>
<section class="section-padding bg-light">
    <div class="content-wrapper">
        <h2 class="section-title">
            <i class="fas fa-bullseye"></i> Metas del Nivel
        </h2>

        <div class="level-goals-carousel-grid">
            <div class="goals-list-container">
                <p><?= htmlspecialchars($data['intro']); ?></p>

                <?php foreach ($data['goals'] as $goal): ?>
                    <div class="profile-item-card">
                        <div class="profile-icon-box">
                            <i class="fas <?= htmlspecialchars($goal['icon']); ?>"></i>
                        </div>
                        <div>
                            <h4><?= htmlspecialchars($goal['title']); ?></h4>
                            <p><?= htmlspecialchars($goal['text']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="photo-carousel-container">
                <h4 class="carousel-title"><?= htmlspecialchars($data['carousel']['title']); ?></h4>

                <div class="photo-roll-wrapper">
                    <div class="photo-roll">
                        <?php foreach ($data['carousel']['images'] as $img): ?>
                            <div class="photo-item">
                                <img src="<?= asset($imgBase . $img); ?>"
                                    alt="Vida Estudiantil I Ciclo"
                                    loading="lazy" decoding="async">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <p class="carousel-caption">
                    <?= htmlspecialchars($data['carousel']['caption']); ?>
                </p>
            </div>
        </div>
    </div>
</section>
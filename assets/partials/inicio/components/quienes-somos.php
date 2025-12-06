<?php
$data = require __DIR__ . '/../data/quienes-somos.php';
$histBase = 'assets/partials/inicio/image/historia/';
?>

<section id="quienes-somos" class="section-padding">
    <h2 class="section-title"><?= htmlspecialchars($data['title']); ?></h2>

    <div class="history-flex-container">
        <div class="history-text-block">
            <h3 class="sub-title history-subtitle">
                <?= htmlspecialchars($data['history_title']); ?>
            </h3>

            <?php foreach ($data['paragraphs'] as $p): ?>
                <p><?= htmlspecialchars($p); ?></p>
            <?php endforeach; ?>

            <p><?= htmlspecialchars($data['bullets_intro']); ?></p>

            <ul class="history-list">
                <?php foreach ($data['bullets'] as $b): ?>
                    <li>
                        <i class="fas fa-check-circle"></i>
                        <?= htmlspecialchars($b); ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <p class="history-closing"><?= htmlspecialchars($data['closing']); ?></p>
        </div>

        <div class="history-carousel-container">
            <div class="history-carousel-track">
                <?php foreach ($data['carousel_images'] as $img): ?>
                    <img
                        src="<?= asset($histBase . $img); ?>"
                        alt="Historia CECNSR"
                        class="history-carousel-img"
                        loading="lazy"
                        decoding="async" />
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
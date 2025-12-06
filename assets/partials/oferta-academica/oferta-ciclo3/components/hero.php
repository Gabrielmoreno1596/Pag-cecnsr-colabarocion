<?php
$heroData = require __DIR__ . '/../data/hero.php';
?>
<section class="level-hero third-cycle-hero" id="inicio">
    <div class="level-hero-content">
        <h2 class="level-hero-title">
            <?= htmlspecialchars($heroData['title'], ENT_QUOTES, 'UTF-8'); ?>
        </h2>
        <p class="level-hero-slogan">
            <?= htmlspecialchars($heroData['slogan'], ENT_QUOTES, 'UTF-8'); ?>
        </p>
    </div>
</section>
<?php
$hero = require __DIR__ . '/../data/hero.php';
?>
<section class="media-hero section-padding" id="inicio">
    <div class="content-wrapper">
        <h2 class="level-hero-title">
            <?= htmlspecialchars($hero['title'], ENT_QUOTES, 'UTF-8'); ?>
        </h2>
        <p class="level-hero-slogan">
            <?= htmlspecialchars($hero['slogan'], ENT_QUOTES, 'UTF-8'); ?>
        </p>
    </div>
</section>
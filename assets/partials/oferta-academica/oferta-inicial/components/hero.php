<?php
$hero = require __DIR__ . '/../data/hero.php';
?>

<section class="level-hero parvularia-hero">
    <div class="level-hero-content">
        <h1 class="level-hero-title"><?= htmlspecialchars($hero['title']); ?></h1>
        <p class="level-hero-slogan"><?= htmlspecialchars($hero['slogan']); ?></p>
    </div>
</section>
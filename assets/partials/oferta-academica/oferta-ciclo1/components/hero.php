<?php
$data = require __DIR__ . '/../data/hero.php';
$imgBase = 'assets/partials/oferta-academica/oferta-ciclo1/image/';
?>
<section class="level-hero first-cycle-hero"
    style="--hero-bg: url('<?= asset($imgBase . $data['bg']); ?>');">
    <div class="level-hero-content">
        <h2 class="level-hero-title"><?= htmlspecialchars($data['title']); ?></h2>
        <p class="level-hero-slogan"><?= htmlspecialchars($data['slogan']); ?></p>
    </div>
</section>
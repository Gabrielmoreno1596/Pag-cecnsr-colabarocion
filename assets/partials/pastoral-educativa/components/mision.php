<?php

/**
 * MISIÓN: Intro + tarjeta dinámica (Ver, Juzgar, Actuar, Celebrar) + readmore + masonry
 * Lee datos desde /data/mision-data.php
 */

// rutas vienen de main.php: $DATA ya apunta a /assets/partials/pastoral-educativa/data/
$data = require $DATA . 'mision-data.php';

// seguridad básica
$title   = $data['title']   ?? 'Misión';
$lead    = $data['lead']    ?? '';
$pills   = $data['pills']   ?? [];
$tabs    = $data['tabs']    ?? [];
$more    = $data['more']['paragraphs'] ?? [];
$masonry = $data['masonry'] ?? [];

// primer estado de la tarjeta
$first   = $tabs[0] ?? ['key' => '', 'title' => '', 'desc' => '', 'img' => '', 'bullets' => []];

// serializamos tabs para JS (sin escapar slashes/acentos)
$tabsJson = htmlspecialchars(
    json_encode($tabs, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
    ENT_QUOTES,
    'UTF-8'
);
?>
<section class="band band--mision-flat" aria-labelledby="mision-title">
    <div class="band__inner">

        <h2 id="mision-title" class="section-title" data-reveal="up">
            <?= $title ?>
        </h2>

        <div class="mision-layout" data-reveal="up" data-reveal-delay="200">
            <!-- COLUMNA IZQUIERDA: misión -->
            <div class="mision-left mision-content">
                <?php if ($lead): ?>
                    <p class="mision-lead">
                        <?= $lead ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($pills)): ?>
                    <ul class="meta-pills" role="list">
                        <?php foreach ($pills as $i => $pill): ?>
                            <li class="pill <?= $i === 0 ? 'btn--gold btn--shine' : 'btn--burgundy btn--shine' ?>">
                                <a class="btn-mision" href="<?= htmlspecialchars($pill['href'] ?? '#') ?>">
                                    <?= $pill['text'] ?? '' ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- COLUMNA DERECHA: tarjeta dinámica -->
            <aside
                class="mision-aside"
                aria-live="polite"
                data-vjac="<?= $tabsJson ?>">
                <div class="mision-aside__bg" data-aside-bg
                    style="background-image:url('<?= htmlspecialchars($first['img'] ?? '') ?>')"></div>
                <div class="mision-aside__glass">
                    <span class="mision-aside__k" data-aside-k><?= htmlspecialchars($first['key'] ?? '') ?></span>
                    <h3 class="mision-aside__title" data-aside-title><?= htmlspecialchars($first['title'] ?? '') ?></h3>
                    <p class="mision-aside__desc" data-aside-desc><?= htmlspecialchars($first['desc'] ?? '') ?></p>
                    <?php if (!empty($first['bullets'])): ?>
                        <ul class="mision-aside__list" data-aside-list>
                            <?php foreach (($first['bullets'] ?? []) as $b): ?>
                                <li><?= htmlspecialchars($b) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <ul class="mision-aside__list" data-aside-list hidden></ul>
                    <?php endif; ?>
                </div>

                <div class="mision-aside__controls">
                    <button class="mision-aside__ctrl" data-prev aria-label="Anterior">◄</button>
                    <div class="mision-aside__dots" data-dots role="tablist" aria-label="Estados"></div>
                    <button class="mision-aside__ctrl" data-next aria-label="Siguiente">►</button>
                </div>
            </aside>
        </div>



    </div>
</section>
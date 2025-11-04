<?php

/**
 * MISIÓN: Intro + tabs (Ver, Juzgar, Actuar, Celebrar) + readmore + masonry
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

// tab activo por defecto = 0
$firstTab = $tabs[0] ?? ['key' => '', 'title' => '', 'desc' => '', 'img' => ''];
?>
<section class="band band--mision-flat" aria-labelledby="mision-title">
    <div class="band__inner">

        <h2 id="mision-title" class="section-title" data-reveal="up">
            <?= $title ?>
        </h2>

        <?php if ($lead): ?>
            <p class="mision-lead" data-reveal="fade" data-reveal-delay="100">
                <?= $lead ?>
            </p>
        <?php endif; ?>

        <?php if (!empty($pills)): ?>
            <ul class="meta-pills" role="list" data-reveal="up" data-reveal-delay="150">
                <?php foreach ($pills as $i => $pill): ?>
                    <li class="pill <?= $i === 0 ? 'btn btn--gold btn--shine' : 'btn--burgundy btn--shine' ?>">
                        <a class="btn-mision" href="<?= htmlspecialchars($pill['href'] ?? '#') ?>">
                            <?= $pill['text'] ?? '' ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div class="mision-layout" data-tabs="vjac" data-reveal="up" data-reveal-delay="200">
            <!-- Columna izquierda (tabs) -->
            <div class="mision-left">
                <nav class="tabs__nav" role="tablist" aria-label="Metodología pastoral">
                    <?php foreach ($tabs as $i => $t):
                        $tabId = 'tab-' . strtolower($t['key'] ?? ('t' . $i));
                        $active = $i === 0;
                    ?>
                        <button
                            class="tabs__btn <?= $active ? 'is-active' : '' ?>"
                            role="tab"
                            aria-selected="<?= $active ? 'true' : 'false' ?>"
                            aria-controls="<?= $tabId ?>">
                            <?= htmlspecialchars($t['key'] ?? '') ?>
                        </button>
                    <?php endforeach; ?>
                    <span class="tabs__ink" aria-hidden="true"></span>
                </nav>

                <?php foreach ($tabs as $i => $t):
                    $tabId = 'tab-' . strtolower($t['key'] ?? ('t' . $i));
                    $active = $i === 0;
                ?>
                    <section id="<?= $tabId ?>" class="tabs__panel <?= $active ? 'is-active' : '' ?>" role="region" <?= $active ? '' : 'hidden' ?>>
                        <h3><?= htmlspecialchars($t['key'] ?? '') ?></h3>
                        <?php if (!empty($t['title'])): ?>
                            <p><strong><?= htmlspecialchars($t['title']) ?></strong></p>
                        <?php endif; ?>
                        <?php if (!empty($t['desc'])): ?>
                            <p><?= htmlspecialchars($t['desc']) ?></p>
                        <?php endif; ?>
                        <?php if (!empty($t['bullets'])): ?>
                            <ul>
                                <?php foreach ($t['bullets'] as $b): ?>
                                    <li><?= htmlspecialchars($b) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </section>
                <?php endforeach; ?>
            </div>

            <!-- Columna derecha (aside dinámico) -->
            <aside class="mision-aside" aria-live="polite">
                <div class="mision-aside__bg" data-aside-bg
                    style="background-image: url('<?= htmlspecialchars($firstTab['img'] ?? '') ?>');"></div>
                <div class="mision-aside__glass">
                    <span class="mision-aside__k" data-aside-k><?= htmlspecialchars($firstTab['key'] ?? '') ?></span>
                    <h3 class="mision-aside__title" data-aside-title><?= htmlspecialchars($firstTab['title'] ?? '') ?></h3>
                    <p class="mision-aside__desc" data-aside-desc><?= htmlspecialchars($firstTab['desc'] ?? '') ?></p>
                </div>
            </aside>
        </div>

        <!-- Leer más -->
        <?php if (!empty($more)): ?>
            <details class="readmore" data-reveal="up" data-reveal-delay="250">
                <summary class="readmore--accent btn--burgundy btn--shine">Leer más</summary>
                <div class="readmore__content">
                    <?php foreach ($more as $p): ?>
                        <p><?= $p ?></p>
                    <?php endforeach; ?>
                </div>

                <?php if (!empty($masonry)): ?>
                    <div class="mision-masonry" data-gallery="main">
                        <?php foreach ($masonry as $m): ?>
                            <a class="mision-masonry__item" href="<?= htmlspecialchars($m['src']) ?>">
                                <img loading="lazy" decoding="async"
                                    src="<?= htmlspecialchars($m['src']) ?>"
                                    alt="<?= htmlspecialchars($m['alt'] ?? '') ?>">
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </details>
        <?php endif; ?>

    </div>
</section>
<?php

/**
 * HIMNO — tarjeta video + letra
 * Usa $DATA . 'himno-data.php' con:
 *   'title', 'video' => ['src','title','caption'], 'lyrics' => [ ['type'=>'chorus|verse','title','lines'=>[]], ... ]
 */
$cfg   = require $DATA . 'himno-data.php';
$title = $cfg['title'] ?? 'Himno de la Pastoral Educativa';
$video = $cfg['video'] ?? [];
$parts = is_array($cfg['lyrics'] ?? null) ? $cfg['lyrics'] : [];
?>
<section class="band band--himno-pro" id="himno" aria-labelledby="himno-title">
    <div class="band__inner himno-card" data-reveal="up">
        <header class="himno-head">
            <h2 id="himno-title" class="section-title"><?= htmlspecialchars($title) ?></h2>
            <?php if (!empty($video['caption'])): ?>
                <p class="himno-caption"><?= htmlspecialchars($video['caption']) ?></p>
            <?php endif; ?>
        </header>

        <div class="himno-grid">
            <!-- Video -->
            <figure class="himno-media">
                <div class="video-frame" data-embed="<?= htmlspecialchars($video['src'] ?? '') ?>"
                    role="button" aria-label="Reproducir video del himno" tabindex="0">
                    <!-- preview: dejas el iframe directo si prefieres -->
                    <iframe
                        src="<?= htmlspecialchars($video['src'] ?? '') ?>"
                        title="<?= htmlspecialchars($video['title'] ?? 'Himno') ?>"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin">
                    </iframe>
                </div>
                <?php if (!empty($video['title'])): ?>
                    <figcaption class="muted"><?= htmlspecialchars($video['title']) ?></figcaption>
                <?php endif; ?>
            </figure>

            <!-- Letra -->
            <div class="himno-lyrics">
                <details class="readmore" id="letra-himno">
                    <summary><span class="chev" aria-hidden="true">▾</span> Ver letra del himno</summary>
                    <div class="lyrics-wrap">
                        <?php foreach ($parts as $p): ?>
                            <h3 class="lyrics-subtitle">
                                <?= htmlspecialchars($p['title'] ?? ($p['type'] === 'chorus' ? 'Coro' : 'Estrofa')) ?>
                            </h3>
                            <p class="lyrics-block">
                                <?= htmlspecialchars(implode("\n", $p['lines'] ?? [])) ?>
                            </p>
                        <?php endforeach; ?>
                        <?php if (!empty($cfg['credit'])): ?>
                            <p class="lyrics-credit muted"><?= htmlspecialchars($cfg['credit']) ?></p>
                        <?php endif; ?>
                    </div>
                </details>
            </div>
        </div>
    </div>
</section>
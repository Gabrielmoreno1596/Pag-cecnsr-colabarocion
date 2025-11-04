<?php

/**
 * HIMNO: video + letra (desde /data/himno-data.php)
 * Requiere que $DATA (ruta a /data/) esté definido en main.php
 */

/** @var string $DATA */
$data = require $DATA . 'himno-data.php';

$title   = $data['title']   ?? 'Himno de la Pastoral Educativa';
$video   = $data['video']   ?? [];
$lyrics  = is_array($data['lyrics'] ?? null) ? $data['lyrics'] : [];
$credits = $data['credits'] ?? '';

// Helpers
$esc = fn($s) => htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');

// Ubica el primer CORO para poder repetirlo cuando aparezca un item con ["type"=>"chorus","repeat"=>true]
$firstChorus = null;
foreach ($lyrics as $blk) {
    if (($blk['type'] ?? '') === 'chorus' && !empty($blk['lines']) && !$firstChorus) {
        $firstChorus = $blk;
    }
}
?>
<section class="band band--himno-soft" aria-labelledby="himno-title">
    <div class="band__inner">
        <h2 id="himno-title" class="section-title"><?= $esc($title) ?></h2>

        <?php if (!empty($video['src'])): ?>
            <div class="video-card" data-reveal="up" data-reveal-delay="100">
                <div class="video-embed is-loading">
                    <iframe
                        src="<?= $esc($video['src']) ?>"
                        title="<?= $esc($video['title'] ?? $title) ?>"
                        loading="lazy"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allowfullscreen></iframe>
                </div>
                <?php if (!empty($video['caption'])): ?>
                    <p class="video-caption"><?= $esc($video['caption']) ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($lyrics)): ?>
            <details class="readmore" data-reveal="up" data-reveal-delay="150">
                <summary>Ver letra del himno</summary>

                <div class="readmore__content hymn">
                    <h3 class="hymn__title">HIMNO DE LA PASTORAL EDUCATIVA HFIC</h3>

                    <?php foreach ($lyrics as $block):
                        $type = $block['type'] ?? 'verse'; // 'chorus' o 'verse'
                        $titleBlock = $block['title'] ?? ($type === 'chorus' ? 'Coro' : 'Estrofa');
                        $isChorus = ($type === 'chorus');

                        // Resolver líneas: si es repeat=true en chorus, toma las del primer coro
                        $lines = [];
                        if (!empty($block['repeat']) && $isChorus && $firstChorus) {
                            $lines = $firstChorus['lines'] ?? [];
                        } else {
                            $lines = is_array($block['lines'] ?? null) ? $block['lines'] : [];
                        }

                        // Clases por tipo
                        $cls = $isChorus ? 'hymn__chorus' : 'hymn__section';
                        $aria = $esc($titleBlock);
                    ?>
                        <section class="<?= $cls ?>" aria-label="<?= $aria ?>">
                            <h4><?= $esc($titleBlock) ?></h4>

                            <?php
                            // Cortamos en párrafos separados por líneas en blanco (''), igual que en tu HTML original
                            $buffer = [];
                            $flush = function () use (&$buffer) {
                                if (!$buffer) return;
                                echo '<p>' . implode("<br>\n", array_map('htmlspecialchars', $buffer)) . "</p>\n";
                                $buffer = [];
                            };
                            foreach ($lines as $ln) {
                                if ($ln === '' || $ln === null) {
                                    $flush();
                                    continue;
                                }
                                $buffer[] = $ln;
                            }
                            $flush();
                            ?>
                        </section>
                    <?php endforeach; ?>

                    <?php if (!empty($credits)): ?>
                        <footer class="hymn__footer">
                            <p class="credits"><?= $esc($credits) ?></p>
                        </footer>
                    <?php endif; ?>
                </div>
            </details>
        <?php endif; ?>
    </div>
</section>
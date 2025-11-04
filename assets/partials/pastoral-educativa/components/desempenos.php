<?php

/**
 * DESEMPEÑOS: rail + panel derecho (dinámico desde /data/desempenos-data.php)
 * Requiere que main.php defina $DATA = PROJECT_PATH . 'assets/partials/pastoral-educativa/data/';
 */
$cfg  = require $DATA . 'desempenos-data.php';
$title = $cfg['title'] ?? 'Desempeños';
$items = $cfg['items'] ?? [];

// Para elegir el primero activo
$keys = array_keys($items);
$firstKey = $keys[0] ?? null;
?>
<section id="desempenos" class="band band--desempenos-rail" aria-labelledby="desempenos-title">
    <div class="band__inner rail">
        <div class="rail__col-left" data-reveal="up">
            <h2 id="desempenos-title" class="section-title"><?= htmlspecialchars($title) ?></h2>

            <ul class="rail__track" id="railTrack" role="tablist" aria-label="Desempeños (desliza)">
                <?php foreach ($items as $k => $d):
                    $active = ($k === $firstKey);
                ?>
                    <li
                        class="rail__item <?= $active ? 'is-active' : '' ?>"
                        data-k="<?= htmlspecialchars($k) ?>"
                        role="tab"
                        aria-selected="<?= $active ? 'true' : 'false' ?>"
                        tabindex="<?= $active ? '0' : '-1' ?>">
                        <span class="rail__num"><?= (int)($d['n'] ?? 0) ?></span>
                        <span class="rail__t"><?= htmlspecialchars($d['t'] ?? '') ?></span>
                        <div class="container-dis">
                            <?php foreach (($d['pilares'] ?? []) as $p): ?>
                                <span class="rail__tag"><?= htmlspecialchars($p) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <aside class="rail__col-right" data-reveal="up" data-reveal-delay="100">
            <div id="railDetail" class="rail-detail" aria-live="polite">
                <?php if ($firstKey):
                    $d = $items[$firstKey];
                ?>
                    <h3><span class="rail__num" aria-hidden="true"><?= (int)$d['n'] ?></span> <?= htmlspecialchars($d['t']) ?></h3>
                    <p><?= htmlspecialchars($d['intro'] ?? '') ?></p>
                    <?php if (!empty($d['pilares'])): ?>
                        <div class="chips">
                            <?php foreach ($d['pilares'] as $p): ?>
                                <span class="chip"><?= htmlspecialchars($p) ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($d['bullets'])): ?>
                        <ul>
                            <?php foreach ($d['bullets'] as $b): ?>
                                <li><?= htmlspecialchars($b) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <?php if (!empty($d['cita'])): ?>
                        <blockquote>“<?= htmlspecialchars($d['cita']) ?>”</blockquote>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </aside>
    </div>

    <!-- Pasa los datos al JS como JSON (para el autoplay y el detalle dinámico) -->
    <script id="railData" type="application/json">
        <?= json_encode($items, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>
    </script>
</section>
<?php

/**
 * OFERTA ACADÉMICA — Timeline + rotadores (desde /data/oferta-data.php)
 * Requiere que main.php defina $DATA = PROJECT_PATH . 'assets/partials/pastoral-educativa/data/';
 */

$cfg   = require $DATA . 'oferta-data.php';
$title = $cfg['title'] ?? 'Oferta académica';
$items = $cfg['items'] ?? [];
?>
<section class="band band--oferta-timeline" aria-labelledby="oferta-title">
    <div class="band__inner">
        <h2 id="oferta-title" class="section-title" data-reveal="up">
            <?= htmlspecialchars($title) ?>
        </h2>

        <!-- Timeline: uno abierto a la vez (lo maneja el JS con data-oferta) -->
        <ol class="timeline" data-oferta>
            <?php foreach ($items as $idx => $it):
                $label   = $it['label']  ?? 'Etapa';
                $text    = $it['text']   ?? '';
                $bullets = $it['bullets'] ?? [];
                $rot     = $it['rotator'] ?? [];
                $interval = (int)($rot['interval'] ?? 4000);
                $imgs     = $rot['images'] ?? [];
                $isOpen   = !empty($it['open']);
            ?>
                <li class="timeline__item<?= $isOpen ? ' is-open' : '' ?>">
                    <button class="timeline__head" type="button">
                        <?= htmlspecialchars($label) ?>
                    </button>

                    <div class="timeline__body">
                        <div class="oferta">
                            <!-- Media rotatoria -->
                            <div class="oferta__media">
                                <div class="rotator" data-interval="<?= $interval ?>">
                                    <?php foreach ($imgs as $j => $src):
                                        if (!$src) continue;
                                        // La primera se marca activa si el ítem viene abierto
                                        $active = ($isOpen && $j === 0) ? ' is-active' : '';
                                    ?>
                                        <img class="<?= $active ?>" src="<?= htmlspecialchars($src) ?>" alt="<?= htmlspecialchars($label) ?> — imagen <?= $j + 1 ?>">
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Texto y bullets -->
                            <div class="oferta__text">
                                <?php if ($text): ?>
                                    <p><?= htmlspecialchars($text) ?></p>
                                <?php endif; ?>

                                <?php if (!empty($bullets)): ?>
                                    <ul class="bullet">
                                        <?php foreach ($bullets as $b): ?>
                                            <li><?= htmlspecialchars($b) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
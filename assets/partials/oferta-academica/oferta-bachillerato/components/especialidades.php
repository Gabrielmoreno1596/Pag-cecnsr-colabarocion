<?php
$data = require __DIR__ . '/../data/especialidades.php';
$buttons = $data['buttons'];
$especialidades = $data['especialidades'];
?>
<section id="especialidades" class="section-padding bg-light">
    <h3 class="section-title">
        <i class="fas fa-microscope"></i> <?= htmlspecialchars($data['title'], ENT_QUOTES, 'UTF-8'); ?>
    </h3>
    <p class="section-subtitle">
        <?= htmlspecialchars($data['subtitle'], ENT_QUOTES, 'UTF-8'); ?>
    </p>

    <div class="specs-tab-container content-wrapper">
        <div class="specs-tab-buttons">
            <?php foreach ($buttons as $btn): ?>
                <button
                    class="spec-button <?= $btn['id'] === $data['default'] ? 'active' : ''; ?>"
                    data-spec="<?= htmlspecialchars($btn['id'], ENT_QUOTES, 'UTF-8'); ?>">
                    <i class="fas <?= htmlspecialchars($btn['icon'], ENT_QUOTES, 'UTF-8'); ?>"></i>
                    <?= htmlspecialchars($btn['label'], ENT_QUOTES, 'UTF-8'); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="specs-tab-content-wrapper">
            <?php foreach ($especialidades as $esp): ?>
                <div id="<?= htmlspecialchars($esp['id'], ENT_QUOTES, 'UTF-8'); ?>"
                    class="spec-content <?= $esp['id'] === $data['default'] ? 'active' : ''; ?>">

                    <h4><?= htmlspecialchars($esp['headline'], ENT_QUOTES, 'UTF-8'); ?></h4>

                    <div class="media-content-visual">
                        <div class="carousel-container" data-carousel-id="<?= htmlspecialchars($esp['id'], ENT_QUOTES, 'UTF-8'); ?>">
                            <div class="carousel-slides">
                                <?php foreach ($esp['images'] as $index => $img): ?>
                                    <div class="carousel-slide <?= $index === 0 ? 'active' : ''; ?>">
                                        <img
                                            src="<?= asset('assets/partials/oferta-academica/oferta-bachillerato/image/' . $esp['image_path'] . '/' . $img['file']); ?>"
                                            alt="<?= htmlspecialchars($img['alt'], ENT_QUOTES, 'UTF-8'); ?>"
                                            class="slide-img"
                                            loading="lazy"
                                            decoding="async">
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <button class="carousel-button prev">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="carousel-button next">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                            <div class="carousel-indicators"></div>
                        </div>
                    </div>

                    <p><?= htmlspecialchars($esp['description'], ENT_QUOTES, 'UTF-8'); ?></p>

                    <ul class="requirements-list-enhanced">
                        <?php foreach ($esp['bullets'] as $b): ?>
                            <li>
                                <i class="fas fa-star"></i>
                                <?= htmlspecialchars($b, ENT_QUOTES, 'UTF-8'); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <?php if (!empty($esp['youtube'])): ?>
                        <a
                            href="<?= htmlspecialchars($esp['youtube'], ENT_QUOTES, 'UTF-8'); ?>"
                            target="_blank"
                            class="conocemas-btn" rel="noopener">
                            <i class="fab fa-youtube"></i> Conoce más sobre esta especialidad
                        </a>
                    <?php endif; ?>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
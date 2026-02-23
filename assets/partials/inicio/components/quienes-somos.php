<?php
$data = require __DIR__ . '/../data/quienes-somos.php';
$histBase = 'assets/img/inicio/historia/';
?>

<section id="quienes-somos" class="section-padding">
    <h2 class="section-title"><?= htmlspecialchars($data['title']); ?></h2>

    <div class="history-flex-container">
        <div class="history-text-block">
            <h3 class="sub-title history-subtitle">
                <?= htmlspecialchars($data['history_title']); ?>
            </h3>

            <!--
              Ajuste solicitado (Tarea 3):
              - En Inicio solo mostramos un mensaje breve + botón.
              - La información completa se moverá a la página "quienes-somos.php".
            -->
            <p>
                <?= htmlspecialchars($data['excerpt'] ?? ($data['paragraphs'][0] ?? '')); ?>
            </p>

            <a class="qs-cta" href="<?= asset('#'); ?>">Conócenos más</a>
        </div>

        <div class="history-carousel-container">
            <div class="history-carousel-track">
                <?php foreach ($data['carousel_images'] as $img): ?>
                    <img
                        src="<?= asset($histBase . $img); ?>"
                        alt="Historia CECNSR"
                        class="history-carousel-img"
                        loading="lazy"
                        decoding="async" />
                <?php endforeach; ?>
            </div>

            <!-- Banda de datos (overlay) inspirada en el diseño de referencia -->
            <div class="history-stats" aria-hidden="true">
                <div class="history-stat">
                    <span class="history-stat__num">+30</span>
                    <span class="history-stat__label">Años</span>
                </div>
                <div class="history-stat">
                    <span class="history-stat__num">+1500</span>
                    <span class="history-stat__label">Estudiantes</span>
                </div>
            </div>
        </div>
    </div>
</section>
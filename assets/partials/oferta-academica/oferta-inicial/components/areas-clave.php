<?php $areas = $ofertaInicialData['areas_clave']; ?>

<section class="section-padding bg-light">
    <div class="content-wrapper">
        <h2 class="section-title">
            <i class="<?= htmlspecialchars($areas['icon']) ?>"></i>
            <?= htmlspecialchars($areas['title']) ?>
        </h2>

        <div class="course-grid">
            <?php foreach ($areas['cards'] as $card): ?>
                <article class="course-card">
                    <h4><?= htmlspecialchars($card['title']) ?></h4>
                    <p><?= htmlspecialchars($card['text']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
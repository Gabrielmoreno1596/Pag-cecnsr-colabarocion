<section id="inicio" class="hero">
    <div class="hero-content">
        <h2 class="hero-title">COMPLEJO EDUCATIVO CATÓLICO</h2>
        <h2 class="hero-title">"NUESTRA SEÑORA DEL ROSARIO"</h2>
        <p class="hero-slogan">
            <i>Formar para construir un mundo fraterno.</i>
        </p>
    </div>

    <div class="photo-roll-container">
        <div class="photo-roll">
            <?php foreach ($inicio_hero_photos as $index => $photo): ?>
                <div class="photo-item">
                    <img
                        src="<?= asset($photo['file']) ?>"
                        alt="<?= htmlspecialchars($photo['alt'], ENT_QUOTES, 'UTF-8') ?>"
                        <?php if ($index > 0): ?>loading="lazy" decoding="async" <?php endif; ?> />
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <a href="#infraestructura" class="btn-primary">Ver Infraestructura</a>
</section>
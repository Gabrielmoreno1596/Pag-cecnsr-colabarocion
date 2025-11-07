<?php
$slides = require __DIR__ . '/../data/ni-hero.php';
?>
<section class="ni ni-hero section-padding" aria-labelledby="ni-hero-title">
    <div class="ni-hero__slider" role="region" aria-roledescription="carousel" aria-label="Galería de Nuevo Ingreso">
        <div class="ni-hero__track" data-kenburns data-interval="6000" data-zoom="1.08">
            <?php foreach ($slides as $i => $s):
                $px = $s['pos']['x'] ?? '50%';
                $py = $s['pos']['y'] ?? '50%';
            ?>
                <figure class="ni-hero__slide<?= $i === 0 ? ' is-active' : '' ?>"
                    data-pos-x="<?= htmlspecialchars($px) ?>"
                    data-pos-y="<?= htmlspecialchars($py) ?>">
                    <img
                        src="<?= htmlspecialchars($s['src']) ?>"
                        alt="<?= htmlspecialchars($s['alt']) ?>"
                        loading="<?= $i === 0 ? 'eager' : 'lazy' ?>"
                        decoding="async" />
                </figure>
            <?php endforeach; ?>
        </div>

        <div class="ni-hero__content">
            <h1 id="ni-hero-title" class="ni-hero__title">Nuevo Ingreso</h1>
            <p class="ni-hero__lead">Consulta el proceso de admisión y recibe orientación personalizada.</p>
            <a class="btn-primary ni-hero__cta" href="#ni-form">Ir al formulario</a>
        </div>
    </div>
</section>
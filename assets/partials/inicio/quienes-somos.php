<section id="quienes-somos" class="section-padding">
    <h2 class="section-title">¿Quiénes Somos?</h2>

    <!-- BLOQUE HISTORIA -->
    <div class="history-flex-container">
        <div class="history-text-block">
            <h3 class="sub-title" style="color: white; margin-bottom: 1rem">
                Nuestra Historia: Una Obra de Fe y Compromiso
            </h3>
            <p>
                El Complejo Educativo Católico "Nuestra Señora del Rosario"
                (CECNSR) nace en 1992 con la visión de M. Ana Margarita Meléndez
                Flores y las Hermanas Franciscanas. A pesar de las carencias
                iniciales, la fe y la providencia fueron nuestros pilares.
            </p>
            <p>
                En 1992, iniciamos gestiones con nuestra insigne bienhechora, la
                institución alemana VIPE, asegurando el futuro del proyecto.
            </p>
            <p>Gracias a su apoyo, logramos grandes hitos:</p>
            <ul style="max-width: 800px; margin: 0 auto; text-align: left">
                <li>
                    <i
                        class="fas fa-check-circle"
                        style="color: var(--cecns-gold)"></i>
                    1995: Apertura de la modalidad de Bachillerato.
                </li>
                <li>
                    <i
                        class="fas fa-check-circle"
                        style="color: var(--cecns-gold)"></i>
                    1998-2000: Construcción y consolidación de nuestra
                    infraestructura actual, 100% financiada por VIPE.
                </li>
                <li>
                    <i
                        class="fas fa-check-circle"
                        style="color: var(--cecns-gold)"></i>
                    2011: Inauguración del moderno edificio de Educación Parvularia,
                    financiado por la Fundación Alemana Webasto.
                </li>
            </ul>
            <p style="margin-top: 1rem">
                Hoy, atendemos a más de 1500 estudiantes, buscando la excelencia y
                la superación del ser humano por el Evangelio y la Educación.
            </p>
        </div>

        <!-- Carrusel de HISTORIA usando datos -->
        <div class="history-carousel-container">
            <div class="history-carousel-track">
                <?php foreach ($inicio_historia_photos as $photo): ?>
                    <img
                        src="<?= asset($photo['file']) ?>"
                        alt="<?= htmlspecialchars($photo['alt'], ENT_QUOTES, 'UTF-8') ?>"
                        class="history-carousel-img"
                        loading="lazy"
                        decoding="async" />
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- BLOQUE MISIÓN / VISIÓN / COMPROMISO -->
    <h3
        id="mision-vision-compromiso"
        class="sub-title"
        style="margin-top: 3rem">
        Misión, Visión y Compromiso
    </h3>

    <div class="philosophy-grid">
        <?php foreach ($inicio_mision_cards as $card): ?>
            <div class="mission-vision-card">
                <i class="<?= htmlspecialchars($card['icon'], ENT_QUOTES, 'UTF-8') ?>"></i>
                <h3><?= htmlspecialchars($card['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                <p><?= htmlspecialchars($card['text'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- BLOQUE INFRAESTRUCTURA -->
    <section id="infraestructura">
        <div class="infra-carousel-container">
            <div class="infra-carousel-track">
                <?php foreach ($inicio_infra_photos as $photo): ?>
                    <img
                        src="<?= asset($photo['file']) ?>"
                        alt="<?= htmlspecialchars($photo['alt'], ENT_QUOTES, 'UTF-8') ?>"
                        class="infra-carousel-img"
                        loading="lazy"
                        decoding="async" />
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</section>
<?php
$BASE = PROJECT_PATH . 'assets/partials/pastoral-educativa/';

// (Opcional) cargar data si la usas en los componentes:
$DATA = $BASE . 'data/';
@require_once $DATA . 'hero-data.php';
@require_once $DATA . 'mision-data.php';
/*@require_once $DATA . 'diagramas-data.php';
@require_once $DATA . 'oferta-data.php';
@require_once $DATA . 'galeria-data.php';
@require_once $DATA . 'himno-data.php'; */
?>
<main id="main-content" class="pastoral" role="main">
    <section class="pastoral" id="pastoral-educativa">

        <?php require $BASE . 'components/hero.php'; ?>

        <section class="band band--mision-flat" id="mision">
            <div class="band__inner">
                <?php require $BASE . 'components/mision.php'; ?>
            </div>
        </section>

        <section class="band band--desempenos-rail" id="desempenos">
            <div class="band__inner">
                <?php require $BASE . 'components/desempenos.php'; ?>
            </div>
        </section>

        <section class="band band--diagramas" id="diagramas">
            <div class="band__inner">
                <?php require $BASE . 'components/diagramas.php'; ?>
            </div>
        </section>

        <section class="band band--oferta-timeline" id="oferta">
            <div class="band__inner" data-oferta>
                <?php require $BASE . 'components/oferta.php'; ?>
            </div>
        </section>

        <section class="band band--gallery-masonry" id="galeria">
            <div class="band__inner">
                <?php require $BASE . 'components/galeria.php'; ?>
            </div>
        </section>

        <section class="band band--himno-soft" id="himno">
            <div class="band__inner">
                <?php require $BASE . 'components/himno.php'; ?>
            </div>
        </section>

    </section>

    <!-- Lightbox global (una vez por página) -->
    <div id="lightbox" class="lightbox" aria-hidden="true" hidden>
        <button class="lightbox__close" aria-label="Cerrar">×</button>
        <button class="lightbox__nav lightbox__nav--prev" aria-label="Anterior">‹</button>
        <img class="lightbox__img" alt="Vista ampliada" />
        <button class="lightbox__nav lightbox__nav--next" aria-label="Siguiente">›</button>
    </div>
</main>
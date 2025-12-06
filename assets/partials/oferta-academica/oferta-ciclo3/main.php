<?php
// main.php – Contenedor principal de la página III Ciclo
?>
<main>
    <?php include __DIR__ . '/components/hero.php'; ?>

    <section class="section-padding bg-white">
        <div class="content-wrapper">
            <?php include __DIR__ . '/components/valores.php'; ?>
        </div>
    </section>

    <section class="section-padding bg-light">
        <div class="content-wrapper">
            <?php include __DIR__ . '/components/metas.php'; ?>
            <?php include __DIR__ . '/components/experiencias.php'; ?>
            <?php include __DIR__ . '/components/trayectoria.php'; ?>
        </div>
    </section>

    <section class="section-padding bg-white" id="admisiones">
        <div class="content-wrapper">
            <?php include __DIR__ . '/components/admision.php'; ?>
        </div>
    </section>
</main>
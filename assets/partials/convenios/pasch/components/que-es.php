<?php $q = $queEsData; ?>

<section class="section" id="CECNSR">
    <div class="card">
        <h2 class="section-title"><?= $q['title'] ?></h2>
        <div class="title-divider" aria-hidden="true"></div>

        <p><?= $q['p1'] ?></p>
        <p><?= $q['p2'] ?></p>

        <a class="btn-pill"
            href="<?= $q['link']['href'] ?>"
            target="_blank"
            rel="noopener">
            <?= $q['link']['label'] ?>
        </a>
    </div>
</section>
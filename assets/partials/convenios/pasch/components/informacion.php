<?php $info = $informacionData; ?>

<section class="section" id="<?= $info['id'] ?>" aria-label="Información PASCH en CECNSR">
    <div class="card card--accent">
        <h2 class="section-title"><?= $info['title'] ?></h2>
        <div class="title-divider" aria-hidden="true"></div>

        <div class="ihub__tabs" role="tablist" aria-label="Secciones de información">
            <?php foreach ($info['tabs'] as $t): ?>
                <?php
                $tabId = "tab-" . $t['id'];
                $panelId = "panel-" . $t['id'];
                $active = !empty($t['active']);
                ?>
                <button
                    class="ihub__tab <?= $active ? 'is-active' : '' ?>"
                    role="tab"
                    aria-selected="<?= $active ? 'true' : 'false' ?>"
                    aria-controls="<?= $panelId ?>"
                    id="<?= $tabId ?>">
                    <?= $t['label'] ?>
                </button>
            <?php endforeach; ?>
        </div>

        <?php foreach ($info['tabs'] as $t): ?>
            <?php
            $tabId = "tab-" . $t['id'];
            $panelId = "panel-" . $t['id'];
            $active = !empty($t['active']);
            ?>
            <div
                class="ihub__panel <?= $active ? 'is-active' : '' ?>"
                id="<?= $panelId ?>"
                role="tabpanel"
                aria-labelledby="<?= $tabId ?>">

                <?php if ($t['id'] === 'asociacion'): ?>
                    <p><?= $t['content']['p'] ?></p>

                    <ul class="bullets">
                        <?php foreach ($t['content']['bullets'] as $b): ?>
                            <li><?= $b ?></li>
                        <?php endforeach; ?>
                    </ul>

                    <details class="ihub__dl">
                        <summary><strong>Ver línea de tiempo breve</strong></summary>
                        <ul class="timeline">
                            <?php foreach ($t['content']['timeline'] as $i => $line): ?>
                                <li>
                                    <span class="dot"><?= $i + 1 ?></span>
                                    <div class="tl-body"><?= $line ?></div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </details>

                    <a class="btn-link" href="<?= $t['content']['cta']['href'] ?>">
                        <?= $t['content']['cta']['label'] ?>
                    </a>
                <?php endif; ?>

                <?php if ($t['id'] === 'oportunidades'): ?>
                    <div class="grid-3 ihub__cards">
                        <?php foreach ($t['cards'] as $c): ?>
                            <article class="feature ihub__card">
                                <i class="fas <?= $c['icon'] ?>" aria-hidden="true"></i>
                                <h3><?= $c['title'] ?></h3>
                                <p><?= $c['text'] ?></p>
                                <details>
                                    <summary class="ihub__more">Más detalles</summary>
                                    <p><?= $c['more'] ?></p>
                                </details>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($t['id'] === 'faq'): ?>
                    <?php foreach ($t['faq'] as $f): ?>
                        <details class="ihub__faq">
                            <summary><?= $f['q'] ?></summary>
                            <p><?= $f['a'] ?></p>
                        </details>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        <?php endforeach; ?>

    </div>
</section>
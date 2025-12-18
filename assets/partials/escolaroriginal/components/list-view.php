<?php

/**
 * Renderiza una checklist con hash estable por grado + seccion + texto.
 */
function renderChecklist(array $items, string $section, string $gradeKey): void
{
    if (empty($items)) {
        echo '<p class="school-checklist__empty">Pr&oacute;ximamente.</p>';
        return;
    }

    echo '<ul class="school-checklist" data-section="' . htmlspecialchars($section) . '">';
    foreach ($items as $item) {
        $hash = substr(md5($gradeKey . '|' . $section . '|' . $item), 0, 12);
        $storageKey = "cecnsr-check-{$gradeKey}-{$section}-{$hash}";
?>
        <li class="school-checklist__item"
            data-storage-key="<?= htmlspecialchars($storageKey) ?>">
            <label class="school-checklist__row">
                <input
                    type="checkbox"
                    class="school-checklist__box"
                    aria-label="Marcar <?= htmlspecialchars($item) ?>">
                <span class="school-checklist__text"><?= htmlspecialchars($item) ?></span>
            </label>
        </li>
<?php
    }
    echo '</ul>';
}

$levelColors = [
    "I Ciclo"            => ["bar" => "#1f8a3b", "soft" => "#e9f6ed"],
    "II Ciclo"           => ["bar" => "#1f335a", "soft" => "#e8eef8"],
    "III Ciclo"          => ["bar" => "#7a1f3d", "soft" => "#f6e8ee"],
    "Bachillerato"       => ["bar" => "#d9b23a", "soft" => "#fff8e1"],
    "Bachillerato/Media" => ["bar" => "#d9b23a", "soft" => "#fff8e1"],
    "Media"              => ["bar" => "#d9b23a", "soft" => "#fff8e1"],
    "Otros"              => ["bar" => "#6b7280", "soft" => "#f1f5f9"],
];

$levelColor = $levelColors[$gradeMeta["level"] ?? ""]["bar"] ?? "#1f335a";
$hasData = $dataAvailable ?? true;
$hasItems = $dataHasItems
    ?? (!empty($data["mineduc"]) || !empty($data["others"]) || !empty($data["all_students"]));
?>

<section class="school-tools" data-grade="<?= htmlspecialchars($gradeKey) ?>">

    <div class="school-tools-head">
        <div>
            <p class="school-tools-head__eyebrow">Listas de &uacute;tiles</p>
            <h2 class="school-tools-head__title"><?= htmlspecialchars($data["title"]) ?></h2>
            <p class="school-tools-head__subtitle">
                <?= htmlspecialchars($gradeMeta["label"]) ?> &middot; <?= htmlspecialchars($data["year"]) ?>
            </p>
        </div>
    </div>

    <!-- Encabezado visible solo al imprimir -->
    <div class="school-print-head">
        <img class="school-print-head__logo" src="<?= asset('assets/1_CECNSR.png') ?>" alt="Logo CECNSR">
        <div>
            <p class="school-print-head__title"><?= htmlspecialchars($data["title"]) ?></p>
            <p class="school-print-head__meta"><?= htmlspecialchars($gradeMeta["label"]) ?> &middot; <?= htmlspecialchars($data["year"]) ?></p>
        </div>
    </div>

    <div class="school-tools-layout">
        <div class="school-tools-main">
            <?php if (!$hasData || !$hasItems): ?>
                <p class="school-checklist__empty">Lista de &uacute;tiles no disponible temporalmente para este grado.</p>
            <?php else: ?>
                <div class="school-tools__grid">

                    <article class="school-tools-card">
                        <header class="school-tools-card__head">
                            <h2>Paquete Escolar MINEDUCYT</h2>
                            <p>Elementos provistos por el Ministerio.</p>
                        </header>
                        <?php renderChecklist($data["mineduc"], "mineduc", $gradeKey); ?>
                    </article>

                    <article class="school-tools-card">
                        <header class="school-tools-card__head">
                            <h2>Otros materiales para utilizar</h2>
                            <p>Recomendados por el colegio.</p>
                        </header>
                        <?php renderChecklist($data["others"], "others", $gradeKey); ?>
                    </article>

                    <article class="school-tools-note">
                        <h3>Nota aclaratoria</h3>
                        <?php if (!empty($data["note"])): ?>
                            <?php foreach ($data["note"] as $line): ?>
                                <p><?= htmlspecialchars($line) ?></p>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Pr&oacute;ximamente.</p>
                        <?php endif; ?>
                    </article>

                    <article class="school-tools-card">
                        <header class="school-tools-card__head">
                            <h2>Para todos los estudiantes de este grado</h2>
                            <p>&Uacute;tiles comunes por secci&oacute;n.</p>
                        </header>
                        <?php renderChecklist($data["all_students"], "all_students", $gradeKey); ?>
                    </article>

                </div>
            <?php endif; ?>
        </div>

        <!-- Acciones flotantes -->
        <aside class="school-actions"
            style="--level-accent: <?= htmlspecialchars($levelColor) ?>;"
            data-grade="<?= htmlspecialchars($gradeMeta["label"]) ?>"
            data-year="<?= htmlspecialchars($data["year"]) ?>">

            <input type="checkbox" id="actionsToggle" class="school-actions-toggle-checkbox" aria-hidden="true">

            <div class="school-actions-inner">
                <button class="school-actions-toggle is-closed" type="button" aria-label="Ver acciones">
                    <span class="icon" aria-hidden="true">&#9650;</span>
                    <span class="label">Ver acciones</span>
                </button>

                <div class="school-actions-bottom">
                    <div class="school-actions__head">
                        <div class="school-actions__grade">
                            <span class="school-actions__grade-pill">
                                <?= htmlspecialchars($gradeMeta["label"]) ?>
                            </span>
                            <!--    <span class="school-actions__year">
                                <?= htmlspecialchars($data["year"]) ?>
                            </span> -->
                        </div>
                        <img
                            class="school-actions__img"
                            src="assets/partials/escolar/img/logo-utiles-escolar.png"
                            alt="Decoraci&oacute;n escolar" />

                    </div>

                    <p class="school-actions__counter js-school-counter" aria-live="polite">
                        <span class="kicker">&Uacute;tiles marcados</span>
                        <span class="value">
                            <span class="done">0</span>/<span class="total">0</span>
                        </span>
                        <span class="bar"><span style="--progress: 0%;"></span></span>
                    </p>

                    <!-- Puedes agregar m&aacute;s acciones aqu&iacute; si las necesitas -->
                </div>

                <div class="school-actions-top">
                    <a
                        href="export-utiles.php?grade=<?= htmlspecialchars($gradeKey) ?>"
                        class="school-actions__btn school-actions__btn--primary school-actions__btn--download">
                        Descargar PDF (Carta)
                    </a>

                    <button class="school-actions__btn school-actions__btn--secondary school-actions__btn--print js-school-print" type="button">
                        Imprimir / Guardar PDF
                    </button>
                </div>

            </div>
        </aside>
    </div>

</section>

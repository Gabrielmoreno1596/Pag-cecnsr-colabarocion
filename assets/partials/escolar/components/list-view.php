<?php

/**
 * Convierte un item a texto “fiel”, soportando:
 *  - "texto"
 *  - ["qty" => 3, "text" => "...", "details" => "..."]
 */
function itemToText($item): string
{
    if (is_string($item)) {
        return trim($item);
    }

    if (is_array($item)) {
        $qty = $item["qty"] ?? null;
        $text = $item["text"] ?? "";
        $details = $item["details"] ?? "";

        $text = trim((string)$text);
        $details = trim((string)$details);

        $out = $text;

        if ($qty !== null && $qty !== "") {
            $out = trim((string)$qty) . " " . $out;
        }

        if ($details !== "") {
            $out .= " (" . $details . ")";
        }

        return trim($out);
    }

    return trim((string)$item);
}

/**
 * Normaliza un arreglo de items a lista de strings (para checklist)
 */
function normalizeItems($items): array
{
    if (!is_array($items)) return [];
    $out = [];
    foreach ($items as $it) {
        $t = itemToText($it);
        if ($t !== "") $out[] = $t;
    }
    return $out;
}

/**
 * Renderiza una checklist con hash estable por grado + seccion + texto.
 */
function renderChecklist(array $items, string $section, string $gradeKey): void
{
    $items = normalizeItems($items);

    if (empty($items)) {
        echo '<p class="school-checklist__empty">Pr&oacute;ximamente.</p>';
        return;
    }

    echo '<ul class="school-checklist" data-section="' . htmlspecialchars($section) . '">';
    foreach ($items as $itemText) {
        $hash = substr(md5($gradeKey . '|' . $section . '|' . $itemText), 0, 12);
        $storageKey = "cecnsr-check-{$gradeKey}-{$section}-{$hash}";
?>
        <li class="school-checklist__item"
            data-storage-key="<?= htmlspecialchars($storageKey) ?>">
            <label class="school-checklist__row">
                <input
                    type="checkbox"
                    class="school-checklist__box"
                    aria-label="Marcar <?= htmlspecialchars($itemText) ?>">
                <span class="school-checklist__text"><?= htmlspecialchars($itemText) ?></span>
            </label>
        </li>
<?php
    }
    echo '</ul>';
}

/** Compatibilidad: PHP < 8.1 no tiene array_is_list() */
function isListArray(array $arr): bool
{
    if (function_exists('array_is_list')) {
        return array_is_list($arr);
    }

    $i = 0;
    foreach ($arr as $k => $_) {
        if ($k !== $i++) return false;
    }
    return true;
}

/**
 * Renderiza bloques por especialidad.
 * Formatos soportados:
 *  - "specialties": { "Nombre": ["...", "..."] }
 *  - "specialties": { "Nombre": { "Sección": ["..."], "Otra": ["..."] } }
 */
function renderSpecialties(array $specialties, string $gradeKey): void
{
    if (empty($specialties)) return;

    echo '<div class="school-spec-grid">';

    foreach ($specialties as $specName => $specData) {
        echo '<section class="school-spec">';
        echo '<h3 class="school-spec__title">' . htmlspecialchars((string)$specName) . '</h3>';

        // Lista simple: una sola checklist
        if (is_array($specData) && isListArray($specData)) {
            $sectionKey = 'spec|' . (string)$specName;
            renderChecklist($specData, $sectionKey, $gradeKey);
            echo '</section>';
            continue;
        }

        // Objeto/assoc: renderizar subsecciones
        if (is_array($specData)) {
            foreach ($specData as $subName => $items) {
                if (!is_array($items)) continue;
                echo '<h4 class="school-spec__subtitle">' . htmlspecialchars((string)$subName) . '</h4>';
                $sectionKey = 'spec|' . (string)$specName . '|' . (string)$subName;
                renderChecklist($items, $sectionKey, $gradeKey);
            }
        }

        echo '</section>';
    }

    echo '</div>';
}

/**
 * Construye secciones en modo “fiel al documento”:
 * - Si existe data["sections"], se usa TAL CUAL (orden intacto)
 * - Si no existe, arma secciones desde el formato legacy.
 */
function getSectionsFromData(array $data): array
{
    if (!empty($data["sections"]) && is_array($data["sections"])) {
        return $data["sections"];
    }

    $sections = [];

    $sections[] = [
        "key" => "mineduc",
        "label" => "Paquete Escolar MINEDUCYT",
        "hint" => "Elementos provistos por el Ministerio.",
        "items" => $data["mineduc"] ?? []
    ];

    $sections[] = [
        "key" => "others",
        "label" => "Otros materiales para utilizar",
        "hint" => "Recomendados por el colegio.",
        "items" => $data["others"] ?? []
    ];

    $sections[] = [
        "key" => "all_students",
        "label" => "Para todos los estudiantes de este grado",
        "hint" => "&Uacute;tiles comunes por secci&oacute;n.",
        "items" => $data["all_students"] ?? []
    ];

    // Soporte opcional si ya lo agregas en JSON
    if (!empty($data["entregar_ninas"])) {
        $sections[] = [
            "key" => "entregar_ninas",
            "label" => "Para agregar solo a las ni&ntilde;as",
            "hint" => "",
            "items" => $data["entregar_ninas"]
        ];
    }

    if (!empty($data["entregar_ninos"])) {
        $sections[] = [
            "key" => "entregar_ninos",
            "label" => "Para agregar solo a los ni&ntilde;os",
            "hint" => "",
            "items" => $data["entregar_ninos"]
        ];
    }

    return $sections;
}

/**
 * Obtiene notas (nuevo notes[] o legacy note[])
 */
function getNotesFromData(array $data): array
{
    if (!empty($data["notes"]) && is_array($data["notes"])) return $data["notes"];
    if (!empty($data["note"]) && is_array($data["note"])) return $data["note"];
    return [];
}

$levelColors = [
    "Educación Inicial y Parvularia" => ["bar" => "#0ea5e9", "soft" => "#e0f2fe"],
    "I Ciclo"            => ["bar" => "#1f8a3b", "soft" => "#e9f6ed"],
    "II Ciclo"           => ["bar" => "#1f335a", "soft" => "#e8eef8"],
    "III Ciclo"          => ["bar" => "#7a1f3d", "soft" => "#f6e8ee"],
    "Bachillerato"       => ["bar" => "#d9b23a", "soft" => "#fff8e1"],
    "Bachillerato/Media" => ["bar" => "#d9b23a", "soft" => "#fff8e1"],
    "Media"              => ["bar" => "#d9b23a", "soft" => "#fff8e1"],
    "Otros"              => ["bar" => "#6b7280", "soft" => "#f1f5f9"],
];

$levelColor = $levelColors[$gradeMeta["level"] ?? ""]["bar"] ?? "#1f335a";

$sections = getSectionsFromData($data);
$notes = getNotesFromData($data);

$hasData = $dataAvailable ?? true;

// Detectar items de forma robusta
$hasItems = false;
foreach ($sections as $s) {
    $items = $s["items"] ?? [];
    if (!empty(normalizeItems($items))) {
        $hasItems = true;
        break;
    }
}
if (!$hasItems && !empty($data["specialties"])) $hasItems = true;

?>

<section class="school-tools" data-grade="<?= htmlspecialchars($gradeKey) ?>">

    <div class="school-tools-head">
        <div>
            <!--  <p class="school-tools-head__eyebrow">Listas de &uacute;tiles</p> -->
            <h2 class="school-tools-head__title"><?= htmlspecialchars($data["title"] ?? "Lista de útiles") ?></h2>
            <p class="school-tools-head__subtitle">
                <?= htmlspecialchars($gradeMeta["label"]) ?> &middot; <?= htmlspecialchars($data["year"] ?? "2026") ?>
            </p>
        </div>
    </div>

    <!-- Encabezado visible solo al imprimir -->
    <div class="school-print-head">
        <img class="school-print-head__logo" src="<?= asset('assets/1_CECNSR.png') ?>" alt="Logo CECNSR">
        <div>
            <p class="school-print-head__title"><?= htmlspecialchars($data["title"] ?? "Lista de útiles") ?></p>
            <p class="school-print-head__meta"><?= htmlspecialchars($gradeMeta["label"]) ?> &middot; <?= htmlspecialchars($data["year"] ?? "2026") ?></p>
        </div>
    </div>

    <div class="school-tools-layout">
        <div class="school-tools-main">
            <?php if (!$hasData || !$hasItems): ?>
                <p class="school-checklist__empty">Lista de &uacute;tiles no disponible temporalmente para este grado.</p>
            <?php else: ?>
                <div class="school-tools__grid">

                    <?php if (!empty($notes)): ?>
                        <article class="school-tools-note">
                            <h3>Nota aclaratoria</h3>
                            <?php foreach ($notes as $line): ?>
                                <p><?= htmlspecialchars((string)$line) ?></p>
                            <?php endforeach; ?>
                        </article>
                    <?php endif; ?>

                    <?php foreach ($sections as $section): ?>
                        <?php
                        $key = (string)($section["key"] ?? "");
                        $label = (string)($section["label"] ?? $key);
                        $hint = (string)($section["hint"] ?? "");
                        $items = $section["items"] ?? [];

                        if (empty(normalizeItems($items))) continue;
                        ?>
                        <article class="school-tools-card">
                            <header class="school-tools-card__head">
                                <h2><?= htmlspecialchars($label) ?></h2>
                                <?php if ($hint !== ""): ?>
                                    <p><?= $hint ?></p>
                                <?php endif; ?>
                            </header>
                            <?php renderChecklist($items, $key, $gradeKey); ?>
                        </article>
                    <?php endforeach; ?>

                    <?php if (!empty($data["specialties"])): ?>
                        <article class="school-tools-card school-tools-card--wide">
                            <header class="school-tools-card__head">
                                <h2>Materiales por especialidad</h2>
                                <p>Aplica &uacute;nicamente a la especialidad correspondiente.</p>
                            </header>
                            <?php renderSpecialties($data["specialties"], $gradeKey); ?>
                        </article>
                    <?php endif; ?>

                </div>
            <?php endif; ?>
        </div>

        <!-- Acciones flotantes -->
        <aside class="school-actions"
            style="--level-accent: <?= htmlspecialchars($levelColor) ?>;"
            data-grade="<?= htmlspecialchars($gradeMeta["label"]) ?>"
            data-year="<?= htmlspecialchars($data["year"] ?? "2026") ?>">

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

                </div>

                <div class="school-actions-top">
                    <a
                        href="export-utiles.php?grade=<?= htmlspecialchars($gradeKey) ?>"
                        class="school-actions__btn school-actions__btn--primary school-actions__btn--download">
                        Descargar PDF
                    </a>

                    <button class="school-actions__btn school-actions__btn--secondary school-actions__btn--print js-school-print" type="button">
                        Imprimir
                    </button>
                </div>

            </div>
        </aside>
    </div>

</section>
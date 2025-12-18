<?php

/**
 * Normaliza strings para evitar NBSP/espacios invisibles.
 */
function normalize_str(string $s): string
{
    $s = str_replace("\xC2\xA0", " ", $s);
    return trim(preg_replace('/\s+/u', ' ', $s));
}

/**
 * Normaliza el nombre del nivel para que SIEMPRE coincida con:
 * I Ciclo / II Ciclo / III Ciclo / Bachillerato / Otros
 */
function normalize_level(string $level): string
{
    $level = normalize_str($level);
    $lower = mb_strtolower($level, 'UTF-8');

    if ($lower === 'educación media' || $lower === 'educacion media') return 'Bachillerato';
    if ($lower === 'bachillerato') return 'Bachillerato';
    if ($lower === 'i ciclo') return 'I Ciclo';
    if ($lower === 'ii ciclo') return 'II Ciclo';
    if ($lower === 'iii ciclo') return 'III Ciclo';

    return $level !== '' ? $level : 'Otros';
}

// Agrupar por nivel (NORMALIZADO)
$groups = [];
foreach ($map as $key => $meta) {
    $rawLevel = (string)($meta["level"] ?? "Otros");
    $level = normalize_level($rawLevel);
    $groups[$level][$key] = $meta;
}

// Orden deseado
$levelOrder = ["I Ciclo", "II Ciclo", "III Ciclo", "Bachillerato", "Otros"];
uksort($groups, function ($a, $b) use ($levelOrder) {
    $ia = array_search($a, $levelOrder, true);
    $ib = array_search($b, $levelOrder, true);
    $ia = $ia === false ? 999 : $ia;
    $ib = $ib === false ? 999 : $ib;
    return $ia <=> $ib;
});

// Nivel activo segun el grado actual (NORMALIZADO)
$activeLevel = normalize_level((string)($gradeMeta["level"] ?? "Otros"));

// Grado activo normalizado (para comparaciones seguras)
$currentGradeKey = normalize_str((string)($gradeKey ?? ''));

// Pre-calculo SOLO para Bachillerato: buckets 1/2/3 y link del primer grado por ano
$bachItems = $groups["Bachillerato"] ?? [];
$bachBuckets = ["1" => [], "2" => [], "3" => []];

foreach ($bachItems as $k => $m) {
    $label = normalize_str((string)($m["label"] ?? ""));
    if (preg_match('/^\s*([123])\s*[°º]/u', $label, $mm)) {
        $bachBuckets[$mm[1]][$k] = $m;
    }
}

$bachFirstLinks = ["1" => null, "2" => null, "3" => null];
foreach (["1", "2", "3"] as $y) {
    $firstKey = array_key_first($bachBuckets[$y]);
    if ($firstKey !== null) {
        $bachFirstLinks[$y] = $firstKey;
    }
}

// Ano activo segun el label del grado actual
$activeYear = "1";
$currentLabel = normalize_str((string)($gradeMeta["label"] ?? ""));
if (preg_match('/^\s*([123])\s*[°º]/u', $currentLabel, $mm)) {
    $activeYear = $mm[1];
}

// Colores por nivel (puedes ajustarlos a tu paleta institucional)
$levelColors = [
    "I Ciclo" => ["bar" => "#2fbf71", "soft" => "#ecfbf3"],
    "II Ciclo" => ["bar" => "#3b82f6", "soft" => "#eff6ff"],
    "III Ciclo" => ["bar" => "#f59e0b", "soft" => "#fff7ed"],
    "Bachillerato" => ["bar" => "#8b5cf6", "soft" => "#f5f3ff"],
    "Otros" => ["bar" => "#64748b", "soft" => "#f1f5f9"],
];
?>

<section class="school-hero">
    <div class="school-hero__inner">
        <div class="school-hero__content">
            <h1 class="school-hero__title">Listas de utiles por nivel</h1>
            <p class="school-hero__subtitle">Selecciona un nivel para ver los grados disponibles.</p>
        </div>

        <div class="school-hero__year" aria-label="Ano 2026">
            <span class="school-hero__yearText">2026</span>
        </div>
    </div>
</section>

<div class="school-levelbar-shell">
    <!-- Boton flotante -->
    <button
        class="school-levelbar-fab"
        type="button"
        aria-expanded="false"
        aria-label="Abrir niveles y grados">
        <span class="school-levelbar-fab__icon">&#9776;</span>
    </button>

    <!-- Fondo difuminado -->
    <div class="school-levelbar-backdrop" aria-hidden="true"></div>

    <!-- Panel de niveles -->
    <nav class="school-levelbar" aria-label="Niveles academicos">
        <div class="school-levelbar-mobile-header">
            <span class="school-levelbar-mobile-title">Niveles y grados</span>
            <button
                class="school-levelbar-mobile-close"
                type="button"
                aria-label="Cerrar menu de niveles y grados">
                &times;
            </button>
        </div>

        <div class="school-levelbar__inner">
            <div class="school-levelbar-items-row">

                <?php foreach ($groups as $level => $items):
                    $level = normalize_level($level);
                    $isActive = ($level === $activeLevel);
                    $colors = $levelColors[$level] ?? $levelColors["Otros"];
                ?>
                    <div class="school-levelbar-item <?= $isActive ? "is-active" : "" ?>"
                        style="--level-bar: <?= htmlspecialchars($colors["bar"]) ?>; --level-soft: <?= htmlspecialchars($colors["soft"]) ?>;"
                        data-level="<?= htmlspecialchars($level) ?>">

                        <!-- Boton compacto del nivel -->
                        <button class="school-levelbar-btn <?= $isActive ? "is-active" : "" ?>"
                            type="button"
                            aria-haspopup="true"
                            aria-expanded="<?= $isActive ? "true" : "false" ?>">
                            <span class="school-levelbar-btn__label"><?= htmlspecialchars($level) ?></span>
                            <span class="school-levelbar-btn__chev" aria-hidden="true">&#9662;</span>
                        </button>

                        <!-- Dropdown de grados -->
                        <?php if ($level === "Bachillerato"): ?>
                            <div class="school-levelbar-dd <?= $isActive ? "is-open" : "" ?> bach-dd">
                                <?php
                                $tabTitles = ["1" => "Primer Brto.", "2" => "Segundo Brto.", "3" => "Tercer Brto."];
                                $availableTabs = [];
                                foreach (["1", "2", "3"] as $y) {
                                    if (!empty($bachBuckets[$y]) && !empty($bachFirstLinks[$y])) {
                                        $availableTabs[] = $y;
                                    }
                                }
                                $activeTab = in_array($activeYear, $availableTabs, true)
                                    ? $activeYear
                                    : ($availableTabs[0] ?? "1");
                                $chipsToRender = $bachBuckets[$activeTab] ?? [];
                                ?>

                                <?php if (!empty($availableTabs)): ?>
                                    <div class="bach-tabs">
                                        <?php foreach ($availableTabs as $y):
                                            $isTabActive = ($y === $activeTab) ? "is-active" : "";
                                        ?>
                                            <button
                                                type="button"
                                                class="bach-tab <?= $isTabActive ?>"
                                                data-bach-tab="<?= htmlspecialchars($y) ?>"
                                            >
                                                <?= htmlspecialchars($tabTitles[$y]) ?>
                                            </button>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="bach-chips" data-bach-chips>
                                        <?php foreach (["1", "2", "3"] as $year): ?>
                                            <div class="bach-chips__panel <?= ($year === $activeTab) ? "is-active" : "" ?>"
                                                data-bach-panel="<?= htmlspecialchars($year) ?>">
                                                <?php foreach (($bachBuckets[$year] ?? []) as $gKey => $gMeta):
                                                    $isGradeActive = (normalize_str((string)$gKey) === $currentGradeKey);
                                                    $activeGrade = $isGradeActive ? "is-grade-active" : "";
                                                ?>
                                                    <a class="school-levelbar-grade <?= $activeGrade ?>"
                                                        <?= $isGradeActive ? 'aria-current="page"' : '' ?>
                                                        href="escolar.php?grade=<?= htmlspecialchars($gKey) ?>">
                                                        <?= htmlspecialchars($gMeta["label"] ?? "") ?>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div class="school-levelbar-dd <?= $isActive ? "is-open" : "" ?>">
                                <?php foreach ($items as $key => $meta):
                                    $isGradeActive = (normalize_str((string)$key) === $currentGradeKey);
                                    $activeGrade = $isGradeActive ? "is-grade-active" : "";
                                ?>
                                    <a class="school-levelbar-grade <?= $activeGrade ?>"
                                        <?= $isGradeActive ? 'aria-current="page"' : '' ?>
                                        href="escolar.php?grade=<?= htmlspecialchars($key) ?>">
                                        <?= htmlspecialchars($meta["label"]) ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </nav>
</div>

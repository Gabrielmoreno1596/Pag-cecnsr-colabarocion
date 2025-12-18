<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';

// Autoload de Composer (Dompdf)
$autoload = __DIR__ . '/vendor/autoload.php';
if (!is_readable($autoload)) {
    http_response_code(500);
    echo 'No se encontró vendor/autoload.php. Instala Dompdf con Composer.';
    exit;
}
require_once $autoload;

use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * Compatibilidad: PHP < 8.1 no tiene array_is_list().
 */
function is_list_array(array $arr): bool
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
 * Convierte un item (string|array) a texto.
 * Soporta:
 *  - "texto"
 *  - {"text": "..."}
 *  - {"qty": 2, "text": "..."}
 */
function item_to_text($item): string
{
    if (is_string($item)) {
        $s = $item;
    } elseif (is_array($item)) {
        $qty = $item['qty'] ?? null;
        $text = $item['text'] ?? $item['item'] ?? '';
        $s = ($qty !== null && $qty !== '') ? (trim((string)$qty) . ' ' . trim((string)$text)) : trim((string)$text);
    } else {
        $s = '';
    }

    // Normalizar espacios/tabulaciones (en HTML/PDF el tab se colapsa; esto solo evita "saltos raros").
    $s = str_replace(["\r\n", "\r", "\n", "\t"], ' ', $s);
    $s = preg_replace('/\s{2,}/', ' ', $s) ?? $s;
    return trim($s);
}

function normalize_items($items): array
{
    if (!is_array($items)) return [];
    $out = [];
    foreach ($items as $it) {
        $t = item_to_text($it);
        if ($t !== '') $out[] = $t;
    }
    return $out;
}

/**
 * Obtiene secciones en orden fiel al JSON.
 * Preferencia: data.sections[].
 * Fallback: mineduc/others/all_students.
 */
function get_sections(array $data): array
{
    $sections = [];

    if (isset($data['sections']) && is_array($data['sections'])) {
        foreach ($data['sections'] as $sec) {
            if (!is_array($sec)) continue;
            $label = isset($sec['label']) ? trim((string)$sec['label']) : '';
            $key   = isset($sec['key']) ? trim((string)$sec['key']) : '';
            $hint  = isset($sec['hint']) ? trim((string)$sec['hint']) : '';
            $items = normalize_items($sec['items'] ?? []);
            if ($label === '' || empty($items)) continue;
            $sections[] = [
                'key' => $key !== '' ? $key : $label,
                'label' => $label,
                'hint' => $hint,
                'items' => $items,
            ];
        }
        return $sections;
    }

    // Fallback legacy
    if (!empty($data['mineduc'])) {
        $sections[] = [
            'key' => 'mineduc',
            'label' => 'Paquete Escolar MINEDUCYT',
            'hint' => 'Elementos provistos por el Ministerio.',
            'items' => normalize_items($data['mineduc']),
        ];
    }
    if (!empty($data['others'])) {
        $sections[] = [
            'key' => 'others',
            'label' => 'Otros materiales para utilizar',
            'hint' => 'Recomendados por el colegio.',
            'items' => normalize_items($data['others']),
        ];
    }
    if (!empty($data['all_students'])) {
        $sections[] = [
            'key' => 'all_students',
            'label' => 'Para todos los estudiantes de este grado',
            'hint' => 'Útiles comunes por sección.',
            'items' => normalize_items($data['all_students']),
        ];
    }

    return $sections;
}

function get_notes(array $data): array
{
    // Soportar "notes" y "note"
    $notes = [];
    if (!empty($data['notes']) && is_array($data['notes'])) {
        $notes = $data['notes'];
    } elseif (!empty($data['note']) && is_array($data['note'])) {
        $notes = $data['note'];
    }
    return normalize_items($notes);
}

function render_list_html(array $items, bool $twoCol = false): void
{
    if (empty($items)) {
        echo '<p class="empty">Próximamente.</p>';
        return;
    }

    echo '<ul class="pdf-list' . ($twoCol ? ' two-col' : '') . '">';
    foreach ($items as $t) {
        echo '<li class="pdf-li"><span class="box"></span><span class="txt">' . htmlspecialchars($t, ENT_QUOTES, 'UTF-8') . '</span></li>';
    }
    echo '</ul>';
}

/**
 * Intenta separar "Cantidad" y "Descripción" desde una línea.
 *
 * Se usa para mejorar la impresión en formato tipo tabla.
 * Ejemplos:
 *  - "6 Cuadernos rayados #3"  => ["6", "Cuadernos rayados #3"]
 *  - "2x Lápices"             => ["2", "Lápices"]
 *
 * Si no hay cantidad al inicio, devuelve ['', texto].
 */
function split_qty_desc(string $text): array
{
    $t = trim($text);
    // 1) "2x ..." o "2 X ..."
    if (preg_match('/^([0-9]{1,3})\s*[xX]\s*(.+)$/u', $t, $m)) {
        return [trim($m[1]), trim($m[2])];
    }

    // 2) "6 ..." (número al inicio)
    if (preg_match('/^([0-9]{1,3})\s+(.+)$/u', $t, $m)) {
        return [trim($m[1]), trim($m[2])];
    }

    return ['', $t];
}

function render_table_html(array $items): void
{
    if (empty($items)) {
        echo '<p class="empty">Próximamente.</p>';
        return;
    }

    echo '<table class="items">';
    echo '<colgroup><col class="col-qty"><col class="col-desc"></colgroup>';
    echo '<thead><tr><th>Cantidad</th><th>Descripción</th></tr></thead>';
    echo '<tbody>';
    foreach ($items as $raw) {
        [$qty, $desc] = split_qty_desc((string)$raw);
        $qtySafe  = htmlspecialchars($qty, ENT_QUOTES, 'UTF-8');
        $descSafe = htmlspecialchars($desc, ENT_QUOTES, 'UTF-8');
        echo '<tr>';
        echo '<td class="qty">' . ($qtySafe !== '' ? $qtySafe : '&nbsp;') . '</td>';
        echo '<td class="desc">' . $descSafe . '</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
}

function render_specialties_html(array $specialties): void
{
    if (empty($specialties)) return;

    echo '<div class="spec-grid">';

    foreach ($specialties as $specName => $specData) {
        $specName = (string)$specName;
        echo '<section class="spec">';
        echo '<h3 class="spec-title">' . htmlspecialchars($specName, ENT_QUOTES, 'UTF-8') . '</h3>';

        if (is_array($specData) && is_list_array($specData)) {
            render_table_html(normalize_items($specData));
            echo '</section>';
            continue;
        }

        if (is_array($specData)) {
            foreach ($specData as $subName => $items) {
                if (!is_array($items)) continue;
                echo '<h4 class="spec-sub">' . htmlspecialchars((string)$subName, ENT_QUOTES, 'UTF-8') . '</h4>';
                render_table_html(normalize_items($items));
            }
        }

        echo '</section>';
    }

    echo '</div>';
}

// Mapa de grados
$map = require __DIR__ . '/assets/partials/escolar/data/supplies-map.php';

$gradeKey = (string)($_GET['grade'] ?? '1');
if (!isset($map[$gradeKey])) {
    $gradeKey = '1';
}

$gradeMeta = $map[$gradeKey];
$dataFile  = $gradeMeta['file'];

$dataAvailable = true;
$data = [
    'year' => '2026',
    'title' => 'Lista de útiles',
    'mineduc' => [],
    'others' => [],
    'all_students' => [],
    'specialties' => [],
    'note' => [],
    'notes' => [],
    'sections' => [],
];

if (is_readable($dataFile)) {
    $json = file_get_contents($dataFile);
    $decoded = json_decode($json, true);
    if (is_array($decoded)) {
        $data = array_merge($data, $decoded);
    } else {
        $dataAvailable = false;
    }
} else {
    $dataAvailable = false;
}

$sections = get_sections($data);
$notes = get_notes($data);
$specialties = (isset($data['specialties']) && is_array($data['specialties'])) ? $data['specialties'] : [];

$hasItems = $dataAvailable && (!empty($sections) || !empty($specialties) || !empty($notes));

// Logos en base64 (sin depender de GD)
// 1) Banner institucional para encabezado (logo-26.png dentro del módulo escolar)
$brandDataUri = '';
$brandPath = PROJECT_PATH . 'assets/partials/escolar/img/logo-26.png';
if (is_readable($brandPath)) {
    $mime = mime_content_type($brandPath) ?: 'image/png';
    $brandDataUri = 'data:' . $mime . ';base64,' . base64_encode((string)file_get_contents($brandPath));
}

// 2) Escudo / logo alternativo (fallback)
$logoDataUri = '';
$logoPath = defined('CECNSR_LOGO_FS') ? CECNSR_LOGO_FS : (PROJECT_PATH . 'assets/1_CECNSR.png');
if (is_readable($logoPath)) {
    $mime = mime_content_type($logoPath) ?: 'image/png';
    $logoDataUri = 'data:' . $mime . ';base64,' . base64_encode((string)file_get_contents($logoPath));
}

// HTML interno para PDF
ob_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <style>
        :root {
            --cecns-blue: #004080;
            --cecns-gold: #ffc300;
            --cecns-green: #0b3d2e;

            --text-900: #111827;
            --text-700: #334155;
            --text-500: #64748b;

            --border: #d7ddea;
            --soft: #f6f8fc;
            --row: #fbfcff;
        }

        @page {
            size: letter;
            margin: 0.45in 0.5in 0.75in 0.5in;
        }

        body {
            font-family: "DejaVu Sans", Arial, sans-serif;
            color: var(--text-900);
            font-size: 11.5px;
            line-height: 1.35;
        }

        .brandbar {
            width: 100%;
            height: auto;
            margin: 0 0 10px;
        }

        .titlebox {
            border: 1px solid var(--border);
            background: var(--soft);
            padding: 10px 12px;
            border-radius: 14px;
            display: table;
            width: 100%;
            margin: 0 0 12px;
        }

        .titlebox__l,
        .titlebox__r {
            display: table-cell;
            vertical-align: middle;
        }

        .titlebox__r {
            width: 130px;
            text-align: right;
        }

        .titleline {
            display: table;
            width: 100%;
        }

        .titleline__logo,
        .titleline__text {
            display: table-cell;
            vertical-align: middle;
        }

        .titleline__logo {
            width: 62px;
            padding-right: 10px;
        }

        .crest {
            width: 58px;
            height: 58px;
            object-fit: contain;
            display: block;
        }

        .kicker {
            margin: 0 0 3px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .5px;
            text-transform: uppercase;
            color: var(--text-500);
        }

        .title {
            margin: 0;
            font-size: 18px;
            font-weight: 900;
            color: var(--cecns-blue);
        }

        .meta {
            margin: 4px 0 0;
            font-weight: 700;
            color: var(--text-700);
        }

        .meta small {
            font-weight: 700;
            color: var(--text-500);
        }

        .year {
            font-size: 30px;
            font-weight: 900;
            line-height: 1;
            color: var(--cecns-blue);
        }

        .year-sub {
            margin: 3px 0 0;
            font-size: 10px;
            font-weight: 800;
            color: var(--text-500);
            letter-spacing: .4px;
            text-transform: uppercase;
        }

        .section {
            margin: 0 0 10px;
        }

        .section__head {
            border: 1px solid var(--border);
            border-radius: 14px 14px 0 0;
            padding: 9px 12px 8px;
            background: #ffffff;
        }

        .section__title {
            margin: 0;
            font-size: 13px;
            font-weight: 900;
            color: var(--cecns-blue);
            padding-bottom: 4px;
            border-bottom: 3px solid var(--cecns-gold);
        }

        .section__hint {
            margin: 6px 0 0;
            font-size: 10.5px;
            font-weight: 700;
            color: var(--text-500);
        }

        .section__body {
            border: 1px solid var(--border);
            border-top: 0;
            border-radius: 0 0 14px 14px;
            padding: 10px 12px;
            background: #ffffff;
        }

        .items {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }

        .items th {
            background: var(--cecns-blue);
            color: #ffffff;
            text-align: left;
            padding: 7px 8px;
            font-weight: 900;
            letter-spacing: .2px;
        }

        .items td {
            border-bottom: 1px solid #e6eaf3;
            padding: 7px 8px;
            vertical-align: top;
        }

        .items tbody tr:nth-child(even) td {
            background: var(--row);
        }

        .col-qty {
            width: 90px;
        }

        .qty {
            font-weight: 900;
            color: var(--cecns-green);
            text-align: center;
        }

        .desc {
            color: var(--text-900);
        }

        /* Checklist (para "Para todos...") */
        .pdf-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pdf-li {
            border: 1px solid #e6eaf3;
            border-radius: 12px;
            padding: 6px 8px;
            margin: 0 0 6px;
            background: #fbfcff;
            page-break-inside: avoid;
        }

        .box {
            display: inline-block;
            width: 11px;
            height: 11px;
            border: 1.2px solid var(--cecns-blue);
            border-radius: 2px;
            margin-right: 7px;
            vertical-align: -1px;
        }

        .two-col {
            column-count: 2;
            column-gap: 18px;
        }

        .two-col .pdf-li {
            break-inside: avoid;
        }

        .note {
            border: 1px solid #ffe2a8;
            background: #fff8e4;
            border-radius: 14px;
            padding: 10px 12px;
            margin: 0 0 10px;
            page-break-inside: avoid;
        }

        .note__h {
            margin: 0 0 6px;
            font-size: 12.5px;
            font-weight: 900;
            color: #7a5200;
        }

        .note p {
            margin: 0 0 6px;
        }

        .note p:last-child {
            margin: 0;
        }

        .spec-grid {
            display: block;
        }

        .spec {
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 10px 12px;
            margin: 0 0 10px;
            page-break-inside: avoid;
        }

        .spec-title {
            margin: 0 0 8px;
            font-size: 12px;
            font-weight: 900;
            color: var(--cecns-blue);
        }

        .spec-sub {
            margin: 10px 0 6px;
            font-size: 11px;
            font-weight: 900;
            color: var(--text-700);
        }

        .empty {
            margin: 0;
            color: var(--text-500);
            font-weight: 700;
        }
    </style>
</head>

<body>

    <?php if ($brandDataUri): ?>
        <img class="brandbar" src="<?= $brandDataUri ?>" alt="Encabezado institucional">
    <?php endif; ?>

    <div class="titlebox">
        <div class="titlebox__l">
            <?php if (!$brandDataUri && $logoDataUri): ?>
                <div class="titleline">
                    <div class="titleline__logo">
                        <img class="crest" src="<?= $logoDataUri ?>" alt="Logo CECNSR">
                    </div>
                    <div class="titleline__text">
                        <p class="kicker">Complejo Educativo Católico “Nuestra Señora del Rosario”</p>
                        <h1 class="title"><?= htmlspecialchars((string)$data['title'], ENT_QUOTES, 'UTF-8') ?></h1>
                        <p class="meta"><?= htmlspecialchars((string)($gradeMeta['label'] ?? ''), ENT_QUOTES, 'UTF-8') ?> · <?= htmlspecialchars((string)($gradeMeta['level'] ?? ''), ENT_QUOTES, 'UTF-8') ?> <small>· Generado: <?= htmlspecialchars(date('d/m/Y'), ENT_QUOTES, 'UTF-8') ?></small></p>
                    </div>
                </div>
            <?php else: ?>
                <p class="kicker">Complejo Educativo Católico “Nuestra Señora del Rosario”</p>
                <h1 class="title"><?= htmlspecialchars((string)$data['title'], ENT_QUOTES, 'UTF-8') ?></h1>
                <p class="meta"><?= htmlspecialchars((string)($gradeMeta['label'] ?? ''), ENT_QUOTES, 'UTF-8') ?> · <?= htmlspecialchars((string)($gradeMeta['level'] ?? ''), ENT_QUOTES, 'UTF-8') ?> <small>· Generado: <?= htmlspecialchars(date('d/m/Y'), ENT_QUOTES, 'UTF-8') ?></small></p>
            <?php endif; ?>
        </div>

        <div class="titlebox__r">
            <div class="year"><?= htmlspecialchars((string)$data['year'], ENT_QUOTES, 'UTF-8') ?></div>
            <div class="year-sub">Listas de útiles</div>
        </div>
    </div>

    <?php if (!$hasItems): ?>
        <div class="note">
            <div class="note__h">Lista no disponible</div>
            <div>Lista de útiles no disponible temporalmente para este grado.</div>
        </div>
    <?php else: ?>

        <?php foreach ($sections as $sec): ?>
            <div class="section">
                <div class="section__head">
                    <h2 class="section__title"><?= htmlspecialchars((string)$sec['label'], ENT_QUOTES, 'UTF-8') ?></h2>
                    <?php if (!empty($sec['hint'])): ?>
                        <p class="section__hint"><?= htmlspecialchars((string)$sec['hint'], ENT_QUOTES, 'UTF-8') ?></p>
                    <?php endif; ?>
                </div>
                <div class="section__body">
                    <?php
                    // Aprovechar mejor el espacio: "Para todos..." en 2 columnas tipo checklist;
                    // el resto en tabla "Cantidad / Descripción".
                    $isAll = ($sec['key'] ?? '') === 'all_students' || (stripos((string)$sec['label'], 'Para todos') !== false);
                    ?>
                    <?php if ($isAll): ?>
                        <?php render_list_html((array)$sec['items'], true); ?>
                    <?php else: ?>
                        <?php render_table_html((array)$sec['items']); ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>

        <?php if (!empty($specialties)): ?>
            <div class="section">
                <div class="section__head">
                    <h2 class="section__title">Materiales por especialidad</h2>
                    <p class="section__hint">Aplica únicamente a la especialidad correspondiente.</p>
                </div>
                <div class="section__body">
                    <?php render_specialties_html($specialties); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="note">
            <div class="note__h">Nota aclaratoria</div>
            <?php if (!empty($notes)): ?>
                <?php foreach ($notes as $line): ?>
                    <p><?= htmlspecialchars((string)$line, ENT_QUOTES, 'UTF-8') ?></p>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Pr&oacute;ximamente.</p>
            <?php endif; ?>
        </div>

    <?php endif; ?>

</body>

</html>
<?php
$html = ob_get_clean();

$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('isHtml5ParserEnabled', true);

$dompdf = new Dompdf($options);
$dompdf->setPaper('letter');
$dompdf->loadHtml($html, 'UTF-8');
$dompdf->render();

// Footer con número de página
$canvas = $dompdf->getCanvas();
$font = $dompdf->getFontMetrics()->get_font('Helvetica', 'normal');
$fontBold = $dompdf->getFontMetrics()->get_font('Helvetica', 'bold');

$w = $canvas->get_width();
$h = $canvas->get_height();

// Línea superior del pie
$canvas->line(36, $h - 46, $w - 36, $h - 46, [0.83, 0.85, 0.90], 1);

$left = 'CECNSR';
$center = (string)($gradeMeta['label'] ?? '');
$right = 'Página {PAGE_NUM} de {PAGE_COUNT}';

$ink = [0.00, 0.25, 0.50]; // azul institucional aproximado
$canvas->page_text(36, $h - 38, $left, $fontBold, 9, $ink);
$canvas->page_text((float)($w / 2 - 60), $h - 38, $center, $font, 9, $ink);
$canvas->page_text($w - 160, $h - 38, $right, $font, 9, $ink);

$filename = 'Lista-utiles-' . ($gradeMeta['label'] ?? $gradeKey) . '-' . ($data['year'] ?? '');
$filename = preg_replace('/\s+/', '-', $filename);
$filename = preg_replace('/[^A-Za-z0-9\-_.]/', '', $filename) . '.pdf';

$dompdf->stream($filename, ['Attachment' => true]);
exit;

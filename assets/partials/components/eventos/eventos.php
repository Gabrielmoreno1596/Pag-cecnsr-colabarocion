<?php

/**
 * Componente: Eventos (tarjetas + modal)
 * - Reutilizable en cualquier página
 * - Data en un solo archivo (data.eventos.php)
 * - Usa asset() y tu estructura actual
 *
 * Nota: Este componente fue actualizado para:
 *  - Mostrar eventos por tarjetas (3 por fila en escritorio)
 *  - Enfoque institucional (memorias del año)
 *  - Modal flotante por evento (álbum / collage)
 */

$cssPath = asset('assets/partials/components/eventos/eventos.css');
$jsPath  = asset('assets/partials/components/eventos/eventos.js');

$events = include __DIR__ . '/data.eventos.php';

date_default_timezone_set(date_default_timezone_get()); // respeta config del server

$now = new DateTime('now');

// Ordena por fecha (más reciente primero)
usort($events, fn($a, $b) => strcmp($b['date_start'], $a['date_start']));

// Helpers
$fmtDate = function ($dateStr) {
    $d = new DateTime($dateStr);
    // Ej: 18 Feb, 2026
    return $d->format('d M, Y');
};
$fmtMonthYear = function ($dateStr) {
    $d = new DateTime($dateStr);
    // Ej: Feb 2026 (locale depende del server)
    return $d->format('M Y');
};
$isUpcoming = function ($dateStr) use ($now) {
    $d = new DateTime($dateStr);
    return $d >= $now;
};

?>
<link rel="stylesheet" href="<?= $cssPath ?>">

<section class="events-block" aria-label="Eventos institucionales">
    <div class="events-block__head">
        <div>
            <h2 class="events-block__title">Eventos</h2>
            <p class="events-block__subtitle">Memorias del año y lo más reciente.</p>
        </div>

        <a class="events-block__cta" href="<?= asset('mapa-del-sitio.php') ?>#eventos">Ver todos</a>
    </div>

    <div class="events-block__stage" data-events-stage>
        <?php if (empty($events)): ?>
            <div class="events-block__empty">
                Aún no hay eventos cargados. Cuando agregues eventos en <b>data.eventos.php</b>, se mostrarán aquí.
            </div>
        <?php else: ?>
            <div class="events-cards" data-events-cards>
                <?php foreach ($events as $i => $e):
                    $title = $e['title'] ?? 'Evento';
                    $category = $e['category'] ?? 'Institucional';
                    $location = $e['location'] ?? 'CECNSR';
                    $summary = $e['summary'] ?? '';
                    $cover = $e['cover'] ?? '';
                    $gallery = (!empty($e['gallery']) && is_array($e['gallery'])) ? $e['gallery'] : [];
                    if (empty($gallery) && !empty($cover)) $gallery = [$cover];

                    // Collage: 3 primeras fotos
                    $collage = array_slice($gallery, 0, 3);

                    $dateLabel = $fmtDate($e['date_start']);
                    $monthLabel = $fmtMonthYear($e['date_start']);
                    $badge = $isUpcoming($e['date_start']) ? 'Próximo' : 'Memoria';
                    $meta = trim($location . (empty($category) ? '' : ' · ' . $category));
                ?>
                    <article class="events-card" data-event-card
                        data-title="<?= htmlspecialchars($title) ?>"
                        data-date="<?= htmlspecialchars($monthLabel) ?>"
                        data-meta="<?= htmlspecialchars($meta) ?>"
                        data-cover="<?= htmlspecialchars(asset($cover)) ?>"
                        data-images='<?= htmlspecialchars(json_encode(array_map(fn($p) => asset($p), $gallery), JSON_UNESCAPED_SLASHES)) ?>'
                        style="--event-bg:url('<?= asset($cover) ?>');">
                        <button class="events-card__hit" type="button" aria-label="Abrir evento: <?= htmlspecialchars($title) ?>">
                            <div class="events-card__top">
                                <span class="events-card__badge"><?= htmlspecialchars($badge) ?></span>
                                <span class="events-card__date"><?= htmlspecialchars($dateLabel) ?></span>
                            </div>

                            <h3 class="events-card__title"><?= htmlspecialchars($title) ?></h3>
                            <p class="events-card__meta"><?= htmlspecialchars($meta) ?></p>

                            <?php if (!empty($summary)): ?>
                                <p class="events-card__text"><?= htmlspecialchars($summary) ?></p>
                            <?php endif; ?>

                            <?php if (!empty($collage)): ?>
                                <div class="events-card__collage" aria-hidden="true">
                                    <?php foreach ($collage as $ph): ?>
                                        <span class="events-card__thumb" style="background-image:url('<?= asset($ph) ?>')"></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <span class="events-card__open">Ver álbum</span>
                        </button>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- MODAL -->
    <div class="events-modal" data-events-modal hidden>
        <div class="events-modal__backdrop" data-modal-close></div>

        <div class="events-modal__dialog" role="dialog" aria-modal="true" aria-label="Detalle del evento">
            <button class="events-modal__close" type="button" data-modal-close aria-label="Cerrar"><span aria-hidden="true">×</span><span> Cerrar</span></button>

            <div class="events-modal__hero">
                <div class="events-modal__cover" data-modal-cover></div>
                <div class="events-modal__heroText">
                    <p class="events-modal__kicker" data-modal-date></p>
                    <h3 class="events-modal__title" data-modal-title></h3>
                    <p class="events-modal__meta" data-modal-meta></p>
                </div>
            </div>

            <div class="events-modal__body">
                <div class="events-modal__grid" data-modal-grid></div>
            </div>
        </div>
    </div>

</section>

<script src="<?= $jsPath ?>" defer></script>
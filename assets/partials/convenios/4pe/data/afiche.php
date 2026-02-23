<?php
$base = 'assets/img/convenios/4pe';

return [
  'id' => 'mas-info',
  'section_attrs' => [
    'data-state' => 'active',
    'data-start' => '2026-01-07',
    'data-end'   => '2026-01-27',
  ],
  'poster' => [
    'thumb_src' => "$base/poster/afiche-invitacion.png",
    'thumb_alt' => 'Afiche del Seminario 2025: Reducción de conflictos sociales',
    'modal_src' => "$base/poster/seminario-noviembre.jpeg",
    'badge' => '2025',
  ],
  'eyebrow' => 'Seminario / Formación continua',
  'title' => 'Seminario: Reducción de conflictos sociales',
  'info' => [
    [
      'icon' => '📅',
      'html' => '<strong>Fechas:</strong> 6, 7, 8 y 9 de noviembre 2025 — 8:00 a. m. a 3:30 p. m.',
    ],
    [
      'icon' => '💵',
      'html' => '<strong>Inversión:</strong> $40.00 <small>(incluye refrigerio, almuerzo, materiales y diploma)</small>.',
    ],
    [
      'icon' => '📍',
      'html' => '<strong>Sede:</strong> Centro de Comunicaciones Salvadoreño Alemán Karlheinz Wolfgang.',
    ],
  ],
  'cta' => [
    ['label' => 'Descargar afiche', 'href' => "$base/poster/afiche-invitacion.png", 'class' => 'btn-solid', 'download' => true],
    ['label' => 'Quiero más información', 'href' => '#form-contacto', 'class' => 'btn-outline-pi', 'download' => false],
  ],
  'announce' => [
    'title' => 'Seminario: Reducción de conflictos sociales',
    'lead' => 'Estamos preparando próximas fechas. Déjanos tus datos para enviarte la convocatoria y resolver cualquier consulta.',
    'cta' => [
      ['label' => 'Quiero más información', 'href' => '#form-contacto', 'class' => 'btn-solid', 'download' => false],
      ['label' => 'Descargar afiche anterior', 'href' => 'poster/seminario-noviembre.jpeg', 'class' => 'btn-outline-pi', 'download' => true],
    ],
  ],
];

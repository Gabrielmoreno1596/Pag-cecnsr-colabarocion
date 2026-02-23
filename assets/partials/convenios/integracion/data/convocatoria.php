<?php
return [
  'id' => 'becas',
  'title' => 'Becas · Generación que Florece',
  'state' => 'active', // active | upcoming | closed (si hay fechas, JS lo recalcula)
  'start' => '2025-11-01',
  'end'   => '2025-11-15',
  'muted' => 'Requisitos orientativos para postular (según trayectoria). Verifica siempre la convocatoria vigente en el sitio oficial:',
  'official' => [
    'href' => 'https://integracion.gob.sv/proceso-formativo/',
    'text' => 'Ver detalles oficiales',
  ],
  'logo' => [
    'src' => asset('assets/img/convenios/integracion/logo-direccion-integracion.png'),
    'alt' => '',
  ],
  'cta' => [
    'active' => [
      // puedes activar estos CTAs si lo necesitas
      // ['href' => '#contacto', 'text' => 'Quiero postular / más info', 'class' => 'btn-solid-int'],
    ],
    'upcoming' => [
      ['href' => '#contacto', 'text' => 'Avisarme próximas fechas', 'class' => 'btn-solid-int'],
    ],
    'closed' => [
      // ['href' => '#contacto', 'text' => 'Consultar próximas fechas', 'class' => 'btn-solid-int'],
      // ['href' => 'https://integracion.gob.sv/proceso-formativo/', 'text' => 'Requisitos y procesos', 'class' => 'btn-outline-int', 'attrs' => 'target="_blank" rel="noopener"'],
    ],
  ],
];

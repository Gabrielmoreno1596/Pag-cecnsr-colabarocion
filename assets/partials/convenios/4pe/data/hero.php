<?php
$base = 'assets/img/convenios/4pe';

return [
  'eyebrow' => 'Formación humana | Convivencia pacífica',
  'title_html' => 'Psicología Individual &<br /><span class="pi-mark">4 Puntos Esenciales</span>',
  'lead' => 'Una propuesta formativa basada en Alfred Adler para fortalecer el bienestar personal, la responsabilidad social y una convivencia armónica.',
  'cta' => [
    ['label' => 'Qué es el programa', 'href' => '#pi-que-es', 'class' => 'btn-pill-pi'],
    ['label' => 'Más información', 'href' => '#mas-info', 'class' => 'btn-outline-pi'],
  ],
  'badges' => [
    [
      'icon' => "$base/logos/Pdis-Disciplina-personal.png",
      'alt'  => 'Logo Disciplina Personal',
      'label' => 'Disciplina Personal (PDíS)',
    ],
    [
      'icon' => "$base/logos/PServ-Grado-de-servicio.png",
      'alt'  => 'Logo Grado de Servicio',
      'label' => 'Grado de Servicio (PServ)',
    ],
    [
      'icon' => "$base/logos/PVisit-Tarjeta-de-presentacion.png",
      'alt'  => 'Logo Tarjeta de Presentación',
      'label' => 'Tarjeta de Presentación (PVisit)',
    ],
    [
      'icon' => "$base/logos/PPrav-Prevencion-personal.png",
      'alt'  => 'Logo Prevención Personal',
      'label' => 'Prevención Personal (PPäri)',
    ],
  ],
  'ally_logos' => [
    ['src' => "$base/logos/1_CECNSR.png", 'alt' => 'CECNSR'],
    ['src' => "$base/logos/16_08_18_BIB_International_nur_Logo.png", 'alt' => 'BIB International'],
  ],
  'main_image' => [
    'src' => "$base/hero/pi-4pe-img1.jpeg",
    'alt' => 'Sesión formativa de Psicología Individual en el CECNSR',
  ],
  'reel' => [
    ['src' => "$base/hero/pi-4pe-img2.jpeg", 'alt' => 'Participantes durante taller'],
    ['src' => "$base/hero/pi-4pe-img3.jpeg", 'alt' => 'Equipo docente y aliados'],
    ['src' => "$base/hero/pi-4pe-img4.jpeg", 'alt' => 'Presentación en aula'],
    ['src' => "$base/hero/pi-4pe-img5.jpeg", 'alt' => 'Presentación en aula'],
    // Repetidos para loop visual (manteniendo tu estructura original)
    ['src' => "$base/hero/pi-4pe-img1.jpeg", 'alt' => 'Presentación en aula'],
    ['src' => "$base/hero/pi-4pe-img2.jpeg", 'alt' => 'Presentación en aula'],
  ],
];

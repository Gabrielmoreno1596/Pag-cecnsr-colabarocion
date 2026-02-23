<?php
/**
 * Datos de “previews” para la página de Inicio.
 *
 * - Vive dentro de assets/partials/inicio (permitido por la tarea)
 * - Solo referencia páginas e imágenes ya existentes.
 */

return [
  'oferta' => [
    'title' => 'Oferta Académica',
    'subtitle' => 'Explora nuestros niveles y descubre un camino formativo integral.',
    'cta' => [
      'text' => 'Ver toda la oferta',
      'href' => 'oferta-inicial.php',
    ],
    'items' => [
      [
        'title' => 'Inicial y Parvularia',
        'desc'  => 'Aprendizaje temprano con bases sólidas en valores, juego y exploración.',
        'href'  => 'oferta-inicial.php',
        'icon'  => 'fa-solid fa-seedling',
        'tag'   => 'Primeros pasos',
        'img'   => 'assets/partials/oferta-academica/oferta-inicial/image/p1.jpeg',
      ],
      [
        'title' => 'I Ciclo',
        'desc'  => 'Lectoescritura, pensamiento lógico y hábitos para aprender con confianza.',
        'href'  => 'oferta-ciclo1.php',
        'icon'  => 'fa-solid fa-book-open-reader',
        'tag'   => 'Fundamentos',
        'img'   => 'assets/partials/oferta-academica/oferta-ciclo1/image/ic1.jpg',
      ],
      [
        'title' => 'II Ciclo',
        'desc'  => 'Fortalecemos competencias, creatividad y convivencia para crecer en equipo.',
        'href'  => 'oferta-ciclo2.php',
        'icon'  => 'fa-solid fa-people-group',
        'tag'   => 'Competencias',
        'img'   => 'assets/partials/oferta-academica/oferta-ciclo2/image/iic1.jpeg',
      ],
      [
        'title' => 'III Ciclo',
        'desc'  => 'Proyectos, liderazgo y pensamiento crítico para preparar el siguiente nivel.',
        'href'  => 'oferta-ciclo3.php',
        'icon'  => 'fa-solid fa-lightbulb',
        'tag'   => 'Proyectos',
        'img'   => 'assets/partials/oferta-academica/oferta-ciclo3/image/iiic1.jpeg',
      ],
      [
        'title' => 'Bachillerato',
        'desc'  => 'Formación general y técnica con visión de futuro: habilidades y vocación.',
        'href'  => 'oferta-bachillerato.php',
        'icon'  => 'fa-solid fa-graduation-cap',
        'tag'   => 'Futuro',
        'img'   => 'assets/partials/oferta-academica/oferta-bachillerato/image/g-d-software/so1.jpg',
      ],
    ],
  ],

  'convenios' => [
    'title' => 'Convenios',
    'subtitle' => 'Alianzas que abren oportunidades académicas, culturales y de formación.',
    'cta' => [
      'text' => 'Explorar convenios',
      'href' => 'convenios-pasch.php',
    ],
    'items' => [
      [
        'title' => 'Colegios PASCH',
        'desc'  => 'Idioma, cultura y experiencias que conectan con oportunidades internacionales.',
        'href'  => 'convenios-pasch.php',
        'icon'  => 'fa-solid fa-earth-americas',
        'tag'   => 'Idiomas',
        'img'   => 'assets/partials/convenios/pasch/image/hero/pasch-img2.jpeg',
      ],
      [
        'title' => 'Proyecto DUAL',
        'desc'  => 'Formación con enfoque práctico: aprendizaje vinculado al mundo laboral.',
        'href'  => 'convenios-dual.php',
        'icon'  => 'fa-solid fa-briefcase',
        'tag'   => 'Experiencia',
        'img'   => 'assets/partials/convenios/proyecto-dual/image/dual-img2.jpeg',
      ],
      [
        'title' => 'Psicología & 4PE',
        'desc'  => 'Formación humana y acompañamiento para el bienestar y la convivencia.',
        'href'  => 'convenios-psicologia.php',
        'icon'  => 'fa-solid fa-heart-pulse',
        'tag'   => 'Bienestar',
        'img'   => 'assets/partials/convenios/4pe/image/hero/pi-4pe-img2.jpeg',
      ],
      [
        'title' => 'Integración',
        'desc'  => 'Inclusión, apoyo y oportunidades para aprender respetando las diferencias.',
        'href'  => 'convenios-integracion.php',
        'icon'  => 'fa-solid fa-handshake-angle',
        'tag'   => 'Inclusión',
        'img'   => 'assets/partials/convenios/integracion/image/hero/integra-img1.jpeg',
      ],
    ],
  ],

  'pastoral' => [
    'title' => 'Pastoral Educativa',
    'subtitle' => 'Un acompañamiento que fortalece valores, identidad y formación integral.',
    'cta' => [
      'text' => 'Ir a Pastoral Educativa',
      'href' => 'pastoral-educativa.php',
    ],
    'items' => [
      [
        'title' => 'Misión',
        'desc'  => 'Nuestra razón de ser y el sentido de educar para servir.',
        'href'  => 'pastoral-educativa.php#mision',
        'icon'  => 'fa-solid fa-compass',
        'tag'   => 'Identidad',
        'img'   => 'assets/partials/pastoral-educativa/image/galeria/c-accion-edu-fe.jpg',
      ],
      [
        'title' => 'Desempeños',
        'desc'  => 'Habilidades y valores que guían el aprendizaje y la vida.',
        'href'  => 'pastoral-educativa.php#desempenos',
        'icon'  => 'fa-solid fa-award',
        'tag'   => 'Formación',
        'img'   => 'assets/partials/pastoral-educativa/image/diagramas/valores-que-guian-la-labor-educativa.jpeg',
      ],
      [
        'title' => 'Galería',
        'desc'  => 'Momentos que reflejan nuestra comunidad, convivencia y acción.',
        'href'  => 'pastoral-educativa.php#galeria',
        'icon'  => 'fa-solid fa-camera',
        'tag'   => 'Vida escolar',
        'img'   => 'assets/partials/pastoral-educativa/image/galeria/c-accion-i-ciclo.jpg',
      ],
    ],
  ],
];

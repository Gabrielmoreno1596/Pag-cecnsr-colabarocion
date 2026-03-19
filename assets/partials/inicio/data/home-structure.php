<?php

/**
 * Estructura de secciones para Inicio.
 * - Mantiene rutas existentes del sitio (archivos .php en raíz).
 * - Permite reordenar/editar tarjetas sin tocar el HTML.
 */

return [
  'trust' => [
    [
      'value' => '+1500',
      'label' => 'estudiantes',
      'icon'  => 'fa-user-graduate',
    ],
    [
      'value' => "Desde 1992", // 👈 ese espacio NO es normal, es NBSP
      'label' => 'formación integral',
      'icon'  => 'fa-school',
    ],
    [
      'value' => 'Valores',
      'label' => 'marianos y franciscanos',
      'icon'  => 'fa-heart',
    ],
  ],

  // Accesos rápidos (intro)
  'quicklinks' => [
    'id' => 'accesos-rapidos',
    'eyebrow' => 'Explora',
    'title' => 'Accesos rápidos',
    'subtitle' => 'Entra directo a lo más buscado sin perderte en menús.',
    'variant' => 'quick',
    'items' => [
      [
        'title' => 'Nuevo ingreso',
        'desc'  => 'Proceso de admisión, requisitos y pasos.',
        'href'  => asset('nuevo-ingreso.php'),
        'icon'  => 'fa-clipboard-check',
        'image' => asset('assets/img/inicio/home-structure/logistica-global.webp'),
      ],
      [
        'title' => 'Oferta académica',
        'desc'  => 'Niveles y propuesta educativa.',
        'href'  => asset('oferta-inicial.php'),
        'icon'  => 'fa-graduation-cap',
        'image' => asset('assets/img/inicio/home-structure/cancha-1nivel2.webp'), /* Imagen accesos rápido, oferta académica */
      ],
      [
        'title' => 'Infraestructura',
        'desc'  => 'Conoce nuestras instalaciones.',
        'href'  => '#infraestructura',
        'icon'  => 'fa-building-columns',
        'image' => asset('assets/img/inicio/home-structure/i2.webp'), /* imagen accesos rápido, infraestructura */
      ],
      [
        'title' => 'Convenios',
        'desc'  => 'PASCH, Dual y más alianzas.',
        'href'  => asset('convenios-pasch.php'),
        'icon'  => 'fa-handshake',
        'image' => asset('assets/img/inicio/home-structure/pasch-img3.webp'), /* imagen de accesos rápido, convenios */
      ],
      [
        'title' => 'Pastoral educativa',
        'desc'  => 'Formación en valores y comunidad.',
        'href'  => asset('pastoral-educativa.php'),
        'icon'  => 'fa-cross',
        'image' => asset('assets/img/inicio/home-structure/cancha-desde-gradas-derecha.webp'),
      ],
      [
        'title' => '¿Quiénes somos?',
        'desc'  => 'Historia, identidad y principios.',
        'href'  => asset('quienes-somos.php'),
        'icon'  => 'fa-circle-info',
        'image' => asset('assets/img/inicio/historia/h1.webp'),
      ],
    ],
  ],

  // Sección: Oferta académica (detalle)
  'oferta' => [
    'id' => 'oferta-academica',
    'eyebrow' => 'Formación',
    'title' => 'Oferta académica',
    'subtitle' => 'Trayectorias diseñadas para cada etapa, con acompañamiento y excelencia.',
    'variant' => 'grid',
    'items' => [
      [
        'title' => 'Inicial',
        'desc'  => 'Bases, afectividad y aprendizaje temprano.',
        'href'  => asset('oferta-inicial.php'),
        'icon'  => 'fa-seedling',
        'image' => asset('assets/img/inicio/infraestructura/i5.webp'),
      ],
      [
        'title' => 'I Ciclo',
        'desc'  => 'Lectoescritura, pensamiento y valores.',
        'href'  => asset('oferta-ciclo1.php'),
        'icon'  => 'fa-book-open',
        'image' => asset('assets/img/inicio/infraestructura/i1.webp'),
      ],
      [
        'title' => 'II Ciclo',
        'desc'  => 'Consolidación y hábitos de estudio.',
        'href'  => asset('oferta-ciclo2.php'),
        'icon'  => 'fa-compass',
        'image' => asset('assets/img/inicio/infraestructura/i6.webp'),
      ],
      [
        'title' => 'III Ciclo',
        'desc'  => 'Competencias y orientación vocacional.',
        'href'  => asset('oferta-ciclo3.php'),
        'icon'  => 'fa-lightbulb',
        'image' => asset('assets/img/inicio/infraestructura/i2.webp'),
      ],
      [
        'title' => 'Bachillerato',
        'desc'  => 'Reto académico y proyección profesional.',
        'href'  => asset('oferta-bachillerato.php'),
        'icon'  => 'fa-user-tie',
        'image' => asset('assets/img/inicio/infraestructura/i7.webp'),
      ],
    ],
  ],

  // Sección: Convenios (detalle)
  'convenios' => [
    'id' => 'convenios',
    'eyebrow' => 'Alianzas',
    'title' => 'Convenios',
    'subtitle' => 'Programas que amplían oportunidades, experiencias y proyección.',
    'variant' => 'grid',
    'items' => [
      [
        'title' => 'PASCH',
        'desc'  => 'Idiomas, cultura y experiencias.',
        'href'  => asset('convenios-pasch.php'),
        'icon'  => 'fa-globe',
        'image' => asset('assets/partials/inicio/image/hero/10.webp'),
      ],
      [
        'title' => 'Proyecto Dual',
        'desc'  => 'Vinculación con formación técnica.',
        'href'  => asset('convenios-dual.php'),
        'icon'  => 'fa-industry',
        'image' => asset('assets/img/inicio/hero/9.webp'),
      ],
      [
        'title' => 'Programa Dual',
        'desc'  => 'Acompañamiento y bienestar estudiantil.',
        'href'  => asset('convenios-psicologia.php'),
        'icon'  => 'fa-brain',
        'image' => asset('assets/img/inicio/historia/h2.webp'),
      ],
      [
        'title' => 'Integración',
        'desc'  => 'Trabajo colaborativo y comunidad.',
        'href'  => asset('convenios-integracion.php'),
        'icon'  => 'fa-people-group',
        'image' => asset('assets/img/inicio/hero/6.webp'),
      ],
    ],
  ],

  // Sección: Pastoral educativa (detalle)
  'pastoral' => [
    'id' => 'pastoral',
    'eyebrow' => 'Identidad',
    'title' => 'Pastoral educativa',
    'subtitle' => 'Formación en valores, comunidad y crecimiento integral.',
    'variant' => 'grid',
    'items' => [
      [
        'title' => 'Conoce la Pastoral',
        'desc'  => 'Qué hacemos y cómo acompañamos.',
        'href'  => asset('pastoral-educativa.php'),
        'icon'  => 'fa-church',
        'image' => asset('assets/img/inicio/historia/h4.webp'),
      ],
      [
        'title' => 'Principios y valores',
        'desc'  => 'Nuestro estilo de formación.',
        'href'  => asset('quienes-somos.php#principios'),
        'icon'  => 'fa-star',
        'image' => asset('assets/img/inicio/hero/2.webp'),
      ],
      [
        'title' => 'Galería',
        'desc'  => 'Momentos y experiencias.',
        'href'  => asset('pastoral-educativa.php#galeria'),
        'icon'  => 'fa-images',
        'image' => asset('assets/img/inicio/hero/7.webp'),
      ],
    ],
  ],
];

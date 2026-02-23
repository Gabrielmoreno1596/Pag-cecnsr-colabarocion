<?php

/**
 * Datos del HERO principal (slideshow + textos + CTA)
 * Consumir desde components/hero.php
 */
return [
    'badge' => [
        'logo' => asset('assets/img/logos/cecnsr.png'),
        'alt'  => 'Logotipo Pastoral Educativa CECNSR',
    ],
    'eyebrow'     => 'Formación integral con valores cristianos',
    'title'       => 'Pastoral Educativa',
    'subtitle'    => 'Complejo Educativo Católico "Nuestra Señora del Rosario"',
    'eyebrow_sub' => 'Formar para construir un mundo fraterno',
    'ctas' => [
        ['href' => '#desempenos', 'label' => 'Nuestro itinerario formativo', 'variant' => 'gold'],
        ['href' => '#galeria',    'label' => 'Conoce nuestra comunidad',      'variant' => 'secondary'],
    ],
    // duración ms del slide (puede leerla tu JS)
    'duration' => 5000,
    // Slides de fondo
    'slides' => [
        [
            'src'     => asset('assets/img/pastoral-educativa/celebraciones/cancha-dramatizacion2.jpeg'),
            'alt'     => 'Estudiantes trabajando en aula',
            'loading' => 'eager',
            'decoding' => 'async',
        ],
        [
            'src'     => asset('assets/img/pastoral-educativa/celebraciones/san-francisco-edu-inicial-parvularia.jpeg'),
            'alt'     => 'Celebración San Francisco en Educación Inicial y Parvularia',
            'loading' => 'lazy',
            'decoding' => 'async',
        ],
        [
            'src'     => asset('assets/img/pastoral-educativa/celebraciones/san-francisco-tercer-ciclo.jpeg'),
            'alt'     => 'Celebración San Francisco en Tercer Ciclo',
            'loading' => 'lazy',
            'decoding' => 'async',
        ],
        [
            'src'     => asset('assets/img/pastoral-educativa/celebraciones/cancha-desde-escenario2.jpeg'),
            'alt'     => 'Actividad pastoral en la cancha del centro educativo',
            'loading' => 'lazy',
            'decoding' => 'async',
        ],
    ],
];

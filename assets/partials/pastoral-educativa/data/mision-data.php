<?php

/**
 * Datos de la sección Misión (lead, pills, tabs VJAC, masonry)
 */
return [
    'title' => 'Misión de la Pastoral Educativa',
    'lead'  => 'El <strong>Complejo Educativo Católico Nuestra Señora del Rosario</strong>, fiel a su misión evangelizadora y desde la <strong>Pedagogía de Jesús</strong>, carisma y filosofía HFIC, promueve una <strong>Educación Integral</strong> según el Modelo Educativo institucional para el <em>desarrollo armónico de la persona en todas sus dimensiones</em>.',
    'pills' => [
        ['href' => '#desempenos', 'text' => 'Integrar <strong>fe, cultura y vida</strong>'],
        ['href' => '#desempenos', 'text' => 'Seis desempeños: <strong>aprender, conocer, hacer, sentir, ser, convivir</strong>'],
        ['href' => '#desempenos', 'text' => 'Cuatro puntos: <strong>disciplina, tarjeta, servicio, prevención</strong>'],
    ],
    // Tabs (V-J-A-C) + contenido del aside
    'tabs' => [
        [
            'key'   => 'Ver',
            'title' => 'Mirada crítica y esperanzadora',
            'desc'  => 'Observamos la realidad con serenidad, buscando la verdad que humaniza.',
            'bullets' => ['Impulsa aprender y conocer.', 'Se apoya en la disciplina personal.'],
            'img'   => asset('assets/img/pastoral-educativa/primer-ciclo.jpeg'),
        ],
        [
            'key'   => 'Juzgar',
            'title' => 'Discernir a la luz del Evangelio',
            'desc'  => 'Contrastamos hechos y criterios con la Palabra y el carisma franciscano.',
            'bullets' => ['Fortalece sentir y ser.', 'Se expresa en la tarjeta de presentación personal.'],
            'img'   => asset('assets/img/pastoral-educativa/celebraciones/cancha-desde-escenario2.jpeg'),
        ],
        [
            'key'   => 'Actuar',
            'title' => 'La fe hecha servicio',
            'desc'  => 'Pasamos del diagnóstico a acciones solidarias que transforman.',
            'bullets' => ['Moviliza hacer y convivir.', 'Se concreta en el grado de servicio personal.'],
            'img'   => asset('assets/img/pastoral-educativa/celebraciones/san-francisco-tercer-ciclo.jpeg'),
        ],
        [
            'key'   => 'Celebrar',
            'title' => 'Alegría e identidad compartida',
            'desc'  => 'La comunidad celebra la fe que sostiene el camino educativo.',
            'bullets' => ['Integra todos los desempeños.', 'Cuida la vida desde la prevención personal.'],
            'img'   => asset('assets/img/pastoral-educativa/celebraciones/cancha-desde-gradas-derecha.jpeg'),
        ],
    ],
    // Texto "leer más"
    'more' => [
        'paragraphs' => [
            'La formación integral se concreta en procesos que ordenan el tiempo, fortalecen la perseverancia y dan sentido al saber…',
            'Los niveles educativos —Inicial y Parvularia, Primer y Segundo Ciclo, Tercer Ciclo y Educación Media— garantizan continuidad…',
        ],
    ],
    // Galería masonry (en “leer más”)
    'masonry' => [
        ['src' => asset('assets/img/pastoral-educativa/celebraciones/cancha-desde-escenario2.jpeg'), 'alt' => 'Actividad desde escenario'],
        ['src' => asset('assets/img/pastoral-educativa/celebraciones/san-francisco-tercer-ciclo.jpeg'), 'alt' => 'Celebración San Francisco Tercer Ciclo'],
        ['src' => asset('assets/img/pastoral-educativa/celebraciones/cancha-desde-gradas-derecha.jpeg'), 'alt' => 'Vista desde gradas'],

    ],
];

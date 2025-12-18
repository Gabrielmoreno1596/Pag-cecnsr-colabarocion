<?php
return [
    'id' => 'pasch-hub',
    'title' => 'CECNSR & PASCH — Centro de información',
    'tabs' => [
        [
            'id' => 'asociacion',
            'label' => 'Asociación',
            'active' => true,
            'content' => [
                'p' => 'Nuestro colegio participa como <strong>institución asociada</strong>, integrando el alemán como <strong>competencia lingüística y cultural</strong> en proyectos formativos, postulando a <strong>estancias de inmersión</strong> y abriendo espacios para ampliar horizontes académicos.',
                'bullets' => [
                    'Proyectos y talleres con enfoque intercultural.',
                    'Postulación a <strong>cursos juveniles</strong> (Goethe-Institut / PASCH).',
                    'Acceso a recursos didácticos y comunidad internacional.',
                ],
                'timeline' => [
                    'Integración al programa PASCH.',
                    'Implementación de proyectos y clubes.',
                    'Convocatorias a campamentos y cursos.',
                ],
                'cta' => [
                    'label' => 'Ver convocatorias',
                    'href'  => '#convocatorias'
                ]
            ],
        ],
        [
            'id' => 'oportunidades',
            'label' => 'Oportunidades',
            'active' => false,
            'cards' => [
                [
                    'icon' => 'fa-users',
                    'title' => 'Cursos y campamentos',
                    'text' => 'Programas intensivos en Alemania con trabajo en equipo, deporte y cultura.',
                    'more' => 'Postulación anual. Nivel de alemán recomendado: A2+ (según convocatoria). Carta de motivación.',
                ],
                [
                    'icon' => 'fa-graduation-cap',
                    'title' => 'Becas y apoyo',
                    'text' => 'Posibilidad de financiamiento parcial/total según convocatoria y desempeño.',
                    'more' => 'Presenta expediente académico, participación en proyectos y recomendaciones docentes.',
                ],
                [
                    'icon' => 'fa-globe-europe',
                    'title' => 'Red internacional',
                    'text' => 'Conexión con jóvenes de múltiples países y desarrollo de habilidades globales.',
                    'more' => 'Intercambios virtuales, proyectos colaborativos y acceso a recursos del Goethe-Institut.',
                ],
            ],
        ],
        [
            'id' => 'faq',
            'label' => 'FAQ',
            'active' => false,
            'faq' => [
                [
                    'q' => '¿Qué nivel de alemán necesito para postular?',
                    'a' => 'Depende de la convocatoria. Muchas piden A2 o superior; revisa cada llamada específica.',
                ],
                [
                    'q' => '¿Hay costos adicionales?',
                    'a' => 'Pueden existir costos de pasaporte, visado o seguro. Algunas becas los cubren total o parcialmente.',
                ],
                [
                    'q' => '¿Cómo demuestro participación?',
                    'a' => 'Incluye constancias de proyectos, clubes y talleres certificados por CECNSR.',
                ],
            ]
        ],
    ],
];

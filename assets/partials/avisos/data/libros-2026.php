<?php

return [
    'id' => 'libros-2026',
    'type' => 'venta-libros',
    'badge' => 'Aviso oficial',
    'title' => 'Libros de texto – Año 2026',
    'subtitle' => 'Fechas oficiales de venta por grado y modalidad. Puedes buscar por grado o por materia.',
    'updated_at' => '2026-01-15',

    // HERO (opcional)
    // Nota: coloca una imagen real en esta ruta o cambia el path al que uses en tu proyecto.
    'hero' => [
        'bg' => asset('assets/partials/avisos/img/libros-cecnsr.jpeg'),
        'kicker' => 'Venta de libros de texto',
        'title' => 'Libros de texto – Año 2026',
        'subtitle' => 'Fechas oficiales de venta por grado y modalidad. Puedes buscar por grado o por materia.',
        'note' => 'Horario: L–V 7:00 AM – 12:00 M y 1:00 PM – 3:00 PM',
    ],

    'cta' => [
        'secondary' => ['label' => 'Volver al inicio', 'href' => asset('index.php')],
    ],

    'hours' => [
        'title' => 'Horario de atención',
        'text'  => 'Lunes a viernes: 7:00 AM – 12:00 M y 1:00 PM – 3:00 PM',
    ],

    // 👇 Aquí viene lo importante: el contenido estructurado
    'groups' => [
        [
            'name'  => 'Parvularia',
            'items' => [
                [
                    'grade' => 'Inicial 3 años',
                    'dates' => '21 y 22 de enero',
                    'subjects' => ['Educación en la Fe', 'Inglés', 'Material Montessori', 'Descubro y aprendo jugando 3', 'Robótica e informática']
                ],
                [
                    'grade' => 'Parvularia 4 y 5 años',
                    'dates' => '21 y 22 de enero',
                    'subjects' => ['Educación en la Fe', 'Inglés', 'Ajedrez', 'Material Montessori', 'Robótica e informática']
                ],
                [
                    'grade' => 'Parvularia 6 años',
                    'dates' => '21 y 22 de enero',
                    'subjects' => ['Educación en la Fe', 'Inglés', 'Ajedrez', 'Material Montessori', 'Robótica e informática']
                ],
            ],
        ],

        [
            'name'  => 'Educación Básica',
            'items' => [
                [
                    'grade' => '1er grado',
                    'dates' => '2, 3 y 4 de febrero',
                    'subjects' => ['Educación en la Fe', 'Inglés', 'Alemán', 'Ajedrez', 'Robótica e informática']
                ],
                [
                    'grade' => '2° y 3° grado',
                    'dates' => '2, 3 y 4 de febrero',
                    'subjects' => ['Educación en la Fe', 'Inglés', 'Ajedrez', 'Alemán', 'Ciudadanía y Valores', 'Robótica e informática']
                ],
                [
                    'grade' => '4°, 5° y 6° grado',
                    'dates' => '2, 3 y 4 de febrero',
                    // ✅ Ajustado a las imágenes compartidas
                    'subjects' => [
                        'Educación en la Fe',
                        'Inglés',
                        'Ciudadanía y Valores',
                        'Alemán Deutsch fur kinder PRE-A1 (Solo estudiantes de nuevo ingreso)',
                        'Alemán cuaderno de ejercicios PRE-A1-2026',
                        'Ajedrez',
                        'Socioemocional N° 4, 5 o 6',
                        'Robótica e informática'
                    ]
                ],
                [
                    'grade' => '7° grado',
                    'dates' => '23, 26, 27 y 28 de enero',
                    // ✅ Ajustado a las imágenes compartidas
                    'subjects' => [
                        'Educación en la Fe',
                        'Inglés',
                        'Inteligencia Emocional 1',
                        'Alemán Deutsche Grammatik Kursbuch',
                        'Alemán ejercicios Deutsche Grammatik',
                        'Ajedrez',
                        'Robótica e informática'
                    ]
                ],
                [
                    'grade' => '8° grado',
                    'dates' => '23, 26, 27 y 28 de enero',
                    // ✅ Ajustado a las imágenes compartidas
                    'subjects' => [
                        'Educación en la Fe',
                        'Inglés',
                        'Inteligencia Emocional 2',
                        'Alemán Deutsche Grammatik Kursbuch',
                        'Alemán ejercicios Deutsche Grammatik',
                        'Ajedrez',
                        'Robótica e informática'
                    ]
                ],
                [
                    'grade' => '9° grado',
                    'dates' => '23, 26, 27 y 28 de enero',
                    // ✅ Ajustado a las imágenes compartidas
                    'subjects' => [
                        'Educación en la Fe',
                        'Inglés',
                        'Inteligencia Emocional 2',
                        'Alemán Deutsche Grammatik Kursbuch',
                        'Alemán ejercicios Deutsche Grammatik',
                        'Ajedrez',
                        'Robótica e informática'
                    ]
                ],
            ],
        ],

        // =========================
        // BACHILLERATO (según imágenes compartidas)
        // =========================
        [
            'name'  => 'Bachillerato – 1er año',
            'items' => [
                [
                    'grade' => '1er año de Brto General (Software o Idiomas)',
                    'dates' => '28, 29 y 30 de enero',
                    'subjects' => [
                        'Educación en la Fe',
                        'Inglés',
                        'Ciudadanía y Valores 1',
                        'Inteligencia Emocional 3',
                        'Historia de El Salvador',
                        'Ciencias Naturales',
                        'Finanzas y economía I',
                        'Ajedrez',
                        'Robótica e informática'
                    ]
                ],
                [
                    'grade' => '1er año de Brto Técnico (APS-ECA)',
                    'dates' => '28, 29 y 30 de enero',
                    'subjects' => [
                        'Educación en la Fe',
                        'Inglés',
                        'Ciudadanía y Valores 1',
                        'Alemán Deutsche Grammatik Kursbuch',
                        'Alemán ejercicios Deutsche Grammatik',
                        'Historia de El Salvador',
                        'Ciencias Naturales',
                        'Ajedrez',
                        'Robótica e informática'
                    ]
                ],
                [
                    'grade' => '1er año de Brto Técnico (ST-LG)',
                    'dates' => '28, 29 y 30 de enero',
                    'subjects' => [
                        'Educación en la Fe',
                        'Inglés',
                        'Ciudadanía y Valores 1',
                        'Historia de El Salvador',
                        'Ciencias Naturales',
                        'Ajedrez',
                        'Robótica e informática'
                    ]
                ],
            ],
        ],

        [
            'name'  => 'Bachillerato – 2do año',
            'items' => [
                [
                    'grade' => '2do año de Brto General (Software)',
                    'dates' => '28, 29 y 30 de enero',
                    'subjects' => [
                        'Educación en la Fe',
                        'Inglés',
                        'Ciudadanía y Valores 2',
                        'Inteligencia Emocional 3',
                        'Ciencias Naturales',
                        'Finanzas y economía II'
                    ]
                ],
                [
                    'grade' => '2do año de Brto General (Idiomas)',
                    'dates' => '28, 29 y 30 de enero',
                    'subjects' => [
                        'Educación en la Fe',
                        'Inglés',
                        'Ciudadanía y Valores 2',
                        'Inteligencia Emocional 3',
                        'Ciencias Naturales',
                        'Finanzas y economía II',
                        'Alemán Deutsche Grammatik Kursbuch',
                        'Alemán ejercicios Deutsche Grammatik'
                    ]
                ],
                [
                    'grade' => '2do año de Brto Técnico (APS-ECA)',
                    'dates' => '28, 29 y 30 de enero',
                    'subjects' => [
                        'Educación en la Fe',
                        'Inglés',
                        'Ciudadanía y Valores 2',
                        'Ciencias Naturales',
                        'Alemán Deutsche Grammatik Kursbuch',
                        'Alemán ejercicios Deutsche Grammatik'
                    ]
                ],
                [
                    'grade' => '2do año de Brto Técnico (ST-LG)',
                    'dates' => '28, 29 y 30 de enero',
                    'subjects' => [
                        'Educación en la Fe',
                        'Inglés',
                        'Ciudadanía y Valores 2',
                        'Ciencias Naturales'
                    ]
                ],
            ],
        ],

        [
            'name'  => 'Bachillerato – 3er año',
            'items' => [
                [
                    'grade' => '3er año de Brto (ST-AC)',
                    'dates' => '28, 29 y 30 de enero',
                    'subjects' => [
                        'Educación en la Fe',
                        'Inglés técnico: ST- Tourism & Hospitably English',
                        'Inglés técnico: AC- Workplace English'
                    ]
                ],
                [
                    'grade' => '3er año de Brto (APS)',
                    'dates' => '28, 29 y 30 de enero',
                    'subjects' => [
                        'Educación en la Fe',
                        'Alemán Deutsche Grammatik Kursbuch',
                        'Alemán ejercicios Deutsche Grammatik',
                        'Inglés técnico: Nursing English'
                    ]
                ],
                [
                    'grade' => '3er año de Brto (ECA)',
                    'dates' => '28, 29 y 30 de enero',
                    'subjects' => [
                        'Educación en la Fe',
                        'Alemán Deutsche Grammatik Kursbuch',
                        'Alemán ejercicios Deutsche Grammatik'
                    ]
                ],
                [
                    'grade' => '3er año de Brto (LG)',
                    'dates' => '28, 29 y 30 de enero',
                    'subjects' => [
                        'Educación en la Fe'
                    ]
                ],
            ],
        ],
    ],
];

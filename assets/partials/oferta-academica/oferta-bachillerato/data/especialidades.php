<?php
return [
    'title'    => 'Nuestras Especialidades de Bachillerato',
    'subtitle' => 'Explora el plan de estudios que te llevará a la universidad o al mundo laboral.',
    'default'  => 'salud',

    'buttons' => [
        ['id' => 'salud',     'icon' => 'fa-heartbeat',      'label' => 'Salud y Bienestar Social'],
        ['id' => 'logistica', 'icon' => 'fa-truck-moving',   'label' => 'Logística Comercial y Global'],
        ['id' => 'sistemas',  'icon' => 'fa-solar-panel',    'label' => 'Electrónica y Energías Renovables'],
        ['id' => 'turismo',   'icon' => 'fa-globe-americas', 'label' => 'Servicios Turísticos'],
        ['id' => 'idiomas',   'icon' => 'fa-language',       'label' => 'General Dipl. Idiomas'],
        ['id' => 'software',  'icon' => 'fa-code',           'label' => 'General Dipl. Desarrollo Software'],
    ],

    'especialidades' => [
        [
            'id'         => 'salud',
            'headline'   => 'Bachillerato Técnico Productivo: Salud y Bienestar Social',
            'image_path' => 'aps',
            'images'     => [
                ['file' => 's1.jpg', 'alt' => 'Prácticas de primeros auxilios'],
                ['file' => 's2.jpg', 'alt' => 'Laboratorio de biología'],
                ['file' => 's3.jpg', 'alt' => 'Simulación de atención al paciente'],
                ['file' => 's4.jpg', 'alt' => 'Simulación de atención al paciente'],
            ],
            'description' => 'Enfocado en la atención primaria, primeros auxilios y gestión de la salud comunitaria. Con un fuerte componente práctico y ético.',
            'bullets' => [
                'Prácticas supervisadas en clínicas y comunidades.',
                'Competencia: Asistencia básica en procedimientos médicos.',
                'Certificación en Primeros Auxilios Avanzados.',
            ],
            'youtube' => 'https://youtu.be/hVNPmHe1jik',
        ],
        [
            'id'         => 'logistica',
            'headline'   => 'Bachillerato Técnico Productivo: Logística Comercial y Global',
            'image_path' => 'lg',
            'images'     => [
                ['file' => 'l1.jpg', 'alt' => 'Foto de un almacén organizado'],
                ['file' => 'l2.jpg', 'alt' => 'Mapa de cadena de suministro'],
                ['file' => 'l3.jpg', 'alt' => 'Gestión de transporte y rutas'],
            ],
            'description' => 'Desarrollo de habilidades para gestionar la cadena de suministro, desde la importación/exportación hasta la distribución. La espina dorsal del comercio moderno.',
            'bullets' => [
                'Manejo de sistemas de inventario y ERP.',
                'Competencia: Optimización de rutas y gestión de almacenes.',
                'Conocimiento en normativas aduaneras.',
            ],
            'youtube' => 'https://youtu.be/sc5ytNveJPM',
        ],
        [
            'id'         => 'sistemas',
            'headline'   => 'Bachillerato Técnico Productivo: Sistemas Electrónicos y Energías Renovables',
            'image_path' => 'eca',
            'images'     => [
                ['file' => 'e1.jpg', 'alt' => 'Instalación de paneles solares'],
                ['file' => 'e2.jpg', 'alt' => 'Práctica con circuitos electrónicos'],
                ['file' => 'e3.jpg', 'alt' => 'Fundamentos de robótica'],
                ['file' => 'e4.jpg', 'alt' => 'Fundamentos de robótica'],
                ['file' => 'e5.jpg', 'alt' => 'Fundamentos de robótica'],
                ['file' => 'e6.jpg', 'alt' => 'Fundamentos de robótica'],
                ['file' => 'e7.jpg', 'alt' => 'Fundamentos de robótica'],
            ],
            'description' => 'Preparación en instalación y mantenimiento de sistemas electrónicos y tecnologías limpias. Lidera la transición energética y tecnológica del futuro.',
            'bullets' => [
                'Diseño e instalación de paneles solares y sistemas eólicos.',
                'Competencia: Mantenimiento de circuitos y dispositivos electrónicos.',
                'Fundamentos de automatización.',
            ],
            'youtube' => 'https://youtu.be/vCzxuj0vSNc',
        ],
        [
            'id'         => 'turismo',
            'headline'   => 'Bachillerato Técnico Vocacional: Servicios Turísticos',
            'image_path' => 'st',
            'images'     => [
                ['file' => 'st1.jpg',  'alt' => 'Práctica de guianza turística'],
                ['file' => 'st2.jpeg', 'alt' => 'Simulación de atención hotelera'],
                ['file' => 'st3.jpeg', 'alt' => 'Organización de eventos'],
                ['file' => 'st4.jpg',  'alt' => 'Organización de eventos'],
                ['file' => 'st5.jpg',  'alt' => 'Organización de eventos'],
                ['file' => 'st6.jpg',  'alt' => 'Organización de eventos'],
            ],
            'description' => 'Enfoque en hospitalidad, guianza turística y gestión de eventos. Una carrera dinámica con énfasis en el bilingüismo y la promoción cultural.',
            'bullets' => [
                'Técnicas de atención al cliente y gestión hotelera.',
                'Competencia: Creación y promoción de paquetes turísticos.',
                'Certificación en guianza local.',
            ],
            'youtube' => 'https://youtu.be/Z9ePhtVMK3g',
        ],
        [
            'id'         => 'idiomas',
            'headline'   => 'Bachillerato General Diplomado en Idiomas',
            'image_path' => 'g-idiomas',
            'images'     => [
                ['file' => 'id1.jpg', 'alt' => 'Clase de alemán con profesor nativo'],
                ['file' => 'id2.jpg', 'alt' => 'Intercambio cultural'],
                ['file' => 'id3.jpg', 'alt' => 'Taller de conversación avanzado'],
            ],
            'description' => 'Dominio avanzado en lenguas extranjeras (Inglés, Portugués y Alemán). Ideal para carreras internacionales, abriendo puertas a universidades globales.',
            'bullets' => [
                'Dominio A1 en idiomas.',
                'Competencia: Comunicación intercultural efectiva y traducción básica.',
                'Preparación para exámenes internacionales.',
            ],
            'youtube' => 'https://youtu.be/jnj8_l8fXC4',
        ],
        [
            'id'         => 'software',
            'headline'   => 'Bachillerato General Dipl. en Desarrollo de Software',
            'image_path' => 'g-d-software',
            'images'     => [
                ['file' => 'so1.jpg', 'alt' => 'Estudiante programando'],
                ['file' => 'so2.jpg', 'alt' => 'Diseño y desarrollo web'],
                ['file' => 'so3.jpg', 'alt' => 'Taller de bases de datos'],
                ['file' => 'so4.jpg', 'alt' => 'Taller de bases de datos'],
            ],
            'description' => 'Fundamentos de programación, bases de datos y desarrollo web. La base para tu carrera en el sector tecnológico, con un enfoque práctico.',
            'bullets' => [
                'Introducción a lenguajes clave (Python, JavaScript).',
                'Competencia: Creación de sitios web responsivos.',
                'Desarrollo de bases de datos simples.',
            ],
            'youtube' => 'https://youtu.be/pJ4Ts31HwuE',
        ],
    ],
];

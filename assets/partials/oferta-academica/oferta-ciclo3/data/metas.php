<?php
return [
    'section_title' => 'Perfil del Estudiante al Finalizar el III Ciclo',
    'section_icon'  => 'fa-puzzle-piece',
    'tabs' => [
        'tab-academico' => [
            'button_label' => 'Área Académica',
            'title_icon'   => 'fa-graduation-cap',
            'title'        => 'Metas Académicas Clave',
            'description'  => 'El estudiante desarrolla las bases sólidas para afrontar el Bachillerato con éxito, destacando en materias como Matemática, Ciencias y Lenguajes.',
            'items'        => [
                'Dominio de álgebra y geometría avanzada.',
                'Habilidad para realizar proyectos de investigación científica.',
                'Competencia comunicativa básica en idioma Inglés.',
            ],
        ],
        'tab-personal' => [
            'button_label' => 'Área Personal/Social',
            'title_icon'   => 'fa-user-tie',
            'title'        => 'Desarrollo de Liderazgo y Madurez',
            'description'  => 'Fomentamos el pensamiento crítico y la toma de decisiones responsable, preparando a los jóvenes para la transición a la educación media.',
            'items'        => [
                'Conciencia social y participación activa en la comunidad.',
                'Identificación de habilidades y orientación vocacional inicial.',
                'Manejo de la frustración y resolución de conflictos.',
            ],
        ],
        'tab-competencias' => [
            'button_label' => 'Competencias PASCH',
            'title_icon'   => 'fa-globe-americas',
            'title'        => 'Alemán PASCH y Proyección Internacional',
            'description'  => 'Los estudiantes continúan el programa PASCH con el objetivo de obtener el Certificado de Lengua Alemana (Deutsches Sprachdiplom - DSD I).',
            'items'        => [
                'Logro de nivel básico en Alemán (DSD I).',
                'Intercambios y campamentos de inmersión lingüística en Alemania.',
                'Desarrollo de proyectos multiculturales en colaboración con otros Colegios PASCH.',
            ],
        ],
    ],
    'default_tab' => 'tab-academico',
];

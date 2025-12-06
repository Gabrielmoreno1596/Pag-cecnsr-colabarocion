<?php
return [
    'title' => 'Proceso de Admisión: Inicial y Parvularia',
    'accordions' => [
        [
            'icon' => 'fa-check-circle',
            'header' => 'Requisitos Clave y Edad Mínima',
            'type' => 'requirements',
            'items' => [
                [
                    'icon' => 'fa-toilet',
                    'strong' => 'Manejo de Esfínteres:',
                    'text' => 'Es indispensable el inicio del manejo de esfínteres.',
                ],
                [
                    'icon' => 'fa-users-cog',
                    'strong' => 'Entrevista Familiar:',
                    'text' => 'Participar activamente en la entrevista familiar para evaluación según la fecha asignada.',
                ],
                [
                    'icon' => 'fa-book-open',
                    'strong' => 'Adquirir Prospecto:',
                    'text' => 'Adquirir el prospecto en la recepción de la institución.',
                ],
                [
                    'icon' => 'fa-award',
                    'strong' => 'Diploma (Parvularia 5 y 6 años):',
                    'text' => 'Presentar el diploma de haber cursado el año anterior.',
                ],
            ],
            'age_notice' => 'Edad mínima de ingreso a Inicial 3 Años es 2 años y 9 meses.',
        ],
        [
            'icon' => 'fa-file-alt',
            'header' => 'Documentación a Presentar (Físico)',
            'type' => 'documents',
            'items' => [
                ['icon' => 'fa-file-invoice', 'text' => 'Partida de nacimiento original y copia reciente (3 meses).'],
                ['icon' => 'fa-cross', 'text' => 'Fe de bautismo.'],
                ['icon' => 'fa-syringe', 'text' => 'Tarjeta de Vacunación.'],
                ['icon' => 'fa-id-card-alt', 'text' => 'Fotocopia del DUI del responsable al 150%.'],
                ['icon' => 'fa-camera', 'text' => 'Fotografía tamaño cédula reciente.'],
            ],
        ],
    ],
];

<?php
$base = 'assets/img/convenios/pasch';

return [
    'id' => 'experiencias',
    'title' => 'Experiencias CECNSR',
    'cards' => [
        [
            'name' => 'Alex — Curso juvenil (A1)',
            'desc' => '3 semanas en Benediktbeuern. Clases A1, deporte y visitas a Múnich e Innsbruck.',
            'pdf_label' => 'Ver bitácora',
            'pdf' => "$base/pdf/paschBitácora-Alemania-ALEMÁN-Alex.pdf",
            'images' => [
                "$base/experiencias/pasch-img2.jpeg",
                "$base/experiencias/pasch-img5.png",
                "$base/experiencias/pasch-img6.png",
            ],
            'alts' => [
                'Alex en curso juvenil',
                'Alex en curso juvenil',
                'Alex en curso juvenil',
            ]
        ],
        [
            'name' => 'Valeria — Campamento PASCH (A1)',
            'desc' => 'Convivencia multicultural; estrategias creativas para superar la barrera del idioma. Certificación A1.',
            'pdf_label' => 'Ver logbuch',
            'pdf' => "$base/pdf/pasch-Logbuch-Valeria-Meléndez-2APS.pdf",
            'images' => [
                "$base/experiencias/pasch-valeria2.png",
                "$base/experiencias/pasch-valeria1.png",
                "$base/experiencias/pasch-img4.png",
            ],
            'alts' => [
                'Valeria en campamento PASCH',
                'Valeria en campamento PASCH',
                'Valeria en campamento PASCH',
            ]
        ],
        [
            'name' => 'Mateo — Jungenkurs (A2)',
            'desc' => 'Curso A2 en Bamberg (Goethe-Institut). Proyecto stop-motion y excursiones. Meta B1.',
            'pdf_label' => 'Ver memoria',
            'pdf' => "$base/pdf/paschMemoria-de-viaje-Mateo.pdf",
            'images' => [
                "$base/experiencias/pasch-vijaron.jpeg",
                "$base/experiencias/pasch-mateo1.png",
                "$base/experiencias/pasch-mateo2.png",
            ],
            'alts' => [
                'Mateo en Jungenkurs',
                'Mateo en Jungenkurs',
                'Mateo en Jungenkurs',
            ]
        ],
    ]
];

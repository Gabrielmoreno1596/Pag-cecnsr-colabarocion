<?php
$seasonalModalData = [
    'enabled' => true,
    'theme' => 'christmas', // christmas | general
    'title' => 'Feliz Navidad',
    'message' => 'El CECNSR les desea una Navidad llena de paz, unión y esperanza.',
    'image' => null, // ruta opcional (usa asset() en PHP si quieres pasarlo resuelto)
    'slides' => [
        [
            'src' => asset('assets/4pe/afiche-invitacion.png'),
            'alt' => 'Decoración navideña iluminada en el colegio',
        ],
        [
            'src' => asset('assets/4pe/pi-4pe-img1.jpeg'),
            'alt' => 'Estudiantes compartiendo en un ambiente festivo',
        ],
        [
            'src' => asset('assets/4pe/pi-4pe-img2.jpeg'),
            'alt' => 'Detalle de adornos navideños en el campus',
        ],
    ],
    'start_date' => '2025-12-01',
    'end_date' => '2025-12-31',
    'show_once_per' => 'day', // session | day | always
    'storage_key' => 'cecnsr_xmas_2025',
    'primary_btn' => [
        'label' => null,
        'href' => null,
    ],
    'secondary_btn' => [
        'label' => null,
        'href' => null,
    ],
];

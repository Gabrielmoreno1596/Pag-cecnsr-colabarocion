<?php

/**
 * Float Modal - Avisos institucionales (Slides tipo "card")
 *
 * Diseño:
 * - Hero con fondo rotativo (2-3 imágenes) + título grande
 * - Óvalo/Avatar en esquina superior derecha
 * - Contenido + botones en la parte inferior
 * - Slide "Entendido" se puede descartar (solo queda Venta de libros)
 */

$seasonalModalData = [
    'enabled' => true,
    'theme' => 'general',

    // Título/mensaje global opcional
    'title' => null,
    'message' => null,

    'slides' => [
        [
            'id' => 'welcome2026',
            'type' => 'card',

            // ✅ Modo overlay: full | minimal
            'overlay_mode' => 'full',

            // ✅ Hero (fondo rotativo)
            'hero_images' => [
                asset('assets/partials/ui/float-modal/image/cancha-parvularia-nivel.jpeg'),
                asset('assets/partials/ui/float-modal/image/parv-cancha.jpeg'),
                asset('assets/partials/ui/float-modal/image/cancha-parvularia-nivel.jpeg'),
            ],

            // ✅ Avatar (óvalo en esquina superior derecha)
            'avatar_img' => asset('assets/partials/ui/float-modal/image/cecnsr.png'),

            'badge' => 'Comunicado',
            'accent' => '#2563eb', // azul institucional

            // ✅ Título principal (grande)
            'hero_title' => 'Bienvenidos al año 2026',
            'hero_sub' => 'Inicio de clases: 02 de febrero · Todos los niveles',

            // ✅ Contenido inferior
            'headline' => 'Inicio de clases',
            'sub' => 'Indicaciones generales para estudiantes y responsables.',

            'bullets' => [
                'Prepárate con anticipación: uniforme, útiles y puntualidad.',
                'Revisa la información oficial y comunícate ante cualquier duda.',
                'Desliza para ver el aviso de venta de libros 2026.',
            ],

            // ✅ Para este slide NO hay enlaces externos.
            // Botón de acción: descartar este aviso (solo quedará Venta de libros)
            'links' => [
                [
                    'label' => 'Entendido',
                    'action' => 'dismiss',  // dismiss = quitar este slide (por el día)
                    'variant' => 'primary'
                ],
            ],

            // Sin CTA (click en tarjeta) para evitar redirecciones
            'cta_label' => null,
            'cta_href' => null,
        ],

        [
            'id' => 'books2026',
            'type' => 'card',

            'overlay_mode' => 'full',

            // ✅ Hero (fondo rotativo)
            'hero_images' => [
                asset('assets/partials/ui/float-modal/image/ii-ciclo-sexto-grado2.jpeg'),
                asset('assets/partials/ui/float-modal/image/cancha-parvularia-nivel.jpeg'),
                asset('assets/partials/ui/float-modal/image/ii-ciclo-sexto-grado2.jpeg'),
            ],

            'avatar_img' => asset('assets/partials/ui/float-modal/image/cecnsr.png'),

            'badge' => 'Importante',
            'accent' => '#16a34a', // verde

            'hero_title' => 'Venta de libros 2026',
            'hero_sub' => 'Fechas por grado · Horario de atención · Aviso oficial',

            'headline' => 'Fechas de venta por grado',
            'sub' => 'Consulta el calendario completo y horarios antes de asistir.',

            'bullets' => [
                'Fechas por grado disponibles en el aviso oficial.',
                'Horario: Lunes a Viernes 7:00AM–12:00M y 1:00PM–3:00PM.',
                'Recomendación: revisar el grado antes de asistir.',
            ],

            'links' => [
                [
                    'label' => 'Ver fechas',
                    'href' => 'venta-de-libros.php',
                    'variant' => 'primary'
                ],
                /* [
                    'label' => 'Volver al inicio',
                    'href' => 'index.php',
                    'variant' => 'ghost'
                ], */
            ],

            'cta_label' => 'Ver fechas',
            'cta_href' => '/avisos/venta-de-libros.php',
        ],
    ],

    // ✅ Mostrar siempre (session | day | always)
    'start_date' => null,
    'end_date' => null,
    'show_once_per' => 'always',
    'storage_key' => 'cecnsr_float_modal',

    // Botones globales ya no se usan (se controlan por slide)
    'primary_btn' => ['label' => null, 'href' => null],
    'secondary_btn' => ['label' => null, 'href' => null],
];

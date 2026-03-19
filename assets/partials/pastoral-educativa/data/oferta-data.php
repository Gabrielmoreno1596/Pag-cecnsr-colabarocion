<?php

/**
 * Datos de la sección Oferta académica (timeline + rotadores)
 */
return [
    'title' => 'Oferta académica con identidad pastoral',
    'items' => [
        [
            'label' => 'Educación Inicial y Parvularia',
            'text'  => 'Desarrollo de habilidades básicas, socialización y descubrimiento del entorno desde el juego, la creatividad y la fe.',
            'bullets' => [
                'Psicomotricidad, lenguaje y pensamiento lógico.',
                'Rutinas y hábitos con sentido de autocuido.',
                'Ambientes lúdicos y celebrativos.',
            ],
            'rotator' => [
                'interval' => 3800,
                'images'  => [
                    asset('assets/img/oferta-academica/parv-inicial/cancha-parvularia-nivel.webp'),
                    asset('assets/img/oferta-academica/parv-inicial/est-parv-prof_Dina.webp'),
                    asset('assets/img/oferta-academica/parv-inicial/parv-salon-p4a.webp'),
                    asset('assets/img/oferta-academica/parv-inicial/parv-liliana-p425.webp'),
                    asset('assets/img/oferta-academica/parv-inicial/parv-cancha-nivel2.webp'),
                ],
            ],
            'open' => true, // este aparece desplegado por defecto
        ],
        [
            'label' => 'Primer Ciclo',
            'text'  => 'Consolidación de la lectoescritura, pensamiento lógico y hábitos de estudio con acompañamiento cercano.',
            'bullets' => [
                'Lenguaje, Matemática, Ciencias y Arte como base.',
                'Rutinas de trabajo y autonomía progresiva.',
                'Proyecto de aula con enfoque pastoral.',
            ],
            'rotator' => [
                'interval' => 3800,
                'images'  => [
                    asset('assets/img/oferta-academica/oferta-ciclo1/primer-ciclo-primer-grado.webp'),
                    asset('assets/img/oferta-academica/oferta-ciclo1/est-3er-grado-madre-iris.webp'),
                    asset('assets/img/oferta-academica/oferta-ciclo1/2-2do-visit-mineducyt.webp'),
                ],
            ],
        ],
        [
            'label' => 'Segundo Ciclo',
            'text'  => 'Profundización de contenidos, trabajo colaborativo y disciplina personal con vivencia de valores.',
            'bullets' => [
                'Comprensión lectora, resolución de problemas y expresión creativa.',
                'Proyectos integrados y uso responsable de tecnología.',
                'Acciones pastorales y ciudadanía responsable.',
            ],
            'rotator' => [
                'interval' => 3800,
                'images'  => [
                    asset('assets/img/oferta-academica/oferta-ciclo2/ii-ciclo-sexto-grado.webp'),
                    asset('assets/img/oferta-academica/oferta-ciclo2/ii-ciclo-sexto-grado2.webp'),
                    asset('assets/img/oferta-academica/oferta-ciclo2/cuarto-grado-visita-inge-Katia.webp'),
                ],
            ],
        ],
        [
            'label' => 'Tercer Ciclo',
            'text'  => 'Pensamiento crítico, analítico e investigativo; cuatro puntos esenciales y construcción de identidad.',
            'bullets' => [
                'Proyectos STEAM y servicio a la comunidad.',
                'Hábitos de estudio y metacognición.',
                'Convivencia fraterna y liderazgo.',
            ],
            'rotator' => [
                'interval' => 3800,
                'images'  => [
                    asset('assets/img/oferta-academica/oferta-ciclo3/iiic3.webp'),
                    asset('assets/img/oferta-academica/oferta-ciclo3/iiic1.webp'),
                    asset('assets/img/oferta-academica/oferta-ciclo3/iiic10.webp'),
                    asset('assets/img/oferta-academica/oferta-ciclo3/iii-ciclo-trabajo-grupal2.webp'),
                    asset('assets/img/oferta-academica/oferta-ciclo3/retiro-tercer-ciclo.webp'),
                ],
            ],
        ],
        [
            'label' => 'Educación Media',
            'text'  => 'Formación académica sólida y técnica; orientación vocacional para educación superior, mundo laboral y vida social.',
            'bullets' => [
                'Itinerarios, ferias y pasantías.',
                'Proyecto de vida y ciudadanía responsable.',
                'Servicio y cuidado de la Casa Común.',
            ],
            'rotator' => [
                'interval' => 4200,
                'images'  => [
                    asset('assets/img/oferta-academica/oferta-bachillerato/estudiantes-gradas.webp'),
                    asset('assets/img/pastoral-educativa/celebraciones/cancha-desde-gradas-derecha.webp'),
                    asset('assets/img/oferta-academica/oferta-bachillerato/media-1ga.webp'),
                    asset('assets/img/pastoral-educativa/celebraciones/cancha-desde-escenario2.webp'),
                    asset('assets/img/oferta-academica/oferta-bachillerato/aps-edu-media.webp'),
                ],
            ],
        ],
    ],
];

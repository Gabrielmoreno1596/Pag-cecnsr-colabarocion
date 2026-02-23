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
                    asset('assets/img/oferta-academica/parv-inicial/cancha-parvularia-nivel.jpeg'),
                    asset('assets/img/oferta-academica/parv-inicial/est-parv-prof_Dina.jpeg'),
                    asset('assets/img/oferta-academica/parv-inicial/parv-salon-p4a.jpeg'),
                    asset('assets/img/oferta-academica/parv-inicial/parv-liliana-p425.jpeg'),
                    asset('assets/img/oferta-academica/parv-inicial/parv-cancha-nivel2.jpeg'),
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
                    asset('assets/img/oferta-academica/oferta-ciclo1/primer-ciclo-primer-grado.jpeg'),
                    asset('assets/img/oferta-academica/oferta-ciclo1/est-3er-grado-madre-iris.jpeg'),
                    asset('assets/img/oferta-academica/oferta-ciclo1/2-2do-visit-mineducyt.jpeg'),
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
                    asset('assets/img/oferta-academica/oferta-ciclo2/ii-ciclo-sexto-grado.jpeg'),
                    asset('assets/img/oferta-academica/oferta-ciclo2/ii-ciclo-sexto-grado2.jpeg'),
                    asset('assets/img/oferta-academica/oferta-ciclo2/cuarto-grado-visita-inge-Katia.jpeg'),
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
                    asset('assets/img/oferta-academica/oferta-ciclo3/iiic3.jpeg'),
                    asset('assets/img/oferta-academica/oferta-ciclo3/iiic1.jpeg'),
                    asset('assets/img/oferta-academica/oferta-ciclo3/iiic10.jpeg'),
                    asset('assets/img/oferta-academica/oferta-ciclo3/iii-ciclo-trabajo-grupal2.jpeg'),
                    asset('assets/img/oferta-academica/oferta-ciclo3/retiro-tercer-ciclo.jpeg'),
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
                    asset('assets/img/oferta-academica/oferta-bachillerato/estudiantes-gradas.jpeg'),
                    asset('assets/img/pastoral-educativa/celebraciones/cancha-desde-gradas-derecha.jpeg'),
                    asset('assets/img/oferta-academica/oferta-bachillerato/media-1ga.jpeg'),
                    asset('assets/img/pastoral-educativa/celebraciones/cancha-desde-escenario2.jpeg'),
                    asset('assets/img/oferta-academica/oferta-bachillerato/aps-edu-media.jpeg'),
                ],
            ],
        ],
    ],
];

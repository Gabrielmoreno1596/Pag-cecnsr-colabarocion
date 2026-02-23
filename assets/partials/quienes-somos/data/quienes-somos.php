<?php

return [
  'hero' => [
    'title' => '¿Quiénes Somos?',
    'subtitle' => 'Conoce nuestra historia, identidad y el compromiso que guía nuestra formación integral.',
    // Chips tipo “confianza” (mismo componente/estilo que Inicio)
    'trust' => [
      ['icon' => 'fa-user-graduate', 'value' => '+1500', 'label' => 'Estudiantes'],
      ['icon' => 'fa-calendar-check', 'value' => 'Desde', 'label' => '1992'],
      ['icon' => 'fa-hand-holding-heart', 'value' => 'Valores', 'label' => 'Formación integral'],
    ],
    // Reutilizamos una imagen existente del proyecto
    'bg' => 'assets/partials/inicio/image/historia/h4.jpeg',
    'cta' => ['text' => 'Volver al Inicio', 'href' => 'index.php#inicio'],
  ],

  'historia' => [
    // Para el layout tipo screenshot
    'section_title' => '¿Quiénes Somos?',
    'headline' => 'Nuestra Historia: Una Obra de Fe y Compromiso',
    'excerpt' => 'Somos una comunidad educativa católica fundada en 1992, inspirada en valores evangélicos, marianos y franciscanos. Formamos estudiantes con excelencia académica, identidad y compromiso social.',
    'cta_text' => 'Conócenos más',
    'cta_href' => '#identidad',

    // Contenido extendido (queda disponible para otras variantes)
    'title' => 'Nuestra Historia',
    'subtitle' => 'Una obra de fe, servicio y compromiso con la educación.',
    'paragraphs' => [
      'El Complejo Educativo Católico "Nuestra Señora del Rosario" (CECNSR) nace en 1992 con la visión de M. Ana Margarita Meléndez Flores y las Hermanas Franciscanas. A pesar de las carencias iniciales, la fe y la providencia fueron nuestros pilares.',
      'En 1992 iniciamos gestiones con nuestra insigne bienhechora, la institución alemana VIPE, fortaleciendo el futuro del proyecto y consolidando nuestra misión educativa.',
    ],
    'bullets_intro' => 'Gracias a ese apoyo, logramos hitos como:',
    'bullets' => [
      '1995: Apertura de la modalidad de Bachillerato.',
      '1998-2000: Construcción y consolidación de nuestra infraestructura actual, 100% financiada por VIPE.',
      '2011: Inauguración del moderno edificio de Educación Parvularia, financiado por la Fundación Alemana Webasto.',
    ],
    'closing' => 'Hoy, atendemos a más de 1500 estudiantes, buscando la excelencia y la superación del ser humano por el Evangelio y la Educación.',
    // Galería (reutiliza imágenes existentes de Inicio)
    'images' => ['h.jpeg', 'h1.jpeg', 'h2.jpeg', 'h3.jpeg', 'h4.jpeg', 'h5.jpeg'],
    'base' => 'assets/partials/inicio/image/historia/',
  ],

  // Nuestra esencia (tarjeta editorial)
  // - Se ubica ANTES de Identidad para dar contexto y jerarquía visual
  'esencia' => [
    'eyebrow' => 'Nuestra esencia',
    'title' => 'Formación integral que trasciende',
    'text' => 'Inspirados en los valores evangélicos, marianos y franciscanos, acompañamos a cada estudiante en su crecimiento espiritual, humano y académico, con excelencia y calidez.',
    'quote' => '“Reparar la viña del Señor”',
    'highlights' => [
      ['icon' => 'fa-solid fa-cross', 'title' => 'Espiritual', 'desc' => 'Fe viva y acompañamiento cercano.'],
      ['icon' => 'fa-solid fa-people-group', 'title' => 'Humana', 'desc' => 'Buen trato, fraternidad y valores.'],
      ['icon' => 'fa-solid fa-graduation-cap', 'title' => 'Académica', 'desc' => 'Aprendizaje significativo e innovador.'],
    ],
    // Imagen editorial (reutiliza assets existentes)
    'image' => 'assets/partials/inicio/image/infraestructura/i2.jpg',
  ],

  // Identidad institucional (secciones separadas)
  'identidad' => [
    'mision' => [
      'title' => 'Misión',
      'text' => 'Ofrecer a la comunidad educativa una formación de calidad en las 
dimensiones espiritual, humana y académica, inspirada en los valores 
evangélicos, marianos y franciscanos, que le lleve a la realización de su 
vocación, comprometiéndose a “Reparar la viña del Señor”, siendo 
miembros constructivos de una sociedad más justa en armonía con su 
entorno.',
      'image' => 'assets/partials/inicio/image/infraestructura/i3.jpg',
    ],
    'vision' => [
      'title' => 'Visión',
      'text' => 'Ser  una Comunidad Educativa HFIC que  ofrezca una formación integral de calidad  e innovadora ,que que contribuya  a la  transformación  de la sociedad ,desde  una fe comprometida',
      'image' => 'assets/partials/inicio/image/infraestructura/i5.jpeg',
    ],
    'compromiso' => [
      'title' => 'Compromiso',
      'text' => 'Construir una educación y formación: integral, humanizadora e inclusiva, 
que trascienda siendo un proceso innovador, un signo de amor y 
esperanza que brinde oportunidades equitativas de crecimiento a los 
miembros que conforman la  comunidad, asegurarse que “nadie se 
quede atrás”, contribuyendo a la formación de una sociedad según el 
modelo de Jesús, María y la Filosofía HFIC.',
      'image' => 'assets/partials/inicio/image/infraestructura/i6.jpeg',
    ],
  ],

  // Principios congregacionales (Carrusel - 3 slides)
  'principios' => [
    'title' => 'Nuestros principios congregacionales',
    'subtitle' => '',
    'items' => [
      [
        'title' => 'FRANCISCANOS',
        'theme' => 'wine',
        // Fondo opcional (puedes cambiarlo por una imagen propia)
        'bg' => 'assets/partials/inicio/image/historia/h3.jpeg',
        'text' => 'San Francisco queriendo vivir el Santo Evangelio de nuestro Señor Jesucristo, lleva a cabo una intensa vida apostólica partiendo de la renuncia, la disponibilidad por el reino de Dios y el anuncio gratuito del mensaje de salvación (cfr. 2R 1, 1; RTOR, 1). El Padre Fundador, Fray José del Refugio Morales Córdova, OFM siendo fiel a la espiritualidad franciscana e inspirado por el Espíritu Santo, imprimió en la Congregación una forma concreta de vivir el Evangelio para que, conservando, sosteniendo y difundiendo los grandes valores de la vida consagrada, demos respuesta a las necesidades del pueblo de Dios, en la práctica de las obras de misericordia, y los valores franciscanos: fraternidad, minoridad, pobreza, alegría, paz, y armonía con la naturaleza (cfr. CC1984, 9; CC2008, 9).',
      ],
      [
        'title' => 'EVANGÉLICOS',
        'theme' => 'wine',
        'bg' => 'assets/partials/inicio/image/historia/h4.jpeg',
        'text' => '“Creados a imagen de Dios, según el modelo de su Hijo Divino por quien fuimos redimidos, y santificados por su Espíritu” (CC1984, 19), todos hemos sido llamados a la santidad, en auténtica conversión personal a los valores evangélicos de amor, misericordia, perdón, justicia, paz, libertad, verdad, e intensa vida de oración, entre otros (cfr. Mt 5, 25, 31-46; PNPF VI, 15).',
      ],
      [
        'title' => 'MARIANOS',
        'theme' => 'blue',
        'bg' => 'assets/partials/inicio/image/historia/h5.jpeg',
        'text' => 'La Bienaventurada Virgen María, patrona de la Congregación, en su advocación de la Inmaculada Concepción, es modelo de pureza, pobreza y obediencia a la voluntad del Padre, acogiendo y meditando su Palabra, y bajo su mirada maternal, queremos vivir el ideal evangélico de comunión fraterna, cooperando con Ella en la salvación del mundo (cfr. CC1984, 14-15; CC2008, 14 y 15).',
      ],
    ],
  ],

  // Principios Educativos (lista)
  'principios_educativos' => [
    'title' => 'Principios Educativos',
    'subtitle' => 'Nuestros principios orientan la convivencia, la pedagogía y el acompañamiento integral de cada estudiante.',
    'items' => [
      ['title' => 'Educamos desde la pedagogía de Jesús.', 'text' => 'Cristo enseñaba con su ejemplo y doctrina. (cf. Mt 28,18-20; 1C, 41)'],
      ['title' => 'Respetamos la dignidad de la persona.', 'text' => 'Háganse obedecer más por el amor que por la fuerza. (cf. CC1923, 307).'],
      ['title' => 'Atendemos desde la individualidad y diversidad.', 'text' => 'Tengan suma paciencia con los estudiantes, no vayan adelante sin haberse antes asegurado que todos hayan entendido. (cf. CC1923, 306).'],
      ['title' => 'Integramos fe, cultura y vida.', 'text' => 'El saber considerado en la perspectiva de la fe, llega a ser sabiduría y visión de vida. (cf. ECUTM, 14).'],
      ['title' => 'Hacemos amable la piedad.', 'text' => 'Comunicar el Evangelio con sagaz prudencia. (HDC, 414, f).'],
      ['title' => 'Educamos con vocación.', 'text' => 'María anima, guía y protege nuestra misión educativa. (cf. CC2008, 95).'],
      ['title' => 'Educamos con el ejemplo.', 'text' => 'Educar más que con palabras, con obras y con verdad. (cf.1R, 41).'],
      ['title' => 'Somos una fraternidad educativa.', 'text' => 'Nunca dejen solos a los alumnos. (cf. CC1923, 310).'],
      ['title' => 'Amamos y respetamos la naturaleza.', 'text' => 'Loado seas mi Señor, con todas tus creaturas. (Cánt 3).'],
      ['title' => 'Educamos para la familia y la sociedad.', 'text' => 'La familia es fuente de los valores humanos y la primera escuela de fe. (cf. Aparecida, 302).'],
    ],
  ],

  'valores' => [
    'title' => 'Nuestros Valores',
    'subtitle' => 'Valores institucionales que guían nuestra vida y convivencia.',
    'items' => [
      'Misericordia',
      'Paz',
      'Libertad',
      'Oración',
      'Pureza',
      'Armonía con la Naturaleza',
      'Fraternidad',
      'Minoridad',
    ],
  ],

  // CTA final (sin romper estética)
  'cta_final' => [
    'title' => '¿Listo para ser parte de nuestra comunidad?',
    'subtitle' => 'Explora la oferta académica o inicia el proceso de nuevo ingreso. Si deseas, también puedes contactarnos para orientación.',
    'items' => [
      [
        'title' => 'Inscripciones',
        'desc'  => 'Nuevo ingreso, requisitos y pasos.',
        'href'  => 'nuevo-ingreso.php',
        'icon'  => 'fa-solid fa-clipboard-check',
      ],
      [
        'title' => 'Oferta académica',
        'desc'  => 'Niveles y propuesta educativa.',
        'href'  => 'oferta-inicial.php',
        'icon'  => 'fa-solid fa-graduation-cap',
      ],
      [
        'title' => 'Contacto',
        'desc'  => 'Agenda una visita o resuelve dudas.',
        'href'  => 'contacto.php',
        'icon'  => 'fa-solid fa-comments',
      ],
    ],
  ],
];

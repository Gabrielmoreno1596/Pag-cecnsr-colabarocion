<!-- ===================== MAIN: Pastoral Educativa (CECNSR) ===================== -->
<main id="main-content" class="pastoral" role="main">
    <script>
        document.documentElement.classList.add('js');
    </script>
    <!-- ===== HERO (slideshow con overlay, badge y CTA) ===== -->
    <section class="hero" aria-label="Pastoral Educativa CECNSR">
        <!-- Slides -->
        <div class="hero-slideshow" aria-hidden="true">
            <figure class="hero-slide active">
                <img
                    src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-dramatizacion2.jpeg'); ?>"
                    alt="Estudiantes trabajando en aula"
                    loading="eager" decoding="async"
                    sizes="(max-width: 768px) 100vw, 100vw" />
            </figure>

            <figure class="hero-slide">
                <img
                    src="<?= asset('assets/pastoralEducativa/celebraciones/san-francisco-edu-inicial-parvularia.jpeg'); ?>"
                    alt="Celebración San Francisco en Educación Inicial y Parvularia"
                    loading="lazy" decoding="async"
                    sizes="(max-width: 768px) 100vw, 100vw" />
            </figure>

            <figure class="hero-slide">
                <img
                    src="<?= asset('assets/pastoralEducativa/celebraciones/san-francisco-tercer-ciclo.jpeg'); ?>"
                    alt="Celebración San Francisco en Tercer Ciclo"
                    loading="lazy" decoding="async"
                    sizes="(max-width: 768px) 100vw, 100vw" />
            </figure>

            <figure class="hero-slide">
                <img
                    src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-escenario2.jpeg'); ?>"
                    alt="Actividad pastoral en la cancha del centro educativo"
                    loading="lazy" decoding="async"
                    sizes="(max-width: 768px) 100vw, 100vw" />
            </figure>
        </div>

        <!-- Barra de progreso -->
        <div class="hero__progress" id="heroProgress" aria-hidden="true"></div>

        <!-- Contenido -->
        <div class="container">
            <!-- Badge / logotipo vidrio -->
            <div class="hero__badge" data-reveal="down" data-reveal-delay="100">
                <div class="hero__badge-logo">
                    <img class="hero__badge-logo"
                        src="<?= asset('assets/1_CECNSR.png'); ?>"
                        alt="Logotipo Pastoral Educativa CECNSR">
                </div>
            </div>

            <div class="hero__content" data-reveal="up" data-reveal-delay="150">
                <span class="eyebrow eyebrow--accent fx-sheen">Formación integral con valores cristianos</span>
                <h1 class="hero__title sheen-gold">Pastoral Educativa</h1>
                <h2 class="hero__title-sub">Complejo Educativo Católico "Nuestra Señora del Rosario"</h2>
                <span class="eyebrow-sub">Formar para construir un mundo fraterno</span>

                <div class="hero__actions" data-reveal="up" data-reveal-delay="250">
                    <a href="#desempenos" class="btn btn--gold btn--shine">
                        <span aria-hidden="true">🎓</span> Nuestro itinerario formativo
                    </a>
                    <a href="#galeria" class="btn btn--secondary">
                        <span aria-hidden="true">🖼️</span> Conoce nuestra comunidad
                    </a>
                </div>
            </div>
        </div>

        <!-- Indicadores -->
        <div class="hero__indicators" id="heroIndicators" aria-label="Cambiar diapositiva">
            <button class="hero__indicator active" data-slide="0" aria-label="Diapositiva 1"></button>
            <button class="hero__indicator" data-slide="1" aria-label="Diapositiva 2"></button>
            <button class="hero__indicator" data-slide="2" aria-label="Diapositiva 3"></button>
            <button class="hero__indicator" data-slide="3" aria-label="Diapositiva 4"></button>
        </div>

        <!-- Flecha scroll -->
        <a href="#desempenos" class="hero__scroll" aria-label="Ir a la siguiente sección">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </section>

    <!-- Preload de la primera imagen para evitar parpadeo -->
    <link rel="preload" as="image" href="<?= asset('assets/pastoralEducativa/celebraciones/cancha-dramatizacion2.jpeg'); ?>">

    <!-- ===== Misión ===== -->
    <section class="band band--mision-flat" aria-labelledby="mision-title">
        <div class="band__inner">

            <h2 id="mision-title" class="section-title" data-reveal="up">Misión de la Pastoral Educativa</h2>

            <p class="mision-lead" data-reveal="fade" data-reveal-delay="100">
                El <strong>Complejo Educativo Católico Nuestra Señora del Rosario</strong>, fiel a su misión evangelizadora y
                <strong>desde la Pedagogía de Jesús</strong>, carisma y filosofía HFIC, promueve una
                <strong>educación integral</strong> según el Modelo Educativo institucional para el
                <em>desarrollo armónico de la persona en todas sus dimensiones</em>.
            </p>

            <ul class="meta-pills" role="list" data-reveal="up" data-reveal-delay="150">
                <li class="pill btn btn--gold btn--shine">
                    <a href="#desempenos" class="btn-mision">Integrar <strong>fe, cultura y vida</strong></a>
                </li>
                <li class="pill btn--burgundy btn--shine"><a href="#desempenos" class="btn-mision">Seis desempeños: <strong>aprender, conocer, hacer, sentir, ser, convivir</strong></a></li>
                <li class="pill btn--burgundy btn--shine"><a href="#desempenos" class="btn-mision">Cuatro puntos: <strong>disciplina, tarjeta, servicio, prevención</strong></a></li>
            </ul>

            <!-- ===== Layout misión: contenido + aside ===== -->
            <div class="mision-layout" data-tabs="vjac" data-reveal="up" data-reveal-delay="200">
                <!-- Columna izquierda (tabs) -->
                <div class="mision-left">
                    <nav class="tabs__nav" role="tablist" aria-label="Metodología pastoral">
                        <button class="tabs__btn is-active" role="tab" aria-selected="true" aria-controls="tab-ver">Ver</button>
                        <button class="tabs__btn" role="tab" aria-selected="false" aria-controls="tab-juzgar">Juzgar</button>
                        <button class="tabs__btn" role="tab" aria-selected="false" aria-controls="tab-actuar">Actuar</button>
                        <button class="tabs__btn" role="tab" aria-selected="false" aria-controls="tab-celebrar">Celebrar</button>
                        <span class="tabs__ink" aria-hidden="true"></span>
                    </nav>

                    <section id="tab-ver" class="tabs__panel is-active" role="region">
                        <h3>Ver</h3>
                        <p>Mirada crítica y esperanzadora de la realidad.</p>
                        <ul>
                            <li>Impulsa <em>aprender</em> y <em>conocer</em>.</li>
                            <li>Se apoya en la <strong>disciplina personal</strong>.</li>
                        </ul>
                    </section>

                    <section id="tab-juzgar" class="tabs__panel" role="region" hidden>
                        <h3>Juzgar</h3>
                        <p>Interpretar la vida a la luz del Evangelio y lo franciscano.</p>
                        <ul>
                            <li>Fortalece <em>sentir</em> y <em>ser</em>.</li>
                            <li>Se expresa en la <strong>tarjeta de presentación personal</strong>.</li>
                        </ul>
                    </section>

                    <section id="tab-actuar" class="tabs__panel" role="region" hidden>
                        <h3>Actuar</h3>
                        <p>Transformar la fe en obras de amor y justicia.</p>
                        <ul>
                            <li>Moviliza <em>hacer</em> y <em>convivir</em>.</li>
                            <li>Se concreta en el <strong>grado de servicio personal</strong>.</li>
                        </ul>
                    </section>

                    <section id="tab-celebrar" class="tabs__panel" role="region" hidden>
                        <h3>Celebrar</h3>
                        <p>Alegría, identidad y vida espiritual compartida.</p>
                        <ul>
                            <li>Integra todos los desempeños.</li>
                            <li>Cuida la vida desde la <strong>prevención personal</strong>.</li>
                        </ul>
                    </section>
                </div>

                <!-- Columna derecha (aside dinámico) -->
                <aside class="mision-aside" aria-live="polite">
                    <div class="mision-aside__bg" data-aside-bg></div>
                    <div class="mision-aside__glass">
                        <span class="mision-aside__k" data-aside-k>Ver</span>
                        <h3 class="mision-aside__title" data-aside-title>Mirada crítica y esperanzadora</h3>
                        <p class="mision-aside__desc" data-aside-desc>
                            Observamos la realidad con serenidad, buscando la verdad que humaniza.
                        </p>
                    </div>
                </aside>
            </div>

            <!-- Leer más -->
            <details class="readmore" data-reveal="up" data-reveal-delay="250">
                <summary class="readmore--accent btn--burgundy btn--shine">Leer más</summary>
                <div class="readmore__content">
                    <p>
                        La formación integral se concreta en procesos que ordenan el tiempo, fortalecen la perseverancia
                        y dan sentido al saber. La <strong>acción</strong> vuelve servicio los talentos; el <strong>sentir</strong>
                        cultiva empatía y cuidado interior; el <strong>ser</strong> afirma la identidad cristiana y franciscana;
                        y la <strong>convivencia</strong> construye fraternidad, respeto y paz.
                    </p>
                    <p>
                        Los niveles educativos —Inicial y Parvularia, Primer y Segundo Ciclo, Tercer Ciclo y Educación Media—
                        garantizan continuidad y crecimiento de competencias, con programas de <em>idiomas, tecnología, arte,
                            deporte, formación humana y pastoral</em>, siempre en clave de <strong>disciplina</strong>,
                        <strong>tarjeta</strong>, <strong>servicio</strong> y <strong>prevención</strong>.
                    </p>
                </div>

                <div class="mision-masonry" data-gallery="main">
                    <a class="mision-masonry__item" href="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-escenario2.jpeg'); ?>">
                        <img loading="lazy" decoding="async"
                            src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-escenario2.jpeg'); ?>" alt="Actividad desde escenario">
                    </a>
                    <a class="mision-masonry__item" href="<?= asset('assets/pastoralEducativa/celebraciones/san-francisco-tercer-ciclo.jpeg'); ?>">
                        <img loading="lazy" decoding="async"
                            src="<?= asset('assets/pastoralEducativa/celebraciones/san-francisco-tercer-ciclo.jpeg'); ?>" alt="Celebración San Francisco Tercer Ciclo">
                    </a>
                    <a class="mision-masonry__item" href="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-gradas-derecha.jpeg'); ?>">
                        <img loading="lazy" decoding="async"
                            src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-gradas-derecha.jpeg'); ?>" alt="Vista desde gradas">
                    </a>
                    <a class="mision-masonry__item" href="<?= asset('assets/pastoralEducativa/todos-docentes.jpeg'); ?>">
                        <img loading="lazy" decoding="async"
                            src="<?= asset('assets/ofertaAcademica/varios/todos-docentes.jpeg'); ?>" alt="Equipo docente CECNSR">
                    </a>
                </div>
            </details>

        </div>
    </section>

    <!-- ===== Desempeños: rail + panel ===== -->
    <section id="desempenos" class="band band--desempenos-rail" aria-labelledby="desempenos-title">
        <div class="band__inner rail">
            <div class="rail__col-left" data-reveal="up">
                <h2 id="desempenos-title" class="section-title">Desempeños que animan nuestra formación</h2>

                <ul class="rail__track" id="railTrack" role="tablist" aria-label="Desempeños (desliza)">
                    <li class="rail__item is-active" data-k="aprender" role="tab" aria-selected="true" tabindex="0">
                        <span class="rail__num">1</span>
                        <span class="rail__t">Aprender a Aprender</span>
                        <div class="container-dis"><span class="rail__tag">Disciplina personal</span></div>
                    </li>
                    <li class="rail__item" data-k="conocer" role="tab" aria-selected="false" tabindex="-1">
                        <span class="rail__num">2</span>
                        <span class="rail__t">Aprender a Conocer</span>
                        <div class="container-dis"><span class="rail__tag">Tarjeta de presentación</span></div>
                    </li>
                    <li class="rail__item" data-k="hacer" role="tab" aria-selected="false" tabindex="-1">
                        <span class="rail__num">3</span>
                        <span class="rail__t">Aprender a Hacer</span>
                        <div class="container-dis"><span class="rail__tag">Servicio personal</span></div>
                    </li>
                    <li class="rail__item" data-k="sentir" role="tab" aria-selected="false" tabindex="-1">
                        <span class="rail__num">4</span>
                        <span class="rail__t">Aprender a Sentir</span>
                        <div class="container-dis"><span class="rail__tag">Prevención personal</span></div>
                    </li>
                    <li class="rail__item" data-k="ser" role="tab" aria-selected="false" tabindex="-1">
                        <span class="rail__num">5</span>
                        <span class="rail__t">Aprender a Ser</span>
                        <div class="container-dis"><span class="rail__tag">Disciplina + Tarjeta</span></div>
                    </li>
                    <li class="rail__item" data-k="convivir" role="tab" aria-selected="false" tabindex="-1">
                        <span class="rail__num">6</span>
                        <span class="rail__t">Aprender a Convivir</span>
                        <div class="container-dis"><span class="rail__tag">Servicio + Prevención</span></div>
                    </li>
                    <li class="rail__item" data-k="integrar" role="tab" aria-selected="false" tabindex="-1">
                        <span class="rail__num">7</span>
                        <span class="rail__t">Integrar Fe, Cultura y Vida</span>
                        <div class="container-dis"><span class="rail__tag">Eje transversal</span></div>
                    </li>
                </ul>
            </div>

            <aside class="rail__col-right" data-reveal="up" data-reveal-delay="100">
                <div id="railDetail" class="rail-detail" aria-live="polite"></div>
            </aside>
        </div>
    </section>

    <!-- ===== Diagramas institucionales ===== -->
    <section class="band band--diagramas" aria-labelledby="diagramas-title">
        <div class="band__inner">
            <h2 id="diagramas-title" class="section-title" data-reveal="up">Diagramas institucionales</h2>

            <div class="diag-grid" data-gallery="main">
                <figure class="diag" data-reveal="up" data-reveal-delay="100">
                    <a class="diag__link" href="<?= asset('assets/pastoralEducativa/principios-educativos.jpeg'); ?>">
                        <img loading="lazy" decoding="async"
                            src="<?= asset('assets/pastoralEducativa/principios-educativos.jpeg'); ?>" alt="Principios educativos">
                    </a>
                    <figcaption>Principios educativos</figcaption>
                </figure>

                <figure class="diag" data-reveal="up" data-reveal-delay="150">
                    <a class="diag__link" href="<?= asset('assets/pastoralEducativa/valores-que-guian-la-labor-educativa.jpeg'); ?>">
                        <img loading="lazy" decoding="async"
                            src="<?= asset('assets/pastoralEducativa/valores-que-guian-la-labor-educativa.jpeg'); ?>" alt="Valores que guían la labor educativa">
                    </a>
                    <figcaption>Valores</figcaption>
                </figure>

                <figure class="diag" data-reveal="up" data-reveal-delay="200">
                    <a class="diag__link" href="<?= asset('assets/pastoralEducativa/competencias-habilidades-del-siglo-xxi.jpeg'); ?>">
                        <img loading="lazy" decoding="async"
                            src="<?= asset('assets/pastoralEducativa/competencias-habilidades-del-siglo-xxi.jpeg'); ?>" alt="Competencias y habilidades del siglo XXI">
                    </a>
                    <figcaption>Competencias XXI</figcaption>
                </figure>

                <figure class="diag" data-reveal="up" data-reveal-delay="250">
                    <a class="diag__link" href="<?= asset('assets/pastoralEducativa/modelo-educativo.jpeg'); ?>">
                        <img loading="lazy" decoding="async"
                            src="<?= asset('assets/pastoralEducativa/modelo-educativo.jpeg'); ?>" alt="Modelo educativo institucional">
                    </a>
                    <figcaption>Modelo educativo</figcaption>
                </figure>
            </div>
        </div>
    </section>

    <!-- ===== Oferta: timeline + rotador ===== -->
    <section class="band band--oferta-timeline" aria-labelledby="oferta-title">
        <div class="band__inner">
            <h2 id="oferta-title" class="section-title" data-reveal="up">Oferta académica con identidad pastoral</h2>

            <ol class="timeline" data-oferta>
                <!-- 1. Inicial & Parvularia -->
                <li class="timeline__item is-open" data-reveal="up" data-reveal-delay="50">
                    <button class="timeline__head" type="button">Educación Inicial y Parvularia</button>
                    <div class="timeline__body">
                        <div class="oferta">
                            <div class="oferta__media">
                                <div class="rotator" data-interval="3800">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/ofertaAcademica/parv/cancha-parvularia-nivel.jpeg'); ?>" alt="">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/ofertaAcademica/parv/est-parv-prof_Dina.jpeg'); ?>" alt="">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/ofertaAcademica/parv/parv-salon-p4a.jpeg'); ?>" alt="">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/ofertaAcademica/parv/parv-liliana-p425.jpeg'); ?>" alt="">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/ofertaAcademica/parv/parv-cancha-nivel2.jpeg'); ?>" alt="">
                                </div>
                            </div>
                            <div class="oferta__text">
                                <p>Desarrollo de habilidades básicas, socialización y descubrimiento del entorno desde el juego, la creatividad y la fe.</p>
                                <ul class="bullet">
                                    <li>Psicomotricidad, lenguaje y pensamiento lógico.</li>
                                    <li>Rutinas y hábitos con sentido de autocuido.</li>
                                    <li>Ambientes lúdicos y celebrativos.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>


                <!-- 2. Primer Ciclo (1.º a 3.º) -->
                <li class="timeline__item" data-reveal="up" data-reveal-delay="120">
                    <button class="timeline__head" type="button">Primer Ciclo</button>
                    <div class="timeline__body">
                        <div class="oferta">
                            <div class="oferta__media">
                                <div class="rotator" data-interval="3800">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/ofertaAcademica/primerCiclo/primer-ciclo-primer-grado.jpeg'); ?>" alt="">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/ofertaAcademica/primerCiclo/est-3er-grado-madre-iris.jpeg'); ?>" alt="">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/ofertaAcademica/primerCiclo/2-2do-visit-mineducyt.jpeg'); ?>" alt="">
                                </div>

                            </div>
                            <div class="oferta__text">
                                <p>Consolidación de la lectoescritura, pensamiento lógico y hábitos de estudio con acompañamiento cercano.</p>
                                <ul class="bullet">
                                    <li>Lenguaje, Matemática, Ciencias y Arte como base.</li>
                                    <li>Rutinas de trabajo y autonomía progresiva.</li>
                                    <li>Proyecto de aula con enfoque pastoral.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- 3. Segundo Ciclo (4.º a 6.º) -->
                <li class="timeline__item" data-reveal="up" data-reveal-delay="160">
                    <button class="timeline__head" type="button">Segundo Ciclo</button>
                    <div class="timeline__body">
                        <div class="oferta">
                            <div class="oferta__media">
                                <div class="rotator" data-interval="3800">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/ofertaAcademica/segundoCiclo/ii-ciclo-sexto-grado.jpeg'); ?>" alt="">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/ofertaAcademica/segundoCiclo/ii-ciclo-sexto-grado2.jpeg'); ?>" alt="">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/ofertaAcademica/segundoCiclo/cuarto-grado-visita-inge-Katia.jpeg'); ?>" alt="">
                                </div>
                            </div>
                            <div class="oferta__text">
                                <p>Profundización de contenidos, trabajo colaborativo y disciplina personal con vivencia de valores.</p>
                                <ul class="bullet">
                                    <li>Comprensión lectora, resolución de problemas y expresión creativa.</li>
                                    <li>Proyectos integrados y uso responsable de tecnología.</li>
                                    <li>Acciones pastorales y ciudadanía responsable.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>


                <!-- 3. Tercer Ciclo -->
                <li class="timeline__item" data-reveal="up" data-reveal-delay="200">
                    <button class="timeline__head" type="button">Tercer Ciclo</button>
                    <div class="timeline__body">
                        <div class="oferta">
                            <div class="oferta__media">
                                <div class="rotator" data-interval="3800">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/ofertaAcademica/tercerCiclo/iiic3.jpeg'); ?>" alt="">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/ofertaAcademica/tercerCiclo/iiic1.jpeg'); ?>" alt="">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/ofertaAcademica/tercerCiclo/iiic10.jpeg'); ?>" alt="">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/ofertaAcademica/tercerCiclo/iii-ciclo-trabajo-grupal2.jpeg'); ?>" alt="">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/ofertaAcademica/tercerCiclo/retiro-tercer-ciclo.jpeg'); ?>" alt="">
                                </div>
                            </div>
                            <div class="oferta__text">
                                <p>Pensamiento crítico, analítico e investigativo; cuatro puntos esenciales y construcción de identidad.</p>
                                <ul class="bullet">
                                    <li>Proyectos STEAM y servicio a la comunidad.</li>
                                    <li>Hábitos de estudio y metacognición.</li>
                                    <li>Convivencia fraterna y liderazgo.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- 4. Educación Media -->
                <li class="timeline__item" data-reveal="up" data-reveal-delay="250">
                    <button class="timeline__head" type="button">Educación Media</button>
                    <div class="timeline__body">
                        <div class="oferta">
                            <div class="oferta__media">
                                <div class="rotator" data-interval="4200">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/pastoralEducativa/docentes-trabajo-cola.jpeg'); ?>" alt="">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-gradas-derecha.jpeg'); ?>" alt="">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/pastoralEducativa/coro-institucional-cecnsr-iglesia-san-marcos.jpeg'); ?>" alt="">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-escenario2.jpeg'); ?>" alt="">
                                    <img loading="lazy" decoding="async" src="<?= asset('assets/pastoralEducativa/celebraciones/san-francisco-tercer-ciclo.jpeg'); ?>" alt="">
                                </div>
                            </div>
                            <div class="oferta__text">
                                <p>Formación académica sólida y técnica; orientación vocacional para educación superior, mundo laboral y vida social.</p>
                                <ul class="bullet">
                                    <li>Itinerarios, ferias y pasantías.</li>
                                    <li>Proyecto de vida y ciudadanía responsable.</li>
                                    <li>Servicio y cuidado de la Casa Común.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ol>
        </div>
    </section>

    <!-- ===== Comunidad ===== -->
    <section id="galeria" class="band band--gallery-masonry pastoral" aria-labelledby="gal-title">
        <div class="band__inner">
            <h2 id="gal-title" class="section-title">Comunidad en acción</h2>

            <div class="masonry" data-gallery="main">
                <!-- Item 1 -->
                <a class="masonry__item"
                    href="<?= asset('assets/pastoralEducativa/comunidad-en-accion/c-accion-ii-ciclo3.jpg'); ?>">
                    <img loading="lazy" decoding="async"
                        src="<?= asset('assets/pastoralEducativa/comunidad-en-accion/c-accion-ii-ciclo3.jpg'); ?>"
                        alt="Procesión con acólitos y estudiantes">
                    <span class="masonry__cap">Feria de Innovación 2025 — ECA</span>
                </a>

                <!-- Item 2 -->
                <a class="masonry__item"
                    href="<?= asset('assets/pastoralEducativa/comunidad-en-accion/c-accion-edu-fe2.jpg'); ?>">
                    <img loading="lazy" decoding="async"
                        src="<?= asset('assets/pastoralEducativa/comunidad-en-accion/c-accion-edu-fe2.jpg'); ?>"
                        alt="Equipo docente CECNSR">
                    <span class="masonry__cap">Educación en la fe — Los Mandamientos</span>
                </a>

                <!-- Item 3 -->
                <a class="masonry__item"
                    href="<?= asset('assets/pastoralEducativa/comunidad-en-accion/c-accion-ii-ciclo4.jpg'); ?>">
                    <img loading="lazy" decoding="async"
                        src="<?= asset('assets/pastoralEducativa/comunidad-en-accion/c-accion-ii-ciclo4.jpg'); ?>"
                        alt="Coro institucional en el templo">
                    <span class="masonry__cap">II ciclo — Reacciones químicas</span>
                </a>

                <!-- Item 4 -->
                <a class="masonry__item"
                    href="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-escenario2.jpeg'); ?>">
                    <img loading="lazy" decoding="async"
                        src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-escenario2.jpeg'); ?>"
                        alt="Docentes en jornada de formación">
                    <span class="masonry__cap">Evento Mariano</span>
                </a>
                <a class="masonry__item"
                    href="<?= asset('assets/pastoralEducativa/comunidad-en-accion/c-accion-eca-cancha.jpg'); ?>">
                    <img loading="lazy" decoding="async"
                        src="<?= asset('assets/pastoralEducativa/comunidad-en-accion/c-accion-eca-cancha.jpg'); ?>"
                        alt="Docentes en jornada de formación">
                    <span class="masonry__cap">Fería de Innovación - Proyecto Electrónica</span>
                </a>
                <a class="masonry__item"
                    href="<?= asset('assets/pastoralEducativa/comunidad-en-accion/c-accion-i-ciclo4.jpg'); ?>">
                    <img loading="lazy" decoding="async"
                        src="<?= asset('assets/pastoralEducativa/comunidad-en-accion/c-accion-i-ciclo4.jpg'); ?>"
                        alt="Docentes en jornada de formación">
                    <span class="masonry__cap">Estudiante de I ciclo - Entendiendo el Tiempo y el Clima</span>
                </a>
                <a class="masonry__item"
                    href="<?= asset('assets/pastoralEducativa/comunidad-en-accion/c-accion-i-ciclo5.jpg'); ?>">
                    <img loading="lazy" decoding="async"
                        src="<?= asset('assets/pastoralEducativa/comunidad-en-accion/c-accion-i-ciclo5.jpg'); ?>"
                        alt="Docentes en jornada de formación">
                    <span class="masonry__cap">Estudiantes de I ciclo - Ruleta Matemática</span>
                </a>
                <a class="masonry__item"
                    href="<?= asset('assets/pastoralEducativa/comunidad-en-accion/c-accion-robótica-cancha.jpg'); ?>">
                    <img loading="lazy" decoding="async"
                        src="<?= asset('assets/pastoralEducativa/comunidad-en-accion/c-accion-robótica-cancha.jpg'); ?>"
                        alt="Docentes en jornada de formación">
                    <span class="masonry__cap">Estudiantes de I ciclo - Proyecto de Robótica</span>
                </a>
                <a class="masonry__item"
                    href="<?= asset('assets/pastoralEducativa/comunidad-en-accion/c-accion-cancha-ii-ciclo-robotica.jpg'); ?>">
                    <img loading="lazy" decoding="async"
                        src="<?= asset('assets/pastoralEducativa/comunidad-en-accion/c-accion-cancha-ii-ciclo-robotica.jpg'); ?>"
                        alt="Docentes en jornada de formación">
                    <span class="masonry__cap">Estudiantes de I ciclo - Proyecto de Robótica</span>
                </a>
            </div>
        </div>
    </section>




    <div id="lightbox" class="lightbox" aria-hidden="true" hidden>
        <button class="lightbox__close" aria-label="Cerrar">×</button>
        <img class="lightbox__img" alt="">
        <button class="lightbox__nav lightbox__nav--prev" aria-label="Anterior">‹</button>
        <button class="lightbox__nav lightbox__nav--next" aria-label="Siguiente">›</button>
    </div>


    <!-- ===== Himno ===== -->
    <section class="band band--himno-soft" aria-labelledby="himno-title">
        <div class="band__inner">
            <h2 id="himno-title" class="section-title">Himno de la Pastoral Educativa</h2>

            <div class="video-card" data-reveal="up" data-reveal-delay="100">
                <div class="video-embed is-loading">
                    <iframe
                        src="https://www.youtube.com/embed/VPTBebPfrsw?rel=0"
                        title="HFIC - Himno de la Pastoral Educativa"
                        loading="lazy"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allowfullscreen></iframe>
                </div>
                <p class="video-caption">Himno oficial — HFIC / Pastoral Educativa</p>
            </div>
            <details class="readmore" data-reveal="up" data-reveal-delay="150">
                <summary>Ver letra del himno</summary>

                <div class="readmore__content hymn">
                    <h3 class="hymn__title">HIMNO DE LA PASTORAL EDUCATIVA HFIC</h3>

                    <!-- CORO (inicial) -->
                    <section class="hymn__chorus" aria-label="Coro">
                        <h4>CORO</h4>
                        <p>
                            Educación para crecer,<br>
                            Valores que desarrollar,<br>
                            Francisco inspirar con su Paz y Bien,<br>
                            La forma alegre de estudiar.
                        </p>
                        <p>
                            Colegios en fraternidad,<br>
                            pioneros de un mundo mejor,<br>
                            la santidad será nuestro ideal,<br>
                            forjamos el reino de amor.
                        </p>
                    </section>

                    <!-- Estrofa I -->
                    <section class="hymn__section" aria-label="Estrofa I">
                        <h4>Estrofa I</h4>
                        <p>
                            Ir reparando sin cesar,<br>
                            la viña del Señor,<br>
                            el amor nos moverá,<br>
                            en nuestra gran misión.
                        </p>
                    </section>

                    <!-- CORO -->
                    <section class="hymn__chorus" aria-label="Coro">
                        <h4>CORO</h4>
                        <p>
                            Educación para crecer,<br>
                            Valores que desarrollar,<br>
                            Francisco inspirar con su Paz y Bien,<br>
                            La forma alegre de estudiar.
                        </p>
                        <p>
                            Colegios en fraternidad,<br>
                            pioneros de un mundo mejor,<br>
                            la santidad será nuestro ideal,<br>
                            forjamos el reino de amor.
                        </p>
                    </section>

                    <!-- Estrofa II -->
                    <section class="hymn__section" aria-label="Estrofa II">
                        <h4>Estrofa II</h4>
                        <p>
                            Un mundo entero que cuidar,<br>
                            en armonía interior,<br>
                            todos en fraternidad,<br>
                            un solo corazón.
                        </p>
                    </section>

                    <!-- CORO -->
                    <section class="hymn__chorus" aria-label="Coro">
                        <h4>CORO</h4>
                        <p>
                            Educación para crecer,<br>
                            Valores que desarrollar,<br>
                            Francisco inspirar con su Paz y Bien,<br>
                            La forma alegre de estudiar.
                        </p>
                        <p>
                            Colegios en fraternidad,<br>
                            pioneros de un mundo mejor,<br>
                            la santidad será nuestro ideal,<br>
                            forjamos el reino de amor.
                        </p>
                    </section>

                    <!-- Estrofa III (Cierre) -->
                    <section class="hymn__section" aria-label="Estrofa III">
                        <h4>Estrofa III</h4>
                        <p>
                            Que todo hombre busque el bien,<br>
                            con plena libertad,<br>
                            el compromiso es formar,<br>
                            la nueva humanidad.
                        </p>
                    </section>

                    <footer class="hymn__footer">
                        <p class="credits">
                            <strong>Autor letra y música:</strong> César Miranda Barragán<br>
                            <strong>Pastoral Educativa HFIC</strong>
                        </p>
                    </footer>
                </div>
            </details>


        </div>
    </section>



    <section class="band band--logos-strip" aria-labelledby="logos-title">
        <div class="band__inner">
            <h2 id="logos-title" class="section-title" data-reveal="up">Identidad visual</h2>
            <div class="logos-strip" data-reveal="up" data-reveal-delay="100">
                <img loading="lazy" decoding="async" src="<?= asset('assets/brand/cecnsr-logo.png'); ?>" alt="Escudo CECNSR">
                <img loading="lazy" decoding="async" src="<?= asset('assets/brand/hfic-logo.png'); ?>" alt="Logo HFIC">
                <img loading="lazy" decoding="async" src="<?= asset('assets/brand/pasch.png'); ?>" alt="Programa PASCH">
            </div>
        </div>
    </section>
</main>

<!-- (Opcional, una sola vez por sitio) Lightbox root -->
<div id="lightbox" class="lightbox" aria-hidden="true" hidden>
    <button class="lightbox__close" aria-label="Cerrar">×</button>
    <button class="lightbox__nav lightbox__nav--prev" aria-label="Anterior">‹</button>
    <img class="lightbox__img" alt="">
    <button class="lightbox__nav lightbox__nav--next" aria-label="Siguiente">›</button>
</div>

<!-- Enlaces a assets externos -->
<link rel="stylesheet" href="<?= asset('assets/partials/p-edu/pastoral.css'); ?>">
<script>
    document.documentElement.classList.add('js');
</script>
<script defer src="<?= asset('assets/partials/p-edu/pastoral.js'); ?>"></script>

<!-- pon esto una vez, lo más arriba posible (en <head> es ideal) -->
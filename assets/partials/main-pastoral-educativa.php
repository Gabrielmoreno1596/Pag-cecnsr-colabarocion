<!-- ===================== MAIN: Pastoral Educativa (CECNSR) ===================== -->
<main id="main-content" class="pastoral" role="main">

    <!-- ===== HERO (slideshow con overlay, badge y CTA) ===== -->
    <section class="hero " aria-label="Pastoral Educativa CECNSR">
        <!-- Slides -->
        <div class="hero-slideshow" aria-hidden="true">
            <figure class="hero-slide active">
                <img
                    src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-dramatizacion2.jpeg'); ?>"
                    alt="Estudiantes trabajando en aula"
                    loading="eager" decoding="async" />
            </figure>

            <figure class="hero-slide">
                <img
                    src="<?= asset('assets/pastoralEducativa/celebraciones/san-francisco-edu-inicial-parvularia.jpeg'); ?>"
                    alt="Celebración San Francisco en Educación Inicial y Parvularia"
                    loading="lazy" decoding="async" />
            </figure>

            <figure class="hero-slide">
                <img
                    src="<?= asset('assets/pastoralEducativa/celebraciones/san-francisco-tercer-ciclo.jpeg'); ?>"
                    alt="Celebración San Francisco en Tercer Ciclo"
                    loading="lazy" decoding="async" />
            </figure>

            <figure class="hero-slide">
                <img
                    src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-escenario2.jpeg'); ?>"
                    alt="Actividad pastoral en la cancha del centro educativo"
                    loading="lazy" decoding="async" />
            </figure>
        </div>

        <!-- Barra de progreso -->
        <div class="hero__progress" id="heroProgress" aria-hidden="true"></div>

        <!-- Contenido -->
        <div class="container">
            <!-- Badge / logotipo vidrio -->
            <div class="hero__badge ">
                <div class="hero__badge-logo">
                    <img class="hero__badge-logo " src="<?= asset('assets/pastoralEducativa/celebraciones/pe-logo.png'); ?>" alt="">
                </div>
                <div class="hero__badge-text ">
                    <div>PASTORAL</div>
                    <div>EDUCATIVA</div>
                    <div>CECNSR</div>
                </div>
            </div>

            <div class="hero__content">
                <span class="eyebrow eyebrow--accent fx-sheen">Formación integral con valores cristianos</span>
                <h1 class="hero__title ">Formar para construir un mundo fraterno</h1>
                <p class="hero__subtitle">
                    Evangelizamos desde la <strong>Pedagogía de Jesús</strong>, el carisma HFIC y nuestro
                    <strong>Modelo Educativo</strong> para una educación que transforma vidas.
                </p>

                <div class="hero__actions">
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


    <!-- ===== Hero con slideshow ===== -->


    <!-- ===== Misión ===== -->
    <section class="band band--mision-flat" aria-labelledby="mision-title">
        <div class="band__inner">
            <h2 id="mision-title" class="section-title">Misión de la Pastoral Educativa</h2>

            <p class="mision-lead">
                El <strong>Complejo Educativo Católico Nuestra Señora del Rosario</strong>, fiel a su misión evangelizadora y
                <strong>desde la Pedagogía de Jesús</strong>, carisma y filosofía HFIC, promueve una
                <strong>educación integral</strong> según el Modelo Educativo institucional para el
                <em>desarrollo armónico de la persona en todas sus dimensiones</em>.
            </p>

            <ul class="meta-pills" role="list">
                <li class="pill btn btn--gold btn--shine "><a href="#desempenos"></a>Integrar <strong>fe, cultura y vida</strong> </li>
                <li class="pill btn--burgundy btn--shine">Seis desempeños: <strong>aprender, conocer, hacer, sentir, ser, convivir</strong></li>
                <li class="pill btn--burgundy btn--shine">Cuatro puntos: <strong>disciplina, tarjeta, servicio, prevención</strong></li>
            </ul>

            <!-- ===== Layout misión: contenido + aside ===== -->
            <div class="mision-layout" data-tabs="vjac">
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
            <details class="readmore ">
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
                    <a class="mision-masonry__item" href="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-escenario2.jpegg'); ?>">
                        <img src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-escenario2.jpeg'); ?>" alt="">
                    </a>
                    <a class="mision-masonry__item" href="<?= asset('assets/pastoralEducativa/celebraciones/san-francisco-tercer-ciclo.jpeg'); ?>">
                        <img src="<?= asset('assets/pastoralEducativa/celebraciones/san-francisco-tercer-ciclo.jpeg'); ?>" alt="">
                    </a>
                    <a class="mision-masonry__item" href="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-gradas-derecha.jpeg'); ?>">
                        <img src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-gradas-derecha.jpeg'); ?>" alt="">
                    </a>
                    <a class="mision-masonry__item" href="<?= asset('assets/pastoralEducativa/todos-docentes.jpeg'); ?>">
                        <img src="<?= asset('assets\ofertaAcademica\varios/todos-docentes.jpeg'); ?>" alt="">
                    </a>
                </div>
            </details>

            <!-- Mini galería (puedes dejarla tal cual) -->

        </div>
    </section>




    <!-- ===== Desempeños: rail + panel ===== -->
    <section id="desempenos" class="band band--desempenos-rail" aria-labelledby="desempenos-title">
        <div class="band__inner rail">
            <div class="rail__col-left">
                <h2 id="desempenos-title" class="section-title">Desempeños que animan nuestra formación</h2>

                <ul class="rail__track" id="railTrack" role="tablist" aria-label="Desempeños (desliza)">
                    <li class="rail__item is-active" data-k="aprender" role="tab" aria-selected="true">
                        <span class="rail__num">1</span>
                        <span class="rail__t">Aprender a Aprender</span>
                        <div class="container-dis"><span class="rail__tag">Disciplina personal</span></div>
                    </li>
                    <li class="rail__item" data-k="conocer" role="tab" aria-selected="false">
                        <span class="rail__num">2</span>
                        <span class="rail__t">Aprender a Conocer</span>
                        <div class="container-dis"><span class="rail__tag">Tarjeta de presentación</span></div>
                    </li>
                    <li class="rail__item" data-k="hacer" role="tab" aria-selected="false">
                        <span class="rail__num">3</span>
                        <span class="rail__t">Aprender a Hacer</span>
                        <div class="container-dis"><span class="rail__tag">Servicio personal</span></div>
                    </li>
                    <li class="rail__item" data-k="sentir" role="tab" aria-selected="false">
                        <span class="rail__num">4</span>
                        <span class="rail__t">Aprender a Sentir</span>
                        <div class="container-dis"><span class="rail__tag">Prevención personal</span></div>
                    </li>
                    <li class="rail__item" data-k="ser" role="tab" aria-selected="false">
                        <span class="rail__num">5</span>
                        <span class="rail__t">Aprender a Ser</span>
                        <div class="container-dis"><span class="rail__tag">Disciplina + Tarjeta</span></div>
                    </li>
                    <li class="rail__item" data-k="convivir" role="tab" aria-selected="false">
                        <span class="rail__num">6</span>
                        <span class="rail__t">Aprender a Convivir</span>
                        <div class="container-dis"><span class="rail__tag">Servicio + Prevención</span></div>
                    </li>
                    <li class="rail__item" data-k="integrar" role="tab" aria-selected="false">
                        <span class="rail__num">7</span>
                        <span class="rail__t">Integrar Fe, Cultura y Vida</span>
                        <div class="container-dis"><span class="rail__tag">Eje transversal</span></div>
                    </li>
                </ul>


            </div>

            <aside class="rail__col-right">
                <div id="railDetail" class="rail-detail" aria-live="polite"></div>
            </aside>
        </div>
    </section>

    <!-- Diagramas  -->

    <!-- ===== Diagramas institucionales ===== -->
    <section class="band band--diagramas" aria-labelledby="diagramas-title">
        <div class="band__inner">
            <h2 id="diagramas-title" class="section-title">Diagramas institucionales</h2>

            <div class="diag-grid" data-gallery="main">
                <figure class="diag">
                    <a class="diag__link" href="<?= asset('assets/pastoralEducativa/principios-educativos.jpeg'); ?>">
                        <img loading="lazy" src="<?= asset('assets/pastoralEducativa/principios-educativos.jpeg'); ?>" alt="Principios educativos">
                    </a>
                    <figcaption>Principios educativos</figcaption>
                </figure>

                <figure class="diag">
                    <a class="diag__link" href="<?= asset('assets/pastoralEducativa/valores-que-guian-la-labor-educativa.jpeg'); ?>">
                        <img loading="lazy" src="<?= asset('assets/pastoralEducativa/valores-que-guian-la-labor-educativa.jpeg'); ?>" alt="Valores que guían la labor educativa">
                    </a>
                    <figcaption>Valores</figcaption>
                </figure>

                <figure class="diag">
                    <a class="diag__link" href="<?= asset('assets/pastoralEducativa/competencias-habilidades-del-siglo-xxi.jpeg'); ?>">
                        <img loading="lazy" src="<?= asset('assets/pastoralEducativa/competencias-habilidades-del-siglo-xxi.jpeg'); ?>" alt="Competencias y habilidades del siglo XXI">
                    </a>
                    <figcaption>Competencias XXI</figcaption>
                </figure>

                <figure class="diag">
                    <a class="diag__link" href="<?= asset('assets/pastoralEducativa/modelo-educativo.jpeg'); ?>">
                        <img loading="lazy" src="<?= asset('assets/pastoralEducativa/modelo-educativo.jpeg'); ?>" alt="Modelo educativo institucional">
                    </a>
                    <figcaption>Modelo educativo</figcaption>
                </figure>
            </div>
        </div>
    </section>



    <!-- ===== Oferta: timeline + rotador ===== -->
    <section class="band band--oferta-timeline" aria-labelledby="oferta-title">
        <div class="band__inner">
            <h2 id="oferta-title" class="section-title">Oferta académica con identidad pastoral</h2>

            <ol class="timeline" data-oferta>
                <!-- 1. Inicial & Parvularia -->
                <li class="timeline__item is-open">
                    <button class="timeline__head" type="button">Educación Inicial y Parvularia</button>
                    <div class="timeline__body">
                        <div class="oferta">
                            <div class="oferta__media">
                                <div class="rotator" data-interval="3800">
                                    <img src="<?= asset('assets/pastoralEducativa/celebraciones/san-francisco-edu-inicial-parvularia.jpeg'); ?>" alt="">
                                    <img src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-escenario2.jpeg'); ?>" alt="">
                                    <img src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-dramatizacion2.jpeg'); ?>" alt="">
                                    <img src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-gradas-derecha.jpeg'); ?>" alt="">
                                    <img src="<?= asset('assets/pastoralEducativa/procesion-coro-acolitos.jpeg'); ?>" alt="">
                                </div>
                            </div>
                            <div class="oferta__text">
                                <p>Desarrollo de habilidades básicas, socialización y descubrimiento del entorno desde el juego, la creatividad y la fe.</p>
                                <ul class="bullet">
                                    <li>Psicomotricidad, lenguaje y pensamiento lógico.</li>
                                    <li>Rutinas y hábitos con sentido de autocuidado.</li>
                                    <li>Ambientes lúdicos y celebrativos.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- 2. Primer y Segundo Ciclo -->
                <li class="timeline__item">
                    <button class="timeline__head" type="button">Primer y Segundo Ciclo</button>
                    <div class="timeline__body">
                        <div class="oferta">
                            <div class="oferta__media">
                                <div class="rotator" data-interval="4000">
                                    <img src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-dramatizacion2.jpeg'); ?>" alt="">
                                    <img src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-gradas-derecha.jpeg'); ?>" alt="">
                                    <img src="<?= asset('assets/pastoralEducativa/todos-docentes.jpeg'); ?>" alt="">
                                    <img src="<?= asset('assets/pastoralEducativa/coro-institucional-cecnsr-iglesia-san-marcos.jpeg'); ?>" alt="">
                                    <img src="<?= asset('assets/pastoralEducativa/docentes-trabajo-cola.jpeg'); ?>" alt="">
                                </div>
                            </div>
                            <div class="oferta__text">
                                <p>Conocimientos fundamentales, hábitos de estudio y vivencia de principios y valores.</p>
                                <ul class="bullet">
                                    <li>Lectoescritura, matemática, ciencias y arte.</li>
                                    <li>Trabajo colaborativo y disciplina personal.</li>
                                    <li>Proyecto de aula con enfoque pastoral.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- 3. Tercer Ciclo -->
                <li class="timeline__item">
                    <button class="timeline__head" type="button">Tercer Ciclo</button>
                    <div class="timeline__body">
                        <div class="oferta">
                            <div class="oferta__media">
                                <div class="rotator" data-interval="3800">
                                    <img src="<?= asset('assets/pastoralEducativa/celebraciones/san-francisco-tercer-ciclo.jpeg'); ?>" alt="">
                                    <img src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-escenario2.jpeg'); ?>" alt="">
                                    <img src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-dramatizacion2.jpeg'); ?>" alt="">
                                    <img src="<?= asset('assets/pastoralEducativa/procesion-coro-acolitos.jpeg'); ?>" alt="">
                                    <img src="<?= asset('assets/pastoralEducativa/todos-docentes.jpeg'); ?>" alt="">
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
                <li class="timeline__item">
                    <button class="timeline__head" type="button">Educación Media</button>
                    <div class="timeline__body">
                        <div class="oferta">
                            <div class="oferta__media">
                                <div class="rotator" data-interval="4200">
                                    <img src="<?= asset('assets/pastoralEducativa/docentes-trabajo-cola.jpeg'); ?>" alt="">
                                    <img src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-gradas-derecha.jpeg'); ?>" alt="">
                                    <img src="<?= asset('assets/pastoralEducativa/coro-institucional-cecnsr-iglesia-san-marcos.jpeg'); ?>" alt="">
                                    <img src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-escenario2.jpeg'); ?>" alt="">
                                    <img src="<?= asset('assets/pastoralEducativa/celebraciones/san-francisco-tercer-ciclo.jpeg'); ?>" alt="">
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
    <section class="band band--gallery-masonry" aria-labelledby="gal-title">
        <div class="band__inner">
            <h2 id="gal-title" class="section-title">Comunidad en acción</h2>

            <div class="masonry" data-gallery="main">
                <a class="masonry__item" href="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-escenario2.jpeg'); ?>">
                    <img src="<?= asset('assets/pastoralEducativa/celebraciones/cancha-desde-escenario2.jpeg'); ?>" alt="Procesión con acólitos y estudiantes">
                    <span class="masonry__cap">Procesión y participación</span>
                </a>
                <a class="masonry__item" href="<?= asset('assets/pastoralEducativa/todos-docentes.jpeg'); ?>">
                    <img src="<?= asset('assets/pastoralEducativa/todos-docentes.jpeg'); ?>" alt="Equipo docente CECNSR">
                    <span class="masonry__cap">Equipo docente</span>
                </a>
                <a class="masonry__item" href="<?= asset('assets/pastoralEducativa/coro-institucional-cecnsr-iglesia-san-marcos.jpeg'); ?>">
                    <img src="<?= asset('assets/pastoralEducativa/coro-institucional-cecnsr-iglesia-san-marcos.jpeg'); ?>" alt="Coro institucional en templo">
                    <span class="masonry__cap">Coro institucional</span>
                </a>
                <a class="masonry__item" href="<?= asset('assets/pastoralEducativa/docentes-trabajo-cola.jpeg'); ?>">
                    <img src="<?= asset('assets/pastoralEducativa/docentes-trabajo-cola.jpeg'); ?>" alt="Docentes en jornada de formación">
                    <span class="masonry__cap">Formación docente</span>
                </a>
            </div>
        </div>
    </section>

    <!-- ===== Himno ===== -->
    <section class="band band--himno-soft" aria-labelledby="himno-title">
        <div class="band__inner">
            <h2 id="himno-title" class="section-title">Himno de la Pastoral Educativa</h2>
            <audio id="himno-audio" controls preload="none" aria-label="Reproducir himno de la Pastoral">
                <source src="<?= asset('assets/pastoralEducativa/himno-pastoral.mp3'); ?>" type="audio/mpeg">
            </audio>
            <details class="readmore">
                <summary>Ver letra del himno</summary>
                <div class="readmore__content">
                    <p><em>— Pega aquí la letra oficial —</em></p>
                </div>
            </details>
        </div>
    </section>

    <!-- ===== Logos ===== -->
    <section class="band band--logos-strip" aria-labelledby="logos-title">
        <div class="band__inner">
            <h2 id="logos-title" class="section-title">Identidad visual</h2>
            <div class="logos-strip">
                <img src="<?= asset('assets/brand/cecnsr-logo.png'); ?>" alt="Escudo CECNSR">
                <img src="<?= asset('assets/brand/hfic-logo.png'); ?>" alt="Logo HFIC">
                <img src="<?= asset('assets/brand/pasch.png'); ?>" alt="Programa PASCH">
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
<script defer src="<?= asset('assets/partials/p-edu/pastoral.js'); ?>"></script>
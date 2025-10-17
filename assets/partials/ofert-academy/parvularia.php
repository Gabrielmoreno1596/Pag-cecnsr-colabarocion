<?php /* Asume helper asset($path) y $ASSET_VER definidas */ ?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Parvularia – Oferta Académica | CECNSR</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --cecns-burgundy: #7f2d3c;
            --cecns-gold: #e0b13a;
            --cecns-navy: #15334a;
            --cecns-green: #2d8c3c;
            --cecns-lime: #b7d35a;
            --cecns-sun: #fff;
            --cecns-ink: #1e1e1e;
            --cecns-muted: #6b7280;
            --cecns-bg: #f7f8fa;
            --radius: 1.25rem;
            --shadow: 0 10px 25px rgba(0, 0, 0, .08);
            --shadow-sm: 0 6px 16px rgba(0, 0, 0, .06);
            --max: 1100px;
        }

        /* Reset básico */
        * {
            box-sizing: border-box
        }

        html,
        body {
            margin: 0;
            background: var(--cecns-bg);
            color: var(--cecns-ink);
            font: 16px/1.6 Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial
        }

        img {
            max-width: 100%;
            display: block
        }

        a {
            color: var(--cecns-navy);
            text-decoration: underline;
            text-underline-offset: 2px
        }

        /* HERO (50% viewport) */
        .hero {
            min-height: 50svh;
            position: relative;
            display: grid;
            place-items: center;
            overflow: hidden;
            background: var(--cecns-navy);
            isolation: isolate;
        }

        .hero__bg {
            position: absolute;
            inset: 0;
            z-index: 0
        }

        .hero__bg img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 1.2s ease-in-out;
        }

        .hero__bg img.is-active {
            opacity: 1
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 1;
            background: linear-gradient(to bottom, rgba(0, 0, 0, .48), rgba(0, 0, 0, .62))
        }

        .hero__content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: var(--cecns-sun);
            padding: clamp(1rem, 2vw, 2rem);
            max-width: var(--max);
        }

        /* Tipografía hero */
        .eyebrow {
            letter-spacing: .08em;
            text-transform: uppercase;
            font-weight: 800;
            color: var(--cecns-lime)
        }

        .hero h1 {
            margin: .25rem 0 1rem;
            font-size: clamp(1.8rem, 3.6vw, 3rem);
            line-height: 1.15;
            text-shadow: 0 0 2px rgba(0, 0, 0, .35), 0 2px 8px rgba(0, 0, 0, .45)
        }

        .hero p {
            max-width: 850px;
            margin: 0 auto 1.25rem;
            color: #eef5ff;
            text-shadow: 0 1px 6px rgba(0, 0, 0, .35)
        }

        .hero__cta {
            display: inline-flex;
            gap: .5rem;
            flex-wrap: wrap;
            justify-content: center
        }

        .btn {
            appearance: none;
            border: 0;
            border-radius: 999px;
            padding: .85rem 1.15rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: var(--shadow-sm);
            transition: transform .18s ease, box-shadow .18s ease, background-color .2s ease, color .2s ease, border-color .2s ease;
            will-change: transform;
        }

        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 22px rgba(0, 0, 0, .16)
        }

        .btn:active {
            transform: translateY(0);
            box-shadow: 0 6px 14px rgba(0, 0, 0, .12)
        }

        .btn:focus-visible {
            outline: 3px solid var(--cecns-gold);
            outline-offset: 3px
        }

        .btn--gold {
            background: var(--cecns-gold);
            color: #2b2100
        }

        .btn--gold:hover {
            background: #d5a431
        }

        .btn--outline {
            background: transparent;
            color: #fff;
            border: 2px solid #fff
        }

        .btn--outline:hover {
            background: rgba(255, 255, 255, .14)
        }

        /* MAIN */
        main {
            max-width: var(--max);
            margin: -2rem auto 3rem;
            background: #fff;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: clamp(1rem, 2.5vw, 2rem)
        }

        .lead {
            font-size: 1.05rem;
            color: var(--cecns-muted)
        }

        .section {
            padding: 1rem 0
        }

        .section h2 {
            font-size: clamp(1.25rem, 2.2vw, 1.8rem);
            color: var(--cecns-navy);
            margin: 0 0 .5rem
        }

        .divider {
            height: 4px;
            width: 70px;
            background: linear-gradient(90deg, var(--cecns-burgundy), var(--cecns-gold));
            border-radius: 999px;
            margin: .25rem 0 1rem
        }

        /* Grid utilitaria */
        .grid {
            display: grid;
            gap: 1.25rem
        }

        .grid--2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            background-color: #0f2230;
            padding: 1.5rem;
            border-radius: 20px;
            margin-top: 2rem;

        }

        @media (max-width:900px) {
            .grid--2 {
                grid-template-columns: 1fr
            }
        }

        /* Cards / superficies */
        .card {
            border: 1px solid #e7e8ec;
            border-radius: calc(var(--radius) - .25rem);
            padding: 1rem;
            background: #fff;
            box-shadow: var(--shadow-sm)
        }

        .surface-ink {
            background: #fff;
            color: #0f2230;
            border: 0;
            box-shadow: 0 8px 18px rgba(0, 0, 0, .12)
        }

        .surface-ink h2 {
            color: #0f2230
        }

        .surface-ink .divider {
            opacity: .9
        }

        .surface-ink .checklist li::before {
            color: var(--cecns-lime)
        }

        /* Media blocks (evita parches blancos y CLS) */
        .media {
            position: relative;
            border-radius: var(--radius);
            overflow: hidden;
            background: #eef3f8
        }

        .media img {
            width: 100%;
            height: auto;
            display: block;
            aspect-ratio: 16/9;
            object-fit: cover
        }

        .media::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(21, 51, 74, .35), transparent 40%)
        }

        .media figcaption {
            position: absolute;
            left: 0;
            right: 0;
            bottom: .35rem;
            color: #fff;
            padding: .5rem 1rem;
            font-weight: 600;
            text-shadow: 0 2px 10px rgba(0, 0, 0, .5)
        }

        /* Acordeón (details/summary) */
        .acc__item+.acc__item {
            border-top: 1px solid #e7e8ec
        }

        .acc__btn {
            width: 100%;
            text-align: left;
            background: #fafbfd;
            padding: 1rem 1.25rem;
            border: 0;
            font-weight: 700;
            color: var(--cecns-navy);
            cursor: pointer
        }

        .acc__panel {
            display: grid;
            grid-template-rows: 0fr;
            transition: grid-template-rows .3s ease
        }

        .acc__panel>div {
            overflow: hidden
        }

        .acc__item[open] .acc__panel {
            grid-template-rows: 1fr
        }

        /* Checklists */
        .checklist {
            list-style: none;
            padding-left: 0;
            margin: 0
        }

        .checklist li {
            padding-left: 1.65rem;
            position: relative;
            margin: .4rem 0
        }

        .checklist li::before {
            content: "✔";
            position: absolute;
            left: .3rem;
            color: var(--cecns-green);
            font-weight: 800
        }

        /* Video responsivo */
        .video {
            position: relative;
            padding-top: 56.25%;
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            background: #eef3f8
        }

        .video iframe {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            border: 0
        }

        /* Pequeños respetos a accesibilidad motion */
        @media (prefers-reduced-motion:reduce) {
            .btn {
                transition: none
            }

            .btn:hover,
            .btn:active {
                transform: none;
                box-shadow: inherit
            }
        }

        /* Eleva suavemente la tarjeta (incluye KPIs que usan .card) */
        .card {
            transition: transform .18s ease, box-shadow .18s ease, border-color .2s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 28px rgba(0, 0, 0, .12);
            border-color: #e2e6ee;
        }

        .card:active {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .10);
        }

        /* Accesible por teclado */
        .card:focus-within {
            outline: 3px solid var(--cecns-gold);
            outline-offset: 3px;
        }

        /* Nuevos estilos ------------------------------------------------------------- */
        /* ===== MAIN — Bandas creativas ===== */
        main#contenido {
            max-width: none;
            margin: 0;
            padding: 0;
            background: transparent
        }

        /* Banda base con corte diagonal */
        .band {
            position: relative;
            padding: clamp(3rem, 6vw, 5rem) 0;
            overflow: clip;
            isolation: isolate;
        }

        .band::before {
            content: "";
            position: absolute;
            inset: -8rem 0 -8rem 0;
            transform: skewY(-4deg);
            z-index: -1;
            background: var(--band-bg, #f5f7fb);
            box-shadow: inset 0 1px 0 rgba(0, 0, 0, .05);
        }

        /* Variantes de color */
        .band--light {
            --band-bg: linear-gradient(180deg, #f3f6fb, #eef3f8)
        }

        .band--ink {
            --band-bg: linear-gradient(180deg, #004080, #3d6d94ff);
            color: #eaf2f8
        }

        .band--gold {
            --band-bg: linear-gradient(180deg, #fff7df, #fde9b2)
        }

        /* Contenedor interno */
        .wrap {
            max-width: var(--max);
            margin: 0 auto;
            padding: 0 clamp(1rem, 2vw, 2rem)
        }

        /* Encabezados dentro de bandas oscuras */
        .band--ink h2 {
            color: #eaf2f8
        }

        .band--ink .divider {
            filter: brightness(1.2);
            opacity: .95
        }

        /* Grid de 2 columnas que se pliega en móvil */
        .band__grid {
            display: grid;
            gap: 1.25rem;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        @media (max-width:900px) {
            .band__grid {
                grid-template-columns: 1fr
            }
        }

        /* Tarjetas flotantes (para todo .card existente) */
        .card {
            transition: transform .18s ease, box-shadow .18s ease, border-color .2s ease
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 30px rgba(16, 24, 40, .14)
        }

        .card:active {
            transform: translateY(-1px);
            box-shadow: 0 10px 22px rgba(16, 24, 40, .12)
        }

        .card:focus-within {
            outline: 3px solid var(--cecns-gold);
            outline-offset: 3px
        }

        /* KPIs responsivos con aire */
        .kpis {
            display: grid;
            gap: 1rem;
            grid-template-columns: repeat(3, minmax(0, 1fr))
        }

        @media (max-width:900px) {
            .kpis {
                grid-template-columns: repeat(2, 1fr)
            }
        }

        @media (max-width:560px) {
            .kpis {
                grid-template-columns: 1fr
            }
        }

        /* Separadores curvos suaves entre bandas (opcional) */
        .wave {
            position: absolute;
            left: 0;
            right: 0;
            height: 52px;
            z-index: 1;
            pointer-events: none;
            background: radial-gradient(120% 52px at 50% -2px, rgba(0, 0, 0, .12), transparent 60%);
            opacity: .08;
            mix-blend-multiply;
        }

        .wave--top {
            top: -26px
        }

        .wave--bottom {
            bottom: -26px
        }

        /* Galería moderna: “editorial collage” */
        .collage {
            display: grid;
            gap: 1rem;
            grid-template-columns: 1.65fr 1fr;
            grid-template-rows: auto auto;
            grid-template-areas:
                "big  tall"
                "big  small";
        }

        .collage .big {
            grid-area: big
        }

        .collage .tall {
            grid-area: tall
        }

        .collage .small {
            grid-area: small
        }

        .collage figure {
            position: relative;
            border-radius: var(--radius);
            overflow: hidden;
            background: #eef3f8;
            min-height: 260px;
        }

        .collage img {
            width: 100%;
            height: 100%;
            object-fit: cover
        }

        @media (max-width:900px) {
            .collage {
                grid-template-columns: 1fr;
                grid-template-areas: "big" "tall" "small"
            }
        }

        /* Ajuste visual de .media para que brille sobre bandas */
        .media {
            box-shadow: 0 10px 24px rgba(0, 0, 0, .12)
        }
    </style>
</head>

<body>

    <!-- HERO -->
    <header class="hero" role="banner">
        <div class="hero__bg" aria-hidden="true">
            <img class="is-active" src="<?= asset('assets/ofertaAcademica/parv/cancha-parv-1.jpeg') ?>" alt="" loading="eager">
            <img src="<?= asset('assets/ofertaAcademica/parv/parv-cancha-nivel3.jpeg') ?>" alt="" loading="lazy">
            <img src="<?= asset('assets/ofertaAcademica/parv/parv-cancha.jpeg') ?>" alt="" loading="lazy">
            <img src="<?= asset('assets/ofertaAcademica/parv/parv-preparatoria.jpeg') ?>" alt="" loading="lazy">
            <img src="<?= asset('assets/ofertaAcademica/parv/parv-ingles.jpeg') ?>" alt="" loading="lazy">
        </div>

        <div class="hero__content">
            <div class="eyebrow">Oferta Académica • Parvularia</div>
            <h1>Aprender jugando, creciendo en fe y comunidad</h1>
            <p>Desde Educación Inicial (3 años) hasta Parvularia 6, acompañamos el desarrollo humano, espiritual y académico a través del juego, la creatividad y la pedagogía de Jesús (Carisma y Filosofía HFIC).</p>
            <div class="hero__cta">
                <a class="btn btn--gold" href="<?= asset('docs/prospecto-parvularia.pdf') ?>" download>Descargar prospecto</a>
                <a class="btn btn--outline" href="#admision">Proceso de admisión</a>
            </div>
        </div>
    </header>


    <main id="contenido">

        <!-- Intro (clara) -->
        <section class="band band--light">
            <span class="wave wave--top"></span>
            <div class="wrap section">
                <p class="lead">Nuestra oferta se organiza por <strong>niveles, grados, áreas básicas y áreas técnicas</strong>, garantizando continuidad de aprendizaje y desarrollo progresivo de competencias.</p>
            </div>
        </section>

        <!-- Competencias (oscura) -->
        <section class="band band--ink">
            <div class="wrap section band__grid">
                <div class="card surface-ink">
                    <h2>Educación Inicial y Parvularia</h2>
                    <div class="divider"></div>
                    <ul class="checklist">
                        <li>Desarrollo de habilidades básicas y psicomotrices.</li>
                        <li>Socialización, autonomía e inicio de hábitos.</li>
                        <li>Descubrimiento del entorno mediante juego y creatividad.</li>
                        <li>Formación en la fe y vivencia de valores HFIC.</li>
                    </ul>
                </div>
                <figure class="media">
                    <img src="<?= asset('assets/ofertaAcademica/parv/cancha-parv-1.jpeg') ?>" alt="Niñas y niños al aire libre" loading="lazy">
                    <figcaption>Aprendizaje activo y juego significativo</figcaption>
                </figure>
            </div>
        </section>

        <!-- Continuidad (clara) -->
        <section class="band band--light">
            <span class="wave wave--top"></span>
            <div class="wrap section band__grid">
                <figure class="media">
                    <img src="<?= asset('assets/ofertaAcademica/parv/cancha-parv-1.jpeg') ?>" alt="Circuito psicomotriz con familias" loading="lazy">
                    <figcaption>Familia y escuela: una sola comunidad</figcaption>
                </figure>
                <div class="card">
                    <h2>Continuidad hacia 1.º y 2.º Ciclo</h2>
                    <div class="divider"></div>
                    <p>Se fortalecen conocimientos fundamentales, hábitos de estudio y la vivencia de principios, valores, educación artística-cultural y habilidades socioemocionales.</p>
                </div>
            </div>
        </section>

        <!-- Valor agregado (dorada suave para variar ritmo) -->
        <section class="band band--gold" id="valores">
            <div class="wrap section">
                <h2>Valor agregado en Parvularia</h2>
                <div class="divider"></div>
                <div class="kpis">
                    <div class="card"><strong>Plataforma institucional</strong><br><span class="pill">Comunicados y seguimiento</span></div>
                    <div class="card"><strong>Departamento psicopedagógico</strong><br><span class="pill">Atención y acompañamiento</span></div>
                    <div class="card"><strong>Pastoral educativa</strong><br><span class="pill">Formación en la fe</span></div>
                    <div class="card"><strong>Laboratorios</strong><br><span class="pill">Informática, Ciencias, Inglés</span></div>
                    <div class="card"><strong>Internet en aulas</strong><br><span class="pill">Recursos digitales</span></div>
                    <div class="card"><strong>Festivales y clubes</strong><br><span class="pill">Arte, danza, robótica, ajedrez</span></div>
                </div>
            </div>
        </section>

        <!-- Video (clara) -->
        <section class="band band--light">
            <div class="wrap section">
                <h2>Así vivimos Parvularia</h2>
                <div class="divider"></div>
                <div class="video" aria-label="Video de vida escolar en Parvularia">
                    <iframe src="https://www.youtube-nocookie.com/embed/VIDEO_ID" title="Parvularia – CECNSR"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen referrerpolicy="strict-origin-when-cross-origin"></iframe>
                </div>
            </div>
        </section>

        <!-- Admisión (oscura) -->
        <section class="band band--ink" id="admision">
            <div class="wrap section">
                <h2>Admisión y Matrícula</h2>
                <div class="divider"></div>

                <!-- tus <details> tal cual -->
                <details class="acc__item" open>
                    <summary class="acc__btn">Admisión – Nuevo ingreso (general)</summary>
                    <div class="acc__panel">
                        <div>
                            <ol>
                                <li>Adquirir el prospecto en recepción (presentar NIE).</li>
                                <li>Usuario para plataforma institucional. Ingresar 24&nbsp;h después; escanear QR, elegir grado, descargar temarios y leer información.</li>
                                <li>Entrevista psicológica con responsable y documentos: notas I–II periodo, constancia de conducta y certificado del año anterior (copias).</li>
                                <li>Prueba diagnóstica presencial (<em>traer computadora con internet</em>).</li>
                                <li>Curso de inducción presencial (<strong>solo III ciclo</strong>).</li>
                                <li>Nota mínima para continuar matrícula: <strong>8.0</strong>.</li>
                            </ol>
                        </div>
                    </div>
                </details>

                <details class="acc__item">
                    <summary class="acc__btn">Admisión – Inicial 3 años</summary>
                    <div class="acc__panel">
                        <div>
                            <ol>
                                <li>Adquirir el prospecto en recepción.</li>
                                <li>Cumplir 3 años a más tardar en <strong>abril</strong> del año a estudiar.</li>
                                <li>Inicio de manejo de esfínteres.</li>
                                <li>Participación activa en la entrevista familiar según fecha asignada.</li>
                            </ol>
                        </div>
                    </div>
                </details>

                <details class="acc__item">
                    <summary class="acc__btn">Admisión – Parvularia 4, 5 y 6 años</summary>
                    <div class="acc__panel">
                        <div>
                            <ol>
                                <li>Adquirir el prospecto en recepción.</li>
                                <li>Cumplir la edad correspondiente con fecha límite del año a estudiar.</li>
                                <li>Inicio de manejo de esfínteres.</li>
                                <li>Diploma del año anterior (para 5 y 6 años).</li>
                                <li>Entrevista familiar según fecha asignada.</li>
                            </ol>
                        </div>
                    </div>
                </details>

                <details class="acc__item">
                    <summary class="acc__btn">Matrícula – Nuevo y antiguo ingreso</summary>
                    <div class="acc__panel">
                        <div>
                            <ol>
                                <li>Adquirir carpeta institucional en recepción.</li>
                                <li>Ingresar a la plataforma; en el grado correspondiente, completar la ficha en <em>Perfil</em>.</li>
                                <li>Cancelar el arancel de matrícula.</li>
                                <li>Presentar la documentación solicitada en la fecha de matrícula.</li>
                            </ol>
                        </div>
                    </div>
                </details>

                <details class="acc__item">
                    <summary class="acc__btn">Documentación – Inicial 3 y Parvularia</summary>
                    <div class="acc__panel">
                        <div>
                            <ul class="checklist">
                                <li>Partida de nacimiento original (reciente, 3 meses).</li>
                                <li>Fe de bautismo.</li>
                                <li>Tarjeta de vacunación.</li>
                                <li>Fotocopia del DUI del responsable al 150%.</li>
                                <li>Fotografía tamaño cédula reciente.</li>
                            </ul>
                        </div>
                    </div>
                </details>
            </div>
        </section>

        <!-- Galería editorial + CTA (clara) -->
        <section class="band band--light" aria-label="Galería de actividades">
            <div class="wrap section collage">
                <figure class="media big">
                    <img src="<?= asset('assets/ofertaAcademica/parv/est-parv-prof_Dina.jpeg') ?>" alt="Convivencia" loading="lazy">
                    <figcaption>Día de la convivencia</figcaption>
                </figure>
                <figure class="media tall">
                    <img src="<?= asset('assets/parvularia/parv-act-dia-del-nino2.jpeg') ?>" alt="Sombreros creativos" loading="lazy">
                    <figcaption>Creatividad y juego</figcaption>
                </figure>
                <figure class="media small">
                    <img src="<?= asset('assets/ofertaAcademica/parv/cancha-parv-1.jpeg') ?>" alt="Actividades al aire libre" loading="lazy">
                    <figcaption>Juego y desarrollo</figcaption>
                </figure>
            </div>

            <div class="wrap section" style="text-align:center">
                <a class="btn btn--gold" href="#admision">Iniciar proceso de admisión</a>
            </div>
        </section>

    </main>



    <script>
        /* Acordeones: permitir solo uno abierto a la vez (opcional) */
        document.querySelectorAll('.acc__item summary').forEach(sm => {
            sm.addEventListener('click', () => {
                const item = sm.parentElement;
                if (!item.open) {
                    document.querySelectorAll('.acc__item[open]').forEach(o => {
                        if (o !== item) o.removeAttribute('open');
                    });
                }
            });
        });

        /* Slideshow del hero con pausa en pestaña oculta */
        (function() {
            const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
            const slides = document.querySelectorAll('.hero__bg img');
            if (!slides.length || reduce) return;
            let i = 0,
                timer;
            const D = 5500;
            const play = () => timer = setInterval(() => {
                slides[i].classList.remove('is-active');
                i = (i + 1) % slides.length;
                slides[i].classList.add('is-active');
            }, D);
            const stop = () => clearInterval(timer);
            document.addEventListener('visibilitychange', () => document.hidden ? stop() : play());
            play();
        })();
    </script>
</body>

</html>
<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CECNSR - Colegios PASCH</title>

  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />


  <link rel="stylesheet" href="<?= asset('styles.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/css/style-convenios.css') ?>">

  <!-- Iconos -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <!-- Favicon básico (PNG) -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <meta name="theme-color" content="#7f2d3c">

  <!-- SEO/OG -->
  <link rel="canonical" href="https://www.cecnsrosariosv.com/contribuciones/sitececnsr/pasch.php">
  <meta name="description" content="El CECNSR participa en PASCH: alemán, interculturalidad y oportunidades para estudiantes.">
  <meta property="og:title" content="CECNSR — Colegios PASCH">
  <meta property="og:description" content="Aprendizaje de alemán, interculturalidad y oportunidades PASCH.">
  <meta property="og:image" content="<?= asset('assets/og/pasch-cover.jpg') ?>">
  <meta property="og:url" content="https://www.cecnsrosariosv.com/contribuciones/sitececnsr/pasch.php">
  <meta name="twitter:card" content="summary_large_image">
</head>

<body>

  <?php require_once PROJECT_PATH . 'assets/partials/header.php'; ?>

  <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>


  <!-- main -->
  <section class="hero hero--signature" aria-labelledby="hero-pasch-title">
    <div class="hero__container">
      <!-- Columna texto -->
      <div class="hero__col hero__col--text">
        <div class="hero__creds" aria-label="Organizaciones asociadas">
          <!-- <span>Con el apoyo de</span> -->
          <img src="assets/pasch/pasch.png" alt="PASCH" />
          <img src="assets/1_CECNSR.png" alt="CECNSR" />
        </div>
        <p class="hero__eyebrow">Convenios y Alianzas</p>
        <h1 id="hero-pasch-title" class="hero__title">
          Colegios PASCH — alianza para el alemán y el intercambio cultural
        </h1>

        <div class="title-divider-hero title-divider"></div>

        <p class="hero__lead">
          El CECNSR forma parte de las instituciones
          <strong>asociadas</strong> a la iniciativa
          <em>Schulen: Partner der Zukunft (PASCH)</em>, impulsando el
          aprendizaje del alemán, el intercambio intercultural y oportunidades
          formativas para nuestros estudiantes.
        </p>

        <div class="hero__cta">
          <a class="btn-solid" href="#CECNSR">Más información</a>
          <a class="btn-outline" href="#experiencias">Experiencias</a>
        </div>

        <!-- credenciales -->
      </div>

      <!-- Columna media -->
      <div class="hero__col hero__col--media">
        <div class="glass-card" id="sig-viewport">
          <figure class="hero__figure">
            <img
              id="sig-img"
              src="assets/pasch/pasch-vijaron.jpeg"
              alt="Estudiantes CECNSR en programa PASCH"
              decoding="async" />
            <figcaption
              id="sig-caption"
              class="hero__caption"
              aria-live="polite"></figcaption>

            <!-- barra de progreso -->
            <div class="progress">
              <div id="sig-progress" class="progress__bar"></div>
            </div>
          </figure>

          <!-- Thumbs verticales -->
          <div
            class="thumbs"
            role="tablist"
            aria-label="Seleccionar imagen"
            id="sig-thumbs">
            <!-- Se rellenan por JS -->
          </div>
        </div>

        <!-- blob decorativo -->
        <!-- <div class="hero__blob" aria-hidden="true"></div> -->
      </div>
    </div>
  </section>

  <!-- CONTENT -->
  <section class="main-content">
    <!-- ¿QUÉ ES PASCH? -->
    <section class="section">
      <div class="card">
        <h2 class="section-title">¿Qué es PASCH?</h2>
        <div class="title-divider" aria-hidden="true"></div>
        <p>
          <strong>PASCH (Schulen: Partner der Zukunft)</strong> es una
          iniciativa mundial que conecta a escuelas de todos los continentes
          para promover el aprendizaje del <strong>alemán</strong>, los
          intercambios juveniles y la cooperación educativa con instituciones
          culturales de Alemania.
        </p>
        <p>
          A través de PASCH, los estudiantes acceden a
          <strong>materiales de aprendizaje</strong>,
          <strong>cursos y campamentos</strong>, espacios de
          <strong>interculturalidad</strong> y una red global de jóvenes con
          intereses comunes.
        </p>
        <a
          class="btn-pill"
          href="https://www.pasch-net.de/de/index.php"
          target="_blank"
          rel="noopener">
          Visitar sitio oficial PASCH
        </a>
      </div>
    </section>

    <section class="section" id="pasch-hub" aria-label="Información PASCH en CECNSR">
      <div class="card card--accent">
        <h2 class="section-title">CECNSR & PASCH — Centro de información</h2>
        <div class="title-divider" aria-hidden="true"></div>

        <!-- NAV TABS -->
        <div class="ihub__tabs" role="tablist" aria-label="Secciones de información">
          <button class="ihub__tab is-active" role="tab" aria-selected="true" aria-controls="panel-asociacion" id="tab-asociacion">Asociación</button>
          <button class="ihub__tab" role="tab" aria-selected="false" aria-controls="panel-oportunidades" id="tab-oportunidades">Oportunidades</button>
          <button class="ihub__tab" role="tab" aria-selected="false" aria-controls="panel-faq" id="tab-faq">FAQ</button>
        </div>

        <!-- PANEL: ASOCIACIÓN -->
        <div class="ihub__panel is-active" id="panel-asociacion" role="tabpanel" aria-labelledby="tab-asociacion">
          <p>
            Nuestro colegio participa como <strong>institución asociada</strong>, integrando el alemán como
            <strong>competencia lingüística y cultural</strong> en proyectos formativos, postulando a
            <strong>estancias de inmersión</strong> y abriendo espacios para ampliar horizontes académicos.
          </p>

          <ul class="bullets">
            <li>Proyectos y talleres con enfoque intercultural.</li>
            <li>Postulación a <strong>cursos juveniles</strong> (Goethe-Institut / PASCH).</li>
            <li>Acceso a recursos didácticos y comunidad internacional.</li>
          </ul>

          <details class="ihub__dl">
            <summary><strong>Ver línea de tiempo breve</strong></summary>
            <ul class="timeline">
              <li><span class="dot">1</span>
                <div class="tl-body">Integración al programa PASCH.</div>
              </li>
              <li><span class="dot">2</span>
                <div class="tl-body">Implementación de proyectos y clubes.</div>
              </li>
              <li><span class="dot">3</span>
                <div class="tl-body">Convocatorias a campamentos y cursos.</div>
              </li>
            </ul>
          </details>

          <a class="btn-link" href="#convocatorias" aria-label="Ir a convocatorias y requisitos">Ver convocatorias</a>
        </div>

        <!-- PANEL: OPORTUNIDADES (sin filtro) -->
        <div class="ihub__panel" id="panel-oportunidades" role="tabpanel" aria-labelledby="tab-oportunidades">
          <div class="grid-3 ihub__cards">
            <article class="feature ihub__card">
              <i class="fas fa-users" aria-hidden="true"></i>
              <h3>Cursos y campamentos</h3>
              <p>Programas intensivos en Alemania con trabajo en equipo, deporte y cultura.</p>
              <details>
                <summary class="ihub__more">Requisitos y frecuencia</summary>
                <p>Postulación anual. Nivel de alemán recomendado: A2+ (según convocatoria). Carta de motivación.</p>
              </details>
            </article>

            <article class="feature ihub__card">
              <i class="fas fa-graduation-cap" aria-hidden="true"></i>
              <h3>Becas y apoyo</h3>
              <p>Posibilidad de financiamiento parcial/total según convocatoria y desempeño.</p>
              <details>
                <summary class="ihub__more">Cómo aplicar</summary>
                <p>Presenta expediente académico, participación en proyectos y recomendaciones docentes.</p>
              </details>
            </article>

            <article class="feature ihub__card">
              <i class="fas fa-globe-europe" aria-hidden="true"></i>
              <h3>Red internacional</h3>
              <p>Conexión con jóvenes de múltiples países y desarrollo de habilidades globales.</p>
              <details>
                <summary class="ihub__more">Beneficios</summary>
                <p>Intercambios virtuales, proyectos colaborativos y acceso a recursos del Goethe-Institut.</p>
              </details>
            </article>
          </div>

          <!--    <div class="ihub__cta">
            <a id="convocatorias" class="btn-solid" data-pdf="pasch_convocatoria_2025.pdf">Guía rápida (PDF)</a>
            <a class="btn-link" href="#contacto-pasch">Contacto PASCH en CECNSR</a>
          </div> -->
        </div>

        <!-- PANEL: FAQ -->
        <div class="ihub__panel" id="panel-faq" role="tabpanel" aria-labelledby="tab-faq">
          <details class="ihub__faq">
            <summary>¿Qué nivel de alemán necesito para postular?</summary>
            <p>Depende de la convocatoria. Muchas piden A2 o superior; revisa cada llamada específica.</p>
          </details>
          <details class="ihub__faq">
            <summary>¿Hay costos adicionales?</summary>
            <p>Pueden existir costos de pasaporte, visado o seguro. Algunas becas los cubren total o parcialmente.</p>
          </details>
          <details class="ihub__faq">
            <summary>¿Cómo demuestro participación?</summary>
            <p>Incluye constancias de proyectos, clubes y talleres certificados por CECNSR.</p>
          </details>
        </div>
      </div>
    </section>



    <!-- REQUISITOS (TIMELINE) -->
    <section class="section">
      <div class="card">
        <h2 class="section-title">Requisitos y proceso de postulación</h2>
        <div class="title-divider" aria-hidden="true"></div>
        <ol class="timeline">
          <li>
            <span class="dot">1</span>
            <div class="tl-body">
              <strong>Convocatoria interna:</strong> se publica la(s)
              oportunidad(es) vigente(s).
            </div>
          </li>
          <li>
            <span class="dot">2</span>
            <div class="tl-body">
              <strong>Perfil del postulante:</strong> responsabilidad
              académica, motivación por idiomas y disponibilidad.
            </div>
          </li>
          <li>
            <span class="dot">3</span>
            <div class="tl-body">
              <strong>Documentación:</strong> formulario, carta de motivación
              y evidencias solicitadas.
            </div>
          </li>
          <li>
            <span class="dot">4</span>
            <div class="tl-body">
              <strong>Selección:</strong> comité interno y/o lineamientos
              PASCH/Goethe-Institut.
            </div>
          </li>
          <li>
            <span class="dot">5</span>
            <div class="tl-body">
              <strong>Preparación:</strong> nivelación de idioma y orientación
              cultural previa al viaje.
            </div>
          </li>
        </ol>
        <p class="note">
          *Los criterios pueden variar según cada convocatoria oficial.
        </p>
      </div>

      <!-- ===== Modal PDF (lightbox) ===== -->
      <div
        class="pdf-modal"
        id="pdfModal"
        hidden
        aria-modal="true"
        role="dialog"
        aria-labelledby="pdf-title">
        <div class="pdf-backdrop" data-close></div>

        <div class="pdf-dialog">
          <header class="pdf-head">
            <h3 id="pdf-title">Documento</h3>
            <button class="pdf-close" aria-label="Cerrar" data-close>
              ✕
            </button>
          </header>

          <div class="pdf-body">
            <!-- Intento 1: visor nativo sin barra con fragmentos -->
            <iframe
              id="pdfFrame"
              title="Visor de PDF"
              loading="lazy"></iframe>
            <!-- Fallback mínimo (si el iframe falla) -->
            <p class="pdf-fallback" id="pdfFallback" hidden>
              Tu navegador no pudo mostrar el PDF aquí.
              <span>El visor está deshabilitado para descarga.</span>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- EXPERIENCIAS -->
    <section class="section" id="experiencias">
      <div class="card">
        <h2 class="section-title">Experiencias CECNSR</h2>
        <div class="title-divider" aria-hidden="true"></div>

        <div class="grid-3 media-grid">
          <!-- Tarjeta 1 -->
          <article class="media-card xp-card">
            <div class="xp-media">
              <img
                class="main"
                src="assets/pasch/pasch-img2.jpeg"
                alt="Alex en curso juvenil" />
              <img
                class="thumbex"
                src="assets/pasch/pasch-img5.png"
                alt="Alex en curso juvenil" />
              <img
                class="thumbex"
                src="assets/pasch/pasch-img6.png"
                alt="Alex en curso juvenil" />
            </div>
            <div class="media-info">
              <h3>Alex — Curso juvenil (A1)</h3>
              <p>
                3 semanas en Benediktbeuern. Clases A1, deporte y visitas a
                Múnich e Innsbruck.
              </p>
              <a
                class="btn-link"
                href="assets/pdf/paschBitácora-Alemania-ALEMÁN-Alex.pdf"
                target="_blank">Ver bitácora</a>
            </div>
          </article>
          <!-- Tarjeta 2 -->
          <article class="media-card xp-card">
            <div class="xp-media">
              <img
                class="main"
                src="assets/pasch/pasch-valeria2.png"
                alt="Valeria en campamento PASCH" />
              <img
                class="thumbex"
                src="assets/pasch/pasch-valeria1.png"
                alt="Valeria en campamento PASCH" />
              <img
                class="thumbex"
                src="assets/pasch/pasch-img4.png"
                alt="Valeria en campamento PASCH" />
            </div>
            <div class="media-info">
              <h3>Valeria — Campamento PASCH (A1)</h3>
              <p>
                Convivencia multicultural; estrategias creativas para superar
                la barrera del idioma. Certificación A1.
              </p>
              <a
                class="btn-link"
                href="assets/pdf/paschBitácora-Alemania-ALEMÁN-Alex.pdf"
                target="_blank">Ver logbuch</a>
            </div>
          </article>

          <!-- Tarjeta 3 -->
          <article class="media-card xp-card">
            <div class="xp-media">
              <img
                class="main"
                src="assets/pasch/pasch-vijaron.jpeg"
                alt="Mateo en Jungenkurs" />
              <img
                class="thumbex"
                src="assets/pasch/pasch-mateo1.png"
                alt="Mateo en Jungenkurs" />
              <img
                class="thumbex"
                src="assets/pasch/pasch-mateo2.png"
                alt="Mateo en Jungenkurs" />
            </div>
            <div class="media-info">
              <h3>Mateo — Jungenkurs (A2)</h3>
              <p>
                Curso A2 en Bamberg (Goethe-Institut). Proyecto stop-motion y
                excursiones. Meta B1.
              </p>
              <a
                class="btn-link"
                href="assets/pdf/paschMemoria-de-viaje-Mateo.pdf"
                target="_blank">Ver memoria</a>
            </div>
          </article>
        </div>
      </div>

      <!-- FOTOS -->
    </section>

    <!-- GALERÍA -->
    <section class="section">
      <div class="card">
        <h2 class="section-title">Galería</h2>
        <div class="title-divider" aria-hidden="true"></div>
        <div class="gal-quilt" id="galeria">
          <!-- Cada tile puede llevar data-full para tu lightbox -->
          <a
            class="tile wide"
            href="assets/pasch/pasch-img2.jpeg"
            data-full="assets/pasch/pasch-img2.jpeg">
            <img
              loading="lazy"
              src="assets/pasch/pasch-img2.jpeg"
              alt="Reunión con el equipo" />
            <!-- <span class="cap">Reunión con el equipo</span> -->
          </a>

          <a
            class="tile"
            href="assets/pasch/pasch-img3.jpeg"
            data-full="assets/pasch/pasch-img3.jpeg">
            <img
              loading="lazy"
              src="assets/pasch/pasch-img3.jpeg"
              alt="Grupo con bandera" />
            <!-- <span class="cap">Grupo con bandera</span> -->
          </a>

          <a
            class="tile tall"
            href="assets/pasch/pasch-img4.png"
            data-full="assets/pasch/pasch-img4.png">
            <img
              loading="lazy"
              src="assets/pasch/pasch-img4.png"
              alt="Actividad creativa" />
            <!-- <span class="cap">Actividad creativa</span> -->
          </a>

          <a
            class="tile tall"
            href="assets/pasch/pasch-mateo2.png"
            data-full="assets/pasch/pasch-mateo2.png">
            <img
              loading="lazy"
              src="assets/pasch/pasch-mateo2.png"
              alt="Mateo 2" />
            <!-- <span class="cap">Mateo 2</span> -->
          </a>

          <a
            class="tile"
            href="assets/pasch/pasch-img5.png"
            data-full="assets/pasch/pasch-img5.png">
            <img
              loading="lazy"
              src="assets/pasch/pasch-img5.png"
              alt="Amistades" />
            <!-- <span class="cap">Amistades</span> -->
          </a>

          <a
            class="tile wide"
            href="assets/pasch/pasch-img6.png"
            data-full="assets/pasch/pasch-img6.png">
            <img
              loading="lazy"
              src="assets/pasch/pasch-img6.png"
              alt="Clases y juegos" />
            <!-- <span class="cap">Clases y juegos</span> -->
          </a>

          <a
            class="tile"
            href="assets/pasch/pasch-img7.png"
            data-full="assets/pasch/pasch-img7.png">
            <img
              loading="lazy"
              src="assets/pasch/pasch-img7.png"
              alt="Encuentro con estudiantes" />
            <!-- <span class="cap">Encuentro con estudiantes</span> -->
          </a>

          <a
            class="tile"
            href="assets/pasch/pasch-mateo1.png"
            data-full="assets/pasch/pasch-mateo1.png">
            <img
              loading="lazy"
              src="assets/pasch/pasch-mateo1.png"
              alt="Mateo 1" />
            <!-- <span class="cap">Mateo 1</span> -->
          </a>
        </div>
      </div>

      <!-- Lightbox de galería -->
      <div class="xp-lightbox" id="xpLightbox" hidden>
        <div class="xp-lb__backdrop" data-close></div>
        <div
          class="xp-lb__dialog"
          role="dialog"
          aria-modal="true"
          aria-labelledby="xpLbCount">
          <div class="xp-lb__head">
            <div class="xp-lb__count" id="xpLbCount"></div>
            <button class="xp-lb__close" data-close aria-label="Cerrar">
              ✕
            </button>
          </div>

          <div class="xp-lb__stage">
            <button class="xp-lb__nav prev" id="xpPrev" aria-label="Anterior">
              ‹
            </button>
            <img id="xpLbImg" alt="" draggable="false" />
            <button
              class="xp-lb__nav next"
              id="xpNext"
              aria-label="Siguiente">
              ›
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- RECURSOS -->
    <!--       <section class="section">
        <div class="card">
          <h2 class="section-title">Recursos útiles</h2>
          <div class="title-divider" aria-hidden="true"></div>
          <div class="resources-split">
            <ul>
              <li>
                <a
                  href="https://www.pasch-net.de/de/index.php"
                  target="_blank"
                  rel="noopener"
                  >Portal PASCH</a
                >
              </li>
              <li>
                <a href="https://www.goethe.de/" target="_blank" rel="noopener"
                  >Goethe-Institut</a
                >
              </li>
            </ul>
            <ul>
              <li>
                <a
                  href="https://www.pasch-net.de/de/jum/lea/lad.php"
                  target="_blank"
                  rel="noopener"
                  >Aprender alemán — PASCH</a
                >
              </li>
              <li>
                <a href="mailto:CECNSROSARIO@HOTMAIL.COM">Contacto CECNSR</a>
              </li>
            </ul>
          </div>
        </div>
      </section> -->
  </section>


  <?php require_once PROJECT_PATH . 'assets/partials/footer.php'; ?>


  <script src="script.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const header = document.querySelector(".main-header");
      const setHeaderVar = () => {
        const h = header ? header.offsetHeight : 0;
        document.documentElement.style.setProperty("--header-h", `${h}px`);
      };
      setHeaderVar();
      window.addEventListener("resize", setHeaderVar);
    });
  </script>

  <!-- hero -->
  <script>
    (() => {
      const slides = [{
          src: "assets/pasch/pasch-vijaron.jpeg",
          alt: "Estudiantes CECNSR en programa PASCH",
          /* caption: "Jungenkurs PASCH — participación CECNSR.", */
        },
        {
          src: "assets/pasch/pasch-img2.jpeg",
          alt: "Visita y convivencia multicultural",
          /* caption: "Convivencia multicultural y visitas guiadas.", */
        },
        {
          src: "assets/pasch/pasch-img3.jpeg",
          alt: "Actividades y clausura",
          /* caption: "Actividades de integración y clausura del programa.", */
        },
        {
          src: "assets/pasch/pasch-img7.png",
          alt: "Grupo internacional PASCH",
          /* caption: "Trabajo colaborativo con jóvenes de diversos países.", */
        },
        {
          src: "assets/pasch/pasch-mateo1.png",
          alt: "Goethe-Institut Bamberg A2",
          /* caption: "Curso A2 en Goethe-Institut Bamberg.", */
        },
        {
          src: "assets/pasch/pasch-mateo3.png",
          alt: "Talleres y práctica del idioma",
          /* caption: "Talleres creativos y práctica del idioma.", */
        },
      ];

      const mainImg = document.getElementById("sig-img");
      const captionEl = document.getElementById("sig-caption");
      const bar = document.getElementById("sig-progress");
      const thumbsEl = document.getElementById("sig-thumbs");
      const viewport = document.getElementById("sig-viewport");

      // Crear thumbs
      thumbsEl.innerHTML = slides
        .map(
          (s, i) => `
    <button class="thumb${
      i === 0 ? " is-active" : ""
    }" role="tab" aria-selected="${i === 0}">
      <img src="${s.src}" alt="${s.alt}">
    </button>`
        )
        .join("");
      const thumbs = [...thumbsEl.querySelectorAll("button")];

      let i = 0,
        timer = null,
        hover = false,
        touchStartX = 0,
        reduced = window.matchMedia(
          "(prefers-reduced-motion: reduce)"
        ).matches;
      const DURATION = 6000;

      function render(idx) {
        i = (idx + slides.length) % slides.length;
        const s = slides[i];
        if (!mainImg.src.endsWith(s.src)) mainImg.src = s.src;
        mainImg.alt = s.alt;
        captionEl.textContent = s.caption;

        thumbs.forEach((b, k) => {
          const on = k === i;
          b.classList.toggle("is-active", on);
          b.setAttribute("aria-selected", on ? "true" : "false");
        });

        // progreso
        bar.style.transition = "none";
        bar.style.width = "0%";
        // Reflow
        void bar.offsetWidth;
        if (!reduced) {
          // sólo animamos si no hay reduce motion
          bar.style.transition = `width ${DURATION}ms linear`;
          bar.style.width = "100%";
        }
      }

      function next() {
        render(i + 1);
      }

      function start() {
        if (reduced) return;
        clearInterval(timer);
        timer = setInterval(() => {
          if (!hover) next();
        }, DURATION);
      }

      // Eventos
      thumbs.forEach((b, idx) =>
        b.addEventListener("click", () => {
          render(idx);
          start();
        })
      );
      ["mouseenter", "mouseleave"].forEach((ev) => {
        viewport.addEventListener(ev, () => (hover = ev === "mouseenter"));
      });
      document.addEventListener("keydown", (e) => {
        if (e.key === "ArrowRight") {
          render(i + 1);
          start();
        }
        if (e.key === "ArrowLeft") {
          render(i - 1);
          start();
        }
      });
      // Swipe móvil
      viewport.addEventListener(
        "touchstart",
        (e) => (touchStartX = e.touches[0].clientX), {
          passive: true
        }
      );
      viewport.addEventListener(
        "touchend",
        (e) => {
          const dx = e.changedTouches[0].clientX - touchStartX;
          if (Math.abs(dx) > 40) {
            render(dx < 0 ? i + 1 : i - 1);
            start();
          }
        }, {
          passive: true
        }
      );

      // Primer frame
      render(0);
      start();
    })();
  </script>

  <!-- GALLERIA DE EXPERIENCIAS -->

  <script>
    (function() {
      const ROTATE_MS = 5500;

      function initXpCard(card) {
        const media = card.querySelector(".xp-media");
        if (!media) return;

        // A11y básico
        media.setAttribute("role", "group");
        media.setAttribute("aria-label", "Galería de experiencia");
        media.querySelectorAll("img").forEach((img, i) => {
          img.setAttribute("tabindex", i === 0 ? "0" : "-1");
          img.setAttribute("draggable", "false");
        });
        const mainEl = media.querySelector("img.main");
        if (mainEl) mainEl.setAttribute("aria-current", "true");

        // Intercambia SOLO el contenido (src/alt), no las clases ni posiciones
        function swapContent(thumbex) {
          if (!thumbex || !mainEl || thumbex === mainEl) return;

          // intercambia src y alt
          const tmpSrc = mainEl.src;
          const tmpAlt = mainEl.alt;

          mainEl.src = thumbex.src;
          mainEl.alt = thumbex.alt;

          thumbex.src = tmpSrc;
          thumbex.alt = tmpAlt;

          // marca visual/a11y
          media
            .querySelectorAll("img")
            .forEach((img) => img.removeAttribute("aria-current"));
          mainEl.setAttribute("aria-current", "true");
          thumbex.focus({
            preventScroll: true
          });
        }

        // Click/teclado
        media.addEventListener("click", (e) => {
          const t = e.target.closest("img.thumbex");
          if (t) swapContent(t);
        });
        media.addEventListener("keydown", (e) => {
          const t = e.target.closest("img.thumbex");
          if (!t) return;
          if (e.key === "Enter" || e.key === " ") {
            e.preventDefault();
            swapContent(t);
          }
        });

        // Auto-rotación: usa siempre el primer thumb visible
        function next() {
          const firstThumbex = media.querySelector("img.thumbex");
          if (firstThumbex) swapContent(firstThumbex);
        }

        let timer = null;
        const start = () => {
          if (!timer) timer = setInterval(next, ROTATE_MS);
        };
        const stop = () => {
          if (timer) {
            clearInterval(timer);
            timer = null;
          }
        };

        card.addEventListener("mouseenter", stop);
        card.addEventListener("mouseleave", start);
        card.addEventListener("focusin", stop);
        card.addEventListener("focusout", start);
        card.addEventListener("touchstart", stop, {
          passive: true
        });
        card.addEventListener("touchend", start, {
          passive: true
        });

        // Desfase para que no cambien todas a la vez
        setTimeout(start, Math.random() * 1200 + 300);
      }

      document.querySelectorAll(".xp-card").forEach(initXpCard);
    })();
  </script>

  <!-- Fotos de Experiancias, pantalla flotante -->

  <script>
    (() => {
      // ===== Lightbox =====
      const modal = document.getElementById("xpLightbox");
      const imgEl = modal.querySelector("#xpLbImg");
      const countEl = modal.querySelector(".xp-lb__count");
      const prevBt = modal.querySelector(".prev");
      const nextBt = modal.querySelector(".next");

      let gallery = []; // {src, alt}
      let i = 0;
      let lastFocus = null;
      let touchX = null;

      function set(idx) {
        i = (idx + gallery.length) % gallery.length;
        const {
          src,
          alt
        } = gallery[i];
        imgEl.src = src;
        imgEl.alt = alt || "Imagen";
        if (countEl) countEl.textContent = `${i + 1} / ${gallery.length}`;
      }

      function openFromCard(card, startSrc) {
        // construye la lista: primero la main, luego todas las .thumbex del card
        const main = card.querySelector("img.main");
        const thumbs = [...card.querySelectorAll("img.thumbex")];
        const list = [main, ...thumbs].filter(Boolean);

        gallery = list.map((el) => ({
          src: el.getAttribute("src"),
          alt: el.getAttribute("alt"),
        }));
        // si se hizo click en una miniatura, arrancar en esa
        const startIndex = gallery.findIndex((g) => g.src === startSrc);
        set(startIndex >= 0 ? startIndex : 0);

        lastFocus = document.activeElement;
        modal.hidden = false;
        document.addEventListener("keydown", onKey);
        setTimeout(() => nextBt.focus(), 0);
      }

      function close() {
        modal.hidden = true;
        imgEl.removeAttribute("src");
        document.removeEventListener("keydown", onKey);
        if (lastFocus) lastFocus.focus();
      }
      const next = () => set(i + 1);
      const prev = () => set(i - 1);

      function onKey(e) {
        if (e.key === "Escape") close();
        if (e.key === "ArrowRight") next();
        if (e.key === "ArrowLeft") prev();

        // trap de foco básico
        if (e.key === "Tab") {
          const focusables = modal.querySelectorAll("button,[data-close]");
          const first = focusables[0],
            last = focusables[focusables.length - 1];
          if (e.shiftKey && document.activeElement === first) {
            last.focus();
            e.preventDefault();
          } else if (!e.shiftKey && document.activeElement === last) {
            first.focus();
            e.preventDefault();
          }
        }
      }

      // clic en backdrop o botón cerrar
      modal
        .querySelectorAll("[data-close]")
        .forEach((b) => b.addEventListener("click", close));
      modal
        .querySelector(".xp-lb__backdrop")
        .addEventListener("click", close);
      prevBt.addEventListener("click", prev);
      nextBt.addEventListener("click", next);

      // swipe simple
      imgEl.addEventListener(
        "touchstart",
        (e) => (touchX = e.changedTouches[0].clientX), {
          passive: true
        }
      );
      imgEl.addEventListener(
        "touchend",
        (e) => {
          if (touchX == null) return;
          const dx = e.changedTouches[0].clientX - touchX;
          if (Math.abs(dx) > 40)(dx < 0 ? next : prev)();
          touchX = null;
        }, {
          passive: true
        }
      );

      // (opcional) desactivar clic derecho
      modal.addEventListener("contextmenu", (e) => e.preventDefault());

      // ===== Hook: abrir desde cualquier .xp-card =====
      document.querySelectorAll(".xp-card .xp-media").forEach((media) => {
        media.addEventListener("click", (e) => {
          const img = e.target.closest("img");
          if (!img) return;
          // sube al card contenedor
          const card = e.currentTarget.closest(".xp-card");
          openFromCard(card, img.getAttribute("src"));
        });
        // teclado: Enter/Espacio en las miniaturas o main
        media.addEventListener("keydown", (e) => {
          const img = e.target.closest("img");
          if (!img) return;
          if (e.key === "Enter" || e.key === " ") {
            e.preventDefault();
            const card = e.currentTarget.closest(".xp-card");
            openFromCard(card, img.getAttribute("src"));
          }
        });
      });
    })();
  </script>

  <!-- order GALERIA  -->

  <script>
    (() => {
      const grid = document.getElementById("galeria");
      if (!grid) return;

      grid.addEventListener("click", (e) => {
        const a = e.target.closest("a.tile");
        if (!a) return;
        e.preventDefault();

        // Colección de la galería (en orden visual)
        const items = [...grid.querySelectorAll("a.tile")].map((el) => ({
          src: el.dataset.full || el.getAttribute("href"),
          alt: el.querySelector("img")?.alt || "Imagen",
        }));

        // índice de la imagen clickeada
        const start = items.findIndex(
          (i) => i.src === (a.dataset.full || a.href)
        );

        // Usa las funciones del lightbox anterior (openFromArray)
        openXpLightbox(items, start); // <-- define esto en tu script del lightbox
      });
    })();
  </script>

  <!-- Galeria Flotante -->

  <script>
    (() => {
      const modal = document.getElementById("xpLightbox");
      const imgEl = document.getElementById("xpLbImg");
      const countEl = document.getElementById("xpLbCount");
      const prevBtn = document.getElementById("xpPrev");
      const nextBtn = document.getElementById("xpNext");

      let items = [];
      let index = 0;
      let keyHandler,
        startX = null;

      function clamp(i, len) {
        return ((i % len) + len) % len;
      }

      function render(i) {
        if (!items.length) return;
        index = clamp(i, items.length);
        const it = items[index];

        // transición suave
        imgEl.style.opacity = "0";
        const tmp = new Image();
        tmp.onload = () => {
          imgEl.src = it.src;
          imgEl.alt = it.alt || "Imagen";
          imgEl.style.opacity = "1";
          countEl.textContent = `${index + 1} / ${items.length}`;
          // Preload vecinos
          const n1 = new Image();
          n1.src = items[clamp(index + 1, items.length)].src;
          const p1 = new Image();
          p1.src = items[clamp(index - 1, items.length)].src;
        };
        tmp.src = it.src;
      }

      function openFromArray(arr, start = 0) {
        items = arr || [];
        if (!items.length) return;
        modal.hidden = false;
        document.body.classList.add("pdf-open"); // bloquea scroll (ya tienes la clase en CSS)
        render(start);

        // teclado
        keyHandler = (e) => {
          if (e.key === "Escape") close();
          else if (e.key === "ArrowRight") render(index + 1);
          else if (e.key === "ArrowLeft") render(index - 1);
        };
        window.addEventListener("keydown", keyHandler);

        // mouse/touch
        prevBtn.onclick = () => render(index - 1);
        nextBtn.onclick = () => render(index + 1);
        modal.addEventListener("click", (e) => {
          if (e.target.closest("[data-close]")) close();
        });

        // swipe
        imgEl.addEventListener(
          "touchstart",
          (e) => {
            startX = e.touches[0].clientX;
          }, {
            passive: true
          }
        );
        imgEl.addEventListener("touchend", (e) => {
          if (startX == null) return;
          const dx = e.changedTouches[0].clientX - startX;
          if (Math.abs(dx) > 40)
            dx < 0 ? render(index + 1) : render(index - 1);
          startX = null;
        });

        // anti descargas fáciles (no es 100% bloqueable)
        imgEl.addEventListener("contextmenu", (e) => e.preventDefault());
        imgEl.setAttribute("draggable", "false");
      }

      function close() {
        modal.hidden = true;
        document.body.classList.remove("pdf-open");
        window.removeEventListener("keydown", keyHandler);
        prevBtn.onclick = nextBtn.onclick = null;
      }

      // expón la función para tu grid:
      window.openXpLightbox = openFromArray;
    })();

    const prevBtn = document.getElementById("xpPrev");
    const nextBtn = document.getElementById("xpNext");

    function render(i) {
      /* … tu lógica para mostrar la imagen i … */
    }

    prevBtn.onclick = () => render(index - 1);
    nextBtn.onclick = () => render(index + 1);

    // Teclado
    window.addEventListener("keydown", (e) => {
      if (e.key === "ArrowLeft") render(index - 1);
      if (e.key === "ArrowRight") render(index + 1);
    });
  </script>

  <!-- PDF FLOTANTES -->

  <script>
    (function() {
      const modal = document.getElementById("pdfModal");
      const frame = document.getElementById("pdfFrame");
      const fallback = document.getElementById("pdfFallback");
      const closers = modal.querySelectorAll("[data-close]");
      let lastFocus = null;

      // 1) Interceptar enlaces a PDF dentro de la sección (o document)
      document.addEventListener("click", (e) => {
        const a = e.target.closest('a[href$=".pdf"]');
        if (!a) return;
        // si quieres limitarlo a esta sección: if(!a.closest('#experiencias')) return;

        e.preventDefault();
        openPDF(a.href, a.getAttribute("aria-label") || a.textContent.trim());
      });

      // 2) Abrir modal con el PDF sin UI de descarga
      function openPDF(url, title = "Documento") {
        lastFocus = document.activeElement;
        // truco: parámetros para ocultar UI en la mayoría de viewers nativos
        const clean = url.split("#")[0];
        const params = "#toolbar=0&navpanes=0&scrollbar=0&zoom=page-fit";
        frame.src = clean + params;

        // accesibilidad y estado
        modal.querySelector("#pdf-title").textContent = title;
        fallback.hidden = true;
        modal.hidden = false;
        document.body.classList.add("pdf-open");
        setTimeout(() => modal.querySelector(".pdf-close").focus(), 0);

        // bloquear tecla contexto (desanima guardado)
        modal.addEventListener("contextmenu", prevent, {
          capture: true
        });
        document.addEventListener("keydown", onKey);
      }

      // 3) Cerrar
      function closePDF() {
        modal.hidden = true;
        frame.src = "about:blank";
        document.body.classList.remove("pdf-open");
        document.removeEventListener("keydown", onKey);
        modal.removeEventListener("contextmenu", prevent, {
          capture: true
        });
        if (lastFocus) lastFocus.focus();
      }

      closers.forEach((b) => b.addEventListener("click", closePDF));
      modal
        .querySelector(".pdf-backdrop")
        .addEventListener("click", closePDF);

      function onKey(e) {
        if (e.key === "Escape") return closePDF();
        if (e.key === "Tab") {
          // trap focus simple
          const f = modal.querySelectorAll("button,[href],iframe");
          const first = f[0],
            last = f[f.length - 1];
          if (e.shiftKey && document.activeElement === first) {
            last.focus();
            e.preventDefault();
          } else if (!e.shiftKey && document.activeElement === last) {
            first.focus();
            e.preventDefault();
          }
        }
      }

      function prevent(e) {
        e.preventDefault();
      }

      // 4) Fallback: si el iframe falla en cargar, muestra mensaje
      frame.addEventListener("error", () => {
        fallback.hidden = false;
      });
    })();
  </script>

  <script>
    (() => {
      const hub = document.querySelector('#pasch-hub');
      if (!hub) return;

      // Tabs
      const tabs = hub.querySelectorAll('.ihub__tab');
      const panels = hub.querySelectorAll('.ihub__panel');

      function activateTab(tab) {
        tabs.forEach(t => {
          const selected = t === tab;
          t.classList.toggle('is-active', selected);
          t.setAttribute('aria-selected', String(selected));
        });
        panels.forEach(p => p.classList.toggle('is-active', p.id === tab.getAttribute('aria-controls')));
      }

      tabs.forEach(t => {
        t.addEventListener('click', () => activateTab(t));
        t.addEventListener('keydown', (e) => {
          if (e.key === 'ArrowRight' || e.key === 'ArrowLeft') {
            const order = Array.from(tabs);
            const i = order.indexOf(t);
            const next = e.key === 'ArrowRight' ? order[(i + 1) % order.length] : order[(i - 1 + order.length) % order.length];
            next.focus();
            activateTab(next);
          }
        });
      });

      // Hook PDF (usa tu modal si existe)
      hub.addEventListener('click', (e) => {
        const btn = e.target.closest('[data-pdf]');
        if (!btn) return;
        e.preventDefault();
        const file = btn.getAttribute('data-pdf');
        const modal = document.querySelector('.pdf-modal');
        const frame = document.querySelector('#pdfFrame');
        if (modal && frame) {
          frame.src = file;
          modal.hidden = false;
          document.body.classList.add('pdf-open');
        } else {
          window.open(file, '_blank', 'noopener');
        }
      });
    })();
  </script>


</body>

</html>
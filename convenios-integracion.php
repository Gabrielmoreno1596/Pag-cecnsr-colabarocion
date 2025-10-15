<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CECNSR - Proyecto de Integración</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
  <link rel="stylesheet" href="styles.css?v=3" />
  <link rel="stylesheet" href="assets/css/style-convenios.css?v=3" />
  <link rel="stylesheet" href="assets/css/style-integracion.css?v=3" />
  <link rel="shortcut icon" href="assets/1_CECNSR.png" type="image/x-icon" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script src="assets/partials/header.js"></script>
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/contribuciones/sitececnsr/assets/partials/header.php'; ?>

  <main id="integracion-site">
    <!-- HERO -->
    <section class="int-hero" aria-labelledby="int-hero-title">
      <!-- Fondo con 2 capas para el crossfade -->
      <div
        class="int-hero__bg"
        role="img"
        aria-label="Estudiantes en sesión formativa">
        <span
          class="slide is-on"
          style="background-image: url('assets/integra-img1.jpeg')"></span>
        <span class="slide" aria-hidden="true"></span>
      </div>

      <div class="int-hero__overlay"></div>

      <div class="container int-hero__inner">
        <p class="eyebrow">
          Proyecto institucional · Convivencia · Excelencia
        </p>
        <h1 id="int-hero-title">Proyecto de <span>Integración</span></h1>
        <p class="lead">
          Acompañamiento académico, social y espiritual que potencia hábitos
          de estudio, comunicación empática, prevención y servicio — con
          alianzas familia–escuela–comunidad.
        </p>
        <div class="cta-row">
          <a class="btn-solid-int" href="#ruta">Ver ruta de trabajo</a>
          <a class="btn-outline-int" href="#becas">Becas · Generación que Florece</a>
        </div>
      </div>

      <!-- Chips de pilares -->
      <div class="int-chips">
        <div class="chip">
          <i class="fa-solid fa-hand-holding-heart"></i> Convivencia & cultura
          del encuentro
        </div>
        <div class="chip">
          <i class="fa-solid fa-book-open-reader"></i> Hábitos de estudio y
          apoyo entre pares
        </div>
        <div class="chip">
          <i class="fa-solid fa-people-group"></i> Familia – Escuela –
          Comunidad
        </div>
      </div>
    </section>

    <!-- PROPÓSITO -->
    <section class="section int-about" id="que-es">
      <div class="container grid-2">
        <div class="about-copy">
          <h2 class="section-title">Propósito & alcance</h2>
          <div class="title-divider" aria-hidden="true"></div>
          <p class="big">
            El Proyecto de Integración articula academia, convivencia y fe
            para fortalecer la autoestima, la autodisciplina y el liderazgo
            juvenil. Integra rutinas de estudio, trabajo colaborativo,
            resolución pacífica de conflictos y acciones de servicio.
          </p>
          <ul class="check">
            <li>Ambiente seguro y clima de aula positivo.</li>
            <li>Tutorías entre pares y acompañamiento grupal.</li>
            <li>
              Coherencia con PI & 4PE, PASCH, Proyecto Dual y programas de
              becas.
            </li>
          </ul>
        </div>
        <figure class="about-media">
          <img
            src="assets/integra-img2.jpeg"
            alt="Sesión plenaria con estudiantes" />
          <!-- <figcaption>Formación para el encuentro y el servicio</figcaption> -->
        </figure>
      </div>
    </section>

    <!-- RUTA -->
    <section class="section int-route" id="ruta">
      <div class="container">
        <h2 class="section-title">Ruta de trabajo</h2>
        <div class="title-divider" aria-hidden="true"></div>

        <div class="route-grid">
          <article class="step">
            <span class="n">1</span>
            <h3>Diagnóstico inicial</h3>
            <p>Autoevaluaciones breves y metas de mejora por grupo.</p>
          </article>
          <article class="step">
            <span class="n">2</span>
            <h3>Laboratorios en aula</h3>
            <p>Rutinas de estudio, cooperación y comunicación empática.</p>
          </article>
          <article class="step">
            <span class="n">3</span>
            <h3>Convivencias formativas</h3>
            <p>Liderazgo, prevención y proyectos de servicio.</p>
          </article>
          <article class="step">
            <span class="n">4</span>
            <h3>Seguimiento & proyección</h3>
            <p>
              Bitácoras, evidencias y enlace con programas institucionales.
            </p>
          </article>
        </div>
      </div>
    </section>

    <!-- BECAS · GENERACIÓN QUE FLORECE -->
    <!-- BECAS · GENERACIÓN QUE FLORECE -->
    <section
      class="section int-scholar"
      id="becas"
      aria-labelledby="beca-title"
      data-state="active"
      data-start="2025-11-01"
      data-end="2025-11-15">
      <!-- opcional -->
      <!-- opcional -->
      <div class="container">
        <!-- Banner de estado -->
        <div class="status-banner" role="status" aria-live="polite">
          <span class="dot" aria-hidden="true"></span>
          <span class="status-text">Convocatoria activa</span>
          <time class="status-dates"></time>
        </div>

        <header class="scholar-head">
          <h2 id="beca-title" class="section-title__gob">
            Becas · Generación que Florece
          </h2>
          <div class="title-divider" aria-hidden="true"></div>

          <div class="container grid-2">
            <p class="muted">
              Requisitos orientativos para postular (según trayectoria).
              Verifica siempre la convocatoria vigente en el sitio oficial:
              <a
                class="link btn-outline-int text-color__gob"
                href="https://integracion.gob.sv/proceso-formativo/"
                target="_blank"
                rel="noopener">
                integracion.gob.sv/proceso-formativo </a>.
            </p>
            <figure class="about-media">
              <img
                src="assets/integracion/logo-direccion-integracion.png"
                alt="" />
              <figcaption></figcaption>
            </figure>
          </div>
        </header>

        <!-- …(aquí van las tarjetas de Trayectorias, Actividades y el afiche, como ya lo tienes)… -->

        <!-- CTAs por estado -->
        <div class="cta-switch">
          <!-- ACTIVA -->
          <div class="state-cta state-active">
            <a class="btn-solid-int" href="#contacto">Quiero postular / más info</a>
            <a
              class="btn-outline text-color"
              href="assets/afiche-gf.jpg"
              download>Descargar afiche</a>
          </div>

          <!-- PRÓXIMAMENTE -->
          <div class="state-cta state-upcoming">
            <a class="btn-solid-int" href="#contacto">Avisarme próximas fechas</a>
            <!--     <a
                class="btn-outline-int text-color"
                href="https://integracion.gob.sv/proceso-formativo/"
                target="_blank"
                rel="noopener"
              >
                Ver detalles oficiales
              </a> -->
          </div>

          <!-- CERRADA -->
          <div class="state-cta state-closed">
            <a class="btn-solid-int" href="#contacto">Consultar próximas fechas</a>
            <a
              class="btn-outline-int text-color"
              href="https://integracion.gob.sv/proceso-formativo/"
              target="_blank"
              rel="noopener">
              Requisitos y procesos
            </a>
          </div>
        </div>
      </div>
    </section>
    <section class="section int-scholar-body" aria-labelledby="req-title">
      <div class="container">
        <h2 id="req-title" class="section-title">Requisitos y actividades</h2>
        <div class="title-divider" aria-hidden="true"></div>

        <!-- Trayectorias -->
        <div class="tracks">
          <article class="track">
            <h3>Trayectoria Universitaria</h3>
            <ul>
              <li>
                <strong>Al menos 6 actividades</strong> (Curso de ADN y
                refuerzos obligatorios).
              </li>
              <li><strong>Nota global mínima 7.0</strong>.</li>
            </ul>
          </article>

          <article class="track">
            <h3>Carrera Técnica (1 a 3 años)</h3>
            <ul>
              <li>
                <strong>Al menos 4 actividades</strong> (Curso de ADN y
                refuerzos obligatorios).
              </li>
              <li><strong>Nota global mínima 6.0</strong>.</li>
            </ul>
          </article>

          <article class="track">
            <h3>Curso Vocacional (2 meses a 1 año)</h3>
            <ul>
              <li><strong>2 actividades</strong>.</li>
              <li><strong>Nota global mínima 6.0</strong>.</li>
            </ul>
          </article>
        </div>

        <!-- Actividades válidas -->
        <h3 class="subcap">Actividades válidas</h3>
        <div class="acts">
          <article class="act">
            <h4>Curso ADN de la Pobreza y Cultura de la Integración</h4>
            <p>Jornada teórica–práctica de ~6 horas (obligatoria).</p>
          </article>
          <article class="act">
            <h4>Refuerzos escolares</h4>
            <p>
              Matemática y Lenguaje (obligatorios para trayectorias
              universitaria y técnica).
            </p>
          </article>
          <article class="act">
            <h4>Charlas con profesionales / paneles</h4>
            <p>Exploración vocacional y proyección laboral.</p>
          </article>
          <article class="act">
            <h4>Capacitación en empresa / práctica</h4>
            <p>Experiencia guiada (mínimo sugerido: 4&nbsp;h por jornada).</p>
          </article>
          <article class="act">
            <h4>Voluntariado en la comunidad</h4>
            <p>
              Servicio social (referencia del afiche: 40&nbsp;h en total).
            </p>
          </article>
          <article class="act">
            <h4>Visitas guiadas a universidades y centros</h4>
            <p>Conexión con la educación superior y el mundo del trabajo.</p>
          </article>
          <article class="act">
            <h4>Participación en programas integradores</h4>
            <p>
              Proyectos como Integración Comunidad, Interfases, Escuelas
              Integradoras, ferias.
            </p>
          </article>
        </div>

        <!-- Afiche --><!-- 
          <figure class="poster">
            <img
              src="assets/4pe/afiche-invitacion.png"
              alt="Afiche Generación que Florece: requisitos"
              loading="lazy"
            />
            <figcaption>
              Referencia visual de requisitos y actividades (institución).
            </figcaption>
          </figure> -->

        <div class="cta-row">
          <a class="btn-solid-int" href="#contacto">Más información</a>
          <!-- <a
              class="btn-outline-int text-color"
              href="assets/afiche-gf.jpg"
              download
              >Descargar afiche</a
            > -->
        </div>
      </div>
    </section>

    <!-- GALERÍA -->
    <section class="section int-gallery">
      <div class="container">
        <h2 class="section-title">Galería</h2>
        <div class="title-divider" aria-hidden="true"></div>
        <div class="gallery">
          <a href="assets/integra-img1.jpeg"><img src="assets/integra-img1.jpeg" alt="" /></a>
          <a href="assets/integra-img2.jpeg"><img src="assets/integra-img2.jpeg" alt="" /></a>
          <a href="assets/integra-img3.jpeg"><img src="assets/integra-img3.jpeg" alt="" /></a>
          <a href="assets/integra-img4.jpeg"><img src="assets/integra-img4.jpeg" alt="" /></a>
        </div>
        <p class="credits">
          Créditos: CECNSR / Proyecto de Integración (uso educativo).
        </p>
      </div>

      <div
        id="lb"
        class="lb"
        aria-hidden="true"
        role="dialog"
        aria-modal="true"
        aria-label="Visor de imágenes">
        <button class="lb__close" aria-label="Cerrar (Esc)">✕</button>

        <figure class="lb__figure">
          <img class="lb__img" alt="" />
          <figcaption class="lb__cap">
            <span class="lb__text"></span>
            <span class="lb__count"></span>
          </figcaption>
        </figure>

        <button class="lb__nav lb__prev" aria-label="Anterior">‹</button>
        <button class="lb__nav lb__next" aria-label="Siguiente">›</button>
      </div>
    </section>

    <!-- CTA / CONTACTO -->
    <section
      class="section int-cta"
      id="contacto"
      aria-labelledby="cta-title">
      <div class="container">
        <div class="cta-card">
          <h2 id="cta-title" class="section-title">
            ¿Deseas integrar tu grupo o aclarar requisitos?
          </h2>
          <div class="title-divider" aria-hidden="true"></div>
          <p>Escríbenos y con gusto te acompañamos.</p>
          <form class="contact-form" action="#" method="post">
            <div class="form-grid">
              <label>Nombre completo<input type="text" required /></label>
              <label>Correo electrónico<input type="email" required /></label>
              <label>Teléfono<input type="tel" /></label>
              <label>Interés
                <select>
                  <option>Proyecto de Integración</option>
                  <option>Generación que Florece</option>
                  <option>Refuerzos / Tutorías</option>
                  <option>Otro</option>
                </select>
              </label>
              <label class="full">Mensaje<textarea
                  rows="4"
                  placeholder="Cuéntanos tu necesidad…"></textarea>
              </label>
            </div>
            <button class="btn-solid-int">Enviar consulta</button>
          </form>
        </div>
      </div>
    </section>
  </main>

  <!-- fin main -->

  <!-- footer -->
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/contribuciones/sitececnsr/assets/partials/footer.php'; ?>

  <!-- HEADER -->



  <script src="script.js"></script>

  <script>
    (() => {
      const sec = document.querySelector(".int-scholar");
      if (!sec) return;

      const bannerText = sec.querySelector(".status-text");
      const bannerDates = sec.querySelector(".status-dates");

      // 1) Si hay fechas, calcular estado automáticamente
      const startAttr = sec.getAttribute("data-start");
      const endAttr = sec.getAttribute("data-end");

      function format(dateStr) {
        try {
          const d = new Date(dateStr + "T00:00:00");
          return d.toLocaleDateString(undefined, {
            year: "numeric",
            month: "short",
            day: "2-digit",
          });
        } catch (_) {
          return "";
        }
      }

      if (startAttr && endAttr) {
        const now = new Date();
        const start = new Date(startAttr + "T00:00:00");
        const end = new Date(endAttr + "T23:59:59");

        let state = "upcoming";
        if (now >= start && now <= end) state = "active";
        if (now > end) state = "closed";

        sec.setAttribute("data-state", state);

        // Texto del banner
        if (state === "active")
          bannerText.textContent = "Convocatoria activa";
        if (state === "upcoming") bannerText.textContent = "Próximamente";
        if (state === "closed")
          bannerText.textContent = "Convocatoria cerrada";

        bannerDates.textContent = ` · ${format(startAttr)} — ${format(
            endAttr
          )}`;
      } else {
        // 2) Manual: solo ajusta texto del banner según data-state
        const state = sec.getAttribute("data-state") || "upcoming";
        if (state === "active")
          bannerText.textContent = "Convocatoria activa";
        if (state === "upcoming") bannerText.textContent = "Próximamente";
        if (state === "closed")
          bannerText.textContent = "Convocatoria cerrada";
        bannerDates.textContent = "";
      }
    })();
  </script>

  <!-- FLoat -->
  <script>
    /* Lightbox para .int-gallery .gallery */
    (function() {
      const thumbs = document.querySelectorAll(".int-gallery .gallery a");
      if (!thumbs.length) return;

      const lb = document.getElementById("lb");
      const img = lb.querySelector(".lb__img");
      const cap = lb.querySelector(".lb__text");
      const count = lb.querySelector(".lb__count");
      const btnPrev = lb.querySelector(".lb__prev");
      const btnNext = lb.querySelector(".lb__next");
      const btnClose = lb.querySelector(".lb__close");

      const items = Array.from(thumbs).map((a) => ({
        src: a.getAttribute("href") || a.querySelector("img")?.src,
        alt: a.dataset.caption || a.querySelector("img")?.alt || "",
        el: a,
      }));

      let idx = 0,
        startX = 0,
        moving = false;

      function preload(i) {
        const it = items[(i + items.length) % items.length];
        if (!it) return;
        const n = new Image();
        n.src = it.src;
      }

      function show(i) {
        idx = (i + items.length) % items.length;
        const {
          src,
          alt
        } = items[idx];
        img.src = src;
        img.alt = alt;
        cap.textContent = alt;
        count.textContent = `${idx + 1} / ${items.length}`;
        preload(idx + 1);
        preload(idx - 1);
      }

      function open(i) {
        show(i);
        lb.classList.add("is-open");
        lb.setAttribute("aria-hidden", "false");
        document.body.classList.add("lb-open");
        btnClose.focus();
        document.addEventListener("keydown", onKey);
      }

      function close() {
        lb.classList.remove("is-open");
        lb.setAttribute("aria-hidden", "true");
        document.body.classList.remove("lb-open");
        document.removeEventListener("keydown", onKey);
      }

      function onKey(e) {
        if (e.key === "Escape") close();
        else if (e.key === "ArrowRight") show(idx + 1);
        else if (e.key === "ArrowLeft") show(idx - 1);
      }

      // Abrir desde miniaturas
      items.forEach((it, i) => {
        it.el.addEventListener("click", (ev) => {
          ev.preventDefault();
          open(i);
        });
      });

      // Controles
      btnPrev.addEventListener("click", () => show(idx - 1));
      btnNext.addEventListener("click", () => show(idx + 1));
      btnClose.addEventListener("click", close);

      // Cerrar clicando el fondo
      lb.addEventListener("click", (e) => {
        if (e.target === lb) close();
      });

      // Swipe en móvil
      lb.addEventListener(
        "touchstart",
        (e) => {
          if (!e.touches[0]) return;
          startX = e.touches[0].clientX;
          moving = true;
        }, {
          passive: true
        }
      );
      lb.addEventListener(
        "touchmove",
        (e) => {
          if (!moving || !e.touches[0]) return;
          const dx = e.touches[0].clientX - startX;
          if (Math.abs(dx) > 60) {
            moving = false;
            if (dx < 0) show(idx + 1);
            else show(idx - 1);
          }
        }, {
          passive: true
        }
      );
      lb.addEventListener("touchend", () => (moving = false));
    })();
  </script>

  <!-- Header , animados  -->

  <script>
    (function() {
      // ==== CONFIGURA AQUÍ TUS IMÁGENES ====
      const IMAGES = [
        "assets/integra-img1.jpeg",
        "assets/integra-img2.jpeg",
        "assets/integra-img3.jpeg",
        "assets/integracion/integra-img5-salon.jpeg",
      ];
      const INTERVAL_MS = 6000; // tiempo que cada foto permanece
      const FADE_MS = 1200; // duración del crossfade (igual a la del CSS)

      // Respeta "reducir movimiento"
      const prefersReduce = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
      ).matches;
      if (prefersReduce || IMAGES.length < 2) return; // se queda con la primera

      const bg = document.querySelector(".int-hero__bg");
      if (!bg) return;
      const slides = bg.querySelectorAll(".slide");
      if (slides.length < 2) return;

      let idx = 0;
      let timer = null;

      // Preload para evitar flashes
      const cache = new Set();
      const preload = (src) => {
        if (cache.has(src)) return;
        const img = new Image();
        img.src = src;
        cache.add(src);
      };

      // Inicial: asegura primera imagen y precarga la segunda
      slides[0].style.backgroundImage = `url('${IMAGES[0]}')`;
      preload(IMAGES[1]);

      function next() {
        const nextIdx = (idx + 1) % IMAGES.length;

        // capa visible y capa oculta
        const visible = bg.querySelector(".slide.is-on");
        const hidden = Array.from(slides).find((s) => s !== visible);

        // cargar siguiente imagen en la capa oculta
        hidden.style.backgroundImage = `url('${IMAGES[nextIdx]}')`;

        // crossfade
        visible.classList.remove("is-on");
        hidden.classList.add("is-on");

        // avanzar índice y precargar la que viene
        idx = nextIdx;
        preload(IMAGES[(idx + 1) % IMAGES.length]);
      }

      function start() {
        stop();
        timer = setInterval(next, INTERVAL_MS);
      }

      function stop() {
        if (timer) clearInterval(timer);
      }

      // Pausa cuando la pestaña no está visible (ahorra batería)
      document.addEventListener("visibilitychange", () => {
        if (document.hidden) stop();
        else start();
      });

      // Pausa si el usuario pasa el mouse sobre el hero (por si quiere leer tranquilo)
      const hero = document.querySelector(".int-hero");
      if (hero) {
        hero.addEventListener("mouseenter", stop);
        hero.addEventListener("mouseleave", start);
      }

      // Arrancar
      start();

      // Exponer una API mínima (opcional, por si luego quieres controlar desde botones)
      window.CECNSRHeroSlider = {
        next,
        start,
        stop
      };
    })();
  </script>
</body>

</html>
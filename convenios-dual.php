<?php require_once __DIR__ . '/config.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CECNSR | Proyecto Dual</title>

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />

  <link rel="stylesheet" href="<?= asset('styles.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/css/style-dual.css') ?>">
  <link rel="stylesheet" href="<?= asset('assets/css/style-convenios.css') ?>">

  <!-- Favicon básico (PNG) -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <meta name="theme-color" content="#7f2d3c">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

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
  <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>
  <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

  <!-- tu contenido -->
  <!-- ========== HERO DUAL ========== -->
  <section class="dual-hero dual-hero--elegant">
    <div class="dual-hero__container">
      <div class="dual-hero__col dual-hero__col--text">
        <p class="dual-hero__eyebrow">
          Convenios · Formación Técnico-Laboral
        </p>
        <h1 class="dual-hero__title">
          Proyecto DUAL — estudiar y trabajar en Alemania
        </h1>
        <div class="dual-hero__divider"></div>
        <p class="dual-hero__lead">
          Acompañamos a nuestros egresados para que continúen su formación
          técnica y laboral en Alemania a través de un modelo dual:
          <strong>estudio + trabajo</strong>, con preparación académica y
          cultural en el CECNSR.
        </p>
        <ul class="dual-hero__points">
          <li>Clases de alemán y orientación intercultural en el colegio.</li>
          <li>Acompañamiento para postulación, entrevistas y documentos.</li>
          <li>Itinerario claro: desde la convocatoria hasta el viaje.</li>
        </ul>
      </div>

      <div class="dual-hero__col dual-hero__col--media">
        <figure
          class="dual-hero__figure dual-carousel"
          data-interval="5000"
          aria-labelledby="dual-caption">
          <img
            id="dual-slide"
            src="assets/dual/dual-img2.jpeg"
            alt="Estudiantes CECNSR rumbo al programa dual" />
          <figcaption
            class="dual-hero__caption"
            id="dual-caption"></figcaption>

          <!-- Controles -->
          <button
            class="dual-carousel__btn dual-carousel__btn--prev"
            aria-label="Imagen anterior">
            ‹
          </button>
          <button
            class="dual-carousel__btn dual-carousel__btn--next"
            aria-label="Imagen siguiente">
            ›
          </button>

          <!-- Indicadores (dots) -->
          <div
            class="dual-carousel__dots"
            role="tablist"
            aria-label="Galería Proyecto DUAL">
            <button role="tab" aria-selected="true" data-index="0"></button>
            <button role="tab" aria-selected="false" data-index="1"></button>
            <button role="tab" aria-selected="false" data-index="2"></button>
            <button role="tab" aria-selected="false" data-index="3"></button>
          </div>
        </figure>
      </div>
    </div>
  </section>

  <section class="main-content">
    <!-- QUÉ ES -->
    <section class="section">
      <div class="card">
        <h2 class="section-title">¿Qué es el Proyecto DUAL?</h2>
        <div class="title-divider" aria-hidden="true"></div>
        <p>
          Es una vía de <strong>formación profesional en Alemania</strong> que
          combina estudios en una escuela técnica con experiencia laboral
          remunerada en empresas. En el CECNSR preparamos a los jóvenes con
          idioma, hábitos de trabajo y acompañamiento de postulación.
        </p>
        <p class="note">
          Desde <strong>2018</strong> nuestros estudiantes cuentan con esta
          oportunidad, integrando estudio y trabajo con los principios
          institucionales de <em>disciplina personal</em>,
          <em>grado de servicio</em>, <em>tarjeta de presentación</em> y
          <em>prevención personal</em>. :contentReference[oaicite:0]{index=0}
        </p>
      </div>
    </section>

    <!-- RUTA DEL ESTUDIANTE -->
    <section class="section">
      <div class="card">
        <h2 class="section-title">Ruta del estudiante</h2>
        <div class="title-divider" aria-hidden="true"></div>
        <ol class="timeline">
          <li>
            <span class="dot">1</span>
            <div class="tl-body">
              <strong>Convocatoria interna</strong> y sesiones informativas
              para familias.
            </div>
          </li>
          <li>
            <span class="dot">2</span>
            <div class="tl-body">
              <strong>Preparación</strong>: curso de alemán, hábitos de
              estudio y cultura laboral alemana.
            </div>
          </li>
          <li>
            <span class="dot">3</span>
            <div class="tl-body">
              <strong>Postulación</strong> a vacantes duales: CV, carta,
              entrevistas online.
            </div>
          </li>
          <li>
            <span class="dot">4</span>
            <div class="tl-body">
              <strong>Documentación</strong>: visado, seguros y trámites (con
              guía institucional).
            </div>
          </li>
          <li>
            <span class="dot">5</span>
            <div class="tl-body">
              <strong>Inicio en Alemania</strong>: escuela técnica + contrato
              de formación.
            </div>
          </li>
        </ol>
      </div>
    </section>

    <!-- REQUISITOS CLAVE -->
    <section class="section">
      <div class="grid-3">
        <article class="feature">
          <i class="fas fa-language"></i>
          <h3>Alemán</h3>
          <p>
            Nivel de idioma según vacante (meta habitual: A2–B1 antes de
            viajar).
          </p>
        </article>
        <article class="feature">
          <i class="fas fa-user-check"></i>
          <h3>Perfil</h3>
          <p>
            Responsabilidad académica, motivación por aprender y
            disponibilidad para reubicarse.
          </p>
        </article>
        <article class="feature">
          <i class="fas fa-file-contract"></i>
          <h3>Trámites</h3>
          <p>
            Documentos personales, entrevistas y requisitos de visado
            vigentes.
          </p>
        </article>
      </div>
    </section>

    <!-- PREPARACIÓN EN EL CECNSR (evidencia local) -->
    <section class="section prep" id="preparacion">
      <div class="card">
        <h2 class="section-title">Preparación en el CECNSR</h2>
        <div class="title-divider" aria-hidden="true"></div>

        <div class="prep-grid">
          <!-- Card 1 -->
          <article class="prep-card">
            <div class="prep-media">
              <img
                class="main"
                src="assets/dual/dual-img10.jpeg"
                alt="Planificación con coordinación" />
              <img
                class="thumb"
                src="assets/dual/dual-img11.jpeg"
                alt="Planificación con coordinación" />
              <img
                class="thumb"
                src="assets/dual/dual-img8.jpeg"
                alt="Planificación con coordinación" />
            </div>
            <h3 class="prep-title">Coordinación y asesoría</h3>
            <p class="prep-text">
              Reuniones de planificación y seguimiento académico con el equipo
              institucional.
            </p>
          </article>

          <!-- Card 2 -->
          <article class="prep-card">
            <div class="prep-media">
              <img
                class="main"
                src="assets/dual/dual-img12.jpeg"
                alt="Clase de alemán en el CECNSR" />
              <img
                class="thumb"
                src="assets/dual/dual-img13.jpeg"
                alt="Clase de alemán en el CECNSR" />
              <img
                class="thumb"
                src="assets/dual/dual-img5.jpeg"
                alt="Clase de alemán en el CECNSR" />
            </div>
            <h3 class="prep-title">Clases de alemán</h3>
            <p class="prep-text">
              Entrenamiento lingüístico continuo y simulación de entrevistas.
            </p>
          </article>

          <!-- Card 3 -->
          <article class="prep-card">
            <div class="prep-media">
              <img
                class="main"
                src="assets/dual/dual-img1.jpg"
                alt="Comunidad de apoyo" />
              <img
                class="thumb"
                src="assets/dual/dual-img3-24.jpeg"
                alt="Comunidad de apoyo" />
              <img
                class="thumb"
                src="assets/dual/dual-img4-24.jpeg"
                alt="Clase de alemán en el CECNSR" />
            </div>
            <h3 class="prep-title">Red de apoyo</h3>
            <p class="prep-text">
              Acompañamiento a estudiantes y familias durante el proceso.
            </p>
          </article>
        </div>
      </div>
    </section>

    <!-- EXPERIENCIAS / SALIDAS -->
    <section class="section">
      <div class="card">
        <h2 class="section-title">Galería</h2>
        <div class="title-divider" aria-hidden="true"></div>
        <div class="galleryDual">
          <a class="tile wide" href="assets/dual/dual-img2.jpeg"><img
              src="assets/dual/dual-img2.jpeg"
              alt="Grupo de estudiantes con la bandera" /></a>
          <a class="tile" href="assets/dual/dual-img3-24.jpeg"><img
              src="assets/dual/dual-img3-24.jpeg"
              alt="Familias y estudiantes antes de partir" /></a>
          <a class="tile" href="assets/dual/dual-img6.jpeg"><img src="assets/dual/dual-img6.jpeg" alt="Aula de preparación" /></a>
          <a class="tile wide" href="assets/dual/dual-img5.jpeg"><img src="assets/dual/dual-img5.jpeg" alt="Despedida en aeropuerto" /></a>
          <a class="tile" href="assets/dual/dual-img7.jpeg"><img src="assets/dual/dual-img7.jpeg" alt="Reunión de coordinación" /></a>
          <a class="tile wide" href="assets/dual/dual-img10.jpeg"><img
              src="assets/dual/dual-img10.jpeg"
              alt="Equipo listo para el reto" /></a>
          <a class="tile" href="assets/dual/dual-img12.jpeg"><img
              src="assets/dual/dual-img12.jpeg"
              alt="Equipo listo para el reto" /></a>
          <a class="tile" href="assets/dual/dual-img9.jpeg"><img src="assets/dual/dual-img9.jpeg" alt="Equipo listo para el reto" /></a>
        </div>
        <!-- <p class="note">
            Créditos: Comunidad educativa CECNSR (uso institucional).
          </p> -->
      </div>
      <!-- Float Galería -->

      <!-- Lightbox / Viewer -->
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

    <!-- CONTACTO -->
    <section class="section">
      <div class="card contact-card">
        <h2 class="section-title">Coordinación del Proyecto DUAL</h2>
        <div class="title-divider" aria-hidden="true"></div>
        <div class="contact">
          <div class="contact__item">
            <i class="fas fa-user"></i> Coordinación Académica CECNSR
          </div>
          <a class="contact__item" href="mailto:CECNSROSARIO@HOTMAIL.COM"><i class="fas fa-envelope"></i> cecnsrosario@ggmail.com</a>
          <div class="contact__item">
            <i class="fas fa-phone"></i> 2503-1970 / 2220-6927
          </div>
        </div>
      </div>
    </section>
  </section>

  <!-- footer inicio
     
    -->

  <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>


  <script src="script.js"></script>
  <script>
    (function() {
      const ROTATE_MS = 5500; // ← tiempo entre cambios (ms)

      function initPrepCard(card) {
        const media = card.querySelector(".prep-media");
        if (!media) return;

        // A11y: permitir foco/teclado
        media.setAttribute("role", "group");
        media.setAttribute("aria-label", "Galería de evidencias");
        media.querySelectorAll("img").forEach((img, i) => {
          img.setAttribute("tabindex", i === 0 ? "0" : "-1");
          img.setAttribute("draggable", "false");
        });

        const swapWithMain = (target) => {
          if (!target || target.classList.contains("main")) return;
          const main = media.querySelector(".main");
          // swap clases (no movemos el DOM; CSS resuelve la cuadrícula)
          main.classList.remove("main");
          main.classList.add("thumb");
          target.classList.remove("thumb");
          target.classList.add("main");

          // a11y foco y marca visual
          media
            .querySelectorAll("img")
            .forEach((img) => img.removeAttribute("aria-current"));
          target.setAttribute("aria-current", "true");
          target.focus({
            preventScroll: true
          });
        };

        // Click/tap en miniaturas
        media.addEventListener("click", (e) => {
          const t = e.target.closest("img");
          if (t && t.classList.contains("thumb")) swapWithMain(t);
        });

        // Teclado (Enter/Espacio sobre miniaturas)
        media.addEventListener("keydown", (e) => {
          const t = e.target.closest("img");
          if (!t) return;
          if (
            (e.key === "Enter" || e.key === " ") &&
            t.classList.contains("thumb")
          ) {
            e.preventDefault();
            swapWithMain(t);
          }
        });

        // Auto–rotación
        const next = () => {
          const main = media.querySelector(".main");
          const thumbs = [...media.querySelectorAll("img.thumb")];
          if (thumbs.length === 0) return;
          // toma la primera miniatura disponible
          swapWithMain(thumbs[0]);
        };

        // Manejo de pausa/reanudar (hover, focus, touch)
        let timer = null;
        const start = () => {
          if (timer) return;
          timer = setInterval(next, ROTATE_MS);
        };
        const stop = () => {
          if (!timer) return;
          clearInterval(timer);
          timer = null;
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

        // arranca con un pequeño desfase para que no todas cambien a la vez
        setTimeout(start, Math.random() * 1200 + 300);
      }

      document.querySelectorAll(".prep-card").forEach(initPrepCard);
    })();
  </script>

  <!-- IMG para el hero -->
  <script>
    (function() {
      const slides = [{
          src: "assets/dual/dual-img2.jpeg",
          alt: "Estudiantes CECNSR rumbo al programa dual",
          /* cap: "Salida al aeropuerto rumbo a Alemania", */
        },
        {
          src: "assets/dual/dual-img3-24.jpeg",
          alt: "Grupo con bandera en aeropuerto",
          /* cap: "Despedida junto a familias y docentes", */
        },
        {
          src: "assets/dual/dual-img4-24.jpeg",
          alt: "Equipo DUAL con bandera",
          /* cap: "Cohorte Proyecto DUAL 2024", */
        },
        {
          src: "assets/dual/dual-img1.jpg",
          alt: "Estudiantes antes del abordaje",
          /* cap: "Itinerario de inicio del programa", */
        },
      ];

      const root = document.querySelector(".dual-carousel");
      if (!root) return;

      const img = root.querySelector("#dual-slide");
      const caption = root.querySelector("#dual-caption");
      const dots = [...root.querySelectorAll(".dual-carousel__dots button")];
      const prevBtn = root.querySelector(".dual-carousel__btn--prev");
      const nextBtn = root.querySelector(".dual-carousel__btn--next");
      const intervalMs = +root.dataset.interval || 6000;

      let i = 0,
        timer = null,
        touchStartX = 0;

      function render(index, withFade = true) {
        i = (index + slides.length) % slides.length;
        const s = slides[i];
        if (withFade) root.classList.add("is-fading");
        // Preload next
        const preload = new Image();
        preload.src = s.src;

        requestAnimationFrame(() => {
          img.src = s.src;
          img.alt = s.alt;
          caption.textContent = s.cap;
          dots.forEach((d, di) =>
            d.setAttribute("aria-selected", di === i ? "true" : "false")
          );
          if (withFade)
            setTimeout(() => root.classList.remove("is-fading"), 160);
        });
      }

      function next() {
        render(i + 1);
      }

      function prev() {
        render(i - 1);
      }

      function start() {
        if (window.matchMedia("(prefers-reduced-motion: reduce)").matches)
          return;
        stop();
        timer = setInterval(next, intervalMs);
      }

      function stop() {
        if (timer) {
          clearInterval(timer);
          timer = null;
        }
      }

      // Eventos
      nextBtn.addEventListener("click", next);
      prevBtn.addEventListener("click", prev);
      dots.forEach((d) =>
        d.addEventListener("click", (e) =>
          render(+e.currentTarget.dataset.index)
        )
      );

      // teclado
      root.addEventListener("keydown", (e) => {
        if (e.key === "ArrowRight") next();
        if (e.key === "ArrowLeft") prev();
      });
      // hover pausa
      root.addEventListener("mouseenter", stop);
      root.addEventListener("mouseleave", start);
      // touch swipe
      root.addEventListener(
        "touchstart",
        (e) => (touchStartX = e.touches[0].clientX), {
          passive: true
        }
      );
      root.addEventListener("touchend", (e) => {
        const dx = e.changedTouches[0].clientX - touchStartX;
        if (Math.abs(dx) > 40)(dx < 0 ? next : prev)();
      });

      // init
      render(0, false);
      start();
    })();
  </script>

  <!-- GALERÍA  -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const items = document.querySelectorAll(".galleryDual > a");
      const pattern = ["wide", "", "", "tall", "", "", "wide", "", "", ""]; // ajusta a tu gusto
      items.forEach((el, i) => {
        const cls = pattern[i % pattern.length];
        if (cls) el.classList.add(cls);
        el.classList.add("tile"); // base
      });
    });
  </script>

  <!-- FLoat -->

  <script>
    (function() {
      const gallery = document.querySelectorAll(".galleryDual a");
      if (!gallery.length) return;

      const lb = document.getElementById("lb");
      const img = lb.querySelector(".lb__img");
      const cap = lb.querySelector(".lb__text");
      const count = lb.querySelector(".lb__count");
      const btnPrev = lb.querySelector(".lb__prev");
      const btnNext = lb.querySelector(".lb__next");
      const btnClose = lb.querySelector(".lb__close");

      const items = Array.from(gallery).map((a) => ({
        src: a.getAttribute("href") || a.querySelector("img")?.src,
        alt: a.querySelector("img")?.alt || "",
        el: a,
      }));

      let idx = 0,
        startX = 0,
        moving = false;

      function preload(i) {
        const n = new Image();
        n.src = items[i]?.src;
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
        // Preload vecinos
        preload((idx + 1) % items.length);
        preload((idx - 1 + items.length) % items.length);
      }

      function open(i) {
        show(i);
        lb.classList.add("is-open");
        lb.setAttribute("aria-hidden", "false");
        document.body.classList.add("lb-open");
        // foco accesible
        btnClose.focus();
        // bloqueo de tabulación simplificado
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

      // Abrir desde cualquier miniatura
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

      // Cerrar al hacer click en fondo (no en imagen ni controles)
      lb.addEventListener("click", (e) => {
        if (e.target === lb) close();
      });

      // Gestos táctiles (swipe)
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
</body>

</html>
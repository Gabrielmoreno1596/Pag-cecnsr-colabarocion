<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nivel Parvularia | CECNSR</title>
  <link rel="stylesheet" href="assets-ml/css/stylesparvularia.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <!-- Favicon básico (PNG) -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
  <meta name="theme-color" content="#7f2d3c">
</head>

<body>

  <!--  <header class="main-header">
    <div class="logo">
      <img
        src="assets-ml/logos-varios/loficial.png"
        alt="Logo CECNSR"
        class="logo-img" />
      <h1>CECNSR</h1>
    </div>

    <button class="menu-toggle" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>

    <nav class="main-nav">
      <ul>
        <li><a href="index.html">Inicio</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" id="oferta-toggle">Oferta Académica <i class="fas fa-caret-down"></i></a>
          <ul class="dropdown-menu">
            <li><a href="oferta-ciclo1.html">I Ciclo</a></li>
            <li><a href="oferta-ciclo2.html">II Ciclo</a></li>
            <li><a href="oferta-ciclo3.html">III Ciclo</a></li>
            <li>
              <a href="oferta-bachillerato.html">Bachillerato (General, Diplomados y Técnicos)</a>
            </li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" id="convenios-toggle">Convenios <i class="fas fa-caret-down"></i></a>
          <ul class="dropdown-menu">
            <li><a href="convenios-pasch.html">Colegios PASCH</a></li>
            <li><a href="convenios-dual.html">Proyecto DUAL</a></li>
            <li>
              <a href="convenios-psicologia.html">Equipo Líder en Psicología Individual</a>
            </li>
            <li>
              <a href="convenios-integracion.html">Proyecto de Integración</a>
            </li>
          </ul>
        </li>

        <li><a href="pastoral.html">Pastoral Educativa</a></li>

        <li>
          <a href="proceso-admision.html" class="btn-cta-nav">Nuevo Ingreso <i class="fas fa-user-plus"></i></a>
        </li>
      </ul>
    </nav>
  </header> -->

  <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>
  <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

  <section class="level-hero parvularia-hero">
    <div class="level-hero-content">
      <h1 class="level-hero-title">Nivel Parvularia</h1>
      <p class="level-hero-slogan">
        Formar para construir un mundo fraterno.
      </p>
    </div>
  </section>

  <main>
    <section class="section-padding bg-light">
      <div class="content-wrapper">
        <h2 class="section-title">
          <i class="fas fa-child"></i> Perfil del Estudiante
        </h2>
        <div class="profile-cards-grid">
          <div class="profile-item-card">
            <div class="profile-icon-box"><i class="fas fa-flask"></i></div>
            <h4>Curioso y Explorador</h4>
            <p>
              Niños y niñas con una necesidad innata de aprender, manipular y
              descubrir su entorno inmediato. Fomentamos preguntas y la
              creatividad.
            </p>
          </div>
          <div class="profile-item-card">
            <div class="profile-icon-box"><i class="fas fa-users"></i></div>
            <h4>En Desarrollo Social</h4>
            <p>
              Pequeños que están aprendiendo a interactuar, compartir,
              respetar turnos y manejar emociones bajo la guía de personal
              especializado.
            </p>
          </div>
          <div class="profile-item-card">
            <div class="profile-icon-box"><i class="fas fa-palette"></i></div>
            <h4>Activo y Creativo</h4>
            <p>
              Estudiantes que utilizan el juego, la música y el arte como
              herramientas principales para desarrollar la motricidad fina y
              gruesa.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="section-padding bg-white">
      <div class="content-wrapper">
        <h2 class="section-title">
          <i class="fas fa-calendar-alt"></i> Grados y Edades
        </h2>

        <div class="grades-container">
          <div class="grade-card">
            <div class="grade-title-box bg-blue-accent text-gold">
              <i class="fas fa-baby"></i>
              <h3>Inicial 3 Años</h3>
            </div>
            <div class="grade-info">
              <p>
                <strong>Enfoque:</strong> Estimulación temprana, adaptación
                social y desarrollo de habilidades motoras básicas.
                Aprendizaje basado en el juego libre.
              </p>
              <span class="grade-age">Edad mínima: 2 años y 9 meses.</span>
            </div>
          </div>

          <div class="grade-card">
            <div class="grade-title-box bg-blue-accent text-gold">
              <i class="fas fa-puzzle-piece"></i>
              <h3>Parvularia 4 Años</h3>
            </div>
            <div class="grade-info">
              <p>
                <strong>Enfoque:</strong> Introducción a conceptos
                pre-matemáticos y pre-lectores. Fomento de la autonomía
                personal y la comunicación oral.
              </p>
              <span class="grade-age">Edad mínima: 3 años y 9 meses.</span>
            </div>
          </div>

          <div class="grade-card">
            <div class="grade-title-box bg-blue-accent text-gold">
              <i class="fas fa-pencil-ruler"></i>
              <h3>Parvularia 5 Años</h3>
            </div>
            <div class="grade-info">
              <p>
                <strong>Enfoque:</strong> Consolidación de la lectoescritura,
                razonamiento lógico y expresión artística avanzada.
                Preparación activa para la transición a I Ciclo.
              </p>
              <span class="grade-age">Edad mínima: 4 años y 9 meses.</span>
            </div>
          </div>

          <div class="grade-card">
            <div class="grade-title-box bg-blue-accent text-gold">
              <i class="fas fa-graduation-cap"></i>
              <h3>Parvularia 6 Años</h3>
            </div>
            <div class="grade-info">
              <p>
                <strong>Enfoque:</strong> Refuerzo final de todas las áreas
                (lenguaje, matemática, social). Fomento de la responsabilidad
                y hábitos de estudio.
              </p>
              <span class="grade-age">Edad mínima: 5 años y 9 meses.</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-padding bg-light">
      <div class="content-wrapper">
        <h2 class="section-title">
          <i class="fas fa-book-reader"></i> Áreas Clave de la Formación
        </h2>
        <div class="course-grid">
          <article class="course-card">
            <h4>Desarrollo del Lenguaje</h4>
            <p>
              Estimulación temprana de la lectura y escritura a través de
              cuentos, rimas y juegos fonéticos.
            </p>
          </article>
          <article class="course-card">
            <h4>Lógico-Matemático</h4>
            <p>
              Introducción a conceptos de números, formas y tamaños mediante
              actividades lúdicas y materiales concretos.
            </p>
          </article>
          <article class="course-card">
            <h4>Iniciación al Inglés</h4>
            <p>
              Clases de inglés (parte de la oferta en el listado) con un
              enfoque en vocabulario básico, canciones y juegos.
            </p>
          </article>
          <article class="course-card">
            <h4>Motricidad y Arte</h4>
            <p>
              Espacios dedicados al dibujo, pintura, música y movimiento para
              la coordinación y expresión emocional.
            </p>
          </article>
        </div>
      </div>
    </section>

    <section class="value-added-section bg-blue-accent section-padding">
      <div class="content-wrapper">
        <h2 class="section-title text-gold">
          <i class="fas fa-star"></i> Servicios y Valores Agregados Exclusivos
        </h2>

        <div class="service-circles-grid">
          <div class="service-circle-item">
            <div class="highlight-icon-box">
              <i class="fas fa-hands-holding-child"></i>
            </div>
            <h4>Soporte Psicopedagógico</h4>
            <p>
              Atención integral con **Departamento Psicopedagógico** y
              **Atención Psicológica** para todos los niveles.
            </p>
          </div>

          <div class="service-circle-item">
            <div class="highlight-icon-box"><i class="fas fa-brain"></i></div>
            <h4>Inclusión y Aula DAI</h4>
            <p>
              Soporte especializado con el **Aula DAI** (Desarrollo y
              Aprendizaje Integral) y orientación vocacional.
            </p>
          </div>

          <div class="service-circle-item">
            <div class="highlight-icon-box">
              <i class="fas fa-microchip"></i>
            </div>
            <h4>Robótica y Ciencias</h4>
            <p>
              Acceso a **Laboratorios** de informática, ciencias, inglés y
              **robótica**.
            </p>
          </div>

          <div class="service-circle-item">
            <div class="highlight-icon-box">
              <i class="fas fa-server"></i>
            </div>
            <h4>Plataforma y Conectividad</h4>
            <p>
              Uso de la **Plataforma institucional** y **Servicio de
              internet** en todas las aulas.
            </p>
          </div>

          <div class="service-circle-item">
            <div class="highlight-icon-box"><i class="fas fa-music"></i></div>
            <h4>Arte y Clubes de Talento</h4>
            <p>
              **Clases y Clubes** de música, danza, robótica y ajedrez para el
              desarrollo artístico.
            </p>
          </div>

          <div class="service-circle-item">
            <div class="highlight-icon-box"><i class="fas fa-cross"></i></div>
            <h4>Formación Cristiana</h4>
            <p>
              **Formación Espiritual**, Festivales de Logros y Desarrollo de
              proyectos educativos con valores.
            </p>
          </div>

          <div class="service-circle-item">
            <div class="highlight-icon-box"><i class="fas fa-globe"></i></div>
            <h4>Festivales de Idiomas</h4>
            <p>
              **Inmersión cultural** en Inglés, Alemán y Portugués, además de
              festivales de gastronomía y poesía.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="section-padding bg-white">
      <div class="content-wrapper">
        <h2 class="section-title">
          <i class="fas fa-clipboard-list"></i> Proceso de Admisión: Inicial y
          Parvularia
        </h2>

        <div class="accordion-container admission-accordion">
          <div class="accordion-item">
            <button class="accordion-header" type="button">
              <i class="fas fa-check-circle"></i> Requisitos Clave y Edad
              Mínima
              <i class="fas fa-chevron-down accordion-icon"></i>
            </button>
            <div class="accordion-content">
              <ul class="requirements-list-enhanced">
                <li>
                  <i class="fas fa-toilet"></i> **Manejo de Esfínteres:** Es
                  indispensable el inicio del manejo de esfínteres.
                </li>
                <li>
                  <i class="fas fa-users-cog"></i> **Entrevista Familiar:**
                  Participar activamente en la entrevista familiar para
                  evaluación según la fecha asignada.
                </li>
                <li>
                  <i class="fas fa-book-open"></i> **Adquirir Prospecto:**
                  Adquirir el prospecto en la recepción de la institución.
                </li>
                <li>
                  <i class="fas fa-award"></i> **Diploma (Parvularia 5 y 6
                  años):** Presentar el diploma de haber cursado el año
                  anterior.
                </li>
              </ul>
              <p class="mt-3 age-notice">
                Edad mínima de ingreso a **Inicial 3 Años** es 2 años y 9
                meses.
              </p>
            </div>
          </div>

          <div class="accordion-item">
            <button class="accordion-header" type="button">
              <i class="fas fa-file-alt"></i> Documentación a Presentar
              (Físico)
              <i class="fas fa-chevron-down accordion-icon"></i>
            </button>
            <div class="accordion-content">
              <ul class="document-list">
                <li>
                  <i class="fas fa-file-invoice"></i> Partida de nacimiento
                  original y copia reciente (3 meses).
                </li>
                <li><i class="fas fa-cross"></i> Fe de bautismo.</li>
                <li><i class="fas fa-syringe"></i> Tarjeta de Vacunación.</li>
                <li>
                  <i class="fas fa-id-card-alt"></i> Fotocopia del DUI del
                  responsable al 150%.
                </li>
                <li>
                  <i class="fas fa-camera"></i> Fotografía tamaño cédula
                  reciente.
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-padding bg-light">
      <div class="content-wrapper">
        <h2 class="section-title">
          <i class="fas fa-camera"></i> Nuestro Entorno de Parvularia
        </h2>
        <div class="photo-roll-container">
          <div class="photo-roll">
            <div class="photo-item">
              <img
                src="assets-ml/inicial-parv/p1.jpeg"
                alt="Aula de Parvularia" />
            </div>
            <div class="photo-item">
              <img
                src="assets-ml/inicial-parv/p2.jpeg"
                alt="Área de juegos" />
            </div>
            <div class="photo-item">
              <img src="assets-ml/inicial-parv/p3.jpeg" alt="Clase de arte" />
            </div>
            <div class="photo-item">
              <img
                src="assets-ml/inicial-parv/p4.jpeg"
                alt="Maestra interactuando" />
            </div>
            <div class="photo-item">
              <img
                src="assets-ml/inicial-parv/p5.jpeg"
                alt="Taller de informática" />
            </div>
            <div class="photo-item">
              <img
                src="assets-ml/inicial-parv/p6.jpeg"
                alt="Clase de música" />
            </div>
            <div class="photo-item">
              <img
                src="assets-ml/inicial-parv/p7.jpeg"
                alt="Clase de robótica" />
            </div>
            <div class="photo-item">
              <img
                src="assets-ml/inicial-parv/p8.jpeg"
                alt="Clase de música" />
            </div>
            <div class="photo-item">
              <img
                src="assets-ml/inicial-parv/p9.jpeg"
                alt="Clase de robótica" />
            </div>
            <div class="photo-item">
              <img
                src="assets-ml/inicial-parv/p10.jpeg"
                alt="Clase de robótica" />
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>

  <script src="assets-ml/script/scriptparvu.js" defer></script>
  <script defer src="script.js"></script>
</body>

</html>
<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Segundo Ciclo - CECNSR</title>
  <link rel="stylesheet" href="assets-ml/css/style2ciclo.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>
  <!--   <header class="main-header">
    <div class="logo">
      <img
        src="assets-ml/logos-varios/loficial.png"
        alt="Logo CECNSR"
        class="logo-img" />
      <h1>CECNSR</h1>
    </div>

    <nav class="main-nav">
      <ul>
        <li><a href="#inicio">Inicio</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" id="oferta-toggle">Oferta Académica <i class="fas fa-caret-down"></i></a>
          <ul class="dropdown-menu">
            <li><a href="oferta-inicial.html">Inicial y Parvularia</a></li>
            <li><a href="oferta-ciclo1.html">I Ciclo</a></li>
            <li><a href="oferta-ciclo2.html">II Ciclo (ACTUAL)</a></li>
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

    <button class="nav-toggle" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
  </header> -->

  <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>
  <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

  <main>
    <section class="level-hero second-cycle-hero">
      <div class="level-hero-content">
        <h2 class="level-hero-title">Segundo Ciclo de Educación Básica</h2>
        <p class="level-hero-slogan">
          Formar para construir un mundo fraterno.
        </p>
      </div>
    </section>

    <section class="section-padding bg-light">
      <div class="content-wrapper">
        <h2 class="section-title">
          <i class="fas fa-bullseye"></i> Metas del Nivel
        </h2>

        <div class="goals-list-container">
          <p>
            El Segundo Ciclo (4º a 6º Grado) está enfocado en la aplicación de
            los conocimientos fundamentales y la preparación para la educación
            premedia. Las metas clave son:
          </p>

          <div class="goal-cards-grid">
            <div class="profile-item-card">
              <div class="profile-icon-box"><i class="fas fa-flask"></i></div>
              <div>
                <h4>Investigación y Ciencias Aplicadas</h4>
                <p>
                  Introducción al método científico, proyectos de
                  investigación y dominio de conceptos en Ciencias Naturales y
                  Sociales.
                </p>
              </div>
            </div>
            <div class="profile-item-card">
              <div class="profile-icon-box"><i class="fas fa-globe"></i></div>
              <div>
                <h4>Comunicación Global</h4>
                <p>
                  Consolidación del Inglés y el Alemán como herramientas de
                  comunicación e inicio de la preparación para
                  certificaciones.
                </p>
              </div>
            </div>
            <div class="profile-item-card">
              <div class="profile-icon-box">
                <i class="fas fa-comments"></i>
              </div>
              <div>
                <h4>Habilidades Socioemocionales</h4>
                <p>
                  Fomento del liderazgo, la empatía, el trabajo en equipo y la
                  resolución de conflictos a través de tutorías.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="photo-carousel-container">
          <h4 class="carousel-title">
            Experiencias y Aprendizaje en II Ciclo
          </h4>
          <div class="photo-roll-wrapper">
            <div class="photo-roll">
              <div class="photo-item">
                <img
                  src="assets-ml/ii-ciclo/iic1.jpeg"
                  alt="Actividad de Ciencias II Ciclo" />
              </div>
              <div class="photo-item">
                <img
                  src="assets-ml/ii-ciclo/iic2.jpeg"
                  alt="Taller de Alemán II Ciclo" />
              </div>
              <div class="photo-item">
                <img
                  src="assets-ml/ii-ciclo/iic3.jpeg"
                  alt="Laboratorio de Informática" />
              </div>
              <div class="photo-item">
                <img
                  src="assets-ml/ii-ciclo/iic4.jpeg"
                  alt="Debate estudiantil II Ciclo" />
              </div>
              <div class="photo-item">
                <img
                  src="assets-ml/ii-ciclo/iic5.jpeg"
                  alt="Deportes en II Ciclo" />
              </div>
              <div class="photo-item">
                <img
                  src="assets-ml/ii-ciclo/iic6.jpg"
                  alt="Deportes en II Ciclo" />
              </div>
            </div>
          </div>
          <p class="carousel-caption">
            Proyectos, debates y uso de laboratorios especializados.
          </p>
        </div>
      </div>
    </section>

    <section class="section-padding bg-white">
      <div class="content-wrapper">
        <h2 class="section-title">
          <i class="fas fa-chalkboard-teacher"></i> Trayectoria Académica
        </h2>

        <div class="tabs-container">
          <div class="tabs-buttons">
            <button class="tab-button active" data-tab="tab-1">
              4º Grado
            </button>
            <button class="tab-button" data-tab="tab-2">5º Grado</button>
            <button class="tab-button" data-tab="tab-3">6º Grado</button>
          </div>

          <div id="tab-1" class="tab-content active">
            <h3>
              <i class="fas fa-star text-gold"></i> Inicio de la Fase de
              Investigación
            </h3>
            <p>
              Cuarto Grado marca la transición hacia una mayor complejidad
              académica. Se fomenta la lectura analítica y el inicio de la
              búsqueda y procesamiento de información para proyectos
              sencillos, utilizando los laboratorios de ciencias.
            </p>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-check"></i> **Enfoque Institucional:**
                Pendiente.
              </li>
              <li>
                <i class="fas fa-check"></i> **Enfoque Principal:**
                Razonamiento abstracto, uso de fracciones y decimales.
              </li>
              <li>
                <i class="fas fa-check"></i> **Bilingüe:** Desarrollo de
                la comunicación y cultura básica en Alemán e Inglés.
              </li>
              <li>
                <i class="fas fa-check"></i> **Habilidad Clave:** Tutorías
                para el desarrollo de la autonomía en el estudio.
              </li>
            </ul>
          </div>

          <div id="tab-2" class="tab-content">
            <h3>
              <i class="fas fa-star text-gold"></i> Profundización de
              Competencias Científicas
            </h3>
            <p>
              Quinto Grado se enfoca en la consolidación del método de estudio
              y el aumento de la exigencia en el bilingüismo. Los estudiantes
              trabajan en proyectos de ciencias más detallados, poniendo en
              práctica conceptos de Física y Química elemental.
            </p>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-check"></i> **Enfoque Principal:** Análisis
                de textos, Matemáticas avanzadas y Geografía mundial.
              </li>
              <li>
                <i class="fas fa-check"></i> **Idioma Inglés:** Preparación
                para niveles A2/B1, con énfasis en el debate y la expresión
                escrita.
              </li>
              <li>
                <i class="fas fa-check"></i> **Actividad Clave:**
                Participación en la Feria de Ciencias y Tecnología.
              </li>
            </ul>
          </div>

          <div id="tab-3" class="tab-content">
            <h3>
              <i class="fas fa-star text-gold"></i> Preparación para la
              Premedia
            </h3>
            <p>
              Sexto Grado es el cierre del ciclo, con un enfoque intensivo en
              la preparación para el III Ciclo. Se busca la plena autonomía en
              el estudio, el desarrollo del pensamiento crítico avanzado y la
              consolidación de las competencias bilingües y tecnológicas.
            </p>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-check"></i> **Enfoque Principal:**
                Pensamiento Crítico y Transición al Álgebra.
              </li>
              <li>
                <i class="fas fa-check"></i> **Bilingüismo:** Evaluación de
                nivel para la continuidad en el III Ciclo.
              </li>
              <li>
                <i class="fas fa-check"></i> **Actividad Clave:** Proyecto de
                Servicio Comunitario y Liderazgo estudiantil.
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="section-padding bg-blue-accent">
      <div class="content-wrapper">
        <h2 class="section-title text-white">
          <i class="fas fa-medal text-gold"></i> Valores Agregados
        </h2>
        <p class="text-white" style="text-align: center; margin-bottom: 2rem">
          Elementos que enriquecen la formación integral de nuestros
          estudiantes, según nuestro prospecto 2026.
        </p>

        <div class="service-circles-grid full-values">
          <div class="service-circle-item">
            <div class="highlight-icon-box"><i class="fas fa-brain"></i></div>
            <h4>Departamento Psicopedagógico</h4>
            <p>
              Atención y soporte psicológico y pedagógico para todos los
              niveles.
            </p>
          </div>
          <div class="service-circle-item">
            <div class="highlight-icon-box">
              <i class="fas fa-chalkboard"></i>
            </div>
            <h4>Aula DAI</h4>
            <p>Atención de las Necesidades Educativas Especiales.</p>
          </div>
          <div class="service-circle-item">
            <div class="highlight-icon-box"><i class="fas fa-robot"></i></div>
            <h4>Laboratorios Especializados</h4>
            <p>
              Informática, Ciencias, Inglés y Robótica para el desarrollo de
              la lógica.
            </p>
          </div>
          <div class="service-circle-item">
            <div class="highlight-icon-box"><i class="fas fa-wifi"></i></div>
            <h4>Plataforma Institucional y Conectividad</h4>
            <p>
              Plataforma para seguimiento académico y servicio de internet en
              todas las aulas.
            </p>
          </div>
          <div class="service-circle-item">
            <div class="highlight-icon-box">
              <i class="fas fa-trophy"></i>
            </div>
            <h4>Ferias de Logros y Proyectos</h4>
            <p>
              Desarrollo de proyectos educativos, Ferias de Logros y Juegos
              Intramuros.
            </p>
          </div>
          <div class="service-circle-item">
            <div class="highlight-icon-box">
              <i class="fas fa-palette"></i>
            </div>
            <h4>Formación Artística</h4>
            <p>
              Clases de música, danza y arte, fomentando la creatividad y el
              desarrollo cultural.
            </p>
          </div>
          <div class="service-circle-item">
            <div class="highlight-icon-box">
              <i class="fas fa-language"></i>
            </div>
            <h4>Énfasis Bilingüe y Festivales</h4>
            <p>
              Idioma Alemán (1º a 9º grado) y Festivales de Idiomas (Inglés,
              Alemán y Portugués).
            </p>
          </div>
          <div class="service-circle-item">
            <div class="highlight-icon-box">
              <i class="fas fa-church"></i>
            </div>
            <h4>Formación Cristiana</h4>
            <p>
              Valores evangélicos, marianos y franciscanos, como eje de la
              formación integral.
            </p>
          </div>
          <div class="service-circle-item">
            <div class="highlight-icon-box">
              <i class="fas fa-puzzle-piece"></i>
            </div>
            <h4>Clubes de Talento</h4>
            <p>
              Música, Danza, Robótica, Ajedrez y otras actividades
              extracurriculares.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="section-padding bg-light" id="admisiones">
      <div class="content-wrapper">
        <h2 class="section-title">
          <i class="fas fa-clipboard-list"></i> Proceso de Admisión II Ciclo
        </h2>

        <div class="accordion-container">
          <div class="accordion-header" data-tab-name="requisitos">
            <i class="fas fa-user-check"></i> Requisitos Clave
            <i class="fas fa-chevron-down accordion-icon"></i>
          </div>
          <div class="accordion-content">
            <div class="age-notice">
              Este ciclo está diseñado para estudiantes que ya han consolidado
              la base lectoescritora y buscan desarrollar el pensamiento
              crítico.
            </div>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-check"></i> Presentar evaluación diagnóstica
                favorable en Lenguaje y Matemáticas.
              </li>
              <li>
                <i class="fas fa-check"></i> Original y copia del certificado
                de estudios del último año cursado (aprobado).
              </li>
              <li>
                <i class="fas fa-check"></i> Constancia de conducta intachable
                de la institución de procedencia.
              </li>
              <li>
                <i class="fas fa-check"></i> Entrevista familiar con el
                Departamento Psicopedagógico.
              </li>
            </ul>
          </div>

          <div class="accordion-header" data-tab-name="documentos">
            <i class="fas fa-folder-open"></i> Documentos a Presentar
            <i class="fas fa-chevron-down accordion-icon"></i>
          </div>
          <div class="accordion-content">
            <ul class="document-list">
              <li>
                <i class="fas fa-file-alt"></i> Partida de nacimiento original
                y copia reciente.
              </li>
              <li>
                <i class="fas fa-file-pdf"></i> Certificado de estudios del
                último año cursado y constancia de conducta.
              </li>
              <li>
                <i class="fas fa-id-card"></i> Fotocopia del DUI del
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
    </section>
  </main>

  <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>

  <script src="assets-ml/script/script2c.js"></script>
  <script defer src="script.js"></script>
</body>

</html>
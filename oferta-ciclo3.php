<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/contribuciones/sitececnsr/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>III Ciclo (Premedia) - CECNSR</title>

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <link rel="stylesheet" href="assets-ml/css/style3ciclo.css" />
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
            <li><a href="oferta-ciclo2.html">II Ciclo</a></li>
            <li><a href="oferta-ciclo3.html">III Ciclo (ACTUAL)</a></li>
            <li><a href="oferta-bachillerato.html">Bachillerato</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" id="convenios-toggle">Convenios <i class="fas fa-caret-down"></i></a>
          <ul class="dropdown-menu">
            <li><a href="convenios-pasch.html">Colegios PASCH</a></li>
            <li><a href="convenios-dual.html">Proyecto DUAL</a></li>
            <li>
              <a href="convenios-psicologia.html">Equipo Líder en Psicología</a>
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
    <section class="level-hero third-cycle-hero" id="inicio">
      <div class="level-hero-content">
        <h2 class="level-hero-title">III Ciclo (7° a 9° Grado)</h2>
        <p class="level-hero-slogan">
          Formar para construir un mundo fraterno.
        </p>
      </div>
    </section>

    <section class="section-padding bg-white">
      <div class="content-wrapper">
        <h2 class="section-title text-center">
          <i class="fas fa-medal"></i> Valores Agregados Institucionales
        </h2>
        <p class="section-subtitle text-center">
          Una formación integral con enfoque científico, tecnológico y humano.
        </p>

        <div class="value-cards-grid">
          <div class="value-card">
            <i class="fas fa-robot value-icon color-blue"></i>
            <h4>Laboratorios de Innovación</h4>
            <p>
              Informática, Ciencias, Inglés y Robótica de última generación
              para la práctica real.
            </p>
          </div>
          <div class="value-card">
            <i class="fas fa-language value-icon color-gold"></i>
            <h4>Doble Formación Lingüística</h4>
            <p>Clases de **Inglés y Alemán**</p>
          </div>
          <div class="value-card">
            <i class="fas fa-users-cog value-icon color-wine"></i>
            <h4>Orientación y Psicopedagogía</h4>
            <p>Orientación profesional, vocacional y atención psicológica</p>
          </div>
          <div class="value-card">
            <i class="fas fa-church value-icon color-blue"></i>
            <h4>Formación Mariana-Franciscana</h4>
            <p>
              Desarrollo de valores éticos, formación cristiana y
              participación activa en Pastoral Educativa.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="section-padding bg-light">
      <div class="content-wrapper">
        <h2 class="section-title">
          <i class="fas fa-puzzle-piece"></i> Perfil del Estudiante al
          Finalizar el III Ciclo
        </h2>

        <div class="tabs-container">
          <div class="tabs-buttons">
            <button class="tab-button active" data-tab="tab-academico">
              Área Académica
            </button>
            <button class="tab-button" data-tab="tab-personal">
              Área Personal/Social
            </button>
            <button class="tab-button" data-tab="tab-competencias">
              Competencias PASCH
            </button>
          </div>

          <div id="tab-academico" class="tab-content active">
            <h3>
              <i class="fas fa-graduation-cap text-gold"></i> Metas Académicas
              Clave
            </h3>
            <p>
              El estudiante desarrolla las bases sólidas para afrontar el
              Bachillerato con éxito, destacando en materias como Matemática,
              Ciencias y Lenguajes.
            </p>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-check"></i> Dominio de álgebra y geometría
                avanzada.
              </li>
              <li>
                <i class="fas fa-check"></i> Habilidad para realizar proyectos
                de investigación científica.
              </li>
              <li>
                <i class="fas fa-check"></i> Competencia comunicativa basica
                en idioma Inglés.
              </li>
            </ul>
          </div>

          <div id="tab-personal" class="tab-content">
            <h3>
              <i class="fas fa-user-tie text-gold"></i> Desarrollo de
              Liderazgo y Madurez
            </h3>
            <p>
              Fomentamos el pensamiento crítico y la toma de decisiones
              responsable, preparando a los jóvenes para la transición a la
              educación media.
            </p>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-check"></i> Conciencia social y participación
                activa en la comunidad.
              </li>
              <li>
                <i class="fas fa-check"></i> Identificación de habilidades y
                orientación vocacional inicial.
              </li>
              <li>
                <i class="fas fa-check"></i> Manejo de la frustración y
                resolución de conflictos.
              </li>
            </ul>
          </div>

          <div id="tab-competencias" class="tab-content">
            <h3>
              <i class="fas fa-globe-americas text-gold"></i> Alemán PASCH y
              Proyección Internacional
            </h3>
            <p>
              Los estudiantes continúan el programa PASCH con el objetivo de
              obtener el Certificado de Lengua Alemana (Deutsches Sprachdiplom
              - DSD I).
            </p>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-check"></i> Logro de nivel basico en Alemán
                (DSD I).
              </li>
              <li>
                <i class="fas fa-check"></i> Intercambios y campamentos de
                inmersión lingüística en Alemania.
              </li>
              <li>
                <i class="fas fa-check"></i> Desarrollo de proyectos
                multiculturales en colaboración con otros Colegios PASCH.
              </li>
            </ul>
          </div>
        </div>

        <div class="photo-carousel-container">
          <h4 class="carousel-title">Actividades Destacadas del III Ciclo</h4>
          <div class="photo-roll-wrapper">
            <div class="photo-roll">
              <div class="photo-item">
                <img
                  src="assets-ml/iii-ciclo/iiic1.jpeg"
                  alt="Feria de Ciencias" />
              </div>
              <div class="photo-item">
                <img
                  src="assets-ml/iii-ciclo/iiic2.jpeg"
                  alt="Clase de Robótica" />
              </div>
              <div class="photo-item">
                <img
                  src="assets-ml/iii-ciclo/iiic3.jpeg"
                  alt="Evento Cultural PASCH" />
              </div>
              <div class="photo-item">
                <img
                  src="assets-ml/iii-ciclo/iiic4.jpeg"
                  alt="Excursión educativa" />
              </div>
              <div class="photo-item">
                <img
                  src="assets-ml/iii-ciclo/iiic5.jpeg"
                  alt="Competencia Deportiva" />
              </div>
              <div class="photo-item">
                <img
                  src="assets-ml/iii-ciclo/iiic6.jpeg"
                  alt="Feria de Ciencias" />
              </div>
              <div class="photo-item">
                <img
                  src="assets-ml/iii-ciclo/iiic7.jpeg"
                  alt="Clase de Robótica" />
              </div>
              <div class="photo-item">
                <img
                  src="assets-ml/iii-ciclo/iiic8.jpeg"
                  alt="Evento Cultural PASCH" />
              </div>
              <div class="photo-item">
                <img
                  src="assets-ml/iii-ciclo/iiic9.jpeg"
                  alt="Excursión educativa" />
              </div>
              <div class="photo-item">
                <img
                  src="assets-ml/iii-ciclo/iiic10.jpeg"
                  alt="Competencia Deportiva" />
              </div>
            </div>
          </div>
          <p class="carousel-caption">
            Desarrollo de habilidades en un ambiente de innovación y
            colaboración.
          </p>
        </div>
      </div>
    </section>

    <section class="section-padding bg-white" id="admisiones">
      <div class="content-wrapper">
        <h2 class="section-title">
          <i class="fas fa-clipboard-list"></i> Proceso de Admisión y
          Requisitos
        </h2>

        <div class="accordion-container">
          <div class="accordion-header" data-tab-name="requisitos">
            <i class="fas fa-user-check"></i> Requisitos Clave de Ingreso
            <i class="fas fa-chevron-down accordion-icon"></i>
          </div>
          <div class="accordion-content">
            <div class="age-notice">
              Transición clave: se evalúa la madurez académica y conductual.
            </div>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-check"></i> Certificado de 6º Grado aprobado.
              </li>
              <li>
                <i class="fas fa-check"></i> Evaluación diagnóstica de
                competencias en Matemática y Lenguaje.
              </li>
              <li>
                <i class="fas fa-check"></i> Entrevista con la Dirección de
                Nivel y Orientación (énfasis en habilidades sociales).
              </li>
              <li>
                <i class="fas fa-check"></i> Constancia de conducta positiva.
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
                <i class="fas fa-file-pdf"></i> Certificado de 6º Grado y
                constancia de conducta.
              </li>
              <li>
                <i class="fas fa-id-card"></i> Fotocopia del DUI/Pasaporte del
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

  <script src="assets-ml/script/script3c.js"></script>
  <script defer src="script.js"></script>
</body>

</html>
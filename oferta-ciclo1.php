<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CENCSR - PRIMER CICLO</title>

  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />

  <link rel="stylesheet" href="<?= asset('styles.css') ?>">
  <link rel="stylesheet" href="assets-ml/css/styles.css" />
  <link rel="stylesheet" href="<?= asset('assets-ml/css/style1ciclo.css') ?>">

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>

  <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>

  <main>
    <section class="level-hero first-cycle-hero">
      <div class="level-hero-content">
        <h2 class="level-hero-title">Primer Ciclo de Educación Básica</h2>
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

        <div class="level-goals-carousel-grid">
          <div class="goals-list-container">
            <p>
              El Primer Ciclo (1º a 3º Grado) es la etapa fundamental para la
              adquisición de las herramientas básicas que definirán la
              trayectoria académica. Nuestro enfoque está en:
            </p>

            <div class="profile-item-card">
              <div class="profile-icon-box">
                <i class="fas fa-book-reader"></i>
              </div>
              <div>
                <h4>Dominio Lectoescritor</h4>
                <p>
                  Lectura fluida, comprensión profunda y capacidad de
                  redacción con coherencia y estructura.
                </p>
              </div>
            </div>
            <div class="profile-item-card">
              <div class="profile-icon-box">
                <i class="fas fa-calculator"></i>
              </div>
              <div>
                <h4>Pensamiento Lógico-Matemático</h4>
                <p>
                  Consolidación de las operaciones básicas y desarrollo de la
                  capacidad de resolución de problemas.
                </p>
              </div>
            </div>
            <div class="profile-item-card">
              <div class="profile-icon-box">
                <i class="fas fa-lightbulb"></i>
              </div>
              <div>
                <h4>Disciplina y Autonomía</h4>
                <p>
                  Fomentamos hábitos de estudio y la responsabilidad
                  individual para la autogestión del aprendizaje.
                </p>
              </div>
            </div>
          </div>

          <div class="photo-carousel-container">
            <h4 class="carousel-title">Vida Estudiantil en I Ciclo</h4>
            <div class="photo-roll-wrapper">
              <div class="photo-roll">
                <div class="photo-item">
                  <img
                    src="assets-ml/i-ciclo/ic1.jpg"
                    alt="Aula de I Ciclo" />
                </div>
                <div class="photo-item">
                  <img
                    src="assets-ml/i-ciclo/ic2.jpg"
                    alt="Clase de Robótica I Ciclo" />
                </div>
                <div class="photo-item">
                  <img
                    src="assets-ml/i-ciclo/ic3.jpg"
                    alt="Actividad deportiva I Ciclo" />
                </div>
                <div class="photo-item">
                  <img
                    src="assets-ml/i-ciclo/ic4.jpg"
                    alt="Taller de Alemán I Ciclo" />
                </div>
                <div class="photo-item">
                  <img
                    src="assets-ml/i-ciclo/ic6.jpg"
                    alt="Arte en I Ciclo" />
                </div>
              </div>
            </div>
            <p class="carousel-caption">
              Explora nuestras actividades, laboratorios y ambiente educativo.
            </p>
          </div>
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
              1º Grado
            </button>
            <button class="tab-button" data-tab="tab-2">2º Grado</button>
            <button class="tab-button" data-tab="tab-3">3º Grado</button>
          </div>

          <div id="tab-1" class="tab-content active">
            <h3>
              <i class="fas fa-star text-gold"></i> Consolidación de la
              Lectoescritura
            </h3>
            <p>
              En Primer Grado, se realiza la transición completa, enfocándose
              en consolidar el alfabeto, desarrollar el pensamiento
              lógico-matemático y comenzar la inmersión en el idioma alemán,
              sentando las bases de la disciplina de estudio.
            </p>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-check"></i> **Enfoque Principal:**
                Alfabetización Avanzada y Habilidades Motoras Finas.
              </li>
              <li>
                <i class="fas fa-check"></i> **Nivel de Inglés:** Básicoo, con
                énfasis en vocabulario y estructuras simples.
              </li>
              <li>
                <i class="fas fa-check"></i> **Actividad Clave:** Introducción
                a la Robótica Educativa.
              </li>
            </ul>
          </div>

          <div id="tab-2" class="tab-content">
            <h3>
              <i class="fas fa-star text-gold"></i> Desarrollo de la Autonomía
              y Cálculo
            </h3>
            <p>
              Segundo Grado potencia la autonomía del estudiante. Se
              profundiza en las operaciones básicas de matemáticas, la
              comprensión lectora, y la expresión oral en Inglés y Alemán. Los
              proyectos interdisciplinarios comienzan a tomar mayor
              relevancia.
            </p>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-check"></i> **Enfoque Principal:**
                Operaciones Matemáticas, Comprensión Lectora y Escritura
                Narrativa.
              </li>
              <li>
                <i class="fas fa-check"></i> **Nivel de Alemán:**
                Continuación, con introducción a frases y comandos sencillos.
              </li>
              <li>
                <i class="fas fa-check"></i> **Actividad Clave:** Desarrollo
                de la Creatividad a través de la Clase de Arte.
              </li>
            </ul>
          </div>

          <div id="tab-3" class="tab-content">
            <h3>
              <i class="fas fa-star text-gold"></i> Transición al Pensamiento
              Crítico
            </h3>
            <p>
              Tercer Grado actúa como puente hacia los ciclos superiores. Se
              introducen conceptos de investigación simple en Ciencias y
              Sociales, se fomenta el pensamiento crítico y se evalúan las
              bases del bilingüismo, preparando al estudiante para los retos
              del Segundo Ciclo.
            </p>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-check"></i> **Enfoque Principal:**
                Razonamiento Crítico, Ciencias y Geografía Local.
              </li>
              <li>
                <i class="fas fa-check"></i> **Nivel de Inglés:** Uso
                funcional del idioma para la comunicación.
              </li>
              <li>
                <i class="fas fa-check"></i> **Actividad Clave:** Ferias de
                Logros con exposición de proyectos.
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
          <i class="fas fa-clipboard-list"></i> Proceso de Admisión I Ciclo
        </h2>

        <div class="accordion-container">
          <div class="accordion-header" data-tab-name="requisitos">
            <i class="fas fa-user-check"></i> Requisitos Clave
            <i class="fas fa-chevron-down accordion-icon"></i>
          </div>
          <div class="accordion-content">
            <div class="age-notice">
              El estudiante debe tener 6 años cumplidos para el 1º Grado al
              inicio del año escolar (según normativa).
            </div>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-check"></i> Cumplir con la edad
                reglamentaria.
              </li>
              <li>
                <i class="fas fa-check"></i> Presentar evaluación académica
                favorable del año anterior (si aplica).
              </li>
              <li>
                <i class="fas fa-check"></i> Participar activamente de la
                entrevista familiar para evaluación integral.
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
  <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>




  <script src="assets-ml/script/script2c.js"></script>
  <script src="assets-ml/script/script1.js"></script>


</body>

</html>
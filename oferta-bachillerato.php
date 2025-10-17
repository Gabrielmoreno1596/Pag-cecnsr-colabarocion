<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/contribuciones/sitececnsr/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Educación Media (Bachillerato) - CECNSR</title>

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <link rel="stylesheet" href="assets-ml/css/stylemedia.css" />
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

    <nav class="main-nav">
      <ul>
        <li><a href="index.html">Inicio</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" id="oferta-toggle">Oferta Académica <i class="fas fa-caret-down"></i></a>
          <ul class="dropdown-menu">
            <li><a href="oferta-inicial.html">Inicial y Parvularia</a></li>
            <li><a href="oferta-ciclo1.html">I Ciclo</a></li>
            <li><a href="oferta-ciclo2.html">II Ciclo</a></li>
            <li><a href="oferta-ciclo3.html">III Ciclo</a></li>
            <li class="active">
              <a href="#inicio">Bachillerato (ACTUAL)</a>
            </li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" id="convenios-toggle">Convenios <i class="fas fa-caret-down"></i></a>
          <ul class="dropdown-menu">
            <li><a href="#">Colegios PASCH</a></li>
            <li><a href="#">Proyecto DUAL</a></li>
            <li><a href="#">Equipo Líder en Psicología</a></li>
            <li><a href="#">Proyecto de Integración</a></li>
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
  <main>
    <section class="media-hero section-padding" id="inicio">
      <div class="content-wrapper">
        <h2 class="level-hero-title">Bachillerato Técnico y General</h2>
        <p class="level-hero-slogan">
          Formar para construir un mundo fraterno.
        </p>
      </div>
    </section>

    <section id="especialidades" class="section-padding bg-light">
      <h3 class="section-title">
        <i class="fas fa-microscope"></i> Nuestras Especialidades de
        Bachillerato
      </h3>
      <p class="section-subtitle">
        Explora el plan de estudios que te llevará a la universidad o al mundo
        laboral.
      </p>

      <div class="specs-tab-container content-wrapper">
        <div class="specs-tab-buttons">
          <button class="spec-button active" data-spec="salud">
            <i class="fas fa-heartbeat"></i> Salud y Bienestar Social
          </button>
          <button class="spec-button" data-spec="logistica">
            <i class="fas fa-truck-moving"></i> Logística Comercial y Global
          </button>
          <button class="spec-button" data-spec="sistemas">
            <i class="fas fa-solar-panel"></i> Electrónica y Energías
            Renovables
          </button>
          <button class="spec-button" data-spec="turismo">
            <i class="fas fa-globe-americas"></i> Servicios Turísticos
          </button>
          <button class="spec-button" data-spec="idiomas">
            <i class="fas fa-language"></i> General Dipl. Idiomas
          </button>
          <button class="spec-button" data-spec="software">
            <i class="fas fa-code"></i> General Dipl. Desarrollo Software
          </button>
        </div>

        <div class="specs-tab-content-wrapper">
          <div id="salud" class="spec-content active">
            <h4>Bachillerato Técnico Productivo: Salud y Bienestar Social</h4>

            <div class="media-content-visual">
              <div class="carousel-container" data-carousel-id="salud">
                <div class="carousel-slides">
                  <div class="carousel-slide active">
                    <img
                      src="assets-ml/edu-media/aps/s1.jpg"
                      alt="Prácticas de primeros auxilios"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/aps/s2.jpg"
                      alt="Laboratorio de biología"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/aps/s3.jpg"
                      alt="Simulación de atención al paciente"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/aps/s4.jpg"
                      alt="Simulación de atención al paciente"
                      class="slide-img" />
                  </div>
                </div>
                <button class="carousel-button prev">
                  <i class="fas fa-chevron-left"></i>
                </button>
                <button class="carousel-button next">
                  <i class="fas fa-chevron-right"></i>
                </button>
                <div class="carousel-indicators"></div>
              </div>
            </div>
            <p>
              Enfocado en la atención primaria, primeros auxilios y gestión de
              la salud comunitaria. Con un fuerte componente práctico y ético.
            </p>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-star"></i> Prácticas supervisadas en clínicas
                y comunidades.
              </li>
              <li>
                <i class="fas fa-star"></i> **Competencia:** Asistencia básica
                en procedimientos médicos.
              </li>
              <li>
                <i class="fas fa-star"></i> Certificación en Primeros Auxilios
                Avanzados.
              </li>
              <a
                href="https://youtu.be/hVNPmHe1jik"
                target="_blank"
                class="conocemas-btn">
                <i class="fab fa-youtube"></i> Conoce más sobre esta
                especialidad
              </a>
            </ul>
          </div>

          <div id="logistica" class="spec-content">
            <h4>
              Bachillerato Técnico Productivo: Logística Comercial y Global
            </h4>

            <div class="media-content-visual">
              <div class="carousel-container" data-carousel-id="logistica">
                <div class="carousel-slides">
                  <div class="carousel-slide active">
                    <img
                      src="assets-ml/edu-media/lg/l1.jpg"
                      alt="Foto de un almacén organizado"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/lg/l2.jpg"
                      alt="Mapa de cadena de suministro"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/lg/l3.jpg"
                      alt="Gestión de transporte y rutas"
                      class="slide-img" />
                  </div>
                </div>
                <button class="carousel-button prev">
                  <i class="fas fa-chevron-left"></i>
                </button>
                <button class="carousel-button next">
                  <i class="fas fa-chevron-right"></i>
                </button>
                <div class="carousel-indicators"></div>
              </div>
            </div>
            <p>
              Desarrollo de habilidades para gestionar la cadena de
              suministro, desde la importación/exportación hasta la
              distribución. La espina dorsal del comercio moderno.
            </p>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-star"></i> Manejo de sistemas de inventario y
                ERP.
              </li>
              <li>
                <i class="fas fa-star"></i> **Competencia:** Optimización de
                rutas y gestión de almacenes.
              </li>
              <li>
                <i class="fas fa-star"></i> Conocimiento en normativas
                aduaneras.
              </li>
              <a
                href="https://youtu.be/sc5ytNveJPM"
                target="_blank"
                class="conocemas-btn">
                <i class="fab fa-youtube"></i> Conoce más sobre esta
                especialidad
              </a>
            </ul>
          </div>

          <div id="sistemas" class="spec-content">
            <h4>
              Bachillerato Técnico Productivo: Sistemas Electrónicos y
              Energías Renovables
            </h4>

            <div class="media-content-visual">
              <div class="carousel-container" data-carousel-id="sistemas">
                <div class="carousel-slides">
                  <div class="carousel-slide active">
                    <img
                      src="assets-ml/edu-media/eca/e1.jpg"
                      alt="Instalación de paneles solares"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/eca/e2.jpg"
                      alt="Práctica con circuitos electrónicos"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/eca/e3.jpg"
                      alt="Fundamentos de robótica"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/eca/e4.jpg"
                      alt="Fundamentos de robótica"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/eca/e5.jpg"
                      alt="Fundamentos de robótica"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/eca/e6.jpg"
                      alt="Fundamentos de robótica"
                      class="slide-img" />
                  </div>
                </div>
                <button class="carousel-button prev">
                  <i class="fas fa-chevron-left"></i>
                </button>
                <button class="carousel-button next">
                  <i class="fas fa-chevron-right"></i>
                </button>
                <div class="carousel-indicators"></div>
              </div>
            </div>
            <p>
              Preparación en instalación y mantenimiento de sistemas
              electrónicos y tecnologías limpias. Lidera la transición
              energética y tecnológica del futuro.
            </p>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-star"></i> Diseño e instalación de paneles
                solares y sistemas eólicos.
              </li>
              <li>
                <i class="fas fa-star"></i> **Competencia:** Mantenimiento de
                circuitos y dispositivos electrónicos.
              </li>
              <li>
                <i class="fas fa-star"></i> Fundamentos de automatización.
              </li>
              <a
                href="https://youtu.be/vCzxuj0vSNc"
                target="_blank"
                class="conocemas-btn">
                <i class="fab fa-youtube"></i> Conoce más sobre esta
                especialidad
              </a>
            </ul>
          </div>

          <div id="turismo" class="spec-content">
            <h4>Bachillerato Técnico Vocacional: Servicios Turísticos</h4>

            <div class="media-content-visual">
              <div class="carousel-container" data-carousel-id="turismo">
                <div class="carousel-slides">
                  <div class="carousel-slide active">
                    <img
                      src="assets-ml/edu-media/st/st1.jpg"
                      alt="Práctica de guianza turística"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/st/st2.jpeg"
                      alt="Simulación de atención hotelera"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/st/st3.jpeg"
                      alt="Organización de eventos"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/st/st4.jpg"
                      alt="Organización de eventos"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/st/st5.jpg"
                      alt="Organización de eventos"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/st/st6.jpg"
                      alt="Organización de eventos"
                      class="slide-img" />
                  </div>
                </div>
                <button class="carousel-button prev">
                  <i class="fas fa-chevron-left"></i>
                </button>
                <button class="carousel-button next">
                  <i class="fas fa-chevron-right"></i>
                </button>
                <div class="carousel-indicators"></div>
              </div>
            </div>
            <p>
              Enfoque en hospitalidad, guianza turística y gestión de eventos.
              Una carrera dinámica con énfasis en el bilingüismo y la
              promoción cultural.
            </p>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-star"></i> Técnicas de atención al cliente y
                gestión hotelera.
              </li>
              <li>
                <i class="fas fa-star"></i> **Competencia:** Creación y
                promoción de paquetes turísticos.
              </li>
              <li>
                <i class="fas fa-star"></i> Certificación en guianza local.
              </li>
              <a
                href="https://youtu.be/Z9ePhtVMK3g"
                target="_blank"
                class="conocemas-btn">
                <i class="fab fa-youtube"></i> Conoce más sobre esta
                especialidad
              </a>
            </ul>
          </div>

          <div id="idiomas" class="spec-content">
            <h4>Bachillerato General Diplomado en Idiomas</h4>

            <div class="media-content-visual">
              <div class="carousel-container" data-carousel-id="idiomas">
                <div class="carousel-slides">
                  <div class="carousel-slide active">
                    <img
                      src="assets-ml/edu-media/g-idiomas/id1.jpg"
                      alt="Clase de alemán con profesor nativo"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/g-idiomas/id2.jpg"
                      alt="Intercambio cultural"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/g-idiomas/id3.jpg"
                      alt="Taller de conversación avanzado"
                      class="slide-img" />
                  </div>
                </div>
                <button class="carousel-button prev">
                  <i class="fas fa-chevron-left"></i>
                </button>
                <button class="carousel-button next">
                  <i class="fas fa-chevron-right"></i>
                </button>
                <div class="carousel-indicators"></div>
              </div>
            </div>
            <p>
              Dominio avanzado en lenguas extranjeras (Inglés, Portugués y
              Aleman). Ideal para carreras internacionales, abriendo puertas a
              universidades globales.
            </p>
            <ul class="requirements-list-enhanced">
              <li><i class="fas fa-star"></i> Dominio A1 en idiomas.</li>
              <li>
                <i class="fas fa-star"></i> **Competencia:** Comunicación
                intercultural efectiva y traducción básica.
              </li>
              <li>
                <i class="fas fa-star"></i> Preparación para exámenes
                internacionales.
              </li>
              <a
                href="https://youtu.be/jnj8_l8fXC4"
                target="_blank"
                class="conocemas-btn">
                <i class="fab fa-youtube"></i> Conoce más sobre esta
                especialidad
              </a>
            </ul>
          </div>

          <div id="software" class="spec-content">
            <h4>Bachillerato General Dipl. en Desarrollo de Software</h4>

            <div class="media-content-visual">
              <div class="carousel-container" data-carousel-id="software">
                <div class="carousel-slides">
                  <div class="carousel-slide active">
                    <img
                      src="assets-ml/edu-media/g-d-software/so1.jpg"
                      alt="Estudiante programando"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/g-d-software/so2.jpg"
                      alt="Diseño y desarrollo web"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/g-d-software/so3.jpg"
                      alt="Taller de bases de datos"
                      class="slide-img" />
                  </div>
                  <div class="carousel-slide">
                    <img
                      src="assets-ml/edu-media/g-d-software/so4.jpg"
                      alt="Taller de bases de datos"
                      class="slide-img" />
                  </div>
                </div>
                <button class="carousel-button prev">
                  <i class="fas fa-chevron-left"></i>
                </button>
                <button class="carousel-button next">
                  <i class="fas fa-chevron-right"></i>
                </button>
                <div class="carousel-indicators"></div>
              </div>
            </div>
            <p>
              Fundamentos de programación, bases de datos y desarrollo web. La
              base para tu carrera en el sector tecnológico, con un enfoque
              práctico.
            </p>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-star"></i> Introducción a lenguajes clave
                (Python, JavaScript).
              </li>
              <li>
                <i class="fas fa-star"></i> **Competencia:** Creación de
                sitios web responsivos.
              </li>
              <li>
                <i class="fas fa-star"></i> Desarrollo de bases de datos
                simples.
              </li>
              <a
                href="https://youtu.be/pJ4Ts31HwuE"
                target="_blank"
                class="conocemas-btn">
                <i class="fab fa-youtube"></i> Conoce más sobre esta
                especialidad
              </a>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="perfil" class="section-padding">
      <h3 class="section-title">
        <i class="fas fa-user-tie"></i> Perfil del Estudiante de Media
      </h3>
      <p class="section-subtitle">
        Los graduados de Bachillerato están preparados para ser líderes
        íntegros y profesionales competentes.
      </p>
      <div class="content-wrapper">
        <div class="tabs-buttons">
          <button class="tab-button active" data-tab="perfil-profesional">
            Orientación Profesional
          </button>
          <button class="tab-button" data-tab="perfil-humanista">
            Formación Humanista
          </button>
          <button class="tab-button" data-tab="perfil-tecnologico">
            Innovación y Tecnología
          </button>
        </div>

        <div class="tabs-container">
          <div id="perfil-profesional" class="tab-content active">
            <h4>Visión y Proyección de Carrera</h4>
            <p>
              El estudiante egresado posee una visión clara de su campo
              laboral o universitario. Es capaz de aplicar conocimientos
              técnicos específicos de su área de bachillerato para resolver
              problemas reales, demostrando alta competencia y autonomía.
            </p>
            <ul class="requirements-list-enhanced">
              <li>
                <i class="fas fa-check"></i> Habilidad para trabajar en equipo
                multidisciplinario.
              </li>
              <li>
                <i class="fas fa-check"></i> Planificación y gestión de
                proyectos.
              </li>
              <li>
                <i class="fas fa-check"></i> Ética y responsabilidad
                profesional.
              </li>
            </ul>
          </div>

          <div id="perfil-humanista" class="tab-content">
            <h4>Ciudadanía Global y Liderazgo</h4>
            <p>
              Fomentamos el desarrollo de un ciudadano crítico, reflexivo y
              comprometido con los valores sociales. El egresado actúa con
              empatía, respeta la diversidad y promueve la justicia,
              integrando la formación técnica con principios morales sólidos.
            </p>
          </div>

          <div id="perfil-tecnologico" class="tab-content">
            <h4>Adaptación e Innovación</h4>
            <p>
              Nuestros estudiantes están preparados para la constante
              evolución tecnológica. Dominan herramientas digitales avanzadas
              y poseen la capacidad de aprender de forma autónoma,
              convirtiéndose en agentes de cambio e innovación en cualquier
              entorno.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="valores" class="section-padding bg-light">
      <h3 class="section-title">
        <i class="fas fa-handshake"></i> Valores Agregados
      </h3>
      <p class="section-subtitle">
        Beneficios exclusivos que potencian tu formación técnica y
        profesional.
      </p>
      <div class="value-cards-grid content-wrapper">
        <div class="value-card">
          <i class="fas fa-users value-icon color-blue"></i>
          <h4>Pasantías Empresariales</h4>
          <p>
            Convenios con empresas líderes en las áreas técnicas para obtener
            experiencia real antes de graduarse.
          </p>
        </div>

        <div class="value-card">
          <i class="fas fa-university value-icon color-wine"></i>
          <h4>Becas Universitaria</h4>
          <p>
            Becas con el Ministerio de Educación Ciencia y Tecnologia con el
            programa de "INTEGRACIÓN", donde los estudiantes de bachillerato
            pueden aplicar
          </p>
        </div>

        <div class="value-card">
          <i class="fas fa-certificate value-icon color-gold"></i>
          <h4>Certificaciones Duales</h4>
          <p>
            Obtención de certificaciones técnicas adicionales que complementan
            el título de bachillerato, aumentando la empleabilidad.
          </p>
        </div>

        <div class="value-card">
          <i class="fas fa-flask value-icon color-blue"></i>
          <h4>Laboratorios de Última Generación</h4>
          <p>
            Acceso a equipos especializados en electrónica, robótica, software
            y salud, replicando entornos profesionales.
          </p>
        </div>
      </div>
    </section>

    <section id="admision" class="section-padding">
      <h3 class="section-title">
        <i class="fas fa-file-alt"></i> Proceso de Admisión a Bachillerato
      </h3>
      <div class="accordion-container content-wrapper">
        <div class="accordion-item">
          <div class="accordion-header">
            1. Solicitud y Documentación <i class="fas fa-chevron-down"></i>
          </div>
          <div class="accordion-content">
            <p>
              Debe presentar el expediente académico del Tercer Ciclo, partida
              de nacimiento original, y el formulario de solicitud
              completamente lleno. La fecha límite de entrega es el 30 de
              noviembre.
            </p>
          </div>
        </div>

        <div class="accordion-item">
          <div class="accordion-header">
            2. Prueba de Aptitud y Entrevista
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="accordion-content">
            <p>
              Los aspirantes a Bachillerato Técnico deben realizar una prueba
              de aptitud vocacional y una entrevista personal con el
              coordinador de la especialidad elegida.
            </p>
          </div>
        </div>

        <div class="accordion-item">
          <div class="accordion-header">
            3. Confirmación de Matrícula <i class="fas fa-chevron-down"></i>
          </div>
          <div class="accordion-content">
            <p>
              Los resultados se publicarán la primera semana de diciembre. Los
              estudiantes aceptados tienen un plazo de 10 días hábiles para
              formalizar su matrícula.
            </p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>

  <script src="assets-ml/script/scriptmedia.js"></script>
  <script defer src="script.js"></script>
</body>

</html>
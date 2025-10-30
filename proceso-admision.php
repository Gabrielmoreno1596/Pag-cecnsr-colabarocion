<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CECNSR | Nuevo Ingreso y Admisiones</title>
  <link rel="stylesheet" href="styles.css" />
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
  <!--     <header class="main-header">
      <div class="logo">
        <img src="logo-cecnsr.png" alt="Logo CECNSR" class="logo-img" />
        <h1>CECNSR</h1>
      </div>
      <nav class="main-nav" id="main-nav">
        <ul>
          <li><a href="index.php#hero">Inicio</a></li>
          <li><a href="index.php#filosofia">Filosofía y Valores</a></li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" id="oferta-toggle"
              >Oferta Académica <i class="fas fa-caret-down"></i
            ></a>
            <ul class="dropdown-menu">
              <li><a href="oferta-inicial.php">Inicial y Parvularia</a></li>
              <li><a href="oferta-ciclo1.php">I Ciclo</a></li>
              <li><a href="oferta-ciclo2.php">II Ciclo</a></li>
              <li><a href="oferta-ciclo3.php">III Ciclo</a></li>
              <li>
                <a href="oferta-bachillerato.php"
                  >Bachillerato (General, Diplomados y Técnicos)</a
                >
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" id="convenios-toggle"
              >Convenios <i class="fas fa-caret-down"></i
            ></a>
            <ul class="dropdown-menu">
              <li><a href="convenios-pasch.php">Colegios PASCH</a></li>
              <li><a href="convenios-dual.php">Proyecto DUAL</a></li>
              <li>
                <a href="convenios-psicologia.php"
                  >Equipo Líder en Psicología Individual</a
                >
              </li>
              <li>
                <a href="convenios-integracion.php">Proyecto de Integración</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="proceso-admision.php" class="btn-cta-nav"
              >Nuevo Ingreso <i class="fas fa-user-plus"></i
            ></a>
          </li>
        </ul>
      </nav>
      <button class="nav-toggle" aria-label="Abrir menú" id="nav-toggle">
        <i class="fas fa-bars"></i>
      </button>
    </header> -->

  <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>
  <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>
  <div class="page-header">
    <h1>Proceso de Admisión y Nuevo Ingreso 2026</h1>
    <p>
      ¡Te invitamos a formar parte de la familia CECNSR! Regístrate para
      iniciar el proceso.
    </p>
  </div>

  <section class="main-content">
    <div class="content-section" style="text-align: center">
      <h2 class="sub-title">Solicitud de Información y Visita Guiada</h2>
      <p style="max-width: 800px; margin: 0 auto 30px">
        Completa el siguiente formulario para que nuestro equipo de admisiones
        se ponga en contacto contigo y te brinde los detalles de matrícula,
        requisitos y una visita personalizada a nuestras instalaciones.
      </p>
    </div>

    <div class="admission-form-container">
      <form
        id="admission-form"
        action="https://formspree.io/f/xbjnqyzj"
        method="POST">
        <div class="form-group">
          <label for="nombre_padre">Nombre completo del Padre/Madre/Encargado:</label>
          <input
            type="text"
            id="nombre_padre"
            name="Nombre_Encargado"
            required />
        </div>

        <div class="form-group">
          <label for="telefono">Teléfono de Contacto (WhatsApp preferible):</label>
          <input type="tel" id="telefono" name="Telefono" required />
        </div>

        <div class="form-group">
          <label for="correo">Correo Electrónico (Para recibir la información):</label>
          <input
            type="email"
            id="correo"
            name="Correo_Electronico"
            required />
        </div>

        <div class="form-group">
          <label for="estudiante_grado">Grado de Interés para el Estudiante:</label>
          <select id="estudiante_grado" name="Grado_de_Interes" required>
            <option value="" disabled selected>
              -- Seleccione un nivel --
            </option>
            <option value="Inicial y Parvularia">Inicial y Parvularia</option>
            <option value="Primer Ciclo">I Ciclo</option>
            <option value="Segundo Ciclo">II Ciclo</option>
            <option value="Tercer Ciclo">III Ciclo</option>
            <option value="Bachillerato General">Bachillerato General</option>
            <option value="Bachillerato Tecnico">Bachillerato Técnico</option>
            <option value="Otro_Consulta">Otro / Solo Consulta</option>
          </select>
        </div>

        <div class="form-group">
          <label for="consulta">Consulta Específica o Comentarios Adicionales:</label>
          <textarea id="consulta" name="Consulta" rows="5"></textarea>
        </div>

        <button type="submit" class="btn-primary" style="width: 100%">
          Enviar Solicitud de Admisión
        </button>
      </form>
    </div>

    <div class="content-section" style="margin-top: 3rem; text-align: center">
      <p>
        Si deseas comunicarte de inmediato, llámanos al
        <span style="font-weight: bold">2503-1970</span> o escríbenos a
        <span style="font-weight: bold">CECNSROSARIO@HOTMAIL.COM</span>.
      </p>
    </div>
  </section>
  <?php include PROJECT_PATH . 'assets/partials/footer.php'; ?>
  <script src="script.js"></script>
</body>

</html>
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
      <form id="admission-form" action="enviar.php" method="POST" novalidate>
        <!-- Honeypot (debe quedar oculto con CSS) -->
        <input type="text" name="website" id="website" tabindex="-1" autocomplete="off" style="display:none">

        <div class="form-group">
          <label for="nombre_padre">Nombre completo del Padre/Madre/Encargado:</label>
          <input type="text" id="nombre_padre" name="nombre_encargado" required />
        </div>

        <div class="form-group">
          <label for="telefono">Teléfono de Contacto (WhatsApp preferible):</label>
          <input type="tel" id="telefono" name="telefono" required />
        </div>

        <div class="form-group">
          <label for="correo">Correo Electrónico (Para recibir la información):</label>
          <input type="email" id="correo" name="correo" required />
        </div>

        <div class="form-group">
          <label for="estudiante_grado">Grado de Interés para el Estudiante:</label>
          <select id="estudiante_grado" name="grado_interes" required>
            <option value="" disabled selected>-- Seleccione un nivel --</option>
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
          <textarea id="consulta" name="consulta" rows="5"></textarea>
        </div>
        <div class="g-recaptcha" data-sitekey="TU_SITE_KEY"></div>

        <button type="submit" class="btn-primary" style="width: 100%">
          Enviar Solicitud de Admisión
        </button>

        <!-- Mensajes -->
        <p id="form-msg" style="margin-top:12px"></p>
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

  <script>
    (function() {
      const form = document.getElementById('admission-form');
      const msg = document.getElementById('form-msg');
      if (!form) return;

      form.addEventListener('submit', async (e) => {
        // Si quieres envío tradicional, elimina esto y deja que navegue a enviar.php
        e.preventDefault();
        msg.textContent = '';
        const btn = form.querySelector('button[type="submit"]');
        btn.disabled = true;
        btn.textContent = 'Enviando...';

        try {
          const res = await fetch(form.action, {
            method: 'POST',
            headers: {
              'Accept': 'application/json'
            },
            body: new FormData(form)
          });
          const data = await res.json();
          msg.style.color = data.ok ? 'green' : 'crimson';
          msg.textContent = data.msg || (data.ok ? 'Enviado.' : 'Error.');
          if (data.ok) form.reset();
        } catch (err) {
          msg.style.color = 'crimson';
          msg.textContent = 'Error de red. Intenta de nuevo.';
        } finally {
          btn.disabled = false;
          btn.textContent = 'Enviar Solicitud de Admisión';
        }
      });
    })();
  </script>

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>




</body>

</html>
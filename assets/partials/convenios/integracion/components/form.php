<?php $data = require __DIR__ . '/../data/form.php'; ?>
<section class="section int-cta" id="<?= htmlspecialchars($data['id'] ?? 'contacto') ?>" aria-labelledby="cta-title">
  <div class="container">
    <div class="cta-card">
      <h2 id="cta-title" class="section-title"><?= htmlspecialchars($data['title'] ?? '') ?></h2>
      <div class="title-divider" aria-hidden="true"></div>
      <p><?= htmlspecialchars($data['lead'] ?? '') ?></p>

      <form id="form-integracion" class="contact-form" action="enviar.php" method="POST" novalidate>
        <input type="hidden" name="canal" value="<?= htmlspecialchars($data['canal'] ?? 'integracion') ?>">
        <input type="text" name="website" tabindex="-1" autocomplete="off" style="display:none">

        <div class="form-grid">
          <label>Nombre completo
            <input type="text" name="nombre_encargado" required autocomplete="name" />
          </label>

          <label>Correo electrónico
            <input type="email" name="correo" required autocomplete="email" />
          </label>

          <label>Teléfono
            <input type="tel" name="telefono" required autocomplete="tel" />
          </label>

          <label><?= htmlspecialchars($data['select']['label'] ?? 'Interés') ?>
            <select name="<?= htmlspecialchars($data['select']['name'] ?? 'interes') ?>" required>
              <?php foreach (($data['select']['options'] ?? []) as $opt): ?>
                <option value="<?= htmlspecialchars($opt) ?>"><?= htmlspecialchars($opt) ?></option>
              <?php endforeach; ?>
            </select>
          </label>

          <label class="full">Mensaje
            <textarea name="consulta" rows="4" placeholder="Cuéntanos tu necesidad…"></textarea>
          </label>

          <?php if (defined('RECAPTCHA_ENABLED') && RECAPTCHA_ENABLED): ?>
            <div class="full">
              <div class="g-recaptcha" data-sitekey="<?= htmlspecialchars(RECAPTCHA_SITE_KEY) ?>"></div>
            </div>
          <?php endif; ?>
        </div>

        <button class="btn-solid-int" type="submit"><?= htmlspecialchars($data['submit'] ?? 'Enviar') ?></button>
        <p id="msg-integracion" style="margin-top:10px"></p>
      </form>
    </div>
  </div>
</section>

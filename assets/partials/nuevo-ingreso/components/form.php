<?php /* $data disponible desde main.php */ ?>
<section class="ni ni-form section-padding" id="ni-form" aria-labelledby="form-title">
    <h2 id="form-title" class="section-title">Formulario de consulta</h2>

    <form id="form-nuevo-ingreso"
        class="ni-form admission-form-container ni-form__card"
        action="<?= BASE_URL ?>enviar.php"
        method="POST"
        novalidate>
        <!-- Canal para ruteo (CRÍTICO) -->
        <input type="hidden" name="canal" value="nuevo_ingreso">

        <!-- Honeypot anti-bots -->
        <input type="text" name="website" tabindex="-1" autocomplete="off" style="display:none">

        <!-- Tus campos -->
        <div class="form-group">
            <label>Nombre completo
                <input type="text" name="nombre_encargado" required autocomplete="name">
            </label>
        </div>
        <div class="form-group">
            <label>Correo electrónico
                <input type="email" name="correo" required autocomplete="email">
            </label>
        </div>
        <div class="form-group">
            <label>Teléfono
                <input type="tel" name="telefono" required autocomplete="tel">
            </label>
        </div>
        <div class="form-group">
            <label>Grado de interés
                <select id="ni-grado" name="grado" required>
                    <option value="" disabled selected>Seleccione…</option>
                    <?php foreach ($data['grados'] as $g): ?>
                        <option value="<?= htmlspecialchars($g) ?>">
                            <?= htmlspecialchars($g) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <div class="form-group">
            <label>Mensaje / Consulta
                <textarea name="consulta" rows="4" required></textarea>
            </label>
        </div>
        <!-- reCAPTCHA (ajusta según v2/v3) -->
        <?php if (!empty($RECAPTCHA_SITE_KEY)): ?>
            <div class="g-recaptcha" data-sitekey="<?= htmlspecialchars($RECAPTCHA_SITE_KEY) ?>"></div>
        <?php endif; ?>

        <div class="form-group">
            <label for="ni-respuesta">¿Cómo desea que le contactemos?</label>
            <select id="ni-respuesta" name="preferencia_contacto">
                <?php foreach ($data['canales'] as $c): ?>
                    <option value="<?= htmlspecialchars($c) ?>">
                        <?= htmlspecialchars($c) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>


        <button type="submit" class="ni-btn btn-primary ni-form__submit">Enviar Solicitud de Admisión</button>
        <p id="form-msg" class="ni-form__msg" aria-live="polite"></p>
    </form>

</section>
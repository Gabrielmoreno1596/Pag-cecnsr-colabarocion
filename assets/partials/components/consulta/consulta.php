<?php
if (!defined('PROJECT_PATH')) {
    require_once __DIR__ . '/../../../../config.php';
}

$endpoint = (defined('BASE_URL') ? BASE_URL : '/') . 'enviar_consulta.php';

$recaptchaEnabled = defined('RECAPTCHA_ENABLED') ? RECAPTCHA_ENABLED : false;
$siteKey = defined('RECAPTCHA_SITE_KEY') ? RECAPTCHA_SITE_KEY : '';
?>

<link rel="stylesheet" href="<?= asset('assets/partials/components/consulta/consulta.css') ?>">

<section class="band band--light band--consulta" id="consulta">
    <div class="section-padding consulta-wrap">
        <header class="consulta-head">
            <p class="consulta-eyebrow">Contacto</p>
            <h2 class="consulta-title">¿Tienes una consulta?</h2>
            <p class="consulta-subtitle">Completa el formulario y con gusto te atenderemos.</p>
        </header>

        <form id="consultaForm" class="consulta-form" id="consultaForm" action="<?= htmlspecialchars($endpoint) ?>" method="post" novalidate>
            <input class="consulta-hp" type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true">

            <div class="consulta-grid">
                <label class="consulta-field">
                    <span>Nombre completo <b>*</b></span>
                    <input type="text" name="nombre" required minlength="3" placeholder="Tu nombre completo">
                </label>

                <label class="consulta-field">
                    <span>Correo electrónico <b>*</b></span>
                    <input type="email" name="correo" required placeholder="tucorreo@gmail.com">
                </label>

                <label class="consulta-field">
                    <span>WhatsApp</span>
                    <input type="tel" name="whatsapp" placeholder="+503 0000-0000">
                </label>

                <label class="consulta-field">
                    <span>Tema / tipo de consulta</span>
                    <select name="tema">
                        <option value="Consulta general">Consulta general</option>
                        <option value="Admisiones">Admisiones</option>
                        <option value="Oferta académica">Oferta académica</option>
                        <option value="Costos y pagos">Costos y pagos</option>
                        <option value="Plataformas y soporte">Plataformas y soporte</option>
                        <option value="Otros">Otros</option>
                    </select>
                </label>

                <label class="consulta-field consulta-field--full">
                    <span>Mensaje / consulta <b>*</b></span>
                    <textarea name="mensaje" required minlength="10" rows="5" placeholder="Escribe aquí tu consulta..."></textarea>
                </label>
            </div>

            <div class="consulta-contacto">
                <p class="consulta-contacto__title">¿Cómo deseas que te contactemos?</p>
                <div class="consulta-radio">
                    <label><input type="radio" name="contacto" value="correo" checked> Correo</label>
                    <label><input type="radio" name="contacto" value="whatsapp"> WhatsApp</label>
                    <label><input type="radio" name="contacto" value="llamada"> Llamada</label>
                </div>
            </div>

            <?php if ($recaptchaEnabled): ?>
                <div class="consulta-captcha">
                    <div class="g-recaptcha" data-sitekey="<?= htmlspecialchars($siteKey) ?>"></div>
                </div>
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <?php endif; ?>

            <div class="consulta-actions">
                <button class="consulta-btn" type="submit">Enviar consulta</button>

                <div class="consulta-status" id="consultaStatus" role="status" aria-live="polite"></div>

                <!-- ✅ Botón WA “Continuar por WhatsApp” (prellenado por JS y por backend) -->
                <a class="consulta-wa" id="consultaWaBtn" href="#" target="_blank" rel="noopener" style="display:none;">
                    Continuar por WhatsApp
                </a>
            </div>
            <div id="consultaStatus"></div>
            <a id="consultaWaBtn" style="display:none;"></a>

        </form>
    </div>
</section>

<script src="<?= asset('assets/partials/components/consulta/consulta.js') ?>" defer></script>
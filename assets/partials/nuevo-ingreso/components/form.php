<?php /* $data disponible desde main.php */ ?>
<section class="ni ni-form section-padding" id="ni-form" aria-labelledby="form-title">
    <h2 id="form-title" class="section-title">Formulario de consulta</h2>

    <form class="admission-form-container ni-form__card"
        action="<?= BASE_URL ?>enviar.php"
        method="POST" novalidate>
        <!-- ruteo para backend existente -->
        <input type="hidden" name="canal" value="nuevo_ingreso">
        <!-- honeypot -->
        <input type="text" name="website" tabindex="-1" autocomplete="off" class="ni-hide-field" aria-hidden="true">

        <div class="form-group">
            <label for="ni-nombre">Nombre de la madre, padre o encargado</label>
            <input id="ni-nombre" name="nombre_encargado" type="text" required autocomplete="name">
        </div>

        <div class="form-group">
            <label for="ni-email">Correo electrónico</label>
            <input id="ni-email" name="email" type="email" required autocomplete="email">
        </div>

        <div class="form-group">
            <label for="ni-telefono">Teléfono de contacto</label>
            <input id="ni-telefono" name="telefono" type="tel" required inputmode="tel" pattern="[0-9+\s-]{8,}">
        </div>

        <div class="form-group">
            <label for="ni-estudiante">Nombre del estudiante</label>
            <input id="ni-estudiante" name="nombre_estudiante" type="text" required>
        </div>

        <div class="form-group">
            <label for="ni-grado">Grado al que desea ingresar</label>
            <select id="ni-grado" name="grado" required>
                <option value="" disabled selected>Seleccione…</option>
                <?php foreach ($data['grados'] as $g): ?>
                    <option value="<?= htmlspecialchars($g) ?>"><?= htmlspecialchars($g) ?></option>
                <?php endforeach; ?>
            </select>
        </div>



        <div class="form-group">
            <label for="ni-mensaje">Consulta o comentario</label>
            <textarea id="ni-mensaje" name="mensaje" rows="4" placeholder="Cuéntanos tu caso…" required></textarea>
        </div>

        <div class="form-group">
            <label for="ni-respuesta">¿Cómo desea que le contactemos?</label>
            <select id="ni-respuesta" name="preferencia_contacto">
                <?php foreach ($data['canales'] as $c): ?>
                    <option value="<?= htmlspecialchars($c) ?>"><?= htmlspecialchars($c) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button class="btn-primary ni-form__submit" type="submit">Enviar consulta</button>
        <p class="ni-form__hint">Tiempo de respuesta estimado: 24–48 h laborables.</p>
    </form>
</section>
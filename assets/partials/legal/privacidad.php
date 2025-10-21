<style>
    /* ====== LEGAL PAGE (scope local) ====== */
    .legal-page {
        max-width: 960px;
        margin: 0 auto;
        padding: 2rem 1rem 3rem;
        font-size: 1rem;
        line-height: 1.75;
    }

    .legal-page h1 {
        font-size: clamp(1.6rem, 2.4vw, 2.2rem);
        margin: 0 0 1rem;
    }

    .legal-page h2 {
        font-size: clamp(1.2rem, 1.8vw, 1.35rem);
        margin: 2rem 0 .6rem;
    }

    .legal-page p,
    .legal-page li {
        color: var(--cecns-ink, #1e1e1e);
    }

    .legal-meta {
        color: var(--cecns-muted, #6b7280);
        font-size: .95rem;
        margin-bottom: 1.25rem;
    }

    .legal-card {
        background: #fff;
        border: 1px solid rgba(0, 0, 0, .06);
        border-radius: 12px;
        padding: 1rem 1.25rem;
        box-shadow: 0 6px 18px #7c004019;
    }

    .legal-list {
        padding-left: 1.2rem;
    }

    .legal-page a {
        color: var(--cecns-navy, #15334a);
        text-decoration: underline;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin: .5rem 0 1rem;
        font-size: .95rem;
    }

    .table th,
    .table td {
        border: 1px solid rgba(0, 0, 0, .1);
        padding: .5rem .6rem;
        vertical-align: top;
    }

    .badge {
        display: inline-block;
        padding: .15rem .5rem;
        border-radius: 999px;
        font-size: .8rem;
        background: #eef2ff;
    }

    .notice {
        background: #f0fdf4;
        border: 1px solid #86efac;
        padding: .75rem 1rem;
        border-radius: 10px;
    }

    .kv {
        display: grid;
        grid-template-columns: 160px 1fr;
        gap: .5rem 1rem;
    }

    @media (max-width:640px) {
        .kv {
            grid-template-columns: 1fr;
        }
    }
</style>

<header class="legal-header">
    <h1>Política de privacidad</h1>
    <p class="legal-meta">Última actualización: <time datetime="<?= date('Y-m-d') ?>"><?= date('d/m/Y') ?></time></p>
</header>

<section class="legal-card">
    <h2>Responsable del tratamiento</h2>
    <div class="kv">
        <div><strong>Institución</strong></div>
        <div>CECNSR</div>
        <div><strong>Contacto</strong></div>
        <div><a href="mailto:cecnsrosario@hotmail.com">cecnsrosario@hotmail.com</a> · Tel. 2503-1970 / 2220-6927</div>
        <div><strong>Finalidades</strong></div>
        <div>Gestión de consultas, comunicaciones institucionales, procesos de admisión y mejora del sitio web.</div>
        <div><strong>Base legal</strong></div>
        <div>Consentimiento del interesado y/o interés legítimo educativo.</div>
    </div>
</section>

<h2>Datos que tratamos</h2>
<ul class="legal-list">
    <li><strong>Formularios:</strong> nombre, correo electrónico, teléfono y mensaje.</li>
    <li><strong>Admisiones/boletines (si aplica):</strong> datos proporcionados por el interesado o su representante.</li>
    <li><strong>Datos técnicos:</strong> dirección IP, navegador, páginas visitadas (mediante cookies o analítica, si están activadas).</li>
</ul>

<h2>Plazos de conservación</h2>
<p>Conservamos los datos el tiempo necesario para cumplir la finalidad y las obligaciones legales aplicables. Transcurrido ese plazo, serán suprimidos con medidas de seguridad adecuadas.</p>

<h2>Destinatarios y encargados</h2>
<p>Podemos compartir datos con proveedores que prestan servicios al CECNSR (alojamiento web, correo, analítica) bajo contratos de encargado de tratamiento. No vendemos datos personales.</p>

<h2>Transferencias internacionales</h2>
<p>Si un proveedor aloja datos fuera del país, exigimos garantías adecuadas conforme a la normativa aplicable.</p>

<h2>Derechos de las personas</h2>
<ul class="legal-list">
    <li>Acceso, rectificación, supresión/cancelación, oposición, limitación y portabilidad, en los casos previstos.</li>
    <li>Para ejercerlos, escribe a <a href="mailto:cecnsrosario@hotmail.com">cecnsrosario@hotmail.com</a> indicando el derecho que deseas ejercer.</li>
</ul>

<h2>Menores de edad</h2>
<p>Los formularios dirigidos a menores deben ser gestionados por madres, padres o representantes legales.</p>

<h2>Cookies</h2>
<p>Usamos cookies para asegurar el funcionamiento del sitio y, previo consentimiento, para analítica y contenidos embebidos.</p>

<table class="table">
    <thead>
        <tr>
            <th>Tipo</th>
            <th>Descripción</th>
            <th>Ejemplo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><span class="badge">Necesarias</span></td>
            <td>Imprescindibles para que el sitio funcione (sesión, seguridad, preferencias básicas).</td>
            <td>cookie_consent, php_session_id</td>
        </tr>
        <tr>
            <td><span class="badge">Analíticas (opcionales)</span></td>
            <td>Nos ayudan a entender el uso del sitio de forma agregada.</td>
            <td>_ga*, _gid (Google Analytics)</td>
        </tr>
        <tr>
            <td><span class="badge">Terceros (opcionales)</span></td>
            <td>Proveen contenido embebido (ej. videos) y pueden instalar cookies.</td>
            <td>CONSENT (YouTube), NID</td>
        </tr>
    </tbody>
</table>

<p>Puedes configurar o revocar tu consentimiento desde el banner o los ajustes de cookies cuando estén disponibles.</p>

<div class="notice" role="note">
    Para cualquier duda sobre esta política o sobre tus datos personales, escríbenos a <a href="mailto:cecnsrosario@hotmail.com">cecnsrosario@hotmail.com</a>.
</div>
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

    .notice {
        background: #fff8e1;
        border: 1px solid #ffe08a;
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
    <h1>Aviso legal</h1>
    <p class="legal-meta">Última actualización: <time datetime="<?= date('Y-m-d') ?>"><?= date('d/m/Y') ?></time></p>
</header>

<section class="legal-card">
    <h2>Titular del sitio</h2>
    <div class="kv">
        <div><strong>Institución</strong></div>
        <div>Complejo Educativo Católico Nuestra Señora del Rosario (CECNSR)</div>
        <div><strong>Dirección</strong></div>
        <div>Calle 15 de Septiembre Av. San José No. 286, San Marcos, San Salvador</div>
        <div><strong>Contacto</strong></div>
        <div><a href="mailto:cecnsrosario@hotmail.com">cecnsrosario@hotmail.com</a> · Tel. 2503-1970 / 2220-6927</div>
    </div>
</section>

<h2>Condiciones de uso</h2>
<p>El acceso y uso de este sitio web implica la aceptación de este aviso legal. El CECNSR podrá modificar contenidos y condiciones cuando lo estime oportuno para mantener la información actualizada.</p>

<h2>Propiedad intelectual</h2>
<ul class="legal-list">
    <li>Salvo indicación en contrario, los textos, materiales educativos, imágenes y logotipos pertenecen al CECNSR o a sus autores y se publican con fines formativos.</li>
    <li>Se prohíbe su reproducción, distribución o uso con fines comerciales sin autorización previa y por escrito.</li>
    <li>Cuando se utilicen obras de terceros, se indicará la autoría y/o la licencia correspondiente.</li>
</ul>

<h2>Uso permitido del contenido</h2>
<p>Se permite la consulta y descarga de materiales para fines educativos y no comerciales, respetando siempre la autoría y sin alterar su contenido.</p>

<h2>Enlaces externos</h2>
<p>Este sitio puede incluir enlaces a páginas de terceros. El CECNSR no se responsabiliza por los contenidos ni por las políticas de privacidad de dichos sitios.</p>

<h2>Limitación de responsabilidad</h2>
<p>Aunque se procura ofrecer información veraz y actualizada, no se garantiza la ausencia de errores, interrupciones del servicio o daños derivados del uso del sitio.</p>

<h2>Protección de datos</h2>
<p>El tratamiento de datos personales se rige por la <a href="/privacidad.php">Política de Privacidad</a> de este sitio.</p>

<h2>Actualizaciones</h2>
<p>Nos reservamos el derecho a actualizar este aviso legal. La fecha de vigencia se muestra al inicio.</p>

<div class="notice" role="note">
    ¿Tienes dudas sobre estas condiciones? Escríbenos a <a href="mailto:cecnsrosario@hotmail.com">cecnsrosario@hotmail.com</a>.
</div>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CECNSR - Colegios PASCH</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />


    <link rel="stylesheet" href="<?= asset('styles.css') ?>">
    <link rel="stylesheet" href="<?= asset('assets/css/style-convenios.css') ?>">

    <!-- Iconos -->

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png') ?>" type="image/x-icon" />

    <!-- SEO/OG -->
    <link rel="canonical" href="https://www.cecnsrosariosv.com/contribuciones/sitececnsr/pasch.php">
    <meta name="description" content="El CECNSR participa en PASCH: alemán, interculturalidad y oportunidades para estudiantes.">
    <meta property="og:title" content="CECNSR — Colegios PASCH">
    <meta property="og:description" content="Aprendizaje de alemán, interculturalidad y oportunidades PASCH.">
    <meta property="og:image" content="<?= asset('assets/og/pasch-cover.jpg') ?>">
    <meta property="og:url" content="https://www.cecnsrosariosv.com/contribuciones/sitececnsr/pasch.php">
    <meta name="twitter:card" content="summary_large_image">
</head>

<body>
    <style>
        /* ====== LEGAL PAGE (scope local) ====== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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
        }

        .sitemap {
            display: grid;
            grid-template-columns: repeat(2, minmax(220px, 1fr));
            gap: 1rem 2rem;
        }

        .sitemap ul {
            margin: 0;
            padding-left: 1.2rem;
        }

        .sitemap a {
            color: var(--cecns-navy, #15334a);
            text-decoration: underline;
        }

        .sitemap a:focus {
            outline: 2px dashed currentColor;
            outline-offset: 2px;
        }

        @media (max-width:700px) {
            .sitemap {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <header class="legal-header">
        <h1>Mapa del sitio</h1>
        <p class="legal-meta">Índice de las secciones principales del portal.</p>
    </header>

    <nav class="sitemap" aria-label="Índice de páginas">
        <!-- Columna 1 -->
        <section>
            <h2>Secciones principales</h2>
            <ul>
                <li><a href="<?= BASE_URL ?>index.php#hero">Inicio</a></li>
                <li><a href="<?= BASE_URL ?>pastoral-educativa.php">Pastoral Educativa</a></li>
                <li><a href="<?= BASE_URL ?>proceso-admision.php">Nuevo Ingreso (Proceso de admisión)</a></li>
                <!-- Agrega aquí otras páginas “top” que tengas publicadas -->
            </ul>
        </section>

        <!-- Columna 2 -->
        <section>
            <h2>Oferta académica</h2>
            <ul>
                <li><a href="<?= BASE_URL ?>oferta-inicial.php">Inicial y Parvularia</a></li>
                <li><a href="<?= BASE_URL ?>oferta-ciclo1.php">I Ciclo</a></li>
                <li><a href="<?= BASE_URL ?>oferta-ciclo2.php">II Ciclo</a></li>
                <li><a href="<?= BASE_URL ?>oferta-ciclo3.php">III Ciclo</a></li>
                <li><a href="<?= BASE_URL ?>oferta-bachillerato.php">Bachillerato (General, Diplomados y Técnicos)</a></li>
            </ul>
        </section>

        <!-- Columna 3 -->
        <section>
            <h2>Convenios</h2>
            <ul>
                <li><a href="<?= BASE_URL ?>convenios-pasch.php">Colegios PASCH</a></li>
                <li><a href="<?= BASE_URL ?>convenios-dual.php">Proyecto DUAL</a></li>
                <li><a href="<?= BASE_URL ?>convenios-psicologia.php">Psicología Individual</a></li>
                <li><a href="<?= BASE_URL ?>convenios-integracion.php">Integración</a></li>
            </ul>
        </section>

        <!-- Columna 4 -->
        <section>
            <h2>Información</h2>
            <ul>
                <li><a href="<?= BASE_URL ?>aviso-legal.php">Aviso legal</a></li>
                <li><a href="<?= BASE_URL ?>privacidad.php">Privacidad</a></li>
                <li><a href="<?= BASE_URL ?>mapa-del-sitio.php">Mapa del sitio</a></li>
                <!-- Si tienes “Contacto” como página .php independiente, destápalo: -->
                <!-- <li><a href="<?= BASE_URL ?>contacto.php">Contacto</a></li> -->
            </ul>
        </section>
    </nav>

    <p style="margin-top:1rem">
        <em>Si no encuentras una sección, escríbenos a
            <a href="mailto:cecnsrosario@hotmail.com">cecnsrosario@hotmail.com</a>.
        </em>
    </p>
</body>

</html>
<?php

/**
 * Componente: Aviso “en desarrollo / mantenimiento” (versión elaborada)
 * 
 * Parámetros opcionales por página (antes de incluir este archivo):
 * $UNDER_DEV = [
 *   'icon'     => '🛠️',
 *   'title'    => 'Esta página está en construcción',
 *   'message'  => 'Estamos mejorando el contenido. Gracias por tu paciencia.',
 *   'email'    => 'cecnsrosario@hotmail.com',
 *   'cta_href' => null,                       // ej. BASE_URL.'index.php'
 *   'cta_text' => 'Volver al inicio',         // si cta_href es null no se muestra
 *   'variant'  => 'dev',                      // 'dev' | 'maintenance' | 'info'
 * ];
 */

$cfg = array_merge([
    'icon'     => '🛠️',
    'title'    => 'Esta página está en construcción',
    'message'  => 'Estamos mejorando el contenido. Gracias por tu paciencia.',
    'email'    => 'cecnsrosario@hotmail.com',
    'cta_href' => null,
    'cta_text' => 'Volver al inicio',
    'variant'  => 'dev',
], isset($UNDER_DEV) && is_array($UNDER_DEV) ? $UNDER_DEV : []);

$variant = in_array($cfg['variant'], ['dev', 'maintenance', 'info'], true) ? $cfg['variant'] : 'dev';
?>
<section class="under-dev udev--<?= htmlspecialchars($variant) ?>" role="note" aria-label="Aviso de desarrollo">
    <div class="udev__bg" aria-hidden="true"></div>
    <div class="udev__border" aria-hidden="true"></div>

    <div class="udev__inner">
        <div class="udev__icon" aria-hidden="true"><?= htmlspecialchars($cfg['icon']) ?></div>
        <h2 class="udev__title"><?= htmlspecialchars($cfg['title']) ?></h2>
        <p class="udev__text">
            <?= htmlspecialchars($cfg['message']) ?>
            Si necesitas algo urgente, escríbenos a
            <a class="udev__link" href="mailto:<?= htmlspecialchars($cfg['email']) ?>"><?= htmlspecialchars($cfg['email']) ?></a>.
        </p>

        <?php if (!empty($cfg['cta_href'])): ?>
            <div class="udev__actions">
                <a href="<?= htmlspecialchars($cfg['cta_href']) ?>" class="udev__btn">
                    <?= htmlspecialchars($cfg['cta_text']) ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>


<style>
    /* ===========================
   Under Dev / Maintenance
   =========================== */

    :root {
        --udev-bg: rgba(255, 255, 255, .55);
        --udev-ink: #1f2937;
        --udev-muted: #6b7280;
        --udev-ring: rgba(16, 185, 129, .25);
        /* verde suave por defecto */
        --udev-grad-a: #22d3ee;
        /* cian */
        --udev-grad-b: #fbbf24;
        /* dorado */
        --udev-btn-bg: #111827;
        /* gris 900 */
        --udev-btn-fg: #f9fafb;
        /* gris 50 */
        --udev-border: rgba(0, 0, 0, .08);
    }

    @media (prefers-color-scheme: dark) {
        :root {
            --udev-bg: rgba(17, 24, 39, .55);
            --udev-ink: #e5e7eb;
            --udev-muted: #94a3b8;
            --udev-ring: rgba(250, 204, 21, .25);
            /* dorado suave */
            --udev-grad-a: #60a5fa;
            /* azul */
            --udev-grad-b: #f59e0b;
            /* ámbar */
            --udev-btn-bg: #fbbf24;
            --udev-btn-fg: #1f2937;
            --udev-border: rgba(255, 255, 255, .08);
        }
    }

    /* Variantes rápidas */
    .udev--maintenance {
        --udev-grad-a: #f43f5e;
        --udev-grad-b: #fb923c;
        --udev-ring: rgba(244, 63, 94, .25);
    }

    .udev--info {
        --udev-grad-a: #34d399;
        --udev-grad-b: #60a5fa;
        --udev-ring: rgba(96, 165, 250, .25);
    }

    .under-dev {
        position: relative;
        margin: 1.5rem auto;
        padding: 1.25rem;
        border-radius: 16px;
        color: var(--udev-ink);
        isolation: isolate;
        box-shadow:
            0 10px 30px rgba(0, 0, 0, .10),
            inset 0 1px 0 rgba(255, 255, 255, .10);
        overflow: clip;
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
    }

    /* Fondo vidrioso + resplandor superior */
    .udev__bg {
        position: absolute;
        inset: 0;
        z-index: -2;
        background:
            radial-gradient(900px 480px at 50% -10%, color-mix(in oklab, var(--udev-grad-b) 32%, transparent), transparent 60%),
            linear-gradient(180deg, var(--udev-bg), color-mix(in oklab, var(--udev-bg), transparent 30%));
    }

    /* Borde animado sutil */
    .udev__border {
        position: absolute;
        inset: 0;
        z-index: -1;
        border-radius: inherit;
        padding: 1px;
        /* grosor del borde */
        background:
            linear-gradient(135deg, color-mix(in oklab, var(--udev-grad-a) 65%, transparent), color-mix(in oklab, var(--udev-grad-b) 65%, transparent)) border-box;
        -webkit-mask:
            linear-gradient(#000 0 0) padding-box,
            linear-gradient(#000 0 0) border-box;
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        opacity: .85;
    }

    @media (prefers-reduced-motion: no-preference) {
        .udev__border {
            animation: udevShift 8s linear infinite;
        }
    }

    @keyframes udevShift {
        0% {
            filter: hue-rotate(0deg);
            opacity: .9;
        }

        50% {
            filter: hue-rotate(15deg);
            opacity: .75;
        }

        100% {
            filter: hue-rotate(0deg);
            opacity: .9;
        }
    }

    /* Contenido */
    .udev__inner {
        position: relative;
        display: grid;
        gap: .5rem;
        place-items: center;
        text-align: center;
    }

    .udev__icon {
        font-size: clamp(1.8rem, 3.2vw, 2.4rem);
    }

    .udev__title {
        margin: .25rem 0 .35rem;
        font-size: clamp(1.1rem, 2.2vw, 1.35rem);
        font-weight: 800;
        letter-spacing: .2px;
        text-wrap: balance;
    }

    .udev__text {
        margin: 0;
        color: var(--udev-muted);
        max-width: 60ch;
    }

    .udev__link {
        color: inherit;
        text-decoration: underline;
        text-underline-offset: 2px;
    }

    /* Acción */
    .udev__actions {
        margin-top: .6rem
    }

    .udev__btn {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        padding: .6rem .9rem;
        border-radius: 12px;
        background: var(--udev-btn-bg);
        color: var(--udev-btn-fg);
        text-decoration: none;
        font-weight: 700;
        letter-spacing: .2px;
        border: 1px solid var(--udev-border);
        box-shadow: 0 6px 18px rgba(0, 0, 0, .15);
        transition: transform .15s ease, box-shadow .2s ease;
    }

    .udev__btn:focus-visible {
        outline: 3px solid var(--udev-ring);
        outline-offset: 2px;
    }

    .udev__btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 10px 24px rgba(0, 0, 0, .20);
    }

    .udev__btn:active {
        transform: translateY(0)
    }

    /* Bordes / fallback por si el mask no es soportado */
    @supports not (-webkit-mask-composite: xor) {
        .udev__border {
            background: linear-gradient(135deg, var(--udev-grad-a), var(--udev-grad-b));
            opacity: .25;
        }
    }
</style>
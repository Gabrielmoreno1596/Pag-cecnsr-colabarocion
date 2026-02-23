<!-- Redes flotantes -->
<nav class="social-fab" aria-label="Accesos rápidos a redes sociales">

    <!-- Aula Virtual (primero) -->
    <a class="social-fab__btn av" href="#" target="_blank" rel="noopener" aria-label="Aula Virtual">
        <!-- Logo institucional (CECNSR) -->
        <img class="social-fab__logo" src="assets/img/logos/cecnsr.png" alt="CECNSR" loading="lazy" decoding="async" />
        <span class="social-fab__label">
            <strong>Aula Virtual</strong>
            <small>Ingresar a plataforma</small>
        </span>
    </a>

    <a class="social-fab__btn fb" href="https://www.facebook.com/cecnsr" target="_blank" rel="noopener" aria-label="Facebook">
        <i class="fab fa-facebook-f" aria-hidden="true"></i>
        <span class="social-fab__label">
            <strong>Facebook</strong>
            <small>/cecnsr</small>
        </span>
    </a>

    <a class="social-fab__btn ig" href="https://www.instagram.com/cecnsr_88043/" target="_blank" rel="noopener" aria-label="Instagram">
        <i class="fab fa-instagram" aria-hidden="true"></i>
        <span class="social-fab__label">
            <strong>Instagram</strong>
            <small>@cecnsr_88043</small>
        </span>
    </a>

    <a class="social-fab__btn yt" href="https://www.youtube.com/channel/UCkKhI2ckIH2joeW_TG_q-gg/videos" target="_blank" rel="noopener" aria-label="YouTube">
        <i class="fab fa-youtube" aria-hidden="true"></i>
        <span class="social-fab__label">
            <strong>YouTube</strong>
            <small>Videos y eventos</small>
        </span>
    </a>

    <a class="social-fab__btn wa" href="https://wa.me/50370072945" target="_blank" rel="noopener" aria-label="WhatsApp">
        <i class="fab fa-whatsapp" aria-hidden="true"></i>
        <span class="social-fab__label">
            <strong>WhatsApp</strong>
            <small>Escríbenos</small>
        </span>
    </a>
</nav>


<style>
    /* ===== Redes flotantes (PILL EXPAND) =====
       Idea: botón circular que al pasar el cursor se convierte en “pastilla”
       mostrando el nombre y un detalle adicional.

       ✅ Fix solicitado: los demás botones NO se mueven,
       solo se expande el botón activo.
    */

    .social-fab {
        position: fixed;
        right: clamp(12px, 2.4vw, 18px);
        top: 50%;
        transform: translateY(-50%);
        display: grid;
        gap: 10px;
        z-index: 9990;

        /* ✅ Reservamos el ancho máximo expandido para que NO “empuje” a los demás */
        --expanded: 240px;
        width: var(--expanded);
        justify-items: end;

        /* Opcional: suave entrada/salida al hacer scroll */
        opacity: 1;
        pointer-events: auto;
    }

    .social-fab__btn {
        --size: 48px;
        --bg: #0f172a;

        height: var(--size);
        width: var(--size);
        border-radius: 999px;

        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;

        padding: 0;

        color: #fff;
        text-decoration: none;

        backdrop-filter: blur(6px) saturate(120%);
        background: linear-gradient(180deg, var(--bg), var(--bg));
        box-shadow: 0 10px 22px rgba(0, 0, 0, .22), inset 0 1px 0 rgba(255, 255, 255, .12);
        border: 1px solid rgba(255, 255, 255, .22);

        position: relative;
        overflow: hidden;

        transition:
            width .22s ease,
            padding .22s ease,
            transform .15s ease,
            box-shadow .2s ease,
            filter .2s ease;

        will-change: width;

        /* ✨ Animación sutil (flotación) sin mover el layout */
        translate: 0 0;
        animation: fabFloat 6.2s ease-in-out infinite;

        /* ✅ Pegado a la derecha siempre */
        justify-self: end;
    }

    /* Pequeño desfase por botón (se siente más orgánico) */
    .social-fab__btn:nth-child(1) {
        animation-delay: 0s;
    }

    .social-fab__btn:nth-child(2) {
        animation-delay: .15s;
    }

    .social-fab__btn:nth-child(3) {
        animation-delay: .30s;
    }

    .social-fab__btn:nth-child(4) {
        animation-delay: .45s;
    }

    .social-fab__btn:nth-child(5) {
        animation-delay: .60s;
    }

    @keyframes fabFloat {

        0%,
        100% {
            translate: 0 0;
        }

        50% {
            translate: 0 -2px;
        }
    }

    .social-fab__btn:hover {
        width: var(--expanded);
        padding: 0 14px;
        justify-content: flex-start;
        transform: translateY(-2px);
        filter: brightness(1.02);

        /* En hover, detenemos la flotación para que se sienta estable */
        animation-play-state: paused;
    }

    .social-fab__btn i {
        font-size: 18px;
        line-height: 1;
        flex: 0 0 auto;
        width: 22px;
        text-align: center;
    }

    /* Logo institucional para Aula Virtual */
    .social-fab__logo {
        width: 22px;
        height: 22px;
        object-fit: contain;
        flex: 0 0 auto;

        /* Asegura contraste del logo en fondos coloridos */
        background: rgba(255, 255, 255, .92);
        border-radius: 999px;
        padding: 3px;
        box-shadow: inset 0 1px 0 rgba(0, 0, 0, .06);
    }

    /* Label integrado dentro del botón */
    .social-fab__label {
        display: grid;
        gap: 2px;

        /* Estado oculto */
        opacity: 0;
        transform: translateX(10px);
        max-width: 0;

        white-space: nowrap;
        overflow: hidden;

        transition:
            opacity .18s ease,
            transform .18s ease,
            max-width .22s ease;
    }

    .social-fab__label strong {
        font: 800 12px/1.05 system-ui, Segoe UI, Roboto, Arial, sans-serif;
        letter-spacing: .2px;
    }

    .social-fab__label small {
        font: 600 11px/1.05 system-ui, Segoe UI, Roboto, Arial, sans-serif;
        opacity: .82;
    }

    .social-fab__btn:hover .social-fab__label {
        opacity: 1;
        transform: translateX(0);
        max-width: 320px;
    }

    /* Accesibilidad: cuando navegan con TAB */
    .social-fab__btn:focus-visible {
        outline: 3px solid rgba(255, 255, 255, .55);
        outline-offset: 3px;
    }

    /* Colores por red */
    .social-fab__btn.fb {
        --bg: #1877f2;
    }

    .social-fab__btn.ig {
        --bg: #d6249f;
        background: radial-gradient(35% 35% at 30% 30%, #feda75, transparent 60%), linear-gradient(180deg, #d6249f, #285AEB);
    }

    .social-fab__btn.yt {
        --bg: #ff0000;
    }

    .social-fab__btn.wa {
        --bg: #25D366;
    }

    /* Aula Virtual */
    .social-fab__btn.av {
        --bg: #0ea5e9;
        background: linear-gradient(180deg, #0ea5e9, #0284c7);
    }

    /* Compacto en móvil: circular y sin texto */
    @media (max-width: 680px) {
        .social-fab {
            gap: 8px;
            width: auto;
        }

        .social-fab__btn {
            --size: 44px;

            /* En móvil, sin flotación (más limpio y estable) */
            animation: none;
            translate: 0 0;
        }

        .social-fab__btn:hover {
            width: var(--size);
            padding: 0;
            justify-content: center;
            transform: none;
        }

        .social-fab__label {
            display: none;
        }
    }

    /* Reduce motion */
    @media (prefers-reduced-motion: reduce) {

        .social-fab__btn,
        .social-fab__label {
            transition: none !important;
            animation: none !important;
            translate: 0 0;
        }
    }
</style>


<script>
    // Opcional: aparece al hacer scroll un poquito (más elegante y menos invasivo)
    const fab = document.querySelector('.social-fab');

    const toggleFab = () => {
        if (!fab) return;
        const visible = window.scrollY > 220;
        fab.style.opacity = visible ? '1' : '0';
        fab.style.pointerEvents = visible ? 'auto' : 'none';
        fab.style.transition = 'opacity .2s ease';
    };

    toggleFab();
    window.addEventListener('scroll', toggleFab, {
        passive: true
    });
</script>
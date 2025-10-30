<!-- Redes flotantes -->
<nav class="social-fab" aria-label="Redes sociales">
    <a class="social-fab__btn fb" href="https://www.facebook.com/cecnsr" target="_blank" rel="noopener" aria-label="Facebook">
        <i class="fab fa-facebook-f" aria-hidden="true"></i><span>Facebook</span>
    </a>
    <a class="social-fab__btn ig" href="https://www.instagram.com/cecnsr_88043/" target="_blank" rel="noopener" aria-label="Instagram">
        <i class="fab fa-instagram" aria-hidden="true"></i><span>Instagram</span>
    </a>
    <a class="social-fab__btn yt" href="https://www.youtube.com/channel/UCkKhI2ckIH2joeW_TG_q-gg/videos" target="_blank" rel="noopener" aria-label="YouTube">
        <i class="fab fa-youtube" aria-hidden="true"></i><span>YouTube</span>
    </a>
    <a class="social-fab__btn wa" href="https://wa.me/50370072945" target="_blank" rel="noopener" aria-label="WhatsApp">
        <i class="fab fa-whatsapp" aria-hidden="true"></i><span>WhatsApp</span>
    </a>
</nav>


<style>
    /* ===== Redes flotantes ===== */
    .social-fab {
        position: fixed;
        right: clamp(12px, 2.4vw, 18px);
        bottom: calc(16px + env(safe-area-inset-bottom, 0px));
        display: grid;
        gap: 10px;
        z-index: 9990;
    }

    .social-fab__btn {
        --size: 48px;
        --bg: #0f172a;
        /* fallback */
        --bg2: rgba(255, 255, 255, .14);
        width: var(--size);
        height: var(--size);
        border-radius: 999px;
        display: grid;
        place-items: center;
        color: #fff;
        text-decoration: none;
        backdrop-filter: blur(6px) saturate(120%);
        background: linear-gradient(180deg, var(--bg), var(--bg));
        box-shadow: 0 10px 22px rgba(0, 0, 0, .22), inset 0 1px 0 rgba(255, 255, 255, .12);
        border: 1px solid rgba(255, 255, 255, .22);
        position: relative;
        transition: transform .15s ease, box-shadow .2s ease, background .2s ease;
        overflow: visible;
    }

    .social-fab__btn:hover {
        transform: translateY(-2px);
    }

    /* Tooltips (etiquetas) */
    .social-fab__btn span {
        position: absolute;
        right: calc(100% + 8px);
        top: 50%;
        transform: translateY(-50%);
        font: 600 12px/1 system-ui, Segoe UI, Roboto, Arial, sans-serif;
        color: #0f172a;
        background: #fff;
        border: 1px solid #e8edf2;
        border-radius: 10px;
        padding: 6px 8px;
        white-space: nowrap;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .12);
        opacity: 0;
        pointer-events: none;
        transition: opacity .15s ease, transform .15s ease;
    }

    .social-fab__btn:hover span {
        opacity: 1;
        transform: translate(-2px, -50%);
    }

    /* Colores por red (puedes mapear a tus tokens) */
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

    /* Compacto en móvil y evita solapar con botón flotante propio */
    @media (max-width: 680px) {
        .social-fab {
            gap: 8px;
        }

        .social-fab__btn {
            --size: 44px;
        }

        .social-fab__btn span {
            display: none;
        }

        /* oculta tooltip en móvil */
    }

    /* (Opcional) versión lateral izquierda */
    :root .social-left .social-fab {
        right: auto;
        left: clamp(12px, 2.4vw, 18px);
    }

    :root .social-left .social-fab__btn span {
        left: calc(100% + 8px);
        right: auto;
        transform: translateY(-50%);
    }
</style>


<script>
    const fab = document.querySelector('.social-fab');
    const toggle = () => {
        if (!fab) return;
        fab.style.opacity = (window.scrollY > 220) ? '1' : '0';
        fab.style.pointerEvents = (window.scrollY > 220) ? 'auto' : 'none';
        fab.style.transition = 'opacity .2s ease';
    };
    toggle();
    window.addEventListener('scroll', toggle, {
        passive: true
    });
</script>
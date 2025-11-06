(() => {
    const timeline = document.querySelector('[data-oferta]');
    if (!timeline) return;

    // Abrir/cerrar items (igual que antes)
    timeline.addEventListener('click', (e) => {
        const head = e.target.closest('.timeline__head');
        if (!head) return;
        const item = head.closest('.timeline__item');
        const isOpen = item.classList.contains('is-open');
        timeline.querySelectorAll('.timeline__item').forEach(i => i.classList.remove('is-open'));
        if (!isOpen) item.classList.add('is-open');
        setupRotators();
    });

    const rotators = new WeakMap();
    const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
    const HOLD_AFTER_INTERACT = 6000; // ms para reanudar después de interacción

    const initRotator = (el) => {
        if (rotators.has(el)) return rotators.get(el);

        const slides = [...el.querySelectorAll('img')];
        let i = 0, t = null, holdTimer = null;
        const dur = Number(el.dataset.interval) || 4000;

        const show = (n) => {
            slides[i]?.classList.remove('is-active');
            i = (n + slides.length) % slides.length;
            slides[i]?.classList.add('is-active');
        };
        const next = () => show(i + 1);
        const prev = () => show(i - 1);

        const start = () => {
            if (slides.length < 2 || t || reduce) return;
            if (!slides.some(s => s.classList.contains('is-active'))) slides[0].classList.add('is-active');
            t = setInterval(next, dur);
        };
        const stop = () => { if (t) { clearInterval(t); t = null; } };

        const pauseThenResume = () => {
            stop();
            if (holdTimer) clearTimeout(holdTimer);
            holdTimer = setTimeout(start, HOLD_AFTER_INTERACT);
        };

        // Pausa en hover (desktop)
        el.addEventListener('mouseenter', stop);
        el.addEventListener('mouseleave', start);

        // Click/tap en la imagen -> siguiente + pausa temporal
        // (usamos el contenedor visual por si la imagen no ocupa todo)
        const media = el.closest('.oferta__media') || el;
        media.addEventListener('click', (ev) => {
            // Evita que clicks en botones internos (si los hubiera) disparen el avance
            if (ev.target.closest('button,[data-no-advance]')) return;
            next();
            pauseThenResume();
        });

        // Accesibilidad: foco/teclado
        media.tabIndex = 0;
        media.addEventListener('focusin', stop);
        media.addEventListener('focusout', start);
        media.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight') { e.preventDefault(); next(); pauseThenResume(); }
            if (e.key === 'ArrowLeft') { e.preventDefault(); prev(); pauseThenResume(); }
            if (e.key === ' ') { e.preventDefault(); next(); pauseThenResume(); }
        });

        const api = { start, stop, next, prev, show };
        rotators.set(el, api);
        return api;
    };

    function setupRotators() {
        // Detener todos
        document.querySelectorAll('.rotator').forEach(r => initRotator(r).stop());
        // Iniciar solo el del item abierto
        timeline.querySelectorAll('.timeline__item.is-open .rotator')
            .forEach(r => initRotator(r).start());
    }

    // Init
    setupRotators();

    // Al cambiar visibilidad de la pestaña
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            document.querySelectorAll('.rotator').forEach(r => initRotator(r).stop());
        } else {
            setupRotators();
        }
    });
})();

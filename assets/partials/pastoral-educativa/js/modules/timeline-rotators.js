(() => {
    const timeline = document.querySelector('[data-oferta]');
    if (!timeline) return;

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
    const initRotator = (el) => {
        if (rotators.has(el)) return rotators.get(el);
        const slides = [...el.querySelectorAll('img')];
        let i = 0, t = null;
        const dur = Number(el.dataset.interval) || 4000;

        const show = (n) => {
            slides[i]?.classList.remove('is-active');
            i = (n + slides.length) % slides.length;
            slides[i]?.classList.add('is-active');
        };
        const start = () => {
            if (slides.length < 2 || t) return;
            slides[0].classList.add('is-active');
            t = setInterval(() => show(i + 1), dur);
        };
        const stop = () => { if (t) { clearInterval(t); t = null; } };

        el.addEventListener('mouseenter', stop);
        el.addEventListener('mouseleave', start);

        const api = { start, stop };
        rotators.set(el, api);
        return api;
    };

    function setupRotators() {
        document.querySelectorAll('.rotator').forEach(r => initRotator(r).stop());
        timeline.querySelectorAll('.timeline__item.is-open .rotator')
            .forEach(r => initRotator(r).start());
    }

    setupRotators();
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            document.querySelectorAll('.rotator').forEach(r => initRotator(r).stop());
        } else {
            setupRotators();
        }
    });
})();

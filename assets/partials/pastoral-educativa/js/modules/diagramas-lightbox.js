// modules/diagramas-lightbox.js
(() => {
    const section = document.querySelector('.band--diagramas');
    const lb = document.getElementById('lightbox-diagramas');
    if (!section || !lb) return;

    const img = lb.querySelector('.lightbox__img');
    const cap = lb.querySelector('.lightbox__cap');
    const btnPrev = lb.querySelector('.lightbox__nav--prev');
    const btnNext = lb.querySelector('.lightbox__nav--next');
    const btnClose = lb.querySelector('[data-close]');

    // Recolecta SOLO las anclas de esta sección con data-gallery="diagramas"
    const anchors = [...section.querySelectorAll('a[data-gallery="diagramas"]')].filter(a => {
        const href = a.getAttribute('href') || '';
        return /\.(png|jpe?g|gif|webp|avif|svg)(\?.*)?$/i.test(href);
    });
    if (!anchors.length) return;

    let i = 0;

    const show = (idx) => {
        i = (idx + anchors.length) % anchors.length;
        const a = anchors[i];
        const href = a.getAttribute('href');
        const title = a.getAttribute('data-title') || a.getAttribute('title') || a.querySelector('img')?.getAttribute('alt') || '';

        img.style.opacity = 0.01;
        img.addEventListener('load', () => { img.style.opacity = 1; }, { once: true });
        img.src = href;
        cap.textContent = title;
    };

    const open = (idx) => {
        show(idx);
        lb.removeAttribute('hidden');
        lb.setAttribute('aria-hidden', 'false');
        document.documentElement.style.overflow = 'hidden';
        lb.focus();
    };

    const close = () => {
        lb.setAttribute('aria-hidden', 'true');
        lb.setAttribute('hidden', '');
        document.documentElement.style.overflow = '';
        img.removeAttribute('src');
    };

    // Eventos
    anchors.forEach((a, idx) => {
        a.addEventListener('click', (e) => {
            e.preventDefault();
            open(idx);
        }, { passive: false });
    });

    btnPrev?.addEventListener('click', () => show(i - 1));
    btnNext?.addEventListener('click', () => show(i + 1));
    btnClose?.addEventListener('click', close);

    lb.addEventListener('click', (e) => {
        if (e.target === lb) close();
    });

    window.addEventListener('keyup', (e) => {
        if (lb.getAttribute('aria-hidden') === 'true') return;
        if (e.key === 'Escape') close();
        if (e.key === 'ArrowLeft') show(i - 1);
        if (e.key === 'ArrowRight') show(i + 1);
    });
})();

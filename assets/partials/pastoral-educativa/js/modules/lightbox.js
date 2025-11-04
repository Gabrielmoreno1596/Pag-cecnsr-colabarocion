(() => {
    const lb = document.getElementById('lightbox');
    if (!lb) return;

    const lbImg = lb.querySelector('.lightbox__img');
    const btnClose = lb.querySelector('.lightbox__close');
    const btnPrev = lb.querySelector('.lightbox__nav--prev');
    const btnNext = lb.querySelector('.lightbox__nav--next');

    const anchors = Array.from(
        document.querySelectorAll('[data-gallery="main"] a, .gallery a, .masonry a, .mision-masonry a')
    );
    const sources = anchors.map(a => a.getAttribute('href')).filter(Boolean);
    if (!sources.length) return;

    let current = 0;
    const open = (i) => {
        current = i;
        lbImg.src = sources[current];
        lb.setAttribute('aria-hidden', 'false');
        lb.removeAttribute('hidden');
        document.body.style.overflow = 'hidden';
        lb.focus();
    };
    const close = () => {
        lb.setAttribute('aria-hidden', 'true');
        lb.setAttribute('hidden', '');
        document.body.style.overflow = '';
        lbImg.removeAttribute('src');
    };
    const nav = (d) => {
        current = (current + d + sources.length) % sources.length;
        lbImg.src = sources[current];
    };

    anchors.forEach((a, i) => {
        a.addEventListener('click', (e) => { e.preventDefault(); open(i); }, { passive: false });
    });
    btnClose?.addEventListener('click', close);
    btnPrev?.addEventListener('click', () => nav(-1));
    btnNext?.addEventListener('click', () => nav(1));
    lb.addEventListener('click', (e) => { if (e.target === lb) close(); });

    window.addEventListener('keyup', (e) => {
        if (lb.getAttribute('aria-hidden') === 'true') return;
        if (e.key === 'Escape') close();
        if (e.key === 'ArrowRight') nav(1);
        if (e.key === 'ArrowLeft') nav(-1);
    });
})();

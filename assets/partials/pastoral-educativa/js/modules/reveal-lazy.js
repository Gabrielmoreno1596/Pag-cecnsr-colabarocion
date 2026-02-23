(() => {
    const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

    
// Reveal (IntersectionObserver + fallback)
const $els = [...document.querySelectorAll('[data-reveal]')];

const revealEl = (el) => {
    if (el.classList.contains('is-in')) return;
    const d = Number(el.getAttribute('data-reveal-delay') || 0);
    el.style.setProperty('--rev-delay', `${BASE_DELAY + d}ms`);

    // Default (sin valor en data-reveal): zoom desde el centro
    const variant = (el.getAttribute('data-reveal') || '').trim().toLowerCase();
    if (!variant) {
        el.style.setProperty('--rev-x', '0px');
        el.style.setProperty('--rev-y', '0px');
        el.style.setProperty('--rev-scale', '.92');
        el.style.setProperty('--rev-anim', 'rev-zoom');
    }
    el.classList.add('is-in');
};

const inViewLate = (el) => {
    const r = el.getBoundingClientRect();
    const vh = window.innerHeight || document.documentElement.clientHeight || 0;
    // “Más notorio”: espera a que el elemento entre bastante al viewport
    // activa cuando el top está por debajo del 80% de la altura visible
    return r.bottom > 0 && r.top < (vh * 0.80);
};

if (!reduce && $els.length) {
    // Disparo “tarde” pero seguro (no deja cosas ocultas por ser muy altas)
    const io = new IntersectionObserver((entries, obs) => {
        for (const e of entries) {
            if (!e.isIntersecting) continue;
            revealEl(e.target);
            obs.unobserve(e.target);
        }
    }, { rootMargin: '0px 0px -20% 0px', threshold: 0.12 });

    $els.forEach(el => io.observe(el));

    // Fallback: si por alguna razón el observer “pierde” entradas, el scroll las revela igual.
    // (rAF throttle para no cargar la página)
    let ticking = false;
    const onScrollCheck = () => {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(() => {
            ticking = false;
            let remaining = 0;
            for (const el of $els) {
                if (el.classList.contains('is-in')) continue;
                remaining++;
                if (inViewLate(el)) revealEl(el);
            }
            // Si ya se reveló todo, quitamos listeners
            if (remaining === 0) {
                window.removeEventListener('scroll', onScrollCheck, { passive: true });
                window.removeEventListener('resize', onScrollCheck);
            }
        });
    };

    window.addEventListener('scroll', onScrollCheck, { passive: true });
    window.addEventListener('resize', onScrollCheck);

    // Corre una vez al cargar (por si recargan a mitad de página)
    onScrollCheck();
} else {
    $els.forEach(el => el.classList.add('is-in'));
}
// Lazy <img>
    const lazyImgs = [...document.querySelectorAll('img[data-src], img[data-srcset]')];
    if (lazyImgs.length) {
        const ioImg = new IntersectionObserver((entries, obs) => {
            for (const e of entries) {
                if (!e.isIntersecting) continue;
                const img = e.target;
                const src = img.getAttribute('data-src');
                const srcset = img.getAttribute('data-srcset');
                if (srcset) img.srcset = srcset;
                if (src) img.src = src;
                img.removeAttribute('data-src'); img.removeAttribute('data-srcset');
                obs.unobserve(img);
            }
        }, { rootMargin: '200px 0px', threshold: 0.01 });
        lazyImgs.forEach(i => ioImg.observe(i));
    }

    // Lazy background-image
    const lazyBg = [...document.querySelectorAll('[data-bg]')];
    if (lazyBg.length) {
        const ioBg = new IntersectionObserver((entries, obs) => {
            for (const e of entries) {
                if (!e.isIntersecting) continue;
                const el = e.target;
                const url = el.getAttribute('data-bg');
                el.style.backgroundImage = `url('${url}')`;
                el.removeAttribute('data-bg');
                obs.unobserve(el);
            }
        }, { rootMargin: '200px 0px', threshold: 0.01 });
        lazyBg.forEach(el => ioBg.observe(el));
    }
})();

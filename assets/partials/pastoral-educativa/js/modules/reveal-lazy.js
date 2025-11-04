(() => {
    const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

    // Reveal
    const $els = [...document.querySelectorAll('[data-reveal]')];
    if (!reduce && $els.length) {
        const io = new IntersectionObserver((entries, obs) => {
            for (const e of entries) {
                if (!e.isIntersecting) continue;
                const el = e.target;
                const d = Number(el.getAttribute('data-reveal-delay') || 0);
                if (d) el.style.setProperty('--rev-delay', `${d}ms`);
                el.classList.add('is-in');
                obs.unobserve(el);
            }
        }, { rootMargin: '0px 0px -10% 0px', threshold: 0.15 });
        $els.forEach(el => io.observe(el));
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

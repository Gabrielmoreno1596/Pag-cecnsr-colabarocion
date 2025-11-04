(() => {
    const crest = document.querySelector('.pastoral__crest-glass');
    if (!crest) return;
    const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduce) return;

    let raf = null, tx = 0, ty = 0;
    const animate = () => { crest.style.transform = `translate3d(${tx}px, ${ty}px, 0)`; raf = null; };

    const onMove = (e) => {
        const vw = Math.max(window.innerWidth, 1);
        const vh = Math.max(window.innerHeight, 1);
        const pt = ('touches' in e) ? e.touches[0] : e;
        tx = (pt.clientX / vw - .5) * 8;
        ty = (pt.clientY / vh - .5) * 6;
        if (!raf) raf = requestAnimationFrame(animate);
    };

    window.addEventListener('mousemove', onMove, { passive: true });
    window.addEventListener('touchmove', onMove, { passive: true });
})();

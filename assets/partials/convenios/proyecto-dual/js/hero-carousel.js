(() => {
    const root = document.querySelector(".dual-carousel");
    if (!root) return;

    let slides = window.DUAL_HERO_SLIDES || [];
    const img = root.querySelector("#dual-slide");
    const caption = root.querySelector("#dual-caption");
    const dots = [...root.querySelectorAll(".dual-carousel__dots button")];
    const prevBtn = root.querySelector(".dual-carousel__btn--prev");
    const nextBtn = root.querySelector(".dual-carousel__btn--next");
    const intervalMs = +root.dataset.interval || 6000;

    let i = 0, timer = null;

    function render(index, withFade = true) {
        if (!slides.length) return;
        i = (index + slides.length) % slides.length;
        const s = slides[i];
        if (!s) return;

        if (withFade) root.classList.add("is-fading");
        const preload = new Image();
        preload.src = s.src;

        requestAnimationFrame(() => {
            img.src = s.src;
            img.alt = s.alt || "";
            if (caption) caption.textContent = s.cap || "";
            dots.forEach((d, di) => d.setAttribute("aria-selected", di === i ? "true" : "false"));
            if (withFade) setTimeout(() => root.classList.remove("is-fading"), 160);
        });
    }

    function next() { render(i + 1); }
    function prev() { render(i - 1); }

    function start() {
        if (slides.length <= 1) return; // no auto si hay 1
        if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;
        stop();
        timer = setInterval(next, intervalMs);
    }
    function stop() { if (timer) { clearInterval(timer); timer = null; } }

    // Controles
    if (nextBtn) nextBtn.addEventListener("click", next);
    if (prevBtn) prevBtn.addEventListener("click", prev);
    dots.forEach((d) => d.addEventListener("click", (e) => render(+e.currentTarget.dataset.index)));

    root.addEventListener("mouseenter", stop);
    root.addEventListener("mouseleave", start);
    root.addEventListener("keydown", (e) => {
        if (e.key === "ArrowRight") next();
        if (e.key === "ArrowLeft") prev();
    });

    // Si no vino por window.DUAL_HERO_SLIDES, leer JSON embebido
    if (!slides.length) {
        const el = document.querySelector('script[type="application/json"][data-hero]');
        if (el) {
            try {
                window.DUAL_HERO_SLIDES = JSON.parse(el.textContent);
                slides = window.DUAL_HERO_SLIDES || [];
            } catch (e) { /* noop */ }
        }
    }

    render(0, false);
    start();
})();

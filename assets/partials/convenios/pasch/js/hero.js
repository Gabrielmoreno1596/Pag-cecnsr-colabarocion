(() => {
    const slides = window.__PASCH_HERO__;
    if (!Array.isArray(slides) || !slides.length) return;

    const mainImg = document.getElementById("sig-img");
    const captionEl = document.getElementById("sig-caption");
    const bar = document.getElementById("sig-progress");
    const thumbsEl = document.getElementById("sig-thumbs");
    const viewport = document.getElementById("sig-viewport");

    if (!mainImg || !thumbsEl || !viewport || !bar) return;

    // Crear thumbs
    thumbsEl.innerHTML = slides
        .map(
            (s, i) => `
        <button class="thumb${i === 0 ? " is-active" : ""}" role="tab" aria-selected="${i === 0}">
          <img src="${s.src}" alt="${s.alt || ""}" loading="lazy" decoding="async">
        </button>`
        )
        .join("");

    const thumbs = [...thumbsEl.querySelectorAll("button")];

    let i = 0, timer = null, hover = false, touchStartX = 0;
    const reduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    const DURATION = 6000;

    function render(idx) {
        i = (idx + slides.length) % slides.length;
        const s = slides[i];

        mainImg.src = s.src;
        mainImg.alt = s.alt || "";
        if (captionEl) captionEl.textContent = s.caption || "";

        thumbs.forEach((b, k) => {
            const on = k === i;
            b.classList.toggle("is-active", on);
            b.setAttribute("aria-selected", on ? "true" : "false");
        });

        // progreso
        bar.style.transition = "none";
        bar.style.width = "0%";
        void bar.offsetWidth;

        if (!reduced) {
            bar.style.transition = `width ${DURATION}ms linear`;
            bar.style.width = "100%";
        }
    }

    const next = () => render(i + 1);

    function start() {
        if (reduced) return;
        clearInterval(timer);
        timer = setInterval(() => {
            if (!hover) next();
        }, DURATION);
    }

    thumbs.forEach((b, idx) =>
        b.addEventListener("click", () => {
            render(idx);
            start();
        })
    );

    ["mouseenter", "mouseleave"].forEach((ev) => {
        viewport.addEventListener(ev, () => (hover = ev === "mouseenter"));
    });

    document.addEventListener("keydown", (e) => {
        if (e.key === "ArrowRight") { render(i + 1); start(); }
        if (e.key === "ArrowLeft") { render(i - 1); start(); }
    });

    viewport.addEventListener("touchstart", (e) => {
        touchStartX = e.touches[0].clientX;
    }, { passive: true });

    viewport.addEventListener("touchend", (e) => {
        const dx = e.changedTouches[0].clientX - touchStartX;
        if (Math.abs(dx) > 40) {
            render(dx < 0 ? i + 1 : i - 1);
            start();
        }
    }, { passive: true });

    render(0);
    start();
})();

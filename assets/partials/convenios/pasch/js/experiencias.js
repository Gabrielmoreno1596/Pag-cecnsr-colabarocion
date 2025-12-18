(() => {
    // ===== Rotación e intercambio en tarjetas de experiencia =====
    const ROTATE_MS = 5500;

    function initXpCard(card) {
        const media = card.querySelector(".xp-media");
        if (!media) return;

        media.setAttribute("role", "group");
        media.setAttribute("aria-label", "Galería de experiencia");

        const imgs = [...media.querySelectorAll("img")];
        imgs.forEach((img, i) => {
            img.setAttribute("tabindex", i === 0 ? "0" : "-1");
            img.setAttribute("draggable", "false");
        });

        const mainEl = media.querySelector("img.main");
        if (mainEl) mainEl.setAttribute("aria-current", "true");

        function swapContent(thumbex) {
            if (!thumbex || !mainEl || thumbex === mainEl) return;

            const tmpSrc = mainEl.src;
            const tmpAlt = mainEl.alt;

            mainEl.src = thumbex.src;
            mainEl.alt = thumbex.alt;

            thumbex.src = tmpSrc;
            thumbex.alt = tmpAlt;

            imgs.forEach((img) => img.removeAttribute("aria-current"));
            mainEl.setAttribute("aria-current", "true");
        }

        media.addEventListener("click", (e) => {
            const t = e.target.closest("img.thumbex");
            if (t) swapContent(t);
        });

        media.addEventListener("keydown", (e) => {
            const t = e.target.closest("img.thumbex");
            if (!t) return;
            if (e.key === "Enter" || e.key === " ") {
                e.preventDefault();
                swapContent(t);
            }
        });

        function next() {
            const firstThumb = media.querySelector("img.thumbex");
            if (firstThumb) swapContent(firstThumb);
        }

        let timer = null;
        const start = () => { if (!timer) timer = setInterval(next, ROTATE_MS); };
        const stop = () => { if (timer) { clearInterval(timer); timer = null; } };

        card.addEventListener("mouseenter", stop);
        card.addEventListener("mouseleave", start);
        card.addEventListener("focusin", stop);
        card.addEventListener("focusout", start);
        card.addEventListener("touchstart", stop, { passive: true });
        card.addEventListener("touchend", start, { passive: true });

        setTimeout(start, Math.random() * 1200 + 300);
    }

    document.querySelectorAll(".xp-card").forEach(initXpCard);

    // ===== Lightbox compartido =====
    const modal = document.getElementById("xpLightbox");
    if (!modal) return;

    const imgEl = modal.querySelector("#xpLbImg");
    const countEl = modal.querySelector("#xpLbCount");
    const prevBtn = modal.querySelector("#xpPrev");
    const nextBtn = modal.querySelector("#xpNext");

    let items = [];
    let index = 0;
    let startX = null;
    let keyHandler = null;

    function clamp(i, len) { return ((i % len) + len) % len; }

    function render(i) {
        if (!items.length) return;
        index = clamp(i, items.length);
        const it = items[index];

        imgEl.style.opacity = "0";
        const tmp = new Image();
        tmp.onload = () => {
            imgEl.src = it.src;
            imgEl.alt = it.alt || "Imagen";
            imgEl.style.opacity = "1";
            if (countEl) countEl.textContent = `${index + 1} / ${items.length}`;
        };
        tmp.src = it.src;
    }

    function openFromArray(arr, start = 0) {
        items = arr || [];
        if (!items.length) return;

        modal.hidden = false;
        document.body.classList.add("pdf-open");

        render(start);

        keyHandler = (e) => {
            if (e.key === "Escape") close();
            else if (e.key === "ArrowRight") render(index + 1);
            else if (e.key === "ArrowLeft") render(index - 1);
        };
        window.addEventListener("keydown", keyHandler);

        prevBtn.onclick = () => render(index - 1);
        nextBtn.onclick = () => render(index + 1);

        modal.querySelectorAll("[data-close]").forEach((b) => b.onclick = close);

        imgEl.addEventListener("contextmenu", (e) => e.preventDefault());
        imgEl.setAttribute("draggable", "false");
    }

    function close() {
        modal.hidden = true;
        document.body.classList.remove("pdf-open");
        if (keyHandler) window.removeEventListener("keydown", keyHandler);
        prevBtn.onclick = nextBtn.onclick = null;
    }

    // swipe
    imgEl.addEventListener("touchstart", (e) => {
        startX = e.touches[0].clientX;
    }, { passive: true });

    imgEl.addEventListener("touchend", (e) => {
        if (startX == null) return;
        const dx = e.changedTouches[0].clientX - startX;
        if (Math.abs(dx) > 40) dx < 0 ? render(index + 1) : render(index - 1);
        startX = null;
    }, { passive: true });

    // abrir desde experiencias
    document.querySelectorAll(".xp-card .xp-media").forEach((media) => {
        media.addEventListener("click", (e) => {
            const img = e.target.closest("img");
            if (!img) return;
            const card = media.closest(".xp-card");
            const main = card?.querySelector("img.main");
            const thumbs = [...(card?.querySelectorAll("img.thumbex") || [])];
            const list = [main, ...thumbs].filter(Boolean);

            const arr = list.map((el) => ({
                src: el.getAttribute("src"),
                alt: el.getAttribute("alt")
            }));

            const start = arr.findIndex((x) => x.src === img.getAttribute("src"));
            openFromArray(arr, start >= 0 ? start : 0);
        });
    });

    // expone para galería
    window.openXpLightbox = openFromArray;
})();

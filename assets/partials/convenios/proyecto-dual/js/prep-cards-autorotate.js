(() => {
    const ROTATE_MS = 5500;
    document.querySelectorAll(".prep-card").forEach((card) => {
        const media = card.querySelector(".prep-media");
        if (!media) return;

        media.setAttribute("role", "group");
        media.setAttribute("aria-label", "Galería de evidencias");
        media.querySelectorAll("img").forEach((img, i) => {
            img.setAttribute("tabindex", i === 0 ? "0" : "-1");
            img.setAttribute("draggable", "false");
        });

        const swapWithMain = (target) => {
            if (!target || target.classList.contains("main")) return;
            const main = media.querySelector(".main");
            main.classList.replace("main", "thumb");
            target.classList.replace("thumb", "main");
            media.querySelectorAll("img").forEach((img) => img.removeAttribute("aria-current"));
            target.setAttribute("aria-current", "true");
            target.focus({ preventScroll: true });
        };

        media.addEventListener("click", (e) => {
            const t = e.target.closest("img");
            if (t && t.classList.contains("thumb")) swapWithMain(t);
        });
        media.addEventListener("keydown", (e) => {
            const t = e.target.closest("img");
            if (!t) return;
            if ((e.key === "Enter" || e.key === " ") && t.classList.contains("thumb")) {
                e.preventDefault(); swapWithMain(t);
            }
        });

        const next = () => {
            const thumbs = [...media.querySelectorAll("img.thumb")];
            if (thumbs.length) swapWithMain(thumbs[0]);
        };

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
    });
})();

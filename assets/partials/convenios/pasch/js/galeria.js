(() => {
    const grid = document.getElementById("galeria");
    if (!grid) return;

    grid.addEventListener("click", (e) => {
        const a = e.target.closest("a.tile");
        if (!a) return;

        e.preventDefault();

        const items = [...grid.querySelectorAll("a.tile")].map((el) => ({
            src: el.dataset.full || el.getAttribute("href"),
            alt: el.querySelector("img")?.alt || "Imagen",
        }));

        const start = items.findIndex(
            (i) => i.src === (a.dataset.full || a.getAttribute("href"))
        );

        if (typeof window.openXpLightbox === "function") {
            window.openXpLightbox(items, start >= 0 ? start : 0);
        } else {
            // fallback suave
            window.open(a.href, "_blank", "noopener");
        }
    });
})();

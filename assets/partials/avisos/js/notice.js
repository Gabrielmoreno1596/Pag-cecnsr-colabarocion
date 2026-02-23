(() => {
    // Scroll suave al detalle
    const scrollBtns = document.querySelectorAll('[data-action="scroll"]');
    if (scrollBtns.length) {
        scrollBtns.forEach((btn) => {
            btn.addEventListener('click', (e) => {
                const href = btn.getAttribute('href') || '';
                if (!href.startsWith('#')) return;
                e.preventDefault();
                const target = document.querySelector(href);
                if (!target) return;
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        });
    }

    const input = document.querySelector("#noticeSearch");
    if (!input) return;

    const cards = Array.from(document.querySelectorAll(".notice-card"));

    const normalize = (s) =>
        (s || "")
            .toLowerCase()
            .normalize("NFD")
            .replace(/[\u0300-\u036f]/g, "");

    input.addEventListener("input", () => {
        const q = normalize(input.value.trim());

        cards.forEach((card) => {
            const hay = normalize(card.getAttribute("data-search") || "");
            const show = !q || hay.includes(q);
            card.style.display = show ? "" : "none";
        });
    });
})();

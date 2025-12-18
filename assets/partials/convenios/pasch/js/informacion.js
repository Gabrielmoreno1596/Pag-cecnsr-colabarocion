(() => {
    // Ajuste variable header-h
    document.addEventListener("DOMContentLoaded", () => {
        const header = document.querySelector(".main-header");
        if (!header) return;
        const setHeaderVar = () => {
            const h = header.offsetHeight || 0;
            document.documentElement.style.setProperty("--header-h", `${h}px`);
        };
        setHeaderVar();
        window.addEventListener("resize", setHeaderVar);
    });

    // Tabs del hub
    const hub = document.querySelector('#pasch-hub');
    if (hub) {
        const tabs = hub.querySelectorAll('.ihub__tab');
        const panels = hub.querySelectorAll('.ihub__panel');

        function activateTab(tab) {
            tabs.forEach(t => {
                const selected = t === tab;
                t.classList.toggle('is-active', selected);
                t.setAttribute('aria-selected', String(selected));
            });
            const id = tab.getAttribute('aria-controls');
            panels.forEach(p => p.classList.toggle('is-active', p.id === id));
        }

        tabs.forEach(t => {
            t.addEventListener('click', () => activateTab(t));
            t.addEventListener('keydown', (e) => {
                if (e.key !== 'ArrowRight' && e.key !== 'ArrowLeft') return;
                const order = Array.from(tabs);
                const i = order.indexOf(t);
                const next = e.key === 'ArrowRight'
                    ? order[(i + 1) % order.length]
                    : order[(i - 1 + order.length) % order.length];
                next.focus();
                activateTab(next);
            });
        });
    }

    // PDF modal global (para links .pdf)
    const modal = document.getElementById("pdfModal");
    const frame = document.getElementById("pdfFrame");
    const fallback = document.getElementById("pdfFallback");

    if (modal && frame) {
        const closers = modal.querySelectorAll("[data-close]");
        let lastFocus = null;

        document.addEventListener("click", (e) => {
            const a = e.target.closest('a[href$=".pdf"]');
            if (!a) return;

            e.preventDefault();
            openPDF(a.getAttribute("href"), a.getAttribute("aria-label") || a.textContent.trim());
        });

        function openPDF(url, title = "Documento") {
            lastFocus = document.activeElement;

            const clean = url.split("#")[0];
            const params = "#toolbar=0&navpanes=0&scrollbar=0&zoom=page-fit";
            frame.src = clean + params;

            const titleEl = modal.querySelector("#pdf-title");
            if (titleEl) titleEl.textContent = title;

            if (fallback) fallback.hidden = true;

            modal.hidden = false;
            document.body.classList.add("pdf-open");

            setTimeout(() => modal.querySelector(".pdf-close")?.focus(), 0);
            document.addEventListener("keydown", onKey);
            modal.addEventListener("contextmenu", prevent, { capture: true });
        }

        function closePDF() {
            modal.hidden = true;
            frame.src = "about:blank";
            document.body.classList.remove("pdf-open");
            document.removeEventListener("keydown", onKey);
            modal.removeEventListener("contextmenu", prevent, { capture: true });
            if (lastFocus) lastFocus.focus();
        }

        function onKey(e) {
            if (e.key === "Escape") return closePDF();
            if (e.key !== "Tab") return;

            const f = modal.querySelectorAll("button,[href],iframe");
            const first = f[0], last = f[f.length - 1];
            if (e.shiftKey && document.activeElement === first) {
                last.focus(); e.preventDefault();
            } else if (!e.shiftKey && document.activeElement === last) {
                first.focus(); e.preventDefault();
            }
        }

        function prevent(e) { e.preventDefault(); }

        closers.forEach((b) => b.addEventListener("click", closePDF));
        modal.querySelector(".pdf-backdrop")?.addEventListener("click", closePDF);
        frame.addEventListener("error", () => { if (fallback) fallback.hidden = false; });
    }
})();

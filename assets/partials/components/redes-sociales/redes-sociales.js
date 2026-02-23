(() => {
    const fab = document.querySelector(".social-fab");
    if (!fab) return;

    // Lee el config desde PHP (data-config JSON)
    let cfg = null;
    try {
        cfg = JSON.parse(fab.getAttribute("data-config") || "{}");
    } catch (e) {
        cfg = {};
    }

    const waBtn = document.getElementById("fabWhatsApp");

    // ===== 1) Toggle por scroll =====
    const threshold = Number(cfg?.scrollShow ?? 220);

    const toggleFab = () => {
        const visible = window.scrollY > threshold;
        fab.style.opacity = visible ? "1" : "0";
        fab.style.pointerEvents = visible ? "auto" : "none";
        fab.style.transition = "opacity .2s ease";
    };

    toggleFab();
    window.addEventListener("scroll", toggleFab, { passive: true });

    // ===== 2) WhatsApp prellenado (contexto + formulario) =====
    if (!waBtn) return;

    const buildWaLink = (phone, text) => {
        const cleanPhone = String(phone || "").replace(/[^\d]/g, "");
        const msg = encodeURIComponent(text || "");
        return `https://wa.me/${cleanPhone}?text=${msg}`;
    };

    const getContextMessage = () => {
        const fallback = cfg?.whatsapp?.defaultMessage
            || "Hola CECNSR, quisiera realizar una consulta desde su página web.";

        const path = (location.pathname || "").toLowerCase();
        const contexts = Array.isArray(cfg?.whatsapp?.contexts) ? cfg.whatsapp.contexts : [];

        for (const rule of contexts) {
            const match = (rule?.match || "").toLowerCase();
            const message = rule?.message || "";
            if (match && path.includes(match) && message) return message;
        }
        return fallback;
    };

    // Si existe #consultaForm, se arma mensaje con lo que el usuario va escribiendo
    const getFormMessage = () => {
        const form = document.getElementById("consultaForm");
        if (!form) return null;

        const nombre = (form.querySelector('[name="nombre"]')?.value || "").trim();
        const tema = (form.querySelector('[name="tema"]')?.value || "").trim();
        const mensaje = (form.querySelector('[name="mensaje"]')?.value || "").trim();

        if (!nombre && !tema && !mensaje) return null;

        return `Hola CECNSR, soy ${nombre || "un usuario"}.
Quisiera consultar sobre: ${tema || "Consulta general"}.
Mensaje: ${mensaje || "—"}
Gracias.`;
    };

    const updateWaHref = () => {
        const phone = cfg?.whatsapp?.phone || "50370072945";
        const fromForm = getFormMessage();
        const msg = fromForm || getContextMessage();
        waBtn.href = buildWaLink(phone, msg);
    };

    updateWaHref();

    const form = document.getElementById("consultaForm");
    if (form) {
        form.addEventListener("input", updateWaHref);
    }
})();

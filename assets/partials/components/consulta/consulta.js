(() => {
    const form = document.getElementById("consultaForm");
    if (!form) return;

    const statusEl = document.getElementById("consultaStatus");
    const waBtn = document.getElementById("consultaWaBtn");
    const submitBtn = form.querySelector('button[type="submit"]');

    // WhatsApp institucional (fallback si backend no devuelve wa_link)
    const WA_PHONE_FALLBACK = "50370072945";

    const setStatus = (msg, ok = true) => {
        if (!statusEl) return;
        statusEl.textContent = msg || "";
        statusEl.style.color = ok ? "inherit" : "#b00020";
    };

    const buildLocalWhatsAppLink = () => {
        const nombre = (form.querySelector('[name="nombre"]')?.value || "").trim();
        const tema = (form.querySelector('[name="tema"]')?.value || "").trim();
        const mensaje = (form.querySelector('[name="mensaje"]')?.value || "").trim();
        const correo = (form.querySelector('[name="correo"]')?.value || "").trim();

        const text = `Hola CECNSR, soy ${nombre || "un usuario"}.
Tema: ${tema || "Consulta general"}
Mensaje: ${mensaje || "—"}
Mi correo: ${correo || "—"}`;

        return `https://wa.me/${WA_PHONE_FALLBACK}?text=${encodeURIComponent(text)}`;
    };

    const showWhatsAppBtn = (href) => {
        if (!waBtn) return;
        waBtn.href = href || buildLocalWhatsAppLink();
        waBtn.style.display = "inline-flex";
    };

    const hideWhatsAppBtn = () => {
        if (!waBtn) return;
        waBtn.style.display = "none";
        waBtn.href = "#";
    };

    const getContactoPreferido = () => {
        const checked = form.querySelector('input[name="contacto"]:checked');
        return (checked?.value || "correo").toLowerCase();
    };

    // ✅ Opcional: mientras escriben, preparamos el botón (sin mostrarlo todavía)
    // Si quisieras mostrarlo en vivo al escribir, cambia hideWhatsAppBtn() por showWhatsAppBtn()
    form.addEventListener("input", () => {
        // Mantener oculto hasta que se envíe (más limpio)
        // hideWhatsAppBtn();
    });

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        if (submitBtn) submitBtn.disabled = true;
        setStatus("Enviando consulta...");

        // Al enviar, ocultamos WA mientras responde
        hideWhatsAppBtn();

        const preferencia = getContactoPreferido();

        try {
            const fd = new FormData(form);

            const res = await fetch(form.action, {
                method: "POST",
                body: fd,
                headers: { Accept: "application/json" },
            });

            const data = await res.json().catch(() => null);

            // ❌ Errores del backend
            if (!res.ok || !data || !data.ok) {
                const msg = data?.message || "No se pudo enviar. Intenta nuevamente.";
                setStatus(msg, false);

                // ✅ Si el usuario quería WhatsApp, damos fallback aunque el envío falle
                if (preferencia === "whatsapp") {
                    showWhatsAppBtn(buildLocalWhatsAppLink());
                    setStatus(msg + " Puedes continuar por WhatsApp.", false);
                }

                return;
            }

            // ✅ OK
            setStatus(data.message || "¡Consulta enviada!");

            // ✅ Si el backend devuelve wa_link, mostramos el botón SIEMPRE
            if (data.wa_link) {
                showWhatsAppBtn(data.wa_link);
            } else if (preferencia === "whatsapp") {
                // fallback (raro, pero por si acaso)
                showWhatsAppBtn(buildLocalWhatsAppLink());
            }

            // ✅ Reset reCAPTCHA si existe
            if (window.grecaptcha && typeof window.grecaptcha.reset === "function") {
                window.grecaptcha.reset();
            }

            // ✅ Limpiar formulario (pero dejamos el botón WhatsApp si existe wa_link)
            form.reset();

        } catch (err) {
            setStatus("Error de red. Revisa tu conexión e intenta de nuevo.", false);

            // ✅ Si prefería WhatsApp, habilitamos fallback
            if (preferencia === "whatsapp") {
                showWhatsAppBtn(buildLocalWhatsAppLink());
                setStatus("Error de red. Puedes continuar por WhatsApp.", false);
            }
        } finally {
            if (submitBtn) submitBtn.disabled = false;
        }
    });
})();

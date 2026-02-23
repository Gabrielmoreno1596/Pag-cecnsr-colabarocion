/**
 * Integración — Form (AJAX)
 * Requiere: enviar.php responda JSON { ok: bool, msg: string }
 */
(() => {
  const form = document.getElementById("form-integracion");
  const msg = document.getElementById("msg-integracion");
  if (!form || !msg) return;

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    msg.textContent = "";

    const btn = form.querySelector('button[type="submit"]');
    const oldTxt = btn?.textContent || "Enviar";
    if (btn) { btn.disabled = true; btn.textContent = "Enviando…"; }

    try {
      const res = await fetch(form.action, { method: "POST", body: new FormData(form) });
      let data;
      try { data = await res.json(); }
      catch { data = { ok: false, msg: "Respuesta no válida del servidor." }; }

      msg.style.color = data.ok ? "green" : "crimson";
      msg.textContent = data.msg || (data.ok ? "Enviado." : "Error.");

      if (data.ok) form.reset();
      if (window.grecaptcha && grecaptcha.reset) grecaptcha.reset();
    } catch (_) {
      msg.style.color = "crimson";
      msg.textContent = "Error de red. Intenta de nuevo.";
    } finally {
      if (btn) { btn.disabled = false; btn.textContent = oldTxt; }
    }
  });
})();

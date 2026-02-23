(() => {
  const form = document.getElementById('form-psicologia');
  const msg = document.getElementById('msg-psicologia');
  if (!form) return;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    if (msg) msg.textContent = '';

    const btn = form.querySelector('button[type="submit"]');
    if (btn) {
      btn.disabled = true;
      btn.textContent = 'Enviando…';
    }

    try {
      const res = await fetch(form.action, {
        method: 'POST',
        body: new FormData(form)
      });

      let data;
      try { data = await res.json(); }
      catch { data = { ok: false, msg: 'Respuesta no válida del servidor.' }; }

      if (msg) {
        msg.style.color = data.ok ? 'green' : 'crimson';
        msg.textContent = data.msg || (data.ok ? 'Enviado.' : 'Error.');
      }

      if (data.ok) form.reset();
      if (window.grecaptcha && grecaptcha.reset) grecaptcha.reset();

    } catch {
      if (msg) {
        msg.style.color = 'crimson';
        msg.textContent = 'Error de red. Intenta de nuevo.';
      }
    } finally {
      if (btn) {
        btn.disabled = false;
        btn.textContent = 'Enviar consulta';
      }
    }
  });
})();

(function (window) {
  const School = (window.CECNSRSchool = window.CECNSRSchool || {});

  /**
   * Reveal on Scroll (animación suave al entrar al viewport)
   * - NO cambia estilos existentes (inyecta CSS mínimo vía JS).
   * - Aplica a:
   *   - tarjetas principales (.school-tools-card, .school-tools-note, .school-spec)
   *   - items de checklist (.school-checklist__item)
   */
  School.revealOnScroll = {
    init() {
      // Evitar duplicaciones
      if (document.documentElement.dataset.revealInit === "1") return;
      document.documentElement.dataset.revealInit = "1";

      // CSS inyectado (no toca archivos CSS)
      const styleId = "cecnsr-reveal-css";
      if (!document.getElementById(styleId)) {
        const style = document.createElement("style");
        style.id = styleId;
        style.textContent = `
@media print { .js-reveal { opacity: 1 !important; transform: none !important; animation: none !important; } }

@media (prefers-reduced-motion: reduce) {
  .js-reveal { opacity: 1 !important; transform: none !important; animation: none !important; }
}

@media (prefers-reduced-motion: no-preference) {
  .js-reveal { opacity: 0; transform: translate3d(0, 16px, 0); will-change: transform, opacity; }
  .js-reveal.is-visible { opacity: 1; transform: none; animation: cecnsrRevealPop .55s cubic-bezier(.2,.9,.2,1) both; animation-delay: var(--reveal-delay, 0ms); }
  @keyframes cecnsrRevealPop {
    0%   { opacity: 0; transform: translate3d(0, 18px, 0) scale(.99); }
    60%  { opacity: 1; transform: translate3d(0, -4px, 0) scale(1); }
    100% { opacity: 1; transform: translate3d(0, 0, 0) scale(1); }
  }
}
        `.trim();
        document.head.appendChild(style);
      }

      const selector = [
        ".school-tools-card",
        ".school-tools-note",
        ".school-spec",
        ".school-checklist__item",
        ".school-cover-hero-wrap",
        ".school-cover-group",
        ".school-cover-notes > li",
        ".school-cover-item",
        ".school-cover-footer"
      ].join(",");

      const targets = Array.from(document.querySelectorAll(selector));
      if (!targets.length) return;

      // Preparar elementos + stagger suave por bloque
      let idx = 0;
      for (const el of targets) {
        // No interferir con elementos ya visibles por otras razones
        el.classList.add("js-reveal");

        // Delay leve, reinicia por contenedor para que no se vaya a delays enormes
        const delay = Math.min((idx % 10) * 35, 280);
        el.style.setProperty("--reveal-delay", `${delay}ms`);
        idx += 1;
      }

      // Fallback si no existe IntersectionObserver
      if (!("IntersectionObserver" in window)) {
        targets.forEach((el) => el.classList.add("is-visible"));
        return;
      }

      const io = new IntersectionObserver(
        (entries) => {
          for (const entry of entries) {
            if (entry.isIntersecting) {
              entry.target.classList.add("is-visible");
              io.unobserve(entry.target);
            }
          }
        },
        {
          root: null,
          threshold: 0.12,
          rootMargin: "0px 0px -10% 0px",
        }
      );

      targets.forEach((el) => io.observe(el));
    },
  };

  document.addEventListener("DOMContentLoaded", () => {
    School.levelbar?.init?.();
    School.bachDropdown?.init?.();
    School.checklist?.init?.();
    School.actions?.init?.();

    // Animación al hacer scroll (sin recargas)
    School.revealOnScroll?.init?.();
  });
})(window);

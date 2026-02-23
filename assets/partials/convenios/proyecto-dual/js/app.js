// Reveal on scroll for Proyecto DUAL
(() => {
  const doc = document;
  const root = doc.documentElement;
  root.classList.add("js");

  const mark = (selector, opts = {}) => {
    const nodes = doc.querySelectorAll(selector);
    nodes.forEach((el, i) => {
      if (!el || el.nodeType !== 1) return;
      if (!el.hasAttribute("data-reveal")) {
        el.setAttribute("data-reveal", opts.type || "fade-up");
      }
      if (opts.stagger) {
        const step = typeof opts.stagger === "number" ? opts.stagger : 80;
        el.style.setProperty("--reveal-delay", `${i * step}ms`);
      }
    });
  };

  // Auto-tag key elements (non-invasive; does not touch content)
  // Hero
  mark(".dual-hero__col--text > *");
  mark(".dual-hero__points li", { stagger: 60 });
  mark(".dual-hero__col--media", { type: "zoom" });

  // Sections/cards
  mark(".section .card");
  mark(".grid-3 .feature", { stagger: 80 });
  mark(".timeline > li", { stagger: 70 });

  // Prep cards & gallery tiles
  mark(".prep-grid .prep-card", { stagger: 90 });
  mark(".galleryDual .tile", { type: "zoom", stagger: 40 });

  // Contact items
  mark(".contact .contact__item", { stagger: 60 });

  const items = Array.from(doc.querySelectorAll("[data-reveal]"));
  if (!items.length) return;

  const show = (el) => el.classList.add("is-visible");

  // Fallback
  if (!("IntersectionObserver" in window)) {
    items.forEach(show);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting) {
          show(e.target);
          io.unobserve(e.target);
        }
      });
    },
    { root: null, threshold: 0.12, rootMargin: "0px 0px -8% 0px" }
  );

  items.forEach((el) => io.observe(el));
})();

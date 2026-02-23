// Reveal on scroll (Oferta Bachillerato) - sin tocar el contenido (solo auto-tag por selectores)
(() => {
  // Marca el documento como "con JS" (usado por reveal.css)
  document.documentElement.classList.add('js');

  const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

  const set = (el, attrs = {}) => {
    if (!el) return;
    if (!el.hasAttribute('data-reveal')) el.setAttribute('data-reveal', attrs.variant || 'up');
    if (attrs.delay != null && !el.hasAttribute('data-reveal-delay')) {
      el.setAttribute('data-reveal-delay', String(attrs.delay));
    }
  };

  const setMany = (nodeList, attrs = {}) => {
    const els = [...(nodeList || [])];
    const start = Number(attrs.start ?? 0);
    const step  = Number(attrs.step ?? 80);
    els.forEach((el, i) => set(el, { variant: attrs.variant, delay: start + i * step }));
  };

  // Auto-tag (NO cambia contenido; solo agrega data-reveal)
  const tag = () => {
    // HERO
    set(document.querySelector('.level-hero-title'),  { variant: 'up',   delay: 80 });
    set(document.querySelector('.level-hero-slogan'), { variant: 'fade', delay: 160 });

    // Títulos y subtítulos de sección
    setMany(document.querySelectorAll('.section-title'),    { variant: 'up',   start: 80, step: 70 });
    setMany(document.querySelectorAll('.section-subtitle'), { variant: 'fade', start: 120, step: 60 });

    // ESPECIALIDADES (tabs + contenido + carrusel)
    setMany(document.querySelectorAll('.specs-tab-buttons .spec-button'), { variant: 'scale', start: 120, step: 70 });
    setMany(document.querySelectorAll('.spec-content h4'), { variant: 'up', start: 140, step: 70 });
    setMany(document.querySelectorAll('.spec-content p'), { variant: 'fade', start: 160, step: 60 });
    setMany(document.querySelectorAll('.spec-content .requirements-list-enhanced li'), { variant: 'up', start: 190, step: 45 });
    setMany(document.querySelectorAll('.carousel-slides .carousel-slide'), { variant: 'fade', start: 140, step: 70 });

    // PERFIL (tabs)
    setMany(document.querySelectorAll('.tabs-buttons .tab-button'), { variant: 'scale', start: 120, step: 70 });
    setMany(document.querySelectorAll('.tab-content h4, .tab-content h3'), { variant: 'up', start: 140, step: 70 });
    setMany(document.querySelectorAll('.tab-content p'), { variant: 'fade', start: 170, step: 70 });
    setMany(document.querySelectorAll('.tab-content .requirements-list-enhanced li'), { variant: 'up', start: 190, step: 45 });

    // VALORES (cards)
    setMany(document.querySelectorAll('.value-cards-grid .value-card'), { variant: 'scale', start: 140, step: 90 });

    // ADMISION (acordeón) - detecta el section id real si cambia en markup
    const admSection = document.querySelector('.accordion-container')?.closest('section');
    const esc = (s) => (window.CSS && CSS.escape) ? CSS.escape(s) : String(s || '').replace(/[^a-zA-Z0-9_-]/g, '\\$&');
    const admSel = admSection?.id ? `#${esc(admSection.id)}` : '#admision';

    setMany(document.querySelectorAll(`${admSel} .accordion-header`), { variant: 'up', start: 140, step: 80 });
    setMany(document.querySelectorAll(`${admSel} .accordion-content p`), { variant: 'fade', start: 160, step: 60 });
  };

  tag();

  // --- Engine (IntersectionObserver + fallback) ---
  const $els = () => [...document.querySelectorAll('[data-reveal]')];

  const revealEl = (el) => {
    if (!el || el.classList.contains('is-in')) return;
    const delay = Number(el.getAttribute('data-reveal-delay') || 0);
    if (delay) el.style.setProperty('--rev-delay', `${delay}ms`);
    el.classList.add('is-in');
  };

  if (reduce) {
    $els().forEach(revealEl);
    return;
  }

  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting) {
          revealEl(e.target);
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -12% 0px' });

    $els().forEach((el) => io.observe(el));
    return;
  }

  // Fallback parcial: revela cuando entra en viewport
  const onScrollCheck = () => {
    const vh = window.innerHeight || 0;
    $els().forEach((el) => {
      if (el.classList.contains('is-in')) return;
      const r = el.getBoundingClientRect();
      if (r.top < vh * 0.86) revealEl(el);
    });
  };

  window.addEventListener('scroll', onScrollCheck, { passive: true });
  window.addEventListener('resize', onScrollCheck);
  onScrollCheck();
})();

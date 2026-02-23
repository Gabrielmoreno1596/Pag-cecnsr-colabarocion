// Reveal on scroll (Oferta III Ciclo) - sin tocar el contenido (solo auto-tag por selectores)
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

    // VALORES (cards)
    setMany(document.querySelectorAll('.value-cards-grid .value-card'), { variant: 'scale', start: 140, step: 90 });

    // METAS / TABS
    setMany(document.querySelectorAll('.tabs-buttons .tab-button'), { variant: 'scale', start: 120, step: 70 });
    setMany(document.querySelectorAll('.tab-content h3'), { variant: 'up', start: 140, step: 70 });
    setMany(document.querySelectorAll('.tab-content p'), { variant: 'fade', start: 170, step: 70 });
    setMany(document.querySelectorAll('.tab-content .requirements-list-enhanced li'), { variant: 'up', start: 190, step: 45 });

    // EXPERIENCIAS (carrusel de fotos)
    set(document.querySelector('.carousel-title'), { variant: 'up', delay: 120 });
    setMany(document.querySelectorAll('.photo-carousel-container .photo-item'), { variant: 'fade', start: 140, step: 70 });
    set(document.querySelector('.carousel-caption'), { variant: 'fade', delay: 140 });

    // TRAYECTORIA
    set(document.querySelector('.trayectoria-title'), { variant: 'up', delay: 120 });
    set(document.querySelector('.trayectoria-description'), { variant: 'fade', delay: 150 });
    setMany(document.querySelectorAll('.trayectoria-list li'), { variant: 'up', start: 170, step: 45 });

    // ADMISION (acordeón) - detecta el section id real si cambia en markup
    const admSection = document.querySelector('.accordion-container')?.closest('section');
    const esc = (s) => (window.CSS && CSS.escape) ? CSS.escape(s) : String(s || '').replace(/[^a-zA-Z0-9_-]/g, '\\$&');
    const admSel = admSection?.id ? `#${esc(admSection.id)}` : '#admisiones';

    setMany(document.querySelectorAll(`${admSel} .accordion-header`), { variant: 'up', start: 140, step: 80 });
    setMany(document.querySelectorAll(`${admSel} .accordion-content li`), { variant: 'fade', start: 160, step: 35 });
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

  // Observer
  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver((entries) => {
      for (const ent of entries) {
        if (ent.isIntersecting) {
          revealEl(ent.target);
          io.unobserve(ent.target);
        }
      }
    }, { rootMargin: '0px 0px -20% 0px', threshold: 0.12 });

    $els().forEach(el => io.observe(el));

    // Fallback: por si algo queda fuera (scroll + rAF)
    let ticking = false;
    const onScrollCheck = () => {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(() => {
        ticking = false;
        const vh = window.innerHeight || document.documentElement.clientHeight;
        for (const el of $els()) {
          if (el.classList.contains('is-in')) continue;
          const r = el.getBoundingClientRect();
          if (r.top < vh * 0.86) revealEl(el);
        }
      });
    };

    window.addEventListener('scroll', onScrollCheck, { passive: true });
    window.addEventListener('resize', onScrollCheck);
    onScrollCheck();
    return;
  }

  // Fallback total: revela todo
  $els().forEach(revealEl);
})();

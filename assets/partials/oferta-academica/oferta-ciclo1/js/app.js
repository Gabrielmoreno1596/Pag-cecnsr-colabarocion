// Reveal on scroll (Oferta I Ciclo) - sin tocar el contenido (solo auto-tag por selectores)
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

    // Títulos de sección
    setMany(document.querySelectorAll('.section-title'), { variant: 'up', start: 80, step: 70 });

    // METAS
    set(document.querySelector('.goals-list-container > p'), { variant: 'up', delay: 120 });
    setMany(document.querySelectorAll('.profile-item-card'), { variant: 'up', start: 140, step: 80 });
    setMany(document.querySelectorAll('.photo-carousel-container .photo-item'), { variant: 'fade', start: 140, step: 70 });
    set(document.querySelector('.carousel-caption'), { variant: 'fade', delay: 120 });

    // TRAYECTORIA (tabs)
    setMany(document.querySelectorAll('.tabs-buttons .tab-button'), { variant: 'scale', start: 120, step: 70 });
    setMany(document.querySelectorAll('.tab-content .requirements-list-enhanced li'), { variant: 'up', start: 140, step: 45 });

    // VALORES
    set(document.querySelector('.valores-intro'), { variant: 'up', delay: 120 });
    setMany(document.querySelectorAll('.service-circles-grid .service-circle-item'), { variant: 'scale', start: 140, step: 90 });

    // ADMISION (acordeón)
    setMany(document.querySelectorAll('#admisiones .accordion-header'), { variant: 'up', start: 140, step: 80 });
    setMany(document.querySelectorAll('#admisiones .accordion-content li'), { variant: 'fade', start: 160, step: 35 });
  };

  tag();

  // --- Engine (IntersectionObserver + fallback) ---
  const $els = () => [...document.querySelectorAll('[data-reveal]')];

  const revealEl = (el) => {
    if (!el || el.classList.contains('is-in')) return;

    const d = Number(el.getAttribute('data-reveal-delay') || 0);
    el.style.setProperty('--rev-delay', `${d}ms`);

    // Variante (data-reveal) controla el vector; si no existe: zoom desde el centro
    const variant = (el.getAttribute('data-reveal') || '').trim().toLowerCase();
    if (!variant) {
      el.style.setProperty('--rev-x', '0px');
      el.style.setProperty('--rev-y', '0px');
      el.style.setProperty('--rev-scale', '.92');
      el.style.setProperty('--rev-anim', 'rev-zoom');
    }

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

// Reveal on scroll (Oferta Inicial) - sin tocar el contenido (solo auto-tag por selectores)
(() => {
  // Marca el documento como "con JS" (usado por reveal.css)
  document.documentElement.classList.add('js');

  const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
  const clamp = (n, min, max) => Math.max(min, Math.min(max, n));

  const set = (el, attrs = {}) => {
    if (!el) return;
    if (!el.hasAttribute('data-reveal')) el.setAttribute('data-reveal', attrs.variant || 'up');
    if (attrs.delay != null && !el.hasAttribute('data-reveal-delay')) {
      el.setAttribute('data-reveal-delay', String(attrs.delay));
    }
  };

  const setMany = (nodes, { variant = 'up', start = 0, step = 90, max = 450 } = {}) => {
    if (!nodes) return;
    [...nodes].forEach((el, i) => set(el, { variant, delay: clamp(start + i * step, 0, max) }));
  };

  // 1) Auto-tag: añade data-reveal donde hace falta (sin tocar PHP)
  const autoTag = () => {
    // HERO (no tiene id)
    const hero = document.querySelector('section.level-hero');
    if (hero) {
      set(hero, { variant: 'fade', delay: 0 });
      set(hero.querySelector('.level-hero-title'), { variant: 'up', delay: 80 });
      set(hero.querySelector('.level-hero-slogan'), { variant: 'up', delay: 160 });
    }

    // Secciones estándar
    document.querySelectorAll('main > section').forEach((sec) => {
      set(sec.querySelector('.section-title'), { variant: 'up', delay: 0 });
    });

    // PERFIL
    setMany(document.querySelectorAll('#perfil .profile-item-card'), { variant: 'up', start: 140, step: 90 });

    // GRADOS / EDADES
    setMany(document.querySelectorAll('#grados-edades .grade-card'), { variant: 'up', start: 140, step: 90 });

    // ÁREAS
    setMany(document.querySelectorAll('#areas .course-card'), { variant: 'up', start: 140, step: 90 });

    // SERVICIOS (círculos)
    setMany(document.querySelectorAll('#servicios .service-circle-item'), { variant: 'scale', start: 140, step: 90 });

    // ADMISIÓN (acordeón)
    setMany(document.querySelectorAll('#admision .accordion-item'), { variant: 'up', start: 140, step: 80 });

    // ENTORNO (fotos)
    setMany(document.querySelectorAll('#entorno .photo-item'), { variant: 'fade', start: 120, step: 70 });
  };

  const $els = () => [...document.querySelectorAll('[data-reveal]')];

  const revealEl = (el) => {
    if (!el || el.classList.contains('is-in')) return;
    const d = Number(el.getAttribute('data-reveal-delay') || 0);
    el.style.setProperty('--rev-delay', `${d}ms`);
    el.classList.add('is-in');
  };

  const inView = (el) => {
    const r = el.getBoundingClientRect();
    const vh = window.innerHeight || document.documentElement.clientHeight || 0;
    // Dispara cuando el elemento ya entró lo suficiente al viewport
    return r.bottom > 0 && r.top < vh * 0.92;
  };

  const runFallback = () => {
    if (reduce) {
      // si el usuario prefiere menos movimiento, solo asegúrate que estén visibles
      $els().forEach((el) => el.classList.add('is-in'));
      return;
    }
    let ticking = false;
    const onScroll = () => {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(() => {
        $els().forEach((el) => (inView(el) ? revealEl(el) : null));
        ticking = false;
      });
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll);
    onScroll();
  };

  const runObserver = () => {
    if (reduce) {
      $els().forEach((el) => el.classList.add('is-in'));
      return;
    }
    const io = new IntersectionObserver((entries) => {
      for (const e of entries) {
        if (e.isIntersecting) {
          revealEl(e.target);
          io.unobserve(e.target);
        }
      }
    }, { threshold: 0.12, rootMargin: '0px 0px -10% 0px' });

    $els().forEach((el) => io.observe(el));
  };

  const boot = () => {
    autoTag();
    if ('IntersectionObserver' in window) runObserver();
    else runFallback();
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot, { once: true });
  } else {
    boot();
  }
})();

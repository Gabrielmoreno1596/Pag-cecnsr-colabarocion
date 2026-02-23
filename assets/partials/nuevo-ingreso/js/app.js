// Marca el documento como "con JS" (usado por reveal-on-scroll)
document.documentElement.classList.add('js');

/**
 * Reveal on scroll (IntersectionObserver + fallback)
 * - No toca el contenido HTML/PHP: solo añade data-reveal/data-reveal-delay en runtime
 * - Respeta prefers-reduced-motion
 */
(() => {
  const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

  const clamp = (n, min, max) => Math.max(min, Math.min(max, n));
  const BASE_DELAY = 60;

  const autoTag = () => {
    // Aplica reveal a todas las secciones principales de Nuevo Ingreso
    const sections = document.querySelectorAll('section.ni');
    sections.forEach((sec, i) => {
      if (!sec.hasAttribute('data-reveal')) sec.setAttribute('data-reveal', 'up');
      if (!sec.hasAttribute('data-reveal-delay')) sec.setAttribute('data-reveal-delay', String(clamp(i * 80, 0, 560)));
    });

    // Hero: revela contenido interno con un pequeño delay (si existe)
    const hero = document.querySelector('.ni-hero');
    if (hero) {
      const content = hero.querySelector('.ni-hero__content, .ni-hero__inner, .ni-hero__copy');
      if (content && !content.hasAttribute('data-reveal')) {
        content.setAttribute('data-reveal', 'zoom');
        content.setAttribute('data-reveal-delay', '80');
      }
    }

    // Pasos: lista item por item
    const steps = document.querySelector('.ni-steps');
    if (steps) {
      const items = steps.querySelectorAll('li');
      items.forEach((el, idx) => {
        if (!el.hasAttribute('data-reveal')) el.setAttribute('data-reveal', 'up');
        if (!el.hasAttribute('data-reveal-delay')) el.setAttribute('data-reveal-delay', String(clamp(idx * 70, 0, 560)));
      });
    }

    // Formulario: campos .form-group
    const form = document.querySelector('.ni-form');
    if (form) {
      const title = form.querySelector('.section-title');
      if (title && !title.hasAttribute('data-reveal')) title.setAttribute('data-reveal', 'up');

      const groups = form.querySelectorAll('.form-group');
      groups.forEach((el, idx) => {
        if (!el.hasAttribute('data-reveal')) el.setAttribute('data-reveal', 'up');
        if (!el.hasAttribute('data-reveal-delay')) el.setAttribute('data-reveal-delay', String(clamp(idx * 55, 0, 660)));
      });

      const submit = form.querySelector('button[type="submit"], .ni-form__submit');
      if (submit && !submit.hasAttribute('data-reveal')) {
        submit.setAttribute('data-reveal', 'up');
        submit.setAttribute('data-reveal-delay', '220');
      }
    }

    // Mensaje de éxito
    const ok = document.querySelector('.ni-success');
    if (ok) {
      const kids = ok.querySelectorAll('h1,h2,h3,p,a,button');
      kids.forEach((el, idx) => {
        if (!el.hasAttribute('data-reveal')) el.setAttribute('data-reveal', 'up');
        if (!el.hasAttribute('data-reveal-delay')) el.setAttribute('data-reveal-delay', String(clamp(idx * 70, 0, 560)));
      });
    }
  };

  const $els = () => [...document.querySelectorAll('[data-reveal]')];

  const revealEl = (el) => {
    if (el.classList.contains('is-in')) return;
    const d = Number(el.getAttribute('data-reveal-delay') || 0);
    el.style.setProperty('--rev-delay', `${BASE_DELAY + d}ms`);

    const kind = (el.getAttribute('data-reveal') || '').toLowerCase().trim();
    if (kind === 'up') {
      el.style.setProperty('--rev-y', '14px');
      el.style.setProperty('--rev-x', '0px');
      el.style.setProperty('--rev-scale', '0.98');
      el.style.setProperty('--rev-anim', 'rev-up');
    } else if (kind === 'left') {
      el.style.setProperty('--rev-x', '-14px');
      el.style.setProperty('--rev-y', '0px');
      el.style.setProperty('--rev-scale', '0.98');
      el.style.setProperty('--rev-anim', 'rev-left');
    } else if (kind === 'right') {
      el.style.setProperty('--rev-x', '14px');
      el.style.setProperty('--rev-y', '0px');
      el.style.setProperty('--rev-scale', '0.98');
      el.style.setProperty('--rev-anim', 'rev-right');
    } else if (kind === 'zoom') {
      el.style.setProperty('--rev-x', '0px');
      el.style.setProperty('--rev-y', '0px');
      el.style.setProperty('--rev-scale', '0.92');
      el.style.setProperty('--rev-anim', 'rev-zoom');
    } else {
      // default
      el.style.setProperty('--rev-anim', 'rev-zoom');
    }

    el.classList.add('is-in');
  };

  const inViewLate = (el) => {
    const r = el.getBoundingClientRect();
    const vh = window.innerHeight || document.documentElement.clientHeight || 0;
    return r.bottom > 0 && r.top < (vh * 0.80);
  };

  const init = () => {
    autoTag();
    const els = $els();
    if (reduce || !els.length) {
      // Si reduce-motion o no hay elementos, no ocultamos nada
      return;
    }

    const io = new IntersectionObserver((entries, obs) => {
      for (const e of entries) {
        if (!e.isIntersecting) continue;
        revealEl(e.target);
        obs.unobserve(e.target);
      }
    }, { rootMargin: '0px 0px -20% 0px', threshold: 0.12 });

    els.forEach(el => io.observe(el));

    // Fallback scroll (rAF throttle)
    let ticking = false;
    const onScrollCheck = () => {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(() => {
        ticking = false;
        let remaining = 0;
        for (const el of els) {
          if (el.classList.contains('is-in')) continue;
          remaining++;
          if (inViewLate(el)) revealEl(el);
        }
        if (remaining === 0) {
          window.removeEventListener('scroll', onScrollCheck, { passive: true });
          window.removeEventListener('resize', onScrollCheck);
        }
      });
    };

    window.addEventListener('scroll', onScrollCheck, { passive: true });
    window.addEventListener('resize', onScrollCheck);

    // Si algo ya está en viewport al cargar:
    onScrollCheck();
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init, { once: true });
  } else {
    init();
  }
})();

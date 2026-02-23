// Marca el documento como "con JS" (usado por reveal-on-scroll para evitar ocultar contenido si falla JS)
document.documentElement.classList.add('js');

// Lee la versión inyectada desde HTML (fallback: timestamp)
const V = (window.__ASSET_VER || Date.now()).toString();
const suf = `?v=${encodeURIComponent(V)}`;

/**
 * Reveal on scroll (robusto)
 * - No toca el contenido (solo añade data-reveal/data-reveal-delay y clase .is-in)
 * - Incluye "autotags" para secciones específicas: Oferta académica + Galería
 */
(() => {
  const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

  const clamp = (n, min, max) => Math.max(min, Math.min(max, n));

  // 1) Añadir data-reveal a piezas que lo necesitan (sin modificar HTML/PHP)
  const autoTag = () => {
    // Oferta académica (timeline)
    const oferta = document.querySelector('.band--oferta-timeline');
    if (oferta) {
      const items = oferta.querySelectorAll('.timeline__item');
      items.forEach((el, i) => {
        if (!el.hasAttribute('data-reveal')) el.setAttribute('data-reveal', 'up');
        if (!el.hasAttribute('data-reveal-delay')) el.setAttribute('data-reveal-delay', String(clamp(i * 80, 0, 560)));
      });
    }

    // Galería / Comunidad en acción (masonry)
    const gal = document.querySelector('#galeria');
    if (gal) {
      const title = gal.querySelector('.section-title');
      if (title && !title.hasAttribute('data-reveal')) title.setAttribute('data-reveal', 'up');

      const items = gal.querySelectorAll('.masonry__item');
      items.forEach((el, i) => {
        if (!el.hasAttribute('data-reveal')) el.setAttribute('data-reveal', 'up');
        if (!el.hasAttribute('data-reveal-delay')) el.setAttribute('data-reveal-delay', String(clamp(i * 70, 0, 630)));
      });
    }
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
    // dispara cuando el elemento ya entró "bien" al viewport (similar a tus otras secciones)
    return r.bottom > 0 && r.top < (vh * 0.85);
  };

  const revealInViewNow = (els) => {
    for (const el of els) if (inView(el)) revealEl(el);
  };

  const init = () => {
    autoTag();
    const els = $els();

    // Si el usuario prefiere menos movimiento, mostramos todo de una.
    if (reduce) {
      els.forEach(revealEl);
      return;
    }

    // Sin IntersectionObserver: fallback seguro.
    if (!('IntersectionObserver' in window)) {
      els.forEach(revealEl);
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

    // Fallback extra (por si algún elemento es muy alto o el observer "pierde" entradas)
    let ticking = false;
    const onScroll = () => {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(() => {
        ticking = false;
        revealInViewNow(els);
      });
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll);
    // Primer chequeo
    onScroll();
  };

  // DOM listo
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init, { once: true });
  } else {
    init();
  }
})();

/**
 * Importador de módulos (con fallback de rutas)
 * - Primero intenta ./modules (relativo a app.js)
 * - Luego intenta /assets/pastoralEducativa/js/modules (si existe en tu estructura)
 * - Luego intenta /assets/partials/pastoral-educativa/js/modules (si existe)
 */
const moduleBases = [
  new URL('./modules/', import.meta.url).href,
  '/assets/pastoralEducativa/js/modules/',
  '/assets/partials/pastoral-educativa/js/modules/',
];

const modules = [
  'header-offset.js',
  'smooth-scroll.js',
  'lightbox.js',
  'hero.js',
  'tabs-vjac.js',
  'mision-aside.js',
  'diagramas-lightbox.js',
  'desempenos-rail.js',
  'timeline-rotators.js',
  'crest-parallax.js',
  // reveal-lazy.js queda opcional; ya tenemos reveal robusto arriba
  'video-embed.js',
  'himno.js',
  'galeria-lightbox.js',
];

const importWithBases = async (file) => {
  let lastErr = null;
  for (const base of moduleBases) {
    try {
      return await import(`${base}${file}${suf}`);
    } catch (e) {
      lastErr = e;
    }
  }
  console.error('Import fail:', file, lastErr);
  return null;
};

// Carga todos los módulos (en orden)
(async () => {
  for (const file of modules) {
    await importWithBases(file);
  }
})();

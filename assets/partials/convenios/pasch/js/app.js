/**
 * PASCH - Reveal on scroll
 * - No modifica el HTML/PHP: auto-asigna data-reveal por selectores.
 * - Solo aplica ocultamiento si JS está activo (html.js).
 */
(function () {
  const docEl = document.documentElement;
  docEl.classList.add('js');

  const SELECTORS = {
    containers: '.hero, .main-content > .section, .main-content .section',
    items: [
      '.hero__creds',
      '.hero__title',
      '.hero__subtitle',
      '.hero__actions',
      '.hero__media',
      '.card',
      '.section-title',
      '.title-divider',
      'p',
      'li',
      '.btn-pill',
      '.ihub__tabs',
      '.ihub__panel',
      '.requisitos-grid',
      '.exp-grid',
      '.gal-quilt'
    ].join(',')
  };

  function isValid(el) {
    if (!el || !(el instanceof Element)) return false;
    // Evita animar elementos invisibles por defecto (display:none)
    const style = window.getComputedStyle(el);
    if (style.display === 'none' || style.visibility === 'hidden') return false;
    return true;
  }

  function mark(container) {
    if (!container || !isValid(container)) return;

    // Marca el contenedor para que tenga "salida" suave
    if (!container.hasAttribute('data-reveal')) container.setAttribute('data-reveal', 'container');

    const candidates = Array.from(container.querySelectorAll(SELECTORS.items))
      .filter(isValid);

    // Si no encontró nada, al menos anima el contenedor
    if (candidates.length === 0) return;

    let i = 0;
    for (const el of candidates) {
      if (!el.hasAttribute('data-reveal')) el.setAttribute('data-reveal', 'item');
      // Stagger suave
      el.style.setProperty('--reveal-delay', `${Math.min(i * 60, 420)}ms`);
      i++;
    }
  }

  function setupTargets() {
    const containers = Array.from(document.querySelectorAll(SELECTORS.containers));
    containers.forEach(mark);

    // También: anima el HERO si por alguna razón no quedó dentro del selector
    const hero = document.querySelector('.hero');
    if (hero) mark(hero);

    // Devuelve todos los elementos con data-reveal para observar
    return Array.from(document.querySelectorAll('[data-reveal]')).filter(isValid);
  }

  function revealNow(el) {
    el.classList.add('is-inview');
  }

  const targets = setupTargets();

  if (!('IntersectionObserver' in window)) {
    targets.forEach(revealNow);
    return;
  }

  const io = new IntersectionObserver((entries, observer) => {
    for (const entry of entries) {
      if (entry.isIntersecting) {
        revealNow(entry.target);
        observer.unobserve(entry.target);
      }
    }
  }, {
    root: null,
    rootMargin: '0px 0px -10% 0px',
    threshold: 0.12
  });

  targets.forEach(el => io.observe(el));
})();

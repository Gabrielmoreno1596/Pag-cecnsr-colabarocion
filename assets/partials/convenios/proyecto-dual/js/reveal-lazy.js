(() => {
  const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Activa modo JS para CSS (fallback seguro).
  document.documentElement.classList.add('js');

  // Reveal
  const BASE_DELAY = 140; // ms: se siente más "intencional"
  const $els = [...document.querySelectorAll('[data-reveal]')];

  if (!reduce && $els.length) {
    const io = new IntersectionObserver((entries, obs) => {
      for (const e of entries) {
        if (!e.isIntersecting) continue;

        const el = e.target;

        // Delay por elemento + delay base (para "notorio")
        const d = Number(el.getAttribute('data-reveal-delay') || 0);
        el.style.setProperty('--rev-delay', `${BASE_DELAY + d}ms`);

        const variant = (el.getAttribute('data-reveal') || '').trim().toLowerCase();

        // Por defecto: zoom desde el centro
        if (!variant) {
          el.style.setProperty('--rev-x', '0px');
          el.style.setProperty('--rev-y', '0px');
          el.style.setProperty('--rev-scale', '.92');
          el.style.setProperty('--rev-anim', 'rev-zoom');
          el.style.transition = 'none';
        } else if (variant === 'hero') {
          // Hero: bounce suave
          el.style.setProperty('--rev-x', '0px');
          el.style.setProperty('--rev-y', '0px');
          el.style.setProperty('--rev-anim', 'hero-pop');
          el.style.transition = 'none';
        } else if (variant === 'zoom') {
          el.style.setProperty('--rev-x', '0px');
          el.style.setProperty('--rev-y', '0px');
          el.style.setProperty('--rev-anim', 'rev-zoom');
          el.style.transition = 'none';
        }

        // Dispara
        el.classList.add('is-in');
        obs.unobserve(el);
      }
    }, { rootMargin: '0px 0px -15% 0px', threshold: 0.4 });

    $els.forEach(el => io.observe(el));
  } else {
    $els.forEach(el => el.classList.add('is-in'));
  }
})();

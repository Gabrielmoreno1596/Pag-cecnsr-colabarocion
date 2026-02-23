// Página: ¿Quiénes Somos?
// - Reveal on scroll
// - Fade suave de imágenes en Historia
// - Tabs accesibles para Principios
// - Sticky nav con highlight por sección

document.documentElement.classList.add('js');

(() => {
  const reduce = window.matchMedia?.('(prefers-reduced-motion: reduce)')?.matches ?? false;
  const qs = (sel, root = document) => root.querySelector(sel);
  const qsa = (sel, root = document) => Array.from(root.querySelectorAll(sel));

  /* -----------------------------
     Reveal on scroll
  ----------------------------- */
  const initReveal = () => {
    const els = qsa('[data-reveal]');
    if (!els.length) return;

    const revealEl = (el) => {
      if (!el || el.classList.contains('is-in')) return;
      const d = Number(el.getAttribute('data-reveal-delay') || 0);
      el.style.setProperty('--rev-delay', `${d}ms`);
      el.classList.add('is-in');
    };

    if (reduce || !('IntersectionObserver' in window)) {
      els.forEach(revealEl);
      return;
    }

    const io = new IntersectionObserver((entries, obs) => {
      for (const e of entries) {
        if (!e.isIntersecting) continue;
        revealEl(e.target);
        obs.unobserve(e.target);
      }
    }, { rootMargin: '0px 0px -18% 0px', threshold: 0.12 });

    els.forEach(el => io.observe(el));
  };

  /* -----------------------------
     Historia: fade entre imágenes
  ----------------------------- */
  const initHistoryFade = () => {
    const section = qs('#qs-historia') || qs('.qs-historia');
    if (!section) return;
    const track = qs('.qs-history-fader', section);
    if (!track) return;

    const imgs = qsa('.qs-history-img', track);
    if (imgs.length < 2) return;

    let index = 0;
    imgs.forEach((im, i) => im.classList.toggle('is-active', i === 0));

    if (reduce) return;

    setInterval(() => {
      const next = (index + 1) % imgs.length;
      imgs[index].classList.remove('is-active');
      imgs[next].classList.add('is-active');
      index = next;
    }, 5200);
  };

  /* -----------------------------
     Principios: Tabs accesibles
  ----------------------------- */
  const initTabs = () => {
    const tabRoots = qsa('[data-tabs]');
    if (!tabRoots.length) return;

    tabRoots.forEach((root) => {
      const tabs = qsa('[role="tab"]', root);
      const panels = qsa('[role="tabpanel"]', root);
      if (tabs.length === 0 || panels.length === 0) return;

      const setActive = (idx) => {
        tabs.forEach((t, i) => {
          const on = i === idx;
          t.classList.toggle('is-active', on);
          t.setAttribute('aria-selected', on ? 'true' : 'false');
          t.setAttribute('tabindex', on ? '0' : '-1');
        });
        panels.forEach((p, i) => {
          const on = i === idx;
          p.classList.toggle('is-active', on);
          if (on) p.removeAttribute('hidden');
          else p.setAttribute('hidden', '');
        });
      };

      // Click
      tabs.forEach((t, i) => {
        t.addEventListener('click', () => {
          setActive(i);
          t.focus({ preventScroll: true });
        });
      });

      // Teclado (izq/der/Home/End)
      root.addEventListener('keydown', (e) => {
        const key = e.key;
        if (!['ArrowLeft', 'ArrowRight', 'Home', 'End'].includes(key)) return;

        const current = tabs.findIndex(t => t.getAttribute('aria-selected') === 'true');
        if (current < 0) return;

        let next = current;
        if (key === 'ArrowLeft') next = (current - 1 + tabs.length) % tabs.length;
        if (key === 'ArrowRight') next = (current + 1) % tabs.length;
        if (key === 'Home') next = 0;
        if (key === 'End') next = tabs.length - 1;

        e.preventDefault();
        setActive(next);
        tabs[next].focus({ preventScroll: true });
      });

      // Estado inicial (si por algún motivo no viene marcado)
      const initial = tabs.findIndex(t => t.classList.contains('is-active'));
      setActive(initial >= 0 ? initial : 0);
    });
  };

  /* -----------------------------
     Trust chips (Hero)
     - Animación sutil + conteo para valores numéricos
     - Mantiene consistencia con Inicio
  ----------------------------- */
  const initTrustHero = () => {
    const chips = qsa('[data-qs-trust]');
    if (!chips.length) return;

    const animateCount = (el, target, prefix = '', suffix = '') => {
      if (!el) return;
      const duration = 1100;
      const start = performance.now();
      const from = 1;
      el.classList.add('is-counting');

      const tick = (now) => {
        const t = Math.min(1, (now - start) / duration);
        // Ease-out
        const eased = 1 - Math.pow(1 - t, 3);
        const val = Math.round(from + (target - from) * eased);
        el.textContent = `${prefix}${val}${suffix}`;
        if (t < 1) requestAnimationFrame(tick);
        else el.classList.remove('is-counting');
      };
      requestAnimationFrame(tick);
    };

    chips.forEach((chip, i) => {
      // Pop + shine escalonado
      if (!reduce) {
        setTimeout(() => chip.classList.add('is-anim'), 220 + i * 120);
      }

      const valueEl = qs('.trust-chip__value', chip);
      if (!valueEl) return;

      const raw = (valueEl.textContent || '').trim();
      // Ej: "+1500" => prefix "+", target 1500
      const m = raw.match(/^([+]?)(\d{2,6})(.*)$/);
      if (!m) return;

      const prefix = m[1] || '';
      const target = parseInt(m[2], 10);
      const suffix = (m[3] || '').trim();
      if (!Number.isFinite(target) || target < 10) return;

      // Solo animamos el primer chip numérico (evita “ruido”)
      // Si quieres animarlos todos, basta quitar este if.
      if (i === 0 && !reduce) {
        // Reseteo para que se vea el conteo
        valueEl.textContent = `${prefix}1${suffix ? (' ' + suffix) : ''}`.trim();
        animateCount(valueEl, target, prefix, suffix ? (' ' + suffix) : '');
      }
    });
  };

  /* -----------------------------
     Sticky nav: smooth scroll + active link (scrollspy robusto)
  ----------------------------- */
  const initStickyNav = () => {
    const links = qsa('[data-qs-nav]');
    if (!links.length) return;

    const getOffset = () => {
      const v = getComputedStyle(document.documentElement)
        .getPropertyValue('--qs-scroll-offset')
        .trim();
      const n = parseInt(v, 10);
      return Number.isFinite(n) ? n : 140;
    };

    // Smooth scroll
    links.forEach((a) => {
      a.addEventListener('click', (e) => {
        const href = a.getAttribute('href') || '';
        if (!href.startsWith('#')) return;
        const target = qs(href);
        if (!target) return;
        e.preventDefault();
        target.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'start' });
        // Feedback inmediato
        const id = (href || '').replace('#', '');
        if (id) setActive(id);
      });
    });

    const sections = links
      .map(a => qs(a.getAttribute('href')))
      .filter(Boolean);

    let activeId = '';
    function setActive(id) {
      if (!id || id === activeId) return;
      activeId = id;
      links.forEach((a) => {
        const on = (a.getAttribute('href') === `#${id}`);
        a.classList.toggle('is-active', on);
      });
    }

    // Scrollspy por posición (más estable que IntersectionObserver en layouts con sticky)
    let ticking = false;
    const compute = () => {
      ticking = false;
      const offset = getOffset();
      const probe = window.scrollY + offset + Math.round(window.innerHeight * 0.18);

      let current = sections[0]?.id || '';
      for (const s of sections) {
        const top = s.getBoundingClientRect().top + window.scrollY;
        if (top <= probe) current = s.id;
      }
      if (current) setActive(current);
    };

    const onScroll = () => {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(compute);
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll);

    // Estado inicial (hash o primera sección)
    const hash = (location.hash || '').replace('#', '');
    if (hash && sections.some(s => s.id === hash)) setActive(hash);
    else setActive(sections[0]?.id || '');
    compute();
  };

  // Boot
  const boot = () => {
    initReveal();
    initHistoryFade();
    initTabs();
    initStickyNav();
    initTrustHero();
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot, { once: true });
  } else {
    boot();
  }
})();

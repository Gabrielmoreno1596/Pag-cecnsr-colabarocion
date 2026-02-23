// Marca el documento como "con JS" (usado por reveal-on-scroll para evitar ocultar contenido si falla JS)
document.documentElement.classList.add('js');

/**
 * Reveal on scroll (Inicio)
 * - Misma idea/estabilidad que la página pastoral-educativa
 * - No requiere modificar el HTML/PHP: auto-etiqueta elementos de Inicio con [data-reveal]
 */
(() => {
  const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
  const clamp = (n, min, max) => Math.max(min, Math.min(max, n));

  const set = (el, attrs = {}) => {
    if (!el) return;
    if (!el.hasAttribute('data-reveal')) el.setAttribute('data-reveal', attrs.variant || 'up');
    if (attrs.delay != null && !el.hasAttribute('data-reveal-delay')) {
      el.setAttribute('data-reveal-delay', String(attrs.delay));
    }
  };

  // 1) Auto-tag: añade data-reveal donde hace falta (sin tocar PHP)
  const autoTag = () => {
    // HERO
    const hero = document.querySelector('#inicio.hero') || document.querySelector('.hero#inicio') || document.querySelector('.hero');
    if (hero) {
      const titles = hero.querySelectorAll('.hero-title');
      titles.forEach((el, i) => set(el, { variant: 'up', delay: clamp(i * 90, 0, 360) }));

      set(hero.querySelector('.hero-slogan'), { variant: 'up', delay: 360 });
      set(hero.querySelector('.btn-primary'), { variant: 'up', delay: 440 });

      // Fotos del roll: más sutil
      const items = hero.querySelectorAll('.photo-item');
      items.forEach((el, i) => set(el, { variant: 'fade', delay: clamp(i * 35, 0, 420) }));
    }

    // ¿QUIÉNES SOMOS?
    const qs = document.querySelector('#quienes-somos');
    if (qs) {
      set(qs.querySelector('.section-title'), { variant: 'up', delay: 0 });
      set(qs.querySelector('.history-text-block'), { variant: 'left', delay: 70 });
      set(qs.querySelector('.history-carousel-container'), { variant: 'right', delay: 140 });

      const lis = qs.querySelectorAll('.history-list li');
      lis.forEach((el, i) => set(el, { variant: 'up', delay: clamp(180 + (i * 55), 180, 650) }));
    }

    // MISIÓN / VISIÓN / COMPROMISO
    const mvc = document.querySelector('#mision-vision-compromiso');
    if (mvc) {
      set(mvc.querySelector('.mvc-title'), { variant: 'up', delay: 0 });
      const cards = mvc.querySelectorAll('.mission-vision-card');
      cards.forEach((el, i) => set(el, { variant: 'up', delay: clamp(90 + (i * 90), 90, 560) }));
    }

    // INFRAESTRUCTURA (carrusel)
    const infra = document.querySelector('#infraestructura');
    if (infra) {
      set(infra.querySelector('.infra-gallery-wrap'), { variant: 'fade', delay: 0 });
      const thumbs = infra.querySelectorAll('.infra-thumb');
      thumbs.forEach((el, i) => set(el, { variant: 'fade', delay: clamp(i * 40, 0, 360) }));
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
    // Dispara cuando el elemento ya entró lo suficiente al viewport
    return r.bottom > 0 && r.top < (vh * 0.85);
  };

  const revealInViewNow = (els) => {
    for (const el of els) if (inView(el)) revealEl(el);
  };

  const init = () => {
    autoTag();
    const els = $els();

    // Si el usuario prefiere menos movimiento, mostramos todo.
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
    onScroll();
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init, { once: true });
  } else {
    init();
  }
})();


/* =========================================================================
   UI Elegante (Inicio)
   - Fondo del HERO con imágenes (fade) + efecto "fijo"
   - Rails con scroll-snap + botones + progreso (Historia e Infra)
   - Botón "volver arriba"
   ========================================================================= */
(() => {
  const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

  const qs = (sel, root = document) => root.querySelector(sel);
  const qsa = (sel, root = document) => Array.from(root.querySelectorAll(sel));

  // -----------------------------
  // HERO: fondo con imágenes (fade)
  // -----------------------------
  const initHeroBackground = () => {
    const hero = qs('.hero');
    if (!hero) return;

    // Tomamos las imágenes YA existentes del photo-roll
    const imgs = [...new Set(
      qsa('.photo-roll img', hero)
        .map(img => img.currentSrc || img.src)
        .filter(Boolean)
    )];

    if (!imgs.length) return;

    // Capas de fondo (inyectadas)
    const layerA = document.createElement('div');
    const layerB = document.createElement('div');
    layerA.className = 'hero-bg-layer is-active';
    layerB.className = 'hero-bg-layer';
    hero.prepend(layerB);
    hero.prepend(layerA);

    const setBg = (el, url) => {
      el.style.backgroundImage = `url("${url}")`;
    };

    let index = 0;
    setBg(layerA, imgs[index]);
    setBg(layerB, imgs[(index + 1) % imgs.length]);
    hero.classList.add('is-bg-ready');

    if (reduce || imgs.length < 2) return;

    let active = layerA;
    let next = layerB;

    const swap = () => {
      index = (index + 1) % imgs.length;

      // Preparamos el siguiente
      setBg(next, imgs[index]);
      next.classList.add('is-active');

      // Espera un tick para permitir transición
      requestAnimationFrame(() => {
        active.classList.remove('is-active');
        // swap refs
        const tmp = active;
        active = next;
        next = tmp;

        // precarga siguiente
        const preload = imgs[(index + 1) % imgs.length];
        setBg(next, preload);
      });
    };

    // Cada 6.5s cambia el fondo
    const interval = 6500;
    setInterval(swap, interval);

    // Mantener el fondo “fijo” solo mientras estás en el hero
    const setPinned = () => {
      const y = window.scrollY || document.documentElement.scrollTop || 0;
      const h = hero.offsetHeight || 0;
      hero.classList.toggle('is-pinned', y < Math.max(0, h - 2));
    };
    let raf = null;
    const onScroll = () => {
      if (raf) return;
      raf = requestAnimationFrame(() => { raf = null; setPinned(); });
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', setPinned);
    setPinned();

  };

  // -----------------------------
  // HERO: auto-roll + lightbox (photo-roll)
  // -----------------------------
  const initHeroPhotoRoll = () => {
    const hero = qs('.hero');
    if (!hero) return;

    const container = qs('.photo-roll-container', hero);
    const roll = qs('.photo-roll', hero);
    if (!container || !roll) return;

    const sources = [...new Set(
      qsa('.photo-roll .photo-item img', hero)
        .map(img => img.currentSrc || img.src)
        .filter(Boolean)
    )];
    if (!sources.length) return;

    let lb = document.querySelector('.photo-roll-lightbox');
    if (!lb) {
      lb = document.createElement('div');
      lb.className = 'photo-roll-lightbox';
      lb.innerHTML = `
        <div class="photo-roll-lightbox__dialog" role="dialog" aria-modal="true" aria-label="Galería">
          <button type="button" class="photo-roll-lightbox__close" aria-label="Cerrar">&#10005;</button>
          <button type="button" class="photo-roll-lightbox__nav photo-roll-lightbox__prev" aria-label="Anterior">&#8249;</button>
          <div class="photo-roll-lightbox__media">
            <img class="photo-roll-lightbox__img" alt="Imagen" />
            <div class="photo-roll-lightbox__meta" aria-live="polite"></div>
          </div>
          <button type="button" class="photo-roll-lightbox__nav photo-roll-lightbox__next" aria-label="Siguiente">&#8250;</button>
        </div>`;
      document.body.appendChild(lb);
    }

    const imgEl = qs('.photo-roll-lightbox__img', lb);
    const metaEl = qs('.photo-roll-lightbox__meta', lb);
    const btnClose = qs('.photo-roll-lightbox__close', lb);
    const btnPrev = qs('.photo-roll-lightbox__prev', lb);
    const btnNext = qs('.photo-roll-lightbox__next', lb);

    let index = 0;

    const open = (i) => {
      index = (i + sources.length) % sources.length;
      imgEl.src = sources[index];
      metaEl.textContent = `${index + 1} / ${sources.length}`;
      lb.classList.add('is-open');
      container.classList.add('is-paused');
      btnClose?.focus?.();
    };
    const close = () => {
      lb.classList.remove('is-open');
      container.classList.remove('is-paused');
    };
    const prev = () => open(index - 1);
    const next = () => open(index + 1);

    container.addEventListener('click', (e) => {
      const img = e.target?.closest?.('img');
      if (!img) return;
      const src = img.currentSrc || img.src;
      const i = sources.indexOf(src);
      open(i >= 0 ? i : 0);
    });

    btnClose?.addEventListener('click', close);
    btnPrev?.addEventListener('click', prev);
    btnNext?.addEventListener('click', next);

    lb.addEventListener('click', (e) => {
      if (e.target === lb) close();
    });

    document.addEventListener('keydown', (e) => {
      if (!lb.classList.contains('is-open')) return;
      if (e.key === 'Escape') close();
      if (e.key === 'ArrowLeft') prev();
      if (e.key === 'ArrowRight') next();
    });

    if (reduce) return;
    if (container.classList.contains('is-marquee')) return;

    const baseItems = qsa('.photo-item:not(.photo-item--dup)', roll);
    if (baseItems.length < 2) return;

    const allItems = qsa('.photo-item', roll);
    const existingSets = Math.max(1, Math.round(allItems.length / baseItems.length));

    const minTarget = Math.max(container.clientWidth * 2, 1400);
    let sets = existingSets;
    while (sets < 8 && roll.scrollWidth < minTarget) {
      baseItems.forEach((it) => {
        const clone = it.cloneNode(true);
        clone.classList.add('photo-item--dup');
        clone.setAttribute('aria-hidden', 'true');
        const im = clone.querySelector('img');
        if (im) im.alt = '';
        roll.appendChild(clone);
      });
      sets++;
    }

    const computeMetrics = () => {
      const setWidth = Math.max(1, roll.scrollWidth / sets);
      roll.style.setProperty('--roll-shift', `${setWidth}px`);

      const pxPerSec = 34;
      const seconds = Math.max(22, Math.min(90, setWidth / pxPerSec));
      roll.style.setProperty('--roll-duration', `${seconds.toFixed(2)}s`);
    };

    requestAnimationFrame(() => {
      computeMetrics();
      container.classList.add('is-marquee');
      roll.classList.add('is-marquee');
    });

    window.addEventListener('resize', () => {
      computeMetrics();
    });
  };

  const initPinnedBandBackground = () => {
    if (reduce) return;

    // Nuevo: soporta múltiples bandas con fondo fijo.
    // - .band--pinned-bg: Oferta / Pastoral (Home)
    // - .band--mvc: compatibilidad si existe en algún build
    const bands = [...qsa('.band--pinned-bg, .band--mvc')];
    if (!bands.length) return;

    const makePinned = (band) => {
      const css = getComputedStyle(band);
      const bg = (css.getPropertyValue('--band-bg') || '').trim();
      if (!bg) return;

      if (!qs('.band-bg-layer', band)) {
        const layer = document.createElement('div');
        layer.className = 'band-bg-layer';
        layer.style.backgroundImage = bg;
        band.prepend(layer);
      }

      band.classList.add('has-fixed-bg');
    };

    bands.forEach(makePinned);

    // Para evitar que el fondo fijo "se coma" la sección anterior demasiado pronto,
    // usamos un "trigger" (título de la sección anterior) para retrasar el pin.
    // Caso principal: Infraestructura debe activarse SOLO cuando el título anterior
    // ya salió por la parte superior del viewport.
    const triggerCache = new WeakMap();
    const getTriggerEl = (band) => {
      if (triggerCache.has(band)) return triggerCache.get(band);

      // Buscamos el título de la banda anterior (Home cards / section title)
      const prev = band.previousElementSibling;
      const trigger = prev
        ? (prev.querySelector('.home-cards__title.section-title') || prev.querySelector('.section-title'))
        : null;

      triggerCache.set(band, trigger);
      return trigger;
    };

    const setPinned = () => {
      const vh = window.innerHeight || document.documentElement.clientHeight || 0;
      for (const band of bands) {
        const r = band.getBoundingClientRect();

        // Default: se activa cuando la banda está en viewport.
        let pinned = (r.top < vh && r.bottom > 0);

        // Ajuste solicitado: Infraestructura NO debe activar el fondo fijo
        // mientras el título de la sección anterior (Pastoral) siga visible.
        if (band.classList.contains('band--infra')) {
          const trigger = getTriggerEl(band);
          if (trigger) {
            const tr = trigger.getBoundingClientRect();
            pinned = pinned && (tr.bottom <= 0);
          } else {
            // Fallback seguro: si no encontramos trigger, activamos cuando el top
            // de la banda ya tocó la parte superior.
            pinned = pinned && (r.top <= 0);
          }
        }

        band.classList.toggle('is-pinned', pinned);
      }
    };

    let raf = null;
    const onScroll = () => {
      if (raf) return;
      raf = requestAnimationFrame(() => {
        raf = null;
        setPinned();
      });
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', setPinned);
    setPinned();
  };

  const initRail = (containerSel, trackSel) => {
    const container = qs(containerSel);
    if (!container) return;
    const track = qs(trackSel, container);
    if (!track) return;

    container.classList.add('rail');
    track.classList.add('rail-track');

    const prev = document.createElement('button');
    const next = document.createElement('button');
    prev.type = 'button';
    next.type = 'button';
    prev.className = 'rail-btn prev';
    next.className = 'rail-btn next';
    prev.setAttribute('aria-label', 'Anterior');
    next.setAttribute('aria-label', 'Siguiente');
    prev.innerHTML = '&#8249;';
    next.innerHTML = '&#8250;';

    const progress = document.createElement('div');
    progress.className = 'rail-progress';
    const bar = document.createElement('span');
    progress.appendChild(bar);

    container.appendChild(prev);
    container.appendChild(next);
    container.appendChild(progress);

    const scrollByOne = (dir = 1) => {
      const first = track.querySelector('img');
      const step = first ? (first.getBoundingClientRect().width + 14) : 420;
      track.scrollBy({ left: dir * step, behavior: 'smooth' });
    };

    prev.addEventListener('click', () => scrollByOne(-1));
    next.addEventListener('click', () => scrollByOne(1));

    const updateProgress = () => {
      const max = track.scrollWidth - track.clientWidth;
      const pct = max <= 0 ? 0 : (track.scrollLeft / max) * 100;
      bar.style.width = `${Math.max(0, Math.min(100, pct))}%`;
    };

    track.addEventListener('scroll', () => {
      if (reduce) return;
      updateProgress();
    }, { passive: true });

    window.addEventListener('resize', updateProgress);
    updateProgress();
  };

  // -----------------------------
  // ¿QUIÉNES SOMOS?: carrusel por desvanecimiento (fade)
  // -----------------------------
  const initHistoryFadeCarousel = () => {
    const container = qs('.history-carousel-container');
    if (!container) return;
    const track = qs('.history-carousel-track', container);
    if (!track) return;

    const imgs = qsa('img', track);
    if (imgs.length < 2) return;

    // Habilita el modo fade (CSS)
    track.classList.add('is-fade');
    // Marca el contenedor para que los CSS de estilo "rail/scroll" no interfieran con el fade
    container.classList.add('is-fade-mode');

    let index = 0;
    imgs.forEach((im, i) => im.classList.toggle('is-active', i === 0));

    if (reduce) return;

    const step = () => {
      const next = (index + 1) % imgs.length;
      imgs[index].classList.remove('is-active');
      imgs[next].classList.add('is-active');
      index = next;
    };

    const interval = 4800;
    setInterval(step, interval);
  };

  const initLightbox = (gallerySel) => {
    const gallery = qs(gallerySel);
    if (!gallery) return;

    const itemsAll = [...gallery.querySelectorAll('.infra-thumb')];
    if (!itemsAll.length) return;

    const getItems = () => {
      const visible = itemsAll.filter(el => !el.classList.contains('is-hidden'));
      return visible.length ? visible : itemsAll;
    };

    let lb = document.querySelector('.lightbox');
    if (!lb) {
      lb = document.createElement('div');
      lb.className = 'lightbox';
      lb.innerHTML = `
        <div class="lightbox-dialog" role="dialog" aria-modal="true" aria-label="Visor de imágenes">
          <div class="lightbox-toolbar">
            <div class="lightbox-title">Infraestructura</div>
            <div class="lightbox-actions">
              <button type="button" class="lightbox-btn lb-close" aria-label="Cerrar">&#10005;</button>
            </div>
          </div>
          <div class="lightbox-media">
            <img alt="Imagen" />
            <div class="lightbox-nav" aria-hidden="false">
              <button type="button" class="lightbox-btn lb-prev" aria-label="Anterior">&#8249;</button>
              <button type="button" class="lightbox-btn lb-next" aria-label="Siguiente">&#8250;</button>
            </div>
          </div>
        </div>`;
      document.body.appendChild(lb);
    }

    const imgEl = lb.querySelector('img');
    const titleEl = lb.querySelector('.lightbox-title');
    const btnClose = lb.querySelector('.lb-close');
    const btnPrev = lb.querySelector('.lb-prev');
    const btnNext = lb.querySelector('.lb-next');

    let index = 0;

    const open = (i) => {
      const items = getItems();
      index = (i + items.length) % items.length;
      const full = items[index].getAttribute('data-full');
      imgEl.src = full;
      titleEl.textContent = `Infraestructura • ${index + 1} / ${items.length}`;
      lb.classList.add('is-open');
      btnClose.focus();
    };

    const close = () => lb.classList.remove('is-open');
    const prev = () => open(index - 1);
    const next = () => open(index + 1);

    itemsAll.forEach((btn, i) => {
      btn.addEventListener('click', () => {
        const list = getItems();
        const idx = list.indexOf(btn);
        open(idx >= 0 ? idx : i);
      });
    });

    btnClose.addEventListener('click', close);
    btnPrev.addEventListener('click', prev);
    btnNext.addEventListener('click', next);

    lb.addEventListener('click', (e) => {
      if (e.target === lb) close();
    });

    document.addEventListener('keydown', (e) => {
      if (!lb.classList.contains('is-open')) return;
      if (e.key === 'Escape') close();
      if (e.key === 'ArrowLeft') prev();
      if (e.key === 'ArrowRight') next();
    });
  };

  const initToTop = () => {
    const btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'to-top';
    btn.setAttribute('aria-label', 'Volver arriba');
    btn.innerHTML = '↑';
    document.body.appendChild(btn);

    const toggle = () => {
      const y = window.scrollY || document.documentElement.scrollTop || 0;
      btn.classList.toggle('is-visible', y > 700);
    };

    btn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: reduce ? 'auto' : 'smooth' });
    });

    window.addEventListener('scroll', toggle, { passive: true });
    toggle();
  };

  const init = () => {
    initHeroBackground();
    initHeroPhotoRoll();
    initPinnedBandBackground();

    // Historia (¿Quiénes somos?): fade
    initHistoryFadeCarousel();

    // Infraestructura (galería)
    initLightbox('.infra-gallery');

    initToTop();
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init, { once: true });
  } else {
    init();
  }
})();


/* =========================================================================
   TRUST STRIP (HERO): micro animaciones + contador elegante (ON VIEW)
   - +1500: cuenta de 1 a 1500 (cuando entra al viewport)
   - Desde 1992: anima el año (cuando entra al viewport)
   - Valores: énfasis simple + shimmer (cuando entra al viewport)
   ========================================================================= */
(() => {
  const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

  const qs = (sel, root = document) => root.querySelector(sel);
  const qsa = (sel, root = document) => Array.from(root.querySelectorAll(sel));

  const clamp = (n, min, max) => Math.max(min, Math.min(max, n));

  const animateNumber = ({ el, from, to, duration = 1200, prefix = '', suffix = '' }) => {
    if (!el) return;

    el.classList.add('is-counting');

    const start = performance.now();
    const range = to - from;

    const step = (now) => {
      const t = clamp((now - start) / duration, 0, 1);
      // easeOutCubic
      const eased = 1 - Math.pow(1 - t, 3);
      const value = Math.round(from + (range * eased));
      el.textContent = `${prefix}${value}${suffix}`;
      if (t < 1) requestAnimationFrame(step);
      else el.classList.remove('is-counting');
    };

    requestAnimationFrame(step);
  };

  const runOnceWhenVisible = (target, fn, { threshold = 0.45, rootMargin = '0px 0px -10% 0px' } = {}) => {
    if (!target || target.dataset.countOnce === '1') return;
    target.dataset.countOnce = '1';

    // Accesibilidad: si reduce motion, no animamos (dejamos el valor final tal cual)
    if (reduce) return;

    if ('IntersectionObserver' in window) {
      const io = new IntersectionObserver((entries) => {
        entries.forEach((e) => {
          if (!e.isIntersecting) return;
          io.disconnect();
          fn();
        });
      }, { threshold, rootMargin });

      io.observe(target);
      return;
    }

    // Fallback sin IO: ejecuta en el primer tick (mejor que nada)
    fn();
  };

  const init = () => {
    const strip =
      qs('.trust-strip--hero .trust-strip__inner') ||
      qs('#inicio .trust-strip__inner') ||
      qs('.hero .trust-strip__inner');

    if (!strip) return;

    const chips = qsa('.trust-chip', strip);
    if (!chips.length) return;

    runOnceWhenVisible(strip, () => {
      chips.forEach((chip, i) => {
        const valueEl = qs('.trust-chip__value', chip);
        if (!valueEl) return;

        // Evita re-ejecutar si el usuario navega/recarga parcial
        if (valueEl.dataset.counted === '1') return;
        valueEl.dataset.counted = '1';

        const raw = (valueEl.textContent || '').trim();

        // Micro animación del chip (shine + pop)
        setTimeout(() => chip.classList.add('is-anim'), 220 + (i * 120));

        // 1) +1500 -> cuenta de 1 a 1500
        if (/^\+\d[\d.,]*$/.test(raw)) {
          const n = Number(raw.replace(/[^\d]/g, '')) || 0;
          if (n > 0) {
            valueEl.textContent = '+1';
            animateNumber({
              el: valueEl,
              from: 1,
              to: n,
              duration: n <= 60 ? 900 : 1400,
              prefix: '+'
            });
          }
          return;
        }

        // 2) “Desde 1992” -> anima solo el año (si existe)
        // 2) “Desde 1992” -> anima solo el año (si existe)
        //    IMPORTANTE: preserva el espacio del prefijo (ej: "Desde ") para que NO quede "Desde1992".
        const yearMatch = raw.match(/(\d{4})/);
        if (yearMatch) {
          const year = Number(yearMatch[1]);
          if (year > 0) {
            // Tomamos el prefijo EXACTO antes del año (incluye espacios)
            const idx = raw.indexOf(yearMatch[1]);
            const prefix = idx >= 0 ? raw.slice(0, idx) : '';
            const suffix = idx >= 0 ? raw.slice(idx + yearMatch[1].length) : '';
            const startYear = Math.max(1900, year - 40);

            valueEl.textContent = `${prefix}${startYear}${suffix}`;
            animateNumber({
              el: valueEl,
              from: startYear,
              to: year,
              duration: 1100,
              prefix,
              suffix
            });
          }
          return;
        }


        // 3) Otros valores sin número (ej: “Valores”) -> énfasis simple
        if (!/\d/.test(raw)) {
          valueEl.classList.add('is-text-anim');
        }
      });
    });
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init, { once: true });
  } else {
    init();
  }
})();


/* =========================================================================
   HISTORY STATS (QUIÉNES SOMOS): contador elegante (ON VIEW)
   - +30 (Años): cuenta de 1 a 30 (cuando entra al viewport)
   - +1500 (Estudiantes): cuenta de 1 a 1500 (cuando entra al viewport)
   ========================================================================= */
(() => {
  const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

  const qs = (sel, root = document) => root.querySelector(sel);
  const qsa = (sel, root = document) => Array.from(root.querySelectorAll(sel));

  const clamp = (n, min, max) => Math.max(min, Math.min(max, n));

  const animateNumber = ({ el, from, to, duration = 1200, prefix = '', suffix = '' }) => {
    if (!el) return;

    const start = performance.now();
    const diff = to - from;

    const step = (now) => {
      const t = clamp((now - start) / duration, 0, 1);
      // easeOutCubic
      const eased = 1 - Math.pow(1 - t, 3);
      const value = Math.round(from + diff * eased);
      el.textContent = `${prefix}${value}${suffix}`;

      if (t < 1) requestAnimationFrame(step);
    };

    requestAnimationFrame(step);
  };

  const runOnceWhenVisible = (target, fn, { threshold = 0.5, rootMargin = '0px 0px -12% 0px' } = {}) => {
    if (!target || target.dataset.countOnce === '1') return;
    target.dataset.countOnce = '1';

    // Accesibilidad: si reduce motion, no animamos (dejamos el valor final tal cual)
    if (reduce) return;

    if ('IntersectionObserver' in window) {
      const io = new IntersectionObserver((entries) => {
        entries.forEach((e) => {
          if (!e.isIntersecting) return;
          io.disconnect();
          fn();
        });
      }, { threshold, rootMargin });

      io.observe(target);
      return;
    }

    // Fallback
    fn();
  };

  const init = () => {
    const stats = qs('.history-stats');
    if (!stats) return;

    runOnceWhenVisible(stats, () => {
      const nums = qsa('.history-stat__num', stats);

      nums.forEach((el) => {
        // Evita re-ejecutar en reflows
        if (el.dataset.counted === '1') return;
        el.dataset.counted = '1';

        const raw = (el.textContent || '').trim();

        if (/^\+\d[\d.,]*$/.test(raw)) {
          const n = Number(raw.replace(/[^\d]/g, '')) || 0;
          if (n > 0) {
            el.textContent = '+1';
            animateNumber({
              el,
              from: 1,
              to: n,
              duration: n <= 60 ? 900 : 1400,
              prefix: '+'
            });
          }
        }
      });
    });
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init, { once: true });
  } else {
    init();
  }
})();

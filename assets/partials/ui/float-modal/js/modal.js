(() => {
  const data = window.__SEASONAL_MODAL__;
  const force = !!window.__SEASONAL_MODAL_FORCE__;
  let slides = Array.isArray(window.__SEASONAL_MODAL_SLIDES__)
    ? window.__SEASONAL_MODAL_SLIDES__.filter((slide) => slide && (slide.src || slide.type === 'card'))
    : [];

  if (!data || !data.enabled) return;

  const modal = document.getElementById('seasonalModal');
  if (!modal) return;

  const slideEl = document.getElementById('seasonalModalSlide');
  const prevBtn = modal.querySelector('[data-prev]');
  const nextBtn = modal.querySelector('[data-next]');
  const dotsWrap = modal.querySelector('.seasonal-modal__dots');
  let dotBtns = Array.from(modal.querySelectorAll('[data-goto]'));

  const theme = data.theme || 'general';
  const motionQuery = window.matchMedia ? window.matchMedia('(prefers-reduced-motion: reduce)') : null;

  let slideIndex = 0;
  let autoplayTimer = null;
  let heroTimer = null;
  let isOpen = false;
  let currentSlide = null;

  // helpers
  const todayISO = () => new Date().toISOString().slice(0, 10);
  const isInRange = () => {
    const start = data.start_date || null;
    const end = data.end_date || null;
    const today = todayISO();
    if (start && today < start) return false;
    if (end && today > end) return false;
    return true;
  };

  const storageKey = data.storage_key || 'cecnsr_seasonal';

  const setStorage = (k, v) => {
    // para dismiss usamos day como mínimo
    try {
      localStorage.setItem(k, v);
    } catch (_) {}
  };

  const getStorage = (k) => {
    try {
      return localStorage.getItem(k);
    } catch (_) {
      return null;
    }
  };

  const markShown = () => {
    if (data.show_once_per === 'session') {
      try { sessionStorage.setItem(storageKey, todayISO()); } catch (_) {}
    } else if (data.show_once_per === 'day') {
      setStorage(storageKey, todayISO());
    }
  };

  const wasShown = () => {
    if (force) return false;
    if (data.show_once_per === 'session') {
      try { return sessionStorage.getItem(storageKey) === todayISO(); } catch (_) { return false; }
    }
    if (data.show_once_per === 'day') {
      return getStorage(storageKey) === todayISO();
    }
    return false; // always => no persist
  };

  const dismissKeyFor = (slide) => `${storageKey}__dismiss__${slide?.id || slideIndex}`;

  const isDismissed = (slide) => getStorage(dismissKeyFor(slide)) === todayISO();

  const applyDismissFilter = () => {
    slides = slides.filter((s) => !isDismissed(s));
  };

  const esc = (str) => {
    return String(str || '')
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
  };

  const iconSVG = (name) => {
    if (name === 'books') {
      return `
        <svg viewBox="0 0 24 24" aria-hidden="true" class="seasonal-card__icon">
          <path fill="currentColor" d="M6 4.5c0-.83.67-1.5 1.5-1.5H20v15h-12.5C6.67 18 6 17.33 6 16.5v-12Z" opacity=".28"/>
          <path fill="currentColor" d="M4 6c0-1.1.9-2 2-2h11v15H6a2 2 0 0 1-2-2V6Zm3.5-1.5c-.28 0-.5.22-.5.5v11.5c0 .28.22.5.5.5H16V4.5H7.5Z"/>
          <path fill="currentColor" d="M18 5h2v14h-2z" opacity=".35"/>
        </svg>
      `;
    }
    if (name === 'calendar') {
      return `
        <svg viewBox="0 0 24 24" aria-hidden="true" class="seasonal-card__icon">
          <path fill="currentColor" d="M7 2h2v2h6V2h2v2h1a3 3 0 0 1 3 3v13a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h1V2Z" opacity=".35"/>
          <path fill="currentColor" d="M5 9h14V7a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1v2Z"/>
        </svg>
      `;
    }
    return '';
  };

  const renderBullets = (bullets) => {
    if (!Array.isArray(bullets) || !bullets.length) return '';
    return `<ul class="seasonal-card__bullets">${bullets.map((b) => `<li>${esc(b)}</li>`).join('')}</ul>`;
  };

  const renderLinks = (links) => {
    if (!Array.isArray(links) || !links.length) return '';

    const items = links.map((l) => {
      const label = esc(l.label);
      const variant = l.variant === 'primary'
        ? 'primary'
        : (l.variant === 'danger' ? 'danger' : 'ghost');

      if (l.action === 'close') {
        return `<button type="button" class="seasonal-card__btn seasonal-card__btn--${variant}" data-close="true">${label}</button>`;
      }

      if (l.action === 'dismiss') {
        return `<button type="button" class="seasonal-card__btn seasonal-card__btn--${variant}" data-action="dismiss">${label}</button>`;
      }

      const href = esc(l.href);
      const target = l.target === '_blank' ? ' target="_blank" rel="noopener noreferrer"' : '';
      return `<a class="seasonal-card__btn seasonal-card__btn--${variant}" href="${href}"${target}>${label}</a>`;
    }).join('');

    return `<div class="seasonal-card__actions">${items}</div>`;
  };

  const renderCard = (slide) => {
    const accent = slide.accent || '#ffc300';
    const badge = esc(slide.badge || 'Aviso');
    const heroTitle = esc(slide.hero_title || slide.headline || '');
    const heroSub = esc(slide.hero_sub || slide.sub || '');
    const title = esc(slide.headline || '');
    const sub = esc(slide.sub || '');
    const icon = slide.icon ? iconSVG(slide.icon) : '';

    const avatarSrc = slide.avatar_img || slide.hero_img || '';
    const avatarImg = avatarSrc
      ? `<img class="seasonal-card__avatarImg" src="${esc(avatarSrc)}" alt="" loading="eager">`
      : '';

    const heroImgs = Array.isArray(slide.hero_images) ? slide.hero_images : [];
    const heroImgsAttr = esc(JSON.stringify(heroImgs));

    const overlayMode = slide.overlay_mode || 'full';
    const minimalBody = overlayMode === 'minimal';

    const hasCTA = !!slide.cta_href;

    return `
      <article class="seasonal-card" style="--seasonal-accent:${esc(accent)}" data-has-cta="${hasCTA ? '1' : '0'}">
        <div class="seasonal-card__hero" data-hero-images='${heroImgsAttr}'>
          <div class="seasonal-card__heroShade" aria-hidden="true"></div>

          <div class="seasonal-card__heroContent">
            <div class="seasonal-card__metaRow">
              ${icon}
              <span class="seasonal-card__badge">${badge}</span>
            </div>

            <h3 class="seasonal-card__heroTitle">${heroTitle}</h3>
            <p class="seasonal-card__heroSub">${heroSub}</p>
          </div>

          <div class="seasonal-card__avatar" aria-hidden="true">
            ${avatarImg}
          </div>
        </div>

        <div class="seasonal-card__body">
          ${minimalBody ? '' : `<h4 class="seasonal-card__title">${title}</h4>`}
          ${minimalBody ? '' : `<p class="seasonal-card__sub">${sub}</p>`}
          ${renderBullets(slide.bullets)}
          ${renderLinks(slide.links)}
        </div>
      </article>
    `;
  };

  const renderSlide = (slide) => {
    if (!slide || slide.type === 'card' || !slide.src) return renderCard(slide);

    const alt = esc(slide.alt || '');
    return `
      <article class="seasonal-card seasonal-card--image" style="--seasonal-accent:${esc(slide.accent || '#ffc300')}">
        <div class="seasonal-card__imageWrap">
          <img src="${esc(slide.src)}" alt="${alt}" loading="eager" />
        </div>
      </article>
    `;
  };

  const stopHeroRotation = () => {
    if (heroTimer) {
      clearInterval(heroTimer);
      heroTimer = null;
    }
  };

  const startHeroRotation = () => {
    stopHeroRotation();
    if (!slideEl) return;

    const hero = slideEl.querySelector('.seasonal-card__hero');
    if (!hero) return;

    const raw = hero.getAttribute('data-hero-images') || '[]';
    let imgs = [];
    try { imgs = JSON.parse(raw); } catch (_) {}

    imgs = Array.isArray(imgs) ? imgs.filter(Boolean) : [];
    if (!imgs.length) return;

    // set inicial
    let i = 0;
    hero.style.backgroundImage = `url("${imgs[0]}")`;

    // no rotar si solo 1 o reduce motion
    if (imgs.length <= 1) return;
    if (motionQuery && motionQuery.matches) return;

    heroTimer = setInterval(() => {
      i = (i + 1) % imgs.length;
      hero.classList.add('is-hero-fading');
      // pequeño fade
      setTimeout(() => {
        hero.style.backgroundImage = `url("${imgs[i]}")`;
        requestAnimationFrame(() => hero.classList.remove('is-hero-fading'));
      }, 200);
    }, 3600);
  };

  const updateControlsVisibility = () => {
    const multiple = slides.length > 1;
    if (prevBtn) prevBtn.style.display = multiple ? '' : 'none';
    if (nextBtn) nextBtn.style.display = multiple ? '' : 'none';
    if (dotsWrap) dotsWrap.style.display = multiple ? '' : 'none';
  };

  const rebuildDots = () => {
    if (!dotsWrap) return;
    dotsWrap.innerHTML = '';

    slides.forEach((_, i) => {
      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = `seasonal-modal__dot${i === 0 ? ' is-active' : ''}`;
      btn.setAttribute('aria-label', 'Ir a la diapositiva');
      btn.setAttribute('aria-selected', i === 0 ? 'true' : 'false');
      btn.setAttribute('data-goto', String(i));
      dotsWrap.appendChild(btn);
    });

    dotBtns = Array.from(dotsWrap.querySelectorAll('[data-goto]'));
    dotBtns.forEach((btn) => {
      btn.addEventListener('click', () => {
        const idx = parseInt(btn.getAttribute('data-goto') || '0', 10);
        if (Number.isNaN(idx)) return;
        stopAutoplay();
        setSlide(idx);
        if (isOpen) startAutoplay();
      });
    });
  };

  const open = () => {
    modal.hidden = false;
    modal.classList.add('is-open');
    modal.classList.toggle('seasonal-modal--christmas', theme === 'christmas');
    document.body.classList.add('seasonal-modal-open');
    isOpen = true;
    startAutoplay();
  };

  const close = () => {
    modal.classList.remove('is-open');
    document.body.classList.remove('seasonal-modal-open');
    isOpen = false;
    stopAutoplay();
    stopHeroRotation();
    markShown();
    setTimeout(() => { modal.hidden = true; }, 220);
  };

  const setSlide = (nextIndex) => {
    if (!slideEl || !slides.length) return;

    const len = slides.length;
    const targetIndex = ((nextIndex % len) + len) % len;
    const next = slides[targetIndex];

    currentSlide = next;

    modal.setAttribute('data-overlay', next.overlay_mode || 'full');

    // Fade suave
    slideEl.classList.add('is-fading');

    setTimeout(() => {
      slideIndex = targetIndex;
      slideEl.innerHTML = renderSlide(next);

      // dots
      if (dotBtns.length) {
        dotBtns.forEach((btn, i) => {
          const active = i === slideIndex;
          btn.classList.toggle('is-active', active);
          btn.setAttribute('aria-selected', active ? 'true' : 'false');
        });
      }

      requestAnimationFrame(() => {
        slideEl.classList.remove('is-fading');
      });

      // iniciar rotación hero si aplica
      startHeroRotation();

      // click en hero/card si hay CTA
      const card = slideEl.querySelector('.seasonal-card');
      const hero = slideEl.querySelector('.seasonal-card__hero');
      if (hero) {
        const hasCTA = !!next.cta_href;
        hero.style.cursor = hasCTA ? 'pointer' : (slides.length > 1 ? 'pointer' : 'default');
        hero.onclick = () => {
          if (hasCTA) {
            window.location.href = next.cta_href;
            return;
          }
          if (slides.length > 1) goNext();
        };
      }
      if (card) {
        card.style.setProperty('--seasonal-accent', next.accent || '#ffc300');
      }
    }, 160);
  };

  const startAutoplay = () => {
    if (!slideEl || slides.length <= 1) return;
    if (motionQuery && motionQuery.matches) return;
    stopAutoplay();
    autoplayTimer = setInterval(() => setSlide(slideIndex + 1), 5200);
  };

  const stopAutoplay = () => {
    if (autoplayTimer) {
      clearInterval(autoplayTimer);
      autoplayTimer = null;
    }
  };

  // dismiss actual slide (solo por el día)
  const dismissCurrent = () => {
    if (!currentSlide) return;
    setStorage(dismissKeyFor(currentSlide), todayISO());
    applyDismissFilter();

    if (!slides.length) {
      close();
      return;
    }

    // reconstruir dots y controles
    rebuildDots();
    updateControlsVisibility();

    // mostrar primer slide disponible (normalmente Venta de libros)
    slideIndex = 0;
    setSlide(0);

    // reiniciar autoplay si aplica
    stopAutoplay();
    if (isOpen) startAutoplay();
  };

  // guardas de rango/estado
  if (!isInRange()) return;
  if (wasShown()) return;

  // aplicar dismiss previo (si ya dieron entendido hoy)
  applyDismissFilter();
  if (!slides.length) return;

  // reconstruir dots para que coincidan con slides filtrados
  rebuildDots();
  updateControlsVisibility();

  // navegación manual
  const goPrev = () => {
    stopAutoplay();
    setSlide(slideIndex - 1);
    if (isOpen) startAutoplay();
  };
  const goNext = () => {
    stopAutoplay();
    setSlide(slideIndex + 1);
    if (isOpen) startAutoplay();
  };

  if (prevBtn) prevBtn.addEventListener('click', goPrev);
  if (nextBtn) nextBtn.addEventListener('click', goNext);

  // eventos
  const onKey = (e) => {
    if (e.key === 'Escape') {
      close();
      return;
    }
    if (!isOpen) return;
    if (e.key === 'ArrowLeft') {
      goPrev();
    } else if (e.key === 'ArrowRight') {
      goNext();
    }
  };

  modal.addEventListener('click', (e) => {
    const closeBtn = e.target.closest('[data-close]');
    if (closeBtn) {
      close();
      return;
    }

    const dismissBtn = e.target.closest('[data-action="dismiss"]');
    if (dismissBtn) {
      dismissCurrent();
      return;
    }
  });

  document.addEventListener('keydown', onKey);

  // pausa suave al pasar el cursor por encima del modal
  modal.addEventListener('mouseenter', stopAutoplay);
  modal.addEventListener('mouseleave', () => {
    if (isOpen) startAutoplay();
  });

  // inicial
  setSlide(0);

  // mostrar
  open();
})();
(() => {
  const data = window.__SEASONAL_MODAL__;
  const force = !!window.__SEASONAL_MODAL_FORCE__;
  const slides = Array.isArray(window.__SEASONAL_MODAL_SLIDES__)
    ? window.__SEASONAL_MODAL_SLIDES__.filter((slide) => slide && slide.src)
    : [];
  if (!data || !data.enabled) return;

  const modal = document.getElementById('seasonalModal');
  if (!modal) return;

  const slideImg = document.getElementById('seasonalModalSlide');
  const theme = data.theme || 'general';
  const motionQuery = window.matchMedia ? window.matchMedia('(prefers-reduced-motion: reduce)') : null;
  let slideIndex = 0;
  let autoplayTimer = null;
  let isOpen = false;

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
  const markShown = () => {
    if (data.show_once_per === 'session') {
      sessionStorage.setItem(storageKey, todayISO());
    } else if (data.show_once_per === 'day') {
      localStorage.setItem(storageKey, todayISO());
    }
  };

  const wasShown = () => {
    if (force) return false;
    if (data.show_once_per === 'session') {
      return sessionStorage.getItem(storageKey) === todayISO();
    }
    if (data.show_once_per === 'day') {
      return localStorage.getItem(storageKey) === todayISO();
    }
    return false; // always => no persist
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
    markShown();
    setTimeout(() => {
      modal.hidden = true;
    }, 220);
  };

  const setSlide = (nextIndex) => {
    if (!slideImg || !slides.length) return;
    const targetIndex = nextIndex % slides.length;
    const next = slides[targetIndex];
    slideImg.classList.add('is-fading');
    setTimeout(() => {
      slideIndex = targetIndex;
      slideImg.src = next.src;
      slideImg.alt = next.alt || '';
      requestAnimationFrame(() => {
        slideImg.classList.remove('is-fading');
      });
    }, 140);
  };

  const startAutoplay = () => {
    if (!slideImg || slides.length <= 1) return;
    if (motionQuery && motionQuery.matches) return;
    stopAutoplay();
    autoplayTimer = setInterval(() => {
      setSlide(slideIndex + 1);
    }, 3500);
  };

  const stopAutoplay = () => {
    if (autoplayTimer) {
      clearInterval(autoplayTimer);
      autoplayTimer = null;
    }
  };

  if (slideImg && slides.length) {
    slideImg.src = slides[0].src;
    slideImg.alt = slides[0].alt || '';
  }

  if (motionQuery && motionQuery.addEventListener) {
    motionQuery.addEventListener('change', (event) => {
      if (event.matches) {
        stopAutoplay();
      } else if (isOpen) {
        startAutoplay();
      }
    });
  } else if (motionQuery && motionQuery.addListener) {
    motionQuery.addListener((event) => {
      if (event.matches) {
        stopAutoplay();
      } else if (isOpen) {
        startAutoplay();
      }
    });
  }

  // guardas de rango/estado
  if (!isInRange()) return;
  if (wasShown()) return;

  // eventos
  const onKey = (e) => {
    if (e.key === 'Escape') {
      close();
    }
  };

  modal.addEventListener('click', (e) => {
    const target = e.target.closest('[data-close]');
    if (target) {
      close();
    }
  });
  document.addEventListener('keydown', onKey);

  // mostrar
  open();
})();

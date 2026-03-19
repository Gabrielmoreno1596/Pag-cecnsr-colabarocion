(() => {
    const stage = document.querySelector('[data-events-stage]');
    const cards = document.querySelectorAll('[data-event-card]');
    const modal = document.querySelector('[data-events-modal]');
    if (!stage || !cards.length || !modal) return;

    // Reveal sutil al entrar en viewport
    const io = new IntersectionObserver((entries) => {
        entries.forEach((e) => {
            if (e.isIntersecting) e.target.classList.add('is-inview');
        });
    }, { threshold: 0.18 });

    cards.forEach((c) => io.observe(c));

    // Modal refs
    // Saca el modal del contexto del componente para que `position: fixed`
    // quede anclado al viewport real y no a un ancestro con filter/backdrop-filter.
    if (modal.parentElement !== document.body) document.body.appendChild(modal);

    const closeEls = modal.querySelectorAll('[data-modal-close]');
    const dialog = modal.querySelector('.events-modal__dialog');
    const elCover = modal.querySelector('[data-modal-cover]');
    const elTitle = modal.querySelector('[data-modal-title]');
    const elDate = modal.querySelector('[data-modal-date]');
    const elMeta = modal.querySelector('[data-modal-meta]');
    const elGrid = modal.querySelector('[data-modal-grid]');

    // Lightbox (foto grande)
    let lightbox = null;
    let activeCard = null;
    let activeTrigger = null;

    const VIEWPORT_GAP = 16;

    function clamp(value, min, max) {
        return Math.max(min, Math.min(max, value));
    }

    function placeModal() {
        if (!dialog) return;

        const vw = window.innerWidth;
        const vh = window.innerHeight;

        // Centrado real respecto al viewport.
        dialog.style.setProperty('--modal-tx', '-50%');
        dialog.style.setProperty('--modal-ty', '-50%');

        const rect = dialog.getBoundingClientRect();
        const modalW = Math.min(rect.width || 980, vw - VIEWPORT_GAP * 2);
        const modalH = Math.min(rect.height || vh - VIEWPORT_GAP * 2, vh - VIEWPORT_GAP * 2);

        const centerX = clamp(vw / 2, VIEWPORT_GAP + modalW / 2, vw - VIEWPORT_GAP - modalW / 2);
        const centerY = clamp(vh / 2, VIEWPORT_GAP + modalH / 2, vh - VIEWPORT_GAP - modalH / 2);

        dialog.style.setProperty('--modal-left', `${centerX}px`);
        dialog.style.setProperty('--modal-top', `${centerY}px`);
    }

    // ✅ Estado de navegación (por card)
    let lbImages = [];
    let lbIndex = 0;
    let lbTitle = 'Foto del evento';

    function ensureLightbox() {
        if (lightbox) return;

        lightbox = document.createElement('div');
        lightbox.className = 'events-lightbox';
        lightbox.innerHTML = `
      <div class="events-lightbox__backdrop" data-lb-close></div>

      <div class="events-lightbox__content" role="dialog" aria-modal="true" aria-label="Vista ampliada de imagen">
        <button class="events-lightbox__close" data-lb-close aria-label="Cerrar">×</button>

        <!-- ✅ Botones navegación -->
        <button class="events-lightbox__nav events-lightbox__prev" type="button" data-lb-prev aria-label="Anterior">‹</button>
        <button class="events-lightbox__nav events-lightbox__next" type="button" data-lb-next aria-label="Siguiente">›</button>

        <img class="events-lightbox__img" alt="">
        <div class="events-lightbox__counter" aria-live="polite"></div>
      </div>
    `;
        document.body.appendChild(lightbox);

        // Cerrar
        lightbox.querySelectorAll('[data-lb-close]').forEach((el) => {
            el.addEventListener('click', closeLightbox);
        });

        // Navegar
        lightbox.querySelector('[data-lb-prev]').addEventListener('click', () => stepLightbox(-1));
        lightbox.querySelector('[data-lb-next]').addEventListener('click', () => stepLightbox(1));
    }

    function renderLightbox() {
        if (!lightbox) return;

        const imgEl = lightbox.querySelector('.events-lightbox__img');
        const counterEl = lightbox.querySelector('.events-lightbox__counter');

        const src = lbImages[lbIndex];
        imgEl.src = src;
        imgEl.alt = lbTitle;

        // contador "2 / 7"
        counterEl.textContent = lbImages.length ? `${lbIndex + 1} / ${lbImages.length}` : '';
    }

    function openLightbox(images, index, title) {
        ensureLightbox();

        lbImages = Array.isArray(images) ? images : [];
        lbIndex = Number.isFinite(index) ? index : 0;
        lbTitle = title || 'Foto del evento';

        // clamp por seguridad
        if (lbIndex < 0) lbIndex = 0;
        if (lbIndex > lbImages.length - 1) lbIndex = lbImages.length - 1;

        renderLightbox();
        lightbox.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    function stepLightbox(dir) {
        if (!lbImages.length) return;
        lbIndex = (lbIndex + dir + lbImages.length) % lbImages.length; // circular
        renderLightbox();
    }

    function closeLightbox() {
        if (!lightbox) return;
        lightbox.style.display = 'none';

        // Si el modal sigue abierto, no desbloqueamos scroll del body aquí
        if (!modal.classList.contains('is-open')) document.body.style.overflow = '';
    }

    function openModal(card, triggerBtn = null) {
        activeCard = card;
        activeTrigger = null;

        const title = card.dataset.title || 'Evento';
        const date = card.dataset.date || '';
        const meta = card.dataset.meta || '';
        const cover = card.dataset.cover || '';
        let images = [];

        try { images = JSON.parse(card.dataset.images || '[]'); }
        catch { images = []; }

        elTitle.textContent = title;
        elDate.textContent = date;
        elMeta.textContent = meta;

        elCover.style.backgroundImage = cover ? `url('${cover}')` : 'none';

        elGrid.innerHTML = '';
        images.forEach((src, idx) => {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.setAttribute('aria-label', 'Ver foto');
            const img = document.createElement('img');
            img.loading = 'lazy';
            img.alt = title;
            img.src = src;
            btn.appendChild(img);

            // ✅ ahora pasamos TODO el set + índice
            btn.addEventListener('click', () => openLightbox(images, idx, title));
            elGrid.appendChild(btn);
        });

        modal.hidden = false;
        requestAnimationFrame(() => {
            placeModal();
            modal.classList.add('is-open');
            const closeBtn = modal.querySelector('.events-modal__close');
            if (closeBtn) closeBtn.focus({ preventScroll: true });
        });
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        activeCard = null;
        activeTrigger = null;
        modal.classList.remove('is-open');
        if (lightbox && lightbox.style.display === 'block') closeLightbox();
        document.body.style.overflow = '';
        setTimeout(() => (modal.hidden = true), 180);
    }

    cards.forEach((card) => {
        const btn = card.querySelector('.events-card__hit');
        if (!btn) return;
        btn.addEventListener('click', () => openModal(card, btn));
    });

    closeEls.forEach((b) => b.addEventListener('click', closeModal));



    window.addEventListener('resize', () => {
        if (!modal.hidden) placeModal();
    });

    window.addEventListener('scroll', () => {
        if (!modal.hidden) placeModal();
    }, { passive: true });

    window.addEventListener('keydown', (e) => {
        // ✅ Si lightbox está abierto: ESC cierra; flechas navegan
        if (lightbox && lightbox.style.display === 'block') {
            if (e.key === 'Escape') return closeLightbox();
            if (e.key === 'ArrowLeft') return stepLightbox(-1);
            if (e.key === 'ArrowRight') return stepLightbox(1);
            return;
        }

        // Si NO hay lightbox, ESC cierra modal
        if (e.key === 'Escape') {
            if (!modal.hidden) closeModal();
        }
    });
})();
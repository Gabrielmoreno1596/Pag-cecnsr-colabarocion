// modules/himno.js
(() => {
    const section = document.querySelector('.band--himno-pro');
    if (!section) return;

    const frame = section.querySelector('.video-frame');
    const details = section.querySelector('#letra-himno'); // del PHP
    const root = section; // usaremos una CSS var en el propio section

    // Abre si llega con hash
    if (location.hash === '#letra-himno' && details) {
        details.open = true;
        setTimeout(() => details.querySelector('summary')?.focus(), 0);
    }

    // Función que calcula y fija la altura
    const sync = () => {
        if (!frame) return;
        const h = Math.round(frame.getBoundingClientRect().height);
        root.style.setProperty('--himno-sync-h', `${h}px`);
    };

    // Responder a resize / cambios
    const ro = (window.ResizeObserver)
        ? new ResizeObserver(sync)
        : null;

    // Eventos
    window.addEventListener('resize', sync, { passive: true });
    details?.addEventListener('toggle', sync);
    ro?.observe(frame);

    // Primera sincronización
    sync();

    // Accesibilidad extra para el summary (Enter/Espacio ya funcionan en la mayoría,
    // reforzamos por si acaso algunos navegadores móviles)
    const sum = details?.querySelector('summary');
    sum?.addEventListener('keydown', (e) => {
        if (e.key === ' ') { e.preventDefault(); details.open = !details.open; }
    });

    // modules/himno.js
    (() => {
        const section = document.querySelector('.band--himno-pro');
        if (!section) return;

        const frame = section.querySelector('.video-frame');
        const details = section.querySelector('#letra-himno');
        const card = section.querySelector('.himno-card');           // ← NUEVO
        const root = section;

        // …

        // sincroniza clase para fallback (y para animaciones)
        const flag = () => card?.classList.toggle('is-open', !!details?.open);  // ← NUEVO

        window.addEventListener('resize', sync, { passive: true });
        details?.addEventListener('toggle', () => { sync(); flag(); });          // ← CAMBIO
        ro?.observe(frame);

        sync();
        flag();                                                                  // ← NUEVO
    })();
})();

(() => {
    const wrap = document.querySelector('.mision-layout[data-tabs="vjac"]');
    if (!wrap) return;

    const btns = [...wrap.querySelectorAll('.tabs__btn')];
    const panels = [...wrap.querySelectorAll('.tabs__panel')];
    const aside = wrap.querySelector('.mision-aside');
    const bg = wrap.querySelector('[data-aside-bg]');
    const kEl = wrap.querySelector('[data-aside-k]');
    const titleEl = wrap.querySelector('[data-aside-title]');
    const descEl = wrap.querySelector('[data-aside-desc]');
    if (!btns.length || !panels.length || !aside || !bg || !kEl || !titleEl || !descEl) return;

    const DATA = [
        { key: 'Ver', title: 'Mirada crítica y esperanzadora', desc: 'Observamos la realidad con serenidad, buscando la verdad que humaniza.', img: 'assets/pastoralEducativa/primer-ciclo.jpeg' },
        { key: 'Juzgar', title: 'Discernir a la luz del Evangelio', desc: 'Contrastamos hechos y criterios con la Palabra y el carisma franciscano.', img: 'assets/pastoralEducativa/celebraciones/cancha-desde-escenario2.jpeg' },
        { key: 'Actuar', title: 'La fe hecha servicio', desc: 'Pasamos del diagnóstico a acciones solidarias que transforman.', img: 'assets/pastoralEducativa/celebraciones/san-francisco-tercer-ciclo.jpeg' },
        { key: 'Celebrar', title: 'Alegría e identidad compartida', desc: 'La comunidad celebra la fe que sostiene el camino educativo.', img: 'assets/pastoralEducativa/celebraciones/cancha-desde-gradas-derecha.jpeg' },
    ];
    DATA.forEach(d => { const im = new Image(); im.src = d.img; });

    const setActive = (i) => {
        btns.forEach((b, idx) => {
            const on = idx === i;
            b.classList.toggle('is-active', on);
            b.setAttribute('aria-selected', on ? 'true' : 'false');
            panels[idx].hidden = !on;
            panels[idx].classList.toggle('is-active', on);
        });
        const d = DATA[i];
        if (!d) return;
        aside.setAttribute('data-state', '');
        bg.style.opacity = 0;
        setTimeout(() => {
            kEl.textContent = d.key;
            titleEl.textContent = d.title;
            descEl.textContent = d.desc;
            bg.style.backgroundImage = `url('${d.img}')`;
            bg.style.opacity = 0.25;
            aside.setAttribute('data-state', 'in');
        }, 200);
    };

    btns.forEach((b, i) => b.addEventListener('click', () => { setActive(i); pauseThenResume(); }));

    // autoplay
    let index = 0, timer = null;
    const DUR = 4000, HOLD_AFTER_INTERACT = 6500;
    const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;

    const play = () => { if (reduce || timer) return; timer = setInterval(() => { index = (index + 1) % DATA.length; setActive(index); }, DUR); };
    const stop = () => { if (!timer) return; clearInterval(timer); timer = null; };
    let holdTimer = null;
    const pauseThenResume = () => { stop(); if (holdTimer) clearTimeout(holdTimer); holdTimer = setTimeout(() => play(), HOLD_AFTER_INTERACT); };

    wrap.addEventListener('mouseenter', stop);
    wrap.addEventListener('mouseleave', play);
    document.addEventListener('visibilitychange', () => document.hidden ? stop() : play());

    setActive(0);
    play();
})();

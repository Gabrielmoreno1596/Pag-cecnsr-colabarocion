(() => {
    const track = document.getElementById('railTrack');
    const detail = document.getElementById('railDetail');
    const dataEl = document.getElementById('railData');
    if (!track || !detail || !dataEl) return;

    // Lee el JSON generado por desempenos.php (una sola fuente de verdad)
    /** @type {Record<string, {n:number,t:string,intro:string,pilares:string[],bullets:string[],cita?:string}>} */
    const DATA = (() => {
        try { return JSON.parse(dataEl.textContent || '{}') || {}; }
        catch { return {}; }
    })();

    const items = [...track.querySelectorAll('.rail__item')];

    const tpl = (d) => `
    <h3><span class="rail__num" aria-hidden="true">${d.n}</span> ${d.t}</h3>
    <p>${d.intro}</p>
    ${Array.isArray(d.pilares) && d.pilares.length ? `
      <div class="chips">${d.pilares.map(p => `<span class="chip">${p}</span>`).join('')}</div>
    ` : ''}
    ${Array.isArray(d.bullets) && d.bullets.length ? `
      <ul>${d.bullets.map(b => `<li>${b}</li>`).join('')}</ul>
    ` : ''}
    ${d.cita ? `<blockquote>“${d.cita}”</blockquote>` : ''}
  `;

    // ===== Responsive detection =====
    const mql = matchMedia('(max-width: 700px)');
    let isMobile = mql.matches;
    mql.addEventListener('change', (e) => {
        isMobile = e.matches;
        cleanupMobile();
        if (!isMobile) {
            const current = items.find(i => i.classList.contains('is-active')) || items[0];
            if (current) setActiveDesktop(current.dataset.k, current);
            start();
        } else {
            stop();
            const current = items.find(i => i.classList.contains('is-active')) || items[0];
            if (current) setActiveMobile(current.dataset.k, current, { scroll: false });
        }
    });

    // ===== Desktop: rail + panel fijo =====
    const setActiveDesktop = (k, li) => {
        const d = DATA[k]; if (!d) return;
        detail.innerHTML = tpl(d);
        document.querySelector('.band--desempenos-rail')
            ?.style.setProperty('--border-left-color',
                getComputedStyle(document.documentElement).getPropertyValue('--rail-active-bg').trim() || '#7c0040');

        items.forEach(i => {
            const on = (i === li);
            i.classList.toggle('is-active', on);
            i.classList.toggle('is-open', false);
            i.setAttribute('aria-selected', on ? 'true' : 'false');
            i.setAttribute('aria-expanded', 'false');
        });
    };

    // ===== Móvil: acordeón (un abierto a la vez) =====
    const setActiveMobile = (k, li, opts = {}) => {
        const d = DATA[k]; if (!d) return;

        cleanupMobile();

        items.forEach(i => {
            const on = (i === li);
            i.classList.toggle('is-open', on);
            i.classList.toggle('is-active', on);
            i.setAttribute('aria-selected', on ? 'true' : 'false');
            i.setAttribute('aria-expanded', on ? 'true' : 'false');
        });

        const acc = document.createElement('div');
        acc.className = 'rail__acc rail-detail';
        acc.innerHTML = tpl(d);
        li.insertAdjacentElement('afterend', acc);

        if (opts.scroll !== false) {
            acc.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    };

    const cleanupMobile = () => {
        track.querySelectorAll('.rail__acc').forEach(n => n.remove());
        items.forEach(i => { i.classList.remove('is-open'); i.setAttribute('aria-expanded', 'false'); });
    };

    // ===== Eventos comunes =====
    const setActive = (li) => {
        if (!li) return;
        if (isMobile) setActiveMobile(li.dataset.k, li);
        else setActiveDesktop(li.dataset.k, li);
    };

    items.forEach(li => {
        li.tabIndex = 0;
        li.setAttribute('role', 'button');
        li.setAttribute('aria-expanded', 'false');

        li.addEventListener('click', () => { setActive(li); pauseThenResume(); });
        li.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); setActive(li); pauseThenResume(); }
        });
    });

    // ===== Autoplay sólo en escritorio =====
    let idx = Math.max(0, items.findIndex(i => i.classList.contains('is-active')));
    if (idx < 0) idx = 0;
    const showByIndex = (n) => { idx = (n + items.length) % items.length; const li = items[idx]; setActiveDesktop(li.dataset.k, li); };

    const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
    const DUR = 5200, HOLD = 6500;
    let timer = null, holdTimer = null;

    const start = () => { if (isMobile || reduce || timer) return; timer = setInterval(() => showByIndex(idx + 1), DUR); };
    const stop = () => { if (!timer) return; clearInterval(timer); timer = null; };
    const pauseThenResume = () => { if (isMobile) return; stop(); if (holdTimer) clearTimeout(holdTimer); holdTimer = setTimeout(start, HOLD); };

    track.addEventListener('mouseenter', () => { if (!isMobile) stop(); });
    track.addEventListener('mouseleave', () => { if (!isMobile) start(); });
    document.addEventListener('visibilitychange', () => document.hidden ? stop() : start());
    track.addEventListener('focusin', () => { if (!isMobile) stop(); });
    track.addEventListener('focusout', (e) => { if (!isMobile && !track.contains(e.relatedTarget)) pauseThenResume(); });

    // ===== Init =====
    const first = items[0];
    if (isMobile) { if (first) setActiveMobile(first.dataset.k, first, { scroll: false }); stop(); }
    else { if (first) setActiveDesktop(first.dataset.k, first); start(); }
})();

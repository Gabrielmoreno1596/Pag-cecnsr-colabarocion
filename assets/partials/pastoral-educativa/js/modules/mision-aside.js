(() => {
    const aside = document.querySelector('.mision-aside[data-vjac]');
    if (!aside) return;

    const bg = aside.querySelector('[data-aside-bg]');
    const kEl = aside.querySelector('[data-aside-k]');
    const title = aside.querySelector('[data-aside-title]');
    const desc = aside.querySelector('[data-aside-desc]');
    const listEl = aside.querySelector('[data-aside-list]');
    const dotsW = aside.querySelector('[data-dots]');
    const prev = aside.querySelector('[data-prev]');
    const next = aside.querySelector('[data-next]');
    if (!bg || !kEl || !title || !desc || !dotsW || !prev || !next) return;

    let DATA = [];
    try { DATA = JSON.parse(aside.dataset.vjac || '[]'); } catch (e) { DATA = []; }
    if (!DATA.length) return;

    // Crear dots accesibles
    const dots = DATA.map((it, i) => {
        const b = document.createElement('button');
        b.type = 'button';
        b.className = 'mision-aside__dot';
        b.setAttribute('role', 'tab');
        b.setAttribute('aria-label', it.key || `Paso ${i + 1}`);
        b.addEventListener('click', () => { setActive(i); userInteracted(); });
        dotsW.appendChild(b);
        return b;
    });

    let index = 0;
    let timer = null;
    let interacted = false;
    const DUR = 5000;
    const reduceMotion = matchMedia('(prefers-reduced-motion: reduce)').matches;

    function setBullets(bullets) {
        if (!Array.isArray(bullets) || !bullets.length) {
            listEl.innerHTML = '';
            listEl.hidden = true;
            return;
        }
        listEl.hidden = false;
        listEl.innerHTML = '';
        bullets.forEach(t => {
            const li = document.createElement('li');
            li.textContent = t;
            listEl.appendChild(li);
        });
    }

    function setActive(i) {
        index = (i + DATA.length) % DATA.length;
        const d = DATA[index];

        kEl.textContent = d.key || '';
        title.textContent = d.title || '';
        desc.textContent = d.desc || '';
        setBullets(d.bullets || []);

        // Transición de fondo
        bg.style.opacity = 0;
        setTimeout(() => {
            bg.style.backgroundImage = `url('${d.img || ''}')`;
            bg.style.opacity = 0.28;
        }, 160);

        // Estado para animaciones CSS
        aside.setAttribute('data-state', 'in');

        // dots
        dots.forEach((dot, k) => dot.setAttribute('aria-selected', k === index ? 'true' : 'false'));
    }

    function play() {
        if (reduceMotion || interacted || timer) return;
        timer = setInterval(() => setActive(index + 1), DUR);
    }
    function stop() { if (!timer) return; clearInterval(timer); timer = null; }
    function userInteracted() { interacted = true; stop(); }

    // Controles
    prev.addEventListener('click', () => { setActive(index - 1); userInteracted(); });
    next.addEventListener('click', () => { setActive(index + 1); userInteracted(); });

    // Teclado (en el aside)
    aside.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight') { e.preventDefault(); next.click(); }
        if (e.key === 'ArrowLeft') { e.preventDefault(); prev.click(); }
        if (e.key === 'Home') { e.preventDefault(); setActive(0); userInteracted(); }
        if (e.key === 'End') { e.preventDefault(); setActive(DATA.length - 1); userInteracted(); }
    });

    // Pausas naturales
    aside.addEventListener('mouseenter', stop);
    aside.addEventListener('mouseleave', play);
    document.addEventListener('visibilitychange', () => document.hidden ? stop() : play());

    // init
    setActive(0);
    play();
})();

/* ============ LIGHTBOX (opcional) ============ */
(() => {
    const lb = document.getElementById('lightbox');
    if (!lb) return; // si no está el contenedor, no hace nada

    const lbImg = lb.querySelector('.lightbox__img');
    const btnClose = lb.querySelector('.lightbox__close');
    const btnPrev = lb.querySelector('.lightbox__nav--prev');
    const btnNext = lb.querySelector('.lightbox__nav--next');

    // Toma href de <a> dentro de cualquier contenedor con data-gallery="main"
    // También soporta .gallery, .masonry y .mision-masonry
    const anchors = Array.from(document.querySelectorAll('[data-gallery="main"] a, .gallery a, .masonry a, .mision-masonry a'));
    const sources = anchors.map(a => a.getAttribute('href')).filter(Boolean);
    if (!sources.length) return;

    let current = 0;

    function openLightbox(index) {
        current = index;
        lbImg.src = sources[current];
        lb.setAttribute('aria-hidden', 'false');
        lb.removeAttribute('hidden');
        document.body.style.overflow = 'hidden';
        lb.focus();
    }
    function closeLightbox() {
        lb.setAttribute('aria-hidden', 'true');
        lb.setAttribute('hidden', '');
        document.body.style.overflow = '';
        lbImg.removeAttribute('src');
    }
    function nav(delta) {
        current = (current + delta + sources.length) % sources.length;
        lbImg.src = sources[current];
    }

    anchors.forEach((a, i) => {
        a.addEventListener('click', e => {
            e.preventDefault();
            openLightbox(i);
        });
    });

    btnClose?.addEventListener('click', closeLightbox);
    btnPrev?.addEventListener('click', () => nav(-1));
    btnNext?.addEventListener('click', () => nav(1));

    window.addEventListener('keyup', e => {
        if (lb.getAttribute('aria-hidden') === 'true') return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowRight') nav(1);
        if (e.key === 'ArrowLeft') nav(-1);
    });

    lb.addEventListener('click', e => { if (e.target === lb) closeLightbox(); });
})();

/* ============ HERO SLIDESHOW ============ */

/* =========================
   HERO — slideshow + progreso + offset de header
   ========================= */
class HeroSlider {
    constructor({ duration = 5000 } = {}) {
        this.root = document.querySelector('.hero');
        this.slides = [...document.querySelectorAll('.hero-slide')];
        this.indicators = [...document.querySelectorAll('.hero__indicator')];
        this.progress = document.getElementById('heroProgress');

        this.index = 0;
        this.duration = duration;
        this.timer = null;
        this.progressTimer = null;
        this.reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (!this.root || this.slides.length === 0) return;
        this.bind();
        // muestra la primera
        this.go(0);
        if (!this.reduceMotion) this.start();
    }

    bind() {
        // Indicadores
        this.indicators.forEach((dot, i) => {
            dot.addEventListener('click', () => this.go(i, true));
        });

        /*  // Pausas de cortesía
         ['mouseenter', 'focusin', 'touchstart'].forEach(evt =>
             this.root.addEventListener(evt, () => this.pause())
         );
         ['mouseleave', 'focusout', 'touchend'].forEach(evt =>
             this.root.addEventListener(evt, () => this.start())
         );
 
         // Pausa cuando la pestaña no está visible
         document.addEventListener('visibilitychange', () => {
             if (document.hidden) this.pause(); else this.start();
         }); */
    }

    start() {
        this.clearTimers();
        this.timer = setInterval(() => this.next(), this.duration);
        this.startProgressBar();
    }
    pause() { this.clearTimers(); }
    clearTimers() {
        if (this.timer) clearInterval(this.timer);
        if (this.progressTimer) clearInterval(this.progressTimer);
        this.timer = this.progressTimer = null;
    }

    next() { this.go(this.index + 1); }

    go(n, manual = false) {
        const len = this.slides.length;
        this.index = (n + len) % len;

        // clases "active" (nuevo hero)
        this.slides.forEach((s, i) => s.classList.toggle('active', i === this.index));
        this.indicators.forEach((d, i) => d.classList.toggle('active', i === this.index));

        this.startProgressBar();

        // si fue interacción manual, reinicia autoplay
        if (manual && !this.reduceMotion) {
            this.pause();
            this.start();
        }
    }

    startProgressBar() {
        if (!this.progress) return;

        // ⚠️ limpiar siempre el intervalo previo
        if (this.progressTimer) {
            clearInterval(this.progressTimer);
            this.progressTimer = null;
        }

        this.progress.style.width = '0%';
        if (this.reduceMotion) return;

        const step = 50; // ms
        let w = 0;
        this.progressTimer = setInterval(() => {
            w += 100 / (this.duration / step);
            this.progress.style.width = w + '%';
            if (w >= 100) {
                clearInterval(this.progressTimer);
                this.progressTimer = null;
            }
        }, step);
    }

}



/* =========================
   Offset dinámico del header fijo → --header-h
   ========================= */
(function () {
    const docStyle = document.documentElement.style;

    function findHeader() {
        return document.querySelector('[data-header]') ||
            document.querySelector('.site-header') ||
            document.querySelector('header');
    }
    function isFixedOrSticky(el) {
        if (!el) return false;
        const pos = getComputedStyle(el).position;
        return pos === 'fixed' || pos === 'sticky';
    }
    function setHeroOffset() {
        const header = findHeader();
        const h = header && isFixedOrSticky(header) ? header.offsetHeight : 0;
        docStyle.setProperty('--header-h', (h || 0) + 'px');
    }

    // observar cambios de tamaño del header
    let ro;
    function observeHeader() {
        const header = findHeader();
        if (!header || !('ResizeObserver' in window)) return;
        if (ro) ro.disconnect();
        ro = new ResizeObserver(() => {
            // si el header cambia de posición (fixed/sticky <-> static), recalcula igual
            setHeroOffset();
        });
        ro.observe(header);
    }


    window.addEventListener('DOMContentLoaded', () => {
        setHeroOffset();
        observeHeader();
        // Inicia el slider una vez está listo el DOM
        new HeroSlider({ duration: 5000 });
    });
    window.addEventListener('load', setHeroOffset);
    window.addEventListener('resize', setHeroOffset);
    window.addEventListener('orientationchange', setHeroOffset);

    // Si el menú hamburguesa abre/cierra y cambia la altura:
    // llama manualmente a setHeroOffset() tras el toggle.
})();

/* =========================
   Smooth scroll para anclas (incluido el botón de flecha del hero)
   ========================= */
document.addEventListener('click', (e) => {
    const a = e.target.closest('a[href^="#"]');
    if (!a) return;

    const href = a.getAttribute('href');
    if (!href || href === '#') return;

    const target = document.querySelector(href);
    if (!target) return;

    e.preventDefault();
    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    target.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'start' });
});


/* ============ TABS VJAC ============ */
(() => {
    const wrap = document.querySelector('[data-tabs="vjac"]');
    if (!wrap) return;
    const buttons = [...wrap.querySelectorAll('.tabs__btn')];
    const panels = [...wrap.querySelectorAll('.tabs__panel')];
    const ink = wrap.querySelector('.tabs__ink');

    function activate(i) {
        buttons.forEach((b, idx) => {
            const on = idx === i;
            b.classList.toggle('is-active', on);
            b.setAttribute('aria-selected', on ? 'true' : 'false');
            panels[idx].classList.toggle('is-active', on);
            panels[idx].hidden = !on;
        });
        const b = buttons[i];
        const r = b.getBoundingClientRect(), p = b.offsetParent.getBoundingClientRect();
        ink.style.left = (r.left - p.left) + 'px';
        ink.style.width = r.width + 'px';
    }

    buttons.forEach((btn, i) => btn.addEventListener('click', () => activate(i)));
    window.addEventListener('resize', () => {
        const i = buttons.findIndex(b => b.classList.contains('is-active'));
        if (i > -1) activate(i);
    });
    activate(0);
})();

(() => {
    const wrap = document.querySelector('.mision-layout[data-tabs="vjac"]');
    if (!wrap) return;

    const btns = [...wrap.querySelectorAll('.tabs__btn')];
    const panels = [...wrap.querySelectorAll('.tabs__panel')];


    // Aside targets
    const aside = wrap.querySelector('.mision-aside');
    const bg = wrap.querySelector('[data-aside-bg]');
    const kEl = wrap.querySelector('[data-aside-k]');
    const titleEl = wrap.querySelector('[data-aside-title]');
    const descEl = wrap.querySelector('[data-aside-desc]');

    // Contenido / imágenes sugeridas (puedes cambiar las URLs cuando elijas otras)
    const DATA = [
        {
            key: 'Ver',
            title: 'Mirada crítica y esperanzadora',
            desc: 'Observamos la realidad con serenidad, buscando la verdad que humaniza.',
            img: 'assets/pastoralEducativa/primer-ciclo.jpeg' /* Birdwatchers */
        },
        {
            key: 'Juzgar',
            title: 'Discernir a la luz del Evangelio',
            desc: 'Contrastamos hechos y criterios con la Palabra y el carisma franciscano.',
            img: 'assets/pastoralEducativa/celebraciones/cancha-desde-escenario2.jpeg' /* Bible study (ejemplo genérico de estudio bíblico) */
        },
        {
            key: 'Actuar',
            title: 'La fe hecha servicio',
            desc: 'Pasamos del diagnóstico a acciones solidarias que transforman.',
            img: 'assets/pastoralEducativa/celebraciones/san-francisco-tercer-ciclo.jpeg' /* Voluntariado/servicio */
        },
        {
            key: 'Celebrar',
            title: 'Alegría e identidad compartida',
            desc: 'La comunidad celebra la fe que sostiene el camino educativo.',
            img: 'assets/pastoralEducativa/celebraciones/cancha-desde-gradas-derecha.jpeg' /* culto/comunidad (ejemplo de Pexels) */
        }
    ];

    function setActive(i) {
        // Tabs visual + paneles
        btns.forEach((b, idx) => {
            const on = idx === i;
            b.classList.toggle('is-active', on);
            b.setAttribute('aria-selected', on ? 'true' : 'false');
            panels[idx].hidden = !on;
            panels[idx].classList.toggle('is-active', on);
        });

        // Aside content
        const d = DATA[i];
        aside.setAttribute('data-state', ''); // reset
        // Fading del fondo
        bg.style.opacity = 0;
        setTimeout(() => {
            kEl.textContent = d.key;
            titleEl.textContent = d.title;
            descEl.textContent = d.desc;
            bg.style.backgroundImage = `url('${d.img}')`;
            bg.style.opacity = 0.25;
            aside.setAttribute('data-state', 'in');
        }, 200);
    }

    // Clicks
    btns.forEach((b, i) => b.addEventListener('click', () => { setActive(i); index = i; restart(); }));

    // Autoplay
    let index = 0, timer = null;
    const DUR = 4000;

    function play() { if (timer) return; timer = setInterval(() => { index = (index + 1) % DATA.length; setActive(index); }, DUR); }
    function stop() { if (!timer) return; clearInterval(timer); timer = null; }
    function restart() { stop(); play(); }

    // Pausa en hover y cuando la pestaña no está visible
    wrap.addEventListener('mouseenter', stop);
    wrap.addEventListener('mouseleave', play);
    document.addEventListener('visibilitychange', () => document.hidden ? stop() : play());

    // Init
    // precarga ligera de imágenes
    DATA.forEach(d => { const im = new Image(); im.src = d.img; });
    setActive(0);
    play();
})();

/* ============ RAIL DESEMPEÑOS (detalle dinámico) ============ */
/* ============ RAIL DESEMPEÑOS (detalle dinámico + autoplay/pause) ============ */
(() => {
    const DATA = {
        aprender: {
            n: 1, t: "Aprender a Aprender",
            intro: "El aprendizaje es un proceso continuo que despierta interés por descubrir, comprender y transformar la realidad.",
            pilares: ["Disciplina personal"],
            bullets: ["Organización del tiempo y hábitos de estudio.", "Responsabilidad y perseverancia en la excelencia académica y humana.", "Metacognición: planificar, monitorear y evaluar cómo aprendo."],
            cita: "La disciplina personal sostiene el proceso: ordena la jornada, fortalece la constancia y orienta a la excelencia."
        },
        conocer: {
            n: 2, t: "Aprender a Conocer",
            intro: "No solo adquirir información: buscamos comprensión profunda del mundo y del sentido de la vida.",
            pilares: ["Tarjeta de presentación personal"],
            bullets: ["Valores y actitudes con respeto y coherencia.", "Rigor intelectual con mirada sapiencial y sentido trascendente.", "Lectura crítica de la realidad, la cultura y la fe."],
            cita: "La 'tarjeta de presentación' se hace visible en un trato respetuoso y auténtico."
        },
        hacer: {
            n: 3, t: "Aprender a Hacer",
            intro: "La acción transforma el conocimiento en servicio al bien común.",
            pilares: ["Grado de servicio personal"],
            bullets: ["Proyectos con impacto solidario y justicia social.", "Trabajo colaborativo y liderazgo para el bien común.", "Cuidado de la Casa Común desde acciones concretas."],
            cita: "Los talentos se ponen al servicio: servir es la forma cristiana de liderar."
        },
        sentir: {
            n: 4, t: "Aprender a Sentir",
            intro: "Vivir con empatía, gratitud y sensibilidad ante el prójimo.",
            pilares: ["Prevención personal"],
            bullets: ["Cuidado de la integridad emocional y espiritual.", "Relaciones sanas y decisiones responsables.", "Educación afectiva para la paz interior."],
            cita: "La prevención personal guía un sentir que protege la vida y favorece vínculos sanos."
        },
        ser: {
            n: 5, t: "Aprender a Ser",
            intro: "Identidad cristiana y franciscana: descubrir el valor de ser hijo de Dios.",
            pilares: ["Disciplina personal", "Tarjeta de presentación personal"],
            bullets: ["Autenticidad y seguridad interior.", "Proyecto de vida con sentido, libertad y responsabilidad.", "Virtudes franciscanas: minoridad, fraternidad, paz."],
            cita: "Ser auténticos y coherentes: lo que vivimos, pensamos y expresamos se hace uno."
        },
        convivir: {
            n: 6, t: "Aprender a Convivir",
            intro: "La convivencia es el fruto visible de una educación integral.",
            pilares: ["Grado de servicio personal", "Prevención personal"],
            bullets: ["Fraternidad y cultura del buen trato.", "Resolución pacífica de conflictos y diálogo.", "Comunidades solidarias que reflejen el amor de Cristo."],
            cita: "La convivencia se aprende sirviendo y cuidando: paz que se hace gesto cotidiano."
        },
        integrar: {
            n: 7, t: "Integrar Fe, Cultura y Vida",
            intro: "Eje transversal del Modelo Educativo: el saber, iluminado por la fe, se vuelve sabiduría y proyecto de vida.",
            pilares: ["Disciplina", "Tarjeta", "Servicio", "Prevención"],
            bullets: ["Articula lo académico con lo humano-espiritual y la ciudadanía.", "Coherencia en trato, lenguaje y presencia.", "Saber orientado a la acción solidaria y al cuidado de la Casa Común.", "Hábitos y decisiones responsables para el bien propio y común."],
            cita: "Integrar fe, cultura y vida convierte el aprendizaje en sabiduría encarnada y servicio con sentido."
        }
    };

    const track = document.getElementById('railTrack');
    const detail = document.getElementById('railDetail');
    if (!track || !detail) return;

    const items = [...track.querySelectorAll('.rail__item')];

    const tpl = (d) => `
    <h3><span class="rail__num" aria-hidden="true">${d.n}</span> ${d.t}</h3>
    <p>${d.intro}</p>
    <div class="chips">${d.pilares.map(p => `<span class="chip">${p}</span>`).join('')}</div>
    <ul>${d.bullets.map(b => `<li>${b}</li>`).join('')}</ul>
    <blockquote>“${d.cita}”</blockquote>`;

    function setActive(k, li) {
        const d = DATA[k];
        if (!d) return;
        detail.innerHTML = tpl(d);
        items.forEach(i => {
            const on = (i === li);
            i.classList.toggle('is-active', on);
            i.setAttribute('aria-selected', on ? 'true' : 'false');
        });
    }

    function setActive(k, li) {
        const d = DATA[k];
        if (!d) return;
        detail.innerHTML = tpl(d);

        // Mantén el borde del panel en el color activo del rail
        document.querySelector('.band--desempenos-rail')
            ?.style.setProperty('--border-left-color', getComputedStyle(document.documentElement).getPropertyValue('--rail-active-bg').trim() || '#7c0040');

        items.forEach(i => {
            const on = (i === li);
            i.classList.toggle('is-active', on);
            i.setAttribute('aria-selected', on ? 'true' : 'false');
        });
    }


    // === Eventos de interacción ===
    items.forEach(li => {
        li.tabIndex = 0;

        // Click/tap selecciona y pausa
        li.addEventListener('click', () => {
            setActive(li.dataset.k, li);
            pauseAndResume();
        });

        // Teclado accesible
        li.addEventListener('keydown', e => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                setActive(li.dataset.k, li);
                pauseAndResume();
            }
        });
    });

    // === Autoplay con pausa inteligente ===
    let idx = Math.max(0, items.findIndex(i => i.classList.contains('is-active')));
    if (idx < 0) idx = 0;



    function showByIndex(n) {
        idx = (n + items.length) % items.length;
        const li = items[idx];
        setActive(li.dataset.k, li);
    }

    const DUR = 5200;               // tiempo entre cambios
    const HOLD_AFTER_INTERACT = 6500; // cuánto esperar tras interacción
    let timer = null;
    let holdTimer = null;

    function start() {
        if (timer) return;
        timer = setInterval(() => showByIndex(idx + 1), DUR);
    }
    function stop() {
        if (!timer) return;
        clearInterval(timer);
        timer = null;
    }
    function pauseAndResume() {
        stop();
        if (holdTimer) clearTimeout(holdTimer);
        holdTimer = setTimeout(() => start(), HOLD_AFTER_INTERACT);
    }

    // Pausa cuando el usuario "está encima" o tocando
    // (mouse, touch o stylus con Pointer Events)
    track.addEventListener('mouseenter', stop);
    track.addEventListener('mouseleave', start);

    track.addEventListener('pointerdown', (e) => {
        const li = e.target.closest('.rail__item');
        if (!li) return;
        // Si tocaron/presionaron, mostramos ese y pausamos
        stop();
        setActive(li.dataset.k, li);
    });
    // Reanudamos un poco después de soltar/abortar el gesto
    ['pointerup', 'pointercancel', 'pointerleave'].forEach(ev => {
        track.addEventListener(ev, () => pauseAndResume());
    });

    // Pausa si la pestaña no está visible
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) stop(); else start();
    });

    // Pausa si el foco entra, reanuda cuando salga del track completo
    track.addEventListener('focusin', stop);
    track.addEventListener('focusout', (e) => {
        // Si el foco se va fuera del track, reanudamos
        if (!track.contains(e.relatedTarget)) pauseAndResume();
    });

    // Init
    const first = items[0];
    if (first) setActive(first.dataset.k, first);
    start();
})();


/* ============ TIMELINE (uno abierto) + ROTADORES ============ */
(() => {
    const timeline = document.querySelector('[data-oferta]');
    if (!timeline) return;

    // toggles (uno abierto a la vez)
    timeline.addEventListener('click', (e) => {
        const head = e.target.closest('.timeline__head');
        if (!head) return;
        const item = head.closest('.timeline__item');
        const isOpen = item.classList.contains('is-open');

        timeline.querySelectorAll('.timeline__item').forEach(i => i.classList.remove('is-open'));
        if (!isOpen) item.classList.add('is-open');

        setupRotators();
    });

    // rotadores
    const rotators = new WeakMap();

    function initRotator(el) {
        if (rotators.has(el)) return rotators.get(el);
        const slides = [...el.querySelectorAll('img')];
        let i = 0, t = null;
        const dur = Number(el.dataset.interval) || 4000;

        function show(n) {
            slides[i]?.classList.remove('is-active');
            i = (n + slides.length) % slides.length;
            slides[i]?.classList.add('is-active');
        }
        function start() {
            if (slides.length < 2 || t) return;
            slides[0].classList.add('is-active');
            t = setInterval(() => show(i + 1), dur);
        }
        function stop() {
            if (t) { clearInterval(t); t = null; }
        }

        el.addEventListener('mouseenter', stop);
        el.addEventListener('mouseleave', start);

        const api = { start, stop };
        rotators.set(el, api);
        return api;
    }

    function setupRotators() {
        document.querySelectorAll('.rotator').forEach(r => initRotator(r).stop());
        timeline.querySelectorAll('.timeline__item.is-open .rotator')
            .forEach(r => initRotator(r).start());
    }

    setupRotators();

    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            document.querySelectorAll('.rotator').forEach(r => initRotator(r).stop());
        } else {
            setupRotators();
        }
    });
})();




/* ==== Parallax sutil del medallón ==== */
(() => {
    const crest = document.querySelector('.pastoral__crest-glass');
    if (!crest) return;
    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduce) return;

    let raf = null;
    let tx = 0, ty = 0;

    function animate() {
        crest.style.transform = `translate3d(${tx}px, ${ty}px, 0)`;
        raf = null;
    }

    function onMove(e) {
        const vw = Math.max(window.innerWidth, 1);
        const vh = Math.max(window.innerHeight, 1);
        const px = ('touches' in e) ? e.touches[0].clientX : e.clientX;
        const py = ('touches' in e) ? e.touches[0].clientY : e.clientY;
        // amplitud pequeña para no distraer
        tx = (px / vw - .5) * 8;
        ty = (py / vh - .5) * 6;
        if (!raf) raf = requestAnimationFrame(animate);
    }

    window.addEventListener('mousemove', onMove, { passive: true });
    window.addEventListener('touchmove', onMove, { passive: true });
})();


/* btns.forEach((b, i) =>
    b.addEventListener('click', () => { setActive(i); index = i; restartHold(); })
); */

let index = 0, timer = null, holdTimer = null;
const DUR = 4000, HOLD = 5000;

function play() { if (timer) return; timer = setInterval(() => { index = (index + 1) % DATA.length; setActive(index); }, DUR); }
function stop() { if (!timer) return; clearInterval(timer); timer = null; }
function restart() { stop(); play(); }
function restartHold() {
    stop();
    if (holdTimer) clearTimeout(holdTimer);
    holdTimer = setTimeout(() => play(), HOLD);
}



/* =========================
   Scroll-Reveal + Lazy Init
   ========================= */
/* ===== Reveal on Scroll + Lazy helpers ===== */
(() => {
    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // 2.1) REVEAL: observar cualquier [data-reveal]
    const $els = [...document.querySelectorAll('[data-reveal]')];
    if (!reduce && $els.length) {
        const io = new IntersectionObserver((entries, obs) => {
            for (const e of entries) {
                if (!e.isIntersecting) continue;
                const el = e.target;
                // delay opcional (en ms) → variable CSS
                const d = Number(el.getAttribute('data-reveal-delay') || 0);
                if (d) el.style.setProperty('--rev-delay', `${d}ms`);
                el.classList.add('is-in');
                obs.unobserve(el);
            }
        }, { rootMargin: '0px 0px -10% 0px', threshold: 0.15 });
        $els.forEach(el => io.observe(el));
    } else {
        // sin animaciones
        $els.forEach(el => el.classList.add('is-in'));
    }

    // 2.2) LAZY IMG con data-src/srcset (complementa loading="lazy")
    const lazyImgs = [...document.querySelectorAll('img[data-src], img[data-srcset]')];
    if (lazyImgs.length) {
        const ioImg = new IntersectionObserver((entries, obs) => {
            for (const e of entries) {
                if (!e.isIntersecting) continue;
                const img = e.target;
                const src = img.getAttribute('data-src');
                const srcset = img.getAttribute('data-srcset');
                if (srcset) img.srcset = srcset;
                if (src) img.src = src;
                img.removeAttribute('data-src'); img.removeAttribute('data-srcset');
                obs.unobserve(img);
            }
        }, { rootMargin: '200px 0px', threshold: 0.01 });
        lazyImgs.forEach(i => ioImg.observe(i));
    }

    // 2.3) LAZY “background-image” (para tarjetas con imagen de fondo)
    const lazyBg = [...document.querySelectorAll('[data-bg]')];
    if (lazyBg.length) {
        const ioBg = new IntersectionObserver((entries, obs) => {
            for (const e of entries) {
                if (!e.isIntersecting) continue;
                const el = e.target;
                const url = el.getAttribute('data-bg');
                el.style.backgroundImage = `url('${url}')`;
                el.removeAttribute('data-bg');
                obs.unobserve(el);
            }
        }, { rootMargin: '200px 0px', threshold: 0.01 });
        lazyBg.forEach(el => ioBg.observe(el));
    }

    // 2.4) START/STOP de componentes pesados al entrar/salir (ejemplo)
    //    — si en el futuro quisieras iniciar un carrusel/contador sólo cuando se vea
    //    — ahora no es necesario porque tu slider/rotators ya autogestionan visibilidad.
})();


// Marca el embed como "cargado" para ocultar el skeleton
document.querySelectorAll('.video-embed iframe').forEach((f) => {
    f.addEventListener('load', () => {
        f.parentElement.classList.remove('is-loading');
        f.parentElement.classList.add('is-loaded');
    });
});

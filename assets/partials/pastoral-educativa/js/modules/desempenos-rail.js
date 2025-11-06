(() => {
    const DATA = {
        aprender: { n: 1, t: "Aprender a Aprender", intro: "El aprendizaje es un proceso continuo que despierta interés por descubrir, comprender y transformar la realidad.", pilares: ["Disciplina personal"], bullets: ["Organización del tiempo y hábitos de estudio.", "Responsabilidad y perseverancia en la excelencia académica y humana.", "Metacognición: planificar, monitorear y evaluar cómo aprendo."], cita: "La disciplina personal sostiene el proceso: ordena la jornada, fortalece la constancia y orienta a la excelencia." },
        conocer: { n: 2, t: "Aprender a Conocer", intro: "No solo adquirir información: buscamos comprensión profunda del mundo y del sentido de la vida.", pilares: ["Tarjeta de presentación personal"], bullets: ["Valores y actitudes con respeto y coherencia.", "Rigor intelectual con mirada sapiencial y sentido trascendente.", "Lectura crítica de la realidad, la cultura y la fe."], cita: "La 'tarjeta de presentación' se hace visible en un trato respetuoso y auténtico." },
        hacer: { n: 3, t: "Aprender a Hacer", intro: "La acción transforma el conocimiento en servicio al bien común.", pilares: ["Grado de servicio personal"], bullets: ["Proyectos con impacto solidario y justicia social.", "Trabajo colaborativo y liderazgo para el bien común.", "Cuidado de la Casa Común desde acciones concretas."], cita: "Los talentos se ponen al servicio: servir es la forma cristiana de liderar." },
        sentir: { n: 4, t: "Aprender a Sentir", intro: "Vivir con empatía, gratitud y sensibilidad ante el prójimo.", pilares: ["Prevención personal"], bullets: ["Cuidado de la integridad emocional y espiritual.", "Relaciones sanas y decisiones responsables.", "Educación afectiva para la paz interior."], cita: "La prevención personal guía un sentir que protege la vida y favorece vínculos sanos." },
        ser: { n: 5, t: "Aprender a Ser", intro: "Identidad cristiana y franciscana: descubrir el valor de ser hijo de Dios.", pilares: ["Disciplina personal", "Tarjeta de presentación personal"], bullets: ["Autenticidad y seguridad interior.", "Proyecto de vida con sentido, libertad y responsabilidad.", "Virtudes franciscanas: minoridad, fraternidad, paz."], cita: "Ser auténticos y coherentes: lo que vivimos, pensamos y expresamos se hace uno." },
        convivir: { n: 6, t: "Aprender a Convivir", intro: "La convivencia es el fruto visible de una educación integral.", pilares: ["Grado de servicio personal", "Prevención personal"], bullets: ["Fraternidad y cultura del buen trato.", "Resolución pacífica de conflictos y diálogo.", "Comunidades solidarias que reflejen el amor de Cristo."], cita: "La convivencia se aprende sirviendo y cuidando: paz que se hace gesto cotidiano." },
        integrar: { n: 7, t: "Integrar Fe, Cultura y Vida", intro: "Eje transversal del Modelo Educativo: el saber, iluminado por la fe, se vuelve sabiduría y proyecto de vida.", pilares: ["Disciplina", "Tarjeta", "Servicio", "Prevención"], bullets: ["Articula lo académico con lo humano-espiritual y la ciudadanía.", "Coherencia en trato, lenguaje y presencia.", "Saber orientado a la acción solidaria y al cuidado de la Casa Común.", "Hábitos y decisiones responsables para el bien propio y común."], cita: "Integrar fe, cultura y vida convierte el aprendizaje en sabiduría encarnada y servicio con sentido." }
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
    <blockquote>“${d.cita}”</blockquote>
  `;

    /* ===== Responsive mode detection ===== */
    const mql = matchMedia('(max-width: 700px)');
    let isMobile = mql.matches;
    mql.addEventListener('change', (e) => {
        isMobile = e.matches;
        cleanupMobile();
        if (!isMobile) {
            // restaurar panel derecho con el activo actual
            const current = items.find(i => i.classList.contains('is-active')) || items[0];
            if (current) setActiveDesktop(current.dataset.k, current);
            start(); // reactivar autoplay solo en desktop
        } else {
            stop(); // sin autoplay en móvil
            // abrir debajo del seleccionado (o el primero)
            const current = items.find(i => i.classList.contains('is-active')) || items[0];
            if (current) setActiveMobile(current.dataset.k, current, { scroll: false });
        }
    });

    /* ===== Desktop behaviour (rail + panel fijo) ===== */
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

    /* ===== Mobile behaviour (acordeón) ===== */
    const setActiveMobile = (k, li, opts = {}) => {
        const d = DATA[k]; if (!d) return;

        // Cerrar cualquier acordeón abierto
        cleanupMobile();

        // Marcar el item como abierto
        items.forEach(i => {
            const on = (i === li);
            i.classList.toggle('is-open', on);
            i.classList.toggle('is-active', on); // mantiene tu esquema de color
            i.setAttribute('aria-selected', on ? 'true' : 'false');
            i.setAttribute('aria-expanded', on ? 'true' : 'false');
        });

        // Insertar el detalle debajo del item
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

    /* ===== Event wiring ===== */
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

    /* ===== Autoplay sólo en escritorio ===== */
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

    /* ===== Init ===== */
    const first = items[0];
    if (isMobile) { if (first) setActiveMobile(first.dataset.k, first, { scroll: false }); stop(); }
    else { if (first) setActiveDesktop(first.dataset.k, first); start(); }
})();

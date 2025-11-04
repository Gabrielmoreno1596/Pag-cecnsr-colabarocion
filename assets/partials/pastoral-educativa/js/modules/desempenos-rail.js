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

    const setActive = (k, li) => {
        const d = DATA[k]; if (!d) return;
        detail.innerHTML = tpl(d);
        document.querySelector('.band--desempenos-rail')
            ?.style.setProperty('--border-left-color',
                getComputedStyle(document.documentElement).getPropertyValue('--rail-active-bg').trim() || '#7c0040');

        items.forEach(i => {
            const on = (i === li);
            i.classList.toggle('is-active', on);
            i.setAttribute('aria-selected', on ? 'true' : 'false');
        });
    };

    items.forEach(li => {
        li.tabIndex = 0;
        li.addEventListener('click', () => { setActive(li.dataset.k, li); pauseThenResume(); });
        li.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); setActive(li.dataset.k, li); pauseThenResume(); }
        });
    });

    // autoplay + pausas inteligentes
    let idx = Math.max(0, items.findIndex(i => i.classList.contains('is-active')));
    if (idx < 0) idx = 0;
    const showByIndex = (n) => { idx = (n + items.length) % items.length; const li = items[idx]; setActive(li.dataset.k, li); };

    const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
    const DUR = 5200, HOLD = 6500;
    let timer = null, holdTimer = null;

    const start = () => { if (reduce || timer) return; timer = setInterval(() => showByIndex(idx + 1), DUR); };
    const stop = () => { if (!timer) return; clearInterval(timer); timer = null; };
    const pauseThenResume = () => { stop(); if (holdTimer) clearTimeout(holdTimer); holdTimer = setTimeout(start, HOLD); };

    track.addEventListener('mouseenter', stop);
    track.addEventListener('mouseleave', start);
    track.addEventListener('pointerdown', (e) => {
        const li = e.target.closest('.rail__item'); if (!li) return;
        stop(); setActive(li.dataset.k, li);
    }, { passive: true });
    ['pointerup', 'pointercancel', 'pointerleave'].forEach(ev => {
        track.addEventListener(ev, pauseThenResume, { passive: true });
    });

    document.addEventListener('visibilitychange', () => document.hidden ? stop() : start());
    track.addEventListener('focusin', stop);
    track.addEventListener('focusout', (e) => { if (!track.contains(e.relatedTarget)) pauseThenResume(); });

    const first = items[0];
    if (first) setActive(first.dataset.k, first);
    start();
})();

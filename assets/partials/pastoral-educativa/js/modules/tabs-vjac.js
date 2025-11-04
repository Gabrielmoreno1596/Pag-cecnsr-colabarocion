(() => {
    const wrap = document.querySelector('[data-tabs="vjac"]');
    if (!wrap) return;
    const buttons = [...wrap.querySelectorAll('.tabs__btn')];
    const panels = [...wrap.querySelectorAll('.tabs__panel')];
    const ink = wrap.querySelector('.tabs__ink');

    const activate = (i) => {
        buttons.forEach((b, idx) => {
            const on = idx === i;
            b.classList.toggle('is-active', on);
            b.setAttribute('aria-selected', on ? 'true' : 'false');
            panels[idx].classList.toggle('is-active', on);
            panels[idx].hidden = !on;
        });
        if (ink) {
            const b = buttons[i];
            const r = b.getBoundingClientRect();
            const p = b.offsetParent?.getBoundingClientRect() || { left: 0 };
            ink.style.left = (r.left - p.left) + 'px';
            ink.style.width = r.width + 'px';
        }
    };

    buttons.forEach((btn, i) => btn.addEventListener('click', () => activate(i)));
    window.addEventListener('resize', () => {
        const i = buttons.findIndex(b => b.classList.contains('is-active'));
        if (i > -1) activate(i);
    });

    activate(0);
})();

document.addEventListener('DOMContentLoaded', async () => {
    // 1) Inyecta todos los parciales
    const anchors = document.querySelectorAll('[data-include]');
    await Promise.all([...anchors].map(async el => {
        const url = el.getAttribute('data-include');
        const res = await fetch(url, { credentials: 'same-origin' });
        if (!res.ok) return;
        const html = await res.text();
        el.outerHTML = html; // reemplaza el marcador por el contenido del parcial
    }));

    // 2) Después de inyectar, inicializa los comportamientos del header
    initHeaderBehaviors();

    // 3) Marca el link activo (opcional)
    markActiveLink();
});

function initHeaderBehaviors() {
    const nav = document.getElementById('main-nav');
    const btnBurger = document.getElementById('nav-toggle');
    if (btnBurger && nav) {
        btnBurger.addEventListener('click', () => {
            nav.classList.toggle('is-open');
        });
    }

    // Dropdowns accesibles
    document.querySelectorAll('.dropdown-toggle').forEach(btn => {
        const menu = document.getElementById(btn.getAttribute('aria-controls'));
        const toggle = () => {
            const open = btn.getAttribute('aria-expanded') === 'true';
            btn.setAttribute('aria-expanded', String(!open));
            if (menu) menu.hidden = open;
        };
        btn.addEventListener('click', toggle);
        btn.addEventListener('keydown', e => {
            if (e.key === 'Escape') { btn.setAttribute('aria-expanded', 'false'); if (menu) menu.hidden = true; btn.focus(); }
        });
        document.addEventListener('click', e => {
            if (!btn.closest('.dropdown')?.contains(e.target)) {
                btn.setAttribute('aria-expanded', 'false');
                if (menu) menu.hidden = true;
            }
        });
    });
}

function markActiveLink() {
    const here = location.pathname.replace(/\/+$/, ''); // sin trailing slash
    document.querySelectorAll('.main-nav a[href]').forEach(a => {
        const path = new URL(a.href).pathname.replace(/\/+$/, '');
        if (path && path === here) {
            a.setAttribute('aria-current', 'page');
            a.classList.add('is-active');
        }
    });
}

// assets/js/cecnsr-header.js
(() => {
    const BP = 992; // coincide con --cecnsr-h-bp
    const isMobile = () => window.innerWidth <= BP;

    const nav = document.getElementById('cecnsr-nav');
    const burger = document.getElementById('cecnsr-burger');
    const droptogs = Array.from(document.querySelectorAll('.cecnsr-dropdown__toggle'));

    function setBurger(open) {
        if (!burger) return;
        const i = burger.querySelector('i');
        burger.setAttribute('aria-expanded', String(open));
        if (i) {
            i.classList.toggle('fa-bars', !open);
            i.classList.toggle('fa-times', open);
        }
        document.documentElement.classList.toggle('cecnsr-no-scroll', open && isMobile());
    }

    function closeAllDropdowns() {
        document.querySelectorAll('.cecnsr-dropdown.is-open').forEach(dd => {
            dd.classList.remove('is-open');
            const icon = dd.querySelector('.cecnsr-dropdown__toggle i');
            if (icon) { icon.classList.remove('fa-caret-up'); icon.classList.add('fa-caret-down'); }
            const btn = dd.querySelector('.cecnsr-dropdown__toggle');
            if (btn) { btn.setAttribute('aria-expanded', 'false'); }
        });
    }

    // Burger toggle
    if (burger && nav) {
        burger.addEventListener('click', () => {
            if (!isMobile()) return;
            const open = !nav.classList.contains('is-active');
            nav.classList.toggle('is-active', open);
            setBurger(open);
            if (!open) closeAllDropdowns();
        });
    }

    // Dropdown toggles (móvil = acordeón; desktop = controlado por CSS :hover)
    droptogs.forEach(btn => {
        btn.addEventListener('click', (e) => {
            if (!isMobile()) return; // desktop: ignorar (hover)
            e.preventDefault();

            const dd = btn.closest('.cecnsr-dropdown');
            const currentlyOpen = dd.classList.contains('is-open');

            // acordeón
            document.querySelectorAll('.cecnsr-dropdown.is-open').forEach(other => {
                if (other !== dd) {
                    other.classList.remove('is-open');
                    const ic = other.querySelector('.cecnsr-dropdown__toggle i');
                    if (ic) { ic.classList.remove('fa-caret-up'); ic.classList.add('fa-caret-down'); }
                    const ob = other.querySelector('.cecnsr-dropdown__toggle');
                    if (ob) { ob.setAttribute('aria-expanded', 'false'); }
                }
            });

            dd.classList.toggle('is-open', !currentlyOpen);
            btn.setAttribute('aria-expanded', String(!currentlyOpen));
            const icon = btn.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-caret-down', currentlyOpen);
                icon.classList.toggle('fa-caret-up', !currentlyOpen);
            }
        });

        // Accesible: Enter/Espacio en móvil
        btn.addEventListener('keydown', (e) => {
            if (isMobile() && (e.key === 'Enter' || e.key === ' ')) {
                e.preventDefault(); btn.click();
            }
        });
    });

    // Cerrar al hacer click fuera
    document.addEventListener('click', (e) => {
        if (!isMobile()) return;
        const clickFuera = nav && !nav.contains(e.target) && burger && !burger.contains(e.target);
        if (clickFuera && nav.classList.contains('is-active')) {
            nav.classList.remove('is-active');
            setBurger(false);
            closeAllDropdowns();
        }
    });

    // Cerrar al seguir un enlace "final" en móvil
    nav?.querySelectorAll('a').forEach(a => {
        a.addEventListener('click', () => {
            if (!isMobile() || !nav.classList.contains('is-active')) return;
            if (a.closest('.cecnsr-dropdown') && a.classList.contains('cecnsr-dropdown__toggle')) return; // si fuera botón (aunque es <button>)

            nav.classList.remove('is-active');
            setBurger(false);
            closeAllDropdowns();
        });
    });

    // Reset al pasar a desktop
    let rTO;
    window.addEventListener('resize', () => {
        clearTimeout(rTO);
        rTO = setTimeout(() => {
            if (!isMobile()) {
                nav?.classList.remove('is-active');
                setBurger(false);
                closeAllDropdowns();
            }
        }, 120);
    });
})();

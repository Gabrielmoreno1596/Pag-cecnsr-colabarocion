// Selección de elementos
const nav = document.getElementById('main-nav');
const navToggle = document.getElementById('nav-toggle');
const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

// Punto de corte de pantalla (Debe coincidir con el @media de styles.css)
const MOBILE_BREAKPOINT = 992;

// 1. --- Botón de menú móvil principal (hamburguesa) ---
navToggle.addEventListener('click', () => {
    // Solo alterna la visibilidad del menú principal si estamos en móvil
    if (window.innerWidth <= MOBILE_BREAKPOINT) {
        nav.classList.toggle('active');

        // Opcional: Cierra todos los submenús al abrir/cerrar el menú principal
        dropdownToggles.forEach(toggle => {
            toggle.parentElement.classList.remove('open');
        });
    }
});

// 2. --- Submenús desplegables (Dropdowns) ---
dropdownToggles.forEach(toggle => {
    toggle.addEventListener('click', e => {


        if (window.innerWidth <= MOBILE_BREAKPOINT) {


            e.preventDefault();

            dropdownToggles.forEach(other => {
                if (other !== toggle) {
                    other.parentElement.classList.remove('open');
                }
            });
            const parentDropdown = toggle.parentElement;
            parentDropdown.classList.toggle('open');
        }

    });
});

// 3. --- Cerrar menú al hacer clic fuera (Solo en móvil) ---
document.addEventListener('click', (e) => {
    // Solo actúa si el menú móvil está activo
    if (nav.classList.contains('active')) {
        // Verifica si el clic fue fuera del menú de navegación y del botón de toggle
        if (!nav.contains(e.target) && !navToggle.contains(e.target)) {
            nav.classList.remove('active');

            // Cierra cualquier submenú que haya quedado abierto al mismo tiempo
            dropdownToggles.forEach(toggle => {
                toggle.parentElement.classList.remove('open');
            });
        }
    }
});
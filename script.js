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
        
        // CLAVE: Solo ejecuta la lógica de alternar clases si estamos en modo móvil o tablet
        if (window.innerWidth <= MOBILE_BREAKPOINT) {
            
            // Evita que el navegador siga el enlace del menú principal en móvil
            e.preventDefault();
            
            // Cierra otros submenús abiertos para tener solo uno activo a la vez
            dropdownToggles.forEach(other => {
                if(other !== toggle) {
                    other.parentElement.classList.remove('open');
                }
            });

            // Alterna la clase 'open' en el elemento padre <li>.dropdown
            const parentDropdown = toggle.parentElement;
            parentDropdown.classList.toggle('open');
        } 
        // En escritorio, el evento de click es ignorado, permitiendo que el CSS :hover funcione.
    });
});

// 3. --- Cerrar menú al hacer clic fuera (Solo en móvil) ---
document.addEventListener('click', (e) => {
    // Solo actúa si el menú móvil está activo
    if (nav.classList.contains('active')) {
        // Verifica si el clic fue fuera del menú de navegación y del botón de toggle
        if(!nav.contains(e.target) && !navToggle.contains(e.target)) {
            nav.classList.remove('active');
            
            // Cierra cualquier submenú que haya quedado abierto al mismo tiempo
            dropdownToggles.forEach(toggle => {
              toggle.parentElement.classList.remove('open');
            });
        }
    }
});
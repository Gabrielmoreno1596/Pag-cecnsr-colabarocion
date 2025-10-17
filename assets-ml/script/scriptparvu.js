document.addEventListener('DOMContentLoaded', function() {
    
    // =======================================================
    // [1] LÓGICA DEL MENÚ PRINCIPAL (HAMBURGUESA)
    // =======================================================
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.main-nav'); 
    const navLinks = document.querySelectorAll('.main-nav a'); 

    if (menuToggle && navMenu) { 
        menuToggle.addEventListener('click', () => {
            // 1. Alterna la clase 'active' en el menú principal
            navMenu.classList.toggle('active');

            // 2. Cambia el ícono (hamburguesa <-> X)
            const icon = menuToggle.querySelector('i');
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
            
            // 3. Cierra todos los submenús al abrir/cerrar el menú principal
            document.querySelectorAll('.dropdown.open').forEach(openDropdown => {
                openDropdown.classList.remove('open');
                // Restablece la rotación del ícono chevron si existe
                const iconToReset = openDropdown.querySelector('.dropdown-toggle i');
                if (iconToReset) {
                    iconToReset.style.transform = 'rotate(0deg)';
                }
            });
        });
    }

    // ==========================================================
    // [2] LÓGICA DEL SUBMENÚ (DROPDOWN) EN MÓVIL (CORREGIDO)
    // ==========================================================
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            
            // Solo se activa en la vista móvil (<= 900px, según tu CSS)
            if (window.innerWidth <= 900) { 
                e.preventDefault();
                
                // 1. Identificar el elemento <li> padre (.dropdown)
                const dropdownItem = this.closest('.dropdown');
                
                // 2. Comprobar si este menú desplegable ya estaba abierto
                const isCurrentlyOpen = dropdownItem.classList.contains('open');

                // 3. Cierra todos los menús desplegables abiertos (efecto acordeón)
                document.querySelectorAll('.dropdown.open').forEach(openDropdown => {
                    openDropdown.classList.remove('open'); 
                    // Restablece la rotación de los íconos (chevrones) de los menús cerrados
                    const iconToReset = openDropdown.querySelector('.dropdown-toggle i');
                    if (iconToReset) {
                        iconToReset.style.transform = 'rotate(0deg)';
                    }
                });
                
                // 4. Si el menú no estaba abierto ANTES del clic, ábrelo ahora.
                if (!isCurrentlyOpen) {
                    dropdownItem.classList.add('open');
                    
                    // 5. Gira el ícono del chevron para indicar que está abierto
                    const icon = this.querySelector('i');
                    if (icon) {
                        icon.style.transform = 'rotate(180deg)'; 
                    }
                }
            }
        });
    });

    // =======================================================
    // [3] CIERRE DEL MENÚ AL HACER CLICK EN UN ENLACE FINAL
    // =======================================================
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            // Verifica si es un enlace final (no un toggle) y si el menú está abierto en móvil
            if (window.innerWidth <= 900 && navMenu && navMenu.classList.contains('active')) {
                
                if (link.classList.contains('dropdown-toggle')) {
                    // Si es un toggle, no cierres, deja que la lógica del dropdown lo maneje
                    return; 
                }
                
                // Cierra el menú principal
                navMenu.classList.remove('active');
                
                // Restaura el ícono de la hamburguesa
                const icon = menuToggle.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
                
                // Cierra cualquier dropdown que haya quedado abierto
                document.querySelectorAll('.dropdown.open').forEach(openDropdown => {
                    openDropdown.classList.remove('open');
                });
            }
        });
    });
    
    // =======================================================
    // [4] LÓGICA DEL ACORDEÓN DE ADMISIÓN
    // =======================================================
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    
    accordionHeaders.forEach(header => {
        header.addEventListener('click', () => {
            const content = header.nextElementSibling;
            const icon = header.querySelector('.accordion-icon');
            
            // Cierra otros abiertos (para que solo uno esté visible a la vez)
            accordionHeaders.forEach(otherHeader => {
                const otherContent = otherHeader.nextElementSibling;
                if (otherHeader !== header && otherHeader.classList.contains('active')) {
                    otherHeader.classList.remove('active');
                    otherContent.classList.remove('show');
                    // Gira el icono de los cerrados a 0
                    otherHeader.querySelector('.accordion-icon').style.transform = 'rotate(0deg)';
                }
            });

            // Abre/Cierra el actual
            header.classList.toggle('active');
            content.classList.toggle('show');
            if (content.classList.contains('show')) {
                icon.style.transform = 'rotate(180deg)';
            } else {
                icon.style.transform = 'rotate(0deg)';
            }
        });
    });
});
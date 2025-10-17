document.addEventListener('DOMContentLoaded', function () {

    // =======================================================
    // [1] LÓGICA DEL MENÚ PRINCIPAL (HAMBURGUESA) - Selector actualizado
    // =======================================================
    /*     const menuToggle = document.querySelector('.nav-toggle');
        const navMenu = document.querySelector('.main-nav');
        const navLinks = document.querySelectorAll('.main-nav a');
    
        if (menuToggle && navMenu) {
            menuToggle.addEventListener('click', () => {
                navMenu.classList.toggle('active');
    
                // Cambia el ícono (hamburguesa <-> X)
                const icon = menuToggle.querySelector('i');
                icon.classList.toggle('fa-bars');
                icon.classList.toggle('fa-times');
    
                // Cierra todos los submenús al abrir/cerrar el menú principal
                document.querySelectorAll('.dropdown.open').forEach(openDropdown => {
                    openDropdown.classList.remove('open');
                    const iconToReset = openDropdown.querySelector('.dropdown-toggle i');
                    if (iconToReset) {
                        iconToReset.style.transform = 'rotate(0deg)';
                    }
                });
            });
        } */

    // ==========================================================
    // [2] LÓGICA DEL SUBMENÚ (DROPDOWN) EN MÓVIL (Clase 'open' en el padre)
    // ==========================================================
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function (e) {

            if (window.innerWidth <= 900) {
                e.preventDefault();

                const dropdownItem = this.closest('.dropdown');
                const isCurrentlyOpen = dropdownItem.classList.contains('open');

                // Cierra todos los menús desplegables abiertos (efecto acordeón)
                document.querySelectorAll('.dropdown.open').forEach(openDropdown => {
                    openDropdown.classList.remove('open');
                    const iconToReset = openDropdown.querySelector('.dropdown-toggle i');
                    if (iconToReset) {
                        // Restaura el icono a su estado original (flecha hacia abajo)
                        iconToReset.classList.remove('fa-caret-up');
                        iconToReset.classList.add('fa-caret-down');
                    }
                });

                // Si el menú no estaba abierto ANTES del clic, ábrelo ahora.
                if (!isCurrentlyOpen) {
                    dropdownItem.classList.add('open');

                    // Gira el ícono del chevron para indicar que está abierto
                    const icon = this.querySelector('i');
                    if (icon) {
                        icon.classList.remove('fa-caret-down');
                        icon.classList.add('fa-caret-up');
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
            if (window.innerWidth <= 900 && navMenu && navMenu.classList.contains('active')) {

                if (link.classList.contains('dropdown-toggle')) {
                    return;
                }

                navMenu.classList.remove('active');

                // Restaura el ícono de la hamburguesa
                const icon = menuToggle.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');

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

            // Cierra otros abiertos (efecto acordeón)
            accordionHeaders.forEach(otherHeader => {
                const otherContent = otherHeader.nextElementSibling;
                if (otherHeader !== header && otherHeader.classList.contains('active')) {
                    otherHeader.classList.remove('active');
                    otherContent.classList.remove('show');
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

    // =======================================================
    // [5] LÓGICA DE LAS PESTAÑAS (TABS) DE GRADOS
    // =======================================================
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const tabId = button.getAttribute('data-tab');

            // 1. Quita la clase 'active' de todos los botones y contenidos
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));

            // 2. Añade la clase 'active' al botón clickeado
            button.classList.add('active');

            // 3. Muestra el contenido correspondiente
            document.getElementById(tabId).classList.add('active');
        });
    });

    // Muestra el primer tab por defecto al cargar
    if (tabButtons.length > 0 && tabContents.length > 0) {
        tabButtons[0].classList.add('active');
        tabContents[0].classList.add('active');
    }
});
document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.querySelector('.nav-toggle');
    const mainNav = document.querySelector('.main-nav');
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    const tabButtons = document.querySelectorAll('.tab-button');

    // =========================================================================
    // === [1] CONTROL DEL MENÚ PRINCIPAL (MÓVIL) ===
    // =========================================================================

    if (navToggle && mainNav) {
        navToggle.addEventListener('click', function() {
            mainNav.classList.toggle('active'); // Alterna la visibilidad
            // Cambia el icono (hamburguesa <-> X)
            const icon = navToggle.querySelector('i');
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times'); 
            
            // Cierra cualquier submenú abierto al cerrar el menú principal
            if (!mainNav.classList.contains('active')) {
                 document.querySelectorAll('li.dropdown').forEach(li => {
                    li.classList.remove('open');
                });
            }
        });
    }

    // =========================================================================
    // === [2] CONTROL DE DROPDOWNS (Submenús) ===
    // =========================================================================

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            // Solo activa el comportamiento de click si estamos en modo móvil
            if (window.innerWidth < 993) {
                e.preventDefault(); 
                e.stopPropagation();

                const parentLi = this.closest('li.dropdown');
                
                // Cierra otros submenús si están abiertos
                document.querySelectorAll('li.dropdown').forEach(li => {
                    if (li !== parentLi && li.classList.contains('open')) {
                        li.classList.remove('open');
                    }
                });

                // Alterna el submenú actual (añade/quita la clase 'open')
                parentLi.classList.toggle('open');
            } else {
                 // En escritorio, solo prevenimos el enlace vacío para que el CSS hover funcione
                 e.preventDefault();
            }
        });
    });
    
    // Cierre del menú móvil y submenús al hacer clic fuera
    document.addEventListener('click', function(e) {
        // Cierre del menú hamburguesa si está activo
        if (mainNav && mainNav.classList.contains('active') && !mainNav.contains(e.target) && !navToggle.contains(e.target)) {
            mainNav.classList.remove('active');
            navToggle.querySelector('i').classList.add('fa-bars');
            navToggle.querySelector('i').classList.remove('fa-times');
        }
        
        // Cierra submenús en móvil si está activo
         if (window.innerWidth < 993) {
            document.querySelectorAll('li.dropdown.open').forEach(li => {
                if (!li.contains(e.target)) {
                    li.classList.remove('open');
                }
            });
        }
    });

    // =========================================================================
    // === [3] CONTROL DE ACORDEONES (Admisión) ===
    // =========================================================================

    accordionHeaders.forEach(header => {
        header.addEventListener('click', function() {
            // Cierra otros acordeones
            accordionHeaders.forEach(h => {
                if (h !== header && h.classList.contains('active')) {
                    h.classList.remove('active');
                    h.nextElementSibling.style.maxHeight = null;
                }
            });

            // Alterna el acordeón actual
            this.classList.toggle('active');
            const content = this.nextElementSibling;
            
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    });
    
    // =========================================================================
    // === [4] CONTROL DE TABS (Perfil del Estudiante) ===
    // =========================================================================

    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            const container = this.closest('.tabs-container');

            // Desactiva todos
            container.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
            container.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

            // Activa el seleccionado
            this.classList.add('active');
            document.getElementById(targetTab).classList.add('active');
        });
    });
});
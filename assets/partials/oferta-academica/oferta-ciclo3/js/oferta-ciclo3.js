document.addEventListener('DOMContentLoaded', function () {
    const navToggle = document.querySelector('.nav-toggle');
    const mainNav = document.querySelector('.main-nav');
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    const tabButtons = document.querySelectorAll('.tab-button');

    // =========================================================================
    // === [1] CONTROL DEL MENÚ PRINCIPAL (MÓVIL) ===
    // =========================================================================
    if (navToggle && mainNav) {
        navToggle.addEventListener('click', function () {
            mainNav.classList.toggle('active');

            const icon = navToggle.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-bars');
                icon.classList.toggle('fa-times');
            }

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
        toggle.addEventListener('click', function (e) {
            if (window.innerWidth < 993) {
                e.preventDefault();
                e.stopPropagation();

                const parentLi = this.closest('li.dropdown');

                document.querySelectorAll('li.dropdown').forEach(li => {
                    if (li !== parentLi && li.classList.contains('open')) {
                        li.classList.remove('open');
                    }
                });

                if (parentLi) {
                    parentLi.classList.toggle('open');
                }
            } else {
                // En escritorio evitamos que el enlace vacío haga scroll al top
                e.preventDefault();
            }
        });
    });

    // Cierre del menú móvil y submenús al hacer clic fuera
    document.addEventListener('click', function (e) {
        if (mainNav && navToggle &&
            mainNav.classList.contains('active') &&
            !mainNav.contains(e.target) &&
            !navToggle.contains(e.target)) {

            mainNav.classList.remove('active');
            const icon = navToggle.querySelector('i');
            if (icon) {
                icon.classList.add('fa-bars');
                icon.classList.remove('fa-times');
            }
        }

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
        header.addEventListener('click', function () {
            accordionHeaders.forEach(h => {
                if (h !== header && h.classList.contains('active')) {
                    h.classList.remove('active');
                    if (h.nextElementSibling) {
                        h.nextElementSibling.style.maxHeight = null;
                    }
                }
            });

            this.classList.toggle('active');
            const content = this.nextElementSibling;

            if (content) {
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            }
        });
    });

    // =========================================================================
    // === [4] CONTROL DE TABS (Perfil del Estudiante) ===
    // =========================================================================
    tabButtons.forEach(button => {
        button.addEventListener('click', function () {
            const targetTab = this.getAttribute('data-tab');
            const container = this.closest('.tabs-container');

            if (!container || !targetTab) return;

            container.querySelectorAll('.tab-button')
                .forEach(btn => btn.classList.remove('active'));
            container.querySelectorAll('.tab-content')
                .forEach(content => content.classList.remove('active'));

            this.classList.add('active');
            const targetContent = document.getElementById(targetTab);
            if (targetContent) {
                targetContent.classList.add('active');
            }
        });
    });
});

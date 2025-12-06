// assets/partials/oferta-academica/oferta-ciclo2/js/ciclo2-tabs-accordion.js

document.addEventListener('DOMContentLoaded', function () {
    // =======================================================
    // [1] LÓGICA DEL ACORDEÓN DE ADMISIÓN
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
                    const otherIcon = otherHeader.querySelector('.accordion-icon');
                    if (otherIcon) {
                        otherIcon.style.transform = 'rotate(0deg)';
                    }
                }
            });

            // Abre/Cierra el actual
            header.classList.toggle('active');
            content.classList.toggle('show');
            if (content.classList.contains('show')) {
                if (icon) icon.style.transform = 'rotate(180deg)';
            } else {
                if (icon) icon.style.transform = 'rotate(0deg)';
            }
        });
    });

    // =======================================================
    // [2] LÓGICA DE LAS PESTAÑAS (TABS) DE GRADOS
    // =======================================================
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const tabId = button.getAttribute('data-tab');

            // 1. Quita 'active' de todos
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));

            // 2. Activa el botón actual
            button.classList.add('active');

            // 3. Muestra el contenido correspondiente
            const target = document.getElementById(tabId);
            if (target) target.classList.add('active');
        });
    });

    // Tab por defecto (por si el HTML no lo deja ya activo)
    if (tabButtons.length > 0 && tabContents.length > 0) {
        if (!document.querySelector('.tab-button.active')) {
            tabButtons[0].classList.add('active');
            tabContents[0].classList.add('active');
        }
    }
});

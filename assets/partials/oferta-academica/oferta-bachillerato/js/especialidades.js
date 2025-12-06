document.addEventListener('DOMContentLoaded', () => {

    // ============================================================
    // [A] HEADER MÓVIL / DROPDOWNS (seguro, no invasivo)
    // ============================================================
    const navToggle = document.querySelector('.nav-toggle');
    const mainNav = document.querySelector('.main-nav');
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    if (navToggle && mainNav) {
        navToggle.addEventListener('click', function () {
            mainNav.classList.toggle('active');

            const icon = this.querySelector('i');
            if (icon) {
                icon.classList.toggle('fa-bars');
                icon.classList.toggle('fa-times');
            }
        });
    }

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function (e) {
            if (window.innerWidth <= 900) {
                e.preventDefault();
                const dropdown = this.closest('.dropdown');
                if (!dropdown) return;

                document.querySelectorAll('.dropdown.open').forEach(d => {
                    if (d !== dropdown) d.classList.remove('open');
                });

                dropdown.classList.toggle('open');
            }
        });
    });

    // ============================================================
    // [B] CARRUSEL (manual)
    // ============================================================
    function initCarousel(container) {
        if (!container) return;

        const slides = container.querySelectorAll('.carousel-slide');
        const prevButton = container.querySelector('.prev');
        const nextButton = container.querySelector('.next');
        const indicatorsContainer = container.querySelector('.carousel-indicators');
        let currentIndex = 0;

        if (!slides.length) return;

        if (slides.length <= 1) {
            if (prevButton) prevButton.style.display = 'none';
            if (nextButton) nextButton.style.display = 'none';
            if (indicatorsContainer) indicatorsContainer.style.display = 'none';
            return;
        }

        if (indicatorsContainer) {
            indicatorsContainer.innerHTML = '';
            slides.forEach((_, index) => {
                const indicator = document.createElement('div');
                indicator.classList.add('indicator');
                if (index === 0) indicator.classList.add('active');
                indicator.addEventListener('click', () => showSlide(index));
                indicatorsContainer.appendChild(indicator);
            });
        }

        const indicators = container.querySelectorAll('.indicator');

        function showSlide(index) {
            if (index >= slides.length) currentIndex = 0;
            else if (index < 0) currentIndex = slides.length - 1;
            else currentIndex = index;

            slides.forEach(s => s.classList.remove('active'));
            indicators.forEach(i => i.classList.remove('active'));

            slides[currentIndex].classList.add('active');
            if (indicators[currentIndex]) indicators[currentIndex].classList.add('active');
        }

        if (prevButton) prevButton.addEventListener('click', () => showSlide(currentIndex - 1));
        if (nextButton) nextButton.addEventListener('click', () => showSlide(currentIndex + 1));

        showSlide(currentIndex);
    }

    // ============================================================
    // [C] TABS DE ESPECIALIDADES
    // ============================================================
    const specButtons = document.querySelectorAll('.specs-tab-buttons .spec-button');
    const specsWrapper = document.querySelector('.specs-tab-content-wrapper');

    if (specButtons.length && specsWrapper) {
        specButtons.forEach(button => {
            button.addEventListener('click', function () {
                const target = this.getAttribute('data-spec');

                specButtons.forEach(b => b.classList.remove('active'));
                specsWrapper.querySelectorAll('.spec-content').forEach(c => c.classList.remove('active'));

                this.classList.add('active');
                const activeContent = document.getElementById(target);

                if (activeContent) {
                    activeContent.classList.add('active');
                    const carousel = activeContent.querySelector('.carousel-container');
                    if (carousel) initCarousel(carousel);
                }
            });
        });

        // Inicializa la primera
        specButtons[0].click();
    }
});

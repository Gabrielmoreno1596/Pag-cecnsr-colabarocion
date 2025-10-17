document.addEventListener('DOMContentLoaded', function() {
    
    console.log("Script CECNSR cargado correctamente. Iniciando interactividad...");
    
    // =========================================================================
    // === FUNCIONALIDAD GLOBAL DE CARRUSEL (SOLO MANUAL - POR BOTONES) ===
    // =========================================================================
    function initCarousel(container) {
        // Asegúrate de limpiar cualquier temporizador si existiera por un intento anterior
        if (container.autoSlideInterval) {
            clearInterval(container.autoSlideInterval);
            container.autoSlideInterval = null;
        }
        
        const slides = container.querySelectorAll('.carousel-slide');
        const prevButton = container.querySelector('.prev');
        const nextButton = container.querySelector('.next');
        const indicatorsContainer = container.querySelector('.carousel-indicators');
        let currentIndex = 0;

        if (slides.length <= 1) {
            // Ocultar botones e indicadores si no hay suficientes slides
            if(prevButton) prevButton.style.display = 'none';
            if(nextButton) nextButton.style.display = 'none';
            if(indicatorsContainer) indicatorsContainer.style.display = 'none';
            return; 
        } else {
             // Asegurarse de que los botones estén visibles si hay slides
            if(prevButton) prevButton.style.display = 'block';
            if(nextButton) nextButton.style.display = 'block';
            if(indicatorsContainer) indicatorsContainer.style.display = 'flex'; // Usamos flex según el CSS
        }

        // Crea los indicadores
        indicatorsContainer.innerHTML = '';
        slides.forEach((_, index) => {
            const indicator = document.createElement('div');
            indicator.classList.add('indicator');
            if (index === 0) indicator.classList.add('active');
            
            indicator.addEventListener('click', () => {
                showSlide(index);
            });
            indicatorsContainer.appendChild(indicator);
        });
        const indicators = container.querySelectorAll('.indicator');


        function showSlide(index) {
            // Lógica para el movimiento circular
            if (index >= slides.length) {
                currentIndex = 0;
            } else if (index < 0) {
                currentIndex = slides.length - 1;
            } else {
                currentIndex = index;
            }

            // Ocultar todas las slides y desactivar indicadores
            slides.forEach(slide => slide.classList.remove('active'));
            indicators.forEach(ind => ind.classList.remove('active'));

            // Mostrar la slide actual y activar el indicador
            slides[currentIndex].classList.add('active');
            indicators[currentIndex].classList.add('active');
        }

        // Event Listeners para botones (SOLO AVANCE MANUAL)
        prevButton.addEventListener('click', () => {
            showSlide(currentIndex - 1);
        });
        nextButton.addEventListener('click', () => {
            showSlide(currentIndex + 1);
        });

        // Inicializar mostrando la primera slide al cargar la pestaña
        showSlide(currentIndex);
    }
    
    // =========================================================================
    // === [1] MANEJO DEL MENÚ MÓVIL (HAMBURGUESA) ===
    // =========================================================================
    const navToggle = document.querySelector('.nav-toggle');
    const mainNav = document.querySelector('.main-nav');

    if (navToggle && mainNav) {
        navToggle.addEventListener('click', function() {
            mainNav.classList.toggle('active');
            
            const icon = this.querySelector('i');
            if (mainNav.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    }

    // =========================================================================
    // === [2] MANEJO DE DROPDOWNS (SUBMENÚS) EN MÓVIL ===
    // =========================================================================
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            if (window.innerWidth <= 900) {
                e.preventDefault(); 

                const dropdown = this.closest('.dropdown');
                
                document.querySelectorAll('.dropdown.open').forEach(openDropdown => {
                    if (openDropdown !== dropdown) {
                        openDropdown.classList.remove('open');
                        const otherIcon = openDropdown.querySelector('.fa-caret-down');
                        if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
                    }
                });

                dropdown.classList.toggle('open');

                const icon = this.querySelector('.fa-caret-down');
                if (icon) {
                    icon.style.transform = dropdown.classList.contains('open') ? 'rotate(180deg)' : 'rotate(0deg)';
                }
            }
        });
    });

    // =========================================================================
    // === [3] TABS DE ESPECIALIDADES (INTEGRACIÓN DEL CARRUSEL MANUAL) ===
    // =========================================================================
    const specButtons = document.querySelectorAll('.specs-tab-buttons .spec-button');
    const specsTabContentWrapper = document.querySelector('.specs-tab-content-wrapper');

    if (specButtons.length > 0 && specsTabContentWrapper) {
        
        specButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetSpec = this.getAttribute('data-spec');
                
                // 1. Desactivar todos los botones y contenidos
                specButtons.forEach(btn => btn.classList.remove('active'));
                
                specsTabContentWrapper.querySelectorAll('.spec-content').forEach(content => {
                    content.classList.remove('active');
                });
                
                // 2. Activar el botón y el contenido seleccionado
                this.classList.add('active');
                const activeContent = document.getElementById(targetSpec);
                
                if (activeContent) {
                    activeContent.classList.add('active');
                    
                    // ===========================================================
                    // === INICIALIZACIÓN DEL CARRUSEL DENTRO DE LA PESTAÑA ===
                    // ===========================================================
                    const carouselContainer = activeContent.querySelector('.carousel-container');
                    if (carouselContainer) {
                        // Llamar a la función de inicialización del carrusel específico
                        initCarousel(carouselContainer); 
                    }
                } else {
                    console.error("Error: No se encontró el contenido para el ID:", targetSpec);
                }
            });
        });
        
        // 3. Inicializar: Activa el primer carrusel y la primera tab al cargar
        if (specButtons.length > 0) {
             specButtons[0].click();
        }
    }


    // =========================================================================
    // === [4] TABS DE PERFIL (Para Perfil del Estudiante) ===
    // =========================================================================
    const profileTabs = document.querySelectorAll('.tabs-buttons .tab-button');
    const tabsContainer = document.querySelector('.tabs-container');

    if (profileTabs.length > 0 && tabsContainer) {
        profileTabs.forEach(button => {
            button.addEventListener('click', function() {
                const targetTab = this.getAttribute('data-tab');
                
                profileTabs.forEach(btn => btn.classList.remove('active'));
                tabsContainer.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });
                
                this.classList.add('active');
                const activeContent = document.getElementById(targetTab);
                if (activeContent) {
                    activeContent.classList.add('active');
                }
            });
        });
        
        // Inicializar: Activa la primera tab al cargar
        if (profileTabs.length > 0) {
             profileTabs[0].click();
        }
    }


    // =========================================================================
    // === [5] ACORDEONES (SECCIÓN DE ADMISIÓN) ===
    // =========================================================================
    const accordionHeaders = document.querySelectorAll('.accordion-header');

    if (accordionHeaders.length > 0) {
        accordionHeaders.forEach(header => {
            header.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const icon = this.querySelector('.fa-chevron-down');

                // Cierra otros acordeones
                document.querySelectorAll('.accordion-content.active').forEach(openContent => {
                    if (openContent !== content) {
                        openContent.classList.remove('active');
                        openContent.style.maxHeight = null;
                        const otherHeader = openContent.previousElementSibling;
                        otherHeader.classList.remove('active');
                        const otherIcon = otherHeader.querySelector('.fa-chevron-down');
                        if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
                    }
                });

                // Alterna el acordeón actual
                this.classList.toggle('active');
                content.classList.toggle('active');

                // Manejo de la altura y rotación de icono
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    if (icon) {
                        icon.style.transform = 'rotate(0deg)';
                    }
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                    if (icon) {
                        icon.style.transform = 'rotate(180deg)';
                    }
                }
            });
        });
    }

});
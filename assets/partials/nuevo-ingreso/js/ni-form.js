document.addEventListener('DOMContentLoaded', () => {
    // --- existente para el formulario (no tocar) ---
    const form = document.querySelector('.ni-form form');
    if (form) {
        form.addEventListener('submit', (e) => {
            if (form.website && form.website.value.trim() !== '') {
                e.preventDefault();
                return false;
            }
        });
        const tel = document.getElementById('ni-telefono');
        if (tel) {
            tel.addEventListener('blur', () => {
                tel.value = tel.value.replace(/\s{2,}/g, ' ').trim();
            });
        }
    }

    // --- HERO SLIDER (Ken Burns + Fade) ---
    // --- HERO SLIDER (Ken Burns + Fade + foco X/Y) ---
    const track = document.querySelector('.ni-hero__track[data-kenburns]');
    if (track) {
        const slides = Array.from(track.querySelectorAll('.ni-hero__slide'));
        if (slides.length > 1) {
            const interval = parseInt(track.dataset.interval || '6000', 10);
            const zoom = parseFloat(track.dataset.zoom || '1.08');

            const setZoomDuration = (el, ms) => {
                // CSS var para el keyframe
                el.style.setProperty('--ni-zoom-duration', `${ms}ms`);
                const img = el.querySelector('img');
                if (img) img.style.animationDuration = `${ms}ms`; // fallback
            };

            const applyFocalPoint = (el) => {
                const px = el.dataset.posX || '50%';
                const py = el.dataset.posY || '50%';
                // Aplicamos en el slide y en la imagen
                el.style.setProperty('--pos-x', px);
                el.style.setProperty('--pos-y', py);
                const img = el.querySelector('img');
                if (img) {
                    img.style.setProperty('--pos-x', px);
                    img.style.setProperty('--pos-y', py);
                }
            };

            let index = 0;
            const setActive = (nextIndex) => {
                slides.forEach(s => s.classList.remove('is-active', 'is-zooming'));

                const next = slides[nextIndex];
                applyFocalPoint(next);          // ← centra el encuadre por slide
                setZoomDuration(next, interval);

                next.classList.add('is-active', 'is-zooming');
                index = nextIndex;
            };

            const nextSlide = () => setActive((index + 1) % slides.length);

            // init
            setActive(0);
            let timer = setInterval(nextSlide, interval);

            const slider = document.querySelector('.ni-hero__slider');
            if (slider) {
                slider.addEventListener('mouseenter', () => timer && clearInterval(timer));
                slider.addEventListener('mouseleave', () => timer = setInterval(nextSlide, interval));
            }
        }
    }

});

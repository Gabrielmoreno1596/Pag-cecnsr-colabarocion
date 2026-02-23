/**
 * Integración — HERO slider (crossfade)
 * - Respeta prefers-reduced-motion
 * - Pausa al hover
 * - Ahorra batería cuando la pestaña está oculta
 * - Actualiza --header-h para cálculos de altura
 */
(() => {
  // --header-h (para min-height del hero, si lo usas)
  const header = document.querySelector(".main-header");
  const setHeaderH = () => {
    if (!header) return;
    document.documentElement.style.setProperty("--header-h", header.offsetHeight + "px");
  };
  window.addEventListener("load", setHeaderH, { once: true });
  window.addEventListener("resize", setHeaderH);

  // Slider
  const prefersReduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  const hero = document.querySelector(".int-hero");
  const bg = document.querySelector(".int-hero__bg");
  if (!hero || !bg) return;

  const slides = bg.querySelectorAll(".slide");
  const sources = (window.CECNSR_INTEGRACION_HERO_IMAGES || []).filter(Boolean);

  if (prefersReduce || sources.length < 2 || slides.length < 2) {
    // dejar 1era imagen ya puesta en HTML
    return;
  }

  const INTERVAL_MS = 6000;
  let idx = 0;
  let timer = null;

  // Preload
  const cache = new Set();
  const preload = (src) => {
    if (!src || cache.has(src)) return;
    const img = new Image();
    img.src = src;
    cache.add(src);
  };

  // Asegura primera imagen + precarga la siguiente
  slides[0].style.backgroundImage = `url('${sources[0]}')`;
  preload(sources[1]);

  function next() {
    const nextIdx = (idx + 1) % sources.length;

    const visible = bg.querySelector(".slide.is-on") || slides[0];
    const hidden = Array.from(slides).find((s) => s !== visible) || slides[1];

    hidden.style.backgroundImage = `url('${sources[nextIdx]}')`;

    visible.classList.remove("is-on");
    hidden.classList.add("is-on");

    idx = nextIdx;
    preload(sources[(idx + 1) % sources.length]);
  }

  function start() {
    stop();
    timer = setInterval(next, INTERVAL_MS);
  }

  function stop() {
    if (timer) clearInterval(timer);
    timer = null;
  }

  document.addEventListener("visibilitychange", () => {
    if (document.hidden) stop();
    else start();
  });

  hero.addEventListener("mouseenter", stop);
  hero.addEventListener("mouseleave", start);

  start();

  window.CECNSRHeroSlider = { next, start, stop };
})();

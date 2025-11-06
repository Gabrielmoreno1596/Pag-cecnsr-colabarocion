// Lee la versión inyectada desde HTML (fallback: timestamp)
const V = (window.__ASSET_VER || Date.now()).toString();
const suf = `?v=${encodeURIComponent(V)}`;

// Módulos del sitio (manten el orden si hay dependencias)
const mods = [
    './modules/header-offset.js',
    './modules/smooth-scroll.js',
    './modules/lightbox.js',
    './modules/hero.js',
    './modules/tabs-vjac.js',
    './modules/mision-aside.js',
    './modules/diagramas-lightbox.js',
    './modules/desempenos-rail.js',
    './modules/timeline-rotators.js',
    './modules/crest-parallax.js',
    './modules/reveal-lazy.js',
    './modules/video-embed.js',
    './modules/galeria-lightbox.js',
];

// Carga todos los módulos con sufijo de versión (cache-busting)
(async () => {
    for (const m of mods) {
        try { await import(`${m}${suf}`); } catch (e) { console.error('Import fail:', m, e); }
    }
})();

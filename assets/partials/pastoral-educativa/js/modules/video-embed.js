document.querySelectorAll('.video-embed iframe').forEach((f) => {
    f.addEventListener('load', () => {
        f.parentElement.classList.remove('is-loading');
        f.parentElement.classList.add('is-loaded');
    }, { passive: true });
});

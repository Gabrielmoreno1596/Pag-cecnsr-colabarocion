(() => {
    const docStyle = document.documentElement.style;

    const findHeader = () =>
        document.querySelector('[data-header]') ||
        document.querySelector('.site-header') ||
        document.querySelector('header');

    const isFixedOrSticky = (el) => {
        if (!el) return false;
        const pos = getComputedStyle(el).position;
        return pos === 'fixed' || pos === 'sticky';
    };

    const setHeroOffset = () => {
        const header = findHeader();
        const h = header && isFixedOrSticky(header) ? header.offsetHeight : 0;
        docStyle.setProperty('--header-h', (h || 0) + 'px');
    };

    let ro;
    const observeHeader = () => {
        const header = findHeader();
        if (!header || !('ResizeObserver' in window)) return;
        if (ro) ro.disconnect();
        ro = new ResizeObserver(setHeroOffset);
        ro.observe(header);
    };

    window.addEventListener('DOMContentLoaded', () => { setHeroOffset(); observeHeader(); });
    ['load', 'resize', 'orientationchange'].forEach(ev => window.addEventListener(ev, setHeroOffset));
})();

document.addEventListener('DOMContentLoaded', () => {
    const headers = document.querySelectorAll('#admision .accordion-header');

    if (!headers.length) return;

    headers.forEach(header => {
        header.addEventListener('click', function () {
            const content = this.nextElementSibling;

            // Cierra otros
            headers.forEach(h => {
                if (h !== this) {
                    h.classList.remove('active');
                    const c = h.nextElementSibling;
                    if (c) c.style.maxHeight = null;
                }
            });

            this.classList.toggle('active');

            if (!content) return;

            if (content.style.maxHeight) {
                content.style.maxHeight = null;
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    });
});

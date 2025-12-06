document.addEventListener("DOMContentLoaded", () => {
    const container = document.querySelector('[data-accordion="ciclo1"]');
    if (!container) return;

    const headers = container.querySelectorAll(".accordion-header");

    headers.forEach(header => {
        header.addEventListener("click", () => {
            const content = header.nextElementSibling;
            if (!content || !content.classList.contains("accordion-content")) return;

            // Cierra otros
            headers.forEach(other => {
                const otherContent = other.nextElementSibling;
                if (other !== header && other.classList.contains("active")) {
                    other.classList.remove("active");
                    if (otherContent) otherContent.classList.remove("show");
                    const otherIcon = other.querySelector(".accordion-icon");
                    if (otherIcon) otherIcon.style.transform = "rotate(0deg)";
                }
            });

            // Toggle actual
            header.classList.toggle("active");
            content.classList.toggle("show");

            const icon = header.querySelector(".accordion-icon");
            if (icon) {
                icon.style.transform = content.classList.contains("show")
                    ? "rotate(180deg)"
                    : "rotate(0deg)";
            }
        });
    });
});

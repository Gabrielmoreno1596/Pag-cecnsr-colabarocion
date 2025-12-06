document.addEventListener("DOMContentLoaded", () => {
    const headers = document.querySelectorAll("#admision .accordion-header");

    if (!headers.length) return;

    headers.forEach((header) => {
        header.addEventListener("click", () => {
            const content = header.nextElementSibling;
            const icon = header.querySelector(".accordion-icon");

            // Cerrar otros
            headers.forEach((other) => {
                const otherContent = other.nextElementSibling;
                const otherIcon = other.querySelector(".accordion-icon");

                if (other !== header && other.classList.contains("active")) {
                    other.classList.remove("active");
                    otherContent.classList.remove("show");
                    if (otherIcon) otherIcon.style.transform = "rotate(0deg)";
                }
            });

            // Toggle actual
            header.classList.toggle("active");
            content.classList.toggle("show");

            if (icon) {
                icon.style.transform = content.classList.contains("show")
                    ? "rotate(180deg)"
                    : "rotate(0deg)";
            }
        });
    });
});

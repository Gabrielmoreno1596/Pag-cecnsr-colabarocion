document.addEventListener("DOMContentLoaded", () => {
    // Lógica del acordeón de admisión (solo para esta página)
    const accordionHeaders = document.querySelectorAll(".accordion-header");

    accordionHeaders.forEach((header) => {
        header.addEventListener("click", () => {
            const content = header.nextElementSibling;
            const icon = header.querySelector(".accordion-icon");

            // Cerrar otros
            accordionHeaders.forEach((otherHeader) => {
                const otherContent = otherHeader.nextElementSibling;
                if (otherHeader !== header && otherHeader.classList.contains("active")) {
                    otherHeader.classList.remove("active");
                    otherContent.classList.remove("show");
                    const otherIcon = otherHeader.querySelector(".accordion-icon");
                    if (otherIcon) otherIcon.style.transform = "rotate(0deg)";
                }
            });

            // Abrir/cerrar actual
            header.classList.toggle("active");
            content.classList.toggle("show");

            if (content.classList.contains("show")) {
                icon.style.transform = "rotate(180deg)";
            } else {
                icon.style.transform = "rotate(0deg)";
            }
        });
    });

    console.log("Parvularia: acordeón inicializado");
});

document.addEventListener("DOMContentLoaded", () => {
    const container = document.querySelector('[data-tabs="ciclo1"]');
    if (!container) return;

    const buttons = container.querySelectorAll(".tab-button");
    const contents = container.querySelectorAll(".tab-content");

    buttons.forEach(btn => {
        btn.addEventListener("click", () => {
            const tabId = btn.getAttribute("data-tab");
            if (!tabId) return;

            buttons.forEach(b => b.classList.remove("active"));
            contents.forEach(c => c.classList.remove("active"));

            btn.classList.add("active");
            const target = container.querySelector(`#${tabId}`);
            if (target) target.classList.add("active");
        });
    });
});

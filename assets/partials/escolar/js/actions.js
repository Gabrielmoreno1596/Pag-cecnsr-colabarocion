(function (window) {
  const School = (window.CECNSRSchool = window.CECNSRSchool || {});

  School.actions = {
    init() {
      document.querySelectorAll(".js-school-print").forEach((btn) => {
        btn.addEventListener("click", () => window.print());
      });

      const wrapper = document.querySelector(".school-actions");
      const checkbox = document.querySelector(".school-actions-toggle-checkbox");
      const toggle = document.querySelector(".school-actions-toggle");
      if (wrapper && checkbox && toggle) {
        if (!toggle.querySelector(".icon")) {
          toggle.innerHTML = '<span class="icon" aria-hidden="true">&#9650;</span><span class="label">Ver acciones</span>';
        }

        const icon = toggle.querySelector(".icon");
        const label = toggle.querySelector(".label");

        const sync = () => {
          const open = checkbox.checked;
          wrapper.classList.toggle("is-open", open);
          toggle.classList.toggle("is-open", open);
          toggle.classList.toggle("is-closed", !open);
          if (open) {
            icon.textContent = "▼";
            label.textContent = "Cerrar acciones";
            toggle.setAttribute("aria-label", "Cerrar acciones");
          } else {
            icon.textContent = "▲";
            label.textContent = "Ver acciones";
            toggle.setAttribute("aria-label", "Ver acciones");
          }
        };

        toggle.addEventListener("click", (ev) => {
          ev.preventDefault();
          checkbox.checked = !checkbox.checked;
          checkbox.dispatchEvent(new Event("change", { bubbles: true }));
          sync();
        });

        checkbox.addEventListener("change", sync);
        sync();
      }
    },
  };
})(window);

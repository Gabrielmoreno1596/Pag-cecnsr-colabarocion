(function (window) {
  const School = (window.CECNSRSchool = window.CECNSRSchool || {});

  School.bachDropdown = {
    init() {
      const dropdown = document.querySelector(".school-levelbar-dd.bach-dd");
      if (!dropdown) return;

      const items = Array.from(dropdown.querySelectorAll(".bach-dd__item"));
      if (!items.length) return;

      const closeAll = () => {
        items.forEach((item) => {
          item.classList.remove("is-open");
          const btn = item.querySelector(".bach-dd__year");
          const sub = item.querySelector(".bach-dd__sub");
          if (btn) btn.setAttribute("aria-expanded", "false");
          if (sub) sub.setAttribute("aria-hidden", "true");
        });
      };

      const openItem = (item) => {
        closeAll();
        item.classList.add("is-open");
        const btn = item.querySelector(".bach-dd__year");
        const sub = item.querySelector(".bach-dd__sub");
        if (btn) btn.setAttribute("aria-expanded", "true");
        if (sub) sub.setAttribute("aria-hidden", "false");
      };

      // Estado inicial: todos cerrados (puedes activar el año activo más adelante si se desea)
      closeAll();

      // Toggle al clic en el año
      items.forEach((item) => {
        const btn = item.querySelector(".bach-dd__year");
        if (!btn) return;
        btn.addEventListener("click", (event) => {
          event.preventDefault();
          event.stopPropagation();
          const isOpen = item.classList.contains("is-open");
          closeAll();
          if (!isOpen) {
            openItem(item);
          }
        });
      });

      // Clic fuera del dropdown Bachillerato
      document.addEventListener("click", (event) => {
        if (!dropdown.contains(event.target)) {
          closeAll();
        }
      });

      // Cambio de nivel: cerrar el submenú de años
      const levelButtons = Array.from(
        document.querySelectorAll(".school-levelbar-btn")
      );
      levelButtons.forEach((btn) => {
        btn.addEventListener("click", () => {
          const item = btn.closest(".school-levelbar-item");
          if (!item || item.dataset.level !== "Bachillerato") {
            closeAll();
          }
        });
      });

      // Cerrar al interactuar con backdrop o X en mobile
      const backdrop = document.querySelector(".school-levelbar-backdrop");
      const closeBtn = document.querySelector(".school-levelbar-mobile-close");
      if (backdrop) {
        backdrop.addEventListener("click", closeAll);
      }
      if (closeBtn) {
        closeBtn.addEventListener("click", closeAll);
      }

      // Escape cierra el submenú
      document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
          closeAll();
        }
      });
    },
  };
})(window);

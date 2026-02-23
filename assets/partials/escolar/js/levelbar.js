(function (window) {
  const School = (window.CECNSRSchool = window.CECNSRSchool || {});

  School.levelbar = {
    init() {
      const items = Array.from(
        document.querySelectorAll(".school-levelbar-item")
      );
      if (!items.length) return;

      const closeAll = () => {
        items.forEach((item) => {
          const dd = item.querySelector(".school-levelbar-dd");
          const btn = item.querySelector(".school-levelbar-btn");
          if (dd) dd.classList.remove("is-open");
          if (btn) btn.setAttribute("aria-expanded", "false");
        });
      };

      const openItem = (item) => {
        closeAll();
        const dd = item.querySelector(".school-levelbar-dd");
        const btn = item.querySelector(".school-levelbar-btn");
        if (dd) dd.classList.add("is-open");
        if (btn) btn.setAttribute("aria-expanded", "true");
      };

      // Abrir por defecto el ciclo marcado como .is-active (grado actual)
      const defaultActive = items.find((item) =>
        item.classList.contains("is-active")
      );
      if (defaultActive) {
        openItem(defaultActive);
      }

      // Comportamiento de clic: primer clic abre, segundo clic cierra
      items.forEach((item) => {
        const btn = item.querySelector(".school-levelbar-btn");
        if (!btn) return;

        btn.addEventListener("click", (event) => {
          event.stopPropagation();
          const dd = item.querySelector(".school-levelbar-dd");
          const isOpen = dd && dd.classList.contains("is-open");

          if (isOpen) {
            if (dd) dd.classList.remove("is-open");
            btn.setAttribute("aria-expanded", "false");
          } else {
            openItem(item);
          }
        });
      });

      // Clic fuera del componente: cerrar todos los submenus
      document.addEventListener("click", (event) => {
        const isInside = event.target.closest(".school-levelbar");
        if (!isInside) {
          closeAll();
        }
      });

      // ---------- LÓGICA MÓVIL: FAB + backdrop + cerrar en grado ----------
      const fab = document.querySelector(".school-levelbar-fab");
      const bar = document.querySelector(".school-levelbar");
      const backdrop = document.querySelector(".school-levelbar-backdrop");
      const closeBtn = document.querySelector(".school-levelbar-mobile-close");

      const gradeLinks = Array.from(
        document.querySelectorAll(".school-levelbar-grade")
      );

      const isMobile = () => window.matchMedia("(max-width: 999px)").matches;

      let fabIcon;
      let fabLabel;
      if (fab) {
        if (!fab.querySelector(".school-levelbar-fab__icon")) {
          fab.innerHTML =
            '<span class="school-levelbar-fab__icon" aria-hidden="true">►</span><span class="school-levelbar-fab__label">Menú</span>';
        }
        fabIcon = fab.querySelector(".school-levelbar-fab__icon");
        fabLabel = fab.querySelector(".school-levelbar-fab__label");
      }

      // Activar la animacion de hint al inicio en movil
      if (fab && isMobile()) {
        fab.classList.add("school-levelbar-fab--hint");
      }

      const syncFabState = (open) => {
        if (!fab) return;
        fab.classList.toggle("is-open", open);
        fab.classList.toggle("is-closed", !open);
        if (fabIcon) fabIcon.textContent = open ? "◄" : "►";
        if (fabLabel) fabLabel.textContent = open ? "Cerrar" : "Menú";
        fab.setAttribute("aria-label", open ? "Cerrar menú" : "Abrir menú");
        fab.setAttribute("aria-expanded", open ? "true" : "false");
      };

      const openPanel = () => {
        if (!isMobile()) return;
        document.body.classList.add("school-levelbar-open");
        syncFabState(true);

        // Una vez que el usuario lo uso, ya no molestamos con la animacion
        if (fab) {
          fab.classList.remove("school-levelbar-fab--hint");
        }
      };

      const closePanel = () => {
        document.body.classList.remove("school-levelbar-open");
        syncFabState(false);
        closeAll();
      };

      if (fab) {
        fab.addEventListener("click", (event) => {
          event.stopPropagation();
          const isOpen = document.body.classList.contains("school-levelbar-open");
          if (isOpen) {
            closePanel();
          } else {
            openPanel();
          }
        });
      }

      if (backdrop) {
        backdrop.addEventListener("click", (event) => {
          event.preventDefault();
          closePanel();
        });
      }

      if (closeBtn) {
        closeBtn.addEventListener("click", (event) => {
          event.preventDefault();
          closePanel();
        });
      }

      // Al seleccionar un grado en movil, cerrar panel + blur
      gradeLinks.forEach((link) => {
        link.addEventListener("click", () => {
          if (!isMobile()) return;
          closePanel();
        });
      });

      // Tabs de Bachillerato: cambiar panel sin navegar ni cerrar dropdown
      document.addEventListener(
        "click",
        (event) => {
          const tabBtn = event.target.closest(".bach-tab[data-bach-tab]");
          if (!tabBtn) return;

          event.preventDefault();
          event.stopImmediatePropagation();

          const year = tabBtn.dataset.bachTab;
          const bachDd = tabBtn.closest(".school-levelbar-dd.bach-dd");
          if (!bachDd) return;

          bachDd.querySelectorAll(".bach-tab").forEach((btn) => {
            btn.classList.remove("is-active");
          });
          tabBtn.classList.add("is-active");

          bachDd.querySelectorAll(".bach-chips__panel").forEach((panel) => {
            panel.classList.remove("is-active");
          });
          const activePanel = bachDd.querySelector(
            `.bach-chips__panel[data-bach-panel="${year}"]`
          );
          if (activePanel) {
            activePanel.classList.add("is-active");
          }

          bachDd.classList.add("is-open");
        },
        true
      );

      // Sincronizar estado inicial del FAB
      syncFabState(document.body.classList.contains("school-levelbar-open"));
    },
  };
})(window);

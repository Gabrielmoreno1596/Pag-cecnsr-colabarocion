(function (window) {
  const School = (window.CECNSRSchool = window.CECNSRSchool || {});

  function restore(checkbox, key) {
    try {
      const saved = window.localStorage.getItem(key);
      if (saved === "1") {
        checkbox.checked = true;
      }
    } catch (error) {
      // localStorage no disponible (navegacion privada)
    }
  }

  function persist(checked, key) {
    try {
      if (checked) {
        window.localStorage.setItem(key, "1");
      } else {
        window.localStorage.removeItem(key);
      }
    } catch (error) {
      // ignorar
    }
  }

  function updateCounters(root = document) {
    const sections = root.querySelectorAll(".school-tools");
    sections.forEach((section) => {
      const boxes = section.querySelectorAll(".school-checklist__box");
      const total = boxes.length;
      const checked = Array.from(boxes).filter((box) => box.checked).length;
      const counter = section.querySelector(".js-school-counter");
      if (!counter) return;
      const kicker = counter.querySelector(".kicker");
      const doneEl = counter.querySelector(".done");
      const totalEl = counter.querySelector(".total");
      const barFill = counter.querySelector(".bar > span");

      if (kicker && doneEl && totalEl && barFill) {
        const isEmpty = total === 0;
        kicker.textContent = isEmpty ? "No hay \u00fatiles para marcar." : "\u00datiles marcados";
        doneEl.textContent = checked;
        totalEl.textContent = total;
        const pct = total > 0 ? Math.min(100, Math.max(0, Math.round((checked / total) * 100))) : 0;
        barFill.style.setProperty("--progress", `${pct}%`);
      } else {
        if (total === 0) {
          counter.textContent = "No hay \u00fatiles para marcar.";
        } else {
          counter.textContent = `Has marcado ${checked} de ${total} \u00fatiles.`;
        }
      }
    });
  }

  School.checklist = {
    init() {
      const items = document.querySelectorAll(".school-checklist__item");

      items.forEach((item) => {
        const key = item.dataset.storageKey;
        const checkbox = item.querySelector(".school-checklist__box");
        if (!key || !checkbox) return;

        restore(checkbox, key);

        checkbox.addEventListener("change", () => {
          persist(checkbox.checked, key);
          updateCounters(document);
        });
      });

      updateCounters(document);
    },
  };
})(window);

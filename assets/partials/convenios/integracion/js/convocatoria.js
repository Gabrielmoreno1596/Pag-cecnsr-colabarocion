/**
 * Integración — Convocatoria (auto estado por fechas)
 * Usa:
 *   section.int-scholar[data-start="YYYY-MM-DD"][data-end="YYYY-MM-DD"]
 * Estados: active | upcoming | closed
 */
(() => {
  const sec = document.querySelector(".int-scholar");
  if (!sec) return;

  const bannerText = sec.querySelector(".status-text");
  const bannerDates = sec.querySelector(".status-dates");
  if (!bannerText || !bannerDates) return;

  const startAttr = sec.getAttribute("data-start");
  const endAttr = sec.getAttribute("data-end");

  function format(dateStr) {
    try {
      const d = new Date(dateStr + "T00:00:00");
      return d.toLocaleDateString(undefined, { year: "numeric", month: "short", day: "2-digit" });
    } catch (_) {
      return "";
    }
  }

  if (startAttr && endAttr) {
    const now = new Date();
    const start = new Date(startAttr + "T00:00:00");
    const end = new Date(endAttr + "T23:59:59");

    let state = "upcoming";
    if (now >= start && now <= end) state = "active";
    if (now > end) state = "closed";

    sec.setAttribute("data-state", state);

    bannerText.textContent =
      state === "active" ? "Convocatoria activa" :
      state === "closed" ? "Convocatoria cerrada" :
      "Próximamente";

    bannerDates.textContent = ` · ${format(startAttr)} — ${format(endAttr)}`;
  } else {
    const state = sec.getAttribute("data-state") || "upcoming";
    bannerText.textContent =
      state === "active" ? "Convocatoria activa" :
      state === "closed" ? "Convocatoria cerrada" :
      "Próximamente";
    bannerDates.textContent = "";
  }
})();

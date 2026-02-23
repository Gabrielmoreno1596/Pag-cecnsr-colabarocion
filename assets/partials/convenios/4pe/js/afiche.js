(() => {
  const sec = document.querySelector(".seminars");
  if (!sec) return;

  const start = sec.getAttribute("data-start");
  const end = sec.getAttribute("data-end");
  if (!start || !end) return; // si no hay fechas, respeta el data-state manual

  const today = new Date();
  const s = new Date(start + "T00:00:00");
  const e = new Date(end + "T23:59:59");

  let state = "upcoming";
  if (today >= s && today <= e) state = "active";
  else if (today > e) state = "past";

  sec.setAttribute("data-state", state);

  const chip = sec.querySelector(".status-chip");
  if (chip) {
    chip.setAttribute("data-kind", state === "past" ? "past" : "upcoming");
    chip.textContent = state === "past" ? "Finalizado" : "Próximamente";
  }
})();

(() => {
  const thumb = document.querySelector(".poster-thumb");
  const modal = document.querySelector(".poster-modal");
  if (!thumb || !modal) return;

  const img = modal.querySelector("#poster-modal-img");
  const dl = modal.querySelector("#poster-modal-download");
  const nt = modal.querySelector("#poster-modal-newtab");
  const backdrop = modal.querySelector(".poster-modal__backdrop");
  const closes = modal.querySelectorAll("[data-close]");
  let lastFocus = null;

  function openModal(src) {
    lastFocus = document.activeElement;
    img.removeAttribute("src");
    img.src = src;
    dl.href = src;
    nt.href = src;
    modal.hidden = false;
    document.body.classList.add("modal-open");
    setTimeout(() => modal.querySelector(".poster-modal__close")?.focus(), 0);
    document.addEventListener("keydown", onKey);
  }

  function closeModal() {
    modal.hidden = true;
    img.removeAttribute("src");
    document.body.classList.remove("modal-open");
    document.removeEventListener("keydown", onKey);
    lastFocus?.focus();
  }

  function onKey(e) {
    if (e.key === "Escape") closeModal();
    if (e.key === "Tab") {
      const focusables = modal.querySelectorAll('a,button,[tabindex]:not([tabindex="-1"])');
      const f = [...focusables].filter((el) => !el.disabled);
      if (!f.length) return;
      const first = f[0], last = f[f.length - 1];
      if (e.shiftKey && document.activeElement === first) { last.focus(); e.preventDefault(); }
      else if (!e.shiftKey && document.activeElement === last) { first.focus(); e.preventDefault(); }
    }
  }

  thumb.addEventListener("click", (e) => {
    const src = e.currentTarget.getAttribute("data-poster");
    if (src) openModal(src);
  });

  backdrop?.addEventListener("click", closeModal);
  closes.forEach((b) => b.addEventListener("click", closeModal));
})();

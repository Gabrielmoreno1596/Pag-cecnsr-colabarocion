(() => {
  const reel = document.querySelector("#infinite-reel");
  const modal = document.querySelector("#glightbox");
  if (!reel || !modal) return;

  const imgs = [...reel.querySelectorAll("img[data-full]")];
  const imgEl = modal.querySelector("#glb-img");
  const count = modal.querySelector(".lightbox__count");
  const prevBt = modal.querySelector(".nav.prev");
  const nextBt = modal.querySelector(".nav.next");
  const closers = modal.querySelectorAll("[data-close]");

  const visibleSet = imgs.length / 2; // (A + B) duplicado
  let i = 0, lastFocus = null, touchX = null;

  function normIndex(idx) {
    return ((idx % visibleSet) + visibleSet) % visibleSet;
  }

  let scale = 1, tx = 0, ty = 0;
  const MIN = 1, MAX = 3, STEP = 0.25;

  function apply() {
    imgEl.style.transform = `translate(${tx}px,${ty}px) scale(${scale})`;
  }

  function resetZoom() {
    scale = 1; tx = 0; ty = 0;
    imgEl.classList.remove("is-zoomed");
    imgEl.style.transform = "";
    imgEl.style.cursor = "zoom-in";
  }

  function set(n) {
    i = normIndex(n);
    const src = imgs[i].dataset.full;
    resetZoom();
    imgEl.src = src;
    imgEl.alt = imgs[i].alt || "Imagen ampliada";
    if (count) count.textContent = `${i + 1} / ${visibleSet}`;
  }

  function open(idx) {
    lastFocus = document.activeElement;
    set(idx);
    modal.hidden = false;
    setTimeout(() => nextBt?.focus(), 0);
    document.addEventListener("keydown", onKey);
  }

  function close() {
    modal.hidden = true;
    imgEl.src = "";
    document.removeEventListener("keydown", onKey);
    lastFocus?.focus();
  }

  function next() { set(i + 1); }
  function prev() { set(i - 1); }

  function onKey(e) {
    if (e.key === "Escape") close();
    if (e.key === "ArrowRight") next();
    if (e.key === "ArrowLeft") prev();
    if (e.key === "Tab") {
      const f = modal.querySelectorAll("button,[data-close]");
      const first = f[0], last = f[f.length - 1];
      if (e.shiftKey && document.activeElement === first) { last.focus(); e.preventDefault(); }
      else if (!e.shiftKey && document.activeElement === last) { first.focus(); e.preventDefault(); }
    }
  }

  imgs.forEach((im, idx) => im.addEventListener("click", () => open(normIndex(idx))));
  closers.forEach((b) => b.addEventListener("click", close));
  modal.querySelector(".lightbox__backdrop")?.addEventListener("click", close);
  prevBt?.addEventListener("click", prev);
  nextBt?.addEventListener("click", next);

  imgEl.addEventListener("touchstart", (e) => (touchX = e.changedTouches[0].clientX), { passive: true });
  imgEl.addEventListener("touchend", (e) => {
    if (touchX == null) return;
    const dx = e.changedTouches[0].clientX - touchX;
    if (Math.abs(dx) > 40) (dx < 0 ? next : prev)();
    touchX = null;
  }, { passive: true });

  modal.addEventListener("contextmenu", (e) => e.preventDefault());

  function zoomAt(px, py, delta) {
    const rect = imgEl.getBoundingClientRect();
    const cx = px - rect.left, cy = py - rect.top;
    const prev = scale;
    scale = Math.min(MAX, Math.max(MIN, scale + delta));
    if (scale === prev) return;
    const k = scale / prev - 1;
    tx -= (cx - rect.width / 2) * k;
    ty -= (cy - rect.height / 2) * k;
    imgEl.classList.toggle("is-zoomed", scale > 1);
    imgEl.style.cursor = scale > 1 ? "grab" : "zoom-in";
    if (scale === 1) { tx = 0; ty = 0; imgEl.style.cursor = "zoom-in"; }
    apply();
  }

  let tap = 0;
  imgEl.addEventListener("click", (e) => {
    const now = Date.now();
    if (now - tap < 300) {
      scale === 1 ? zoomAt(e.clientX, e.clientY, 1.25) : resetZoom();
    }
    tap = now;
  });

  imgEl.addEventListener("wheel", (e) => {
    e.preventDefault();
    zoomAt(e.clientX, e.clientY, e.deltaY > 0 ? -STEP : STEP);
  }, { passive: false });

  let drag = false, sx = 0, sy = 0;
  imgEl.addEventListener("mousedown", (e) => {
    if (scale === 1) return;
    drag = true;
    sx = e.clientX - tx;
    sy = e.clientY - ty;
    imgEl.classList.add("is-zoomed");
  });
  window.addEventListener("mousemove", (e) => {
    if (!drag) return;
    tx = e.clientX - sx;
    ty = e.clientY - sy;
    apply();
  });
  window.addEventListener("mouseup", () => (drag = false));

  let touchPan = null;
  imgEl.addEventListener("touchstart", (e) => {
    if (e.touches.length !== 1 || scale === 1) return;
    const t = e.touches[0];
    touchPan = { ox: t.clientX - tx, oy: t.clientY - ty };
  }, { passive: true });

  imgEl.addEventListener("touchmove", (e) => {
    if (!touchPan || e.touches.length !== 1) return;
    const t = e.touches[0];
    tx = t.clientX - touchPan.ox;
    ty = t.clientY - touchPan.oy;
    apply();
  }, { passive: true });

  imgEl.addEventListener("touchend", () => (touchPan = null), { passive: true });
})();

/**
 * Integración — Lightbox (Galería)
 */
(() => {
  const thumbs = document.querySelectorAll(".int-gallery .gallery a");
  if (!thumbs.length) return;

  const lb = document.getElementById("lb");
  if (!lb) return;

  const img = lb.querySelector(".lb__img");
  const cap = lb.querySelector(".lb__text");
  const count = lb.querySelector(".lb__count");
  const btnPrev = lb.querySelector(".lb__prev");
  const btnNext = lb.querySelector(".lb__next");
  const btnClose = lb.querySelector(".lb__close");

  if (!img || !cap || !count || !btnPrev || !btnNext || !btnClose) return;

  const items = Array.from(thumbs).map((a) => ({
    src: a.getAttribute("href") || a.querySelector("img")?.src,
    alt: a.dataset.caption || a.querySelector("img")?.alt || "",
    el: a,
  }));

  let idx = 0;
  let startX = 0;
  let moving = false;

  function preload(i) {
    const it = items[(i + items.length) % items.length];
    if (!it?.src) return;
    const n = new Image();
    n.src = it.src;
  }

  function show(i) {
    idx = (i + items.length) % items.length;
    const { src, alt } = items[idx];
    img.src = src;
    img.alt = alt;
    cap.textContent = alt;
    count.textContent = `${idx + 1} / ${items.length}`;
    preload(idx + 1);
    preload(idx - 1);
  }

  function open(i) {
    show(i);
    lb.classList.add("is-open");
    lb.setAttribute("aria-hidden", "false");
    document.body.classList.add("lb-open");
    btnClose.focus();
    document.addEventListener("keydown", onKey);
  }

  function close() {
    lb.classList.remove("is-open");
    lb.setAttribute("aria-hidden", "true");
    document.body.classList.remove("lb-open");
    document.removeEventListener("keydown", onKey);
  }

  function onKey(e) {
    if (e.key === "Escape") close();
    else if (e.key === "ArrowRight") show(idx + 1);
    else if (e.key === "ArrowLeft") show(idx - 1);
  }

  items.forEach((it, i) => {
    it.el.addEventListener("click", (ev) => {
      ev.preventDefault();
      open(i);
    });
  });

  btnPrev.addEventListener("click", () => show(idx - 1));
  btnNext.addEventListener("click", () => show(idx + 1));
  btnClose.addEventListener("click", close);

  lb.addEventListener("click", (e) => {
    if (e.target === lb) close();
  });

  lb.addEventListener("touchstart", (e) => {
    if (!e.touches[0]) return;
    startX = e.touches[0].clientX;
    moving = true;
  }, { passive: true });

  lb.addEventListener("touchmove", (e) => {
    if (!moving || !e.touches[0]) return;
    const dx = e.touches[0].clientX - startX;
    if (Math.abs(dx) > 60) {
      moving = false;
      (dx < 0 ? () => show(idx + 1) : () => show(idx - 1))();
    }
  }, { passive: true });

  lb.addEventListener("touchend", () => (moving = false));
})();

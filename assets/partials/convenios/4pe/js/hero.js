(() => {
  const hero = document.querySelector(".pi-hero__photo");
  if (!hero) return;

  const mainImg = hero.querySelector(".pi-hero__main");
  const reel = hero.querySelector(".pi-hero__reel .reel-track");
  if (!mainImg || !reel) return;

  const thumbs = Array.from(reel.querySelectorAll('img:not([aria-hidden="true"])'));

  function swapTo(thumb) {
    if (!thumb) return;

    thumbs.forEach((t) => t.removeAttribute("aria-current"));
    thumb.setAttribute("aria-current", "true");

    const nextSrc = thumb.getAttribute("data-full") || thumb.src;
    const nextAlt = thumb.alt || mainImg.alt;

    const img = new Image();
    img.onload = () => {
      mainImg.classList.add("is-swapping");
      requestAnimationFrame(() => {
        mainImg.src = nextSrc;
        mainImg.alt = nextAlt;
        requestAnimationFrame(() => mainImg.classList.remove("is-swapping"));
      });
    };
    img.src = nextSrc;
  }

  function handleActivate(ev, thumb) {
    ev.preventDefault();
    swapTo(thumb);
  }

  thumbs.forEach((thumb) => {
    thumb.addEventListener("click", (e) => handleActivate(e, thumb));
    thumb.addEventListener("keydown", (e) => {
      if (e.key === "Enter" || e.key === " ") handleActivate(e, thumb);
    });
  });

  const active = thumbs.find((t) => (t.getAttribute("data-full") || t.src) === mainImg.src);
  if (active) active.setAttribute("aria-current", "true");
})();

(() => {
  const track = document.querySelector(".pi-hero__reel .reel-track");
  const thumbs = Array.from(
    document.querySelectorAll('.pi-hero__reel .reel-track img:not([aria-hidden="true"])')
  );
  if (!track || thumbs.length < 2) return;

  let idx = 0, timer;
  const fire = () => thumbs[idx % thumbs.length].click();
  const start = () => (timer = setInterval(() => { idx++; fire(); }, 8000));
  const stop = () => clearInterval(timer);

  start();

  track.addEventListener("mouseenter", stop);
  track.addEventListener("mouseleave", start);
  track.addEventListener("click", () => {
    idx =
      thumbs.indexOf(document.querySelector('.reel-track img[aria-current="true"]')) || 0;
  });
})();

(() => {
  const items = Array.from(document.querySelectorAll(".itn__timeline-pi .itn-item"));
  if (!items.length) return;

  const prefersReduced = matchMedia("(prefers-reduced-motion: reduce)").matches;

  function heightTo(el, px, after) {
    el.style.height = px + "px";
    if (prefersReduced) { after?.(); return; }

    el.addEventListener("transitionend", function te(e) {
      if (e.propertyName !== "height") return;
      el.removeEventListener("transitionend", te);
      after?.();
    }, { once: true });

    void el.offsetWidth;
  }

  function closeItem(item) {
    try {
      const btn = item.querySelector(".itn-toggle");
      const panel = item.querySelector(".itn-more");
      if (!btn || !panel) return;
      if (!item.classList.contains("is-open")) return;

      const from = panel.scrollHeight || 0;
      panel.style.height = from + "px";
      void panel.offsetWidth;

      item.classList.remove("is-open");
      btn.setAttribute("aria-expanded", "false");

      heightTo(panel, 0, () => {
        panel.setAttribute("hidden", "");
        panel.style.height = "";
      });
    } catch (_) {}
  }

  function openItem(item) {
    try {
      const btn = item.querySelector(".itn-toggle");
      const panel = item.querySelector(".itn-more");
      if (!btn || !panel) return;
      if (item.classList.contains("is-open")) return;

      panel.removeAttribute("hidden");
      panel.style.height = "0px";
      void panel.offsetWidth;

      const to = panel.scrollHeight || 0;
      item.classList.add("is-open");
      btn.setAttribute("aria-expanded", "true");

      heightTo(panel, to, () => { panel.style.height = "auto"; });
    } catch (_) {}
  }

  function toggleExclusive(item) {
    if (item.classList.contains("is-open")) closeItem(item);
    else {
      items.forEach(it => it !== item && closeItem(it));
      openItem(item);
    }
  }

  items.forEach(item => {
    const btn = item.querySelector(".itn-toggle");
    const panel = item.querySelector(".itn-more");
    if (!btn || !panel) return;

    const expanded = btn.getAttribute("aria-expanded") === "true";
    if (expanded) {
      item.classList.add("is-open");
      panel.removeAttribute("hidden");
      panel.style.height = "auto";
    } else {
      item.classList.remove("is-open");
      panel.setAttribute("hidden", "");
      panel.style.height = "0px";
    }

    btn.addEventListener("click", () => toggleExclusive(item));
    btn.addEventListener("keydown", (ev) => {
      const i = items.indexOf(item);
      if (ev.key === "Enter" || ev.key === " ") { ev.preventDefault(); toggleExclusive(item); }
      if (ev.key === "ArrowDown") items[i + 1]?.querySelector(".itn-toggle")?.focus();
      if (ev.key === "ArrowUp") items[i - 1]?.querySelector(".itn-toggle")?.focus();
      if (ev.key === "Home") items[0]?.querySelector(".itn-toggle")?.focus();
      if (ev.key === "End") items[items.length - 1]?.querySelector(".itn-toggle")?.focus();
      if (ev.key === "Escape") closeItem(item);
    });
  });
})();

(() => {
  // Slides del aside vienen desde PHP: window.__PI4PE_ASIDE__
  const slides = window.__PI4PE_ASIDE__;
  if (!Array.isArray(slides) || !slides.length) return;

  const imgEl = document.getElementById("itnImg");
  const capEl = document.getElementById("itnCaption");
  const credEl = document.getElementById("itnCredits");
  const quoteEl = document.getElementById("itnQuote");
  const reelEl = document.getElementById("itnReel");
  if (!imgEl || !capEl || !credEl || !quoteEl) return;

  let i = 0, timer = null;
  const DURATION = 7000;
  const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  function swap(to) {
    const s = slides[to];
    [imgEl, capEl, quoteEl].forEach((el) => el.classList.add("is-swapping"));

    window.setTimeout(() => {
      imgEl.src = s.src;
      imgEl.alt = s.alt;
      capEl.textContent = s.caption;
      credEl.textContent = s.credits;
      quoteEl.innerHTML = `<p>${s.quote.text}</p><footer>${s.quote.by}</footer>`;
      [imgEl, capEl, quoteEl].forEach((el) => el.classList.remove("is-swapping"));
    }, prefersReduced ? 0 : 220);
  }

  function next() { i = (i + 1) % slides.length; swap(i); }
  function start() {
    if (prefersReduced) return;
    if (timer) clearInterval(timer);
    timer = setInterval(next, DURATION);
  }
  function stop() { if (timer) clearInterval(timer); }

  [reelEl, quoteEl].forEach((el) => {
    if (!el) return;
    el.addEventListener("mouseenter", stop);
    el.addEventListener("mouseleave", start);
    el.addEventListener("focusin", stop);
    el.addEventListener("focusout", start);
  });

  swap(0);
  start();
})();

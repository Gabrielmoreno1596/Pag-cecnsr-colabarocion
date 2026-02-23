INTEGRACIÓN (importante)
========================
Para que funcione el reveal on scroll en producción:

1) Incluye el CSS:
   proyecto-dual/css/reveal.css

2) Incluye el JS (al final, con defer):
   proyecto-dual/js/reveal-lazy.js

Ejemplo (depende de tu plantilla):
<link rel="stylesheet" href=".../proyecto-dual/css/reveal.css">
<script defer src=".../proyecto-dual/js/reveal-lazy.js"></script>

Calibración:
- En reveal-lazy.js puedes ajustar:
  threshold y rootMargin (IntersectionObserver) y BASE_DELAY.

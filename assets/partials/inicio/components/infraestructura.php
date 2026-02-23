<?php
$data = require __DIR__ . '/../data/infraestructura.php';
$infraBase = 'assets/img/inicio/infraestructura/';
$total = isset($data['images']) ? count($data['images']) : 0;

// Configuración de paginación (por páginas)
$pageSize = 7; // 1 destacada + 6 secundarias
?>

<section id="infraestructura" class="section-padding">
  <div class="infra-head">
    <h2 class="section-title infra-title">Conoce nuestra infraestructura</h2>
    <p class="infra-sub">
      Un recorrido visual por nuestras instalaciones.
      <span class="infra-hint">Toca una imagen para verla en grande.</span>
    </p>
  </div>

  <div class="infra-gallery-wrap" aria-label="Galería de infraestructura">
    <div class="infra-gallery" data-lightbox="infra">
      <div
        class="infra-grid infra-grid--categories"
        role="list"
        aria-label="Galería de infraestructura"
        data-infra-page-size="<?= (int)$pageSize; ?>">
        <?php foreach ($data['images'] as $i => $img): ?>
          <?php $src = asset($infraBase . $img); ?>
          <?php $hidden = ($i >= $pageSize) ? ' is-hidden' : ''; ?>
          <button
            type="button"
            class="infra-thumb infra-card<?= $hidden; ?>"
            data-full="<?= $src; ?>"
            aria-label="Ver imagen <?= (int)($i + 1); ?> de infraestructura">
            <img
              src="<?= $src; ?>"
              alt="Infraestructura CECNSR"
              loading="lazy"
              decoding="async" />
            <span class="infra-overlay" aria-hidden="true">
              <span class="infra-overlay__label">Infraestructura</span>
              <span class="infra-overlay__cta">Ver en grande</span>
            </span>
          </button>
        <?php endforeach; ?>
      </div>

      <?php if ($total > $pageSize): ?>
        <div class="infra-pager" aria-label="Controles de galería">
          <button class="infra-prev" type="button">
            <span class="infra-prev__icon" aria-hidden="true">←</span>
            Anterior
          </button>

          <span class="infra-page" aria-live="polite">
            Página <b class="infra-page__current">1</b> / <b class="infra-page__total"><?= (int)ceil($total / $pageSize); ?></b>
          </span>

          <button class="infra-next" type="button">
            Siguiente
            <span class="infra-next__icon" aria-hidden="true">→</span>
          </button>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <script>
    (function() {
      const root = document.getElementById('infraestructura');
      if (!root) return;

      const grid = root.querySelector('.infra-grid');
      if (!grid) return;

      const btnPrev = root.querySelector('.infra-prev');
      const btnNext = root.querySelector('.infra-next');
      const currentEl = root.querySelector('.infra-page__current');
      const totalEl = root.querySelector('.infra-page__total');

      const pageSize = Number(grid.getAttribute('data-infra-page-size') || 7);
      const itemsAll = Array.from(grid.querySelectorAll('.infra-thumb'));
      const total = itemsAll.length;

      if (!total) return;

      const totalPages = Math.max(1, Math.ceil(total / pageSize));
      let page = 1;

      const setFeatured = (visible) => {
        visible.forEach((el, idx) => {
          if (idx === 0) el.classList.add('is-featured');
          else el.classList.remove('is-featured');
        });
      };

      const render = () => {
        // Oculta todo
        itemsAll.forEach(el => el.classList.add('is-hidden'));

        // Muestra página actual
        const start = (page - 1) * pageSize;
        const end = Math.min(start + pageSize, total);
        const visible = itemsAll.slice(start, end);

        visible.forEach((el) => {
          el.classList.remove('is-hidden');
          el.classList.add('is-page-in');
          window.setTimeout(() => el.classList.remove('is-page-in'), 450);
        });

        setFeatured(visible);

        // UI
        if (currentEl) currentEl.textContent = String(page);
        if (totalEl) totalEl.textContent = String(totalPages);

        if (btnPrev) btnPrev.style.display = (page > 1) ? '' : 'none';
        if (btnNext) btnNext.style.display = (page < totalPages) ? '' : 'none';

        // Resetea scroll interno para que siempre se vea el mosaico desde arriba
        grid.scrollTop = 0;
      };

      // Estado inicial por si el server no marcó clases
      page = 1;
      render();

      if (btnPrev) {
        btnPrev.addEventListener('click', () => {
          if (page <= 1) return;
          page -= 1;
          render();
        });
      }

      if (btnNext) {
        btnNext.addEventListener('click', () => {
          if (page >= totalPages) return;
          page += 1;
          render();
        });
      }
    })();
  </script>
</section>
<?php
$a = $aficheData;
$attrs = $a['section_attrs'];
?>

<section
  id="<?= $a['id'] ?>"
  class="section seminars"
  aria-labelledby="seminar-title"
  data-state="<?= htmlspecialchars($attrs['data-state']) ?>"
  data-start="<?= htmlspecialchars($attrs['data-start']) ?>"
  data-end="<?= htmlspecialchars($attrs['data-end']) ?>">

  <div class="container container-color-pi">
    <!-- Estado ACTIVO -->
    <article class="seminar" role="article">
      <figure class="seminar__media">
        <button class="poster-thumb"
          data-poster="<?= $a['poster']['modal_src'] ?>"
          aria-labelledby="poster-title">
          <img
            src="<?= $a['poster']['thumb_src'] ?>"
            alt="<?= htmlspecialchars($a['poster']['thumb_alt']) ?>"
            loading="lazy" decoding="async">
          <span class="thumb-veil" aria-hidden="true">
            <i class="fa-solid fa-magnifying-glass-plus" aria-hidden="true"></i>
            Ver afiche
          </span>
        </button>
        <figcaption id="poster-title" class="seminar__badge"><?= $a['poster']['badge'] ?></figcaption>
      </figure>

      <!-- Modal flotante -->
      <div class="poster-modal" role="dialog" aria-modal="true" aria-labelledby="poster-modal-title" hidden>
        <div class="poster-modal__backdrop" data-close></div>
        <div class="poster-modal__dialog">
          <header class="poster-modal__head">
            <h3 id="poster-modal-title">Afiche del seminario</h3>
            <button class="poster-modal__close" aria-label="Cerrar" data-close>✕</button>
          </header>

          <div class="poster-modal__body">
            <img src="" alt="Afiche del Seminario 2025" id="poster-modal-img" loading="lazy" decoding="async">
          </div>

          <footer class="poster-modal__foot">
            <a id="poster-modal-download" class="btn-solid" download>Descargar afiche</a>
            <a id="poster-modal-newtab" class="btn-outline-pi" target="_blank" rel="noopener">Abrir en nueva pestaña</a>
          </footer>
        </div>
      </div>

      <div class="seminar__details">
        <header>
          <p class="seminar__eyebrow"><?= $a['eyebrow'] ?></p>
          <h2 id="seminar-title" class="section-title"><?= $a['title'] ?></h2>
          <div class="title-divider" aria-hidden="true"></div>
        </header>

        <ul class="info-list" role="list">
          <?php foreach ($a['info'] as $row): ?>
            <li>
              <span class="info-list__icon" aria-hidden="true"><?= $row['icon'] ?></span>
              <div><?= $row['html'] ?></div>
            </li>
          <?php endforeach; ?>
        </ul>

        <div class="seminar__cta">
          <?php foreach ($a['cta'] as $cta):
            $download = !empty($cta['download']);
          ?>
            <a class="<?= $cta['class'] ?>"
              href="<?= $cta['href'] ?>"
              <?= $download ? 'download' : '' ?>>
              <?= $cta['label'] ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </article>

    <!-- Estado ANUNCIO (upcoming/past) -->
    <aside class="seminar-announce" role="status" aria-live="polite">
      <div class="announce__head">
        <span class="status-chip" data-kind="upcoming">Próximamente</span>
      </div>

      <h3 class="announce__title"><?= $a['announce']['title'] ?></h3>
      <p class="announce__lead"><?= $a['announce']['lead'] ?></p>

      <div class="announce__cta">
        <?php foreach ($a['announce']['cta'] as $cta):
          $download = !empty($cta['download']);
        ?>
          <a class="<?= $cta['class'] ?>" href="<?= $cta['href'] ?>" <?= $download ? 'download' : '' ?>>
            <?= $cta['label'] ?>
          </a>
        <?php endforeach; ?>
      </div>
    </aside>
  </div>
</section>

<?php $data = require __DIR__ . '/../data/convocatoria.php'; ?>
<section
  class="section int-scholar"
  id="<?= htmlspecialchars($data['id'] ?? 'becas') ?>"
  aria-labelledby="beca-title"
  data-state="<?= htmlspecialchars($data['state'] ?? 'upcoming') ?>"
  data-start="<?= htmlspecialchars($data['start'] ?? '') ?>"
  data-end="<?= htmlspecialchars($data['end'] ?? '') ?>"
>
  <div class="container">
    <div class="status-banner" role="status" aria-live="polite">
      <span class="dot" aria-hidden="true"></span>
      <span class="status-text">Convocatoria activa</span>
      <time class="status-dates"></time>
    </div>

    <header class="scholar-head">
      <h2 id="beca-title" class="section-title__gob">
        <?= htmlspecialchars($data['title'] ?? '') ?>
      </h2>
      <div class="title-divider" aria-hidden="true"></div>

      <div class="container grid-2">
        <p class="muted">
          <?= htmlspecialchars($data['muted'] ?? '') ?>
          <a class="btn-outline-int text-color"
             href="<?= htmlspecialchars($data['official']['href'] ?? '#') ?>"
             target="_blank" rel="noopener">
            <?= htmlspecialchars($data['official']['text'] ?? '') ?>
          </a>
        </p>

        <?php if (!empty($data['logo']['src'])): ?>
          <figure class="about-media">
            <img src="<?= htmlspecialchars($data['logo']['src']) ?>"
                 alt="<?= htmlspecialchars($data['logo']['alt'] ?? '') ?>"
                 loading="lazy" decoding="async" />
          </figure>
        <?php endif; ?>
      </div>
    </header>

    <div class="cta-switch">
      <div class="state-cta state-active">
        <?php foreach (($data['cta']['active'] ?? []) as $cta): ?>
          <a class="<?= htmlspecialchars($cta['class'] ?? 'btn-solid-int') ?>"
             href="<?= htmlspecialchars($cta['href'] ?? '#') ?>"
             <?= $cta['attrs'] ?? '' ?>>
            <?= htmlspecialchars($cta['text'] ?? '') ?>
          </a>
        <?php endforeach; ?>
      </div>

      <div class="state-cta state-upcoming">
        <?php foreach (($data['cta']['upcoming'] ?? []) as $cta): ?>
          <a class="<?= htmlspecialchars($cta['class'] ?? 'btn-solid-int') ?>"
             href="<?= htmlspecialchars($cta['href'] ?? '#') ?>"
             <?= $cta['attrs'] ?? '' ?>>
            <?= htmlspecialchars($cta['text'] ?? '') ?>
          </a>
        <?php endforeach; ?>
      </div>

      <div class="state-cta state-closed">
        <?php foreach (($data['cta']['closed'] ?? []) as $cta): ?>
          <a class="<?= htmlspecialchars($cta['class'] ?? 'btn-solid-int') ?>"
             href="<?= htmlspecialchars($cta['href'] ?? '#') ?>"
             <?= $cta['attrs'] ?? '' ?>>
            <?= htmlspecialchars($cta['text'] ?? '') ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<?php
$it = $itinerarioData;
$aside = $it['aside'];
$initial = $aside['initial'];
?>

<section class="section itn" id="<?= $it['id'] ?>">
  <div class="container itn__grid">
    <!-- Columna izquierda: timeline -->
    <div class="itn__body">
      <h2 class="section-title"><?= $it['title'] ?></h2>
      <div class="title-divider" aria-hidden="true"></div>

      <ol class="timeline-pi modern itn__timeline-pi" role="list">
        <?php foreach ($it['items'] as $idx => $item): 
          $n = (int)$item['n'];
          $panelId = "itn-panel-" . $n;
          $expanded = false; // estado inicial
        ?>
          <li class="reveal itn-item">
            <span class="badge"><?= $n ?></span>
            <div>
              <h4
                class="itn-toggle"
                tabindex="0"
                aria-expanded="<?= $expanded ? 'true' : 'false' ?>"
                aria-controls="<?= $panelId ?>">
                <?= $item['title'] ?>
              </h4>

              <div class="itn-more" id="<?= $panelId ?>" <?= $expanded ? '' : 'hidden' ?>>
                <p class="itn__kicker"><?= $item['kicker_html'] ?></p>
                <ul class="bullets-pi">
                  <?php foreach ($item['bullets'] as $b): ?>
                    <li><?= $b ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>

    <!-- Columna derecha: imagen/quote -->
    <aside class="itn__aside">
      <figure class="itn__media" id="itnReel" aria-live="polite">
        <img
          id="itnImg"
          src="<?= $initial['src'] ?>"
          alt="<?= htmlspecialchars($initial['alt']) ?>"
          loading="lazy" decoding="async">
        <figcaption id="itnCaption"><?= $initial['caption'] ?></figcaption>

        <small class="itn__credits" id="itnCredits"><?= $initial['credits'] ?></small>
      </figure>

      <blockquote class="itn__quote" id="itnQuote">
        <p><?= $initial['quote']['text'] ?></p>
        <footer><?= $initial['quote']['by'] ?></footer>
      </blockquote>
    </aside>
  </div>

  <!-- Data para JS (slides del aside) -->
  <script>
    window.__PI4PE_ASIDE__ = <?= json_encode($aside['slides'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
  </script>
</section>

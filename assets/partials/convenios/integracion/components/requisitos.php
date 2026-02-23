<?php $data = require __DIR__ . '/../data/requisitos.php'; ?>
<section class="section int-scholar-body" aria-labelledby="req-title">
  <div class="container">
    <h2 id="req-title" class="section-title"><?= htmlspecialchars($data['title'] ?? '') ?></h2>
    <div class="title-divider" aria-hidden="true"></div>

    <div class="tracks">
      <?php foreach (($data['tracks'] ?? []) as $t): ?>
        <article class="track">
          <h3><?= htmlspecialchars($t['title'] ?? '') ?></h3>
          <ul>
            <?php foreach (($t['items'] ?? []) as $li): ?>
              <li><?= $li ?></li>
            <?php endforeach; ?>
          </ul>
        </article>
      <?php endforeach; ?>
    </div>

    <h3 class="subcap"><?= htmlspecialchars($data['acts_title'] ?? '') ?></h3>
    <div class="acts">
      <?php foreach (($data['acts'] ?? []) as $a): ?>
        <article class="act">
          <h4><?= htmlspecialchars($a['title'] ?? '') ?></h4>
          <p><?= htmlspecialchars($a['text'] ?? '') ?></p>
        </article>
      <?php endforeach; ?>
    </div>

    <div class="cta-row">
      <?php foreach (($data['cta'] ?? []) as $cta): ?>
        <a class="<?= htmlspecialchars($cta['class'] ?? 'btn-solid-int') ?>"
           href="<?= htmlspecialchars($cta['href'] ?? '#') ?>">
          <?= htmlspecialchars($cta['text'] ?? '') ?>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

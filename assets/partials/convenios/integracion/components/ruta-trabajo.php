<?php $data = require __DIR__ . '/../data/ruta-trabajo.php'; ?>
<section class="section int-route" id="ruta">
  <div class="container">
    <h2 class="section-title"><?= htmlspecialchars($data['title'] ?? '') ?></h2>
    <div class="title-divider" aria-hidden="true"></div>

    <div class="route-grid">
      <?php foreach (($data['steps'] ?? []) as $s): ?>
        <article class="step">
          <span class="n"><?= htmlspecialchars($s['n'] ?? '') ?></span>
          <h3><?= htmlspecialchars($s['title'] ?? '') ?></h3>
          <p><?= htmlspecialchars($s['text'] ?? '') ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

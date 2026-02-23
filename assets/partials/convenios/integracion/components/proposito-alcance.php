<?php $data = require __DIR__ . '/../data/proposito-alcance.php'; ?>
<section class="section int-about" id="que-es">
  <div class="container grid-2">
    <div class="about-copy">
      <h2 class="section-title"><?= htmlspecialchars($data['title'] ?? '') ?></h2>
      <div class="title-divider" aria-hidden="true"></div>
      <p class="big"><?= htmlspecialchars($data['copy'] ?? '') ?></p>

      <ul class="check">
        <?php foreach (($data['bullets'] ?? []) as $li): ?>
          <li><?= htmlspecialchars($li) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <figure class="about-media">
      <img src="<?= htmlspecialchars($data['image']['src'] ?? '') ?>"
           alt="<?= htmlspecialchars($data['image']['alt'] ?? '') ?>"
           loading="lazy" decoding="async" />
    </figure>
  </div>
</section>

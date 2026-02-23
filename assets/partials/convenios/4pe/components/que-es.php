<?php
$q = $queEsData;
?>

<section id="<?= $q['id'] ?>" class="section">
  <div class="container">
    <h2 class="section-title xl"><?= $q['title'] ?></h2>
    <div class="title-divider" aria-hidden="true"></div>
    <p class="lead"><?= $q['lead'] ?></p>

    <div class="grid-4 pe-cards">
      <?php foreach ($q['cards'] as $c): ?>
        <article class="pe-card">
          <h3 class="pe-title">
            <img class="pe-icon"
              src="<?= $c['icon'] ?>"
              alt="<?= htmlspecialchars($c['alt']) ?>"
              loading="lazy" decoding="async">
            <span><?= $c['title_html'] ?></span>
          </h3>
          <p><?= $c['text'] ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

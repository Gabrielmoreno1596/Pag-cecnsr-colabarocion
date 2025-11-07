<?php /* $dCoor: title, items[]: {html or link} */ ?>
<section class="section">
    <div class="card contact-card">
        <h2 class="section-title"><?= htmlspecialchars($dCoor['title']) ?></h2>
        <div class="title-divider" aria-hidden="true"></div>
        <div class="contact">
            <?php foreach ($dCoor['items'] as $it): ?>
                <?php if (!empty($it['href'])): ?>
                    <a class="contact__item" href="<?= htmlspecialchars($it['href']) ?>"><?= $it['html'] ?></a>
                <?php else: ?>
                    <div class="contact__item"><?= $it['html'] ?></div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
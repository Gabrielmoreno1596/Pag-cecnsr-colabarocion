<?php /* $dQueEs: title, paragraphs[] (HTML permitido), note_html */ ?>
<section class="section">
    <div class="card">
        <h2 class="section-title"><?= htmlspecialchars($dQueEs['title']) ?></h2>
        <div class="title-divider" aria-hidden="true"></div>
        <?php foreach ($dQueEs['paragraphs'] as $p): ?>
            <p><?= $p ?></p>
        <?php endforeach; ?>
        <?php if (!empty($dQueEs['note_html'])): ?>
            <p class="note"><?= $dQueEs['note_html'] ?></p>
        <?php endif; ?>
    </div>
</section>
<?php
$data = require __DIR__ . '/../data/areas.php';
?>

<section class="section-padding bg-light" id="areas">
    <div class="content-wrapper">
        <h2 class="section-title">
            <i class="fas fa-book-reader"></i> <?= htmlspecialchars($data['title']); ?>
        </h2>

        <div class="course-grid">
            <?php foreach ($data['items'] as $item): ?>
                <article class="course-card">
                    <h4><?= htmlspecialchars($item['title']); ?></h4>
                    <p><?= htmlspecialchars($item['text']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
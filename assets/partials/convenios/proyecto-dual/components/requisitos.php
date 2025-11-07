<?php /* $dReq: features[] with icon, title, text */ ?>
<section class="section">
    <div class="grid-3">
        <?php foreach ($dReq['features'] as $f): ?>
            <article class="feature">
                <i class="<?= htmlspecialchars($f['icon']) ?>"></i>
                <h3><?= htmlspecialchars($f['title']) ?></h3>
                <p><?= htmlspecialchars($f['text']) ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>
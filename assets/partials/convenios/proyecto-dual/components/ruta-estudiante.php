<?php /* $dRuta: title, steps[] with text */ ?>
<section class="section">
    <div class="card">
        <h2 class="section-title"><?= htmlspecialchars($dRuta['title']) ?></h2>
        <div class="title-divider" aria-hidden="true"></div>
        <ol class="timeline">
            <?php foreach ($dRuta['steps'] as $idx => $html): ?>
                <li>
                    <span class="dot"><?= $idx + 1 ?></span>
                    <div class="tl-body"><?= $html ?></div>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
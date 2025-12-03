<?php
// Se espera que $quienesSomos venga desde quienes-data.php

$sectionId   = $quienesSomos['section_id'];
$historia    = $quienesSomos['historia'];
$filosofia   = $quienesSomos['filosofia'];
$infra       = $quienesSomos['infraestructura'];
?>

<section id="<?= htmlspecialchars($sectionId) ?>" class="section-padding">
    <h2 class="section-title"><?= htmlspecialchars($quienesSomos['title']) ?></h2>

    <div class="history-flex-container">
        <div class="history-text-block">
            <h3 class="sub-title" style="color: white; margin-bottom: 1rem">
                <?= htmlspecialchars($historia['title']) ?>
            </h3>

            <?php foreach ($historia['paragraphs'] as $p): ?>
                <p><?= htmlspecialchars($p) ?></p>
            <?php endforeach; ?>

            <ul style="max-width: 800px; margin: 0 auto; text-align: left">
                <?php foreach ($historia['hitos'] as $hito): ?>
                    <li>
                        <i class="fas fa-check-circle" style="color: var(--cecns-gold)"></i>
                        <?= htmlspecialchars($hito) ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <p style="margin-top: 1rem">
                <?= htmlspecialchars($historia['closing']) ?>
            </p>
        </div>

        <div class="history-carousel-container">
            <div class="history-carousel-track">
                <?php foreach ($historia['carousel_images'] as $img): ?>
                    <img
                        src="<?= asset('assets/partials/inicio/image/historia/' . $img['file']) ?>"
                        alt="<?= htmlspecialchars($img['alt']) ?>"
                        class="history-carousel-img" />
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <h3
        id="<?= htmlspecialchars($filosofia['heading_id']) ?>"
        class="sub-title"
        style="margin-top: 3rem">
        <?= htmlspecialchars($filosofia['heading']) ?>
    </h3>

    <div class="philosophy-grid">
        <?php foreach ($filosofia['cards'] as $card): ?>
            <div class="mission-vision-card">
                <i class="<?= htmlspecialchars($card['icon']) ?>"></i>
                <h3><?= htmlspecialchars($card['title']) ?></h3>
                <p><?= htmlspecialchars($card['text']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Sección Infraestructura (separada, igual que en el HTML original) -->
<section id="<?= htmlspecialchars($infra['section_id']) ?>">
    <div class="infra-carousel-container">
        <div class="infra-carousel-track">
            <?php foreach ($infra['images'] as $img): ?>
                <img
                    src="<?= asset('assets/partials/inicio/image/infraestructura/' . $img['file']) ?>"
                    alt="<?= htmlspecialchars($img['alt']) ?>"
                    class="infra-carousel-img" />
            <?php endforeach; ?>
        </div>
    </div>
</section>
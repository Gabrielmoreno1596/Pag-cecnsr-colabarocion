<?php
if (!isset($seasonalModalData) || empty($seasonalModalData['enabled'])) {
    return;
}

// Exponer datos al JS
$modalJson = json_encode($seasonalModalData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
$slides = array_values(array_filter($seasonalModalData['slides'] ?? [], function ($slide) {
    return is_array($slide) && !empty($slide['src']);
}));
$slidesJson = json_encode($slides, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
$titleId = 'seasonal-modal-title';
$firstSlide = $slides[0] ?? null;
?>

<div class="seasonal-modal" id="seasonalModal" role="dialog" aria-modal="true" aria-labelledby="<?= $titleId ?>" hidden>
    <div class="seasonal-modal__backdrop" data-close="true"></div>
    <div class="seasonal-modal__dialog">
        <button class="seasonal-modal__close" type="button" aria-label="Cerrar" data-close="true">×</button>
        <?php if (!empty($seasonalModalData['title'])): ?>
            <h2 class="seasonal-modal__title" id="<?= $titleId ?>">
                <?= htmlspecialchars($seasonalModalData['title'], ENT_QUOTES, 'UTF-8') ?>
            </h2>
        <?php endif; ?>

        <?php if (!empty($seasonalModalData['message'])): ?>
            <p class="seasonal-modal__message">
                <?= htmlspecialchars($seasonalModalData['message'], ENT_QUOTES, 'UTF-8') ?>
            </p>
        <?php endif; ?>

        <?php if (!empty($firstSlide)): ?>
            <figure class="seasonal-modal__media">
                <img
                    id="seasonalModalSlide"
                    src="<?= htmlspecialchars($firstSlide['src'], ENT_QUOTES, 'UTF-8') ?>"
                    alt="<?= htmlspecialchars($firstSlide['alt'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                >
            </figure>
        <?php elseif (!empty($seasonalModalData['image'])): ?>
            <figure class="seasonal-modal__media">
                <img src="<?= htmlspecialchars($seasonalModalData['image'], ENT_QUOTES, 'UTF-8') ?>" alt="">
            </figure>
        <?php endif; ?>

        <?php
        $primary = $seasonalModalData['primary_btn'] ?? [];
        $secondary = $seasonalModalData['secondary_btn'] ?? [];
        ?>
        <?php if (!empty($primary['label']) || !empty($secondary['label'])): ?>
            <div class="seasonal-modal__actions">
                <?php if (!empty($primary['label']) && !empty($primary['href'])): ?>
                    <a class="seasonal-modal__btn seasonal-modal__btn--primary" href="<?= htmlspecialchars($primary['href'], ENT_QUOTES, 'UTF-8') ?>">
                        <?= htmlspecialchars($primary['label'], ENT_QUOTES, 'UTF-8') ?>
                    </a>
                <?php endif; ?>
                <?php if (!empty($secondary['label']) && !empty($secondary['href'])): ?>
                    <a class="seasonal-modal__btn seasonal-modal__btn--secondary" href="<?= htmlspecialchars($secondary['href'], ENT_QUOTES, 'UTF-8') ?>">
                        <?= htmlspecialchars($secondary['label'], ENT_QUOTES, 'UTF-8') ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    window.__SEASONAL_MODAL__ = <?= $modalJson ?>;
    window.__SEASONAL_MODAL_SLIDES__ = <?= $slidesJson ?>;
    window.__SEASONAL_MODAL_FORCE__ = <?= isset($seasonalModalForce) && $seasonalModalForce ? 'true' : 'false' ?>;
</script>

<?php
if (!isset($seasonalModalData) || empty($seasonalModalData['enabled'])) {
    return;
}

// Exponer datos al JS
$modalJson = json_encode($seasonalModalData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
$slides = array_values(array_filter($seasonalModalData['slides'] ?? [], function ($slide) {
    if (!is_array($slide)) return false;
    // Soporta slides tipo "image" (con src) y tipo "card" (sin imagen)
    if (!empty($slide['src'])) return true;
    if (($slide['type'] ?? '') === 'card') return true;
    return false;
}));
$slidesJson = json_encode($slides, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
$titleId = 'seasonal-modal-title';
$hasTitle = !empty($seasonalModalData['title']);
$ariaAttr = $hasTitle ? 'aria-labelledby="' . $titleId . '"' : 'aria-label="Avisos"';
$firstSlide = $slides[0] ?? null;
$hasSlides = !empty($slides);
$hasMultipleSlides = count($slides) > 1;
?>

<div class="seasonal-modal" id="seasonalModal" role="dialog" aria-modal="true" <?= $ariaAttr ?> hidden>
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
            <figure class="seasonal-modal__media" aria-label="Galería de anuncios">
                <!--
                  Slide container (renderizado por JS).
                  Soporta layout "card" (sin afiche) y "image".
                -->
                <div id="seasonalModalSlide" class="seasonal-modal__slide" aria-live="polite"></div>

                <?php if ($hasMultipleSlides): ?>
                    <button class="seasonal-modal__nav seasonal-modal__nav--prev" type="button" aria-label="Anterior" data-prev>
                        <span aria-hidden="true">‹</span>
                    </button>
                    <button class="seasonal-modal__nav seasonal-modal__nav--next" type="button" aria-label="Siguiente" data-next>
                        <span aria-hidden="true">›</span>
                    </button>
                <?php endif; ?>
            </figure>
            <?php if ($hasMultipleSlides): ?>
                <div class="seasonal-modal__controls" aria-label="Controles de diapositivas">
                    <div class="seasonal-modal__dots" role="tablist" aria-label="Diapositivas">
                        <?php foreach ($slides as $i => $_slide): ?>
                            <button
                                type="button"
                                class="seasonal-modal__dot<?= $i === 0 ? ' is-active' : '' ?>"
                                aria-label="Ir a la diapositiva <?= $i + 1 ?>"
                                aria-selected="<?= $i === 0 ? 'true' : 'false' ?>"
                                role="tab"
                                data-goto="<?= (int)$i ?>"></button>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

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
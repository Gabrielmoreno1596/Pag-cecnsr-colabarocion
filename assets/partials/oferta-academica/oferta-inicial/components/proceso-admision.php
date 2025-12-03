<?php $admision = $ofertaInicialData['admision']; ?>

<section class="section-padding bg-white">
    <div class="content-wrapper">
        <h2 class="section-title">
            <i class="<?= htmlspecialchars($admision['icon']) ?>"></i>
            <?= htmlspecialchars($admision['title']) ?>
        </h2>

        <div class="accordion-container admission-accordion">
            <?php foreach ($admision['sections'] as $section): ?>
                <div class="accordion-item">
                    <button class="accordion-header" type="button">
                        <span>
                            <i class="<?= htmlspecialchars($section['icon']) ?>"></i>
                            <?= htmlspecialchars($section['title']) ?>
                        </span>
                        <i class="fas fa-chevron-down accordion-icon"></i>
                    </button>
                    <div class="accordion-content">
                        <ul class="<?= htmlspecialchars($section['list_class']) ?>">
                            <?php foreach ($section['items'] as $item): ?>
                                <li>
                                    <i class="<?= htmlspecialchars($item['icon']) ?>"></i>
                                    <?= htmlspecialchars($item['text']) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <?php if (!empty($section['extra_text'])): ?>
                            <p class="mt-3 age-notice">
                                <?= htmlspecialchars($section['extra_text']) ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
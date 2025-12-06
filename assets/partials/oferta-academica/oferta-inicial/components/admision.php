<?php
$data = require __DIR__ . '/../data/admision.php';
?>

<section class="section-padding bg-white" id="admision">
    <div class="content-wrapper">
        <h2 class="section-title">
            <i class="fas fa-clipboard-list"></i> <?= htmlspecialchars($data['title']); ?>
        </h2>

        <div class="accordion-container admission-accordion">
            <?php foreach ($data['accordions'] as $acc): ?>
                <div class="accordion-item">
                    <button class="accordion-header" type="button">
                        <i class="fas <?= htmlspecialchars($acc['icon']); ?>"></i>
                        <?= htmlspecialchars($acc['header']); ?>
                        <i class="fas fa-chevron-down accordion-icon"></i>
                    </button>

                    <div class="accordion-content">
                        <?php if ($acc['type'] === 'requirements'): ?>
                            <ul class="requirements-list-enhanced">
                                <?php foreach ($acc['items'] as $it): ?>
                                    <li>
                                        <i class="fas <?= htmlspecialchars($it['icon']); ?>"></i>
                                        <strong><?= htmlspecialchars($it['strong']); ?></strong>
                                        <?= htmlspecialchars($it['text']); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <?php if (!empty($acc['age_notice'])): ?>
                                <p class="mt-3 age-notice">
                                    <?= htmlspecialchars($acc['age_notice']); ?>
                                </p>
                            <?php endif; ?>

                        <?php else: ?>
                            <ul class="document-list">
                                <?php foreach ($acc['items'] as $it): ?>
                                    <li>
                                        <i class="fas <?= htmlspecialchars($it['icon']); ?>"></i>
                                        <?= htmlspecialchars($it['text']); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
$data = require __DIR__ . '/../data/admision.php';
?>
<section class="section-padding bg-light" id="admisiones">
    <div class="content-wrapper">
        <h2 class="section-title">
            <i class="fas fa-clipboard-list"></i> Proceso de Admisión I Ciclo
        </h2>

        <div class="accordion-container" data-accordion="ciclo1">

            <button class="accordion-header" type="button">
                <span><i class="fas fa-user-check"></i> Requisitos Clave</span>
                <i class="fas fa-chevron-down accordion-icon"></i>
            </button>
            <div class="accordion-content">
                <div class="age-notice"><?= htmlspecialchars($data['age_notice']); ?></div>

                <ul class="requirements-list-enhanced">
                    <?php foreach ($data['requirements'] as $req): ?>
                        <li><i class="fas fa-check"></i> <?= htmlspecialchars($req); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <button class="accordion-header" type="button">
                <span><i class="fas fa-folder-open"></i> Documentos a Presentar</span>
                <i class="fas fa-chevron-down accordion-icon"></i>
            </button>
            <div class="accordion-content">
                <ul class="document-list">
                    <?php foreach ($data['documents'] as $doc): ?>
                        <li><i class="fas fa-file-alt"></i> <?= htmlspecialchars($doc); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>
</section>
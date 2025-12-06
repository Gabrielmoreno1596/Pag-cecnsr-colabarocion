<?php
// assets/partials/oferta-academica/oferta-ciclo2/components/admision.php

$admisionData = require __DIR__ . '/../data/admision.php';

$sectionId = $admisionData['section_id'] ?? 'admisiones';
$title     = $admisionData['title']      ?? 'Proceso de Admisión';
$ageNotice = $admisionData['age_notice'] ?? '';
$requisitos = $admisionData['requisitos'] ?? [];
$documentos = $admisionData['documentos'] ?? [];
?>

<section class="section-padding bg-light" id="<?= htmlspecialchars($sectionId, ENT_QUOTES, 'UTF-8'); ?>">
    <div class="content-wrapper">
        <h2 class="section-title">
            <i class="fas fa-clipboard-list"></i>
            <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>
        </h2>

        <div class="accordion-container">

            <!-- Bloque: Requisitos Clave -->
            <div class="accordion-header" data-tab-name="requisitos">
                <i class="fas fa-user-check"></i>
                Requisitos Clave
                <i class="fas fa-chevron-down accordion-icon"></i>
            </div>

            <div class="accordion-content">
                <?php if (!empty($ageNotice)): ?>
                    <div class="age-notice">
                        <?= htmlspecialchars($ageNotice, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($requisitos)): ?>
                    <ul class="requirements-list-enhanced">
                        <?php foreach ($requisitos as $req): ?>
                            <li>
                                <i class="<?= htmlspecialchars($req['icon'] ?? 'fas fa-check', ENT_QUOTES, 'UTF-8'); ?>"></i>
                                <?= htmlspecialchars($req['text'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Bloque: Documentos a Presentar -->
            <div class="accordion-header" data-tab-name="documentos">
                <i class="fas fa-folder-open"></i>
                Documentos a Presentar
                <i class="fas fa-chevron-down accordion-icon"></i>
            </div>

            <div class="accordion-content">
                <?php if (!empty($documentos)): ?>
                    <ul class="document-list">
                        <?php foreach ($documentos as $doc): ?>
                            <li>
                                <i class="<?= htmlspecialchars($doc['icon'] ?? 'fas fa-file-alt', ENT_QUOTES, 'UTF-8'); ?>"></i>
                                <?= htmlspecialchars($doc['text'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
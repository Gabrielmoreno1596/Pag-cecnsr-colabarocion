<?php
$data       = require __DIR__ . '/../data/admision.php';
$requisitos = $data['requisitos'];
$documentos = $data['documentos'];
?>
<h2 class="section-title">
    <i class="fas <?= htmlspecialchars($data['section_icon'], ENT_QUOTES, 'UTF-8'); ?>"></i>
    <?= htmlspecialchars($data['section_title'], ENT_QUOTES, 'UTF-8'); ?>
</h2>

<div class="accordion-container">
    <div class="accordion-header" data-tab-name="requisitos">
        <i class="fas fa-user-check"></i>
        Requisitos Clave de Ingreso
        <i class="fas fa-chevron-down accordion-icon"></i>
    </div>
    <div class="accordion-content">
        <div class="age-notice">
            <?= htmlspecialchars($data['notice'], ENT_QUOTES, 'UTF-8'); ?>
        </div>
        <ul class="requirements-list-enhanced">
            <?php foreach ($requisitos as $req): ?>
                <li>
                    <i class="fas fa-check"></i>
                    <?= htmlspecialchars($req, ENT_QUOTES, 'UTF-8'); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="accordion-header" data-tab-name="documentos">
        <i class="fas fa-folder-open"></i>
        Documentos a Presentar
        <i class="fas fa-chevron-down accordion-icon"></i>
    </div>
    <div class="accordion-content">
        <ul class="document-list">
            <?php foreach ($documentos as $doc): ?>
                <li>
                    <i class="fas fa-file-alt"></i>
                    <?= htmlspecialchars($doc, ENT_QUOTES, 'UTF-8'); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php $r = $requisitosData; ?>

<section class="section" id="convocatorias">
    <div class="card">
        <h2 class="section-title"><?= $r['title'] ?></h2>
        <div class="title-divider" aria-hidden="true"></div>

        <ol class="timeline">
            <?php foreach ($r['steps'] as $i => $step): ?>
                <li>
                    <span class="dot"><?= $i + 1 ?></span>
                    <div class="tl-body"><?= $step ?></div>
                </li>
            <?php endforeach; ?>
        </ol>

        <p class="note"><?= $r['note'] ?></p>
    </div>

    <!-- Modal PDF (se usa por JS global) -->
    <div class="pdf-modal" id="pdfModal" hidden aria-modal="true" role="dialog" aria-labelledby="pdf-title">
        <div class="pdf-backdrop" data-close></div>

        <div class="pdf-dialog">
            <header class="pdf-head">
                <h3 id="pdf-title">Documento</h3>
                <button class="pdf-close" aria-label="Cerrar" data-close>✕</button>
            </header>

            <div class="pdf-body">
                <iframe id="pdfFrame" title="Visor de PDF" loading="lazy"></iframe>
                <p class="pdf-fallback" id="pdfFallback" hidden>
                    Tu navegador no pudo mostrar el PDF aquí.
                    <span>El visor está deshabilitado para descarga.</span>
                </p>
            </div>
        </div>
    </div>
</section>
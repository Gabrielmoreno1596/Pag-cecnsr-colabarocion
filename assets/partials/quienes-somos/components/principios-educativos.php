<?php
/**
 * Sección: Principios Educativos
 * - Diseño limpio y legible (acordeón nativo <details>)
 * - No requiere JS
 */

$pe = $data['principios_educativos'] ?? [];
$items = $pe['items'] ?? [];

if (!is_array($items)) {
  $items = [];
}
?>

<section class="section-padding qs-edu">
  <div class="qs-head" data-reveal="up">
    <span class="qs-eyebrow">Nuestro estilo de acompañamiento</span>
    <h2 class="section-title"><?= htmlspecialchars($pe['title'] ?? 'Principios Educativos'); ?></h2>
    <p class="qs-lead" data-reveal="up" data-reveal-delay="70">
      <?= htmlspecialchars($pe['subtitle'] ?? 'Principios que guían la pedagogía, la convivencia y el trabajo con cada estudiante.'); ?>
    </p>
  </div>

  <div class="qs-edu__layout" data-reveal="fade" data-reveal-delay="120">
    <aside class="qs-edu__aside">
      <div class="qs-edu__card">
        <div class="qs-edu__cardTop">
          <span class="qs-edu__icon" aria-hidden="true"><i class="fa-solid fa-graduation-cap"></i></span>
          <div>
            <p class="qs-edu__kicker">En la práctica</p>
            <h3 class="qs-edu__title">Principios que se viven</h3>
          </div>
        </div>
        <p class="qs-edu__text">
          Estos principios ayudan a crear un ambiente de aprendizaje seguro, humano y significativo.
          Están pensados para que cada estudiante se sienta acompañado, valorado y motivado a crecer.
        </p>

        <div class="qs-edu__chips" aria-label="Enfoques">
          <span class="qs-chip"><i class="fa-solid fa-hand-holding-heart" aria-hidden="true"></i> Buen trato</span>
          <span class="qs-chip"><i class="fa-solid fa-people-group" aria-hidden="true"></i> Comunidad</span>
          <span class="qs-chip"><i class="fa-solid fa-seedling" aria-hidden="true"></i> Formación</span>
        </div>

        <div class="qs-edu__note">
          <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
          <span>Tip: haz clic en cada principio para leer su fundamento.</span>
        </div>
      </div>
    </aside>

    <div class="qs-edu__list" role="list">
      <?php foreach ($items as $i => $it):
        $t = trim((string)($it['title'] ?? ''));
        $tx = trim((string)($it['text'] ?? ''));
        if ($t === '' && $tx === '') continue;
        $n = str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT);
      ?>
        <details class="qs-eduItem" role="listitem" data-reveal="up" data-reveal-delay="<?= 40 + ($i * 30); ?>">
          <summary class="qs-eduItem__sum">
            <span class="qs-eduItem__pill" aria-hidden="true"><?= htmlspecialchars($n); ?></span>
            <span class="qs-eduItem__title"><?= htmlspecialchars($t); ?></span>
            <span class="qs-eduItem__chev" aria-hidden="true"><i class="fa-solid fa-chevron-down"></i></span>
          </summary>
          <?php if ($tx): ?>
            <div class="qs-eduItem__body">
              <p><?= htmlspecialchars($tx); ?></p>
            </div>
          <?php endif; ?>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

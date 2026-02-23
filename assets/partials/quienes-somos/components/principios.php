<?php
/**
 * Sección: Principios Congregacionales (Tabs)
 * - Nuevo diseño: tabs accesibles (mejor lectura que carrusel)
 * - 3 items por data/quienes-somos.php
 */

$pr = $data['principios'] ?? [];
$items = $pr['items'] ?? [];

// Fallback mínimo si no hay data
if (empty($items)) {
  $items = [
    ['title' => 'FRANCISCANOS', 'theme' => 'wine', 'bg' => '', 'text' => ''],
    ['title' => 'EVANGÉLICOS', 'theme' => 'wine', 'bg' => '', 'text' => ''],
    ['title' => 'MARIANOS', 'theme' => 'blue', 'bg' => '', 'text' => ''],
  ];
}

$uid = 'qs-tabs-' . substr(md5(__FILE__), 0, 6);
?>

<section class="section-padding qs-principios">
  <div class="qs-head" data-reveal="up">
    <span class="qs-eyebrow">Formación con fundamento</span>
    <h2 class="section-title"><?= htmlspecialchars($pr['title'] ?? 'Nuestros principios congregacionales'); ?></h2>
    <?php if (!empty($pr['subtitle'])): ?>
      <p class="qs-lead" data-reveal="up" data-reveal-delay="70"><?= htmlspecialchars($pr['subtitle']); ?></p>
    <?php else: ?>
      <p class="qs-lead" data-reveal="up" data-reveal-delay="70">Tres pilares que inspiran nuestra vivencia educativa y comunitaria.</p>
    <?php endif; ?>
  </div>

  <div class="qs-tabs" data-tabs id="<?= htmlspecialchars($uid); ?>" data-reveal="fade" data-reveal-delay="120">
    <div class="qs-tablist" role="tablist" aria-label="Principios congregacionales">
      <?php foreach ($items as $i => $it):
        $title = $it['title'] ?? ('Principio ' . ($i + 1));
        $tabId = $uid . '-tab-' . $i;
        $panelId = $uid . '-panel-' . $i;
      ?>
        <button
          class="qs-tab<?= $i === 0 ? ' is-active' : ''; ?>"
          type="button"
          role="tab"
          id="<?= htmlspecialchars($tabId); ?>"
          aria-controls="<?= htmlspecialchars($panelId); ?>"
          aria-selected="<?= $i === 0 ? 'true' : 'false'; ?>"
          tabindex="<?= $i === 0 ? '0' : '-1'; ?>"
        >
          <?= htmlspecialchars($title); ?>
        </button>
      <?php endforeach; ?>
    </div>

    <div class="qs-tabpanels">
      <?php foreach ($items as $i => $it):
        $title = $it['title'] ?? '';
        $text  = trim((string)($it['text'] ?? ''));
        $theme = $it['theme'] ?? 'wine';
        $bg    = !empty($it['bg']) ? asset($it['bg']) : '';
        $panelId = $uid . '-panel-' . $i;
        $tabId = $uid . '-tab-' . $i;
        $accentClass = $theme === 'blue' ? 'is-blue' : 'is-wine';
      ?>
        <div
          class="qs-panel <?= $accentClass; ?><?= $i === 0 ? ' is-active' : ''; ?>"
          role="tabpanel"
          id="<?= htmlspecialchars($panelId); ?>"
          aria-labelledby="<?= htmlspecialchars($tabId); ?>"
          <?= $i === 0 ? '' : 'hidden'; ?>
        >
          <div class="qs-panel__grid">
            <div class="qs-panel__content">
              <h3 class="qs-panel__title"><?= htmlspecialchars($title); ?></h3>
              <?php if ($text): ?>
                <p class="qs-panel__text"><?= nl2br(htmlspecialchars($text)); ?></p>
              <?php endif; ?>
            </div>

            <div class="qs-panel__media" aria-hidden="true" style="<?= $bg ? '--panel-bg: url(\'' . $bg . '\')' : ''; ?>">
              <div class="qs-panel__badge">
                <i class="fa-solid fa-leaf" aria-hidden="true"></i>
                <span>CECNSR</span>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

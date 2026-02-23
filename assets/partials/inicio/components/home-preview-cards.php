<?php
/**
 * Componente reusable: sección de “previews” (cards) para Inicio.
 *
 * Uso en main.php:
 *   $previewKey = 'oferta'|'convenios'|'pastoral';
 *   require __DIR__ . '/components/home-preview-cards.php';
 */

$all = require __DIR__ . '/../data/home-previews.php';
$key = isset($previewKey) ? (string)$previewKey : 'oferta';

if (!isset($all[$key])) return;

$block = $all[$key];

$title = (string)($block['title'] ?? '');
$subtitle = (string)($block['subtitle'] ?? '');
$cta = $block['cta'] ?? null;
$items = $block['items'] ?? [];

$slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $key));
$slug = trim($slug, '-');
$id = 'home-preview-' . ($slug ?: 'section');

$kickers = [
  'oferta' => ['Explora', 'fa-solid fa-graduation-cap'],
  'convenios' => ['Conecta', 'fa-solid fa-handshake'],
  'pastoral' => ['Vive', 'fa-solid fa-church'],
];

$kicker = $kickers[$key][0] ?? 'Conoce';
$kickerIcon = $kickers[$key][1] ?? 'fa-solid fa-compass';
?>

<section id="<?= htmlspecialchars($id); ?>" class="home-preview section-padding" aria-labelledby="<?= htmlspecialchars($id); ?>-title">
  <div class="home-preview__inner">
    <header class="home-preview__head" data-reveal="up">
      <div class="home-kicker" aria-hidden="true">
        <span class="home-kicker__dot"><i class="<?= htmlspecialchars($kickerIcon); ?>"></i></span>
        <span class="home-kicker__text"><?= htmlspecialchars($kicker); ?></span>
      </div>

      <h2 id="<?= htmlspecialchars($id); ?>-title" class="section-title home-preview__title">
        <?= htmlspecialchars($title); ?>
      </h2>

      <?php if ($subtitle): ?>
        <p class="home-preview__sub"><?= htmlspecialchars($subtitle); ?></p>
      <?php endif; ?>
    </header>

    <div class="home-cards" role="list">
      <?php foreach ($items as $i => $card):
        $cardTitle = (string)($card['title'] ?? '');
        $desc = (string)($card['desc'] ?? '');
        $href = (string)($card['href'] ?? '#');
        $icon = (string)($card['icon'] ?? 'fa-solid fa-arrow-right');
        $tag  = (string)($card['tag'] ?? '');
        $imgRel = (string)($card['img'] ?? '');
        $img = $imgRel ? asset($imgRel) : '';
      ?>
        <a class="home-card" href="<?= htmlspecialchars($href); ?>" role="listitem" data-reveal="up" data-reveal-delay="<?= (int)min(240, $i * 60); ?>">
          <div class="home-card__media" aria-hidden="true">
            <?php if ($img): ?>
              <img src="<?= htmlspecialchars($img); ?>" alt="" loading="lazy" decoding="async">
            <?php endif; ?>
            <span class="home-card__overlay" aria-hidden="true"></span>
          </div>

          <div class="home-card__body">
            <div class="home-card__meta">
              <?php if ($tag): ?>
                <span class="home-card__tag"><?= htmlspecialchars($tag); ?></span>
              <?php endif; ?>
              <span class="home-card__icon" aria-hidden="true"><i class="<?= htmlspecialchars($icon); ?>"></i></span>
            </div>

            <h3 class="home-card__title"><?= htmlspecialchars($cardTitle); ?></h3>
            <?php if ($desc): ?>
              <p class="home-card__desc"><?= htmlspecialchars($desc); ?></p>
            <?php endif; ?>

            <span class="home-card__cta">Ver más <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
          </div>
        </a>
      <?php endforeach; ?>
    </div>

    <?php if (is_array($cta) && !empty($cta['href']) && !empty($cta['text'])): ?>
      <footer class="home-preview__footer" data-reveal="up" data-reveal-delay="120">
        <a class="btn-primary home-preview__btn" href="<?= htmlspecialchars((string)$cta['href']); ?>">
          <?= htmlspecialchars((string)$cta['text']); ?> <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
        </a>
      </footer>
    <?php endif; ?>
  </div>
</section>

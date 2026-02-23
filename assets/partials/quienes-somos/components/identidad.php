<?php
/**
 * Sección: Identidad institucional (Misión / Visión / Compromiso)
 * - Nuevo diseño: una sola sección limpia (3 cards) para mejor UX
 * - Mantiene anclajes: #qs-mision #qs-vision #qs-compromiso
 */

$identidad = $data['identidad'] ?? [];

$order = [
  'mision' => ['icon' => 'fa-solid fa-bullseye', 'label' => 'Misión'],
  'vision' => ['icon' => 'fa-solid fa-eye', 'label' => 'Visión'],
  'compromiso' => ['icon' => 'fa-solid fa-handshake-angle', 'label' => 'Compromiso'],
];

?>

<section class="section-padding qs-identidad">
  <header class="qs-head" data-reveal="up">
    <span class="qs-eyebrow">Identidad institucional</span>
    <h2 class="section-title">Misión, Visión y Compromiso</h2>
    <p class="qs-lead" data-reveal="up" data-reveal-delay="70">
      Conoce los pilares que guían nuestra formación integral, nuestro propósito y la forma en que servimos a la comunidad educativa.
    </p>
  </header>

  <div class="qs-identity-cards">
    <?php $i = 0; foreach ($order as $key => $meta):
      $sec = $identidad[$key] ?? [];
      $title = $sec['title'] ?? $meta['label'];
      $text  = trim((string)($sec['text'] ?? ''));
      $img   = !empty($sec['image']) ? asset($sec['image']) : '';
      $id    = 'qs-' . $key;
      $delay = 120 + ($i * 90);
      $i++;
    ?>
      <article class="qs-i-card" id="<?= htmlspecialchars($id); ?>" data-reveal="up" data-reveal-delay="<?= (int)$delay; ?>">
        <div class="qs-i-card__top">
          <span class="qs-i-icon" aria-hidden="true"><i class="<?= htmlspecialchars($meta['icon']); ?>"></i></span>
          <h3 class="qs-i-title"><?= htmlspecialchars($title); ?></h3>
        </div>

        <?php if ($text): ?>
          <p class="qs-i-text"><?= nl2br(htmlspecialchars($text)); ?></p>
        <?php endif; ?>

        <?php if ($img): ?>
          <div class="qs-i-thumb" style="--thumb: url('<?= $img; ?>');" aria-hidden="true"></div>
        <?php endif; ?>
      </article>
    <?php endforeach; ?>
  </div>

  <div class="qs-identity-actions" data-reveal="up" data-reveal-delay="420">
    <a class="qs-ghost" href="#qs-historia">Ver historia</a>
    <a class="qs-ghost" href="#qs-principios">Principios congregacionales</a>
    <a class="qs-ghost" href="#qs-valores">Valores</a>
  </div>
</section>

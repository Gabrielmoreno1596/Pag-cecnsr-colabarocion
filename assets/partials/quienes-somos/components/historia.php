<?php

/**
 * Sección: Historia (Página ¿Quiénes Somos?)
 * - Layout tipo “tarjeta editorial” como referencia (imagen grande + texto + CTA)
 * - Stats sobre la imagen (FUERA del recorte, como en Inicio)
 * - Fade automático entre imágenes con transición suave
 */

$hist = $data['historia'] ?? [];
$base = $hist['base'] ?? 'assets/partials/inicio/image/historia/';
$imgs = $hist['images'] ?? [];

// Títulos estilo screenshot
$sectionTitle = $hist['section_title'] ?? '¿Quiénes Somos?';
$headline     = $hist['headline'] ?? 'Nuestra Historia: Una Obra de Fe y Compromiso';

// Texto breve (evita scroll / desbordes)
$excerpt = $hist['excerpt'] ?? '';
if (!$excerpt && !empty($hist['paragraphs'][0])) {
  $excerpt = $hist['paragraphs'][0];
}

$ctaText = $hist['cta_text'] ?? 'Conócenos más';
$ctaHref = $hist['cta_href'] ?? '#identidad';
?>

<section id="qs-historia" class="section-padding qs-historia">
  <h2 class="section-title" data-reveal="up"><?= htmlspecialchars($sectionTitle); ?></h2>

  <div class="qs-history-card" data-reveal="fade" data-reveal-delay="120">
    <!-- MEDIA (izquierda) -->
    <div class="qs-history-media">
      <div class="qs-history-media__clip" aria-hidden="true">
        <div class="qs-history-fader">
          <?php foreach ($imgs as $img): ?>
            <img
              src="<?= asset($base . $img); ?>"
              alt="Historia CECNSR"
              class="qs-history-img"
              loading="lazy"
              decoding="async" />
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Stats overlay (por fuera del recorte) -->
      <div class="history-stats" aria-hidden="true">
        <div class="history-stat">
          <span class="history-stat__num">+30</span>
          <span class="history-stat__label">Años</span>
        </div>
        <div class="history-stat">
          <span class="history-stat__num">+1500</span>
          <span class="history-stat__label">Estudiantes</span>
        </div>
      </div>
    </div>

    <!-- CONTENIDO (derecha) -->
    <div class="history-text-block">
      <?php if (!empty($hist['paragraphs'])): ?>
        <?php foreach ($hist['paragraphs'] as $i => $p): ?>
          <p data-reveal="up" data-reveal-delay="<?= 120 + ($i * 60); ?>"><?= htmlspecialchars($p); ?></p>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if (!empty($hist['bullets_intro'])): ?>
        <p class="qs-bullets-intro" data-reveal="up" data-reveal-delay="320"><?= htmlspecialchars($hist['bullets_intro']); ?></p>
      <?php endif; ?>

      <?php if (!empty($hist['bullets'])): ?>
        <ul class="history-list" data-reveal="up" data-reveal-delay="380">
          <?php foreach ($hist['bullets'] as $b): ?>
            <li><i class="fa-solid fa-check"></i><?= htmlspecialchars($b); ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <?php if (!empty($hist['closing'])): ?>
        <p class="qs-closing" data-reveal="up" data-reveal-delay="460"><?= htmlspecialchars($hist['closing']); ?></p>
      <?php endif; ?>

      <div class="qs-actions" data-reveal="up" data-reveal-delay="520">
        <a class="qs-cta" href="<?= asset('index.php#quienes-somos'); ?>">Volver al Inicio</a>
      </div>
    </div>
  </div>

  <!-- Acción fuera del card (sin scroll) -->
  <div class="qs-actions qs-actions--outside" data-reveal="up" data-reveal-delay="420">
    <a class="qs-back" href="<?= asset('index.php#quienes-somos'); ?>">
      <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
      Volver al Inicio
    </a>
  </div>
</section>
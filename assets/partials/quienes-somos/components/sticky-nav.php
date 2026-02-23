<?php
/**
 * Mini menú interno (sticky)
 * - Navegación rápida por secciones
 * - Mantiene look & feel tipo "band/glass" del Inicio
 */

$items = [
  ['href' => '#qs-esencia', 'label' => 'Esencia', 'icon' => 'fa-solid fa-sparkles'],
  ['href' => '#qs-identidad', 'label' => 'Identidad', 'icon' => 'fa-solid fa-compass'],
  ['href' => '#qs-historia', 'label' => 'Historia', 'icon' => 'fa-solid fa-book-open'],
  ['href' => '#qs-principios-educativos', 'label' => 'Educativos', 'icon' => 'fa-solid fa-graduation-cap'],
  ['href' => '#qs-principios', 'label' => 'Congregación', 'icon' => 'fa-solid fa-seedling'],
  ['href' => '#qs-valores', 'label' => 'Valores', 'icon' => 'fa-solid fa-heart'],
];
?>

<div class="qs-sticky-nav-wrap" data-reveal="fade" data-reveal-delay="180">
  <nav class="qs-sticky-nav" aria-label="Secciones de ¿Quiénes Somos?">
    <?php foreach ($items as $it): ?>
      <a class="qs-sticky-nav__link" href="<?= $it['href']; ?>" data-qs-nav>
        <span class="qs-sticky-nav__ico" aria-hidden="true"><i class="<?= $it['icon']; ?>"></i></span>
        <span class="qs-sticky-nav__txt"><?= htmlspecialchars($it['label']); ?></span>
      </a>
    <?php endforeach; ?>
  </nav>
</div>

<?php

if (!isset($section) || !is_array($section)) {
  return;
}

$id = $section['id'] ?? 'convenios';
$eyebrow = $section['eyebrow'] ?? '';
$title = $section['title'] ?? 'Convenios';
$subtitle = $section['subtitle'] ?? '';
$items = $section['items'] ?? [];

/**
 * Normalizador de claves (para evitar errores por mayúsculas/espacios)
 */
$norm = function ($str) {
  $str = trim((string)$str);
  $str = mb_strtolower($str, 'UTF-8');
  $str = preg_replace('/\s+/', ' ', $str);
  return $str;
};

/**
 * Mapeo de logos por título (normalizado)
 * ✅ Usamos rutas consistentes dentro de /image/logos/
 */
$logoMap = [
  $norm('PASCH')         => asset('assets/img/inicio/logos/partner.png'),
  $norm('Proyecto Dual') => asset('assets/img/inicio/logos/kws.png'),
  $norm('Programa Dual') => asset('assets/img/inicio/logos/kws.png'),
  $norm('Integración')   => asset('assets/img/inicio/logos/logo-direccion-integracion.png'),
];

$fallbackLogo = asset('assets/img/inicio/logos/partner.png');
?>

<section id="<?= htmlspecialchars($id); ?>" class="convenios-logos section-padding">
  <header class="home-cards__head convenios-logos__head" data-reveal="up">
    <?php if ($eyebrow): ?>
      <p class="home-cards__eyebrow"><?= htmlspecialchars($eyebrow); ?></p>
    <?php endif; ?>

    <?php if ($title): ?>
      <h2 class="section-title home-cards__title"><?= htmlspecialchars($title); ?></h2>
    <?php endif; ?>

    <?php if ($subtitle): ?>
      <p class="home-cards__sub"><?= htmlspecialchars($subtitle); ?></p>
    <?php endif; ?>
  </header>

  <div class="convenios-logos__strip" role="list" aria-label="Convenios y alianzas">
    <?php foreach ($items as $i => $it): ?>
      <?php
      $href = $it['href'] ?? '#';
      $t = $it['title'] ?? '';
      $d = $it['desc'] ?? '';

      // ✅ Buscar por título normalizado
      $key = $norm($t);

      // ✅ 1) primero logoMap
      // ✅ 2) si el item trae logo desde JSON
      // ✅ 3) fallback seguro
      $logo = $logoMap[$key] ?? ($it['logo'] ?? $fallbackLogo);

      $delay = 80 + ($i * 70);
      ?>
      <a
        class="convenio-logo"
        href="<?= htmlspecialchars($href); ?>"
        role="listitem"
        data-reveal="up"
        data-reveal-delay="<?= (int)$delay; ?>">

        <span class="convenio-logo__mark" aria-hidden="true">
          <img
            class="convenio-logo__img"
            src="<?= htmlspecialchars($logo); ?>"
            alt="<?= htmlspecialchars($t); ?> logo"
            loading="lazy"
            decoding="async"
            onerror="this.onerror=null;this.src='<?= htmlspecialchars($fallbackLogo); ?>';" />
        </span>

        <span class="convenio-logo__meta">
          <span class="convenio-logo__title"><?= htmlspecialchars($t); ?></span>
          <span class="convenio-logo__desc"><?= htmlspecialchars($d); ?></span>
        </span>

        <span class="convenio-logo__cta" aria-hidden="true">
          <i class="fa-solid fa-arrow-right"></i>
        </span>
      </a>
    <?php endforeach; ?>
  </div>
</section>
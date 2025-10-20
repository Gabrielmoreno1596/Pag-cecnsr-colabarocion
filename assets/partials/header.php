<?php
// ===== Detectar ruta/slug actual =====
$curPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$curBase = basename($curPath);
$curSlug = strtolower(preg_replace('/\.php$/', '', $curBase));

// ===== Grupos de hijos =====
$OFERTA_CHILDREN    = ['oferta-inicial', 'oferta-ciclo1', 'oferta-ciclo2', 'oferta-ciclo3', 'oferta-bachillerato'];
$CONVENIOS_CHILDREN = ['convenios-pasch', 'convenios-dual', 'convenios-psicologia', 'convenios-integracion'];

// ===== Helpers de clases =====
function is_current($needle, $curSlug)
{
  return ($needle === $curSlug) ? ' is-current' : '';
}
function is_parent($children, $curSlug)
{
  return in_array($curSlug, $children) ? ' is-current-parent' : '';
}

// ===== ¿Qué submenú debe iniciar abierto? =====
$openSub = '';
if (in_array($curSlug, $OFERTA_CHILDREN))    $openSub = 'oferta';
if (in_array($curSlug, $CONVENIOS_CHILDREN)) $openSub = 'convenios';
?>

<header id="header-global" class="cecnsr-header" data-header role="banner" data-open-sub="<?= htmlspecialchars($openSub, ENT_QUOTES) ?>">
  <div class="cecnsr-header__inner">
    <a class="cecnsr-logo" href="index.php#hero" aria-label="CECNSR - Inicio">
      <img src="assets/1_CECNSR.png" alt="Logo CECNSR" class="cecnsr-logo__img" />
      <span class="cecnsr-logo__text">CECNSR</span>
    </a>

    <nav class="cecnsr-nav" id="cecnsr-nav" aria-label="Navegación principal">
      <ul class="cecnsr-nav__list">
        <li class="cecnsr-nav__item">
          <a class="cecnsr-nav__link<?= is_current('index', $curSlug); ?>" href="index.php#hero">Inicio</a>
        </li>

        <li class="cecnsr-nav__item cecnsr-dropdown<?= is_parent($OFERTA_CHILDREN, $curSlug); ?>">
          <button class="cecnsr-nav__link cecnsr-dropdown__toggle" type="button" aria-expanded="false" aria-haspopup="true" data-sub="oferta">
            Oferta Académica <i class="fas fa-caret-down" aria-hidden="true"></i>
          </button>
          <!-- Dropdown SOLO móvil (acordeón) -->
          <ul class="cecnsr-dropdown__menu" role="menu">
            <li role="none"><a role="menuitem" class="cecnsr-dropdown__link<?= is_current('oferta-inicial', $curSlug); ?>" href="oferta-inicial.php">Inicial y Parvularia</a></li>
            <li role="none"><a role="menuitem" class="cecnsr-dropdown__link<?= is_current('oferta-ciclo1', $curSlug); ?>" href="oferta-ciclo1.php">I Ciclo</a></li>
            <li role="none"><a role="menuitem" class="cecnsr-dropdown__link<?= is_current('oferta-ciclo2', $curSlug); ?>" href="oferta-ciclo2.php">II Ciclo</a></li>
            <li role="none"><a role="menuitem" class="cecnsr-dropdown__link<?= is_current('oferta-ciclo3', $curSlug); ?>" href="oferta-ciclo3.php">III Ciclo</a></li>
            <li role="none"><a role="menuitem" class="cecnsr-dropdown__link<?= is_current('oferta-bachillerato', $curSlug); ?>" href="oferta-bachillerato.php">Bachillerato (General, Diplomados y Técnicos)</a></li>
          </ul>
        </li>

        <li class="cecnsr-nav__item cecnsr-dropdown<?= is_parent($CONVENIOS_CHILDREN, $curSlug); ?>">
          <button class="cecnsr-nav__link cecnsr-dropdown__toggle" type="button" aria-expanded="false" aria-haspopup="true" data-sub="convenios">
            Convenios <i class="fas fa-caret-down" aria-hidden="true"></i>
          </button>
          <!-- Dropdown SOLO móvil (acordeón) -->
          <ul class="cecnsr-dropdown__menu" role="menu">
            <li role="none"><a role="menuitem" class="cecnsr-dropdown__link<?= is_current('convenios-pasch', $curSlug); ?>" href="convenios-pasch.php">Colegios PASCH</a></li>
            <li role="none"><a role="menuitem" class="cecnsr-dropdown__link<?= is_current('convenios-dual', $curSlug); ?>" href="convenios-dual.php">Proyecto DUAL</a></li>
            <li role="none"><a role="menuitem" class="cecnsr-dropdown__link<?= is_current('convenios-psicologia', $curSlug); ?>" href="convenios-psicologia.php">Psicología Individual</a></li>
            <li role="none"><a role="menuitem" class="cecnsr-dropdown__link<?= is_current('convenios-integracion', $curSlug); ?>" href="convenios-integracion.php">Integración</a></li>
          </ul>
        </li>

        <li class="cecnsr-nav__item">
          <a class="cecnsr-nav__link<?= is_current('pastoral-educativa', $curSlug); ?>" href="pastoral-educativa.php">Pastoral Educativa</a>
        </li>

        <li class="cecnsr-nav__item cecnsr-nav__item--cta">
          <a class="cecnsr-btn-cta<?= is_current('proceso-admision', $curSlug); ?>" href="proceso-admision.php">
            Nuevo Ingreso <i class="fas fa-user-plus" aria-hidden="true"></i>
          </a>
        </li>
      </ul>
    </nav>

    <button class="cecnsr-burger" id="cecnsr-burger" aria-label="Abrir menú" aria-expanded="false" aria-controls="cecnsr-nav">
      <i class="fas fa-bars" aria-hidden="true"></i>
    </button>
  </div>

  <!-- ===== SUBMENÚ HORIZONTAL (solo escritorio) ===== -->
  <div class="cecnsr-subbar" id="cecnsr-subbar" <?= $openSub ? '' : 'hidden'; ?>>
    <div class="cecnsr-subbar__inner">
      <ul class="cecnsr-subbar__list" data-sub="oferta" <?= ($openSub === 'oferta')    ? '' : 'hidden'; ?>>
        <li><a class="cecnsr-subbar__link<?= is_current('oferta-inicial', $curSlug); ?>" href="oferta-inicial.php">Inicial y Parvularia</a></li>
        <li><a class="cecnsr-subbar__link<?= is_current('oferta-ciclo1', $curSlug); ?>" href="oferta-ciclo1.php">I Ciclo</a></li>
        <li><a class="cecnsr-subbar__link<?= is_current('oferta-ciclo2', $curSlug); ?>" href="oferta-ciclo2.php">II Ciclo</a></li>
        <li><a class="cecnsr-subbar__link<?= is_current('oferta-ciclo3', $curSlug); ?>" href="oferta-ciclo3.php">III Ciclo</a></li>
        <li><a class="cecnsr-subbar__link<?= is_current('oferta-bachillerato', $curSlug); ?>" href="oferta-bachillerato.php">Bachillerato</a></li>
      </ul>
      <ul class="cecnsr-subbar__list" data-sub="convenios" <?= ($openSub === 'convenios') ? '' : 'hidden'; ?>>
        <li><a class="cecnsr-subbar__link<?= is_current('convenios-pasch', $curSlug); ?>" href="convenios-pasch.php">Colegios PASCH</a></li>
        <li><a class="cecnsr-subbar__link<?= is_current('convenios-dual', $curSlug); ?>" href="convenios-dual.php">Proyecto DUAL</a></li>
        <li><a class="cecnsr-subbar__link<?= is_current('convenios-psicologia', $curSlug); ?>" href="convenios-psicologia.php">Psicología Individual</a></li>
        <li><a class="cecnsr-subbar__link<?= is_current('convenios-integracion', $curSlug); ?>" href="convenios-integracion.php">Integración</a></li>
      </ul>
    </div>
  </div>

  <style>
    /* ===== Scope duro ===== */
    #header-global,
    #header-global * {
      box-sizing: border-box;
    }

    #header-global ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    /* ===== Paleta ===== */
    #header-global.cecnsr-header {
      --cecns-burgundy: #7f2d3c;
      --cecns-gold: #e0b13a;
      --cecns-navy: #15334a;
      --cecns-green: #2d8c3c;
      --h-bg: #fff;
      --h-text: var(--cecns-navy);
      --h-text-dim: color-mix(in srgb, var(--cecns-navy) 70%, #fff 30%);
      --h-border: color-mix(in srgb, var(--cecns-navy) 12%, #fff 88%);
      --h-shadow: 0 8px 24px rgba(0, 0, 0, .06);
      --h-accent-underline: var(--cecns-gold);
      --h-active-pill: color-mix(in srgb, var(--cecns-burgundy) 12%, #fff 88%);
      --h-parent-pill: color-mix(in srgb, var(--cecns-burgundy) 8%, #fff 92%);
      --h-cta: var(--cecns-gold);
      --h-cta-hover: color-mix(in srgb, var(--cecns-gold) 85%, #000 15%);
      --h-cta-text: #0f172a;
      --h-radius: 14px;
      --h-gap: 20px;
      --h-ease: 220ms cubic-bezier(.2, .8, .2, 1);
      position: sticky;
      top: 0;
      z-index: 1000;
      background: var(--h-bg);
      border-bottom: 1px solid var(--h-border);
      box-shadow: var(--h-shadow);
      /* position: relative; */
    }

    #header-global.cecnsr-header {
      /* …tus variables… */
      position: sticky;
      /* <-- mantener */
      top: 0;
      z-index: 1000;
      background: var(--h-bg);
      border-bottom: 1px solid var(--h-border);
      box-shadow: var(--h-shadow);
      /* QUITAR esta línea: position: relative; */
    }


    /* Contenedor */
    #header-global .cecnsr-header__inner {
      max-width: 1280px;
      margin: 0 auto;
      padding: 10px 16px;
      display: grid;
      grid-template-columns: auto 1fr auto;
      align-items: center;
      gap: var(--h-gap);
    }

    /* Logo */
    #header-global .cecnsr-logo {
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
      color: var(--h-text)
    }

    #header-global .cecnsr-logo__img {
      width: 34px;
      height: 34px;
      object-fit: contain
    }

    #header-global .cecnsr-logo__text {
      font: 700 20px/1.2 "Inter", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif
    }

    /* Nav */
    #header-global .cecnsr-nav {
      justify-self: end
    }

    #header-global .cecnsr-nav__list {
      display: flex;
      align-items: center;
      gap: 6px
    }

    #header-global .cecnsr-nav__item {
      position: relative
    }

    #header-global .cecnsr-nav__link {
      position: relative;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 14px;
      border-radius: 10px;
      text-decoration: none;
      color: var(--h-text-dim);
      font-weight: 600;
      letter-spacing: .2px;
      transition: background var(--h-ease), color var(--h-ease), transform var(--h-ease);
    }

    #header-global .cecnsr-nav__link:hover {
      background: rgba(0, 0, 0, .04);
      color: var(--h-text)
    }

    #header-global .cecnsr-nav__link::after {
      content: "";
      position: absolute;
      left: 12px;
      right: 12px;
      bottom: 6px;
      height: 3px;
      border-radius: 3px;
      background: transparent;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform var(--h-ease), background var(--h-ease);
    }

    #header-global .cecnsr-nav__link:hover::after {
      background: var(--h-accent-underline);
      transform: scaleX(1)
    }

    #header-global .cecnsr-nav__link.is-current {
      background: var(--h-active-pill);
      color: var(--h-text)
    }

    #header-global .cecnsr-nav__link.is-current::after {
      background: var(--h-accent-underline);
      transform: scaleX(1)
    }

    #header-global .cecnsr-dropdown.is-current-parent>.cecnsr-dropdown__toggle {
      background: var(--h-parent-pill);
      color: var(--h-text)
    }

    #header-global .cecnsr-dropdown__link.is-current {
      background: var(--h-active-pill);
      color: var(--h-text)
    }

    /* CTA */
    #header-global .cecnsr-btn-cta {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 14px;
      background: var(--h-cta);
      color: var(--h-cta-text);
      font-weight: 800;
      border-radius: var(--h-radius);
      box-shadow: 0 10px 22px rgba(224, 177, 58, .28);
      text-decoration: none;
      transition: transform var(--h-ease), box-shadow var(--h-ease), background var(--h-ease);
    }

    #header-global .cecnsr-btn-cta:hover {
      background: var(--h-cta-hover);
      transform: translateY(-1px);
      box-shadow: 0 14px 26px rgba(224, 177, 58, .35)
    }

    /* Dropdown (móvil) */
    #header-global .cecnsr-dropdown__toggle {
      cursor: pointer;
      background: none;
      border: none
    }

    #header-global .cecnsr-dropdown__menu {
      display: none;
      margin: 0;
      padding: 8px;
      background: #fff;
      border: 1px solid var(--h-border);
      border-radius: 12px;
      box-shadow: var(--h-shadow)
    }

    #header-global .cecnsr-dropdown__link {
      display: block;
      padding: 10px 12px;
      border-radius: 10px;
      color: var(--h-text-dim);
      text-decoration: none;
      transition: background var(--h-ease), color var(--h-ease)
    }

    #header-global .cecnsr-dropdown__link:hover {
      background: rgba(0, 0, 0, .04);
      color: var(--h-text)
    }

    /* Desktop: sin hover + burger oculta */
    @media (min-width: 993px) {
      #header-global .cecnsr-dropdown__menu {
        display: none !important;
      }

      #header-global .cecnsr-burger {
        display: none !important;
      }
    }

    /* Burger */
    #header-global .cecnsr-burger {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 42px;
      height: 42px;
      border-radius: 12px;
      border: 1px solid var(--h-border);
      background: #fff;
      color: var(--h-text);
      transition: background var(--h-ease), transform var(--h-ease)
    }

    #header-global .cecnsr-burger:hover {
      background: rgba(0, 0, 0, .04);
      transform: translateY(-1px)
    }

    /* Móvil: drawer derecha */
    @media (max-width: 992px) {
      #header-global .cecnsr-header__inner {
        grid-template-columns: auto 1fr auto;
        display: flex;
        justify-content: space-between;
      }

      #header-global .cecnsr-nav {
        position: fixed;
        top: 70px;
        right: 12px;
        left: auto;
        width: min(92vw, 380px);
        background: #fff;
        border: 1px solid var(--h-border);
        border-radius: 16px;
        box-shadow: var(--h-shadow);
        padding: 10px;
        transform: translateY(-8px);
        opacity: 0;
        visibility: hidden;
        transition: opacity var(--h-ease), transform var(--h-ease), visibility var(--h-ease);
      }

      #header-global .cecnsr-nav.is-active {
        opacity: 1;
        visibility: visible;
        transform: translateY(0)
      }

      #header-global .cecnsr-nav__list {
        flex-direction: column;
        align-items: stretch;
        gap: 4px
      }

      #header-global .cecnsr-nav__link {
        justify-content: space-between;
        width: 100%
      }

      #header-global .cecnsr-dropdown__menu {
        position: static;
        border: none;
        box-shadow: none;
        padding: 6px 6px 10px;
        margin-top: 4px
      }

      #header-global .cecnsr-dropdown.is-open>.cecnsr-dropdown__menu {
        display: block
      }
    }

    html.cecnsr-no-scroll {
      overflow: hidden
    }

    /* Sub-bar desktop centrada */
    #header-global .cecnsr-subbar {
      border-top: 1px solid var(--h-border);
      background: #fff;
    }

    #header-global .cecnsr-subbar[hidden] {
      display: none !important;
    }

    #header-global .cecnsr-subbar__inner {
      max-width: 1280px;
      margin: 0 auto;
      padding: 10px 16px;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      min-height: 56px;


    }

    #header-global .cecnsr-subbar__list {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin: 0;
      padding: 0
    }

    #header-global .cecnsr-subbar__list[hidden] {
      display: none !important;
    }

    #header-global .cecnsr-subbar__link {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 14px;
      border-radius: 999px;
      text-decoration: none;
      color: var(--h-text);
      background: color-mix(in srgb, var(--cecns-navy) 6%, #fff 94%);
      transition: background var(--h-ease), transform var(--h-ease), color var(--h-ease), box-shadow var(--h-ease);
      box-shadow: 0 1px 0 rgba(0, 0, 0, .02);
    }

    #header-global .cecnsr-subbar__link:hover {
      transform: translateY(-1px);
      background: color-mix(in srgb, var(--cecns-navy) 10%, #fff 90%)
    }

    #header-global .cecnsr-subbar__link.is-current {
      background: color-mix(in srgb, var(--cecns-gold) 25%, #fff 75%);
      box-shadow: 0 6px 16px rgba(224, 177, 58, .25)
    }

    @media (max-width: 992px) {
      #header-global .cecnsr-subbar {
        display: none !important;
      }

      #header-global .cecnsr-nav {
        position: fixed;
        /* top: calc(var(--header-h) + 10px); */
        /* ok */
        right: 12px;
        /* ... */
      }
    }


    /* Nuevos estilos  */

    /* ====== OVERRIDES DE COLOR (pegado al final) ====== */
    #header-global.cecnsr-header {
      /* variables nuevas para que sea fácil retocar luego */
      --nav-hover-bg: #004080;
      --nav-hover-text: #ffffff;

      /* Activo: si quieres que el activo sea SOLO subrayado, deja estas y comenta la regla .cecnsr-nav__link.is-current de abajo */
      --nav-active-bg: #004080;
      --nav-active-text: #ffffff;

      /* Submenú (píldoras) */
      --subpill-bg: #004080;
      --subpill-text: #ffffff;
      --subpill-hover-bg: #ffffff;
      --subpill-hover-text: #000000;

      /* subrayado sigue dorado; cámbialo aquí si lo quieres azul también */
      /* --h-accent-underline: #004080; */
    }

    /* ---------- MENÚ PRINCIPAL ---------- */
    #header-global .cecnsr-nav__link:hover {
      background: var(--nav-hover-bg) !important;
      color: var(--nav-hover-text) !important;
    }

    #header-global .cecnsr-nav__link:hover::after {
      background: var(--h-accent-underline) !important;
      /* dorado */
      transform: scaleX(1);
    }

    /* Activo (queda del color solicitado + subrayado) */
    #header-global .cecnsr-nav__link.is-current {
      background: var(--nav-active-bg) !important;
      /* <— comenta esta línea para “solo subrayado” */
      color: var(--nav-active-text) !important;
      /* <— y esta también */
    }

    #header-global .cecnsr-nav__link.is-current::after {
      background: var(--h-accent-underline) !important;
      transform: scaleX(1);
    }

    /* El padre activo (Oferta/Convenios) queda más sutil; si lo quieres igual que activo, usa las mismas var de arriba */
    #header-global .cecnsr-dropdown.is-current-parent>.cecnsr-dropdown__toggle {
      background: color-mix(in srgb, var(--nav-hover-bg) 12%, #fff 88%) !important;
      color: var(--h-text) !important;
    }

    /* ---------- SUBMENÚ HORIZONTAL (PÍLDORAS) ---------- */
    #header-global .cecnsr-subbar__link {
      background: var(--subpill-bg) !important;
      color: var(--subpill-text) !important;
      box-shadow: 0 1px 0 rgba(0, 0, 0, .04);
    }

    #header-global .cecnsr-subbar__link:hover {
      background: var(--subpill-hover-bg) !important;
      color: var(--subpill-hover-text) !important;
      transform: translateY(-1px);
    }

    #header-global .cecnsr-subbar__link.is-current {
      /* mantén la píldora en azul y dale un leve realce */
      background: var(--subpill-bg) !important;
      color: var(--subpill-text) !important;
      box-shadow: 0 8px 20px rgba(0, 64, 128, .25) !important;
    }

    /* ---------- DROPDOWN (MÓVIL) ---------- */
    #header-global .cecnsr-dropdown__link:hover {
      background: var(--nav-hover-bg) !important;
      color: var(--nav-hover-text) !important;
    }


    /* ===== SUBMENÚ: fondo azul global + texto blanco; activo en blanco/negro ===== */
    #header-global .cecnsr-subbar {
      background: #004080 !important;
      /* contenedor del submenú */
      border-top: none !important;
    }

    #header-global .cecnsr-subbar__inner {
      padding: 12px 16px !important;
    }

    /* Estado base de cada pill del submenú */
    #header-global .cecnsr-subbar__link {
      background: transparent !important;
      /* sin píldora, sobre el fondo azul */
      color: #ffffff !important;
      box-shadow: none !important;
    }

    /* Hover opcional (sutil) sin invertir colores */
    #header-global .cecnsr-subbar__link:hover {
      background: rgba(255, 255, 255, .12) !important;
      /* ligero realce */
      color: #ffffff !important;
      transform: translateY(0);
      /* sin “saltito” si no lo quieres */
    }

    /* ACTIVO: píldora blanca con texto negro */
    #header-global .cecnsr-subbar__link.is-current {
      background: #ffffff !important;
      color: #000000 !important;
      box-shadow: none !important;
    }

    /* Versión móvil  */

    /* ===== SUBMENÚ EN MÓVIL (<=992px): fondo azul global + texto blanco; activo blanco/negro ===== */
    @media (max-width: 992px) {

      /* Panel del submenú (la UL del acordeón) */
      #header-global .cecnsr-dropdown__menu {
        background: #004080 !important;
        border: none !important;
        box-shadow: none !important;
        border-radius: 1px !important;
        padding: 10px 10px 12px !important;
      }

      /* Separación entre los <li> */
      #header-global .cecnsr-dropdown__menu li+li {
        margin-top: 6px !important;
      }

      /* Enlaces del submenú */
      #header-global .cecnsr-dropdown__link {
        background: transparent !important;
        /* se ve el azul de fondo */
        color: #ffffff !important;
        border-radius: 999px !important;
        padding: 10px 12px !important;
        box-shadow: none !important;
        -webkit-tap-highlight-color: rgba(255, 255, 255, 0.15);
      }

      /* Hover/tap sutil en azul */
      #header-global .cecnsr-dropdown__link:hover {
        background: rgba(255, 255, 255, 0.14) !important;
        color: #ffffff !important;
      }

      /* ACTIVO (la página actual): píldora blanca con texto negro */
      #header-global .cecnsr-dropdown__link.is-current {
        background: #ffffff !important;
        color: #000000 !important;
      }
    }
  </style>

  <!-- ===== JS MÓVIL (burger/acordeón + abrir automáticamente el submenú actual) ===== -->
  <script>
    (() => {
      const root = document.getElementById('header-global');
      if (!root) return;

      const BP = 992;
      const isMobile = () => window.innerWidth <= BP;

      const nav = root.querySelector('#cecnsr-nav');
      const burger = root.querySelector('#cecnsr-burger');
      const toggles = root.querySelectorAll('.cecnsr-dropdown__toggle');
      const openSub = root.getAttribute('data-open-sub'); // 'oferta' | 'convenios' | ''

      function setBurger(open) {
        if (!burger) return;
        const i = burger.querySelector('i');
        burger.setAttribute('aria-expanded', String(open));
        if (i) {
          i.classList.toggle('fa-bars', !open);
          i.classList.toggle('fa-times', open);
        }
        document.documentElement.classList.toggle('cecnsr-no-scroll', open && isMobile());
      }

      function closeAllDropdowns() {
        root.querySelectorAll('.cecnsr-dropdown.is-open').forEach(dd => {
          dd.classList.remove('is-open');
          dd.querySelector('.cecnsr-dropdown__toggle')?.setAttribute('aria-expanded', 'false');
          const ic = dd.querySelector('.cecnsr-dropdown__toggle i');
          if (ic) {
            ic.classList.remove('fa-caret-up');
            ic.classList.add('fa-caret-down');
          }
        });
      }

      function openCurrentParentMobile() {
        if (!openSub) return;
        const btn = root.querySelector(`.cecnsr-dropdown__toggle[data-sub="${openSub}"]`);
        const dd = btn ? btn.closest('.cecnsr-dropdown') : null;
        if (!dd) return;
        // Abre ese dropdown y marca ícono/aria
        dd.classList.add('is-open');
        btn.setAttribute('aria-expanded', 'true');
        const ic = btn.querySelector('i');
        if (ic) {
          ic.classList.remove('fa-caret-down');
          ic.classList.add('fa-caret-up');
        }
      }

      burger?.addEventListener('click', () => {
        if (!isMobile()) return;
        const open = !nav.classList.contains('is-active');
        nav.classList.toggle('is-active', open);
        setBurger(open);
        if (open) {
          // Al abrir el menú móvil, abre automáticamente el submenú de la sección actual
          closeAllDropdowns();
          openCurrentParentMobile();
        } else {
          closeAllDropdowns();
        }
      });

      toggles.forEach(btn => {
        btn.addEventListener('click', (e) => {
          if (!isMobile()) return;
          e.preventDefault();
          const dd = btn.closest('.cecnsr-dropdown');
          const wasOpen = dd.classList.contains('is-open');
          // acordeón
          root.querySelectorAll('.cecnsr-dropdown.is-open').forEach(o => {
            if (o !== dd) {
              o.classList.remove('is-open');
              o.querySelector('.cecnsr-dropdown__toggle')?.setAttribute('aria-expanded', 'false');
              const ico = o.querySelector('.cecnsr-dropdown__toggle i');
              if (ico) {
                ico.classList.remove('fa-caret-up');
                ico.classList.add('fa-caret-down');
              }
            }
          });
          dd.classList.toggle('is-open', !wasOpen);
          btn.setAttribute('aria-expanded', String(!wasOpen));
          const ic = btn.querySelector('i');
          if (ic) {
            ic.classList.toggle('fa-caret-down', wasOpen);
            ic.classList.toggle('fa-caret-up', !wasOpen);
          }
        });
      });

      // Cierra al click fuera
      document.addEventListener('click', (e) => {
        if (!isMobile()) return;
        if (nav?.classList.contains('is-active') && !nav.contains(e.target) && !burger.contains(e.target)) {
          nav.classList.remove('is-active');
          setBurger(false);
          closeAllDropdowns();
        }
      });

      // Cierra al navegar
      nav?.querySelectorAll('a').forEach(a => {
        a.addEventListener('click', () => {
          if (!isMobile() || !nav.classList.contains('is-active')) return;
          nav.classList.remove('is-active');
          setBurger(false);
          closeAllDropdowns();
        });
      });

      // Si por CSS/estado ya está abierto al cargar y es móvil, abre el submenú actual
      if (isMobile() && nav?.classList.contains('is-active')) {
        closeAllDropdowns();
        openCurrentParentMobile();
      }

      // Reset al pasar a desktop
      let rTO;
      window.addEventListener('resize', () => {
        clearTimeout(rTO);
        rTO = setTimeout(() => {
          if (!isMobile()) {
            nav?.classList.remove('is-active');
            setBurger(false);
            closeAllDropdowns();
          }
        }, 120);
      });
    })();
  </script>

  <!-- ===== JS DESKTOP (sub-bar al clic + persistencia PHP) ===== -->
  <script>
    (() => {
      const root = document.getElementById('header-global');
      if (!root) return;

      const BP = 992,
        isDesktop = () => window.innerWidth > BP;

      const subbar = root.querySelector('#cecnsr-subbar');
      const lists = subbar ? subbar.querySelectorAll('.cecnsr-subbar__list') : [];
      const toggles = root.querySelectorAll('.cecnsr-dropdown__toggle');

      function showSub(which) {
        if (!subbar) return;
        subbar.hidden = false;
        lists.forEach(ul => ul.hidden = (ul.dataset.sub !== which));
        root.querySelectorAll('.cecnsr-dropdown').forEach(li => li.classList.remove('is-current-parent'));
        root.querySelector(`.cecnsr-dropdown__toggle[data-sub="${which}"]`)?.closest('.cecnsr-dropdown')?.classList.add('is-current-parent');
      }

      function hideSub() {
        if (!subbar) return;
        subbar.hidden = true;
        lists.forEach(ul => ul.hidden = true);
        root.querySelectorAll('.cecnsr-dropdown').forEach(li => li.classList.remove('is-current-parent'));
      }

      toggles.forEach(btn => {
        if (!btn.dataset.sub) {
          const t = btn.textContent.toLowerCase();
          if (t.includes('oferta')) btn.dataset.sub = 'oferta';
          if (t.includes('convenios')) btn.dataset.sub = 'convenios';
        }
        btn.addEventListener('click', (e) => {
          if (!isDesktop()) return; // en móvil lo maneja el bloque móvil
          e.preventDefault();
          const which = btn.dataset.sub;
          if (!which) return;
          const already = subbar && !subbar.hidden && Array.from(lists).some(ul => !ul.hidden && ul.dataset.sub === which);
          already ? hideSub() : showSub(which);
        });
      });

      // Cierra al click fuera
      /*       document.addEventListener('click', (e) => {
              if (!isDesktop() || !subbar || subbar.hidden) return;
              if (root.contains(e.target)) return; // clic dentro del header
              hideSub();
            }); */

      document.addEventListener('click', (e) => {
        if (!isDesktop() || !subbar || subbar.hidden) return;
        // si el clic fue en un enlace del submenú o en los toggles, deja actuar;
        // si fue "afuera", NO cierres automáticamente (evita cierres inesperados)
      });
      // Reset al pasar a móvil

      /*   const phpOpen = root.getAttribute('data-open-sub'); // 'oferta' | 'convenios' | ''
        if (isDesktop() && phpOpen) {
          // Garantiza que NO esté hidden y que se muestre la lista correcta
          if (subbar) {
            subbar.hidden = false;
            lists.forEach(ul => ul.hidden = (ul.dataset.sub !== phpOpen));
            root.querySelectorAll('.cecnsr-dropdown').forEach(li => li.classList.remove('is-current-parent'));
            root.querySelector(`.cecnsr-dropdown__toggle[data-sub="${phpOpen}"]`)?.closest('.cecnsr-dropdown')?.classList.add('is-current-parent');
          }
        } */


      let rTO;
      window.addEventListener('resize', () => {
        clearTimeout(rTO);
        rTO = setTimeout(() => {
          if (!isDesktop()) hideSub();
        }, 120);
      });
    })();
  </script>


  <script>
    (function() {
      const root = document.documentElement.style;

      function findHeader() {
        return document.querySelector('[data-header]') ||
          document.querySelector('.site-header') ||
          document.querySelector('header');
      }

      function isFixedOrSticky(el) {
        if (!el) return false;
        const pos = getComputedStyle(el).position;
        return pos === 'fixed' || pos === 'sticky';
      }

      function setHeaderH() {
        const header = findHeader();
        const h = header && isFixedOrSticky(header) ? header.offsetHeight : 0;
        root.setProperty('--header-h', h + 'px');
      }

      window.addEventListener('DOMContentLoaded', setHeaderH);
      window.addEventListener('load', setHeaderH);
      window.addEventListener('resize', setHeaderH);
      window.addEventListener('orientationchange', setHeaderH);
    })();
  </script>
</header>
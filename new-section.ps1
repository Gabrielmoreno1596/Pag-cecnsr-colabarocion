param(
  [Parameter(Mandatory=$true)]
  [string]$Name,                 # ej: oferta-academica

  [string]$Title = "",
  [string]$Lead  = "",
  [string]$BaseUrl = "/",
  [switch]$WithHero
)

# --- rutas base ---
$root     = (Get-Location).Path
$partials = Join-Path $root ("assets/partials/" + $Name)
$compDir  = Join-Path $partials "components"
$dataDir  = Join-Path $partials "data"
$cssDir   = Join-Path $partials "css"
$jsDir    = Join-Path $partials "js"

# --- crear carpetas ---
$dirs = @($partials,$compDir,$dataDir,$cssDir,$jsDir)
foreach($d in $dirs){ if(!(Test-Path $d)){ New-Item -ItemType Directory -Path $d | Out-Null } }

# --- nombres de archivos ---
$mainPhp  = Join-Path $partials "main.php"
$dataPhp  = Join-Path $dataDir   ($Name + "-data.php")
$cssFile  = Join-Path $cssDir    ($Name + ".css")
$jsFile   = Join-Path $jsDir     ($Name + ".js")
$heroPhp  = Join-Path $compDir   "hero.php"
$blockPhp = Join-Path $compDir   "block-a.php"

# --- valores por defecto ---
if([string]::IsNullOrWhiteSpace($Title)){
  $Title = ($Name -replace '-', ' ')
  $Title = [System.Globalization.CultureInfo]::CurrentCulture.TextInfo.ToTitleCase($Title)
}
if([string]::IsNullOrWhiteSpace($Lead)){
  $Lead  = "Subtítulo de $Title"
}

# ===== CONTENIDOS (placeholders) =====
$dataTpl = @'
<?php
/**
 * Datos de la sección __TITLE__
 * Estructura base para contenido editable.
 */
return [
  'title' => '__TITLE__',
  'lead'  => '__LEAD__',
  // Héroe opcional
  'hero'  => [
    'image' => 'assets/__NAME__/hero.jpg', // coloca tu imagen fuente aquí
    'alt'   => '__TITLE__',
    'sizes' => '100vw',
    'widths'=> [1200,1600,2000]
  ],
  // Bloque A (ejemplo)
  'blockA' => [
    'title' => 'Bloque A',
    'text'  => 'Contenido introductorio del bloque A.'
  ],
];
'@

$mainTpl = @'
<?php
/**
 * main.php — orquesta la sección '__NAME__'
 */
$data = require __DIR__ . '/data/__NAME__-data.php';

// Helpers y constantes globales
require_once __DIR__ . '/../../includes/img.php';
if (!defined('BASE_URL')) {
  define('BASE_URL', '__BASEURL__'); // ajusta si tu sitio vive en subcarpeta
}

// Cargar CSS/JS de la sección (si tu layout no lo hace de forma global)
echo '<link rel="stylesheet" href="' . BASE_URL . 'assets/partials/__NAME__/css/__NAME__.css">';
// echo '<script defer src="' . BASE_URL . 'assets/partials/__NAME__/js/__NAME__.js"></script>';

// Componentes
require __DIR__ . '/components/hero.php';
require __DIR__ . '/components/block-a.php';
'@

$heroTpl = @'
<?php if (!empty($data['hero'])): $h = $data['hero']; ?>
<section class="__NAME__-hero">
  <div class="__NAME__-hero__wrap container">
    <h1 class="__NAME__-hero__title"><?= htmlspecialchars($data['title']) ?></h1>
    <?php if (!empty($data['lead'])): ?>
      <p class="__NAME__-hero__lead"><?= htmlspecialchars($data['lead']) ?></p>
    <?php endif; ?>

    <?php
      // Usa el helper de imágenes: fuente en assets/, optimizadas en assets_web/
      echo picture_tag(
        $h['image'],
        $h['alt'] ?? $data['title'],
        $h['sizes'] ?? '100vw',
        $h['widths'] ?? [1200,1600,2000],
        true,              // AVIF habilitado (ajusta si tu IM no soporta)
        BASE_URL
      );
    ?>
  </div>
</section>
<?php endif; ?>
'@

$blockTpl = @'
<section class="__NAME__-block-a">
  <div class="container">
    <h2 class="__NAME__-block-a__title"><?= htmlspecialchars($data['blockA']['title']) ?></h2>
    <p class="__NAME__-block-a__text"><?= htmlspecialchars($data['blockA']['text']) ?></p>
  </div>
</section>
'@

$cssTpl = @'
/* __NAME__.css — estilos scoped para evitar choques */
.__NAME__-hero { background: var(--bg-white, #fff); color: var(--text-color, #111); padding: 2.5rem 0; }
.__NAME__-hero__wrap { max-width: 1080px; margin: 0 auto; padding: 0 1rem; text-align: center; }
.__NAME__-hero__title { font-size: clamp(1.8rem, 2.5vw, 2.6rem); margin: 0 0 .5rem; }
.__NAME__-hero__lead { opacity: .9; margin-bottom: 1rem; }

.__NAME__-block-a { padding: 2rem 0; }
.__NAME__-block-a__title { font-size: clamp(1.4rem, 2vw, 2.0rem); margin-bottom: .5rem; }
.__NAME__-block-a__text { line-height: 1.6; opacity: .95; }
'@

$jsTpl = @'
// __NAME__.js — scripts scoped (si se necesitan en la sección)
document.addEventListener("DOMContentLoaded", () => {
  // init sección __NAME__
});
'@

# ===== REEMPLAZOS =====
$dataContent = $dataTpl.Replace('__TITLE__', $Title).Replace('__LEAD__', $Lead).Replace('__NAME__', $Name)
$mainContent = $mainTpl.Replace('__NAME__', $Name).Replace('__BASEURL__', $BaseUrl)
$heroContent = $heroTpl.Replace('__NAME__', $Name)
$blockContent= $blockTpl.Replace('__NAME__', $Name)
$cssContent  = $cssTpl.Replace('__NAME__', $Name)
$jsContent   = $jsTpl.Replace('__NAME__', $Name)

# ===== ESCRIBIR ARCHIVOS (no sobrescribe si ya existen) =====
if (!(Test-Path $dataPhp)) { $dataContent | Out-File $dataPhp -Encoding UTF8 }
if (!(Test-Path $mainPhp)) { $mainContent | Out-File $mainPhp -Encoding UTF8 }
if (!(Test-Path $cssFile)) { $cssContent  | Out-File $cssFile -Encoding UTF8 }
if (!(Test-Path $jsFile))  { $jsContent   | Out-File $jsFile -Encoding UTF8 }
if ($WithHero) {
  if (!(Test-Path $heroPhp)) { $heroContent | Out-File $heroPhp -Encoding UTF8 }
}
if (!(Test-Path $blockPhp)) { $blockContent | Out-File $blockPhp -Encoding UTF8 }

Write-Host ("✅ Sección creada: assets/partials/{0}" -f $Name)
Write-Host "   - main.php"
Write-Host ("   - components/" + ($(if($WithHero){"hero.php, "}) + "block-a.php"))
Write-Host ("   - data/{0}-data.php" -f $Name)
Write-Host ("   - css/{0}.css" -f $Name)
Write-Host ("   - js/{0}.js" -f $Name)
Write-Host ""
Write-Host "Recuerda:"
Write-Host ("1) Coloca tu imagen de héroe en 'assets/{0}/hero.jpg' (fuente)." -f $Name)
Write-Host "2) Corre optimize-images.ps1 para generar AVIF/WebP en assets_web/."
Write-Host ("3) Incluye la sección desde tu página PHP: require __DIR__ . '/assets/partials/{0}/main.php';" -f $Name)

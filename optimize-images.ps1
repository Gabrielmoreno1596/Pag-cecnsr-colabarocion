# optimize-images.ps1 (v2)
# Recorre assets/, genera 800/1200/1600 en AVIF/WebP + fallback JPG y crea snippets HTML <picture>

# ====== PARÁMETROS ======
$SRC       = "assets"                 # Carpeta de origen
$DIST      = "assets_web"             # Carpeta de salida (se crea)
$WIDTHS    = @(800,1200,1600)         # Anchos a exportar
$Q_WEBP    = 78                       # Calidad WebP (70–85 recomendado)
$WEBP_M    = 6                        # Método WebP (0-6)
$Q_AVIF    = 62                       # Calidad AVIF (50–70 recomendado)
$AVIF_OK   = $true                    # Cambia a $false si tu IM no soporta AVIF
$Q_JPG     = 82                       # Calidad JPG fallback
$SNIPPETS  = "picture-snippets.html"  # Archivo de salida con los <picture>
$URL_BASE  = "/"                      # Prefijo URL (p.ej. "/" o "/contribuciones/sitececnsr/")

# ====== CHECKS ======
$magick = Get-Command magick -ErrorAction SilentlyContinue
if (-not $magick) {
  Write-Error "No se encontró 'magick' (ImageMagick). Instálalo y/o reinicia la consola."
  exit 1
}

# Normaliza rutas base
$srcRoot  = (Resolve-Path $SRC).Path
$distRoot = Join-Path (Get-Location).Path $DIST

# ====== PREP ======
if (!(Test-Path $DIST)) { New-Item -ItemType Directory -Path $DIST | Out-Null }
if (Test-Path $SNIPPETS) { Remove-Item $SNIPPETS -Force }
"" | Out-File $SNIPPETS -Encoding UTF8

# Copia estructura de subcarpetas
Get-ChildItem -Path $SRC -Recurse -Directory | ForEach-Object {
  $full = $_.FullName
  $rel  = $full.Substring($srcRoot.Length).TrimStart('\','/')
  $outDir = if ($rel) { Join-Path $DIST $rel } else { $DIST }
  if (!(Test-Path $outDir)) { New-Item -ItemType Directory -Path $outDir | Out-Null }
}

# ====== PROCESO ======
$images = Get-ChildItem -Path $SRC -Recurse -File -Include *.jpg,*.jpeg,*.png
foreach ($img in $images) {
  # Rutas relativas y de salida
  $relPath = $img.FullName.Substring($srcRoot.Length).TrimStart('\','/')
  $relDir  = Split-Path $relPath -Parent
  $name    = [System.IO.Path]::GetFileNameWithoutExtension($img.Name)

  $outDir = if ($relDir) { Join-Path $DIST $relDir } else { $DIST }
  if (!(Test-Path $outDir)) { New-Item -ItemType Directory -Path $outDir | Out-Null }

  # Construcción de srcset
  $webpSrcset = @()
  $avifSrcset = @()

  foreach ($w in $WIDTHS) {
    $webpOut = Join-Path $outDir "$name-$w.webp"
    $avifOut = Join-Path $outDir "$name-$w.avif"

    # WebP
    & magick "$($img.FullName)" -auto-orient -strip -filter Lanczos -resize "${w}x>" `
      -define webp:method=$WEBP_M -quality $Q_WEBP "$webpOut" 2>$null

    if ($AVIF_OK) {
      # AVIF (si está disponible en tu build)
      & magick "$($img.FullName)" -auto-orient -strip -filter Lanczos -resize "${w}x>" `
        -quality $Q_AVIF "$avifOut" 2>$null
    }

    # URL amigable (con prefijo $URL_BASE y separadores '/')
    if (Test-Path $webpOut) {
      $url = ($webpOut.Replace('\','/')).Replace((Get-Location).Path.Replace('\','/') + '/', $URL_BASE)
      $webpSrcset += "$url ${w}w"
    }
    if ($AVIF_OK -and (Test-Path $avifOut)) {
      $url = ($avifOut.Replace('\','/')).Replace((Get-Location).Path.Replace('\','/') + '/', $URL_BASE)
      $avifSrcset += "$url ${w}w"
    }
  }

  # Fallback JPG 1600
  $fallbackOut = Join-Path $outDir "$name-1600.jpg"
  & magick "$($img.FullName)" -auto-orient -strip -filter Lanczos -resize "1600x>" -quality $Q_JPG "$fallbackOut" 2>$null

  $fallbackUrl = ($fallbackOut.Replace('\','/')).Replace((Get-Location).Path.Replace('\','/') + '/', $URL_BASE)

  # ALT básico (ajústalo si quieres)
  $alt = $name.Replace("-"," ").Replace("_"," ")

  # Snippet <picture>
  $sizes = "100vw"
  $line  = "<picture>`n"
  if ($AVIF_OK -and $avifSrcset.Count -gt 0) {
    $line += "  <source type=`"image/avif`" srcset=`"$([string]::Join(', ', $avifSrcset))`" sizes=`"$sizes`">`n"
  }
  if ($webpSrcset.Count -gt 0) {
    $line += "  <source type=`"image/webp`" srcset=`"$([string]::Join(', ', $webpSrcset))`" sizes=`"$sizes`">`n"
  }
  # Nota: no ponemos height porque debe ser numérico; deja que el CSS controle la altura.
  $line += "  <img src=`"$fallbackUrl`" alt=`"$alt`" loading=`"lazy`" decoding=`"async`" width=`"1600`">`n"
  $line += "</picture>`n`n"

  Add-Content -Path $SNIPPETS -Value $line -Encoding UTF8
}

Write-Host "✅ Listo. Revisa:"
Write-Host "   - Carpeta optimizada: $DIST"
Write-Host "   - Snippets HTML:      $SNIPPETS"
Write-Host ""
Write-Host "Si tus URLs reales llevan subcarpeta (p. ej. /contribuciones/sitececnsr/), ajusta `$URL_BASE`."

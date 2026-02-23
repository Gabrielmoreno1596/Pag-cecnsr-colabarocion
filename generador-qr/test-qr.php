<?php
// ✅ Test rápido de QR (BORRAR antes de producción)

declare(strict_types=1);

require_once __DIR__ . '/app/config.php';

$base = app_base_url();
$text = $base . '/f/ABC123';

$qrUrl = $base . '/qr.php?token=' . urlencode(QR_TOKEN) . '&text=' . urlencode($text) . '&size=8&margin=2&ecc=M';
?><!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Test QR</title>
  <style>
    body{font-family:system-ui; padding:20px; background:#f5f7fb}
    .card{max-width:680px; margin:auto; background:#fff; border:1px solid rgba(0,0,0,.12); border-radius:16px; padding:16px}
    code{background:#f1f3f7; padding:3px 6px; border-radius:8px}
    img{display:block; max-width:260px; border:1px solid rgba(0,0,0,.12); border-radius:14px; padding:10px; background:#fff}
  </style>
</head>
<body>
  <div class="card">
    <h2>✅ Test QR</h2>
    <p>Si ves el QR abajo, entonces <b>qr.php + librería</b> están funcionando.</p>
    <p><b>URL QR:</b><br><code><?= htmlspecialchars($qrUrl) ?></code></p>
    <img src="<?= htmlspecialchars($qrUrl) ?>" alt="QR Test">
  </div>
</body>
</html>

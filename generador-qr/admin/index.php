<?php

declare(strict_types=1);
require_once __DIR__ . '/_guard.php';

require_once __DIR__ . '/../app/db.php';
require_once __DIR__ . '/../app/config.php';

$pdo = db();

// Últimos archivos
$stmt = $pdo->query("SELECT fl.*, ua.username
  FROM file_links fl
  LEFT JOIN users_admin ua ON ua.id = fl.uploaded_by
  ORDER BY fl.id DESC
  LIMIT 50");
$files = $stmt->fetchAll();
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>CECNSR Admin - Gestor de Archivos</title>
    <style>
        :root {
            --blue: #0b2e4a;
            --gold: #dcae27;
            --muted: #666;
        }

        body {
            font-family: system-ui;
            background: #f5f7fb;
            padding: 20px;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .card {
            background: #fff;
            border: 1px solid rgba(0, 0, 0, .12);
            border-radius: 16px;
            padding: 14px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, .08);
        }

        h2 {
            margin: 0;
            color: var(--blue);
        }

        .btn {
            padding: 10px 12px;
            border-radius: 12px;
            border: 0;
            cursor: pointer;
            font-weight: 800;
        }

        .btn-blue {
            background: var(--blue);
            color: #fff;
        }

        .btn-ghost {
            background: #eef1f5;
            color: var(--blue);
            border: 1px solid rgba(0, 0, 0, .10);
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        @media(max-width:900px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid rgba(0, 0, 0, .08);
            font-size: 13px;
            vertical-align: top;
        }

        th {
            color: var(--blue);
            text-align: left;
        }

        .pill {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 999px;
            background: #f1f3f7;
            border: 1px solid rgba(0, 0, 0, .10);
            font-size: 12px;
        }

        .mono {
            font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
        }

        a {
            color: var(--blue);
            text-decoration: none;
            font-weight: 700;
        }

        .muted {
            color: var(--muted);
        }

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        img.qr {
            width: 88px;
            height: 88px;
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, .10);
            background: #fff;
        }
    </style>
</head>

<body>

    <div class="top">
        <div>
            <h2>📁 Gestor Institucional de Archivos</h2>
            <div class="muted">Usuario: <b><?= htmlspecialchars($_SESSION['admin_user']) ?></b> • Rol: <b><?= htmlspecialchars($_SESSION['admin_role']) ?></b></div>
        </div>
        <div class="actions">
            <a class="btn btn-ghost" href="logout.php">Salir</a>
        </div>
    </div>

    <div class="grid">
        <div class="card">
            <h3 style="margin:0 0 8px; color:var(--blue);">⬆️ Subir archivo + Link corto + QR</h3>

            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label class="muted">Archivo (PDF, imágenes, DOCX)</label><br>
                <input type="file" name="file" required style="margin:8px 0 10px;"><br>

                <button class="btn btn-blue">Subir y generar</button>
                <div class="muted" style="margin-top:8px; font-size:12.5px;">
                    Máx <?= (int)(MAX_FILE_SIZE / 1024 / 1024) ?>MB • Se crea automáticamente un enlace tipo <span class="mono">/f/ABC123</span>
                </div>
            </form>
        </div>

        <div class="card">
            <h3 style="margin:0 0 8px; color:var(--blue);">📊 Estadísticas rápidas</h3>
            <?php
            $total = (int)$pdo->query("SELECT COUNT(*) FROM file_links")->fetchColumn();
            $clicks = (int)$pdo->query("SELECT IFNULL(SUM(clicks),0) FROM file_links")->fetchColumn();
            ?>
            <div class="pill">Archivos: <b><?= $total ?></b></div>
            <div class="pill">Clics totales: <b><?= $clicks ?></b></div>
            <div class="muted" style="margin-top:10px; font-size:12.5px;">
                Pronto podemos agregar gráficas por día/mes 🔥
            </div>
        </div>
    </div>

    <div class="card" style="margin-top:12px;">
        <h3 style="margin:0; color:var(--blue);">📄 Últimos archivos</h3>

        <table>
            <thead>
                <tr>
                    <th>Archivo</th>
                    <th>Link corto</th>
                    <th>QR</th>
                    <th>Stats</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($files as $f):
                    $base = app_base_url();
                    $short = $base . '/f/' . $f['code'];
                    $qrImg = $base . '/qr.php?token=' . urlencode(QR_TOKEN) . '&text=' . urlencode($short) . '&size=6&margin=2&ecc=M';
                ?>
                    <tr>
                        <td>
                            <b><?= htmlspecialchars($f['original_name']) ?></b><br>
                            <span class="muted">Subido por: <?= htmlspecialchars($f['username'] ?? 'N/A') ?></span><br>
                            <span class="muted">MIME: <?= htmlspecialchars($f['mime_type']) ?> • <?= round($f['file_size'] / 1024, 1) ?> KB</span>
                        </td>

                        <td>
                            <div class="mono"><?= htmlspecialchars($short) ?></div>
                            <div class="actions" style="margin-top:8px;">
                                <a href="<?= htmlspecialchars($short) ?>" target="_blank" class="btn btn-ghost">Abrir</a>
                                <button class="btn btn-ghost" onclick="copyText('<?= htmlspecialchars($short, ENT_QUOTES) ?>')">Copiar</button>
                            </div>
                        </td>

                        <td>
                            <a href="<?= htmlspecialchars($qrImg) ?>" target="_blank">
                                <img class="qr" src="<?= htmlspecialchars($qrImg) ?>" alt="QR">
                            </a>
                            <div class="actions" style="margin-top:8px;">
                                <a href="<?= htmlspecialchars($qrImg . '&download=1') ?>" target="_blank" class="btn btn-ghost">Descargar QR</a>
                            </div>
                        </td>

                        <td>
                            <div class="pill">Clics: <b><?= (int)$f['clicks'] ?></b></div><br>
                            <div class="muted" style="margin-top:8px;">
                                Último acceso:<br>
                                <span class="mono"><?= htmlspecialchars($f['last_access'] ?? '-') ?></span>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        async function copyText(txt) {
            try {
                await navigator.clipboard.writeText(txt);
                alert("✅ Copiado al portapapeles");
            } catch (e) {
                alert("No se pudo copiar. Copia manualmente.");
            }
        }
    </script>

</body>

</html>
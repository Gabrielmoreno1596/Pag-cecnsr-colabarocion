<?php

declare(strict_types=1);

// 🔐 Token institucional (igual que en qr.php)
$TOKEN = 'CECNSR-QR-2026';

// ✅ Ruta de logo (ajustable)
$LOGO_URL = 'assets/1_CECNSR.png';
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Generador QR Institucional - CECNSR</title>

    <style>
        :root {
            --cecnsr-blue: #0b2e4a;
            --cecnsr-gold: #dcae27;
            --cecnsr-wine: #7a1f2b;
            --text: #1b1b1b;
            --muted: #5a5a5a;
            --bg: #f5f7fb;
            --card: #ffffff;
            --border: rgba(15, 23, 42, .12);
            --shadow: 0 18px 55px rgba(0, 0, 0, .12);
            --radius: 18px;
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            padding: 24px;
            font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            background:
                radial-gradient(900px 500px at 10% 0%, rgba(220, 174, 39, .18), transparent 60%),
                radial-gradient(900px 500px at 90% 10%, rgba(11, 46, 74, .15), transparent 60%),
                var(--bg);
            color: var(--text);
        }

        .wrap {
            max-width: 980px;
            margin: 0 auto;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 14px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 240px;
        }

        .brand img {
            width: 54px;
            height: 54px;
            object-fit: contain;
            border-radius: 14px;
            background: #fff;
            padding: 6px;
            border: 1px solid var(--border);
            box-shadow: 0 8px 22px rgba(0, 0, 0, .08);
        }

        .brand h1 {
            margin: 0;
            font-size: 18px;
            line-height: 1.15;
            color: var(--cecnsr-blue);
        }

        .brand p {
            margin: 2px 0 0;
            font-size: 12.5px;
            color: var(--muted);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(90deg, rgba(11, 46, 74, .10), rgba(220, 174, 39, .12));
            border: 1px solid var(--border);
            padding: 8px 12px;
            border-radius: 999px;
            font-size: 12.5px;
            color: var(--cecnsr-blue);
            white-space: nowrap;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .header {
            padding: 18px 18px 0;
        }

        .title {
            margin: 0;
            font-size: 20px;
            color: var(--cecnsr-blue);
        }

        .subtitle {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.4;
        }

        .content {
            padding: 16px 18px 18px;
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 16px;
        }

        .panel {
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 14px;
            background: linear-gradient(180deg, rgba(11, 46, 74, .02), transparent);
        }

        label {
            font-size: 13px;
            font-weight: 700;
            color: var(--cecnsr-blue);
            display: block;
            margin: 10px 0 6px;
        }

        textarea,
        select,
        input {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 10px 12px;
            outline: none;
            font-size: 14px;
            background: #fff;
            transition: box-shadow .15s ease, border-color .15s ease;
        }

        textarea {
            min-height: 120px;
            resize: vertical
        }

        textarea:focus,
        select:focus,
        input:focus {
            border-color: rgba(220, 174, 39, .7);
            box-shadow: 0 0 0 4px rgba(220, 174, 39, .18);
        }

        .grid3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
            margin-top: 8px;
        }

        .btns {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 12px;
        }

        button {
            border: 0;
            border-radius: 14px;
            padding: 10px 14px;
            font-weight: 800;
            cursor: pointer;
            transition: transform .08s ease, filter .15s ease;
            font-size: 14px;
        }

        button:active {
            transform: translateY(1px)
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--cecnsr-blue), #104c78);
            color: #fff;
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--cecnsr-gold), #f3c94a);
            color: #3b2a00;
        }

        .btn-ghost {
            background: #f1f3f7;
            color: var(--cecnsr-blue);
            border: 1px solid var(--border);
        }

        .qrbox {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 260px;
            border: 1px dashed rgba(15, 23, 42, .22);
            border-radius: 16px;
            background:
                radial-gradient(240px 160px at 20% 10%, rgba(220, 174, 39, .12), transparent 60%),
                #fbfbfd;
            padding: 12px;
            position: relative;
            overflow: hidden;
        }

        .qrbox img {
            max-width: 240px;
            height: auto;
            display: none;
            border-radius: 12px;
            background: #fff;
            padding: 10px;
            box-shadow: 0 10px 24px rgba(0, 0, 0, .10);
        }

        .empty {
            text-align: center;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.35;
        }

        .linkbox {
            margin-top: 12px;
            display: grid;
            gap: 8px;
        }

        .tiny {
            font-size: 12.5px;
            color: var(--muted);
            line-height: 1.35;
        }

        .notice {
            margin-top: 12px;
            padding: 12px;
            border-radius: 16px;
            border: 1px solid rgba(122, 31, 43, .25);
            background: linear-gradient(180deg, rgba(122, 31, 43, .06), transparent);
            color: #4a1b22;
            font-size: 13px;
            line-height: 1.35;
        }

        .footer {
            padding: 14px 18px 18px;
            border-top: 1px solid var(--border);
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
            justify-content: space-between;
            color: var(--muted);
            font-size: 12.5px;
        }

        .pill {
            padding: 7px 10px;
            border-radius: 999px;
            border: 1px solid var(--border);
            background: #fff;
            color: var(--cecnsr-blue);
            font-weight: 700;
            font-size: 12px;
        }

        @media (max-width: 860px) {
            .content {
                grid-template-columns: 1fr;
            }

            .brand {
                min-width: auto
            }

            .grid3 {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="wrap">

        <div class="topbar">
            <div class="brand">
                <img src="<?= htmlspecialchars($LOGO_URL) ?>" alt="Logo CECNSR">
                <div>
                    <h1>CECNSR • Generador QR</h1>
                    <p>Herramienta institucional (sin anuncios)</p>
                </div>
            </div>

            <div class="badge">
                🔐 Acceso institucional activo
            </div>
        </div>

        <div class="card">
            <div class="header">
                <h2 class="title">Generá tu Código QR en segundos ✅</h2>
                <p class="subtitle">
                    Pegá un enlace o texto, personalizá el tamaño y descargalo en PNG.
                    Todo se genera localmente en el sitio (más seguro y sin publicidad).
                </p>
            </div>

            <div class="content">

                <!-- Panel izquierdo -->
                <div class="panel">
                    <label>Texto / URL para el QR</label>
                    <textarea id="text" placeholder="Ej: https://cecnsrosariosv.com/ o texto corto para compartir"></textarea>

                    <div class="grid3">
                        <div>
                            <label>Tamaño</label>
                            <select id="size">
                                <option value="6">6 (pequeño)</option>
                                <option value="8" selected>8 (normal)</option>
                                <option value="10">10 (grande)</option>
                                <option value="12">12 (extra grande)</option>
                            </select>
                        </div>
                        <div>
                            <label>Margen</label>
                            <select id="margin">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2" selected>2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div>
                            <label>ECC</label>
                            <select id="ecc">
                                <option value="L">L (baja)</option>
                                <option value="M" selected>M (media)</option>
                                <option value="Q">Q (alta)</option>
                                <option value="H">H (muy alta)</option>
                            </select>
                        </div>
                    </div>

                    <div class="btns">
                        <button class="btn-primary" onclick="generateQr()">Generar QR</button>
                        <button class="btn-gold" onclick="downloadQr()">Descargar PNG</button>
                        <button class="btn-ghost" onclick="copyLink()">Copiar enlace</button>
                        <button class="btn-ghost" onclick="clearAll()">Limpiar</button>
                    </div>

                    <div class="notice">
                        <b>Uso responsable:</b> Esta herramienta es institucional.
                        Verificá que el enlace sea legítimo antes de compartirlo.
                        Evitá links sospechosos o desconocidos.
                    </div>

                </div>

                <!-- Panel derecho -->
                <div class="panel">
                    <div class="qrbox">
                        <div class="empty" id="emptyMsg">
                            <b>Vista previa del QR</b><br>
                            Aquí aparecerá tu código QR para descargar o compartir.
                        </div>
                        <img id="qrImg" alt="QR Preview">
                    </div>

                    <div class="linkbox">
                        <label>Enlace generado</label>
                        <input id="qrLink" type="text" readonly placeholder="Primero generá un QR...">
                        <div class="tiny">
                            Este enlace sirve para generar el QR nuevamente con los mismos parámetros.
                        </div>
                    </div>

                </div>

            </div>

            <div class="footer">
                <div class="pill">✅ Sin anuncios</div>
                <div class="pill">✅ Generación local</div>
                <div class="pill">✅ Formato PNG</div>
            </div>
        </div>

    </div>

    <script>
        // Token interno (no visible al usuario final)
        const TOKEN = "<?= addslashes($TOKEN) ?>";

        function buildQrUrl(download = false) {
            const text = document.getElementById('text').value.trim();
            const size = document.getElementById('size').value;
            const margin = document.getElementById('margin').value;
            const ecc = document.getElementById('ecc').value;

            if (!text) {
                alert("Escribí un texto o URL para generar el QR.");
                return null;
            }

            const url = new URL("qr.php", window.location.href);
            url.searchParams.set("token", TOKEN);
            url.searchParams.set("text", text);
            url.searchParams.set("size", size);
            url.searchParams.set("margin", margin);
            url.searchParams.set("ecc", ecc);

            if (download) url.searchParams.set("download", "1");
            return url.toString();
        }

        function generateQr() {
            const url = buildQrUrl(false);
            if (!url) return;

            const img = document.getElementById('qrImg');
            const empty = document.getElementById('emptyMsg');
            const link = document.getElementById('qrLink');

            img.src = url;
            img.style.display = "block";
            empty.style.display = "none";
            link.value = url;
        }

        function downloadQr() {
            const url = buildQrUrl(true);
            if (!url) return;
            window.open(url, "_blank");
        }

        async function copyLink() {
            const link = document.getElementById('qrLink').value.trim();
            if (!link) {
                alert("Primero generá un QR para obtener el enlace.");
                return;
            }
            try {
                await navigator.clipboard.writeText(link);
                alert("✅ Enlace copiado al portapapeles.");
            } catch (e) {
                // fallback
                const input = document.getElementById('qrLink');
                input.focus();
                input.select();
                document.execCommand("copy");
                alert("✅ Enlace copiado.");
            }
        }

        function clearAll() {
            document.getElementById('text').value = "";
            document.getElementById('qrLink').value = "";

            const img = document.getElementById('qrImg');
            const empty = document.getElementById('emptyMsg');

            img.src = "";
            img.style.display = "none";
            empty.style.display = "block";
        }
    </script>

</body>

</html>
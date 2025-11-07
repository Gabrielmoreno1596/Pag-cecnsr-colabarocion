<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/config.mail.php';
$sent = isset($_GET['ok']) && $_GET['ok'] === '1';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CECNSR | Nuevo Ingreso</title>

    <link rel="stylesheet" href="<?= BASE_URL ?>styles.css?v=<?= ASSET_VER ?? '1' ?>">
    <!-- Deja una sola inclusión de ni-form.css -->
    <link rel="stylesheet" href="<?= asset('assets/partials/nuevo-ingreso/css/ni-form.css') ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
    <link rel="shortcut icon" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>" type="image/png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/1_CECNSR.png?v=1'); ?>">
    <meta name="theme-color" content="#7f2d3c">
</head>

<body>
    <?php include PROJECT_PATH . 'assets/partials/header.php'; ?>
    <?php require_once PROJECT_PATH . 'assets/partials/r-sociales.php'; ?>

    <main id="main-content" class="ni ni-page">
        <?php
        // Componer la sección usando componentes
        require PROJECT_PATH . 'assets/partials/nuevo-ingreso/main.php';

        ?>
    </main>

    <?php require PROJECT_PATH . 'assets/partials/footer.php'; ?>



    <?php if (RECAPTCHA_ENABLED): ?>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <?php endif; ?>

    <script type="module" src="<?= asset('assets/partials/nuevo-ingreso/js/ni-form.js') ?>"></script>
    <!-- Si tienes lógica adicional modularizada -->
    <script>
        (() => {
            const form = document.querySelector('#form-nuevo-ingreso');
            if (!form) return;
            const msg = document.getElementById('form-msg');

            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const btn = form.querySelector('button[type="submit"]');
                btn.disabled = true;
                btn.textContent = 'Enviando...';
                msg.textContent = '';

                try {
                    const res = await fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form)
                    });
                    let data;
                    try {
                        data = await res.json();
                    } catch {
                        data = {
                            ok: false,
                            msg: 'Respuesta no válida del servidor.'
                        };
                    }

                    msg.style.color = data.ok ? 'green' : 'crimson';
                    msg.textContent = data.msg || (data.ok ? 'Enviado.' : 'Error.');
                    if (data.ok) form.reset();
                    if (window.grecaptcha && grecaptcha.reset) grecaptcha.reset();
                } catch {
                    msg.style.color = 'crimson';
                    msg.textContent = 'Error de red. Intenta de nuevo.';
                } finally {
                    btn.disabled = false;
                    btn.textContent = 'Enviar Solicitud de Admisión';
                }
            });
        })();
    </script>


</body>

</html>
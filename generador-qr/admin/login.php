<?php

declare(strict_types=1);
session_start();

require_once __DIR__ . '/../app/db.php';

$error = '';
$debug = '';

// Mostrar información de ayuda SOLO en localhost
$isLocalHttp = isset($_SERVER['HTTP_HOST']) && in_array($_SERVER['HTTP_HOST'], ['localhost', '127.0.0.1'], true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string)($_POST['username'] ?? ''));
    $password = (string)($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $error = 'Completa usuario y contraseña.';
    } else {
        try {
            $pdo = db();

            if ($isLocalHttp) {
                $currentDb = (string)($pdo->query('SELECT DATABASE()')->fetchColumn() ?: '');
                $debug = "Conectado a BD: <b>" . htmlspecialchars($currentDb) . "</b>";
            }

            $stmt = $pdo->prepare("SELECT * FROM users_admin WHERE username = ? AND is_active = 1 LIMIT 1");
            $stmt->execute([$username]);
            $user = $stmt->fetch();
        } catch (Throwable $e) {
            $error = 'Error de conexión a BD: ' . $e->getMessage();
            $user = null;
        }

        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['admin_id'] = (int)$user['id'];
            $_SESSION['admin_user'] = $user['username'];
            $_SESSION['admin_role'] = $user['role'];
            header("Location: index.php");
            exit;
        } else {
            if ($isLocalHttp) {
                if (!$user) {
                    $error = 'Usuario no encontrado o inactivo (is_active=0).';
                } else {
                    $error = 'Contraseña incorrecta.';
                }
            } else {
                $error = 'Credenciales incorrectas.';
            }
        }
    }
}
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>CECNSR Admin - Login</title>
    <style>
        body {
            font-family: system-ui;
            background: #f5f7fb;
            padding: 24px;
        }

        .box {
            max-width: 420px;
            margin: auto;
            background: #fff;
            padding: 18px;
            border-radius: 16px;
            border: 1px solid rgba(0, 0, 0, .12);
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        h2 {
            margin: 0 0 10px;
            color: #0b2e4a;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, .15);
            margin: 6px 0 10px;
        }

        button {
            width: 100%;
            padding: 10px;
            border-radius: 12px;
            border: 0;
            background: #0b2e4a;
            color: #fff;
            font-weight: 800;
            cursor: pointer;
        }

        .err {
            background: #ffe9ea;
            border: 1px solid #ffb4b8;
            color: #7a1f2b;
            padding: 10px;
            border-radius: 12px;
            margin-bottom: 10px;
        }

        small {
            color: #666;
        }
    </style>
</head>

<body>
    <div class="box">
        <h2>🔐 Panel Institucional</h2>
        <small>Acceso restringido • CECNSR</small>
        <?php if ($debug): ?>
            <div style="margin-top:6px;color:#6b7280;font-size:12.5px;">
                <?= $debug ?>
            </div>
        <?php endif; ?>
        <br><br>

        <?php if ($error): ?>
            <div class="err"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post">
            <label>Usuario</label>
            <input name="username" autocomplete="username" required>

            <label>Contraseña</label>
            <input name="password" type="password" autocomplete="current-password" required>

            <button>Entrar</button>
        </form>
    </div>
</body>

</html>
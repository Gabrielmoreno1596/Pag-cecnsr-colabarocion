<?php
/**
 * RESET LOCAL (SOLO PARA PRUEBAS)
 *
 * ✅ Crea o resetea el usuario admin en LOCALHOST.
 * - Usuario: admin
 * - Contraseña: TuClaveSegura2026!
 *
 * ⚠️ IMPORTANTE: BORRAR este archivo antes de subir a producción.
 */

declare(strict_types=1);

$host = $_SERVER['HTTP_HOST'] ?? '';
if (!in_array($host, ['localhost', '127.0.0.1'], true)) {
    http_response_code(404);
    exit;
}

require_once __DIR__ . '/../app/db.php';

$pdo = db();

$username = 'admin';
$plain = 'TuClaveSegura2026!';
$hash = password_hash($plain, PASSWORD_DEFAULT);

// Si existe, actualiza. Si no, lo crea.
$stmt = $pdo->prepare('SELECT id FROM users_admin WHERE username = ? LIMIT 1');
$stmt->execute([$username]);
$id = $stmt->fetchColumn();

if ($id) {
    $upd = $pdo->prepare('UPDATE users_admin SET password_hash = ?, role = "admin", is_active = 1 WHERE id = ?');
    $upd->execute([$hash, (int)$id]);
    $action = 'actualizado';
} else {
    $ins = $pdo->prepare('INSERT INTO users_admin (username, password_hash, role, is_active) VALUES (?, ?, "admin", 1)');
    $ins->execute([$username, $hash]);
    $action = 'creado';
}

$currentDb = (string)($pdo->query('SELECT DATABASE()')->fetchColumn() ?: '');

header('Content-Type: text/plain; charset=utf-8');

echo "OK ✅ Usuario admin {$action}.\n";
echo "BD: {$currentDb}\n";
echo "Usuario: admin\n";
echo "Contraseña: {$plain}\n";
echo "\n⚠️ Borra este archivo antes de subir a producción: admin/reset_local_admin.php\n";

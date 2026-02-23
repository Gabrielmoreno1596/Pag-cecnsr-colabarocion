<?php
// ✅ Test rápido de BD (BORRAR antes de producción)

declare(strict_types=1);

require_once __DIR__ . '/app/db.php';

header('Content-Type: text/plain; charset=utf-8');

try {
    $pdo = db();
    echo "✅ Conexión BD OK\n";

    // Comprobar tablas clave
    $tables = ['users_admin', 'file_links'];
    foreach ($tables as $t) {
        $stmt = $pdo->query("SELECT COUNT(*) FROM {$t}");
        $count = (int)$stmt->fetchColumn();
        echo "✅ Tabla {$t} OK (registros: {$count})\n";
    }

} catch (Throwable $e) {
    echo "❌ Error BD: " . $e->getMessage() . "\n";
}

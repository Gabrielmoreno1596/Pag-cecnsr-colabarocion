<?php

declare(strict_types=1);

/**
 * Conexión PDO (MySQL)
 *
 * ✅ Recomendado (producción/hosting):
 *   Definir variables de entorno:
 *     DB_HOST, DB_NAME, DB_USER, DB_PASS
 *
 * ✅ Modo LOCAL (XAMPP/WAMP/Laragon):
 *   Si estás trabajando en localhost y NO configuraste env vars,
 *   por defecto usará:
 *     DB_HOST=localhost
 *     DB_NAME=generador_qr
 *     DB_USER=root
 *     DB_PASS="" (vacío)
 *
 * 👉 Puedes cambiar los defaults de LOCAL abajo si tu BD se llama distinto.
 */
function db(): PDO
{
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $host = getenv('DB_HOST') ?: 'localhost';

    // Detectar si estamos en local
    $serverName = $_SERVER['SERVER_NAME'] ?? '';
    $isLocal = in_array($serverName, ['localhost', '127.0.0.1'], true);

    // Defaults para LOCAL (cámbialos si tu base se llama diferente)
    $localDbName = 'Generador-qr';  // <-- si tu BD se llama así, déjalo
    $localUser   = 'root';
    $localPass   = '';

    // Si NO hay variables de entorno, usamos defaults según ambiente
    $dbname = getenv('DB_NAME') ?: ($isLocal ? $localDbName : 'Generador-qr');
    $user   = getenv('DB_USER') ?: ($isLocal ? $localUser : 'root');
    $pass   = getenv('DB_PASS') ?: ($isLocal ? $localPass : '');

    // Si el usuario no configuró la BD en producción, damos un error más claro
    $placeholders = ['TU_DB', 'TU_USER', 'TU_PASS'];
    if (!$isLocal && (in_array($dbname, $placeholders, true) || in_array($user, $placeholders, true))) {
        throw new RuntimeException(
            "⚠️ BD sin configurar en producción. Edita app/db.php o define DB_HOST, DB_NAME, DB_USER, DB_PASS."
        );
    }

    $charset = 'utf8mb4';
    $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
    } catch (PDOException $e) {
        // Mensaje más claro para LOCAL
        if ($isLocal) {
            throw new RuntimeException(
                "❌ Error de BD en LOCAL.\n" .
                    "Revisa: DB_NAME='{$dbname}', DB_USER='{$user}', DB_PASS='{$pass}'.\n" .
                    "En XAMPP normalmente es: usuario 'root' y contraseña vacía ('').\n\n" .
                    "Detalle técnico: " . $e->getMessage()
            );
        }

        // Producción: pasamos el error original
        throw $e;
    }
}

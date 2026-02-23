# Generador QR + Gestor de Archivos (Localhost)

## 1) Requisitos
- PHP 8.x recomendado
- Extensiones: PDO MySQL, fileinfo (recomendado)
- MySQL / MariaDB (XAMPP / WAMP / Laragon)

## 2) Base de datos
En phpMyAdmin, ejecuta los SQL del documento que te compartí:
- users_admin
- file_links

Luego crea el usuario admin insertando un hash en `users_admin`.

✅ TIP (solo para pruebas en localhost):
- Abre este archivo una sola vez para crear/recuperar el admin automáticamente:
  - `http://localhost/.../generador-qr/admin/reset_local_admin.php`
- Usuario: `admin`
- Contraseña: `TuClaveSegura2026!`

⚠️ Borra `admin/reset_local_admin.php` antes de subir a producción.

## 3) Configurar BD
Edita:
- `app/db.php`

Opciones:
- Poner tus credenciales directamente (rápido)
- O usar variables de entorno (DB_HOST, DB_NAME, DB_USER, DB_PASS)

## 4) BASE_URL
En `app/config.php` puedes:
- Dejar `BASE_URL = ''` para autodetección (recomendado)
- O forzar por ejemplo:
  - http://localhost/generado-qr

## 5) Pruebas rápidas
- Probar BD:
  - `http://localhost/generado-qr/test-db.php`
- Probar QR:
  - `http://localhost/generado-qr/test-qr.php`
- Panel admin:
  - `http://localhost/generado-qr/admin/login.php`

> Cuando todo funcione, borra `test-db.php` y `test-qr.php` antes de subir a hosting.

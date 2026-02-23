<?php
/**
 * EJEMPLO (NO USAR EN PRODUCCIÓN)
 *
 * Genera un hash para una contraseña.
 * Usalo 1 sola vez en LOCAL y luego borrá el archivo.
 */

echo password_hash('TuClaveSegura2026!', PASSWORD_DEFAULT);

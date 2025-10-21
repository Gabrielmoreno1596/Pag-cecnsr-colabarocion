<?php

/**
 * Componente: Aviso “en desarrollo / mantenimiento”
 * Uso:
 *   // (opcional) sobreescribe por página
 *   $UNDER_DEV = [
 *     'icon'    => '🛠️',
 *     'title'   => 'Esta página está en construcción',
 *     'message' => 'Estamos mejorando el contenido. Gracias por tu paciencia.',
 *     'email'   => 'cecnsrosario@hotmail.com',
 *   ];
 *   require PROJECT_PATH . 'assets/partials/ui/under-dev.php';
 */

$cfg = array_merge([
    'icon'    => '🛠️',
    'title'   => 'Esta página está en construcción',
    'message' => 'Estamos mejorando el contenido. Gracias por tu paciencia.',
    'email'   => 'cecnsrosario@hotmail.com',
], isset($UNDER_DEV) && is_array($UNDER_DEV) ? $UNDER_DEV : []);
?>

<section class="under-dev" role="note" aria-label="Aviso de desarrollo">
    <div class="under-dev__icon" aria-hidden="true"><?= htmlspecialchars($cfg['icon']) ?></div>
    <h2 class="under-dev__title"><?= htmlspecialchars($cfg['title']) ?></h2>
    <p class="under-dev__text">
        <?= htmlspecialchars($cfg['message']) ?>
        Si necesitas algo urgente, escríbenos a
        <a href="mailto:<?= htmlspecialchars($cfg['email']) ?>"><?= htmlspecialchars($cfg['email']) ?></a>.
    </p>
</section>

<style>
    .under-dev {
        margin: 1.25rem 0;
        padding: 1rem 1.25rem;
        border: 1px dashed rgba(0, 0, 0, .2);
        border-radius: 12px;
        background: #fffef7;
        color: #433500;
        text-align: center
    }

    .under-dev__icon {
        font-size: 2rem;
        margin-bottom: .25rem
    }

    .under-dev__title {
        margin: .25rem 0 .5rem;
        font-size: 1.15rem
    }

    .under-dev__text a {
        text-decoration: underline
    }

    @media (prefers-color-scheme:dark) {
        .under-dev {
            background: #1d1a12;
            color: #ffecb3;
            border-color: #4a3f1d
        }
    }
</style>
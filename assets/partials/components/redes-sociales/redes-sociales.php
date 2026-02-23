<?php

/**
 * Componente: Redes Sociales flotantes (FAB)
 * - HTML generado 100% desde PHP/array (no tocas el HTML)
 * - data-config embebido como JSON para que JS se configure solo
 */

$cfg = [
    'scrollShow' => 220,
    'expandedWidth' => 240, // solo informativo (CSS controla realmente)
    'whatsapp' => [
        'phone' => '50370072945', // SOLO número (sin +)
        'defaultMessage' => 'Hola CECNSR, quisiera realizar una consulta desde su página web. ¿Me apoyan por favor?',
        'contexts' => [
            ['match' => 'admis',  'message' => 'Hola CECNSR, quisiera información sobre admisiones. ¿Me apoyan por favor?'],
            ['match' => 'oferta', 'message' => 'Hola CECNSR, quisiera conocer la oferta académica. ¿Me brindan información por favor?'],
            ['match' => 'conven', 'message' => 'Hola CECNSR, quisiera información sobre convenios y programas. Gracias.'],
            ['match' => 'contact', 'message' => 'Hola CECNSR, quiero hacer una consulta general. Gracias.'],
        ],
    ],
    'items' => [
        [
            'key' => 'aula',
            'class' => 'av',
            'href' => '#', // <-- pon aquí el link real del aula virtual
            'target' => '_blank',
            'rel' => 'noopener',
            'aria' => 'Aula Virtual',
            'labelStrong' => 'Aula Virtual',
            'labelSmall' => 'Ingresar a plataforma',
            'iconType' => 'img',
            'iconSrc' => 'assets/partials/inicio/image/logos/cecnsr.png',
            'iconAlt' => 'CECNSR',
        ],
        [
            'key' => 'facebook',
            'class' => 'fb',
            'href' => 'https://www.facebook.com/cecnsr',
            'target' => '_blank',
            'rel' => 'noopener',
            'aria' => 'Facebook',
            'labelStrong' => 'Facebook',
            'labelSmall' => '/cecnsr',
            'iconType' => 'fa',
            'iconClass' => 'fab fa-facebook-f',
        ],
        [
            'key' => 'instagram',
            'class' => 'ig',
            'href' => 'https://www.instagram.com/cecnsr_88043/',
            'target' => '_blank',
            'rel' => 'noopener',
            'aria' => 'Instagram',
            'labelStrong' => 'Instagram',
            'labelSmall' => '@cecnsr_88043',
            'iconType' => 'fa',
            'iconClass' => 'fab fa-instagram',
        ],
        [
            'key' => 'youtube',
            'class' => 'yt',
            'href' => 'https://www.youtube.com/channel/UCkKhI2ckIH2joeW_TG_q-gg/videos',
            'target' => '_blank',
            'rel' => 'noopener',
            'aria' => 'YouTube',
            'labelStrong' => 'YouTube',
            'labelSmall' => 'Videos y eventos',
            'iconType' => 'fa',
            'iconClass' => 'fab fa-youtube',
        ],
        [
            'key' => 'whatsapp',
            'class' => 'wa',
            'href' => 'https://wa.me/50370072945', // JS lo reemplaza por wa.me/?text=
            'target' => '_blank',
            'rel' => 'noopener',
            'aria' => 'WhatsApp',
            'labelStrong' => 'WhatsApp',
            'labelSmall' => 'Escríbenos',
            'iconType' => 'fa',
            'iconClass' => 'fab fa-whatsapp',
            'isWhatsApp' => true,
        ],
    ]
];

// JSON config para JS
$dataConfig = htmlspecialchars(json_encode($cfg, JSON_UNESCAPED_UNICODE), ENT_QUOTES, 'UTF-8');

// helpers
$cssPath = function_exists('asset')
    ? asset('assets/partials/components/redes-sociales/redes-sociales.css')
    : 'assets/partials/components/redes-sociales/redes-sociales.css';

$jsPath = function_exists('asset')
    ? asset('assets/partials/components/redes-sociales/redes-sociales.js')
    : 'assets/partials/components/redes-sociales/redes-sociales.js';

?>
<link rel="stylesheet" href="<?= $cssPath ?>">

<nav class="social-fab" aria-label="Accesos rápidos a redes sociales" data-config="<?= $dataConfig ?>">
    <?php foreach ($cfg['items'] as $item): ?>
        <?php
        $href   = $item['href'] ?? '#';
        $target = $item['target'] ?? '_blank';
        $rel    = $item['rel'] ?? 'noopener';
        $aria   = $item['aria'] ?? 'Acceso';
        $cls    = $item['class'] ?? '';
        $strong = $item['labelStrong'] ?? '';
        $small  = $item['labelSmall'] ?? '';

        $isWA = !empty($item['isWhatsApp']);
        $idAttr = $isWA ? 'id="fabWhatsApp"' : '';
        ?>

        <a class="social-fab__btn <?= htmlspecialchars($cls) ?>"
            <?= $idAttr ?>
            href="<?= htmlspecialchars($href) ?>"
            target="<?= htmlspecialchars($target) ?>"
            rel="<?= htmlspecialchars($rel) ?>"
            aria-label="<?= htmlspecialchars($aria) ?>">

            <?php if (($item['iconType'] ?? '') === 'img'): ?>
                <?php
                $src = $item['iconSrc'] ?? '';
                $alt = $item['iconAlt'] ?? '';
                $srcFinal = function_exists('asset') ? asset($src) : $src;
                ?>
                <img class="social-fab__logo"
                    src="<?= htmlspecialchars($srcFinal) ?>"
                    alt="<?= htmlspecialchars($alt) ?>"
                    loading="lazy" decoding="async" />
            <?php else: ?>
                <i class="<?= htmlspecialchars($item['iconClass'] ?? '') ?>" aria-hidden="true"></i>
            <?php endif; ?>

            <span class="social-fab__label">
                <strong><?= htmlspecialchars($strong) ?></strong>
                <small><?= htmlspecialchars($small) ?></small>
            </span>
        </a>
    <?php endforeach; ?>
</nav>

<script src="<?= $jsPath ?>" defer></script>
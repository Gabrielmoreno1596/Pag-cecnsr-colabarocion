<?php
$data = require __DIR__ . '/data/ni-fields.php';
$sent = isset($_GET['ok']) && $_GET['ok'] === '1';

require __DIR__ . '/components/hero.php';
require __DIR__ . '/components/steps.php';

if ($sent) {
    require __DIR__ . '/components/success.php';
} else {
    require __DIR__ . '/components/form.php';
    require __DIR__ . '/components/faq.php';
}

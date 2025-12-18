<?php
if (!defined('PROJECT_PATH')) {
    require_once dirname(__DIR__, 3) . '/config.php';
}

$seasonalModalForce = $seasonalModalForce ?? false;

require __DIR__ . '/data/modal.php';
?>

<link rel="stylesheet" href="<?= asset('assets/partials/ui/seasonal-modal/css/modal.css') ?>">
<?php include __DIR__ . '/components/modal.php'; ?>
<script defer src="<?= asset('assets/partials/ui/seasonal-modal/js/modal.js') ?>"></script>

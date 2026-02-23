<?php
// Base pública para assets de PI & 4PE
$PI4PE_BASE = 'assets/partials/ui/float-modal';

/* <?php
if (!defined('PROJECT_PATH')) {
    require_once dirname(__DIR__, 3) . '/config.php';
} */

$seasonalModalForce = $seasonalModalForce ?? false;

require __DIR__ . '/data/modal.php';
?>

<link rel="stylesheet" href="<?= asset('assets/partials/ui/float-modal/css/modal.css') ?>">
<?php include __DIR__ . '/components/modal.php'; ?>
<script defer src="<?= asset('assets/partials/ui/float-modal/js/modal.js') ?>"></script>
<?php

use app\core\Application;

$flashes = Application::$app->session->getFlashes();
?>

<div id="toast-container"></div>

<script>
    window.__FLASH_MESSAGES__ = <?= json_encode($flashes) ?>;
</script>



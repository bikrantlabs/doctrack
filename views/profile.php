<?php include_once(\app\core\Application::$ROOT_DIR . "/views/partials/navbar.php") ?>
<?php

use app\core\Application;
use app\core\View;

/**
 * @var $this View
 */
$user = Application::$app->user;
$this->title = $user->getName();
?>
<div class="container">

    <h1>Profile</h1>
</div>

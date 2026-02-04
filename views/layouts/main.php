<?php

use app\core\Application;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctrack</title>
</head>

<body>

<?php if (Application::$app->session->getFlash("success")) : ?>
    <div class="alert alert-success">
        <?php echo Application::$app->session->getFlash("success"); ?>

    </div>
<?php endif; ?>

<div>
    {{content}}
</div>
</body>

</html>
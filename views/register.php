<?php

use app\core\form\Form;
use app\models\request\User;

/**
 * @var User $model
 */
?>


    <h1>Register User</h1>
<?php $form = Form::begin("/register", "post")->class("auth-form")->renderOpen(); ?>

<?php echo $form->field($model, 'fullname') ?>

<?php echo $form->field($model, 'email')->type('email') ?>

<?php echo $form->field($model, 'password')->type('password') ?>

<?php echo $form->field($model, 'confirmPassword')->type('password') ?>

    <button type="submit" class="button button-primary">Register</button>

<?php echo Form::end(); ?>
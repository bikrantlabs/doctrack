<?php

use app\core\form\Form;
use app\models\request\LoginFormModel;

/**
 * @var LoginFormModel $model
 */
?>

<div class="auth-layout">
    <!-- Left Panel - Visual -->
    <div class="auth-visual">
        <!-- Background Pattern -->
        <div class="auth-pattern">
            <div class="auth-pattern-line" style="top: 20%;"></div>
            <div class="auth-pattern-line" style="top: 40%;"></div>
            <div class="auth-pattern-line" style="top: 60%;"></div>
            <div class="auth-pattern-line" style="top: 80%;"></div>
        </div>
        <div class="auth-form-panel">
            <div class="auth-form-header">
                <a href="/" class="logo">
                    <svg class="logo-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z" stroke="currentColor"
                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14 2v6h6M16 13H8M16 17H8M10 9H8" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    DocTrack
                </a>
            </div>

            <div class="auth-form-container">
                <h1 class="auth-form-title">Welcome Back!</h1>
                <p class="auth-form-subtitle">
                    Login to your account
                </p>

                <?php $form = Form::begin("/login", "post")->class("auth-form register-form")->renderOpen(); ?>


                <div class="form-group">
                    <?php echo $form->field($model, 'email')->type('email') ?>
                </div>

                <div class="form-group">
                    <?php echo $form->field($model, 'password')->type('password') ?>
                </div>

                <button type="submit" class="btn btn-primary form-submit mt-lg">
                    Login
                </button>
                <?php echo Form::end(); ?>

                <div class="divider">OR</div>

                <!--            <div class="social-login">-->
                <!--                <button type="button" class="social-btn">-->
                <!--                    <svg class="social-btn-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">-->
                <!--                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"-->
                <!--                              fill="#4285F4"/>-->
                <!--                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"-->
                <!--                              fill="#34A853"/>-->
                <!--                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"-->
                <!--                              fill="#FBBC05"/>-->
                <!--                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"-->
                <!--                              fill="#EA4335"/>-->
                <!--                    </svg>-->
                <!--                    Sign up with Google-->
                <!--                </button>-->

                <div class="auth-footer">
                    <p class="auth-footer-text">
                        Already have an account?
                        <a href="register" class="auth-footer-link">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Panel - Form -->

</div>
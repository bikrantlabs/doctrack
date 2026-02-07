<?php

use app\core\form\Form;
use app\models\User;

/**
 * @var User $model
 */
?>

<div class="auth-layout-register">
    <!-- Left Panel - Visual -->
    <div class="auth-visual">
        <!-- Background Pattern -->
        <div class="auth-pattern">
            <div class="auth-pattern-line" style="top: 20%;"></div>
            <div class="auth-pattern-line" style="top: 40%;"></div>
            <div class="auth-pattern-line" style="top: 60%;"></div>
            <div class="auth-pattern-line" style="top: 80%;"></div>
        </div>

        <div class="auth-visual-content">
            <svg class="auth-visual-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-width="1.5"
                      stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="8.5" cy="7" r="4" stroke="currentColor" stroke-width="1.5"/>
                <line x1="20" y1="8" x2="20" y2="14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="23" y1="11" x2="17" y2="11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            </svg>

            <h2 class="auth-visual-title">Join DocTrack</h2>
            <p class="auth-visual-text">
                Create your account and start streamlining your document approval workflow today.
            </p>

            <div class="register-visual-features">
                <div class="register-feature-item">
                    <div class="register-feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22 4 12 14.01l-3-3" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="register-feature-content">
                        <h4 class="register-feature-title">Free 14-Day Trial</h4>
                        <p class="register-feature-text">No credit card required</p>
                    </div>
                </div>

                <div class="register-feature-item">
                    <div class="register-feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="register-feature-content">
                        <h4 class="register-feature-title">Enterprise Security</h4>
                        <p class="register-feature-text">Bank-level encryption</p>
                    </div>
                </div>

                <div class="register-feature-item">
                    <div class="register-feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" stroke="currentColor"
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="register-feature-content">
                        <h4 class="register-feature-title">Unlimited Team Members</h4>
                        <p class="register-feature-text">Collaborate with your whole team</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Panel - Form -->
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
            <h1 class="auth-form-title">Create your account</h1>
            <p class="auth-form-subtitle">
                Start your free trial. No credit card required.
            </p>

            <?php $form = Form::begin("/register", "post")->class("auth-form register-form")->renderOpen(); ?>
            <div class="form-name-row">
                <div class="form-group">
                    <?php echo $form->field($model, 'fullname') ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->field($model, 'email')->type('email') ?>
            </div>

            <div class="form-group">
                <?php echo $form->field($model, 'password')->type('password') ?>
            </div>
            <div class="form-group">
                <?php echo $form->field($model, 'confirmPassword')->type('password') ?>
            </div>


            <button type="submit" class="btn btn-primary form-submit mt-lg">
                Create Account
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
                    <a href="login" class="auth-footer-link">Sign in</a>
                </p>
            </div>
        </div>
    </div>
</div>



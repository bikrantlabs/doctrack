<?php

use app\core\View;

/**
 * @var $this View
 */


$this->title = "Not Found"
?>
<!-- 404 Not Found Template - Include theme.css, common.css, and not-found.css -->
<main class="not-found">
    <div class="not-found-container">
        <!-- Floating Elements Background -->
        <div class="not-found-bg">
            <div class="floating-doc floating-doc-1">
                <svg width="60" height="72" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14 1H3C1.89543 1 1 1.89543 1 3V25C1 26.1046 1.89543 27 3 27H21C22.1046 27 23 26.1046 23 25V10L14 1Z"
                          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 1V10H23" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                    <path d="M7 15H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M7 19H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </div>
            <div class="floating-doc floating-doc-2">
                <svg width="48" height="56" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14 1H3C1.89543 1 1 1.89543 1 3V25C1 26.1046 1.89543 27 3 27H21C22.1046 27 23 26.1046 23 25V10L14 1Z"
                          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 1V10H23" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="floating-doc floating-doc-3">
                <svg width="40" height="48" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14 1H3C1.89543 1 1 1.89543 1 3V25C1 26.1046 1.89543 27 3 27H21C22.1046 27 23 26.1046 23 25V10L14 1Z"
                          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14 1V10H23" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </div>
        </div>

        <!-- Main Content -->
        <div class="not-found-content">
            <!-- Large 404 Display -->
            <div class="not-found-code">
                <span class="digit">4</span>
                <span class="digit-icon">
                    <svg width="120" height="120" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M8 15C8.5 16.5 10 18 12 18C14 18 15.5 16.5 16 15" stroke="currentColor"
                              stroke-width="1.5" stroke-linecap="round"/>
                        <circle cx="9" cy="10" r="1.5" fill="currentColor"/>
                        <circle cx="15" cy="10" r="1.5" fill="currentColor"/>
                    </svg>
                </span>
                <span class="digit">4</span>
            </div>

            <!-- Message -->
            <h1 class="not-found-title">Document Not Found</h1>
            <p class="not-found-description">
                The page you're looking for seems to have been moved, deleted, or never existed.
                Don't worry, even the best documents get misplaced sometimes.
            </p>

            <!-- Search Suggestion -->
            <div class="not-found-suggestion">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
                    <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <span>Try checking the URL or use the navigation to find what you need</span>
            </div>

            <!-- Actions -->
            <div class="not-found-actions">
                <a href="/" class="btn btn-primary btn-lg">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 12L5 10M5 10L12 3L19 10M5 10V20C5 20.5523 5.44772 21 6 21H9M19 10L21 12M19 10V20C19 20.5523 18.5523 21 18 21H15M9 21C9.55228 21 10 20.5523 10 20V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V20C14 20.5523 14.4477 21 15 21M9 21H15"
                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Back to Home
                </a>
                <button class="btn btn-secondary btn-lg" onclick="history.back()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Go Back
                </button>
            </div>
        </div>

        <!-- Bottom decoration -->
        <div class="not-found-footer">
            <span class="error-code">Error Code: 404</span>
            <span class="separator">•</span>
            <span class="timestamp" id="timestamp"></span>
        </div>
    </div>
</main>

<script>
    // Display current timestamp
    document.getElementById('timestamp').textContent = new Date().toLocaleString();
</script>

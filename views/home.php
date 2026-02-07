<?php include_once(\app\core\Application::$ROOT_DIR . "/views/partials/navbar.php") ?>


<!-- Hero Section -->
<section class="hero">
    <div class="container hero-inner">
        <div class="hero-content animate-slide-up">
        <span class="hero-badge">
          <svg class="hero-badge-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Enterprise-Grade Security
        </span>

            <h1 class="hero-title">
                Document Approval<br>
                <span class="text-gradient">Made Simple</span>
            </h1>

            <p class="hero-subtitle">
                Streamline your document review workflow with secure digital signatures,
                real-time collaboration, and automated approval chains. Built for teams
                that value efficiency and compliance.
            </p>

            <div class="hero-actions">
                <a href="/register" class="btn btn-primary btn-lg">
                    Start Free Trial
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </a>
                <a href="#workflow" class="btn btn-secondary btn-lg">See How It Works</a>
            </div>
        </div>

        <div class="hero-visual animate-fade-in">
            <div class="doc-preview">
                <div class="doc-preview-header">
                    <div class="doc-preview-title">
                        <svg class="doc-preview-icon" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"
                                  stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M14 2v6h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                        Partnership_Agreement.pdf
                    </div>
                    <span class="doc-preview-status">
              <span class="doc-preview-status-dot"></span>
              Pending Review
            </span>
                </div>

                <div class="doc-preview-body">
                    <div class="doc-line long"></div>
                    <div class="doc-line medium"></div>
                    <div class="doc-line long"></div>
                    <div class="doc-line short"></div>
                    <div class="doc-line medium"></div>

                    <div class="doc-signature-area">
                        <div class="doc-signature">Alex Johnson</div>
                        <div class="doc-signature-label">Digital Signature</div>
                    </div>
                </div>

                <!-- Floating Cards -->
                <div class="floating-card floating-card-1">
                    <svg class="floating-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22 4 12 14.01l-3-3" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </div>

                <div class="floating-card floating-card-2">
                    <svg class="floating-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" stroke="currentColor"
                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features" id="features">
    <div class="container">
        <div class="features-header">
            <h2 class="features-title">Everything You Need for Document Management</h2>
            <p class="features-subtitle">
                Powerful features designed to help teams collaborate efficiently and maintain compliance.
            </p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 class="feature-title">Secure Digital Signatures</h3>
                <p class="feature-description">
                    Bank-level encryption protects your documents. Legally binding e-signatures that comply with eIDAS
                    and ESIGN regulations.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" stroke="currentColor"
                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 class="feature-title">Team Collaboration</h3>
                <p class="feature-description">
                    Invite team members, assign roles, and collaborate in real-time. Track who viewed and approved each
                    document.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" stroke="currentColor" stroke-width="2"/>
                        <line x1="16" y1="2" x2="16" y2="6" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round"/>
                        <line x1="8" y1="2" x2="8" y2="6" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round"/>
                        <line x1="3" y1="10" x2="21" y2="10" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
                <h3 class="feature-title">Automated Workflows</h3>
                <p class="feature-description">
                    Set up approval chains, automatic reminders, and deadline tracking. Never miss an important document
                    again.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z" stroke="currentColor"
                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14 2v6h6M16 13H8M16 17H8M10 9H8" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 class="feature-title">Document Templates</h3>
                <p class="feature-description">
                    Create reusable templates for contracts, agreements, and forms. Customize fields and save time on
                    repetitive tasks.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
                        <path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="feature-title">Audit Trail</h3>
                <p class="feature-description">
                    Complete visibility into document history. Track every action, view, and modification with
                    timestamps.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2" stroke="currentColor" stroke-width="2"/>
                        <line x1="8" y1="21" x2="16" y2="21" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round"/>
                        <line x1="12" y1="17" x2="12" y2="21" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="feature-title">Multi-Platform Access</h3>
                <p class="feature-description">
                    Access your documents from anywhere. Native apps for iOS and Android, plus a full-featured web
                    application.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Workflow Section -->
<section class="workflow" id="workflow">
    <div class="container">
        <div class="workflow-header">
            <h2 class="features-title">How It Works</h2>
            <p class="features-subtitle">
                Get your documents approved in three simple steps.
            </p>
        </div>

        <div class="workflow-steps">
            <div class="workflow-step">
                <div class="step-number">1</div>
                <h3 class="step-title">Upload Document</h3>
                <p class="step-description">
                    Drag and drop your PDF, Word, or other document formats. We support all major file types.
                </p>
            </div>

            <div class="workflow-step">
                <div class="step-number">2</div>
                <h3 class="step-title">Add Reviewers</h3>
                <p class="step-description">
                    Invite team members or external parties. Set up approval order and define signing fields.
                </p>
            </div>

            <div class="workflow-step">
                <div class="step-number">3</div>
                <h3 class="step-title">Get Approved</h3>
                <p class="step-description">
                    Track progress in real-time. Receive notifications when documents are signed and completed.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta">
    <div class="container">
        <div class="cta-inner">
            <h2 class="cta-title">Ready to Transform Your Workflow?</h2>
            <p class="cta-subtitle">
                Join thousands of teams who trust DocTrack for their document management needs.
            </p>
            <div class="cta-actions">
                <a href="/register" class="btn btn-primary btn-lg">Start Your Free Trial</a>
                <a href="#" class="btn btn-secondary btn-lg">Contact Sales</a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container footer-inner">
        <div class="footer-text">
            &copy; 2026 DocTrack. All rights reserved.
        </div>
        <nav class="footer-links">
            <a href="#" class="footer-link">Privacy Policy</a>
            <a href="#" class="footer-link">Terms of Service</a>
            <a href="#" class="footer-link">Contact</a>
        </nav>
    </div>
</footer>

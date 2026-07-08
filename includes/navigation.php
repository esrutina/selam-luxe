<?php
// Generate CSRF token if not exists
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<header class="site-header" id="header">
    <div class="container header-inner">
        <a href="/" class="logo">
            <span class="logo-icon">✦</span>
            <span class="logo-text">Selam Luxe</span>
        </a>
        
        <nav class="nav-links" id="navLinks">
            <a href="#collections" class="nav-link">Collections</a>
            <a href="#craftsmanship" class="nav-link">Craftsmanship</a>
            <a href="#about" class="nav-link">Heritage</a>
            <a href="#contact" class="nav-link">Contact</a>
            <a href="#contact" class="btn-primary nav-cta">Book Appointment</a>
        </nav>
        
        <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>
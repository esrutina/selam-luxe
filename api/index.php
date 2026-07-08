<?php
declare(strict_types=1);

// Start session BEFORE any output
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/db-connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selam Luxe — Ethiopian Heritage Jewelry</title>
    <meta name="description" content="Handcrafted luxury jewelry inspired by Ethiopian goldwork traditions.">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,400&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="/assets/css/sections.css">
    <link rel="stylesheet" href="/assets/css/animations.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
</head>
<body>
    <?php include __DIR__ . '/../includes/navigation.php'; ?>
    
    <main>
        <?php 
        include __DIR__ . '/../sections/hero.php';
        include __DIR__ . '/../sections/about.php';
        include __DIR__ . '/../sections/collections.php';
        include __DIR__ . '/../sections/featured.php';
        include __DIR__ . '/../sections/craftsmanship.php';
        include __DIR__ . '/../sections/testimonials.php';
        include __DIR__ . '/../sections/contact.php';
        ?>
    </main>
    
    <?php include __DIR__ . '/../includes/footer.php'; ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/scroll-effects.js"></script>
    <script src="/assets/js/gallery.js"></script>
    <script src="/assets/js/form-handler.js"></script>
</body>
</html>
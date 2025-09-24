    <?php
    // views/partials/header.php
    require_once __DIR__ . '/../../config/paths.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PET HEART - Find Your Perfect Companion</title>
        
        <!-- Enhanced Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700;800;900&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Font Awesome for icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo CSS_PATH; ?>style.css">

        <!-- Page Specific CSS -->
        <?php if (strpos($_SERVER['REQUEST_URI'], 'about') !== false): ?>
        <link rel="stylesheet" href="<?php echo CSS_PATH; ?>about.css">
        <?php endif; ?>
    </head>
    <body>
        <!-- Floating Bubbles Background -->
        <div class="bubbles-container" id="bubbles-container"></div>

        <!-- Compact Header -->
<header id="main-header">
    <nav>
        <a href="<?php echo BASE_URL; ?>/home/index" class="logo">❤️ PET HEART</a>
       
        <div class="nav-buttons">
            <a href="<?php echo BASE_URL; ?>/home/index" class="cta-button">
                <i class="fas fa-home"></i>
                Home
            </a>
            <a href="<?php echo BASE_URL; ?>/about/index" class="cta-button">
                <i class="fas fa-info-circle"></i>
                About
            </a>
            <a href="<?php echo BASE_URL; ?>/contact/index" class="cta-button">
                <i class="fas fa-envelope"></i>
                Contact
            </a>
            <!-- <a href="<?php echo BASE_URL; ?>/meet/index" class="cta-button">
                <i class="fas fa-paw"></i>
                Meet Buddy
            </a>
            <a href="<?php echo BASE_URL; ?>/give/index" class="cta-button">
                <i class="fas fa-heart"></i>
                New Home
            </a> -->
            <a href="<?php echo BASE_URL; ?>/views/landing.php" class="cta-button">
                <i class="fas fa-sign-in-alt"></i>
                Log In
            </a>
            <a href="<?php echo BASE_URL; ?>/views/users/register.php" class="cta-button">
                <i class="fas fa-user-plus"></i>
                Sign Up
            </a>

            
        </div>
    </nav>
</header>
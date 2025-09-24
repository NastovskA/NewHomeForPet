<?php
// config/paths.php


// Automatically detect protocol (HTTP or HTTPS)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443 ? 'https://' : 'http://';

// Base URL with correct protocol
define('BASE_URL', $protocol . $_SERVER['HTTP_HOST'] . '/NewHomeForPet');

// Asset paths
define('CSS_PATH', BASE_URL . '/public/assets/css/');
define('JS_PATH', BASE_URL . '/public/assets/js/');
define('IMG_PATH', BASE_URL . '/public/assets/images/');

// View paths
define('VIEWS_PATH', BASE_PATH . 'views/');
define('PARTIALS_PATH', VIEWS_PATH . 'partials/');
define('ERRORS_PATH', VIEWS_PATH . 'errors/');

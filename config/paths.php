<?php
// config/paths.php

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443 ? 'https://' : 'http://';
define('BASE_URL', $protocol . $_SERVER['HTTP_HOST'] . '/NewHomeForPet');
define('CSS_PATH', BASE_URL . '/public/assets/css/');
define('JS_PATH', BASE_URL . '/public/assets/js/');
define('IMG_PATH', BASE_URL . '/public/assets/images/');
define('VIEWS_PATH', BASE_PATH . 'views/');
define('PARTIALS_PATH', VIEWS_PATH . 'partials/');
define('ERRORS_PATH', VIEWS_PATH . 'errors/');

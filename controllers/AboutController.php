<?php
class AboutController {
    public function index() {
        // Можете да додадете податоци од модел ако е потребно
        $data = [
            'pageTitle' => 'About Us - PetHeart',
            'pageDescription' => 'Discover PetHeart\'s mission to connect pet lovers worldwide'
        ];
        
        require_once 'views/partials/header.php';
        require_once 'views/about/index.php';
        require_once 'views/partials/footer.php';
    }
}
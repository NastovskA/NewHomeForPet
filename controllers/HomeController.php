<?php
// controllers/HomeController.php
require_once 'models/PetModel.php';
require_once 'models/FactModel.php';

class HomeController {
    private $petModel;
    private $factModel;

    public function __construct() {
        $this->petModel = new PetModel();
        $this->factModel = new FactModel();
    }

    public function index() {
        // Get data from models
        $pets = $this->petModel->getAllPets();
        $randomFact = $this->factModel->getRandomFact();
        
        // Pass data to view
        $data = [
            'pets' => $pets,
            'randomFact' => $randomFact
        ];
        
        // Load views
        require_once 'views/partials/header.php';
        require_once 'views/home/index.php';
        require_once 'views/partials/footer.php';

    }

    public function getPets() {
        // API endpoint for AJAX requests
        header('Content-Type: application/json');
        $pets = $this->petModel->getAllPets();
        echo json_encode($pets);
        exit();
    }

    public function getFact() {
        // API endpoint for AJAX requests
        header('Content-Type: application/json');
        $fact = $this->factModel->getRandomFact();
        echo json_encode(['fact' => $fact]);
        exit();
    }
}
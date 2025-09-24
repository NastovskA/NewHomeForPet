<?php
// controllers/FactController.php
require_once 'models/FactModel.php';

class FactController {
    private $factModel;

    public function __construct() {
        $this->factModel = new FactModel();
    }


    public function index() {
        $facts = $this->factModel->getAllFacts();
        
        // Load facts view
        require_once 'views/partials/header.php';
        require_once 'views/facts/index.php';
        require_once 'views/partials/footer.php';
    }

    
}
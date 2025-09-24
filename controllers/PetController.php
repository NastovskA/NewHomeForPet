<?php
// controllers/PetController.php
require_once 'models/PetModel.php';

class PetController {
    private $petModel;

    public function __construct() {
        $this->petModel = new PetModel();
    }

    public function details($id) {
        $pet = $this->petModel->getPetById($id);
        
        if ($pet) {
            // Load pet details view
            require_once 'views/partials/header.php';
            require_once 'views/pets/details.php';
            require_once 'views/partials/footer.php';
        } else {
            // Show 404 error
            require_once 'views/errors/404.php';
        }
    }
}
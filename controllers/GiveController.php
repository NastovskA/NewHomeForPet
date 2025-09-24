<?php
require_once __DIR__ . '/../models/GiveModel.php';

class GiveController {
    private $model;

    public function __construct() {
        $this->model = new GiveModel(); // Поправено име на модел
    }

    public function index() {
        $message = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $data = [
                'petName' => $_POST['petName'],
                'petAge' => $_POST['petAge'],
                'petGender' => $_POST['petGender'],
                'category' => $_POST['category'],
                'petBreed' => $_POST['petBreed'],
                'petDescription' => $_POST['petDescription'],
                'petActivity' => $_POST['petActivity'],
                'petVaccination' => $_POST['petVaccination'],
                'country' => $_POST['country'],
                'city' => $_POST['city'],
                'petImage' => $_FILES['petImage'] ?? null
            ];

            $result = $this->model->savePet($data);

            if ($result) {
                // Успешен внес → редирекција на почетна
                header("Location: /NewHomeForPet/home/index");
                exit();
            } else {
                $message = "Грешка при внесување на животното!";
            }
        }

        require_once __DIR__ . '/../views/give/index.php';
    }
}
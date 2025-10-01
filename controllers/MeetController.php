<?php
class MeetController {
    private $model;
    
    public function __construct() {
        require_once __DIR__ . '/../models/MeetModel.php';
        $this->model = new MeetModel();
    }
    
    public function index() {
        $category = $_GET['category'] ?? '';
        $pol = $_GET['pol'] ?? '';
        $min_age = isset($_GET['min_age']) ? (int)$_GET['min_age'] : '';
        $max_age = isset($_GET['max_age']) ? (int)$_GET['max_age'] : '';
        $country = $_GET['country'] ?? '';
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        
        $result = $this->model->getFilteredAnimals($category, $pol, $min_age, $max_age, $country, $page);
        
        $countries = $this->model->getUniqueCountries();
        
        $animal_types = $this->model->getAnimalTypes();
        
        $animals = $result['animals'];
        $total_records = $result['total_records'];
        $total_pages = $result['total_pages'];
        $current_page = $result['current_page'];
        
        require_once __DIR__ . '/../views/meet/index.php';
    }

    public function show() {
        $id = $_GET['id'] ?? null;
        $type = $_GET['type'] ?? null;

        if (!$id || !$type) {
            die("Недостасуваат параметри за животното.");
        }

        $animal = $this->model->getByIdAndType($id, $type);

        if (!$animal) {
            die("Животното не е пронајдено.");
        }

        require_once __DIR__ . '/../views/meet/meet.php';
    }

    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $animal_id = $_POST['animal_id'] ?? null;
            $user_id = $_POST['user_id'] ?? null;

            if (!$animal_id || !$user_id) {
                die("Недостасуваат параметри.");
            }

            $this->model->applyForAnimal($animal_id, $user_id);

            header("Location: /NewHomeForPet/home/index");
            exit();
        }
    }
}
?>
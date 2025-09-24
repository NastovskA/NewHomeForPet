<?php
class MeetController {
    private $model;
    
    public function __construct() {
        require_once __DIR__ . '/../models/MeetModel.php';
        $this->model = new MeetModel();
    }
    
    public function index() {
        // Get filter parameters
        $category = $_GET['category'] ?? '';
        $pol = $_GET['pol'] ?? '';
        $min_age = isset($_GET['min_age']) ? (int)$_GET['min_age'] : '';
        $max_age = isset($_GET['max_age']) ? (int)$_GET['max_age'] : '';
        $country = $_GET['country'] ?? '';
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        
        // Get filtered animals and pagination data
        $result = $this->model->getFilteredAnimals($category, $pol, $min_age, $max_age, $country, $page);
        
        // Get countries for filter dropdown
        $countries = $this->model->getUniqueCountries();
        
        // Get animal types for filter dropdown
        $animal_types = $this->model->getAnimalTypes();
        
        // Extract variables for the view
        $animals = $result['animals'];
        $total_records = $result['total_records'];
        $total_pages = $result['total_pages'];
        $current_page = $result['current_page'];
        
        // Load the view
        require_once __DIR__ . '/../views/meet/index.php';
    }

    public function show() {
        $id = $_GET['id'] ?? null;
        $type = $_GET['type'] ?? null;

        if (!$id || !$type) {
            die("Недостасуваат параметри за животното.");
        }

        // Користи го веќе инстанцираниот модел
        $animal = $this->model->getByIdAndType($id, $type);

        if (!$animal) {
            die("Животното не е пронајдено.");
        }

        // Вчитај го view-то за едно животно
        require_once __DIR__ . '/../views/meet/meet.php';
    }

    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $animal_id = $_POST['animal_id'] ?? null;
            $user_id = $_POST['user_id'] ?? null;

            if (!$animal_id || !$user_id) {
                die("Недостасуваат параметри.");
            }

            // Внеси го во базата преку моделот
            $this->model->applyForAnimal($animal_id, $user_id);

            // Пренасочување на почетната страна
            header("Location: /NewHomeForPet/home/index");
            exit();
        }
    }
}
?>
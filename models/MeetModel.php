<?php
require_once __DIR__ . '/../config/database.php';

class MeetModel {
    private $pdo;
    private $table = 'animals';

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    public function getFilteredAnimals($category, $pol, $min_age, $max_age, $country, $page, $per_page = 9) {
        $offset = ($page - 1) * $per_page;
        $conditions = ["adopted = 0"];
        $params = [];

        if (!empty($category)) {
            $conditions[] = "category = :category";
            $params[':category'] = $category;
        }
        if (!empty($pol)) {
            $conditions[] = "pol = :pol";
            $params[':pol'] = $pol;
        }
        if (!empty($min_age)) {
            $conditions[] = "age >= :min_age";
            $params[':min_age'] = $min_age;
        }
        if (!empty($max_age)) {
            $conditions[] = "age <= :max_age";
            $params[':max_age'] = $max_age;
        }
        if (!empty($country)) {
            $conditions[] = "country = :country";
            $params[':country'] = $country;
        }

        $where_clause = $conditions ? "WHERE " . implode(" AND ", $conditions) : "";

        $count_sql = "SELECT COUNT(*) FROM {$this->table} $where_clause";
        $count_stmt = $this->pdo->prepare($count_sql);
        foreach ($params as $key => $value) {
            $count_stmt->bindValue($key, $value);
        }
        $count_stmt->execute();
        $total_records = $count_stmt->fetchColumn();
        $total_pages = ceil($total_records / $per_page);

        $sql = "SELECT * FROM {$this->table} $where_clause ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->bindValue(':limit', $per_page, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            'animals' => $animals,
            'total_records' => $total_records,
            'total_pages' => $total_pages,
            'current_page' => $page
        ];
    }

    public function getUniqueCountries() {
        $stmt = $this->pdo->query("SELECT DISTINCT country FROM {$this->table} WHERE country IS NOT NULL AND country <> '' ORDER BY country");
        return $stmt ? $stmt->fetchAll(PDO::FETCH_COLUMN) : [];
    }

    public function getAnimalTypes() {
        $stmt = $this->pdo->query("SELECT DISTINCT category FROM {$this->table} WHERE category IS NOT NULL AND category <> '' ORDER BY category");
        return $stmt ? $stmt->fetchAll(PDO::FETCH_COLUMN) : [];
    }

    public function getByIdAndType($id, $type) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id AND category = :type LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function applyForAnimal($animal_id, $user_id) {
        $sql = "INSERT INTO applications (animal_id, user_id, created_at) VALUES (:animal_id, :user_id, NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':animal_id', $animal_id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
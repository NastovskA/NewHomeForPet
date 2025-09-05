<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/Database.php';

class Animal {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
        if (!$this->conn) die("Не можам да се поврзам со базата.");
    }

    /**
     * Save a single dog to the database
     * @param array $data
     */
    public function saveToDatabase($data) {
        $stmt = $this->conn->prepare("
            INSERT INTO dogs
            (name, category, breed, gender, age, specifics, description, image_url, contact, status, created_at)
            VALUES
            (:name, :category, :breed, :gender, :age, :specifics, :description, :image_url, :contact, :status, NOW())
        ");

        $stmt->execute([
            ':name' => $data['name'] ?? 'Unknown',
            ':category' => $data['category'] ?? 'Dog',
            ':breed' => $data['breed'] ?? 'Unknown',
            ':gender' => $data['gender'] ?? '',
            ':age' => $data['age'] ?? '',
            ':specifics' => $data['specifics'] ?? '',
            ':description' => $data['description'] ?? '',
            ':image_url' => $data['image_url'] ?? '',
            ':contact' => $data['contact'] ?? '',
            ':status' => $data['status'] ?? 'Available'
        ]);
    }

    /**
     * Check if a dog already exists in the database
     * @param string $name
     * @param string $breed
     * @return bool
     */
    public function exists($name, $breed) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM dogs WHERE name = :name AND breed = :breed");
        $stmt->execute([
            ':name' => $name,
            ':breed' => $breed
        ]);
        return $stmt->fetchColumn() > 0;
    }

    /**
     * Get all dogs from the database
     * @return array
     */
    public function getAll($limit = 50) {
        $stmt = $this->conn->prepare("SELECT * FROM dogs ORDER BY created_at DESC LIMIT :limit");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Fetch dogs from TheDogAPI
     * @param int $limit
     * @return array
     */
    public function fetchFromAPI($limit = 50) {
        $ch = curl_init(DOG_API_URL . "images/search?include_breeds=true&limit=$limit");
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "x-api-key: " . DOG_API_KEY
            ]
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        if (!$data) return [];
        return $data;
    }
}

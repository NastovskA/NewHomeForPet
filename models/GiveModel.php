<?php
require_once __DIR__ . '/../config/database.php';

class GiveModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function savePet($data) {
        try {
            $imagePath = null;
            
            if (!file_exists('../uploads')) {
                mkdir('../uploads', 0777, true);
            }
            
            if (isset($data['petImage']) && $data['petImage']['error'] === 0) {
                $imagePath = 'uploads/' . time() . '_' . basename($data['petImage']['name']);
                $targetPath = '../' . $imagePath;
                
                if (move_uploaded_file($data['petImage']['tmp_name'], $targetPath)) {
                } else {
                    error_log("Failed to move uploaded file");
                    $imagePath = null;
                }
            }

            $stmt = $this->conn->prepare("
                INSERT INTO animals 
                (name, age, pol, breed, description, category, activity, country, city, vakcinirano, images_url, adopted, lat, lon, created_at)
                VALUES 
                (:name, :age, :pol, :breed, :description, :category, :activity, :country, :city, :vakcinirano, :images_url, 0, NULL, NULL, NOW())
            ");

            $stmt->execute([
                ':name' => $data['petName'],
                ':age' => $data['petAge'],
                ':pol' => $data['petGender'],
                ':breed' => $data['petBreed'],
                ':description' => $data['petDescription'],
                ':category' => $data['category'],
                ':activity' => $data['petActivity'],
                ':country' => $data['country'],
                ':city' => $data['city'],
                ':vakcinirano' => $data['petVaccination'],
                ':images_url' => $imagePath
            ]);

            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}
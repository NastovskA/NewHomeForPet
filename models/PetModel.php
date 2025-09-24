<?php
// models/PetModel.php
require_once 'config/database.php';

class PetModel {
    private $conn;
    private $table_name = "animals";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllPets() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE adopted = '0' ORDER BY RAND()";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPetById($id) {
        try {
            // Using your table name "animals" and adjusting for your database structure
            $query = "SELECT 
                        a.*,
                        COALESCE(a.breed, 'Mixed Breed') as breed,
                        COALESCE(a.age, '3') as age,
                        COALESCE(a.gender, 'Female') as gender,
                        COALESCE(a.description, CONCAT(a.name, ' is a wonderful pet looking for a loving home!')) as description,
                        COALESCE(a.location, 'United States') as location,
                        COALESCE(a.city, 'New York') as city
                      FROM " . $this->table_name . " a 
                      WHERE a.id = :id AND a.adopted = '0'
                      LIMIT 1";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                return $result;
            }
            
            return null;
        } catch (PDOException $e) {
            error_log("Error fetching pet by ID: " . $e->getMessage());
            return null;
        }
    }

    // Additional method to get random pets for homepage
    public function getRandomPets($limit = 10) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE adopted = '0' ORDER BY RAND() LIMIT :limit";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to search pets by criteria
    public function searchPets($criteria = []) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE adopted = '0'";
        $params = [];

        if (!empty($criteria['species'])) {
            $query .= " AND species = :species";
            $params[':species'] = $criteria['species'];
        }

        if (!empty($criteria['breed'])) {
            $query .= " AND breed LIKE :breed";
            $params[':breed'] = '%' . $criteria['breed'] . '%';
        }

        if (!empty($criteria['age_min'])) {
            $query .= " AND CAST(age AS UNSIGNED) >= :age_min";
            $params[':age_min'] = $criteria['age_min'];
        }

        if (!empty($criteria['age_max'])) {
            $query .= " AND CAST(age AS UNSIGNED) <= :age_max";
            $params[':age_max'] = $criteria['age_max'];
        }

        if (!empty($criteria['gender'])) {
            $query .= " AND gender = :gender";
            $params[':gender'] = $criteria['gender'];
        }

        $query .= " ORDER BY RAND()";

        $stmt = $this->conn->prepare($query);
        
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to update pet adoption status
    public function markAsAdopted($id) {
        try {
            $query = "UPDATE " . $this->table_name . " SET adopted = '1' WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error marking pet as adopted: " . $e->getMessage());
            return false;
        }
    }
}
?>
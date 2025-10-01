<?php
class ContactModel {
    private $db;
    private $table_name = "contact_messages";
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getContactInfo() {
        // This could come from a database in a real application
        return [
            'address' => 'Bulevar Partizanski Odredi 78, Ljubljanska, Skopje 1000',
            'email' => 'petheart111@gmail.com',
            'phone' => '+389-75-654-741',
            'hours' => 'Monday - Friday: 9 AM - 5 PM (PST)'
        ];
    }
    
    public function saveContactMessage($name, $email, $subject, $message) {
        try {
            $this->createTableIfNotExists();
            
            $query = "INSERT INTO " . $this->table_name . " 
                     (name, email, subject, message, created_at) 
                     VALUES (:name, :email, :subject, :message, NOW())";
            
            $stmt = $this->db->prepare($query);
            
            $name = htmlspecialchars(strip_tags($name));
            $email = htmlspecialchars(strip_tags($email));
            $subject = htmlspecialchars(strip_tags($subject));
            $message = htmlspecialchars(strip_tags($message));
            
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':subject', $subject);
            $stmt->bindParam(':message', $message);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }
    
    private function createTableIfNotExists() {
        $checkTable = $this->db->query("SHOW TABLES LIKE '" . $this->table_name . "'");
        
        if ($checkTable->rowCount() == 0) {
            $createTable = "CREATE TABLE " . $this->table_name . " (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                subject VARCHAR(255),
                message TEXT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
            
            $this->db->exec($createTable);
        }
    }
}
?>
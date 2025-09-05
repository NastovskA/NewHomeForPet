<!-- Поврзување со базата -->

<?php
require_once __DIR__ . '/../config/config.php';

class Database {
    public $conn;

    public function connect() {
        global $db_host, $db_name, $db_user, $db_pass;

        try {
            $this->conn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", 
                                  $db_user, 
                                  $db_pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }
}

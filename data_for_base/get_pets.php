<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

$host = 'localhost';
$dbname = 'adoption_fostering';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    
    //     SELECT id, name, images_url FROM rabbits WHERE adopted = '0'
    //     UNION ALL
    


         
        
       
    // Query name and image_url for all animals, 0 deka e free, 1 deka e posvoeno
    $query = "
        SELECT id, name, images_url FROM dogs WHERE adopted = '0' 
        UNION ALL
        SELECT id, name, images_url FROM cats WHERE adopted = '0'
        UNION ALL
        SELECT id, name, images_url FROM chinchillas WHERE adopted = '0'
        UNION ALL
        SELECT id, name, images_url FROM hamsters WHERE adopted = '0'
        UNION ALL
        SELECT id, name, images_url FROM parrots WHERE adopted = '0'
        UNION ALL
        SELECT id, name, images_url FROM rabbits WHERE adopted = '0' 
        ORDER BY RAND()
        LIMIT 50
    ";

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $pets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Ensure ID is integer & fallback for missing images
    foreach ($pets as &$pet) {
        $pet['id'] = (int)$pet['id'];
        if (empty($pet['images_url'])) {
            $pet['images_url'] = 'images/default.png';
        }
    }

    echo json_encode($pets, JSON_PRETTY_PRINT);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Database connection failed',
        'message' => $e->getMessage()
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'An error occurred',
        'message' => $e->getMessage()
    ]);
}

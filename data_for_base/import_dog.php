<?php
//za da se importnat slikite samo ednas e povikano, uspesno se importnuvaat spored id i potoa si gi koristime od tabela
require_once __DIR__ . '/../config/config.php';

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $images = [];
    while (count($images) < 70) {
        $remaining = 70 - count($images);
        $apiUrl = "https://dog.ceo/api/breeds/image/random/$remaining";
        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);

        if (!empty($data['message']) && is_array($data['message'])) {
            $images = array_merge($images, $data['message']);
        } else {
            echo "<p>Грешка при влечење на сликите од API, обидувам повторно...</p>";
            sleep(1); 
        }
    }

    foreach ($images as $index => $url) {
        $id = $index + 1; // ID од 1 до 70
        $stmt = $pdo->prepare("UPDATE animals SET images_url = ? WHERE id = ?");
        $stmt->execute([$url, $id]);
    }

    echo "<p>Сликите успешно ажурирани во базата за ID 1–70!</p>";

    $rows = $pdo->query("SELECT * FROM dogs WHERE id BETWEEN 1 AND 70 ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Грешка при конекција со базата: " . $e->getMessage());
}
?>
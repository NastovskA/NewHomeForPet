<?php
header('Content-Type: application/json');

// 📡 Конекција со базата
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adoption_fostering";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Connection failed"]);
    exit;
}

// 🐾 Табели со животни
$tables = ['cats', 'dogs', 'parrots', 'hamsters', 'rabbits', 'chinchillas'];
$pets = [];

foreach ($tables as $table) {
    // 👀 Проверка дали табелата постои (опционално)
    $result = $conn->query("SELECT city, country, lat, lon FROM `$table`");
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // 📍 Игнорирај ако нема координати
            if (!empty($row['lat']) && !empty($row['lon'])) {
                $pets[] = [
                    'type'    => $table,
                    'city'    => $row['city'],
                    'country' => $row['country'],
                    'lat'     => floatval($row['lat']),
                    'lon'     => floatval($row['lon'])
                ];
            }
        }
    }
}

$conn->close();

// 📤 Испрати JSON
echo json_encode($pets, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>

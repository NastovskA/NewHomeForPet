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

// 🐾 Земи ги сите животни од табелата animals
$sql = "SELECT city, country, lat, lon, category FROM animals";
$result = $conn->query($sql);

$pets = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // 📍 Игнорирај ако нема координати
        if (!empty($row['lat']) && !empty($row['lon'])) {
            $pets[] = [
                'type'    => $row['category'],   // 👈 категоријата е тип (cats, dogs…)
                'city'    => $row['city'],
                'country' => $row['country'],
                'lat'     => floatval($row['lat']),
                'lon'     => floatval($row['lon'])
            ];
        }
    }
}

$conn->close();

// 📤 Испрати JSON
echo json_encode($pets, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>

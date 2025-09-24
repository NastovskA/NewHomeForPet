<?php
// Конекција со базата
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adoption_fostering";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Функција за геокодирање
function getCoordinatesByCity($city) {
    $city = urlencode($city);
    $url = "https://nominatim.openstreetmap.org/search?city={$city}&format=json&limit=1";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'MyPetApp');
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);
    if(isset($data[0])) return ['lat'=>floatval($data[0]['lat']), 'lon'=>floatval($data[0]['lon'])];
    return ['lat'=>0, 'lon'=>0];
}

// Само за chinchillas
$table = 'animals';
$result = $conn->query("SELECT id, city FROM $table WHERE lat IS NULL OR lon IS NULL");
while ($row = $result->fetch_assoc()) {
    $coords = getCoordinatesByCity($row['city']);
    $conn->query("UPDATE $table SET lat={$coords['lat']}, lon={$coords['lon']} WHERE id={$row['id']}");
    sleep(1); // Nominatim limit: 1 request per second
    echo "Updated {$table} id {$row['id']} ({$row['city']})<br>";
}

echo "All chinchillas updated!";
$conn->close();
?>

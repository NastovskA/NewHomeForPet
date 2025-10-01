<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adoption_fostering";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);


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
    if(isset($data[0])) {
        return ['lat'=>floatval($data[0]['lat']), 'lon'=>floatval($data[0]['lon'])];
    }
    return ['lat'=>0, 'lon'=>0];
}

$result = $conn->query("SELECT id, city FROM animals");

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $coords = getCoordinatesByCity($row['city']);
        $lat = $coords['lat'];
        $lon = $coords['lon'];

        $conn->query("UPDATE animals SET lat=$lat, lon=$lon WHERE id={$row['id']}");

        sleep(1); 
        echo "Updated animal id {$row['id']} ({$row['city']}) → [$lat, $lon]<br>";
        flush();
    }
} else {
    echo "No animals found in the table.";
}

echo "All done!";
$conn->close();
?>

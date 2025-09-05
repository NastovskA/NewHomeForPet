<?php
// Подеси конекција кон базата
$host = "localhost";
$user = "root"; // или твој user
$pass = "";     // лозинка ако имаш
$db   = "adoption_fostering"; // твојата база

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Неуспешна конекција: " . $conn->connect_error);
}

// API key
$apiKey = "live_0M8GeiSzTc2Upjc5HJUYlnScPsmvnt1NiqnY8x5BEmWmYLJ3m193Cpwvs0fccUrc";

for ($id = 1; $id <= 70; $id++) {
    // Повлечи една слика од API
    $url = "https://api.thecatapi.com/v1/images/search?limit=1";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['x-api-key: ' . $apiKey]);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    if (!empty($data[0]['url'])) {
        $images_url = $data[0]['url'];

        // Апдејтирај ја сликата во базата
        $stmt = $conn->prepare("UPDATE cats SET images_url = ? WHERE id = ?");
        $stmt->bind_param("si", $images_url, $id);
        $stmt->execute();

        echo "✅ Мачка со ID {$id} доби слика: {$images_url}<br>";
    } else {
        echo "⚠️ Нема слика за ID {$id}<br>";
    }
}

$conn->close();
echo "<br>Готово – сите мачки од 1 до 70 добија слики!";
?>

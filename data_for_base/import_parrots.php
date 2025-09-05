<!-- SO OVA GI DODADOV SLIKITE -->
<?php
// Податоци за API и базата
$apiKey = "51913697-65f801a7cfa593e63623e421d";
$query = "parrots";
$perPage = 70; // број на слики

// Земаме слики од Pixabay
$url = "https://pixabay.com/api/?key=$apiKey&q=$query&image_type=photo&per_page=$perPage";
$response = file_get_contents($url);
$data = json_decode($response, true);

if (empty($data['hits']) || !is_array($data['hits'])) {
    die("Не се добија слики од API.");
}

// Конекција со базата
$pdo = new PDO("mysql:host=localhost;dbname=adoption_fostering;charset=utf8", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// Патека за зачувување на локални слики
$folder = __DIR__ . "/NewHomeForPet/parrots/";
if (!is_dir($folder)) mkdir($folder, 0755, true);

// Влечење и зачувување на слики + ажурирање на постоечки ID 1–70
foreach ($data['hits'] as $index => $hit) {
    $id = $index + 1; // ID од 1 до 70
    $image_url = $hit['largeImageURL'];

    // Локален фајл
    $local_file = $folder . $id . ".png";

    // Преземи слика и зачувај локално
    $image_data = @file_get_contents($image_url);
    if ($image_data) {
        file_put_contents($local_file, $image_data);

        // Ажурирање во базата со локален пат
        $stmt = $pdo->prepare("UPDATE parrots SET images_url = ? WHERE id = ?");
        $stmt->execute(["NewHomeForPet/parrots/$id.png", $id]);

        echo "ID $id успешно ажуриран со локална слика.<br>";
    } else {
        echo "Грешка при влечење на сликата за ID $id<br>";
    }
}

echo "<br>Сликите за папагали се успешно зачувани локално и ажурирани во базата!";
?>

<?php
$apiKey = "51913697-65f801a7cfa593e63623e421d";
$query = "rabbit";
$perPage = 70; // Број на слики
$url = "https://pixabay.com/api/?key=$apiKey&q=$query&image_type=photo&per_page=$perPage";

// Земаме JSON од Pixabay
$response = file_get_contents($url);
$data = json_decode($response, true);

if (empty($data['hits']) || !is_array($data['hits'])) {
    die("Не се добија слики од API.");
}

// Конекција со базата
$pdo = new PDO("mysql:host=localhost;dbname=adoption_fostering;charset=utf8", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// Папка каде ќе ги зачуваме сликите
$folder = __DIR__ . "/NewHomeForPet/rabbits/";
if (!is_dir($folder)) mkdir($folder, 0755, true);

// Зачувување и ажурирање во базата
foreach ($data['hits'] as $index => $hit) {
    $id = $index + 1; // ID од 1 до 70
    $image_url = $hit['largeImageURL'];

    // Преземи слика и зачувај локално
    $image_data = file_get_contents($image_url);
    $local_file = $folder . $id . ".png"; // користиме PNG
    file_put_contents($local_file, $image_data);

    // Ажурирање на базата со локална патека
    $stmt = $pdo->prepare("UPDATE rabbits SET images_url = ? WHERE id = ?");
    $stmt->execute(["rabbits/$id.png", $id]);
}

echo "Сликите за зајаци успешно зачувани локално и ажурирани во базата за ID 1–70!";
?>

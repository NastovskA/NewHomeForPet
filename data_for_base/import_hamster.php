<?php
$apiKey = "51913697-65f801a7cfa593e63623e421d"; // API key
$query = "hamster";
$perPage = 70; 
$url = "https://pixabay.com/api/?key=$apiKey&q=$query&image_type=photo&per_page=$perPage";

$response = file_get_contents($url);
$data = json_decode($response, true);

if (empty($data['hits']) || !is_array($data['hits'])) {
    die("Не се добија слики од API.");
}

$pdo = new PDO("mysql:host=localhost;dbname=adoption_fostering;charset=utf8", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$folder = __DIR__ . "/NewHomeForPet/hamsters/";
if (!is_dir($folder)) mkdir($folder, 0755, true);

foreach ($data['hits'] as $index => $hit) {
    $id = $index + 1; 
    $image_url = $hit['largeImageURL'];

    $image_data = file_get_contents($image_url);
    $local_file = $folder . $id . ".png"; 
    file_put_contents($local_file, $image_data);

    $stmt = $pdo->prepare("UPDATE animals SET images_url = ? WHERE id = ?");
    $stmt->execute(["hamsters/$id.png", $id]);
}

echo "Сликите за хамстери успешно зачувани локално и ажурирани во базата за ID 1–70!";
?>

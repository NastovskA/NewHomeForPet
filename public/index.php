<?php

require_once __DIR__ . '/../models/Database.php'; // Вклучуваме класа за поврзување со базата
require_once __DIR__ . '/../models/Animal.php'; // Вклучуваме класа за работа со животни
require_once __DIR__ . '/../views/home.php'; //za da raboti pocetnata stranica
require_once __DIR__ . '/../views/landing.php'; //ova mi e povikoot za najj pocetnata stranica

// Создаваме објект за база и се поврзуваме
$db = new Database();
$conn = $db->connect();

// Proverka za vrskata ako ne e uspesna ke se pojavi porakata, ako e uspesna nema potreba nisto da se lista
if (!$conn) {
    die("Connection failed!");
}
// Го земаме списокот на сите животни од базата
$animalModel = new Animal();
$animals = $animalModel->getAll();

?>


<!-- OD TUKA POCNUVA KREIRANJE NA HOME PAGE -->

<!DOCTYPE html>
<html>
<head>
    <title>Adoption Animals</title>
</head>
<body>
    <h1>Available Animals</h1>
    <div>
        <?php foreach ($animals as $animal): ?>
            <div style="border:1px solid #ccc; margin:10px; padding:10px;">
                <h2><?= htmlspecialchars($animal['name']) ?> (<?= htmlspecialchars($animal['species']) ?>)</h2>
                <p>Breed: <?= htmlspecialchars($animal['breed']) ?> | Age: <?= htmlspecialchars($animal['age']) ?> | Gender: <?= htmlspecialchars($animal['gender']) ?></p>
                <p><?= htmlspecialchars($animal['description']) ?></p>
                <?php if ($animal['photo']): ?>
                    <img src="<?= htmlspecialchars($animal['photo']) ?>" width="200">
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
<?php
session_start();
header('Content-Type: application/json');

try {
    $pdo = new PDO("mysql:host=localhost;dbname=adoption_fostering", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Прочитај JSON тело од AJAX
        $input = json_decode(file_get_contents('php://input'), true);
        $email = trim($input['email'] ?? '');
        $password = $input['password'] ?? '';

        if (empty($email) || empty($password)) {
            echo json_encode(['status' => 'error', 'message' => 'Please fill in all the fields.']);
            exit();
        }

        $stmt = $pdo->prepare("SELECT id, name, surname, email, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            echo json_encode(['status' => 'no_user', 'message' => 'A user with this email does not exist.']);
            exit();
        }

        if (password_verify($password, $user['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'] . ' ' . $user['surname'];
            echo json_encode(['status' => 'success']);
            exit();
        } else {
            echo json_encode(['status' => 'wrong_password', 'message' => 'Incorrect password.']);
            exit();
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Unauthorized access.']);
        exit();
    }
} catch (PDOException $e) {
    error_log("Login DB Error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'A technical error occurred. Please try again later.']);
    exit();
}

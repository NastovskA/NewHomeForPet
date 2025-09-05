<?php
// Овие мора да бидат најгоре, пред се
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
header('Content-Type: application/json');

// Вклучи Composer autoload
require __DIR__ . '/../../vendor/autoload.php';

// 📌 Конекција со база
$pdo = new PDO("mysql:host=localhost;dbname=adoption_fostering", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    if (empty($email)) {
        echo json_encode(['success' => false, 'message' => 'Please enter an email.']);
        exit;
    }

    // 1️⃣ Провери дали email постои
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo json_encode(['success' => false, 'message' => 'No user found with this email.']);
        exit;
    }

    // 2️⃣ Генерирај токен и истек
    $token = bin2hex(random_bytes(32)); 
    $expires = date("Y-m-d H:i:s", strtotime("+30 minutes"));

    // 3️⃣ Сними го во база (табела reset_tokens)
    $pdo->prepare("INSERT INTO password_resets (user_id, token, expires_at) VALUES (?, ?, ?)")
        ->execute([$user['id'], $token, $expires]);

    // 4️⃣ Линк за ресет
    $resetLink = "http://localhost/NewHomeForPet/views/users/reset_password.php?token=" . $token;

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "petheart111@gmail.com";
        $mail->Password = "ufcldlfnkbiqpnya"; // користи App Password
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;

        $mail->setFrom("petheart111@gmail.com", "PetHeart");
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = "Password Reset - PetHeart";
        $mail->Body = "Hello,<br><br>Click the link to reset your password:<br>
                       <a href='$resetLink'>$resetLink</a><br><br>
                       This link is valid for 30 minutes.";

        $mail->send();
        echo json_encode(['success' => true, 'message' => 'A password reset email has been sent.']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => ' Unable to send email.' . $mail->ErrorInfo]);
    }
}

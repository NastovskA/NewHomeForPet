<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    try {
        // 1️⃣ Прати до тебе (site admin)
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'petheart111@gmail.com';
        $mail->Password   = 'ufcldlfnkbiqpnya';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('petheart111@gmail.com');
        $mail->isHTML(true);
        $mail->Subject = "New message from $name";
        $mail->Body    = "Name: $name <br>Email: $email <br>Message:<br>$message";

        $mail->send();

        // 2️⃣ Autoreply до корисникот
        $autoreply = new PHPMailer(true);
        $autoreply->isSMTP();
        $autoreply->Host       = 'smtp.gmail.com';
        $autoreply->SMTPAuth   = true;
        $autoreply->Username   = 'petheart111@gmail.com';
        $autoreply->Password   = 'ufcldlfnkbiqpnya';
        $autoreply->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $autoreply->Port       = 587;

        $autoreply->setFrom('petheart111@gmail.com', 'PetHeart Team');
        $autoreply->addAddress($email, $name);
        $autoreply->isHTML(true);
        $autoreply->Subject = "Thank you for your message!";
        $autoreply->Body    = "Hi $name,<br><br>Thank you for your message! We appreciate your feedback and will get back to you soon.<br><br>Best regards,<br>PetHeart Team";

        $autoreply->send();

        // ALERT + REDIRECT
        echo "<script>
                alert('The message has been sent successfully!');
                window.location.href='home.php';
              </script>";
        exit;

    } catch (Exception $e) {
        echo "<script>
                alert('An error occurred while sending the message: {$e->getMessage()}');
                window.history.back();
              </script>";
        exit;
    }
}
?>

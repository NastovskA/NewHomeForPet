<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

// Start session
session_start();

// Define base URL if not defined
if (!defined('BASE_URL')) {
    define('BASE_URL', 'http://localhost/NewHomeForPet');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"] ?? '';
    $email = $_POST["email"] ?? '';
    $subject = $_POST["subject"] ?? 'No Subject';
    $message = $_POST["message"] ?? '';

    // Validate input
    if (empty($name) || empty($email) || empty($message)) {
        $_SESSION['contact_message'] = 'Please fill in all required fields';
        $_SESSION['contact_message_type'] = 'error';
        header('Location: ' . BASE_URL . '/contact');
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['contact_message'] = 'Please provide a valid email address';
        $_SESSION['contact_message_type'] = 'error';
        header('Location: ' . BASE_URL . '/contact');
        exit();
    }

    $mail = new PHPMailer(true);

    try {
        // 1️⃣ Send to site admin
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
        $mail->Subject = "Contact Form: $subject";
        $mail->Body    = "
            <html>
            <head>
                <title>Contact Form Submission</title>
            </head>
            <body>
                <h2>Contact Form Submission</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Subject:</strong> $subject</p>
                <p><strong>Message:</strong></p>
                <p>$message</p>
            </body>
            </html>
        ";

        $mail->send();

        // 2️⃣ Autoreply to the user
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
        $autoreply->Body    = "
            <html>
            <head>
                <title>Thank you for your message</title>
            </head>
            <body>
                <h2>Hi $name,</h2>
                <p>Thank you for your message! We appreciate your feedback and will get back to you soon.</p>
                <p><strong>Your message:</strong><br>$message</p>
                <p>Best regards,<br>PetHeart Team</p>
            </body>
            </html>
        ";

        $autoreply->send();

        // Set success message and redirect to home page
        $_SESSION['contact_message'] = 'Your message has been sent successfully!';
        $_SESSION['contact_message_type'] = 'success';
        header('Location: ' . BASE_URL . '/home');
        exit();

    } catch (Exception $e) {
        // Set error message and redirect back to contact page
        $_SESSION['contact_message'] = 'An error occurred while sending the message: ' . $e->getMessage();
        $_SESSION['contact_message_type'] = 'error';
        header('Location: ' . BASE_URL . '/contact');
        exit();
    }
} else {
    // If not POST, redirect to contact page
    header('Location: ' . BASE_URL . '/contact');
    exit();
}
?>
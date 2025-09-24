<?php
require_once __DIR__ . '/../models/ContactModel.php';
require __DIR__ . '/../vendor/autoload.php'; // PHPMailer autoload

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController {
    private $model;

    public function __construct() {
        // Initialize database connection
        require_once __DIR__ . '/../config/database.php';
        $database = new Database();
        $db = $database->getConnection();

        $this->model = new ContactModel($db);
    }

    public function index() {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Get contact info from database if needed
        $contactInfo = $this->model->getContactInfo();

        // Get messages from session (success/error)
        $message = '';
        $messageType = '';
        if (isset($_SESSION['contact_message'])) {
            $message = $_SESSION['contact_message'];
            $messageType = $_SESSION['contact_message_type'];
            unset($_SESSION['contact_message']);
            unset($_SESSION['contact_message_type']);
        }

        // Include contact view
        require_once __DIR__ . '/../views/contact.php';
    }

    public function send() {
        // Start session
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->handleFormSubmission($_POST);

            // Store message in session for feedback
            $_SESSION['contact_message'] = $result['message'];
            $_SESSION['contact_message_type'] = $result['success'] ? 'success' : 'error';

            // Redirect accordingly
            $redirectUrl = $result['success'] ? BASE_URL . '/home' : BASE_URL . '/contact';
            header("Location: $redirectUrl");
            exit();
        }

        // Redirect if accessed not via POST
        header("Location: " . BASE_URL . "/contact");
        exit();
    }

    private function handleFormSubmission($postData) {
        $name = trim($postData['name'] ?? '');
        $email = trim($postData['email'] ?? '');
        $subject = trim($postData['subject'] ?? 'No Subject');
        $message = trim($postData['message'] ?? '');

        // Validation
        if (empty($name) || empty($email) || empty($message)) {
            return ['success' => false, 'message' => 'Please fill in all required fields'];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'message' => 'Please provide a valid email address'];
        }

        // Save message in database
        $saved = $this->model->saveContactMessage($name, $email, $subject, $message);
        if (!$saved) {
            return ['success' => false, 'message' => 'Database error. Please try again.'];
        }

        // Send email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'petheart111@gmail.com'; // Your Gmail
            $mail->Password   = 'ufcldlfnkbiqpnya';     // App password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Email to site admin
            $mail->setFrom('petheart111@gmail.com', 'PetHeart Contact Form');
            $mail->addReplyTo($email, $name); // User email for reply
            $mail->addAddress('petheart111@gmail.com'); 
            $mail->isHTML(true);
            $mail->Subject = "Contact Form: $subject";
            $mail->Body    = "
                <html>
                <head><title>Contact Form Submission</title></head>
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

            // Optional: Auto-reply to user
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
                <head><title>Thank You</title></head>
                <body>
                    <h2>Hi $name,</h2>
                    <p>Thank you for your message! We will get back to you soon.</p>
                    <p>Best regards,<br>PetHeart Team</p>
                </body>
                </html>
            ";
            $autoreply->send();

            return ['success' => true, 'message' => 'Your message has been sent successfully!'];

        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Message saved but error sending email: ' . $mail->ErrorInfo];
        }
    }
}
?>

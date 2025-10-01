<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_NAME', 'adoption_fostering');
define('DB_USER', 'root');
define('DB_PASS', '');

class DatabaseConnection {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
                DB_USER,
                DB_PASS,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}

class UserRegistration {
    private $pdo;
    private $errors = [];

    public function __construct() {
        $this->pdo = DatabaseConnection::getInstance()->getConnection();
    }

    private function validateInput($data) {
        $this->errors = [];

        // First Name Validation
        if (empty($data['first_name'])) {
            $this->errors[] = "First name is required and cannot be empty.";
        } elseif (strlen($data['first_name']) < 2) {
            $this->errors[] = "First name must be at least 2 characters long.";
        } elseif (!preg_match('/^[a-zA-ZÀ-ÿ\s\'-]+$/', $data['first_name'])) {
            $this->errors[] = "First name can only contain letters, spaces, hyphens, and apostrophes.";
        }

        // Last Name Validation
        if (empty($data['last_name'])) {
            $this->errors[] = "Last name is required and cannot be empty.";
        } elseif (strlen($data['last_name']) < 2) {
            $this->errors[] = "Last name must be at least 2 characters long.";
        } elseif (!preg_match('/^[a-zA-ZÀ-ÿ\s\'-]+$/', $data['last_name'])) {
            $this->errors[] = "Last name can only contain letters, spaces, hyphens, and apostrophes.";
        }

        // Age Validation
        if (empty($data['age']) || !is_numeric($data['age'])) {
            $this->errors[] = "Age is required and must be a valid number.";
        } elseif ($data['age'] < 18) {
            $this->errors[] = "You must be at least 18 years old to register for pet adoption services.";
        } elseif ($data['age'] > 120) {
            $this->errors[] = "Please enter a valid age (maximum 120 years).";
        }

        // Gender Validation
        if (empty($data['gender'])) {
            $this->errors[] = "Gender selection is required. Please choose from the available options.";
        } elseif (!in_array($data['gender'], ['Male', 'Female', 'Other', 'Prefer not to say'])) {
            $this->errors[] = "Please select a valid gender option from the dropdown menu.";
        }

        // Phone Validation
        if (empty($data['phone'])) {
            $this->errors[] = "Phone number is required for account verification and communication purposes.";
        } elseif (!preg_match('/^[\d\-\+\(\)\s]{10,20}$/', $data['phone'])) {
            $this->errors[] = "Phone number format is invalid. Please use only numbers, spaces, hyphens, plus signs, and parentheses.";
        }

        // Email Validation
        if (empty($data['email'])) {
            $this->errors[] = "Email address is required for account creation and important notifications.";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Please enter a valid email address in the format: example@domain.com.";
        } elseif (strlen($data['email']) > 255) {
            $this->errors[] = "Email address is too long. Please use an email address with fewer than 255 characters.";
        }

        // Password Validation
        if (empty($data['password'])) {
            $this->errors[] = "Password is required to secure your account and protect your personal information.";
        } elseif (strlen($data['password']) < 8) {
            $this->errors[] = "Password must be at least 8 characters long for optimal security protection.";
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).*$/', $data['password'])) {
            $this->errors[] = "Password must contain at least one lowercase letter, one uppercase letter, and one number for enhanced security.";
        }

        // Experience Validation
        if (empty($data['pet_experience'])) {
            $this->errors[] = "Pet experience information is required to match you with suitable pets for adoption.";
        } elseif (!in_array($data['pet_experience'], ['None', 'Beginner', 'Intermediate', 'Expert'])) {
            $this->errors[] = "Please select a valid pet experience level from the provided options.";
        }

        return empty($this->errors);
    }

    private function emailExists($email) {
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() !== false;
    }

    public function register($data) {
        if (!$this->validateInput($data)) {
            return ['success' => false, 'errors' => $this->errors];
        }

        if ($this->emailExists($data['email'])) {
            return ['success' => false, 'errors' => ['This email address is already registered in our system. Please use a different email or try logging in with your existing account.']];
        }

        try {
            $hashedPassword = password_hash($data['password'], PASSWORD_ARGON2ID);
            
        $stmt = $this->pdo->prepare("
            INSERT INTO users (name, surname, age, gender, phone, email, password, experiences, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())
        ");

        $stmt->execute([
            $data['first_name'],  // од формата, ама ќе оди во 'ime'
            $data['last_name'],   // оди во 'prezime'
            $data['age'],         // оди во 'vozrast'
            $data['gender'],      // оди во 'pol'
            $data['phone'],       // оди во 'tel'
            $data['email'],
            $hashedPassword,
            $data['pet_experience']
        ]);

        echo "<script>

        window.location.href = '../../index.php';
        </script>";
        exit;

        }  catch (PDOException $e) {
           echo "An unexpected error occurred during registration. Please try again later or contact our support team for assistance.";
        }

    }

    public function getErrors() {
        return $this->errors;
    }
}

// Handle form submission
$registrationResult = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registration = new UserRegistration();
    
    $formData = [
        'first_name' => trim($_POST['first_name'] ?? ''),
        'last_name' => trim($_POST['last_name'] ?? ''),
        'age' => filter_var($_POST['age'] ?? '', FILTER_VALIDATE_INT),
        'gender' => $_POST['gender'] ?? '',
        'phone' => trim($_POST['phone'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'password' => $_POST['password'] ?? '',
        'pet_experience' => $_POST['pet_experience'] ?? ''
    ];

    $registrationResult = $registration->register($formData);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Our Pet Family - Pawsome Adoption Center</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%);
            animation: backgroundShift 15s ease-in-out infinite;
            z-index: -1;
        }

        @keyframes backgroundShift {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(-20px, -20px) rotate(1deg); }
        }

        .container {
            display: flex;
            min-height: 100vh;
            max-width: 1400px;
            margin: 0 auto;
            padding: 12px;
            gap: 40px;
            align-items: center;
        }

        /* Left Side - Welcome Section */
        .welcome-section {
            flex: 1;
            max-width: 600px;
            padding: 20px;
            color: white;
            animation: slideInLeft 0.8s ease-out;
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .welcome-header {
            margin-bottom: 10px;
        }

        .welcome-header h1 {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #fff, #e0e7ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .welcome-header p {
            font-size: 1.25rem;
            line-height: 1.6;
            opacity: 0.9;
            margin-bottom: 15px;
        }

        .features-list {
            list-style: none;
            margin-bottom: 20px;
        }

        .features-list li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 1.1rem;
            opacity: 0.95;
        }

        .features-list li i {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px;
            border-radius: 50%;
            margin-right: 10px;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pet-stats {
            display: flex;
            gap: 10px;
            margin-top: 17px;
        }

        .stat-item {
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            padding: 5px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            flex: 1;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            display: block;
            margin-bottom: 2px;
        }

        /* Right Side - Registration Form */
        .form-section {
            flex: 1;
            max-width: 550px;
            animation: slideInRight 0.8s ease-out 0.2s both;
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 24px;
            padding: 20px;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
        }

        .form-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .form-header h2 {
            color: #1a1a1a;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .form-header p {
            color: #6b7280;
            font-size: 1.05rem;
            line-height: 1.5;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5x;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 8px;
        }

        .form-group.full-width {
            grid-column: span 5;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-weight: 600;
            font-size: 0.95rem;
            position: relative;
        }

        label .required {
            color: #ef4444;
            margin-left: 2px;
        }

        .input-wrapper {
            position: relative;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 8px 14px;
            border: 2px solid #e5e7eb;
            border-radius: 15px;
            font-size: 12px;
            font-family: inherit;
            transition: all 0.3s ease;
            background: #fafafa;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        select {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 6px center;
            background-repeat: no-repeat;
            background-size: 10px;
            padding-right: 10px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
            font-family: inherit;
        }

        .password-strength {
            margin-top: 6px;
            font-size: 0.85rem;
            color: #6b7280;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 12px;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        /* Alert Styles */
        .alert {
            padding: 10px 16px;
            border-radius: 12px;
            margin-bottom: 12px;
            font-weight: 500;
            animation: slideInDown 0.5s ease-out;
        }

        @keyframes slideInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            border: 1px solid #b8dacc;
            color: #155724;
        }

        .alert-error {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            border: 1px solid #f1b9bc;
            color: #721c24;
        }

        .error-list {
            margin: 0;
            padding-left: 10px;
            line-height: 1.6;
        }

        .error-list li {
            margin-bottom: 8px;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .container {
                flex-direction: column;
                max-width: 600px;
            }
            
            .welcome-section {
                text-align: center;
                max-width: none;
            }
            
            .welcome-header h1 {
                font-size: 2.8rem;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
                gap: 20px;
            }

            .form-container {
                padding: 20px 12px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full-width {
                grid-column: span 1;
            }

            .welcome-header h1 {
                font-size: 2.2rem;
            }

            .pet-stats {
                flex-direction: column;
                gap: 15px;
            }
        }

        /* Loading Animation */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .loading .submit-btn {
            background: #9ca3af;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <div class="welcome-header">
                <h1>Find Your Perfect Companion</h1>
                <p>Join thousands of pet parents who found their furry family members through our trusted adoption platform. Every pet deserves a loving home, and every home deserves the joy of a loyal companion.</p>
            </div>

            <ul class="features-list">
                <li>
                    <i class="fas fa-heart"></i>
                    <span>Over 10,000 successful adoptions and happy families created</span>
                </li>
                <li>
                    <i class="fas fa-shield-alt"></i>
                    <span>Comprehensive health checks and vaccination records for all pets</span>
                </li>
                <li>
                    <i class="fas fa-users"></i>
                    <span>24/7 support team and experienced pet care advisors</span>
                </li>
                <li>
                    <i class="fas fa-home"></i>
                    <span>Foster programs and temporary care options available</span>
                </li>
            </ul>

            <div class="pet-stats">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span>Pets Available</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">95%</span>
                    <span>Success Rate</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span>Support</span>
                </div>
            </div>
        </div>

        <!-- Registration Form -->
        <div class="form-section">
            <div class="form-container">
                <div class="form-header">
                    <h2>Create Your Account</h2>
                </div>

                <?php
if ($registrationResult && $registrationResult['success']) {
    // Само пренасочување ако регистрацијата е успешна
    header("Location: login.php");
    exit;
} elseif ($registrationResult && !$registrationResult['success']) {
    // Тука можеш да прикажеш само грешки без alert, ако сакаш
    foreach ($registrationResult['errors'] as $error) {
        echo htmlspecialchars($error) . "<br>";
    }
}
?>

                <form method="POST" action="" novalidate>
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="first_name">First Name <span class="required">*</span></label>
                            <input type="text" id="first_name" name="first_name" 
                                   value="<?= htmlspecialchars($_POST['first_name'] ?? '') ?>" 
                                   placeholder="Enter your first name" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name <span class="required">*</span></label>
                            <input type="text" id="last_name" name="last_name" 
                                   value="<?= htmlspecialchars($_POST['last_name'] ?? '') ?>" 
                                   placeholder="Enter your last name" required>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="age">Age <span class="required">*</span></label>
                            <input type="number" id="age" name="age" min="18" max="120" 
                                   value="<?= htmlspecialchars($_POST['age'] ?? '') ?>" 
                                   placeholder="Your age" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender <span class="required">*</span></label>
                            <select id="gender" name="gender" required>
                                <option value="">Select your gender</option>
                                <option value="Male" <?= ($_POST['gender'] ?? '') === 'Male' ? 'selected' : '' ?>>Male</option>
                                <option value="Female" <?= ($_POST['gender'] ?? '') === 'Female' ? 'selected' : '' ?>>Female</option>
                                <option value="Other" <?= ($_POST['gender'] ?? '') === 'Other' ? 'selected' : '' ?>>Other</option>
                                <option value="Prefer not to say" <?= ($_POST['gender'] ?? '') === 'Prefer not to say' ? 'selected' : '' ?>>Prefer not to say</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="phone">Phone Number <span class="required">*</span></label>
                        <input type="text" id="phone" name="phone" 
                               value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>" 
                               placeholder="077 123 456" required>
                    </div>

                    <div class="form-group full-width">
                        <label for="email">Email Address <span class="required">*</span></label>
                        <input type="email" id="email" name="email" 
                               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" 
                               placeholder="your.email@example.com" required>
                    </div>

                    <div class="form-group full-width">
                        <label for="password">Password <span class="required">*</span></label>
                        <input type="password" id="password" name="password" 
                               placeholder="Create a secure password" minlength="8" required>
                        <div class="password-strength">
                            Must contain at least 8 characters with uppercase, lowercase, and numbers
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="pet_experience">Pet Care Experience <span class="required">*</span></label>
                        <select id="pet_experience" name="pet_experience" required>
                            <option value="">Select your experience level</option>
                            <option value="None" <?= ($_POST['pet_experience'] ?? '') === 'None' ? 'selected' : '' ?>>No previous pet experience</option>
                            <option value="Beginner" <?= ($_POST['pet_experience'] ?? '') === 'Beginner' ? 'selected' : '' ?>>Beginner (1-2 years experience)</option>
                            <option value="Intermediate" <?= ($_POST['pet_experience'] ?? '') === 'Intermediate' ? 'selected' : '' ?>>Intermediate (3-5 years experience)</option>
                            <option value="Expert" <?= ($_POST['pet_experience'] ?? '') === 'Expert' ? 'selected' : '' ?>>Expert (5+ years experience)</option>
                        </select>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paw"></i>
                        Create My Account & Start Adopting
                    </button>
                    <button type="button" class="submit-btn" onclick="window.location.href='../../index.php'">
                        <i class="fas fa-paw"></i>
                        Back to home page
                    </button>

                </form>
<!-- 
                <div class="login-link">
                    <p>Already have an account? <a href="../landing.php">Log in to continue your adoption journey</a></p>
                </div> -->
            </div>
        </div>
    </div>

    <script>
        // Form enhancement script
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitBtn = document.querySelector('.submit-btn');
            
            form.addEventListener('submit', function() {
                submitBtn.classList.add('loading');
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Creating Your Account...';
            });

            // Real-time password strength indicator
            const passwordInput = document.getElementById('password');
            const strengthIndicator = document.querySelector('.password-strength');
            
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                let feedback = [];

                if (password.length >= 8) strength++;
                else feedback.push('at least 8 characters');

                if (/[a-z]/.test(password)) strength++;
                else feedback.push('lowercase letter');

                if (/[A-Z]/.test(password)) strength++;
                else feedback.push('uppercase letter');

                if (/\d/.test(password)) strength++;
                else feedback.push('number');

                if (feedback.length === 0) {
                    strengthIndicator.innerHTML = '<span style="color: #22c55e;"><i class="fas fa-check"></i> Strong password!</span>';
                } else {
                    strengthIndicator.innerHTML = `Need: ${feedback.join(', ')}`;
                }
            });

            // Auto-format phone number to 077 777 777
            const phoneInput = document.getElementById('phone');

            phoneInput.addEventListener('input', function () {
                let value = this.value.replace(/\D/g, ''); // Remove non-digit characters

                if (value.length > 3 && value.length <= 6) {
                    value = value.replace(/(\d{3})(\d+)/, '$1 $2');
                } else if (value.length > 6) {
                    value = value.replace(/(\d{3})(\d{3})(\d+)/, '$1 $2 $3');
                }

                this.value = value;
            });


            // Smooth scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Apply animations to form groups
            document.querySelectorAll('.form-group').forEach((group, index) => {
                group.style.opacity = '0';
                group.style.transform = 'translateY(20px)';
                group.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
                observer.observe(group);
            });
        });
    </script>
</body>
</html>
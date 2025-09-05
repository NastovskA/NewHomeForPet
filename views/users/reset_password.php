<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=adoption_fostering", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$token = $_GET['token'] ?? '';
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Проверка дали лозинките се исти
    if ($password !== $confirm_password) {
        $error = "Passwords do not match. Please correct them.";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM password_resets WHERE token = ? AND expires_at > NOW()");
        $stmt->execute([$token]);
        $reset = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($reset) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $pdo->prepare("UPDATE users SET password = ? WHERE id = ?")
                ->execute([$hashed, $reset['user_id']]);

            $pdo->prepare("DELETE FROM password_resets WHERE token = ?")->execute([$token]);

            $success = "The password has been successfully reset. You can now log in.";
        } else {
            $error = "Invalid or expired token.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="mk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Основен ресет */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(-45deg, #89f7fe, #66a6ff, #fbc2eb, #a18cd1);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            overflow: hidden;
            position: relative;
        }

        @keyframes gradientBG {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        .container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
            z-index: 2;
        }

        .card {
            background-color: #ffffffee;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            display: flex;
            flex-direction: column;
            gap: 30px; /* простор меѓу сите child елементи */
            transform: translateY(-50px);
            opacity: 0;
            animation: formFadeIn 1s forwards;
        }

        @keyframes formFadeIn {
            to { transform: translateY(0); opacity: 1; }
        }

        .card-header {
            text-align: center;
            margin-bottom: 30px; /* простор под header */
        }

        .card-header h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .card-header p {
            color: #666;
            font-size: 16px;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            background: linear-gradient(90deg, #66a6ff, #fbc2eb);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo i {
            font-size: 40px;
            color: white;
        }

        form input[type="password"] {
            width: 100%;
            padding: 14px 15px;
            border: 2px solid #ddd;
            border-radius: 12px;
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s, transform 0.2s;
        }

        form input[type="password"]:focus {
            border-color: #66a6ff;
            box-shadow: 0 0 15px #66a6ff55;
            outline: none;
            transform: scale(1.03);
        }

        .password-strength {
            height: 5px;
            margin-top: 8px;
            border-radius: 3px;
            background: #eee;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0;
            border-radius: 3px;
            transition: width 0.3s, background 0.3s;
        }

        form input[type="hidden"] { display: none; }

        .btn {
            padding: 25px;
            background: linear-gradient(90deg, #66a6ff, #fbc2eb);
            border: none;
            border-radius: 15px;
            color: white;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
            width: 100%;
        }

        .btn::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: -100%;
            background: rgba(255,255,255,0.3);
            transform: skewX(-20deg);
            transition: all 0.5s;
        }

        .btn:hover::after { left: 100%; }
        .btn:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0,0,0,0.3); }

        .alert {
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 25px; /* простор под alert */
            font-size: 15px;
        }

        .alert-error {
            background-color: #ffebee;
            color: #d32f2f;
            border-left: 4px solid #d32f2f;
        }

        .alert-success {
            background-color: #e8f5e9;
            color: #388e3c;
            border-left: 4px solid #388e3c;
        }

        .form-group {
            margin-bottom: 25px; /* простор помеѓу формските полиња */
        }

        .back-link {
            text-align: center;
            margin-top: 30px; /* простор над линкот */
        }

        .back-link a {
            color: #66a6ff;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .back-link a:hover {
            color: #fbc2eb;
            text-decoration: underline;
        }

        @media(max-width: 480px){
            .card { padding: 30px 20px; }
            .container { padding: 15px; }
        }

        /* Bubble стилови */
        .bubble {
            position: absolute;
            bottom: -100px;
            border-radius: 50%;
            opacity: 0.5;
            background: rgba(255,255,255,0.3);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            animation: rise linear infinite;
        }

        @keyframes rise {
            0% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(-50vh) translateX(20px); }
            100% { transform: translateY(-100vh) translateX(-20px); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="logo">
                    <i class="fas fa-lock"></i>
                </div>
                <h1>Reset your password</h1>
                <p>Enter your new password below</p>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> <?php echo $success; ?>
                </div>
            <?php else: ?>
                <form method="POST" id="resetForm">
                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                    
                    <div class="form-group">
                        <label for="password">New password</label>
                        <input type="password" id="password" name="password" placeholder="Enter a new password" required>
                        <div class="password-strength">
                            <div class="password-strength-bar" id="passwordStrengthBar"></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm_password">Confirm password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Repeat password" required>
                        <small id="passwordMatchText"></small>
                    </div>
                    
                    <button type="submit" class="btn">Change password</button>
                </form>
            <?php endif; ?>
            
            <div class="back-link">
                <a href="../landing.php"><i class="fas fa-arrow-left"></i> Back to the homepage</a>
            </div>
        </div>
    </div>

    <script>
        // Dynamic bubbles
        const numBubbles = 25;
        for(let i=0;i<numBubbles;i++){
            const bubble = document.createElement('div');
            bubble.classList.add('bubble');
            let size = Math.random()*40+10;
            bubble.style.width = size+'px';
            bubble.style.height = size+'px';
            bubble.style.left = Math.random()*100+'vw';
            bubble.style.animationDuration = (Math.random()*10+5)+'s';
            bubble.style.animationDelay = Math.random()*5+'s';
            document.body.appendChild(bubble);
        }

        // Password strength indicator
        const passwordInput = document.getElementById('password');
        const strengthBar = document.getElementById('passwordStrengthBar');
        
        passwordInput.addEventListener('input', function() {
            const password = passwordInput.value;
            let strength = 0;
            
            if (password.length >= 8) strength += 25;
            if (/[A-Z]/.test(password)) strength += 25;
            if (/[0-9]/.test(password)) strength += 25;
            if (/[^A-Za-z0-9]/.test(password)) strength += 25;
            
            strengthBar.style.width = strength + '%';
            
            if (strength < 50) {
                strengthBar.style.background = '#f44336';
            } else if (strength < 75) {
                strengthBar.style.background = '#ff9800';
            } else {
                strengthBar.style.background = '#4caf50';
            }
        });

        // Password confirmation check
        const confirmPasswordInput = document.getElementById('confirm_password');
        const passwordMatchText = document.getElementById('passwordMatchText');
        
        confirmPasswordInput.addEventListener('input', function() {
            if (passwordInput.value !== confirmPasswordInput.value) {
                passwordMatchText.textContent = "Passwords do not match";
                passwordMatchText.style.color = '#f44336';
            } else {
                passwordMatchText.textContent = "Passwords match";
                passwordMatchText.style.color = '#4caf50';
            }
        });

        // Form validation
        document.getElementById('resetForm').addEventListener('submit', function(e) {
            if (passwordInput.value !== confirmPasswordInput.value) {
                e.preventDefault();
                passwordMatchText.textContent = "Passwords do not match. Please correct them.";
                passwordMatchText.style.color = '#f44336';
                confirmPasswordInput.focus();
            }
        });
    </script>
</body>
</html>

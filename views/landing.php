<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetHeart - Connect with Pet Lovers</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            --danger-gradient: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);
            
            --glass-light: rgba(255, 255, 255, 0.1);
            --glass-medium: rgba(255, 255, 255, 0.15);
            --glass-strong: rgba(255, 255, 255, 0.25);
            --glass-border: rgba(255, 255, 255, 0.2);
            
            --shadow-soft: 0 8px 32px rgba(0, 0, 0, 0.1);
            --shadow-medium: 0 16px 48px rgba(0, 0, 0, 0.15);
            --shadow-strong: 0 24px 64px rgba(0, 0, 0, 0.25);
            
            --text-primary: #ffffff;
            --text-secondary: rgba(255, 255, 255, 0.8);
            --text-muted: rgba(255, 255, 255, 0.6);
            
            --border-radius-sm: 12px;
            --border-radius-md: 16px;
            --border-radius-lg: 20px;
            --border-radius-xl: 24px;
            
            --transition-fast: 0.15s ease-out;
            --transition-medium: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: 0.5s cubic-bezier(0.23, 1, 0.320, 1);
            
            --z-background: -1;
            --z-content: 1;
            --z-header: 100;
            --z-modal: 1000;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(45deg, 
                #0f0c29 0%, 
                #302b63 25%, 
                #24243e 50%, 
                #8b5cf6 75%, 
                #a855f7 100%);
            background-size: 400% 400%;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
            animation: gradientFlow 20s ease infinite;
        }

        @keyframes gradientFlow {
            0%, 100% { background-position: 0% 50%; }
            25% { background-position: 100% 50%; }
            50% { background-position: 50% 100%; }
            75% { background-position: 50% 0%; }
        }

        /* Advanced Background Effects */
        body::before,
        body::after {
            content: '';
            position: fixed;
            pointer-events: none;
            z-index: var(--z-background);
        }

        body::before {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 15% 25%, rgba(147, 51, 234, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 85% 75%, rgba(139, 92, 246, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 50% 10%, rgba(168, 85, 247, 0.2) 0%, transparent 60%),
                radial-gradient(circle at 10% 90%, rgba(124, 58, 237, 0.2) 0%, transparent 60%);
            animation: floatingOrbs 25s ease-in-out infinite;
        }

        body::after {
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: 
                url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            animation: sparkles 30s linear infinite;
        }

        @keyframes floatingOrbs {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(-20px, -30px) rotate(90deg); }
            50% { transform: translate(30px, -20px) rotate(180deg); }
            75% { transform: translate(-10px, 20px) rotate(270deg); }
        }

        @keyframes sparkles {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(-60px, -60px) rotate(360deg); }
        }

        /* Enhanced Navigation */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: var(--z-header);
            padding: 16px 32px;
            background: var(--glass-light);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid var(--glass-border);
            transition: all var(--transition-medium);
        }

        .navbar.scrolled {
            padding: 12px 32px;
            background: var(--glass-medium);
            box-shadow: var(--shadow-soft);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 24px;
            font-weight: 800;
            color: var(--text-primary);
            text-decoration: none;
            transition: transform var(--transition-medium);
            cursor: pointer;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo-icon {
            font-size: 28px;
            filter: drop-shadow(0 0 20px rgba(147, 51, 234, 0.6));
            animation: logoPulse 3s ease-in-out infinite;
        }

        @keyframes logoPulse {
            0%, 100% { transform: scale(1); filter: drop-shadow(0 0 20px rgba(147, 51, 234, 0.6)); }
            50% { transform: scale(1.1); filter: drop-shadow(0 0 30px rgba(168, 85, 247, 0.8)); }
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link {
            position: relative;
            padding: 10px 20px;
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            border-radius: var(--border-radius-lg);
            transition: all var(--transition-medium);
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, var(--glass-light), transparent);
            transition: left var(--transition-slow);
        }

        .nav-link:hover {
            color: var(--text-primary);
            background: var(--glass-light);
            transform: translateY(-2px);
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link--primary {
            background: var(--secondary-gradient);
            color: var(--text-primary);
            font-weight: 600;
            box-shadow: 0 8px 25px rgba(245, 87, 108, 0.3);
        }

        .nav-link--primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(245, 87, 108, 0.4);
        }

        .nav-link--secondary {
            background: var(--glass-medium);
            border: 1px solid var(--glass-border);
        }

        /* Enhanced Main Content */
        .main-content {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 120px 32px 32px;
            position: relative;
            z-index: var(--z-content);
        }

        .login-card {
            width: 100%;
            max-width: 360px;
            background: var(--glass-light);
            backdrop-filter: blur(25px) saturate(180%);
            -webkit-backdrop-filter: blur(25px) saturate(180%);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius-xl);
            padding: 20px 18px;
            box-shadow: var(--shadow-strong);
            position: relative;
            overflow: hidden;
            animation: cardSlideUp 0.8s ease-out;
        }

        @keyframes cardSlideUp {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--secondary-gradient);
            border-radius: var(--border-radius-xl) var(--border-radius-xl) 0 0;
        }

        .card-header {
            text-align: center;
            margin-bottom: 12px;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            background: var(--secondary-gradient);
            border-radius: var(--border-radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin: 0 auto 12px;
            box-shadow: 0 12px 30px rgba(245, 87, 108, 0.3);
            transition: all var(--transition-medium);
            cursor: pointer;
        }

        .card-icon:hover {
            transform: rotateY(180deg) scale(1.1);
            box-shadow: 0 16px 40px rgba(245, 87, 108, 0.4);
        }

        .card-title {
            font-size: 22px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 8px;
            background: linear-gradient(135deg, #ffffff, #e2e8f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-subtitle {
            font-size: 14px;
            color: var(--text-muted);
            font-weight: 400;
        }

        /* Enhanced Form Elements */
        .form-group {
            margin-bottom: 14px;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-secondary);
            font-weight: 600;
            font-size: 14px;
            transition: color var(--transition-fast);
        }

        .input-wrapper {
            position: relative;
            transition: transform var(--transition-medium);
        }

        .form-input {
            width: 100%;
            padding: 10px 14px;
            background: var(--glass-light);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-md);
            color: var(--text-primary);
            font-size: 13px;
            font-family: inherit;
            transition: all var(--transition-medium);
            backdrop-filter: blur(10px);
        }

        .form-input::placeholder {
            color: var(--text-muted);
            transition: color var(--transition-fast);
        }

        .form-input:focus {
            outline: none;
            background: var(--glass-medium);
            border-color: rgba(245, 87, 108, 0.5);
            box-shadow: 
                0 0 0 3px rgba(245, 87, 108, 0.1),
                0 8px 25px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .form-input:focus::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .form-input:focus + .form-label {
            color: var(--text-primary);
        }

        .input-wrapper:focus-within {
            transform: translateY(-2px);
        }

        .password-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 18px;
            transition: all var(--transition-medium);
            padding: 4px;
            border-radius: 50%;
        }

        .password-toggle:hover {
            color: var(--text-primary);
            background: var(--glass-light);
            transform: translateY(-50%) scale(1.1);
        }

        /* Enhanced Links and Buttons */
        .forgot-link {
            display: inline-block;
            color: rgba(79, 172, 254, 0.9);
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            margin-bottom: 24px;
            transition: all var(--transition-medium);
            position: relative;
        }

        .forgot-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background: var(--accent-gradient);
            transition: width var(--transition-medium);
        }

        .forgot-link:hover {
            color: var(--text-primary);
            text-shadow: 0 0 20px rgba(79, 172, 254, 0.6);
        }

        .forgot-link:hover::after {
            width: 100%;
        }

        .btn {
            position: relative;
            width: 100%;
            padding: 10px 14px;
            border: none;
            border-radius: var(--border-radius-md);
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            cursor: pointer;
            transition: all var(--transition-medium);
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left var(--transition-slow);
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn--primary {
            background: var(--secondary-gradient);
            color: var(--text-primary);
            box-shadow: 0 12px 30px rgba(245, 87, 108, 0.3);
            margin-bottom: 24px;
        }

        .btn--primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 40px rgba(245, 87, 108, 0.4);
        }

        .btn--primary:active {
            transform: translateY(-1px);
        }

        /* Enhanced Footer Content */
        .card-footer {
            margin-top: 32px;
            text-align: center;
        }

        .terms-text {
            font-size: 11px;
            color: var(--text-muted);
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .terms-text a {
            color: rgba(79, 172, 254, 0.9);
            text-decoration: none;
            font-weight: 600;
            transition: all var(--transition-medium);
        }

        .terms-text a:hover {
            color: var(--text-primary);
            text-shadow: 0 0 15px rgba(79, 172, 254, 0.6);
        }

        .footer-links {
            font-size: 13px;
            color: var(--text-secondary);
        }

        .footer-links div {
            margin-bottom: 8px;
        }

        .footer-links a {
            color: var(--text-primary);
            text-decoration: none;
            font-weight: 600;
            transition: all var(--transition-medium);
            position: relative;
        }

        .footer-links a:hover {
            color: rgba(245, 87, 108, 0.9);
            text-shadow: 0 0 15px rgba(245, 87, 108, 0.5);
        }

        /* Loading States */
        .btn--loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .btn--loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: var(--text-primary);
            animation: spin 0.8s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Enhanced Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                padding: 12px 20px;
            }

            .nav-container {
                gap: 16px;
            }

            .nav-links {
                gap: 4px;
            }

            .nav-link {
                padding: 8px 12px;
                font-size: 13px;
            }

            .main-content {
                padding: 100px 20px 32px;
            }

            .login-card {
                max-width: 340px;
                padding: 16px 14px;
                box-sizing: border-box;
            }

            .card-title {
                font-size: 24px;
            }

            .card-icon {
                width: 56px;
                height: 56px;
                font-size: 24px;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                padding: 10px 16px;
            }

            .logo {
                font-size: 20px;
            }

            .main-content {
                padding: 90px 16px 24px;
            }

            .login-card {
                padding: 28px 20px;
            }
        }

        @media (max-height: 700px) {
            .main-content {
                padding: 80px 32px 24px;
            }

            .login-card {
                padding: 32px 30px;
            }

            .card-header {
                margin-bottom: 24px;
            }

            .form-group {
                margin-bottom: 18px;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--glass-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--secondary-gradient);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #f5576c, #f093fb);
        }

        /* Accessibility Improvements */
        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* Focus Styles for Better Accessibility */
        .btn:focus-visible,
        .form-input:focus-visible,
        .nav-link:focus-visible {
            outline: 2px solid rgba(79, 172, 254, 0.8);
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="#" class="logo">
                <span class="logo-icon">🐾</span>
                <span>PetHeart</span>
            </a>
            <div class="nav-links">
                <a href="../index.php" class="nav-link">Home</a>
                <a href="../about/index" class="nav-link">About us</a>
                <a href="../contact" class="nav-link">Contact</a>
                <a href="#" class="nav-link nav-link--primary">Log in</a>
                <a href="users/register.php" class="nav-link nav-link--secondary">Sign up</a>
            </div>
        </div>
    </nav>

    <main class="main-content">
        <div class="login-card">
            <header class="card-header">
                <div class="card-icon">🐾</div>
                <h1 class="card-title">Welcome to PetHeart</h1>
                <p class="card-subtitle">Connect with fellow pet lovers worldwide</p>
            </header>

           <form id="loginForm">
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-wrapper">
                    <input 
                        type="email" 
                        id="email"
                        name="email"  
                        class="form-input" 
                        placeholder="Enter your email address"
                        required 
                        autocomplete="email"
                        aria-describedby="email-error"
                    >
                </div>
                <div id="email-error" class="error-message" role="alert" aria-live="polite"></div>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="input-wrapper">
                    <input 
                        type="password" 
                        id="password"
                        name="password" 
                        class="form-input" 
                        placeholder="Enter your password"
                        required 
                        autocomplete="current-password"
                        aria-describedby="password-error"
                    >
                    <button 
                        type="button" 
                        class="password-toggle" 
                        onclick="togglePassword()"
                        aria-label="Toggle password visibility"
                    >👁</button>
                </div>
                <div id="password-error" class="error-message" role="alert" aria-live="polite"></div>
            </div>

          <a href="#" class="forgot-link" id="forgotPasswordLink">Forgot your password?</a>


            <button type="submit" class="btn btn--primary">
                <span>Log in to PetHeart</span>
            </button>
        </form>
       

<script>
document.getElementById('forgotPasswordLink').addEventListener('click', async function(e) {
    e.preventDefault();

    const emailInput = document.getElementById('email').value.trim();
    if (!emailInput) {
        alert('Please enter your email in the field to receive a password reset link.');
        return;
    }

    try {
        const response = await fetch('../users/forgot_password.php', {  // исправи ја патеката
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'email=' + encodeURIComponent(emailInput)
        });

        // проверка дали response е OK
        if (!response.ok) {
            throw new Error('Network response was not ok: ' + response.status);
        }

        const data = await response.json();  // чита JSON response од PHP
        console.log('Response from server:', data);

        if (data.success) {
            alert(data.message);
        } else {
            alert("Error: " + data.message);
        }

    } catch (error) {
        alert('Fetch error: ' + error.message);
        console.error('Fetch error:', error);
    }
});
</script>



            <footer class="card-footer">
                <p class="terms-text">
                    By continuing, you agree to PetHeart's 
                    <a href="#">Terms of Service</a> and acknowledge you've read our 
                    <a href="#">Privacy Policy</a>.
                </p>

                <div class="footer-links">
                    <div>
                        <strong>Not on PetHeart yet? <a href="users/register.php">Sign up</a></strong>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <script>
        // Enhanced JavaScript with better error handling and UX
        class PetHeartLogin {
            constructor() {
                this.init();
            }

            init() {
                this.setupEventListeners();
                this.setupFormValidation();
                this.setupScrollEffects();
                this.setupRippleEffects();
            }

            setupEventListeners() {
                // Password toggle
                window.togglePassword = () => this.togglePassword();
                
                // Form submission
                const form = document.querySelector('form');
                if (form) {
                    form.addEventListener('submit', (e) => this.handleFormSubmit(e));
                }

                // Input focus effects
                const inputs = document.querySelectorAll('.form-input');
                inputs.forEach(input => {
                    input.addEventListener('focus', () => this.handleInputFocus(input));
                    input.addEventListener('blur', () => this.handleInputBlur(input));
                });
            }

            togglePassword() {
                const passwordInput = document.getElementById('password');
                const toggleButton = document.querySelector('.password-toggle');
                
                if (passwordInput && toggleButton) {
                    const isPassword = passwordInput.type === 'password';
                    passwordInput.type = isPassword ? 'text' : 'password';
                    toggleButton.textContent = isPassword ? '🙈' : '👁';
                    toggleButton.setAttribute('aria-label', 
                        isPassword ? 'Hide password' : 'Show password'
                    );
                }
            }

            handleInputFocus(input) {
                const wrapper = input.closest('.input-wrapper');
                const label = input.parentElement.querySelector('.form-label');
                
                if (wrapper) {
                    wrapper.style.transform = 'translateY(-2px)';
                }
                if (label) {
                    label.style.color = 'var(--text-primary)';
                }
            }

            handleInputBlur(input) {
                const wrapper = input.closest('.input-wrapper');
                const label = input.parentElement.querySelector('.form-label');
                
                if (wrapper) {
                    wrapper.style.transform = 'translateY(0)';
                }
                if (label && !input.value) {
                    label.style.color = 'var(--text-secondary)';
                }
            }

            setupFormValidation() {
                const emailInput = document.getElementById('email');
                const passwordInput = document.getElementById('password');

                if (emailInput) {
                    emailInput.addEventListener('input', () => this.validateEmail(emailInput));
                    emailInput.addEventListener('blur', () => this.validateEmail(emailInput));
                }

                if (passwordInput) {
                    passwordInput.addEventListener('input', () => this.validatePassword(passwordInput));
                    passwordInput.addEventListener('blur', () => this.validatePassword(passwordInput));
                }
            }

            validateEmail(input) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const errorElement = document.getElementById('email-error');
                const isValid = emailRegex.test(input.value.trim());

                this.updateValidationState(input, errorElement, isValid, 
                    'Please enter a valid email address');
                
                return isValid;
            }

            validatePassword(input) {
                const errorElement = document.getElementById('password-error');
                const isValid = input.value.length >= 6;

                this.updateValidationState(input, errorElement, isValid, 
                    'Password must be at least 6 characters long');
                
                return isValid;
            }

            updateValidationState(input, errorElement, isValid, errorMessage) {
                if (isValid) {
                    input.style.borderColor = 'rgba(56, 239, 125, 0.5)';
                    input.style.boxShadow = '0 0 0 3px rgba(56, 239, 125, 0.1)';
                    if (errorElement) {
                        errorElement.textContent = '';
                        errorElement.style.display = 'none';
                    }
                } else if (input.value) {
                    input.style.borderColor = 'rgba(255, 75, 43, 0.5)';
                    input.style.boxShadow = '0 0 0 3px rgba(255, 75, 43, 0.1)';
                    if (errorElement) {
                        errorElement.textContent = errorMessage;
                        errorElement.style.display = 'block';
                        errorElement.style.color = 'rgba(255, 75, 43, 0.9)';
                        errorElement.style.fontSize = '12px';
                        errorElement.style.marginTop = '6px';
                    }
                } else {
                    input.style.borderColor = 'rgba(255, 255, 255, 0.1)';
                    input.style.boxShadow = 'none';
                    if (errorElement) {
                        errorElement.textContent = '';
                        errorElement.style.display = 'none';
                    }
                }
            }

            handleFormSubmit(e) {
                e.preventDefault();
                
                const emailInput = document.getElementById('email');
                const passwordInput = document.getElementById('password');
                const submitButton = document.querySelector('.btn--primary');
                
                const isEmailValid = this.validateEmail(emailInput);
                const isPasswordValid = this.validatePassword(passwordInput);
                
                if (isEmailValid && isPasswordValid) {
                    this.showLoading(submitButton);
                    
                    // Simulate form submission
                    setTimeout(() => {
                        this.hideLoading(submitButton);
                        // Uncomment the line below for actual form submission
                        // e.target.submit();
                    }, 2000);
                }
            }

            showLoading(button) {
                if (button) {
                    button.classList.add('btn--loading');
                    button.innerHTML = '<span>Logging in...</span>';
                }
            }

            hideLoading(button) {
                if (button) {
                    button.classList.remove('btn--loading');
                    button.innerHTML = '<span>Log in to PetHeart</span>';
                }
            }

            setupScrollEffects() {
                const navbar = document.getElementById('navbar');
                let lastScrollTop = 0;

                window.addEventListener('scroll', () => {
                    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    
                    if (scrollTop > 50) {
                        navbar.classList.add('scrolled');
                    } else {
                        navbar.classList.remove('scrolled');
                    }
                    
                    lastScrollTop = scrollTop;
                }, { passive: true });
            }

            setupRippleEffects() {
                const buttons = document.querySelectorAll('.btn, .nav-link');
                
                buttons.forEach(button => {
                    button.addEventListener('click', (e) => {
                        this.createRipple(e, button);
                    });
                });
            }

            createRipple(event, element) {
                const ripple = document.createElement('span');
                const rect = element.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = event.clientX - rect.left - size / 2;
                const y = event.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.3);
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    transform: scale(0);
                    animation: ripple-effect 0.6s ease-out;
                    pointer-events: none;
                `;
                
                element.style.position = 'relative';
                element.style.overflow = 'hidden';
                element.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            }
        }

        // Enhanced CSS animations for ripple effect
        const additionalStyles = document.createElement('style');
        additionalStyles.textContent = `
            @keyframes ripple-effect {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }

            .error-message {
                display: none;
                font-size: 12px;
                margin-top: 6px;
                font-weight: 500;
            }

            /* Enhanced loading animation */
            @keyframes loading-dots {
                0%, 20% { content: 'Logging in'; }
                40% { content: 'Logging in.'; }
                60% { content: 'Logging in..'; }
                80%, 100% { content: 'Logging in...'; }
            }

            .btn--loading span {
                animation: loading-dots 1.5s infinite;
            }

            /* Smooth transitions for validation states */
            .form-input {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            /* Enhanced focus indicators */
            .form-input:focus {
                transform: translateY(-2px) !important;
            }

            /* Better mobile touch targets */
            @media (max-width: 768px) {
                .btn, .nav-link, .password-toggle {
                    min-height: 44px;
                }
            }

            /* High contrast mode support */
            @media (prefers-contrast: high) {
                .login-card {
                    border: 2px solid rgba(255, 255, 255, 0.5);
                }
                
                .form-input {
                    border: 2px solid rgba(255, 255, 255, 0.3);
                }
                
                .btn {
                    border: 2px solid rgba(255, 255, 255, 0.3);
                }
            }

            /* Dark mode adjustments */
            @media (prefers-color-scheme: dark) {
                :root {
                    --glass-light: rgba(255, 255, 255, 0.12);
                    --glass-medium: rgba(255, 255, 255, 0.18);
                    --glass-strong: rgba(255, 255, 255, 0.3);
                }
            }

            /* Print styles */
            @media print {
                .navbar,
                .card-icon,
                .divider {
                    display: none !important;
                }
                
                .login-card {
                    box-shadow: none;
                    border: 2px solid #000;
                }
            }
        `;
        document.head.appendChild(additionalStyles);

        // Initialize the application
        document.addEventListener('DOMContentLoaded', () => {
            new PetHeartLogin();
        });

        // Performance optimization: Preload critical resources
        const preloadLink = document.createElement('link');
        preloadLink.rel = 'preload';
        preloadLink.href = 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap';
        preloadLink.as = 'style';
        document.head.appendChild(preloadLink);

        // Error boundary for JavaScript errors
        window.addEventListener('error', (event) => {
            console.error('PetHeart Login Error:', event.error);
            // Could send to analytics service
        });

        window.addEventListener('unhandledrejection', (event) => {
            console.error('PetHeart Unhandled Promise Rejection:', event.reason);
            // Could send to analytics service
        });


        document.getElementById('loginForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;

    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');

    // Reset errors
    emailError.textContent = '';
    passwordError.textContent = '';

    try {
        const response = await fetch('users/login.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email, password })
        });

        const data = await response.json();

        if (data.status === 'success') {
            // Redirect to dashboard or home
            window.location.href = '../meet/index';
        } else if (data.status === 'no_user') {
            emailError.textContent = data.message;
        } else if (data.status === 'wrong_password') {
            passwordError.textContent = data.message;
        } else {
            // Generic error
            alert(data.message);
        }
    } catch (err) {
        console.error('Login fetch error:', err);
        alert('Technical error. Please try again later.');
    }
});

    </script>
</body>
</html>

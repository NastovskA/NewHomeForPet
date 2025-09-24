<?php
// views/contact.php
require_once __DIR__ . '/partials/header.php';

// Kontakt informacii
$contactInfo = [
    'address' => '123 Pet Street, Skopje 1000',
    'email' => 'petheart111@gmail.com',
    'phone' => '+389 70 123 456',
    'hours' => 'Mon-Fri: 9AM-5PM, Sat: 10AM-2PM'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - PetHeart | The Global Community for Pet Lovers</title>
    <meta name="description" content="Reach out to PetHeart for support, inquiries, or feedback. We're here to connect with pet lovers worldwide.">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* CSS styles from the previous implementation */
        :root {
            --primary-color: #8a2be2;
            --secondary-color: #4e86fc;
            --accent-color: #ffdf7e;
            --background-dark: #1a1825;
            --background-light: #252238;
            --background-card: #2d2a42;
            --text-primary: #ffffff;
            --text-secondary: #e8e6ff;
            --text-muted: #b8b5d1;
            --text-accent: #c9c6e0;
            --glass-light: rgba(45, 42, 66, 0.85);
            --glass-medium: rgba(37, 34, 56, 0.9);
            --glass-strong: rgba(26, 24, 37, 0.95);
            --glass-border: rgba(232, 230, 255, 0.15);
            --primary-gradient: linear-gradient(135deg, var(--primary-color) 0%, #b86eff 100%);
            --secondary-gradient: linear-gradient(135deg, var(--secondary-color) 0%, #8babff 100%);
            --accent-gradient: linear-gradient(135deg, #ffdf7e 0%, #ffb347 100%);
            --shadow-soft: 0 6px 20px rgba(0, 0, 0, 0.35);
            --shadow-medium: 0 12px 36px rgba(0, 0, 0, 0.45);
            --shadow-strong: 0 18px 48px rgba(0, 0, 0, 0.55);
            --border-radius-sm: 10px;
            --border-radius-md: 14px;
            --border-radius-lg: 18px;
            --border-radius-xl: 20px;
            --transition-fast: 0.15s ease-out;
            --transition-medium: 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: 0.4s cubic-bezier(0.23, 1, 0.320, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            overflow: hidden;
        }

        html {
            scroll-behavior: smooth;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, var(--background-dark) 0%, #1f1c2e 50%, var(--background-light) 100%);
            color: var(--text-primary);
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 8px 12px;
            background: var(--glass-strong);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid var(--glass-border);
            transition: all var(--transition-medium);
        }

        .navbar.scrolled {
            padding: 6px 10px;
            background: var(--glass-strong);
            box-shadow: var(--shadow-medium);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1000px;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 20px;
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
            font-size: 24px;
            filter: drop-shadow(0 0 16px rgba(138, 43, 226, 0.6));
            animation: logoPulse 3s ease-in-out infinite;
        }

        @keyframes logoPulse {
            0%, 100% { transform: scale(1); filter: drop-shadow(0 0 16px rgba(138, 43, 226, 0.6)); }
            50% { transform: scale(1.1); filter: drop-shadow(0 0 24px rgba(184, 110, 255, 0.8)); }
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .nav-link {
            position: relative;
            padding: 8px 16px;
            color: var(--text-accent);
            text-decoration: none;
            font-weight: 500;
            font-size: 13px;
            border-radius: var(--border-radius-md);
            transition: all var(--transition-medium);
            overflow: hidden;
        }

        .nav-link--active,
        .nav-link:hover {
            color: var(--text-primary);
            background: var(--glass-medium);
            transform: translateY(-2px);
        }

        .nav-link--primary {
            background: var(--secondary-gradient);
            color: var(--text-primary);
            font-weight: 600;
            box-shadow: 0 6px 20px rgba(78, 134, 252, 0.4);
        }

        /* Main Content Layout */
        .main-content {
            flex: 1;
            padding-top: 50px;
            position: relative;
            z-index: 1;
            overflow-y: auto;
            height: calc(100vh - 50px);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Section Titles */
        .section-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 14px;
            width: 100%;
        }

        .section-title {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 20px;
            text-align: center;
            background: linear-gradient(135deg, #ffffff 0%, var(--primary-color) 30%, #b86eff 70%, #ffffff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
            display: inline-block;
            text-shadow: 0 0 30px rgba(138, 43, 226, 0.3);
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary-gradient);
            border-radius: 2px;
            box-shadow: 0 0 15px rgba(138, 43, 226, 0.5);
        }

        /* Contact Section */
        .contact-section {
            padding: 20px 0;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Equal height container */
        .contact-content {
            display: flex;
            gap: 20px;
            margin-top: 15px;
            align-items: stretch;
            max-height: 500px;
        }

        .contact-form,
        .contact-info-card {
            flex: 1;
            background: var(--glass-strong);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius-lg);
            padding: 20px;
            box-shadow: var(--shadow-strong);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: auto;
            max-height: 100%;
        }

        .contact-form::before,
        .contact-info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(138, 43, 226, 0.1) 0%, rgba(78, 134, 252, 0.05) 100%);
            border-radius: var(--border-radius-lg);
            pointer-events: none;
        }

        .contact-form h3,
        .contact-info-card h3 {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 15px;
            text-align: center;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 1;
        }

        /* Form styles */
        .form-group {
            margin-bottom: 12px;
            position: relative;
            z-index: 1;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            color: var(--text-secondary);
            margin-bottom: 5px;
            font-weight: 500;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius-md);
            background: rgba(26, 24, 37, 0.6);
            color: var(--text-primary);
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 400;
            transition: all var(--transition-medium);
            outline: none;
            box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: var(--text-muted);
            font-weight: 400;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--secondary-color);
            background: rgba(26, 24, 37, 0.8);
            box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.2), 0 0 0 3px rgba(78, 134, 252, 0.2);
            color: var(--text-primary);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
            line-height: 1.5;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: var(--primary-gradient);
            color: var(--text-primary);
            border: none;
            border-radius: var(--border-radius-md);
            font-family: inherit;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all var(--transition-medium);
            box-shadow: 0 8px 25px rgba(138, 43, 226, 0.4);
            position: relative;
            overflow: hidden;
            margin-top: auto;
            z-index: 1;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left var(--transition-slow);
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(138, 43, 226, 0.5);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        /* Contact info styles */
        .contact-info-content {
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
            z-index: 1;
        }

        .contact-info-items {
            flex: 1;
        }

        .contact-info-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 15px;
            font-size: 13px;
            color: var(--text-secondary);
            font-weight: 500;
            padding: 6px;
            border-radius: var(--border-radius-sm);
            transition: all var(--transition-medium);
        }

        .contact-info-item:hover {
            background: rgba(138, 43, 226, 0.1);
            transform: translateX(5px);
        }

        .contact-info-item:last-child {
            margin-bottom: 0;
        }

        .info-icon {
            width: 36px;
            height: 36px;
            min-width: 36px;
            border-radius: 50%;
            background: var(--secondary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            box-shadow: 0 6px 15px rgba(78, 134, 252, 0.35);
            transition: transform var(--transition-medium);
        }

        .contact-info-item:hover .info-icon {
            transform: scale(1.1);
        }

        .contact-info-item strong {
            color: var(--text-primary);
            font-weight: 600;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        }
        
        .contact-info-item a {
            color: var(--text-accent);
            text-decoration: none;
            transition: color var(--transition-fast);
            font-weight: 500;
        }

        .contact-info-item a:hover {
            color: var(--text-primary);
            text-shadow: 0 0 8px rgba(138, 43, 226, 0.4);
        }

        /* Map styles */
        .map-container {
            margin-top: 15px;
        }

        .map-placeholder {
            width: 100%;
            height: 140px;
            border: 2px solid var(--glass-border);
            border-radius: var(--border-radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-medium);
            transition: transform var(--transition-medium);
        }

        .map-placeholder:hover {
            transform: scale(1.02);
            box-shadow: var(--shadow-strong);
        }

        .map-placeholder iframe {
            width: 100%;
            height: 100%;
            border: none;
            filter: brightness(0.85) contrast(1.1) saturate(1.2);
        }

        /* Message styles */
        .message {
            padding: 10px 12px;
            margin-bottom: 15px;
            border-radius: var(--border-radius-md);
            font-weight: 500;
            text-align: center;
            box-shadow: var(--shadow-soft);
            font-size: 13px;
        }

        .message.success {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(16, 185, 129, 0.1));
            color: #86efac;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .message.error {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(220, 38, 38, 0.1));
            color: #fca5a5;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .contact-content {
                flex-direction: column;
                gap: 20px;
                max-height: none;
            }
            
            .contact-form,
            .contact-info-card {
                width: 100%;
                max-height: none;
            }
            
            .main-content {
                padding-top: 50px;
                height: auto;
                overflow-y: auto;
            }
            
            .contact-section {
                padding: 20px 0;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 10px 16px;
            }

            .nav-links {
                gap: 4px;
            }

            .nav-link {
                padding: 6px 10px;
                font-size: 12px;
            }

            .section-title {
                font-size: 24px;
            }
            
            .contact-form,
            .contact-info-card {
                padding: 15px;
            }

            .contact-form h3,
            .contact-info-card h3 {
                font-size: 16px;
            }

            .contact-info-item {
                flex-direction: row;
                align-items: center;
                gap: 8px;
                font-size: 12px;
            }

            .info-icon {
                width: 32px;
                height: 32px;
                min-width: 32px;
                font-size: 14px;
            }
            
            .map-placeholder {
                height: 120px;
            }
            
            .form-group {
                margin-bottom: 10px;
            }
            
            .form-group input,
            .form-group textarea {
                padding: 8px 10px;
                font-size: 12px;
            }
            
            .submit-btn {
                padding: 10px;
                font-size: 13px;
            }
        }

        @media (max-width: 480px) {
            .section-title {
                font-size: 22px;
                margin-bottom: 15px;
            }

            .contact-section {
                padding: 15px 0;
            }

            .section-container {
                padding: 0 10px;
            }

            .contact-form,
            .contact-info-card {
                padding: 12px;
            }
            
            .contact-content {
                gap: 15px;
            }

            .map-placeholder {
                height: 100px;
            }
            
            .main-content {
                padding-top: 50px;
            }
            
            .contact-info-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
                text-align: center;
            }
            
            .contact-info-item div {
                text-align: center;
                width: 100%;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--background-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #b86eff, #8a2be2);
        }
    </style>
</head>
<body>
    
    <main class="main-content">
        <!-- Contact Section -->
        <section class="contact-section">
            <div class="section-container">
                <h2 class="section-title">Get in Touch</h2>
                
                <?php if (!empty($message)): ?>
                <div class="message <?php echo $messageType; ?>">
                    <?php echo $message; ?>
                </div>
                <?php endif; ?>
                
                <div class="contact-content">
                    <div class="contact-form">
                        <h3>Send us a Message</h3>
                        <form action="<?= BASE_URL ?>/contact/send" method="POST">
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" id="name" name="name" placeholder="Enter your name" required 
                                       value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email</label>
                                <input type="email" id="email" name="email" placeholder="Enter your email" required
                                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" id="subject" name="subject" placeholder="What's this about?"
                                       value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" name="message" placeholder="Type your message here..." required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                            </div>
                            <button type="submit" class="submit-btn">
                                Send Message <span style="font-size: 1.1em;">📩</span>
                            </button>
                        </form>
                    </div>

                    <div class="contact-info-card">
                        <h3>Contact Information</h3>
                        <div class="contact-info-content">
                            <div class="contact-info-items">
                                <div class="contact-info-item">
                                    <div class="info-icon">📍</div>
                                    <div>
                                        <strong>Our Office</strong><br>
                                        <?php echo htmlspecialchars($contactInfo['address']); ?>
                                    </div>
                                </div>
                                <div class="contact-info-item">
                                    <div class="info-icon">📧</div>
                                    <div>
                                        <strong>Email Us</strong><br>
                                        <a href="mailto:<?php echo htmlspecialchars($contactInfo['email']); ?>">
                                            <?php echo htmlspecialchars($contactInfo['email']); ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="contact-info-item">
                                    <div class="info-icon">📞</div>
                                    <div>
                                        <strong>Call Us</strong><br>
                                        <a href="tel:<?php echo htmlspecialchars($contactInfo['phone']); ?>">
                                            <?php echo htmlspecialchars($contactInfo['phone']); ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="contact-info-item">
                                    <div class="info-icon">🕒</div>
                                    <div>
                                        <strong>Operating Hours</strong><br>
                                        <?php echo htmlspecialchars($contactInfo['hours']); ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="map-container">
                                <div class="map-placeholder">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1482.3988534589264!2d21.386834988814343!3d42.00461684280707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13541473d721d009%3A0xe362d9777614ada5!2sLjubljanska%2C%20Skopje%201000!5e0!3m2!1sen!2smk!4v1756676803268!5m2!1sen!2smk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 40) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        function adjustHeight() {
            const navbar = document.getElementById('navbar');
            const mainContent = document.querySelector('.main-content');
            const windowHeight = window.innerHeight;
            const navbarHeight = navbar.offsetHeight;
            
            mainContent.style.maxHeight = (windowHeight - navbarHeight) + 'px';
        }
        
        window.addEventListener('load', adjustHeight);
        window.addEventListener('resize', adjustHeight);
    </script>
</body>
</html>
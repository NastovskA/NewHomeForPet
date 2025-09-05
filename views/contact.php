<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - PetHeart | The Global Community for Pet Lovers</title>
    <meta name="description" content="Reach out to PetHeart for support, inquiries, or feedback. We're here to connect with pet lovers worldwide.">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            /* Brighter Color Palette */
            --primary-color: #8a2be2; /* Bright Purple */
            --secondary-color: #4e86fc; /* Vibrant Blue */
            --accent-color: #ffdf7e;   /* Bright Yellow */
            
            --background-dark: #2a2845;
            --background-light: #36335a;
            
            --text-primary: #ffffff;
            --text-secondary: rgba(255, 255, 255, 0.9);
            --text-muted: rgba(255, 255, 255, 0.7);
            
            /* Glassmorphism Variables */
            --glass-light: rgba(255, 255, 255, 0.15);
            --glass-medium: rgba(255, 255, 255, 0.2);
            --glass-strong: rgba(255, 255, 255, 0.3);
            --glass-border: rgba(255, 255, 255, 0.25);
            
            /* Gradients */
            --primary-gradient: linear-gradient(135deg, var(--primary-color) 0%, #b86eff 100%);
            --secondary-gradient: linear-gradient(135deg, var(--secondary-color) 0%, #8babff 100%);
            --accent-gradient: linear-gradient(135deg, #ffdf7e 0%, #ffb347 100%);
            
            /* Shadows and Transitions */
            --shadow-soft: 0 6px 20px rgba(0, 0, 0, 0.15);
            --shadow-medium: 0 12px 36px rgba(0, 0, 0, 0.2);
            --shadow-strong: 0 18px 48px rgba(0, 0, 0, 0.3);
            
            --border-radius-sm: 10px;
            --border-radius-md: 14px;
            --border-radius-lg: 18px;
            --border-radius-xl: 20px;
            
            --transition-fast: 0.15s ease-out;
            --transition-medium: 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: 0.4s cubic-bezier(0.23, 1, 0.320, 1);
            
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
            background-color: var(--background-dark);
            color: var(--text-primary);
            display: flex;
            flex-direction: column;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: var(--z-header);
            padding: 12px 24px;
            background: var(--glass-light);
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            border-bottom: 0px solid var(--glass-border);
            transition: all var(--transition-medium);
        }

        .navbar.scrolled {
            padding: 10px 24px;
            background: var(--glass-medium);
            box-shadow: var(--shadow-soft);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
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
            color: var(--text-secondary);
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
            background: var(--glass-light);
            transform: translateY(-2px);
        }

        .nav-link--primary {
            background: var(--secondary-gradient);
            color: var(--text-primary);
            font-weight: 600;
            box-shadow: 0 6px 20px rgba(78, 134, 252, 0.3);
        }

        .nav-link--secondary {
            background: var(--glass-medium);
            border: 1px solid var(--glass-border);
        }

        /* Main Content Layout */
        .main-content {
            flex: 1;
            padding-top: 50px;
            position: relative;
            z-index: var(--z-content);
            overflow-y: auto;
        }

        /* Section Titles */
        .section-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 14px;
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 24px;
            text-align: center;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary-gradient);
            border-radius: 2px;
        }

        /* Contact Section */
        .contact-section {
            padding: 40px 0 20px;
        }

        /* Equal height container */
        .contact-content {
            display: flex;
            gap: 20px;
            margin-top: 15px;
            align-items: stretch;
        }

        .contact-form,
        .contact-info-card {
            flex: 1;
            background: var(--glass-medium);
            backdrop-filter: blur(16px);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius-lg);
            padding: 20px;
            box-shadow: var(--shadow-medium);
            display: flex;
            flex-direction: column;
        }

        .contact-form h3,
        .contact-info-card h3 {
            font-size: 18px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 15px;
            text-align: center;
        }

        /* Form styles */
        .form-group {
            margin-bottom: 12px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            color: var(--text-secondary);
            margin-bottom: 5px;
            font-weight: 400;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius-md);
            background: rgba(255, 255, 255, 0.1);
            color: var(--text-primary);
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            transition: border-color var(--transition-fast), background var(--transition-fast);
            outline: none;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: var(--text-muted);
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--secondary-color);
            background: rgba(255, 255, 255, 0.15);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }

        .submit-btn {
            width: 100%;
            padding: 10px;
            background: var(--primary-gradient);
            color: var(--text-primary);
            border: none;
            border-radius: var(--border-radius-md);
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all var(--transition-medium);
            box-shadow: 0 6px 20px rgba(138, 43, 226, 0.3);
            position: relative;
            overflow: hidden;
            margin-top: auto;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left var(--transition-slow);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(138, 43, 226, 0.4);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        /* Contact info styles */
        .contact-info-content {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .contact-info-items {
            flex: 1;
        }

        .contact-info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            font-size: 14px;
            color: var(--text-secondary);
            font-weight: 500;
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
            box-shadow: 0 4px 12px rgba(78, 134, 252, 0.25);
        }
        
        .contact-info-item a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: color var(--transition-fast);
        }

        .contact-info-item a:hover {
            color: var(--text-primary);
        }

        /* Map styles */
        .map-container {
            margin-top: 20px;
        }

        .map-placeholder {
            width: 100%;
            height: 150px;
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-soft);
        }

        .map-placeholder iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .contact-content {
                flex-direction: column;
                gap: 20px;
            }
            
            .contact-form,
            .contact-info-card {
                width: 100%;
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
                font-size: 28px;
            }
            
            .contact-form,
            .contact-info-card {
                padding: 18px;
            }

            .contact-form h3,
            .contact-info-card h3 {
                font-size: 17px;
            }

            .contact-info-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }

            .info-icon {
                width: 32px;
                height: 32px;
                min-width: 32px;
                font-size: 14px;
            }
            
            .map-placeholder {
                height: 130px;
            }
        }

        @media (max-width: 480px) {
            .section-title {
                font-size: 24px;
            }

            .contact-section {
                padding: 30px 0 15px;
            }

            .section-container {
                padding: 0 12px;
            }

            .contact-form,
            .contact-info-card {
                padding: 15px;
            }

            .map-placeholder {
                height: 120px;
            }
            
            .main-content {
                padding-top: 60px;
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
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="../landing.php" class="logo">
                <span class="logo-icon">🐾</span>
                <span>PetHeart</span>
            </a>
            <div class="nav-links">
                <a href="aboutUs.php" class="nav-link">About us</a>
                <a href="#" class="nav-link nav-link--active">Contact</a>
                <a href="landing.php" class="nav-link nav-link--primary">Log in</a>
                <a href="users/register.php" class="nav-link nav-link--secondary">Sign up</a>
            </div>
        </div>
    </nav>

    <main class="main-content">
        <!-- Contact Section -->
        <section class="contact-section">
            <div class="section-container">
                <h2 class="section-title">Get in Touch</h2>
                <div class="contact-content">
                    <div class="contact-form">
                        <h3>Send us a Message</h3>
                        <form action="sendmailFromContact.php" method="POST">
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email</label>
                                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" id="subject" name="subject" placeholder="What's this about?">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" name="message" placeholder="Type your message here..." required></textarea>
                            </div>
                            <button type="submit" class="submit-btn">
                                Send Message
                                <span style="font-size: 1.1em;">📩</span>
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
                                        Bulevar Partizanski Odredi 78, Ljubljanska, Skopje 1000
                                    </div>
                                </div>
                                <div class="contact-info-item">
                                    <div class="info-icon">📧</div>
                                    <div>
                                        <strong>Email Us</strong><br>
                                        <a href="mailto:petheart111@gmail.com">petheart111@gmail.com</a>
                                    </div>
                                </div>
                                <div class="contact-info-item">
                                    <div class="info-icon">📞</div>
                                    <div>
                                        <strong>Call Us</strong><br>
                                        <a href="tel:+389-75-654-741">+389-75-654-741</a>
                                    </div>
                                </div>
                                <div class="contact-info-item">
                                    <div class="info-icon">🕒</div>
                                    <div>
                                        <strong>Operating Hours</strong><br>
                                        Monday - Friday: 9 AM - 5 PM (PST)
                                    </div>
                                </div>
                            </div>
                            
                            <div class="map-container">
                                <div class="map-placeholder">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1482.3988534589264!2d21.386834988814343!3d42.00461684280707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13541473d721d009%3A0xe362d9777614ada5!2sLjubljanska%2C%20Skopje%201000!5e0!3m2!1sen!2smk!4v1756676803268!5m2!1sen!2smk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                                </div>
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
        
        // Adjust content height to prevent scrolling
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
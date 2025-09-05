<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - PetHeart | The Global Community for Pet Lovers</title>
    <meta name="description" content="Discover PetHeart's mission to connect pet lovers worldwide through a supportive community, expert resources, and shared stories of unconditional love.">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
:root {
    /* Primary Palette – Soft, Elegant */
    --primary-color: #3d0092ff;       /* Softer Lavender (slightly richer than before) */
    --secondary-color: #eae2edff;       /* Soft Blue, calmer and complementary */
    --accent-secondary: #030c09ff;      /* Soft Mint for contrast elements */

    /* Backgrounds – Smooth Gradient Flow */
    --background-dark: #ad99ddff;     /* Deep lavender for cards and sections */
    --background-light: #7b66b4ff;    /* Slightly lighter lilac for hover/buttons */
    --background-lighter: #9b93ccff;  /* Neutral grayish-purple for page base */

    /* Text Colors */
    --text-primary: rgba(23, 1, 37, 0.65);          /* Main text */
    --text-secondary: rgba(252, 253, 255, 0.85);
    --text-muted: rgba(20, 1, 33, 0.65); /* Slightly stronger contrast */

    /* Glassmorphism Variables */
    --glass-light: rgba(255, 255, 255, 0.08);
    --glass-medium: rgba(255, 255, 255, 0.14);
    --glass-strong: rgba(255, 255, 255, 0.22);
    --glass-border: rgba(255, 255, 255, 0.18);

    /* Gradients */
    --primary-gradient: linear-gradient(135deg, var(--primary-color) 0%, #56545aff 100%);
    --secondary-gradient: linear-gradient(135deg, var(--secondary-color) 0%, #f1f1f1ff 100%);
    --accent-gradient: linear-gradient(135deg, var(--accent-color) 0%, #f7f3f0ff 100%);

    /* Shadows and Transitions */
    --shadow-soft: 0 8px 24px rgba(0, 0, 0, 0.12);
    --shadow-medium: 0 12px 36px rgba(0, 0, 0, 0.15);
    --shadow-strong: 0 20px 48px rgba(0, 0, 0, 0.22);

    /* Border Radius */
    --border-radius-sm: 12px;
    --border-radius-md: 16px;
    --border-radius-lg: 20px;
    --border-radius-xl: 24px;
    --border-radius-pill: 100px;

    /* Transitions */
    --transition-fast: 0.2s ease-out;
    --transition-medium: 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-slow: 0.5s cubic-bezier(0.23, 1, 0.32, 1);

    /* Z-Index */
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
            background-color: var(--background-dark);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
            color: var(--text-primary);
            line-height: 1.6;
        }

        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            line-height: 1.3;
        }

        /* Background Elements */
        .background-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: var(--z-background);
            overflow: hidden;
        }

        .bg-circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.15;
            filter: blur(40px);
        }

        .bg-circle-1 {
            width: 500px;
            height: 500px;
            background: var(--primary-color);
            top: -100px;
            left: -100px;
        }

        .bg-circle-2 {
            width: 600px;
            height: 600px;
            background: var(--secondary-color);
            bottom: -200px;
            right: -200px;
        }

        .bg-circle-3 {
            width: 400px;
            height: 400px;
            background: var(--accent-color);
            top: 50%;
            left: 70%;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: var(--z-header);
            padding: 18px 40px;
            background: var(--glass-light);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid var(--glass-border);
            transition: all var(--transition-medium);
        }

        .navbar.scrolled {
            padding: 14px 40px;
            background: rgba(42, 36, 56, 0.92);
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
            font-size: 26px;
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
            font-size: 30px;
            filter: drop-shadow(0 0 20px rgba(70, 2, 153, 0.5));
            animation: logoPulse 3s ease-in-out infinite;
        }

        @keyframes logoPulse {
            0%, 100% { transform: scale(1); filter: drop-shadow(0 0 20px rgba(138, 102, 181, 0.5)); }
            50% { transform: scale(1.1); filter: drop-shadow(0 0 30px rgba(180, 145, 209, 0.7)); }
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link {
            position: relative;
            padding: 12px 24px;
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            border-radius: var(--border-radius-pill);
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
            box-shadow: 0 8px 25px rgba(107, 152, 214, 0.25);
        }

        .nav-link--secondary {
            background: var(--glass-medium);
            border: 1px solid var(--glass-border);
        }

        /* Main Content Layout */
        .main-content {
            padding-top: 100px;
            position: relative;
            z-index: var(--z-content);
        }

        /* Hero Section */
        .hero-section {
            padding: 140px 40px 180px;
            text-align: center;
            position: relative;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 68px;
            font-weight: 800;
            margin-bottom: 28px;
            background: linear-gradient(135deg, var(--text-primary), #d46ca9ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: titleSlideUp 1s ease-out;
            line-height: 1.2;
            letter-spacing: -0.5px;
        }

        .hero-subtitle {
            font-size: 26px;
            color: var(--text-secondary);
            margin-bottom: 48px;
            animation: subtitleSlideUp 1s ease-out 0.2s both;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
            font-weight: 400;
        }

        .hero-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 36px;
            margin-top: 80px;
            animation: statsSlideUp 1s ease-out 0.4s both;
        }

        .stat-item {
            background: var(--glass-light);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius-xl);
            padding: 36px 28px;
            text-align: center;
            transition: all var(--transition-medium);
            position: relative;
            overflow: hidden;
        }

        .stat-item:hover {
            transform: translateY(-8px) scale(1.02);
            background: var(--glass-medium);
            box-shadow: var(--shadow-strong);
        }

        .stat-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
            border-radius: var(--border-radius-xl) var(--border-radius-xl) 0 0;
        }

        .stat-number {
            font-size: 46px;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 12px;
            display: block;
        }

        .stat-label {
            font-size: 17px;
            color: var(--text-secondary);
            font-weight: 500;
        }

        .member-avatar img {
            width: 120px;
            height: 120px;
            border-radius: 80%; /* за круг */
            object-fit: cover;   /* да се вклопи убаво во кругот */
        }


        @keyframes titleSlideUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes subtitleSlideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes statsSlideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

     

/* Title */
.section-title {
    font-size: 42px;
    font-weight: 700;
    margin-bottom: 48px;
    text-align: center;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    position: relative;
    display: inline-block;
    left: 5%;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -12px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: var(--primary-gradient);
    border-radius: 3px;
}

/* Content grid */
.story-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
}

/* Text side */
.story-text h3 {
    font-size: 28px;
    font-weight: 600;
    margin: 24px 0 16px;
    color: var(--text-primary);
}

.story-text p {
    font-size: 17px;
    color: var(--text-secondary);
    line-height: 1.7;
    margin-bottom: 24px;
}

/* Visual side */
.story-visual {
    position: relative;
    height: 460px;
    border-radius: var(--border-radius-xl);
    overflow: hidden;
    background: var(--primary-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 120px;
    animation: floatAnimation 6s ease-in-out infinite;
    box-shadow: var(--shadow-strong);
}

/* Floating animation */
@keyframes floatAnimation {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(3deg); }
}

/* Responsive */
@media (max-width: 900px) {
    .story-content {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    .story-visual {
        height: 320px;
        font-size: 90px;
    }
    .section-title {
        font-size: 32px;
    }
}


        /* Timeline */
        .timeline {
            position: relative;
            max-width: 900px;
            margin: 80px auto 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 3px;
            background: var(--glass-border);
            transform: translateX(-50%);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 80px;
            width: 100%;
        }

        .timeline-item:nth-child(odd) {
            padding-right: calc(50% + 40px);
            text-align: right;
        }

        .timeline-item:nth-child(even) {
            padding-left: calc(50% + 40px);
            text-align: left;
        }

        .timeline-dot {
            position: absolute;
            top: 0;
            left: 50%;
            width: 24px;
            height: 24px;
            background: var(--secondary-color);
            border-radius: 50%;
            transform: translateX(-50%);
            box-shadow: 0 0 0 6px rgba(107, 152, 214, 0.2);
            z-index: 2;
        }

        .timeline-content {
            background: var(--glass-medium);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius-xl);
            padding: 36px;
            transition: all var(--transition-medium);
            position: relative;
        }

        .timeline-item:hover .timeline-content {
            transform: translateY(-8px);
            box-shadow: var(--shadow-medium);
        }

        .timeline-year {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 12px;
            display: inline-block;
            padding: 6px 16px;
            background: var(--glass-light);
            border-radius: var(--border-radius-pill);
        }

        .timeline-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 16px;
        }

        .timeline-description {
            font-size: 17px;
            color: var(--text-secondary);
            line-height: 1.6;
        }

        /* Mission Section */
        .mission-section {
            padding: 140px 40px;
            position: relative;
        }

        .mission-content {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
        }

        .mission-text {
            font-size: 22px;
            color: var(--text-secondary);
            line-height: 1.8;
            margin-bottom: 80px;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        .mission-values {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 40px;
            margin-top: 80px;
        }

        .value-item {
            background: var(--glass-light);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius-xl);
            padding: 48px 36px;
            text-align: center;
            transition: all var(--transition-medium);
            position: relative;
            overflow: hidden;
        }

        .value-item:hover {
            transform: translateY(-12px);
            background: var(--glass-medium);
            box-shadow: var(--shadow-strong);
        }

        .value-item:nth-child(1) .value-icon { background:var(--accent-gradient); color: #d7d1e0ff;}
        .value-item:nth-child(2) .value-icon { background: var(--accent-gradient); color: #e5e1eaff; }
        .value-item:nth-child(3) .value-icon { background: var(--accent-gradient); color: #5a4d6d; }

        .value-icon {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin: 0 auto 32px;
            transition: all var(--transition-medium);
        }

        .value-item:hover .value-icon {
            transform: scale(1.1) rotateY(180deg);
        }

        .value-title {
            font-size: 26px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 20px;
        }

        .value-description {
            font-size: 17px;
            color: var(--text-secondary);
            line-height: 1.6;
        }

        /* Team Section */
        .team-section {
            padding: 140px 40px;
            background: var(--background-light);
            backdrop-filter: blur(30px);
            position: relative;
        }

        .team-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: var(--glass-border);
        }

        .team-subtitle {
            font-size: 22px;
            color: var(--text-secondary);
            margin-bottom: 80px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
            text-align: center;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 48px;
            margin-top: 80px;
        }

        .team-member {
            background: var(--glass-medium);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius-xl);
            padding: 48px 36px;
            text-align: center;
            transition: all var(--transition-medium);
            position: relative;
            overflow: hidden;
        }

        .team-member:hover {
            transform: translateY(-12px);
            box-shadow: var(--shadow-strong);
        }

        .member-avatar {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            margin: 0 auto 32px;
            border: 4px solid var(--glass-border);
            transition: all var(--transition-medium);
        }

        .team-member:hover .member-avatar {
            transform: scale(1.1);
            box-shadow: 0 16px 40px rgba(138, 102, 181, 0.3);
        }

        .member-name {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 12px;
        }

        .member-role {
            font-size: 17px;
            color: var(--text-muted);
            margin-bottom: 20px;
            font-weight: 500;
        }

        .member-description {
            font-size: 16px;
            color: var(--text-secondary);
            line-height: 1.6;
        }

        /* CTA Section */
        .cta-section {
            padding: 140px 40px;
            text-align: center;
            position: relative;
        }

        .cta-content {
            max-width: 900px;
            margin: 0 auto;
        }

        .cta-title {
            font-size: 52px;
            font-weight: 800;
            margin-bottom: 32px;
            background: linear-gradient(135deg, var(--text-primary), var(--primary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        .cta-text {
            font-size: 22px;
            color: var(--text-secondary);
            margin-bottom: 48px;
            line-height: 1.6;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-buttons {
            display: flex;
            gap: 24px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 18px 40px;
            border: none;
            border-radius: var(--border-radius-pill);
            font-family: inherit;
            font-size: 17px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            cursor: pointer;
            transition: all var(--transition-medium);
            position: relative;
            overflow: hidden;
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
            background: var(--primary-gradient);
            color: var(--text-primary);
            box-shadow: 0 12px 30px rgba(138, 102, 181, 0.3);
        }

        .btn--primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(138, 102, 181, 0.4);
        }

        .btn--secondary {
            background: var(--glass-medium);
            color: var(--text-primary);
            border: 1px solid var(--glass-border);
        }

        .btn--secondary:hover {
            background: var(--glass-strong);
            transform: translateY(-5px);
        }

        /* Footer */
        .footer {
           
            background: var(--background-light);
            border-top: 0px solid var(--glass-border);
            position: relative;
            margin-bottom: 3px;
           
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 60px;
            margin-bottom: 5px;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 24px;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 30px;
           
        }

        .footer-description {
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 36px;
            
        }

        .footer-heading {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 12px;
        }

        .footer-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--primary-gradient);
            border-radius: 2px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-link {
            margin-bottom: 20px;
        }

        .footer-link a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: all var(--transition-fast);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .footer-link a:hover {
            color: var(--text-primary);
            transform: translateX(5px);
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 60px auto 0 ;
            padding-top: 32px;
            border-top: 1px solid var(--glass-border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .copyright {
            color: var(--text-muted);
            font-size: 15px;
        }

        .social-links {
            display: flex;
            gap: 20px;
        }

        .social-link {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--glass-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-primary);
            text-decoration: none;
            transition: all var(--transition-medium);
            border: 1px solid var(--glass-border);
        }

        .social-link:hover {
            background: var(--primary-gradient);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(138, 102, 181, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero-title {
                font-size: 60px;
            }
            
            .section-title {
                font-size: 42px;
            }
        }

        @media (max-width: 1024px) {
            .story-content {
                grid-template-columns: 1fr;
                gap: 60px;
                text-align: center;
            }
            
            .story-visual {
                height: 400px;
                order: -1;
            }

            .timeline::before {
                left: 30px;
            }

            .timeline-item:nth-child(odd),
            .timeline-item:nth-child(even) {
                padding-left: 80px;
                padding-right: 0;
                text-align: left;
            }

            .timeline-dot {
                left: 30px;
            }
            
            .footer-content {
                gap: 40px;
            }
        }

        @media (max-width: 900px) {
            .navbar {
                padding: 16px 30px;
            }
            
            .nav-link {
                padding: 10px 20px;
                font-size: 14px;
            }
            
            .hero-section {
                padding: 120px 30px 140px;
            }
            
            .story-section,
            .mission-section,
            .team-section,
            .cta-section {
                padding: 100px 30px;
            }
            
            .hero-title {
                font-size: 52px;
            }
            
            .hero-subtitle {
                font-size: 22px;
            }
            
            .section-title {
                font-size: 38px;
            }
            
            .mission-values {
                grid-template-columns: 1fr;
            }
            
            .team-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            
            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 14px 24px;
            }

            .nav-links {
                gap: 6px;
            }

            .nav-link {
                padding: 8px 16px;
                font-size: 13px;
            }

            .hero-title {
                font-size: 46px;
            }

            .hero-subtitle {
                font-size: 20px;
            }

            .hero-stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 24px;
            }

            .section-title,
            .mission-title,
            .team-title,
            .cta-title {
                font-size: 36px;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 300px;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .footer-heading::after {
                left: 50%;
                transform: translateX(-50%);
            }
        }

        @media (max-width: 576px) {
            .navbar {
                padding: 12px 20px;
            }
            
            .logo span:last-child {
                display: none;
            }
            
            .hero-section {
                padding: 100px 20px 120px;
            }

            .story-section,
            .mission-section,
            .team-section,
            .cta-section {
                padding: 80px 20px;
            }
            
            .footer {
                padding: 60px 20px 30px;
            }

            .hero-stats {
                grid-template-columns: 1fr;
            }

            .hero-title {
                font-size: 40px;
            }
            
            .cta-title {
                font-size: 36px;
            }

            .section-title,
            .mission-title,
            .team-title {
                font-size: 32px;
            }

            .story-visual {
                height: 300px;
                font-size: 100px;
            }
            
            .stat-item {
                padding: 30px 20px;
            }
            
            .value-item,
            .team-member {
                padding: 36px 24px;
            }
            
            .timeline-content {
                padding: 24px;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--background-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #b491d1, #8a66b5);
        }
    </style>
</head>
<body>
    <div class="background-elements">
        <div class="bg-circle bg-circle-1"></div>
        <div class="bg-circle bg-circle-2"></div>
        <div class="bg-circle bg-circle-3"></div>
    </div>

    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="../index.php" class="logo">
                <span class="logo-icon">🐾</span>
                <span>PetHeart</span>
            </a>
            <div class="nav-links">
            <a href="../index.php" class="nav-link">Home</a>
            <a href="#" class="nav-link nav-link--active">About us</a>
            <a href="contact.php" class="nav-link">Contact</a>
            <a href="landing.php" class="nav-link nav-link--primary">Log in</a>
            <a href="users/register.php" class="nav-link nav-link--secondary">Sign up</a>
            </div>
        </div>
    </nav>

    <main class="main-content">
        <section class="hero-section">
            <div class="hero-content">
                <h1 class="hero-title">Our Passion for Pets Connects the World</h1>
                <h1 class="hero-subtitle">🐾 PetHeart – Every Pet Deserves a Home 🐾</h1>
                <p class="hero-subtitle">

Join the world’s caring community where love meets adoption. At PetHeart, we connect pets in need with families ready to give them a forever home. Because adoption is not just about saving lives – it’s about creating unbreakable bonds.
                </p>
            </div>
        </section>

        <section class="story-section">
            <div class="section-container">
                <h2 class="section-title">  Our Journey</h2>
               
                
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">2022</div>
                            <h3 class="timeline-title">Concept Development</h3>
                            <p class="timeline-description">
                                Our founders identified the need for a dedicated pet lover community 
                                while working on veterinary telehealth solutions.
                            </p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">2023</div>
                            <h3 class="timeline-title">Beta Launch</h3>
                            <p class="timeline-description">
                                Initial platform launched with 1,000 early adopters providing 
                                valuable feedback to shape our direction.
                            </p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">2024</div>
                            <h3 class="timeline-title">Official Launch</h3>
                            <p class="timeline-description">
                                Full platform release with mobile apps, expert Q&A system, 
                                and localized communities in 5 languages.
                            </p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">2025</div>
                            <h3 class="timeline-title">Global Expansion</h3>
                            <p class="timeline-description">
                                Surpassed 50,000 members and expanded our operations to serve 
                                communities in over 30 countries.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mission-section">
            <div class="section-container">
                <h2 class="section-title">Our Mission</h2>
                <p class="mission-text">
                    Our mission is to foster a world where every pet is cherished and every pet lover feels connected. We achieve this by creating a safe, informative, and engaging platform that promotes responsible pet ownership and celebrates the joy our animal companions bring to our lives.
                </p>
                <div class="mission-values">
                    <div class="value-item">
                        <div class="value-icon">🫂</div>
                        <h3 class="value-title">Community First</h3>
                        <p class="value-description">
                            We believe a strong community is built on empathy, respect, and shared experiences. We empower our members to support one another through every stage of their pet's life.
                        </p>
                    </div>
                    <div class="value-item">
                        <div class="value-icon">📖</div>
                        <h3 class="value-title">Knowledge is Key</h3>
                        <p class="value-description">
                            We provide access to expert-vetted resources and tools, ensuring our members have the information they need to provide the best care for their pets.
                        </p>
                    </div>
                    <div class="value-item">
                        <div class="value-icon">❤️</div>
                        <h3 class="value-title">Unconditional Love</h3>
                        <p class="value-description">
                            Our platform is a celebration of the unique and unbreakable bond between humans and their pets. We champion diversity in pet ownership and the many forms love takes.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="team-section">
            <div class="section-container">
                <h2 class="section-title">Meet Our Founders</h2>
                <p class="team-subtitle">
                    Our leadership team is a blend of veterinary science, technology, and a lifelong passion for animal welfare. We're united by the goal of making PetHeart a force for good in the global pet community.
                </p>
                <div class="team-grid">
                    <div class="team-member">
                        <div class="member-avatar">
                        <img src="monika.png" alt="Team Member" />
                        </div>
                        <h3 class="member-name">Dr. Monika Stoilkovska</h3>
                        <div class="member-role">Co-Founder & Chief Veterinary Officer</div>
                        <p class="member-description">
                            Dr. Monika Stoilkovska has over 15 years of experience in small animal medicine. She leads our veterinary team, ensuring that all content, advice, and resources are scientifically accurate and safe for pets.
                        </p>

                    </div>
                    <div class="team-member">
                        <div class="member-avatar">
                        <img src="jhon.png" alt="Team Member" />
                        </div>
                        <h3 class="member-name">Leo Chen</h3>
                        <div class="member-role">Chief Technology Officer</div>
                        <p class="member-description">
                            Leo is the architect behind PetHeart's innovative platform. He's a full-stack developer with a passion for creating user-friendly and scalable social networks.
                        </p>
                    </div>
                    <div class="team-member">
                        <div class="member-avatar">
                        <img src="slika_angela.png" alt="Team Member" />
                        </div>
                        <h3 class="member-name">Angela Nastovska</h3>
                        <div class="member-role">Co-Founder & Community Lead</div>
                        <p class="member-description">
                            Angela has a strong background in digital marketing and community engagement. She is the driving force behind PetHeart, building meaningful connections and ensuring every member feels supported and valued.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <div class="cta-content">
                <h2 class="cta-title">Ready to Join Our Pack?</h2>
                <p class="cta-text">
                    Whether you're a new pet parent or a seasoned animal enthusiast, there's a place for you at PetHeart. Sign up today and start sharing your pet's journey with a community that truly gets it.
                </p>
                <div class="cta-buttons">
                    <a href="users/register.php" class="btn btn--secondary">
                        Join the Community
                        <span style="font-size: 1.5em;">➔</span>
                    </a>
                    <a href="../index.php" class="btn btn--secondary">
                        Explore Stories
                    </a>
                </div>
            </div>
        </section>
    </main>
    
    <footer class="footer">
        
        <div class="footer-bottom">
            <p class="copyright">© 2025 PetHeart. All rights reserved.</p>
            <div class="social-links">
                <a href="https://www.facebook.com/" class="social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="https://x.com/" class="social-link"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="lhttps://www.linkedin.com/" class="social-link"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>
    
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
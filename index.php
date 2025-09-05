<!-- HOME.PHP BESE PRETHODNO -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PET HEART - Find Your Perfect Companion</title>
    
    <!-- Enhanced Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700;800;900&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            /* Professional Color Palette */
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --warm-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --cool-gradient: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            --emerald-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --ocean-gradient: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
            --sunset-gradient: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            --lavender-gradient: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
            --rose-gradient: linear-gradient(135deg, #fb7185 0%, #e11d48 100%);
            
            /* Professional Neutrals */
            --bg-primary: #fafbff;
            --bg-secondary: #f8faff;
            --bg-tertiary: #f1f5ff;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --text-muted: #94a3b8;
            --border-light: #e2e8f0;
            
            /* Glass Effect */
            --glass-bg: rgba(255, 255, 255, 0.15);
            --glass-border: rgba(255, 255, 255, 0.2);
            --glass-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            
            /* Animations */
            --bounce-timing: cubic-bezier(0.68, -0.55, 0.265, 1.55);
            --smooth-timing: cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: 
                radial-gradient(circle at 25% 25%, rgba(120, 119, 198, 0.4) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 50% 10%, rgba(16, 185, 129, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 10% 80%, rgba(245, 158, 11, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 90% 40%, rgba(139, 92, 246, 0.2) 0%, transparent 50%),
                linear-gradient(135deg, #fafbff 0%, #f1f5ff 100%);
            background-attachment: fixed;
            color: var(--text-primary);
            line-height: 1.6;
            overflow-x: hidden;
            position: relative;
            min-height: 100vh;
        }

        /* Floating Bubbles Background */
        .bubbles-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
            overflow: hidden;
        }

        .bubble {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            animation: bubbleFloat var(--duration) infinite ease-in-out;
            backdrop-filter: blur(2px);
        }

        .bubble:nth-child(odd) {
            background: linear-gradient(45deg, #667eea, #764ba2);
        }

        .bubble:nth-child(even) {
            background: linear-gradient(45deg, #f093fb, #f5576c);
        }

        .bubble:nth-child(3n) {
            background: linear-gradient(45deg, #10b981, #059669);
        }

        .bubble:nth-child(4n) {
            background: linear-gradient(45deg, #f97316, #ea580c);
        }

        .bubble:nth-child(5n) {
            background: linear-gradient(45deg, #8b5cf6, #7c3aed);
        }

        /* Enhanced Header */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: var(--glass-bg);
            backdrop-filter: blur(25px);
            border-bottom: 1px solid var(--glass-border);
            transition: all 0.4s var(--smooth-timing);
        }

        header.scrolled {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(30px);
            box-shadow: var(--glass-shadow);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem 2rem;
        }

        .logo {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: transform 0.3s var(--bounce-timing);
            text-decoration: none;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .logo::before {
            content: "💝";
            font-size: 1.5rem;
            animation: pulse 2s infinite;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2.5rem;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-primary);
            font-weight: 500;
            font-size: 0.95rem;
            position: relative;
            transition: all 0.3s var(--smooth-timing);
        }

        .nav-links a::before {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: 100%;
            height: 2px;
            background: var(--primary-gradient);
            border-radius: 2px;
            transition: transform 0.3s var(--smooth-timing);
        }

        .nav-links a:hover {
            color: #667eea;
            transform: translateY(-2px);
        }

        .nav-links a:hover::before {
            transform: translateX(-50%) scaleX(1);
        }

       .cta-button {
    background: var(--primary-gradient);
    color: white;
    padding: 0.4rem 1rem;   /* намалено */
    border: none;
    border-radius: 40px;    /* малку поостро */
    font-size: 0.85rem;     /* намалено */
    font-weight: 500;       /* полесен текст */
    cursor: pointer;
    transition: all 0.3s var(--bounce-timing);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;            /* помал простор меѓу икона и текст */
    box-shadow: 0 2px 8px rgba(102, 126, 234, 0.25); /* послаб сенка */
}

.cta-button i {
    font-size: 0.9rem; /* намалена икона */
}


        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(102, 126, 234, 0.4);
        }

        /* Hero Section */
        .hero {
            padding: 8rem 2rem 4rem;
            text-align: center;
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 10;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 30%, #f093fb 60%, #10b981 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: slideInUp 1s var(--bounce-timing);
        }

        .hero-subtitle {
            font-size: clamp(1.1rem, 3vw, 1.4rem);
            color: var(--text-secondary);
            margin-bottom: 2.5rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            animation: slideInUp 1s var(--bounce-timing) 0.2s both;
        }

        /* Pet Carousel */
        
        .pets-section {
            margin: 4rem 0;
            position: relative;
        }

        .pets-carousel {
            position: relative;
            overflow: hidden;
            padding: 2rem 0;
        }

.pets-track {
    display: flex;
    width: max-content;
    animation: infiniteScroll 300px linear infinite; /* побавно движење */
}



/* so ova zapira dvizenjeto */
        .pets-track:hover {     
            animation-play-state: paused;
        }

        .pet-card {
            width: 300px;
            height: 420px;
            margin: 0 1rem;
            border-radius: 25px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.4s var(--bounce-timing);
            flex-shrink: 0;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            background: white;
        }

        .pet-card:hover {
            transform: translateY(-15px) scale(1.05);
            z-index: 10;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.25);
        }

        .pet-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            border-radius: 25px 25px 0 0;
            transition: transform 0.4s ease;
        }

        .pet-card:hover .pet-image {
            transform: scale(1.1);
        }

        .pet-info {
            padding: 1.5rem;
            text-align: center;
            background: white;
            border-radius: 0 0 25px 25px;
            position: relative;
            z-index: 2;
        }

        .pet-name {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .loading-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 3.5s infinite;
        }

        /* Stats Section */
        .stats {
            background: var(--glass-bg);
            backdrop-filter: blur(25px);
            border-radius: 30px;
            padding: 3rem 2rem;
            margin: 4rem auto;
            max-width: 1200px;
            box-shadow: var(--glass-shadow);
            border: 1px solid var(--glass-border);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .stat-card {
            text-align: center;
            padding: 2rem;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s var(--bounce-timing);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
        }

        .stat-card:nth-child(1)::before { background: var(--primary-gradient); }
        .stat-card:nth-child(2)::before { background: var(--emerald-gradient); }
        .stat-card:nth-child(3)::before { background: var(--sunset-gradient); }
        .stat-card:nth-child(4)::before { background: var(--lavender-gradient); }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .stat-card:nth-child(1) .stat-number {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-card:nth-child(2) .stat-number {
            background: var(--emerald-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-card:nth-child(3) .stat-number {
            background: var(--sunset-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-card:nth-child(4) .stat-number {
            background: var(--lavender-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-label {
            font-size: 1.1rem;
            color: var(--text-secondary);
            font-weight: 600;
        }

            .world-map {
            width: 100%;
            height: 800px;
            display: block;
            }


        /* Footer */
        footer {
            background: linear-gradient(135deg, #1e293b 0%, #334155 50%, #475569 100%);
            padding: 2rem 0;
            margin-top: 6rem;
            position: relative;
            overflow: hidden;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
            position: relative;
            z-index: 2;
            padding: 0 2rem;
        }

        .social-icons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
        }

        .social-icons a {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            color: white;
            font-size: 1.5rem;
        }

        .social-icons a:nth-child(1) { background-color: #1877F2; }
        .social-icons a:nth-child(2) { background-color: darkmagenta; }
        .social-icons a:nth-child(3) { background-color: darkblue; }
        .social-icons a:nth-child(4) { background-color: darkred; }
        .social-icons a:nth-child(5) { background-color: #0077B5; }

        .social-icons a:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .copyright {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            text-align: center;
            font-weight: 400;
            letter-spacing: 0.5px;
        }

        /* Floating Action Button */
        .fab {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--primary-gradient);
            color: white;
            border: none;
            box-shadow: 0 8px 30px rgba(102, 126, 234, 0.3);
            cursor: pointer;
            transition: all 0.3s var(--bounce-timing);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .fab:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 12px 40px rgba(102, 126, 234, 0.4);
        }

        /* Error Message */
        .error-message {
            text-align: center;
            color: var(--text-secondary);
            font-style: italic;
            padding: 2rem;
        }

        .pet-fact-banner {
    max-width: 600px;
    margin: 20px auto;
    background-color: rgba(219, 210, 224, 1);
    border: 2px solid #a5a2a6ff;
    border-radius: 12px;
    padding: 15px 20px;
    text-align: center;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    font-family:  'Segoe UI', sans-serif;
    color: #000000ff;
}

.refresh-fact-btn {
    margin-top: 10px;
    background-color: #d4bfebff;
    border: none;
    padding: 8px 12px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    color: #6c6969ff;
    transition: background-color 0.3s ease;
}

.refresh-fact-btn:hover {
    background-color: #f5e3fdff;
}


        /* Animations */
        @keyframes bubbleFloat {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.1;
            }
            90% {
                opacity: 0.1;
            }
            100% {
                transform: translateY(-100px) rotate(720deg);
                opacity: 0;
            }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes infiniteScroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        @keyframes loading {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links { display: none; }
            .hero { padding-top: 6rem; }
            .services-grid { grid-template-columns: 1fr; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .footer-content { padding: 0 1rem; }
            .social-icons { gap: 1rem; }
            .social-icons a { width: 45px; height: 45px; font-size: 1.2rem; }
            .pet-card { width: 250px; height: 360px; }
        }
    </style>
</head>
<body>
    <!-- Floating Bubbles Background -->
    <div class="bubbles-container" id="bubbles-container"></div>

    <!-- Enhanced Header -->
    <header id="main-header">
        <nav>
            
            <a href="#hero" class="logo">🐾PET HEART</a>
           
             <a href="#" class="cta-button">
                <i class="fas fa-heart"></i>
               Home
            </a>
             <a href="views/aboutUs.php" class="cta-button">
                <i class="fas fa-heart"></i>
                About us
            </a>
             <a href="views/contact.php" class="cta-button">
                <i class="fas fa-heart"></i>
               Contact
            </a>
            <a href="meet_new_buddy.php" class="cta-button">
                <i class="fas fa-heart"></i>
                Meet a new buddy
            </a>
            <a href="give_new_home.php" class="cta-button">
                <i class="fas fa-heart"></i>
                Loving Home Needed
            </a>
            <a href="views/landing.php" class="cta-button">
                <i class="fas fa-heart"></i>
                Log In
            </a>
            <a href="views/users/register.php" class="cta-button">
                <i class="fas fa-heart"></i>
                Sign up
            </a>


            
        </nav>
    </header>
    

    <!-- Hero Section -->
    <section id="hero" class="hero">
        <div class="hero-content">
            <h1>Every Heart Deserves Love</h1>
            <p class="hero-subtitle">
                Discover your perfect companion through our revolutionary pet adoption platform. 
                Where technology meets compassion to create lifelong bonds.
            </p>
            <!-- Pet Fact Banner -->
<div class="pet-fact-banner">
    <p id="petFact">🐾 Did you know? 🐾</p>
    <button class="refresh-fact-btn" onclick="showRandomFact()">
        <i class="fas fa-sync-alt"></i> Show Fact
    </button>
</div>

            <!-- Search container removed but scroll line functionality preserved -->
        </div>

        <!-- Pet Carousel -->
        <div class="pets-section" id="pets">
            <div class="pets-carousel">
                <div class="pets-track" id="pets-track">
                    <!-- Pet cards will be dynamically loaded here -->
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number" data-target="5200">0+</div>
                <div class="stat-label">Happy Families Created</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-target="320">0+</div>
                <div class="stat-label">Active Foster Heroes</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-target="98">0%</div>
                <div class="stat-label">Success Rate</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-target="750">0+</div>
                <div class="stat-label">Volunteer Angels</div>
            </div>
        </div>
    </section>

<!-- <iframe src="mapa.php" width="98%" height="800" style="border:none;"></iframe> -->

<?php include 'views/mapa.php'; ?>

<!-- Footer -->
    <footer>
        <div class="footer-content">
            <!-- Social Icons -->
            <div class="social-icons">
                 <a href="https://www.facebook.com/yourpagename" target="_blank" aria-label="Facebook">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" 
                 alt="Facebook" 
                 style="width:32px; height:32px;">
        </a>
                 <!-- Instagram -->
        <a href="https://www.instagram.com/yourprofilename" target="_blank" aria-label="Instagram">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" 
                 alt="Instagram" 
                 style="width:32px; height:32px;">
        </a>

        <!-- Twitter -->
        <a href="https://www.twitter.com/yourprofilename" target="_blank" aria-label="Twitter">
            <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" 
                alt="Twitter" 
                style="width:32px; height:32px;">
        </a>

        <!-- YouTube -->
        <a href="https://www.youtube.com/yourchannelname" target="_blank" aria-label="YouTube">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/YouTube_Logo_2017.svg" 
                 alt="YouTube" 
                 style="width:38px; height:38px;">
        </a>

        <!-- LinkedIn -->
        <a href="https://www.linkedin.com/in/yourprofilename" target="_blank" aria-label="LinkedIn">
            <img src="https://upload.wikimedia.org/wikipedia/commons/c/ca/LinkedIn_logo_initials.png" 
                 alt="LinkedIn" 
                 style="width:32px; height:32px;">
        </a>

            </div>
            
            <p class="copyright">© 2025 PET HEART. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Global variables
        let allPets = [];
        let currentPets = [];

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            initializePage();
            loadPetsFromDatabase();
        });

  const petFacts = [
   "Cats sleep for around 70% of their lives.",
   "Hamsters have poor eyesight and rely heavily on scent and sound.",
   "Dogs can hear sounds up to four times farther than humans.",
   "Rabbits' teeth never stop growing — they need to chew constantly.",
   "Some dog breeds can understand over 200 words.",
   "Cats have five toes on their front paws but only four on the back.",
   "Hamsters store food in their cheek pouches to eat later.",
   "Rabbits can jump up to one meter high and three meters long.",
   "Dogs' sense of smell is 10,000 to 100,000 times more acute than ours.",
   "Cats use their whiskers to measure gaps and detect nearby objects.",
   "Parrots can mimic human speech and even recognize voices.",
   "Guinea pigs communicate with over 20 different sounds.",
   "Turtles can live for over 100 years in the right conditions.",
   "Ferrets sleep up to 18 hours a day but are very active when awake.",
   "Goldfish have a memory span of at least three months.",
   "Chinchillas have the densest fur of all land animals.",
   "Horses can recognize emotions on human faces.",
   "Owls can rotate their heads up to 270 degrees.",
   "Goats have rectangular pupils that give them a wide field of vision.",
];


function showRandomFact() {
    const fact = petFacts[Math.floor(Math.random() * petFacts.length)];
    document.getElementById("petFact").textContent = fact;
}


        function initializePage() {
            // Generate floating bubbles
            createBubbles();
            
            // Initialize scroll effects
            initScrollEffects();
            
            // Initialize stats animation
            initStatsAnimation();
            
            // Initialize other interactive elements
            initInteractiveElements();
        }

        // Load pets from database
        async function loadPetsFromDatabase() {
            try {
                const response = await fetch('data_for_base/get_pets.php');
                if (!response.ok) {
                    throw new Error('Failed to fetch pets');
                }
                
                const pets = await response.json();
                allPets = pets;
                currentPets = pets;
                displayPets(pets);
                
            } catch (error) {
                console.error('Error loading pets:', error);
                displayError('Unable to load pets at the moment. Please try again later.');
            }
        }

        // Display pets in the carousel
        function displayPets(pets) {
            const petsTrack = document.getElementById('pets-track');

            if (!pets || pets.length === 0) {
                petsTrack.innerHTML = '<div class="error-message">No pets available at the moment.</div>';
                return;
            }

            // Clear existing content
            petsTrack.innerHTML = '';

            // Create pet cards
            const petCards = pets.map(pet => createPetCard(pet)).join('');

            // Duplicate cards for infinite scroll
            petsTrack.innerHTML = petCards + petCards;

            // Add a smoother animation
            petsTrack.style.animation = 'none';
            petsTrack.offsetHeight; // Trigger reflow
            petsTrack.style.animation = 'infiniteScroll 120s linear infinite'; // подолго време = побавно
        }

function createPetCard(pet) {
    const genderClass = pet.gender && pet.gender.toLowerCase() === 'female' ? 'female' : 'male';
    
    let imagePath = 'images/default-pet.jpg'; // fallback
    if (pet.images_url) {
        // Ако е chinchilla или parrot, додај апсолутен path
        if (pet.images_url.startsWith('sliki_chinchillas/') || pet.images_url.startsWith('parrots/') || pet.images_url.startsWith('rabbits/') || pet.images_url.startsWith('hamsters/')  || pet.images_url.startsWith('uploads/')) {
            imagePath = `/NewHomeForPet/${pet.images_url}`;
        } else {
            // За сите други животни користи директно URL-то од базата
            imagePath = pet.images_url;
        }
    }

    return `
        <div class="pet-card" onclick="showPetDetails(${pet.id})">
            <img src="${imagePath}" alt="${pet.name}" class="pet-image" onerror="this.src='images/default-pet.jpg'">
            <div class="pet-info">
                <div class="pet-name">${pet.name || 'Unknown'}</div>
                <div class="pet-badges">
                    ${pet.gender ? `<span class="pet-badge gender-badge ${genderClass}">${pet.gender}</span>` : ''}
                </div>
            </div>
        </div>
    `;
}

        // Show pet details (placeholder function)
        function showPetDetails(petId) {
            const pet = allPets.find(p => p.id === petId);
            if (pet) {
                alert(`Pet Details:\nName: ${pet.name}\nBreed: ${pet.breed}\nAge: ${calculateAge(pet.birth_date || pet.age)}\nGender: ${pet.gender || 'Unknown'}`);
            }
        }

        // Display error message
        function displayError(message) {
            const petsTrack = document.getElementById('pets-track');
            petsTrack.innerHTML = `<div class="error-message">${message}</div>`;
        }

        // Create floating bubbles
        function createBubbles() {
            const bubblesContainer = document.getElementById('bubbles-container');
            
            function createBubble() {
                const bubble = document.createElement('div');
                bubble.classList.add('bubble');
                const size = Math.random() * 80 + 20;
                bubble.style.width = `${size}px`;
                bubble.style.height = `${size}px`;
                bubble.style.left = `${Math.random() * 100}vw`;
                bubble.style.animationDuration = `${Math.random() * 10 + 15}s`;
                bubble.style.animationDelay = `${Math.random() * 5}s`;
                bubble.style.setProperty('--duration', `${Math.random() * 10 + 15}s`);
                bubblesContainer.appendChild(bubble);

                bubble.addEventListener('animationend', () => {
                    bubble.remove();
                });
            }

            // Create initial bubbles
            for (let i = 0; i < 15; i++) {
                createBubble();
            }

            // Continue creating bubbles
            setInterval(createBubble, 2000);
        }

            // Initialize scroll effects
            function initScrollEffects() {
                // Header scroll effect
                window.addEventListener('scroll', () => {
                    const header = document.getElementById('main-header');
                    if (window.scrollY > 50) {
                        header.classList.add('scrolled');
                    } else {
                        header.classList.remove('scrolled');
                    }
                });

                // Smooth scroll for navigation links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth'
                            });
                        }
                    });
                });
            }

        // Initialize stats animation
        function initStatsAnimation() {
            const statNumbers = document.querySelectorAll('.stat-number');
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.5
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = parseInt(entry.target.dataset.target);
                        const isPercentage = entry.target.textContent.includes('%');
                        let current = 0;
                        const increment = target / 200;

                        const updateCounter = () => {
                            if (current < target) {
                                current += increment;
                                entry.target.textContent = Math.ceil(current) + (isPercentage ? '%' : '+');
                                requestAnimationFrame(updateCounter);
                            } else {
                                entry.target.textContent = target + (isPercentage ? '%' : '+');
                            }
                        };
                        updateCounter();
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            statNumbers.forEach(number => {
                observer.observe(number);
            });
        }

        // Initialize other interactive elements
        function initInteractiveElements() {
            // FAB functionality
            const fabButton = document.getElementById('fab-button');
            if (fabButton) {
                fabButton.addEventListener('click', () => {
                    // You can implement contact form or chat functionality here
                    alert('Contact functionality coming soon!');
                });
            }
        }

        // Pause animation on hover
        document.addEventListener('DOMContentLoaded', function() {
            const petsTrack = document.getElementById('pets-track');
            if (petsTrack) {
                petsTrack.addEventListener('mouseenter', () => {
                    petsTrack.style.animationPlayState = 'paused';
                });
                petsTrack.addEventListener('mouseleave', () => {
                    petsTrack.style.animationPlayState = 'running';
                });
            }
        });
    </script>

</body>
</html>
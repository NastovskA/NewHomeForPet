

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawMatch - Find a Loving Home for Your Pet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        :root {
            --primary: #941eabff;
            --primary-light: #FFE3E3;
            --secondary: #4ECDC4;
            --accent: #45B7D1;
            --dark: #2C3E50;
            --light: #F8F9FA;
            --success: #96CEB4;
            --warning: #FFEAA7;
            --error: #FF7675;
            --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-2: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-3: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
            --shadow-hover: 0 30px 80px rgba(0, 0, 0, 0.15);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: var(--dark);
            line-height: 1.7;
            overflow-x: hidden;
            position: relative;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><radialGradient id="a" cx=".5" cy=".5" r=".5"><stop offset="0" stop-color="%23ffffff" stop-opacity="0.1"/><stop offset="1" stop-color="%23ffffff" stop-opacity="0"/></radialGradient></defs><circle cx="20" cy="20" r="10" fill="url(%23a)"><animateTransform attributeName="transform" type="translate" values="0,0;80,80;0,0" dur="20s" repeatCount="indefinite"/></circle><circle cx="80" cy="80" r="15" fill="url(%23a)"><animateTransform attributeName="transform" type="translate" values="0,0;-80,-80;0,0" dur="25s" repeatCount="indefinite"/></circle><circle cx="50" cy="10" r="8" fill="url(%23a)"><animateTransform attributeName="transform" type="translate" values="0,0;0,90;0,0" dur="18s" repeatCount="indefinite"/></circle></svg>');
            pointer-events: none;
            z-index: -1;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Animated Header */
header {
    position: sticky;
    top: 0;
    z-index: 1000;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(15px);
    color: var(--dark);
    padding: 15px 0;
    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.08);
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.logo {
    display: flex;
    align-items: center;
    font-size: 28px;
    font-weight: 800;
    color: var(--primary);
}

.logo i {
    margin-right: 10px;
    font-size: 32px;
    animation: bounce 2s infinite;
}

nav ul {
    display: flex;
    list-style: none;
    gap: 25px;
}

nav ul li a {
    color: var(--dark);
    text-decoration: none;
    font-weight: 500;
    padding: 8px 12px;
    border-radius: 8px;
    transition: all 0.3s ease;
    position: relative;
}

nav ul li a:hover {
    color: var(--primary);
    transform: translateY(-2px);
}

nav ul li a::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -2px;
    width: 0;
    height: 2px;
    background: var(--primary);
    transition: width 0.3s ease;
}

nav ul li a:hover::after {
    width: 100%;
}

        /* Hero Section */
        .hero {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            margin: 20px auto;
            border-radius: 30px;
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow);
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1548199973-03cce0bbc87b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1500&q=80');
            background-size: cover;
            background-position: center;
            opacity: 0.1;
            z-index: -1;
        }
        
        .hero h1 {
            font-size: 56px;
            font-weight: 800;
            margin-bottom: 20px;
            background: var(--gradient-2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: fadeInUp 1s ease;
        }
        
        .hero p {
            font-size: 24px;
            max-width: 800px;
            margin: 0 auto 40px;
            color: var(--dark);
            opacity: 0.8;
            animation: fadeInUp 1s ease 0.2s both;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Main Content */
        .main-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        @media (max-width: 1200px) {
            .main-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }
        }
        
        /* Form Section */
        .form-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 40px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .form-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 107, 107, 0.03) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
            z-index: -1;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .form-section:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }
        
        .section-title {
            font-size: 32px;
            margin-bottom: 30px;
            font-weight: 700;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 15px;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
        
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: var(--dark);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            font-family: 'Inter', sans-serif;
        }
        
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 6px rgba(255, 107, 107, 0.1);
            transform: translateY(-2px);
        }
        
        textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        /* Custom Select Styling */
        select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6,9 12,15 18,9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 20px center;
            background-size: 16px;
            cursor: pointer;
        }
        
        /* File Upload */
        .file-upload-wrapper {
            position: relative;
            overflow: hidden;
            border: 2px dashed var(--primary);
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            background: rgba(255, 107, 107, 0.02);
        }
        
        .file-upload-wrapper:hover {
            border-color: var(--secondary);
            background: rgba(78, 205, 196, 0.05);
            transform: scale(1.02);
        }
        
        .file-upload-wrapper input[type="file"] {
            position: absolute;
            left: -9999px;
        }
        
        .upload-icon {
            font-size: 48px;
            color: var(--primary);
            margin-bottom: 15px;
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .upload-text {
            font-size: 18px;
            color: var(--dark);
            font-weight: 500;
        }
        
        .upload-subtext {
            font-size: 14px;
            color: var(--dark);
            opacity: 0.6;
            margin-top: 5px;
        }
        
        /* Submit Button */
        .btn {
            background: var(--gradient-2);
            color: white;
            border: none;
            padding: 18px 40px;
            border-radius: 50px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(245, 87, 108, 0.3);
            position: relative;
            overflow: hidden;
            width: 100%;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn:hover::before {
            left: 100%;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(245, 87, 108, 0.4);
        }
        
        .btn i {
            margin-right: 10px;
            font-size: 16px;
        }
        
        /* Preview Section */
        .preview-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 40px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            position: sticky;
            top: 120px;
            height: fit-content;
        }
        
        .preview-section:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }
        
        .pet-card {
            background: var(--light);
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .pet-card:hover {
            transform: translateY(-5px);
        }
        
        .pet-image {
            height: 250px;
            background: linear-gradient(45deg, #f093fb, #f5576c);
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }
        
        .pet-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.1);
        }
        
        .pet-info {
            padding: 25px;
        }
        
        .pet-name {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--dark);
        }
        
        .pet-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .pet-detail {
            display: flex;
            align-items: center;
            padding: 10px;
            background: rgba(255, 107, 107, 0.05);
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .pet-detail:hover {
            background: rgba(255, 107, 107, 0.1);
            transform: scale(1.05);
        }
        
        .pet-detail i {
            margin-right: 10px;
            color: var(--primary);
            font-size: 16px;
            width: 20px;
        }
        
        .pet-detail span {
            font-weight: 500;
            font-size: 14px;
        }
        
        .pet-description {
            color: var(--dark);
            opacity: 0.8;
            line-height: 1.6;
            font-size: 15px;
        }
        
        /* Similar Pets */
        .similar-pets {
            margin-top: 40px;
        }
        
        .pets-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .pet-thumb {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .pet-thumb:hover {
            transform: translateY(-10px) rotateX(5deg);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .pet-thumb-image {
            height: 140px;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }
        
        .pet-thumb-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.3), rgba(78, 205, 196, 0.3));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .pet-thumb:hover .pet-thumb-image::before {
            opacity: 1;
        }
        
        .pet-thumb-info {
            padding: 15px;
        }
        
        .pet-thumb-name {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--dark);
        }
        
        .pet-thumb-details {
            font-size: 12px;
            color: var(--dark);
            opacity: 0.7;
        }
        
        /* Notification */
        .notification {
            position: fixed;
            top: 30px;
            right: 30px;
            padding: 20px 30px;
            border-radius: 15px;
            background: var(--gradient-3);
            color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            z-index: 10000;
            transform: translateX(400px);
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            backdrop-filter: blur(20px);
        }
        
        .notification.show {
            transform: translateX(0);
        }
        
        .notification i {
            margin-right: 15px;
            font-size: 20px;
        }
        
        .notification-text {
            font-weight: 500;
            font-size: 16px;
        }
        
        /* Loading Animation */
        .loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            z-index: 10001;
            justify-content: center;
            align-items: center;
        }
        
        .loading.show {
            display: flex;
        }
        
        .spinner {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Progress Bar */
        .progress-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: rgba(255, 255, 255, 0.2);
            z-index: 10000;
        }
        
        .progress-bar {
            height: 100%;
            background: var(--gradient-2);
            width: 0%;
            transition: width 0.3s ease;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 15px;
            }
            
            nav ul {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }
            
            .hero h1 {
                font-size: 36px;
            }
            
            .hero p {
                font-size: 18px;
            }
            
            .form-section, .preview-section {
                padding: 30px 20px;
            }
            
            .section-title {
                font-size: 24px;
            }
            
            .preview-section {
                position: static;
            }
        }
        
        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.1);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--gradient-2);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary);
        }


        /* Стил за навигација */
nav ul {
    list-style: none;
    display: flex;
    gap: 20px;
    padding: 0;
    margin: 0;
}

nav ul li {
    position: relative;
}

/* Hover блок */
.how-it-works-block {
    display: none;
    position: absolute;
    top: 35px; /* малку под линкот */
    left: 0;
    background: #fff;
    border: 1px solid #ccc;
    padding: 15px;
    width: 250px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    z-index: 100;
}

.how-it-works-item:hover .how-it-works-block {
    display: block;
}

.how-it-works-block ol {
    margin: 0;
    padding-left: 20px;
}

.how-it-works-block li {
    margin-bottom: 8px;
}



    </style>
</head>
<body>
    <!-- Progress Bar -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    <!-- Loading Overlay -->
    <div class="loading" id="loading">
        <div class="spinner"></div>
    </div>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <i class="fas fa-paw"></i>
                    <span>PetHeart</span>
                </div>
                <nav>
                    <ul>
                        <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="meet_new_buddy.php"><i class="fas fa-paw"></i> Meet Buddies</a></li>
                        <li><a href="views/contact.php"><i class="fas fa-envelope"></i> Contact</a></li>
                         <!-- How it Works со hover блок -->
                    <li class="how-it-works-item">
                        <a href="#"><i class="fas fa-info-circle"></i> How it Works</a>
                        <div class="how-it-works-block">
                            <ol>
                                <li><strong>Add Your Pet</strong> – Enter your pet’s info and photo.</li>
                                <li><strong>Find a Loving Home</strong> – Interested users can view your pet.</li>
                                <li><strong>Connect with a New Owner</strong> – Exchange details and arrange adoption.</li>
                                <li><strong>Give Your Pet a New Home</strong> – Your pet gets a happy home!</li>
                            </ol>
                        </div>
                    </li>   
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>🐾 Find a Loving Home for Your Pet</h1>
            <p>Help your furry friend find the perfect new family with our modern rehoming platform</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <div class="main-content">
            <!-- Form Section -->
            <div class="form-section">
                <h2 class="section-title">
                    <i class="fas fa-plus-circle"></i> 
                    List Your Pet for Adoption
                </h2>
                
                <form id="rehomeForm" method="POST" action="" enctype="multipart/form-data">
                    <!-- Pet Basic Info -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="petName">🐕 Pet Name</label>
                            <input type="text" id="petName" name="petName" required placeholder="What's your pet's name?">
                        </div>
                        <div class="form-group">
                            <label for="petAge">🎂 Pet Age</label>
                            <input type="number" id="petAge" name="petAge" required placeholder="Age in years" min="0" max="30">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="petGender">⚤ Gender</label>
                            <select id="petGender" name="petGender" required>
                                <option value="">Select Gender</option>
                                <option value="male">♂ Male</option>
                                <option value="female">♀ Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="petCategory">🏷️ Category</label>
                            <select id="petCategory" name="petCategory" required>
                                <option value="">Select Category</option>
                                <option value="dogs">🐕 Dog</option>
                                <option value="cats">🐱 Cat</option>
                                <option value="chinchillas">🐹 Chinchilla</option>
                                <option value="birds">🦜 Bird</option>
                                <option value="rabbits">🐰 Rabbit</option>
                                <option value="hamsters">🐹 Hamster</option>
                            </select>
                        </div>
                    </div>

                    <!-- Breed -->
                    <div class="form-group">
                        <label for="petBreed">🧬 Breed</label>
                        <input type="text" id="petBreed" name="petBreed" required placeholder="What breed is your pet?">
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="petDescription">📝 Description</label>
                        <textarea id="petDescription" name="petDescription" required placeholder="Tell us about your pet's personality, habits, and what makes them special..."></textarea>
                    </div>

                    <!-- Activity Level -->
                    <div class="form-group">
                        <label for="petActivity">⚡ Activity Level</label>
                        <select id="petActivity" name="petActivity">
                            <option value="">Select Activity Level</option>
                            <option value="low">🐌 Low - Prefers calm environments</option>
                            <option value="moderate">🚶 Moderate - Enjoys regular walks</option>
                            <option value="high">🏃 High - Very energetic and playful</option>
                        </select>
                    </div>

                    <!-- Health Info -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="petVaccination">💉 Vaccinated</label>
                            <select id="petVaccination" name="petVaccination">
                                <option value="yes">✅ Yes, fully vaccinated</option>
                                <option value="no">❌ Not vaccinated</option>
                                <option value="partial">⏳ Partially vaccinated</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ownerName">👤 Owner Name</label>
                            <input type="text" id="ownerName" name="ownerName" required placeholder="Your full name">
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="city">🏙️ City</label>
                            <input type="text" id="city" name="city" placeholder="Which city are you in?">
                        </div>
                        <div class="form-group">
                            <label for="country">🌍 Country</label>
                            <input type="text" id="country" name="country" placeholder="Which country?">
                        </div>
                    </div>

                    <!-- Rehoming Details -->
                    <div class="form-group">
                        <label for="rehomingReason">💭 Reason for Rehoming</label>
                        <textarea id="rehomingReason" name="rehomingReason" required placeholder="Please share why you need to rehome your pet..."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="idealOwner">👨‍👩‍👧‍👦 Ideal New Owner</label>
                        <textarea id="idealOwner" name="idealOwner" placeholder="Describe what kind of family would be perfect for your pet..."></textarea>
                    </div>

                    <!-- Image Upload -->
                    <div class="form-group">
                        <label>📸 Upload Pet Photo</label>
                        <div class="file-upload-wrapper" onclick="document.getElementById('petImage').click()">
                            <div class="upload-icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <div class="upload-text">Click to upload or drag and drop</div>
                            <div class="upload-subtext">PNG, JPG up to 10MB</div>
                            <input type="file" id="petImage" name="petImage" accept="image/*">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn" name="submit">
                        <i class="fas fa-heart"></i> 
                        Find My Pet a New Home
                    </button>
                </form>
            </div>
            
            <!-- Preview Section -->
            <div class="preview-section">
                <h2 class="section-title">
                    <i class="fas fa-eye"></i> 
                    Live Preview
                </h2>
                
                <div class="pet-card">
                    <div class="pet-image" id="previewImage">
                        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">
                            <i class="fas fa-camera" style="font-size: 48px; margin-bottom: 10px;"></i>
                            <p style="font-size: 16px; margin: 0;">Upload a photo to see preview</p>
                        </div>
                    </div>
                    <div class="pet-info">
                        <h3 class="pet-name" id="previewName">Your Pet's Name</h3>
                        <div class="pet-details">
                            <div class="pet-detail">
                                <i class="fas fa-birthday-cake"></i>
                                <span id="previewAge">Age</span>
                            </div>
                            <div class="pet-detail">
                                <i class="fas fa-venus-mars"></i>
                                <span id="previewGender">Gender</span>
                            </div>
                            <div class="pet-detail">
                                <i class="fas fa-dna"></i>
                                <span id="previewBreed">Breed</span>
                            </div>
                            <div class="pet-detail">
                                <i class="fas fa-paw"></i>
                                <span id="previewCategory">Category</span>
                            </div>
                        </div>
                        <div class="pet-description" id="previewDescription">
                            Pet description will appear here as you type...
                        </div>
                    </div>
                </div>
                
                <div class="similar-pets">
                    <h3 class="section-title">
                        <i class="fas fa-heart"></i> 
                        Similar Pets Looking for Homes
                    </h3>
                    <p style="margin-bottom: 20px; opacity: 0.8;">Your pet will appear alongside these adorable friends</p>
                    
                    <div class="pets-grid">
                        <div class="pet-thumb">
                            <div class="pet-thumb-image" style="background-image: url('https://images.unsplash.com/photo-1552053831-71594a27632d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80');"></div>
                            <div class="pet-thumb-info">
                                <h4 class="pet-thumb-name">Max</h4>
                                <p class="pet-thumb-details">Golden Retriever • 3 years</p>
                            </div>
                        </div>
                        
                        <div class="pet-thumb">
                            <div class="pet-thumb-image" style="background-image: url('https://images.unsplash.com/photo-1592194996308-7b43878e84a6?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80');"></div>
                            <div class="pet-thumb-info">
                                <h4 class="pet-thumb-name">Bella</h4>
                                <p class="pet-thumb-details">Cat • 2 years</p>
                            </div>
                        </div>
                        
                        <div class="pet-thumb">
                            <div class="pet-thumb-image" style="background-image: url('https://images.unsplash.com/photo-1583337130417-3346a1be7dee?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80');"></div>
                            <div class="pet-thumb-info">
                                <h4 class="pet-thumb-name">Charlie</h4>
                                <p class="pet-thumb-details">German Shepherd • 4 years</p>
                            </div>
                        </div>
                        
                        <div class="pet-thumb">
                            <div class="pet-thumb-image" style="background-image: url('https://images.unsplash.com/photo-1583512603806-077998240c7a?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80');"></div>
                            <div class="pet-thumb-info">
                                <h4 class="pet-thumb-name">Luna</h4>
                                <p class="pet-thumb-details">Husky • 3 years</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification -->
    <div class="notification" id="notification">
        <i class="fas fa-check-circle"></i>
        <div class="notification-text">Your pet has been successfully listed! 🎉</div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form elements
            const form = document.getElementById('rehomeForm');
            const fileInput = document.getElementById('petImage');
            const progressBar = document.getElementById('progressBar');
            const loading = document.getElementById('loading');
            const notification = document.getElementById('notification');
            
            // Preview elements
            const previewName = document.getElementById('previewName');
            const previewAge = document.getElementById('previewAge');
            const previewGender = document.getElementById('previewGender');
            const previewBreed = document.getElementById('previewBreed');
            const previewCategory = document.getElementById('previewCategory');
            const previewDescription = document.getElementById('previewDescription');
            const previewImage = document.getElementById('previewImage');
            
            // Progress tracking
            let formProgress = 0;
            const totalFields = 11; // Total number of required fields
            
            function updateProgress() {
                const filledFields = Array.from(form.querySelectorAll('input[required], select[required], textarea[required]'))
                    .filter(field => field.value.trim() !== '').length;
                formProgress = (filledFields / totalFields) * 100;
                progressBar.style.width = formProgress + '%';
            }
            
            // File upload with preview
            fileInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        previewImage.style.backgroundImage = `url(${e.target.result})`;
                        previewImage.innerHTML = ''; // Remove placeholder content
                        
                        // Add a nice overlay effect
                        const overlay = document.createElement('div');
                        overlay.style.cssText = `
                            position: absolute;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            background: linear-gradient(45deg, rgba(255,107,107,0.1), rgba(78,205,196,0.1));
                        `;
                        previewImage.appendChild(overlay);
                    }
                    
                    reader.readAsDataURL(this.files[0]);
                    updateProgress();
                }
            });
            
            // Drag and drop functionality
            const fileUploadWrapper = document.querySelector('.file-upload-wrapper');
            
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                fileUploadWrapper.addEventListener(eventName, preventDefaults, false);
                document.body.addEventListener(eventName, preventDefaults, false);
            });
            
            ['dragenter', 'dragover'].forEach(eventName => {
                fileUploadWrapper.addEventListener(eventName, highlight, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                fileUploadWrapper.addEventListener(eventName, unhighlight, false);
            });
            
            fileUploadWrapper.addEventListener('drop', handleDrop, false);
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            function highlight(e) {
                fileUploadWrapper.style.background = 'rgba(78, 205, 196, 0.1)';
                fileUploadWrapper.style.borderColor = 'var(--secondary)';
                fileUploadWrapper.style.transform = 'scale(1.02)';
            }
            
            function unhighlight(e) {
                fileUploadWrapper.style.background = 'rgba(255, 107, 107, 0.02)';
                fileUploadWrapper.style.borderColor = 'var(--primary)';
                fileUploadWrapper.style.transform = 'scale(1)';
            }
            
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                
                if (files.length > 0) {
                    fileInput.files = files;
                    const event = new Event('change', { bubbles: true });
                    fileInput.dispatchEvent(event);
                }
            }
            
            // Real-time preview updates with animations
            const formInputs = form.querySelectorAll('input, select, textarea');
            
            formInputs.forEach(input => {
                input.addEventListener('input', function(e) {
                    const element = e.target;
                    
                    // Add input animation
                    element.style.transform = 'scale(1.02)';
                    setTimeout(() => {
                        element.style.transform = 'scale(1)';
                    }, 100);
                    
                    // Update preview
                    switch(element.id) {
                        case 'petName':
                            animateTextChange(previewName, element.value || 'Your Pet\'s Name');
                            break;
                        case 'petAge':
                            animateTextChange(previewAge, element.value ? `${element.value} years old` : 'Age');
                            break;
                        case 'petGender':
                            const genderIcon = element.value === 'male' ? '♂' : element.value === 'female' ? '♀' : '';
                            animateTextChange(previewGender, element.value ? `${genderIcon} ${element.value.charAt(0).toUpperCase() + element.value.slice(1)}` : 'Gender');
                            break;
                        case 'petBreed':
                            animateTextChange(previewBreed, element.value || 'Breed');
                            break;
                        case 'petCategory':
                            const categoryEmoji = {
                                'dogs': '🐕',
                                'cats': '🐱',
                                'chinchillas': '🐹',
                                'birds': '🦜',
                                'rabbits': '🐰',
                                'hamsters': '🐹'
                            };
                            animateTextChange(previewCategory, element.value ? `${categoryEmoji[element.value] || ''} ${element.value.charAt(0).toUpperCase() + element.value.slice(1).slice(0, -1)}` : 'Category');
                            break;
                        case 'petDescription':
                            animateTextChange(previewDescription, element.value || 'Pet description will appear here as you type...');
                            break;
                    }
                    
                    updateProgress();
                });
                
                // Add focus effects
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });
            
            function animateTextChange(element, newText) {
                element.style.transform = 'scale(0.95)';
                element.style.opacity = '0.7';
                
                setTimeout(() => {
                    element.textContent = newText;
                    element.style.transform = 'scale(1)';
                    element.style.opacity = '1';
                }, 100);
            }
            
            // Form submission with loading animation
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show loading
                loading.classList.add('show');
                
                // Simulate form processing
                setTimeout(() => {
                    loading.classList.remove('show');
                    
                    // Show success notification
                    notification.classList.add('show');
                    
                    // Hide notification after 4 seconds
                    setTimeout(() => {
                        notification.classList.remove('show');
                    }, 4000);
                    
                    // Add confetti effect
                    createConfetti();
                    
                    // Update progress to 100%
                    progressBar.style.width = '100%';
                    
                }, 2000);
            });
            
            // Confetti effect
            function createConfetti() {
                const colors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#96CEB4', '#FFEAA7'];
                
                for (let i = 0; i < 50; i++) {
                    setTimeout(() => {
                        const confetti = document.createElement('div');
                        confetti.style.cssText = `
                            position: fixed;
                            top: -10px;
                            left: ${Math.random() * 100}%;
                            width: 10px;
                            height: 10px;
                            background: ${colors[Math.floor(Math.random() * colors.length)]};
                            border-radius: 50%;
                            animation: confettiFall 3s ease-out forwards;
                            z-index: 10002;
                            pointer-events: none;
                        `;
                        
                        document.body.appendChild(confetti);
                        
                        setTimeout(() => {
                            confetti.remove();
                        }, 3000);
                    }, i * 100);
                }
            }
            
            // Add confetti animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes confettiFall {
                    to {
                        transform: translateY(100vh) rotate(360deg);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
            
            // Initialize progress
            updateProgress();
            
            // Add some initial animations
            setTimeout(() => {
                document.querySelector('.form-section').style.animation = 'fadeInUp 0.6s ease both';
                document.querySelector('.preview-section').style.animation = 'fadeInUp 0.6s ease 0.2s both';
            }, 100);
            
            // Smooth scrolling for better UX
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
            
            // Add hover effects to pet thumbnails
            document.querySelectorAll('.pet-thumb').forEach(thumb => {
                thumb.addEventListener('mouseenter', function() {
                    this.style.animation = 'pulse 0.6s ease infinite alternate';
                });
                
                thumb.addEventListener('mouseleave', function() {
                    this.style.animation = 'none';
                });
            });
            
            // Add pulse animation
            const pulseStyle = document.createElement('style');
            pulseStyle.textContent = `
                @keyframes pulse {
                    from { transform: translateY(-10px) rotateX(5deg) scale(1); }
                    to { transform: translateY(-10px) rotateX(5deg) scale(1.05); }
                }
            `;
            document.head.appendChild(pulseStyle);
        });
    </script>
</body>
</html>
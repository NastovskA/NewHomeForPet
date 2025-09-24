<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PET HEART - Give Home</title>
    
    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
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
            --shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            --shadow-hover: 0 20px 50px rgba(0, 0, 0, 0.12);
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
            line-height: 1.6;
            overflow-x: hidden;
            position: relative;
            font-size: 14px;
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        /* Header */
        header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            color: var(--dark);
            padding: 12px 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 24px;
            font-weight: 800;
            color: var(--primary);
        }

        .logo i {
            margin-right: 8px;
            font-size: 28px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-10px);}
            60% {transform: translateY(-5px);}
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 20px;
        }

        nav ul li a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
            padding: 6px 10px;
            border-radius: 6px;
            transition: all 0.3s ease;
            position: relative;
            font-size: 14px;
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
            margin: 15px auto;
            border-radius: 20px;
            padding: 60px 0;
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
            font-size: 42px;
            font-weight: 800;
            margin-bottom: 15px;
            background: var(--gradient-2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: fadeInUp 1s ease;
        }
        
        .hero p {
            font-size: 18px;
            max-width: 700px;
            margin: 0 auto 30px;
            color: var(--dark);
            opacity: 0.8;
            animation: fadeInUp 1s ease 0.2s both;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
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
            gap: 30px;
            margin: 30px auto;
            padding: 0 15px;
        }
        
        @media (max-width: 1200px) {
            .main-content {
                grid-template-columns: 1fr;
                gap: 25px;
            }
        }
        
        /* Form Section */
        .form-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 30px;
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
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }
        
        .section-title {
            font-size: 26px;
            margin-bottom: 20px;
            font-weight: 700;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 12px;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            font-family: 'Inter', sans-serif;
        }
        
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(255, 107, 107, 0.1);
            transform: translateY(-2px);
        }
        
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        /* Custom Select Styling */
        select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6,9 12,15 18,9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 14px;
            cursor: pointer;
        }
        
        /* File Upload */
        .file-upload-wrapper {
            position: relative;
            overflow: hidden;
            border: 2px dashed var(--primary);
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            background: rgba(255, 107, 107, 0.02);
        }
        
        .file-upload-wrapper:hover {
            border-color: var(--secondary);
            background: rgba(78, 205, 196, 0.05);
            transform: scale(1.01);
        }
        
        .file-upload-wrapper input[type="file"] {
            position: absolute;
            left: -9999px;
        }
        
        .upload-icon {
            font-size: 40px;
            color: var(--primary);
            margin-bottom: 12px;
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        
        .upload-text {
            font-size: 16px;
            color: var(--dark);
            font-weight: 500;
        }
        
        .upload-subtext {
            font-size: 13px;
            color: var(--dark);
            opacity: 0.6;
            margin-top: 4px;
        }
        
        /* Submit Button */
        .btn {
            background: var(--gradient-2);
            color: white;
            border: none;
            padding: 16px 35px;
            border-radius: 40px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 25px rgba(245, 87, 108, 0.3);
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
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(245, 87, 108, 0.35);
        }
        
        .btn i {
            margin-right: 8px;
            font-size: 14px;
        }
        
        /* Preview Section */
        .preview-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            position: sticky;
            top: 100px;
            height: fit-content;
        }
        
        .preview-section:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-hover);
        }
        
        .pet-card {
            background: var(--light);
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .pet-card:hover {
            transform: translateY(-3px);
        }
        
        .pet-image {
            height: 220px;
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
            padding: 20px;
        }
        
        .pet-name {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--dark);
        }
        
        .pet-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 16px;
        }
        
        .pet-detail {
            display: flex;
            align-items: center;
            padding: 8px;
            background: rgba(255, 107, 107, 0.05);
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .pet-detail:hover {
            background: rgba(255, 107, 107, 0.1);
            transform: scale(1.03);
        }
        
        .pet-detail i {
            margin-right: 8px;
            color: var(--primary);
            font-size: 14px;
            width: 18px;
        }
        
        .pet-detail span {
            font-weight: 500;
            font-size: 13px;
        }
        
        .pet-description {
            color: var(--dark);
            opacity: 0.8;
            line-height: 1.5;
            font-size: 14px;
        }
        
        /* Similar Pets */
        .similar-pets {
            margin-top: 30px;
        }
        
        .pets-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        
        .pet-thumb {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .pet-thumb:hover {
            transform: translateY(-5px) rotateX(3deg);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
        }
        
        .pet-thumb-image {
            height: 120px;
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
            padding: 12px;
        }
        
        .pet-thumb-name {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 4px;
            color: var(--dark);
        }
        
        .pet-thumb-details {
            font-size: 11px;
            color: var(--dark);
            opacity: 0.7;
        }
        
        /* Notification */
        .notification {
            position: fixed;
            top: 25px;
            right: 25px;
            padding: 15px 25px;
            border-radius: 12px;
            background: var(--gradient-3);
            color: white;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            z-index: 10000;
            transform: translateX(350px);
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            backdrop-filter: blur(20px);
        }
        
        .notification.show {
            transform: translateX(0);
        }
        
        .notification i {
            margin-right: 12px;
            font-size: 18px;
        }
        
        .notification-text {
            font-weight: 500;
            font-size: 14px;
        }
        
        /* Loading Animation */
        .loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            z-index: 10001;
            justify-content: center;
            align-items: center;
        }
        
        .loading.show {
            display: flex;
        }
        
        .spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid white;
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
            height: 3px;
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
                gap: 12px;
            }
            
            nav ul {
                flex-wrap: wrap;
                justify-content: center;
                gap: 12px;
            }
            
            .hero h1 {
                font-size: 32px;
            }
            
            .hero p {
                font-size: 16px;
            }
            
            .form-section, .preview-section {
                padding: 25px 15px;
            }
            
            .section-title {
                font-size: 22px;
            }
            
            .preview-section {
                position: static;
            }
        }
        
        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.1);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--gradient-2);
            border-radius: 3px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary);
        }

        /* Стил за навигација */
        nav ul {
            list-style: none;
            display: flex;
            gap: 15px;
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
            top: 30px;
            left: 0;
            background: #fff;
            border: 1px solid #ccc;
            padding: 12px;
            width: 220px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.15);
            z-index: 100;
            border-radius: 8px;
        }

        .how-it-works-item:hover .how-it-works-block {
            display: block;
        }

        .how-it-works-block ol {
            margin: 0;
            padding-left: 18px;
        }

        .how-it-works-block li {
            margin-bottom: 6px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<!-- Header Section -->
<header>
    <div class="header-content">
        <div class="logo">
            <i class="fas fa-heart"></i>
            PET HEART
        </div>
        <nav>
            <ul>
                <li><a href="<?php echo BASE_URL; ?>/home/index">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>/meet/index">Meet Buddy</a></li>
                <li><a href="<?php echo BASE_URL; ?>/contact/index">Contact</a></li>
                <li class="how-it-works-item">
                    <a href="#">How It Works</a>
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
</header>

<!-- Hero Section -->
<div class="container">
    <div class="hero">
        <h1>Find a Loving Home for Your Pet</h1>
        <p>Join thousands of pet owners who have found the perfect forever homes for their beloved companions through our trusted adoption network.</p>
    </div>
</div>

<div class="container">
    <div class="main-content">
        <!-- Form Section -->
        <div class="form-section">
            <h2 class="section-title">
                <i class="fas fa-plus-circle"></i>
                List Your Pet for Adoption
            </h2>

<form action="" method="post" enctype="multipart/form-data">    
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
            <label for="category">🏷️ Category</label>
            <select id="category" name="category" required>
                <option value="">Select Category</option>
                <option value="dogs">🐕 Dog</option>
                <option value="cats">🐱 Cat</option>
                <option value="chinchillas">🐹 Chinchilla</option>
                <option value="parrots">🦜 Parrot</option>
                <option value="rabbits">🐰 Rabbit</option>
                <option value="hamsters">🐹 Hamster</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="petBreed">🧬 Breed</label>
        <input type="text" id="petBreed" name="petBreed" required placeholder="What breed is your pet?">
    </div>

    <div class="form-group">
        <label for="petDescription">📝 Description</label>
        <textarea id="petDescription" name="petDescription" required placeholder="Tell us about your pet..."></textarea>
    </div>

    <div class="form-group">
        <label for="petActivity">⚡ Activity Level</label>
        <select id="petActivity" name="petActivity">
            <option value="">Select Activity Level</option>
            <option value="low">🐌 Low</option>
            <option value="moderate">🚶 Moderate</option>
            <option value="high">🏃 High</option>
        </select>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="petVaccination">💉 Vaccinated</label>
            <select id="petVaccination" name="petVaccination">
                <option value="yes">✅ Yes</option>
                <option value="no">❌ No</option>
                <option value="partial">⏳ Partially</option>
            </select>
        </div>
        <div class="form-group">
            <label for="ownerName">👤 Owner Name</label>
            <input type="text" id="ownerName" name="ownerName" required placeholder="Your full name">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="country">🌍 Country</label>
            <input type="text" id="country" name="country" required placeholder="Country">
        </div>
        <div class="form-group">
            <label for="city">🏙️ City</label>
            <input type="text" id="city" name="city" required placeholder="City">
        </div>
    </div>

    <div class="form-group">
        <label>📸 Upload Pet Photo</label>
        <div class="file-upload-wrapper" onclick="document.getElementById('petImage').click()">
            <div class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></div>
            <div class="upload-text">Click to upload or drag and drop</div>
            <div class="upload-subtext">PNG, JPG up to 10MB</div>
            <input type="file" id="petImage" name="petImage" accept="image/*">
        </div>
    </div>

    <button type="submit" name="submit" class="btn">
        <i class="fas fa-heart"></i> Find My Pet a New Home
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
                    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); text-align:center; color:white;">
                        <i class="fas fa-camera" style="font-size:40px; margin-bottom:8px;"></i>
                        <p style="font-size:14px;">Upload a photo to see preview</p>
                    </div>
                </div>
                <div class="pet-info">
                    <h3 class="pet-name" id="previewName">Your Pet's Name</h3>
                    <div class="pet-details">
                        <div class="pet-detail"><i class="fas fa-birthday-cake"></i><span id="previewAge">Age</span></div>
                        <div class="pet-detail"><i class="fas fa-venus-mars"></i><span id="previewGender">Gender</span></div>
                        <div class="pet-detail"><i class="fas fa-dna"></i><span id="previewBreed">Breed</span></div>
                        <div class="pet-detail"><i class="fas fa-paw"></i><span id="previewCategory">Category</span></div>
                    </div>
                    <div class="pet-description" id="previewDescription">Pet description will appear here as you type...</div>
                </div>
            </div>

            <div class="similar-pets">
                <h3 class="section-title">
                    <i class="fas fa-heart"></i> 
                    Similar Pets Looking for Homes
                </h3>
                <p style="margin-bottom: 15px; opacity: 0.8;">Your pet will appear alongside these adorable friends</p>
                
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
    <span class="notification-text">Your pet has been listed successfully!</span>
</div>

<!-- Loading Animation -->
<div class="loading" id="loading">
    <div class="spinner"></div>
</div>

<!-- Progress Bar -->
<div class="progress-container">
    <div class="progress-bar" id="progressBar"></div>
</div>

    <script>
    // Inputs
    const petNameInput = document.getElementById('petName');
    const petAgeInput = document.getElementById('petAge');
    const petGenderInput = document.getElementById('petGender');
    const petBreedInput = document.getElementById('petBreed');
    const petCategoryInput = document.getElementById('category');
    const petDescriptionInput = document.getElementById('petDescription');
    const petImageInput = document.getElementById('petImage');

    // Preview Elements
    const previewName = document.getElementById('previewName');
    const previewAge = document.getElementById('previewAge');
    const previewGender = document.getElementById('previewGender');
    const previewBreed = document.getElementById('previewBreed');
    const previewCategory = document.getElementById('previewCategory');
    const previewDescription = document.getElementById('previewDescription');
    const previewImage = document.getElementById('previewImage');

    // Update functions
    petNameInput.addEventListener('input', () => {
        previewName.textContent = petNameInput.value || "Your Pet's Name";
    });

    petAgeInput.addEventListener('input', () => {
        previewAge.textContent = petAgeInput.value ? petAgeInput.value + " years" : "Age";
    });

    petGenderInput.addEventListener('change', () => {
        const genderMap = { male: "♂ Male", female: "♀ Female" };
        previewGender.textContent = genderMap[petGenderInput.value] || "Gender";
    });

    petBreedInput.addEventListener('input', () => {
        previewBreed.textContent = petBreedInput.value || "Breed";
    });

    petCategoryInput.addEventListener('change', () => {
        const categoryMap = {
            dogs: "🐕 Dog",
            cats: "🐱 Cat",
            chinchillas: "🐹 Chinchilla",
            parrots: "🦜 Parrot",
            rabbits: "🐰 Rabbit",
            hamsters: "🐹 Hamster"
        };
        previewCategory.textContent = categoryMap[petCategoryInput.value] || "category";
    });

    petDescriptionInput.addEventListener('input', () => {
        previewDescription.textContent = petDescriptionInput.value || "Pet description will appear here as you type...";
    });

    petImageInput.addEventListener('change', () => {
        const file = petImageInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.style.backgroundImage = `url('${e.target.result}')`;
                previewImage.innerHTML = ''; // remove placeholder icon/text
            }
            reader.readAsDataURL(file);
        } else {
            previewImage.style.backgroundImage = '';
            previewImage.innerHTML = `<div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); text-align:center; color:white;">
                                        <i class="fas fa-camera" style="font-size:40px; margin-bottom:8px;"></i>
                                        <p style="font-size:14px;">Upload a photo to see preview</p>
                                      </div>`;
        }
    });
</script>

</body>
</html>

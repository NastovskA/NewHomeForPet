
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetHeart - Find Your Perfect Companion</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/NewHomeForPet/public/assets/css/style.css">
<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --glass-bg: rgba(255, 255, 255, 0.15);
            --glass-border: rgba(255, 255, 255, 0.2);
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            --text-dark: #2c3e50;
            --text-light: #6c757d;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: var(--primary-gradient);
            background-attachment: fixed;
            min-height: 100vh;
        }

        header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo i {
            color: #ff6b9d;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.1);
        }

        nav a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        main {
            padding: 2rem 0;
        }

        .page-title {
            text-align: center;
            margin-bottom: 1.5rem;
            color: white;
            font-size: 2.5rem;
            font-weight: 700;
        }

        .page-subtitle {
            text-align: center;
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
            margin-bottom: 2rem;
            font-weight: 300;
        }

        .filter-section {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.25) 0%, rgba(255, 255, 255, 0.1) 100%);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1), inset 0 1px 0 rgba(255, 255, 255, 0.2);
            margin-bottom: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .filter-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        }

        .filter-title {
            font-size: 1.5rem;
            color: white;
            margin-bottom: 1.8rem;
            text-align: center;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            letter-spacing: 0.5px;
        }

        .filter-title i {
            font-size: 1.3rem;
            color: #ff6b9d;
            filter: drop-shadow(0 2px 5px rgba(255, 107, 157, 0.3));
        }

        .filter-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            align-items: end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .form-group label {
            margin-bottom: 0.8rem;
            font-weight: 600;
            color: white;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
            letter-spacing: 0.3px;
        }

        .form-group label i {
            font-size: 0.9rem;
            color: #ff6b9d;
            filter: drop-shadow(0 1px 2px rgba(255, 107, 157, 0.3));
        }

        .form-group input,
        .form-group select {
            padding: 1rem 1.2rem;
            border: none;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.95);
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            background: white;
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15), 0 0 0 3px rgba(255, 107, 157, 0.2);
            border: 1px solid rgba(255, 107, 157, 0.4);
        }

        .form-group input::placeholder {
            color: #999;
            font-weight: 400;
        }

        .age-range {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.8rem;
        }

        .filter-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            grid-column: 1 / -1;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary {
            background: var(--secondary-gradient);
            color: white;
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .results-info {
            background: rgba(76, 175, 80, 0.2);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            text-align: center;
            font-weight: 500;
            font-size: 0.95rem;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(76, 175, 80, 0.3);
        }

        .animals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .animal-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .animal-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .animal-image {
            width: 100%;
            height: 200px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(45deg, #667eea, #764ba2);
        }

        .animal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .animal-card:hover .animal-image img {
            transform: scale(1.05);
        }

        .emoji {
            font-size: 4rem;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .status-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255, 255, 255, 0.95);
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 10;
        }

        .status-available {
            color: #27ae60;
        }

        .status-adopted {
            color: #e74c3c;
        }

        .animal-info {
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.05);
        }

        .animal-name {
            font-size: 1.4rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
            text-align: center;
        }

        .animal-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.8rem;
            margin-bottom: 1rem;
        }

        .detail-item {
            background: rgba(255, 255, 255, 0.9);
            padding: 0.6rem;
            border-radius: 8px;
            text-align: center;
        }

        .detail-label {
            font-size: 0.75rem;
            color: var(--text-light);
            text-transform: uppercase;
            font-weight: 600;
        }

        .detail-value {
            font-size: 0.95rem;
            color: var(--text-dark);
            font-weight: 700;
            margin-top: 0.3rem;
        }

        .animal-location {
            background: rgba(255, 255, 255, 0.9);
            padding: 0.6rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            text-align: center;
            color: var(--text-dark);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .animal-description {
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 1rem;
            line-height: 1.5;
            font-size: 0.85rem;
        }

        .animal-features {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .feature-tag {
            background: var(--secondary-gradient);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 15px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .no-results {
            text-align: center;
            padding: 3rem 2rem;
            color: white;
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 15px;
        }

        .no-results h3 {
            margin-bottom: 1rem;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .no-results p {
            font-size: 1rem;
            opacity: 0.9;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .pagination a,
        .pagination span {
            padding: 0.6rem 1rem;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .pagination a:hover {
            background: var(--secondary-gradient);
            transform: translateY(-1px);
        }

        .pagination .current {
            background: var(--secondary-gradient);
        }

        footer {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: 2rem;
        }

        .footer-content {
            font-size: 0.9rem;
        }

        .footer-content p:first-child {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .footer-content p:last-child {
            opacity: 0.8;
            font-style: italic;
        }

        @media (max-width: 768px) {
            .filter-form {
                grid-template-columns: 1fr;
            }
            
            .animals-grid {
                grid-template-columns: 1fr;
            }
            
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }
            
            nav ul {
                flex-wrap: wrap;
                justify-content: center;
                gap: 1rem;
            }
            
            .page-title {
                font-size: 2rem;
            }
            
            .filter-buttons {
                flex-direction: column;
            }

            .logo {
                font-size: 1.5rem;
            }

            .container {
                padding: 0 10px;
            }

            .animal-details {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .animals-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .animal-image {
                height: 180px;
            }

            .animal-info {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <div class="header-content">
            <a href="<?= BASE_URL ?>/home" class="logo">
                <i class="fas fa-heart"></i>
                PET HEART
            </a>
            <nav>
                <ul>
                    <li><a href="<?= BASE_URL ?>/home"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="<?= BASE_URL ?>/about"><i class="fas fa-info-circle"></i> About</a></li>
                    <li><a href="<?= BASE_URL ?>/contact"><i class="fas fa-envelope"></i> Contact</a></li>
                    <li><a href="<?= BASE_URL ?>/give"><i class="fas fa-paw"></i> New Home</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>


    <main>
        <div class="container">
            <h1 class="page-title">Find Your Perfect Companion</h1>
            <div class="page-subtitle">Every pet deserves a loving home, and every heart deserves a loyal friend</div>
            

                     <!-- Filter Section -->
            <div class="filter-section">
                <div class="filter-title">
                    <i class="fas fa-search"></i>
                    Discover Your Ideal Pet Match
                </div>

                <form method="GET" action="" class="filter-form">
                    <div class="form-group">
                        <label for="category">
                            <i class="fas fa-paw"></i>
                            Animal Type
                        </label>
                        <select name="category" id="category">
                            <option value="">All Types</option>
                            <?php foreach ($animal_types as $type): ?>
                                <option value="<?= htmlspecialchars($type) ?>" 
                                        <?= $category === $type ? 'selected' : '' ?>>
                                    <?= ucfirst(htmlspecialchars($type)) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="pol">
                            <i class="fas fa-venus-mars"></i>
                            Gender
                        </label>
                        <select name="pol" id="pol">
                            <option value="">Any Gender</option>
                            <option value="male" <?= $pol === 'male' ? 'selected' : '' ?>>Male</option>
                            <option value="female" <?= $pol === 'female' ? 'selected' : '' ?>>Female</option>
                        </select>
                    </div>

                    
                    <div class="form-group">
                        <label>
                            <i class="fas fa-birthday-cake"></i>
                            Age Range
                        </label>
                        <div class="age-range">
                            <input type="number" name="min_age" placeholder="Min age" 
                                   value="<?= htmlspecialchars($min_age) ?>" min="0" max="30">
                            <input type="number" name="max_age" placeholder="Max age" 
                                   value="<?= htmlspecialchars($max_age) ?>" min="0" max="30">
                        </div>
                    </div>

<div class="form-group">
    <label for="country">
        <i class="fas fa-globe"></i>
        Country
    </label>
    <select name="country" id="country">
        <option value="">Any Country</option>
        <?php foreach ($countries as $c): ?>
            <option value="<?= htmlspecialchars($c) ?>" 
                <?= ($country === $c) ? 'selected' : '' ?>>
                <?= htmlspecialchars($c) ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

                    <div class="filter-buttons">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                            Find My Match
                        </button>
                        <a href="?" class="btn btn-secondary">
                            <i class="fas fa-redo"></i>
                            Clear All
                        </a>
                    </div>
                </form>
            </div>

            <!-- Results Info -->
            <div class="results-info">
                <i class="fas fa-chart-bar"></i>
                Showing <?= count($animals) ?> of <?= $total_records ?> amazing pets waiting for love
                <?php if (!empty($category) || !empty($pol) || !empty($min_age) || !empty($max_age)): ?>
                    (filtered results)
                <?php endif; ?>
            </div>

            <!-- Animals Grid -->
            <?php if (empty($animals)): ?>
                <div class="no-results">
                    <h3><i class="fas fa-heart-broken"></i> No buddies found</h3>
                    <p>Try adjusting your filters to discover more amazing pets waiting for their forever home!</p>
                </div>
            <?php else: ?>
                <div class="animals-grid">
                    <?php foreach ($animals as $animal): ?>
                        <div class="animal-card">
                            <div class="animal-image">
                                <?php if (!empty($animal['images_url'])): ?>
                                   <?php
                                    $image = trim($animal['images_url']); // исчисти празни места

                                    // Ако е целосен URL (http или https) – користи го директно
                                    if (preg_match('/^https?:\/\//', $image)) {
                                        $imgSrc = $image;
                                    } 
                                    // Ако е локална слика
                                    else {
                                        // Прво пробуваме да ја најдеме во директната патека од базата
                                        $localPath = "/NewHomeForPet/" . $image;
                                        if (file_exists(__DIR__ . '/../../' . $image)) {
                                            $imgSrc = $localPath;
                                        } 
                                        // Ако не постои таму, пробуваме во uploads/
                                        else {
                                            $imgSrc = "/NewHomeForPet/uploads/" . basename($image);
                                        }
                                    }
                                    ?>


                                    <img src="<?= htmlspecialchars($imgSrc) ?>" alt="<?= htmlspecialchars($animal['name']) ?>">
                                <?php else: ?>
                                    <div class="emoji">
                                        <?php
                                        $emoji_map = [
                                            'dogs' => '🐕',
                                            'cats' => '🐱',
                                            'rabbits' => '🐰',
                                            'parrots' => '🦜',
                                            'hamsters' => '🐹',
                                            'chinchillas' => '🐭'
                                        ];
                                        echo $emoji_map[$animal['category']] ?? '🐾';
                                        ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            
                            <!-- <div class="status-badge <?= $animal['adopted'] ? 'status-adopted' : 'status-available' ?>">
                                <?= $animal['adopted'] ? 'Adopted' : 'Available' ?>
                            </div> -->
                            
                            <div class="animal-info">
                                <h3 class="animal-name"><?= htmlspecialchars($animal['name']) ?></h3>
                                
                                <div class="animal-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <?= htmlspecialchars($animal['city'] ?? 'Unknown') ?>, <?= htmlspecialchars($animal['country'] ?? 'Unknown') ?>
                                </div>
                                
                                <div class="animal-details">
                                    <div class="detail-item">
                                        <div class="detail-label"><i class="fas fa-paw"></i> Type</div>
                                        <div class="detail-value"><?= ucfirst(htmlspecialchars($animal['category'])) ?></div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label"><i class="fas fa-birthday-cake"></i> Age</div>
                                        <div class="detail-value"><?= htmlspecialchars($animal['age']) ?> years</div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label"><i class="fas fa-venus-mars"></i> Gender</div>
                                        <div class="detail-value">
                                            <?php 
                                            $gender_display = [
                                                'maski' => 'Male',
                                                'zenski' => 'Female'
                                            ];
                                            echo $gender_display[$animal['pol']] ?? ucfirst(htmlspecialchars($animal['pol']));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="detail-item">
                                        <div class="detail-label"><i class="fas fa-dna"></i> Breed</div>
                                        <div class="detail-value"><?= htmlspecialchars($animal['breed']) ?></div>
                                    </div>
                                </div>
                                
                                <div class="animal-features">
                                    <?php if (!empty($animal['activity'])): ?>
                                        <span class="feature-tag">
                                            <i class="fas fa-running"></i>
                                            <?= htmlspecialchars($animal['activity']) ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if ($animal['vakcinirano']): ?>
                                        <span class="feature-tag">
                                            <i class="fas fa-shield-alt"></i>
                                            Vaccinated
                                        </span>
                                    <?php endif; ?>
                                </div>
                                
<a href="/NewHomeForPet/meet/show?id=<?= $animal['id'] ?>&type=<?= $animal['category'] ?>" 
   class="btn btn-primary" style="width: 100%; justify-content: center;">
    <i class="fas fa-heart"></i>
    Meet <?= htmlspecialchars($animal['name']) ?>
</a>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

              <!-- Pagination -->
                <?php if ($total_pages > 1): ?>
                    <div class="pagination">
                        <!-- Previous Page -->
                        <?php if ($page > 1): ?>
                            <a href="?<?= http_build_query(array_merge($_GET, ['page' => $page - 1])) ?>">
                                <i class="fas fa-chevron-left"></i> Previous
                            </a>
                        <?php endif; ?>

                        <!-- Page Numbers -->
                        <?php
                        $start_page = max(1, $page - 2);
                        $end_page = min($total_pages, $page + 2);
                        
                        if ($start_page > 1): ?>
                            <a href="?<?= http_build_query(array_merge($_GET, ['page' => 1])) ?>">1</a>
                            <?php if ($start_page > 2): ?>
                                <span>...</span>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                            <?php if ($i == $page): ?>
                                <span class="current"><?= $i ?></span>
                            <?php else: ?>
                                <a href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>"><?= $i ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($end_page < $total_pages): ?>
                            <?php if ($end_page < $total_pages - 1): ?>
                                <span>...</span>
                            <?php endif; ?>
                            <a href="?<?= http_build_query(array_merge($_GET, ['page' => $total_pages])) ?>"><?= $total_pages ?></a>
                        <?php endif; ?>

                        <!-- Next Page -->
                        <?php if ($page < $total_pages): ?>
                            <a href="?<?= http_build_query(array_merge($_GET, ['page' => $page + 1])) ?>">
                                Next <i class="fas fa-chevron-right"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
    
 <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Simple hover effects for cards
            const cards = document.querySelectorAll('.animal-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Handle image loading errors
            const images = document.querySelectorAll('.animal-image img');
            images.forEach(img => {
                img.addEventListener('error', function() {
                    this.style.display = 'none';
                    const placeholder = this.nextElementSibling;
                    if (placeholder && placeholder.classList.contains('emoji')) {
                        placeholder.style.display = 'flex';
                    }
                });

                img.addEventListener('load', function() {
                    this.style.opacity = '1';
                });
            });

            // Smooth focus effects for form elements
            const inputs = document.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.transform = 'translateY(-1px)';
                    this.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.15)';
                });
                
                input.addEventListener('blur', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'none';
                });
            });
        });
    </script>
</body>
</html>
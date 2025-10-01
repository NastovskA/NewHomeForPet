<?php
// views/home/index.php
require_once __DIR__ . '/../partials/header.php';

require_once 'models/FactModel.php';
$factModel = new FactModel();
$allFacts = $factModel->getAllFacts();
$jsonFacts = json_encode($allFacts);
?>

<section id="hero" class="hero">
    <div class="hero-content">
        <h1>Every Heart Deserves Love</h1>
        <p class="hero-subtitle">
            Unleash love at first click—where playful paws meet powerful code to spark lifelong companionship.
        </p>
        
        <div class="pet-fact-banner">
            <div class="floating-particles">
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
            </div>
            
            <div class="fact-header">
                <i class="fas fa-paw fact-icon"></i>
                <h3 class="fact-title">Pet Wisdom</h3>
                <i class="fas fa-heart fact-icon"></i>
            </div>
            
            <div class="fact-content">
                <p id="petFact" data-facts="<?php echo htmlspecialchars($jsonFacts, ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($randomFact); ?>
                </p>
            </div>
            
            <button class="refresh-fact-btn" onclick="showRandomFact()">
                <i class="fas fa-magic btn-icon"></i>
                <span>Discover Amazing Fact</span>
            </button>

        </div>

    </div>

    <div class="pets-section" id="pets">
        <div class="pets-carousel">
            <div class="pets-track" id="pets-track">
                <?php if (!empty($pets)): ?>
                    <?php foreach ($pets as $pet): ?>
                        <?php 
                        $genderClass = isset($pet['gender']) && strtolower($pet['gender']) === 'female' ? 'female' : 'male';
                        $imagePath = isset($pet['images_url']) ? $pet['images_url'] : 'public/assets/images/default-pet.jpg';
                        
                        if (strpos($pet['images_url'], 'sliki_chinchillas/') === 0 || 
                            strpos($pet['images_url'], 'parrots/') === 0 || 
                            strpos($pet['images_url'], 'rabbits/') === 0 || 
                            strpos($pet['images_url'], 'hamsters/') === 0 || 
                            strpos($pet['images_url'], 'uploads/') === 0) {
                            $imagePath = BASE_URL . "/{$pet['images_url']}";
                        }
                        ?>
<div class="pet-card">
    <img src="<?php echo $imagePath; ?>" alt="<?php echo htmlspecialchars($pet['name']); ?>" class="pet-image" onerror="this.src='<?php echo BASE_URL; ?>/public/assets/images/default-pet.jpg'">
    <div class="pet-info">
        <div class="pet-name"><?php echo htmlspecialchars($pet['name']); ?></div>
        <div class="pet-badges">
            <?php if (isset($pet['gender'])): ?>
                <span class="pet-badge gender-badge <?php echo $genderClass; ?>"><?php echo $pet['gender']; ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>


                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="error-message">No pets available at the moment.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

 <button class="theme-toggle" id="themeToggle" onclick="toggleTheme()" aria-label="Toggle dark/light mode">
 <i class="fas fa-moon" id="themeIcon"></i>
 </button>
</section>

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

<?php include 'views/mapa.php'; ?>

<script>
var initialFact = "<?php echo addslashes($randomFact); ?>";
</script>


<script>
function toggleTheme() {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    
    document.documentElement.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
}

const savedTheme = localStorage.getItem('theme') || 'light';
document.documentElement.setAttribute('data-theme', savedTheme);
</script>



<?php
require_once __DIR__ . '/../partials/footer.php';
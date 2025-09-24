<?php
// views/about/index.php
require_once __DIR__ . '/../partials/header.php';
?>

<div class="background-elements">
    <div class="bg-circle bg-circle-1"></div>
    <div class="bg-circle bg-circle-2"></div>
    <div class="bg-circle bg-circle-3"></div>
</div>

<nav class="navbar" id="navbar">
    <div class="nav-container">
        <a href="<?php echo BASE_URL; ?>/home/index" class="logo">
            <span class="logo-icon">🐾</span>
            <span>PetHeart</span>
        </a>
        <div class="nav-links">
            <a href="<?php echo BASE_URL; ?>/home/index" class="nav-link">Home</a>
            <a href="<?php echo BASE_URL; ?>/about/index" class="nav-link nav-link--active">About us</a>
            <a href="<?php echo BASE_URL; ?>/contact/index" class="nav-link">Contact</a>
            <a href="<?php echo BASE_URL; ?>/auth/login" class="nav-link nav-link--primary">Log in</a>
            <a href="<?php echo BASE_URL; ?>/auth/register" class="nav-link nav-link--secondary">Sign up</a>
        </div>
    </div>
</nav>

<main class="main-content">
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Our Passion for Pets Connects the World</h1>
            <h1 class="hero-subtitle">🐾 PetHeart – Every Pet Deserves a Home 🐾</h1>
            <p class="hero-subtitle">
                Join the world's caring community where love meets adoption. At PetHeart, we connect pets in need with families ready to give them a forever home. Because adoption is not just about saving lives – it's about creating unbreakable bonds.
            </p>
        </div>
    </section>

    <section class="story-section">
        <div class="section-container">
            <h2 class="section-title">Our Journey</h2>
            
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
            <div class="team-grid">
                <div class="team-member">
                <div class="member-avatar">
                    <img src="<?php echo BASE_URL; ?>/public/assets/images/monika.png" alt="Dr. Monika Stoilkovska" />
                </div>
                <h3 class="member-name">Dr. Monika Stoilkovska</h3>
                <div class="member-role">Co-Founder & Chief Veterinary Officer</div>
                <p class="member-description">
                    Dr. Monika Stoilkovska brings over 15 years of expertise in small animal medicine. She oversees all veterinary content and initiatives, ensuring that every recommendation and resource provided by PetHeart is scientifically accurate and prioritizes pet health.
                </p>
            </div>

            <div class="team-member">
                <div class="member-avatar">
                    <img src="<?php echo BASE_URL; ?>/public/assets/images/marko.png" alt="Marko Porjazoski" />
                </div>
                <h3 class="member-name">Marko Porjazoski</h3>
                <div class="member-role">Chief Technology Officer</div>
                <p class="member-description">
                    Marko Porjazoski is the technical architect behind PetHeart’s innovative platform. As a full-stack developer, he designs scalable and user-friendly systems, ensuring the platform runs smoothly and reliably for every member.
                </p>
            </div>

            <div class="team-member">
                <div class="member-avatar">
                    <img src="<?php echo BASE_URL; ?>/public/assets/images/bojana.png" alt="Bojana Velickovska" />
                </div>
                <h3 class="member-name">Bojana Velickovska</h3>
                <div class="member-role"> Community Director</div>
                <p class="member-description">
                    Bojana Velickovska combines expertise in digital marketing with a passion for community engagement. She develops strategies to connect members, cultivate a supportive environment, and strengthen PetHeart’s online presence.
                </p>
            </div>

            <div class="team-member">
                <div class="member-avatar">
                    <img src="<?php echo BASE_URL; ?>/public/assets/images/slika_angela.png" alt="Dr. Angela Nastovska" />
                </div>
                <h3 class="member-name">Dr. Angela Nastovska</h3>
                <div class="member-role">Co-Founder & Product Experience Lead</div>
                <p class="member-description">
                    Dr. Angela Nastovska leads product vision and user experience at PetHeart. She ensures the platform remains intuitive, engaging, and safe, translating member needs into innovative and effective solutions.
                </p>
            </div>

            </div>
        </div>
    </section>

</main>

<?php
require_once __DIR__ . '/../partials/footer.php';
?>
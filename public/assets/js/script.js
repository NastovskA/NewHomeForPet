// Global variables
let allPets = [];
let currentPets = [];
let currentFactIndex = -1;
let allFacts = []; // Array to store all available facts

// Initialize the page
document.addEventListener('DOMContentLoaded', function() {
    initializePage();
    
    // If pets are not loaded via PHP, load them via AJAX
    if (typeof pets === 'undefined') {
        loadPetsFromDatabase();
    } else {
        allPets = pets;
        currentPets = pets;
    }
    
    // Get facts from PHP (passed via data attribute)
    const factContainer = document.getElementById('petFact');
    if (factContainer && factContainer.dataset.facts) {
        try {
            allFacts = JSON.parse(factContainer.dataset.facts);
        } catch (e) {
            console.error('Error parsing facts:', e);
        }
    }
    
    // If we couldn't get facts from data attribute, use the initial fact
    if (allFacts.length === 0 && typeof initialFact !== 'undefined') {
        allFacts = [initialFact];
    }
    
    // Show initial fact after page loads
    setTimeout(() => {
        showRandomFact();
    }, 1000);
});

// Show random pet fact
function showRandomFact() {
    const factElement = document.getElementById("petFact");
    const button = document.querySelector('.refresh-fact-btn');
    
    // If we don't have facts, try to get them from the data attribute
    if (allFacts.length === 0) {
        if (factElement && factElement.dataset.facts) {
            try {
                allFacts = JSON.parse(factElement.dataset.facts);
            } catch (e) {
                console.error('Error parsing facts:', e);
            }
        }
        
        // If still no facts, show a default message
        if (allFacts.length === 0) {
            factElement.textContent = "No facts available at the moment.";
            return;
        }
    }
    
    // Add loading animation
    button.classList.add('loading-animation');
    factElement.style.opacity = '0.5';
    
    // Get a random fact that's different from the current one
    let newIndex;
    if (allFacts.length === 1) {
        newIndex = 0; // Only one fact available
    } else {
        do {
            newIndex = Math.floor(Math.random() * allFacts.length);
        } while (newIndex === currentFactIndex);
    }
    
    currentFactIndex = newIndex;
    const newFact = allFacts[currentFactIndex];
    
    // Update the fact with animation
    setTimeout(() => {
        factElement.textContent = newFact;
        factElement.classList.add('fact-appear');
        factElement.style.opacity = '1';
        
        // Remove loading animation
        button.classList.remove('loading-animation');
        
        // Remove animation class after animation completes
        setTimeout(() => {
            factElement.classList.remove('fact-appear');
        }, 600);
    }, 300);
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

// Load pets from database via AJAX
async function loadPetsFromDatabase() {
    try {
        const response = await fetch(`${BASE_URL}/home/getPets`);
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
    petsTrack.style.animation = 'infiniteScroll 300s linear infinite';
}

function createPetCard(pet) {
    const genderClass = pet.gender && pet.gender.toLowerCase() === 'female' ? 'female' : 'male';
    
    let imagePath = `${BASE_URL}/public/assets/images/default-pet.jpg`; // fallback
    if (pet.images_url) {
        // Adjust path for specific directories
        if (pet.images_url.startsWith('sliki_chinchillas/') || 
            pet.images_url.startsWith('parrots/') || 
            pet.images_url.startsWith('rabbits/') || 
            pet.images_url.startsWith('hamsters/')  || 
            pet.images_url.startsWith('uploads/')) {
            imagePath = `${BASE_URL}/${pet.images_url}`;
        } else {
            // For other pets use the URL from database directly
            imagePath = pet.images_url;
        }
    }

    return `
        <div class="pet-card" onclick="showPetDetails(${pet.id})">
            <img src="${imagePath}" alt="${pet.name}" class="pet-image" onerror="this.src='${BASE_URL}/public/assets/images/default-pet.jpg'">
            <div class="pet-info">
                <div class="pet-name">${pet.name || 'Unknown'}</div>
                <div class="pet-badges">
                    ${pet.gender ? `<span class="pet-badge gender-badge ${genderClass}">${pet.gender}</span>` : ''}
                </div>
            </div>
        </div>
    `;
}

// Show pet details (redirect to pet details page)
function showPetDetails(petId) {
    window.location.href = `${BASE_URL}/pet/details/${petId}`;
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
            alert('Contact functionality coming soon!');
        });
    }

    // Pause animation on hover for pets carousel
    const petsTrack = document.getElementById('pets-track');
    if (petsTrack) {
        petsTrack.addEventListener('mouseenter', () => {
            petsTrack.style.animationPlayState = 'paused';
        });
        petsTrack.addEventListener('mouseleave', () => {
            petsTrack.style.animationPlayState = 'running';
        });
    }
}
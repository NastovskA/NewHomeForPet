// Global variables
let allPets = [];
let currentPets = [];
let currentFactIndex = -1;
let allFacts = []; 

document.addEventListener('DOMContentLoaded', function() {
    initializePage();
    
    if (typeof pets === 'undefined') {
        loadPetsFromDatabase();
    } else {
        allPets = pets;
        currentPets = pets;
    }
    
    const factContainer = document.getElementById('petFact');
    if (factContainer && factContainer.dataset.facts) {
        try {
            allFacts = JSON.parse(factContainer.dataset.facts);
        } catch (e) {
            console.error('Error parsing facts:', e);
        }
    }
    
    if (allFacts.length === 0 && typeof initialFact !== 'undefined') {
        allFacts = [initialFact];
    }
    
    setTimeout(() => {
        showRandomFact();
    }, 1000);
});

function showRandomFact() {
    const factElement = document.getElementById("petFact");
    const button = document.querySelector('.refresh-fact-btn');
    
    if (allFacts.length === 0) {
        if (factElement && factElement.dataset.facts) {
            try {
                allFacts = JSON.parse(factElement.dataset.facts);
            } catch (e) {
                console.error('Error parsing facts:', e);
            }
        }
        
        if (allFacts.length === 0) {
            factElement.textContent = "No facts available at the moment.";
            return;
        }
    }
    
    button.classList.add('loading-animation');
    factElement.style.opacity = '0.5';
    
    let newIndex;
    if (allFacts.length === 1) {
        newIndex = 0; 
    } else {
        do {
            newIndex = Math.floor(Math.random() * allFacts.length);
        } while (newIndex === currentFactIndex);
    }
    
    currentFactIndex = newIndex;
    const newFact = allFacts[currentFactIndex];
    
    setTimeout(() => {
        factElement.textContent = newFact;
        factElement.classList.add('fact-appear');
        factElement.style.opacity = '1';
        
        button.classList.remove('loading-animation');
        
        setTimeout(() => {
            factElement.classList.remove('fact-appear');
        }, 600);
    }, 300);
}

function initializePage() {
    createBubbles();
    
    initScrollEffects();
    
    initStatsAnimation();
    
    initInteractiveElements();
}

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

function displayPets(pets) {
    const petsTrack = document.getElementById('pets-track');

    if (!pets || pets.length === 0) {
        petsTrack.innerHTML = '<div class="error-message">No pets available at the moment.</div>';
        return;
    }

    petsTrack.innerHTML = '';

    const petCards = pets.map(pet => createPetCard(pet)).join('');

    petsTrack.innerHTML = petCards + petCards;

    petsTrack.style.animation = 'none';
    petsTrack.offsetHeight; 
    petsTrack.style.animation = 'infiniteScroll 300s linear infinite';
}

function createPetCard(pet) {
    const genderClass = pet.gender && pet.gender.toLowerCase() === 'female' ? 'female' : 'male';
    
    let imagePath = `${BASE_URL}/public/assets/images/default-pet.jpg`; 
    if (pet.images_url) {
        if (pet.images_url.startsWith('sliki_chinchillas/') || 
            pet.images_url.startsWith('parrots/') || 
            pet.images_url.startsWith('rabbits/') || 
            pet.images_url.startsWith('hamsters/')  || 
            pet.images_url.startsWith('uploads/')) {
            imagePath = `${BASE_URL}/${pet.images_url}`;
        } else {
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

function showPetDetails(petId) {
    window.location.href = `${BASE_URL}/pet/details/${petId}`;
}

function displayError(message) {
    const petsTrack = document.getElementById('pets-track');
    petsTrack.innerHTML = `<div class="error-message">${message}</div>`;
}


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

    for (let i = 0; i < 15; i++) {
        createBubble();
    }

    setInterval(createBubble, 2000);
}

function initScrollEffects() {
    window.addEventListener('scroll', () => {
        const header = document.getElementById('main-header');
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

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

function initInteractiveElements() {
    const fabButton = document.getElementById('fab-button');
    if (fabButton) {
        fabButton.addEventListener('click', () => {
            alert('Contact functionality coming soon!');
        });
    }

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
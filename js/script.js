// ArsiRAB Tulungagung - Frontend JavaScript
// ============================================

// ============================================
// NAVBAR SCROLL EFFECT
// ============================================
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('shadow-2xl', 'bg-white');
        navbar.classList.remove('bg-white/95');
    } else {
        navbar.classList.remove('shadow-2xl', 'bg-white');
        navbar.classList.add('bg-white/95');
    }
});

// ============================================
// SMOOTH SCROLL FOR NAVIGATION LINKS
// ============================================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            const navbarHeight = document.getElementById('navbar').offsetHeight;
            const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - navbarHeight;
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
            
            // Close mobile menu after clicking
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                const icon = document.getElementById('mobile-menu-button').querySelector('i');
                icon.className = 'fas fa-bars text-2xl';
            }
        }
    });
});

// ============================================
// MOBILE MENU TOGGLE
// ============================================
const mobileMenuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');

if (mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener('click', function(e) {
        e.stopPropagation();
        mobileMenu.classList.toggle('hidden');
        
        // Change hamburger icon to X when menu is open
        const icon = this.querySelector('i');
        if (mobileMenu.classList.contains('hidden')) {
            icon.className = 'fas fa-bars text-2xl';
        } else {
            icon.className = 'fas fa-times text-2xl';
        }
    });

    // Close mobile menu when clicking on a link
    document.querySelectorAll('#mobile-menu a').forEach(link => {
        link.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
            const icon = mobileMenuButton.querySelector('i');
            icon.className = 'fas fa-bars text-2xl';
        });
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
            mobileMenu.classList.add('hidden');
            const icon = mobileMenuButton.querySelector('i');
            icon.className = 'fas fa-bars text-2xl';
        }
    });

    // Close mobile menu on window resize to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 1024) {
            mobileMenu.classList.add('hidden');
            const icon = mobileMenuButton.querySelector('i');
            icon.className = 'fas fa-bars text-2xl';
        }
    });
}

// ============================================
// SCROLL REVEAL ANIMATION
// ============================================
function revealOnScroll() {
    const reveals = document.querySelectorAll('.fade-in, .fade-in-left, .fade-in-right, .scale-in');
    
    reveals.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const elementBottom = element.getBoundingClientRect().bottom;
        const windowHeight = window.innerHeight;
        
        // Trigger animation when element is 80% visible
        if (elementTop < windowHeight * 0.8 && elementBottom > 0) {
            element.classList.add('active');
        }
    });
}

// Initialize scroll reveal
window.addEventListener('scroll', revealOnScroll);
window.addEventListener('load', revealOnScroll);
document.addEventListener('DOMContentLoaded', revealOnScroll);

// ============================================
// LAZY LOADING IMAGES
// ============================================
if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src || img.src;
                img.classList.add('loaded');
                observer.unobserve(img);
            }
        });
    });

    document.querySelectorAll('img').forEach(img => {
        imageObserver.observe(img);
    });
}

// ============================================
// WHATSAPP FLOAT BUTTON ANIMATION
// ============================================
const waFloat = document.querySelector('.wa-float');
if (waFloat) {
    let lastScrollTop = 0;
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > lastScrollTop && scrollTop > 300) {
            // Scrolling down - hide button
            waFloat.style.transform = 'translateY(150px)';
        } else {
            // Scrolling up - show button
            waFloat.style.transform = 'translateY(0)';
        }
        
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    }, false);
}

// ============================================
// STATS COUNTER ANIMATION
// ============================================
function animateCounter(element, target, duration = 2000) {
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current) + '+';
    }, 16);
}

// Trigger counter animation when stats section is visible
const statsCounters = document.querySelectorAll('.stats-counter');
if (statsCounters.length > 0) {
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                statsCounters.forEach(counter => {
                    const text = counter.textContent.replace(/[^0-9]/g, '');
                    const target = parseInt(text);
                    if (!isNaN(target)) {
                        animateCounter(counter, target);
                    }
                });
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    const statsSection = statsCounters[0].closest('section');
    if (statsSection) {
        statsObserver.observe(statsSection);
    }
}

// ============================================
// DEBOUNCE FUNCTION
// ============================================
function debounce(func, wait = 10) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// ============================================
// BROWSER COMPATIBILITY CHECK
// ============================================
if (!window.CSS || !CSS.supports('backdrop-filter', 'blur(10px)')) {
    // Fallback for browsers that don't support backdrop-filter
    document.querySelectorAll('[style*="backdrop-filter"]').forEach(el => {
        el.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
    });
}

// ============================================
// ACCESSIBILITY ENHANCEMENTS
// ============================================
document.querySelectorAll('a, button').forEach(element => {
    element.addEventListener('keypress', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            this.click();
        }
    });
});

// Focus trap for mobile menu
if (mobileMenu) {
    mobileMenu.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !this.classList.contains('hidden')) {
            this.classList.add('hidden');
            mobileMenuButton.querySelector('i').className = 'fas fa-bars text-2xl';
            mobileMenuButton.focus();
        }
    });
}

// ============================================
// INITIALIZE ON DOM CONTENT LOADED
// ============================================
document.addEventListener('DOMContentLoaded', function() {
    console.log('ArsiRAB Tulungagung - Website Loaded Successfully');
    revealOnScroll();
});
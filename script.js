// DOM Elements
const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
const navLinks = document.querySelector('.nav-links');
const bookingModal = document.getElementById('bookingModal');
const closeModal = document.querySelector('.close-modal');
const closeModalBtn = document.getElementById('closeModalBtn');
const selectedServiceName = document.getElementById('selectedServiceName');
const serviceIframe = document.getElementById('serviceIframe');
const bookAllBtn = document.querySelector('.book-all-btn');

// Set up event listeners
// Mobile menu toggle
mobileMenuBtn.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    if (navLinks.classList.contains('active')) {
        navLinks.style.display = 'flex';
        navLinks.style.flexDirection = 'column';
        navLinks.style.position = 'absolute';
        navLinks.style.top = '100%';
        navLinks.style.left = '0';
        navLinks.style.right = '0';
        navLinks.style.backgroundColor = 'var(--white)';
        navLinks.style.padding = '20px';
        navLinks.style.boxShadow = 'var(--shadow)';
        navLinks.style.gap = '15px';
    } else {
        navLinks.style.display = 'none';
    }
});

// Service booking buttons
document.querySelectorAll('.book-service-btn').forEach(button => {
    button.addEventListener('click', () => {
        const service = button.dataset.service;
        const simplybookUrl = button.dataset.simplybookUrl || 'https://styledbyenny.simplybook.me/v2/#book'; // Fallback
        selectedServiceName.textContent = service;
        serviceIframe.src = simplybookUrl;
        bookingModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    });
});

// Book all services button (scrolls to main widget)
bookAllBtn?.addEventListener('click', (e) => {
    e.preventDefault();
    document.querySelector('#booking').scrollIntoView({ behavior: 'smooth' });
});

// Modal close buttons
closeModal.addEventListener('click', () => {
    bookingModal.style.display = 'none';
    document.body.style.overflow = 'auto';
    serviceIframe.src = ''; // Reset iframe to avoid memory issues
});

closeModalBtn.addEventListener('click', () => {
    bookingModal.style.display = 'none';
    document.body.style.overflow = 'auto';
    serviceIframe.src = '';
});

// Close modal when clicking outside
window.addEventListener('click', (e) => {
    if (e.target === bookingModal) {
        bookingModal.style.display = 'none';
        document.body.style.overflow = 'auto';
        serviceIframe.src = '';
    }
});

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', (e) => {
        e.preventDefault();
        const target = document.querySelector(anchor.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            // Close mobile menu if open
            if (window.innerWidth <= 768 && navLinks.classList.contains('active')) {
                navLinks.classList.remove('active');
                navLinks.style.display = 'none';
            }
        }
    });
});

// Close mobile menu when clicking outside
document.addEventListener('click', (e) => {
    if (window.innerWidth <= 768 && 
        navLinks.classList.contains('active') && 
        !e.target.closest('.navbar')) {
        navLinks.classList.remove('active');
        navLinks.style.display = 'none';
    }
});

// Handle window resize
window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
        navLinks.classList.remove('active');
        navLinks.style.display = 'flex';
        navLinks.style.flexDirection = 'row';
        navLinks.style.position = 'static';
        navLinks.style.backgroundColor = 'transparent';
        navLinks.style.padding = '0';
        navLinks.style.boxShadow = 'none';
    } else if (!navLinks.classList.contains('active')) {
        navLinks.style.display = 'none';
    }
});

// Admin Dashboard Link (show if authenticated)
const adminLink = document.querySelector('.admin-link');
if (localStorage.getItem('isAdmin')) {
    adminLink.style.display = 'block';
    adminLink.addEventListener('click', (e) => {
        e.preventDefault();
        window.open('https://secure.simplybook.me/v2/admin', '_blank'); // Replace with your SimplyBook.me admin URL
    });
}
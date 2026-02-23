/**
 * Public Panel JavaScript
 * Bootstrap 5 initialization and custom functionality
 * No dependencies on Vite, Tailwind, or Alpine JS
 */

// DOM Ready
document.addEventListener('DOMContentLoaded', function() {
  initializeNavbar();
  initializeTooltips();
  initializeSmoothScroll();
  initializeAnimations();
});

/**
 * Initialize navbar functionality
 */
function initializeNavbar() {
  const navbar = document.querySelector('.navbar');
  if (!navbar) return;

  // Add scroll effect
  window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {
      navbar.classList.add('navbar-scrolled');
    } else {
      navbar.classList.remove('navbar-scrolled');
    }
  });

  // Close navbar on link click
  const navbarLinks = document.querySelectorAll('.navbar-collapse a');
  navbarLinks.forEach(link => {
    link.addEventListener('click', function() {
      const navbarToggle = document.querySelector('.navbar-toggler');
      const navbarCollapse = document.querySelector('.navbar-collapse');
      
      if (navbarCollapse.classList.contains('show')) {
        navbarToggle.click();
      }
    });
  });
}

/**
 * Initialize Bootstrap tooltips
 */
function initializeTooltips() {
  const tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  
  tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
}

/**
 * Smooth scroll behavior
 */
function initializeSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      
      if (href === '#') return;
      
      e.preventDefault();
      
      const target = document.querySelector(href);
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });
}

/**
 * Initialize scroll animations for cards
 */
function initializeAnimations() {
  const cards = document.querySelectorAll('.card, .service-card, .project-card');
  
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  });
  
  cards.forEach(card => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(20px)';
    card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(card);
  });
}

/**
 * Handle contact form submission
 */
function handleContactForm() {
  const form = document.querySelector('form[action*="contact"]');
  if (!form) return;

  form.addEventListener('submit', function(e) {
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;

    requiredFields.forEach(field => {
      if (!field.value.trim()) {
        isValid = false;
        field.classList.add('is-invalid');
      } else {
        field.classList.remove('is-invalid');
      }
    });

    if (!isValid) {
      e.preventDefault();
    }
  });
}

// Initialize contact form when page loads
document.addEventListener('DOMContentLoaded', handleContactForm);

/**
 * Utility function to add active class to current navbar link
 */
function updateActiveNavLink() {
  const currentPath = window.location.pathname;
  const navLinks = document.querySelectorAll('.nav-link');
  
  navLinks.forEach(link => {
    const href = link.getAttribute('href');
    if (href && currentPath.includes(href.replace('/', ''))) {
      link.classList.add('active');
    } else {
      link.classList.remove('active');
    }
  });
}

document.addEventListener('DOMContentLoaded', updateActiveNavLink);

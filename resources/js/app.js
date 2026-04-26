// Laravel/Vite base setup
import './bootstrap';

// Import Alpine.js
import Alpine from 'alpinejs';

// Expose Alpine globally
window.Alpine = Alpine;

// Activate Alpine so x-data, x-show, x-on work in HTML
Alpine.start();

// ---- Import custom UI modules ----

// Theme switching (day/night mode + persistence)
import './theme-switcher';
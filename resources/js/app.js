// Laravel/Vite base setup
import './bootstrap';

// Import Alpine.js
import Alpine from 'alpinejs';

// Expose Alpine globally
window.Alpine = Alpine;


// ---- Import custom UI modules ----

// Theme switching (day/night mode + persistence)
import './theme-switcher';

// Sidebar behaviour
import './sidebar';


// ----- Activate Alpine so x-data, x-show, x-on work in HTML ----
Alpine.start();
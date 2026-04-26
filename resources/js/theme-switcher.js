const root = document.documentElement;

function loadTheme() {
    // Get saved theme
    const savedTheme = localStorage.getItem("theme");
    // If saved theme exists, apply it
    if (savedTheme) {
        root.setAttribute("data-theme", savedTheme);
    } 
    else {
        // If not, default to day/night based on time
        const hour = new Date().getHours();
        const theme = hour >= 18 || hour < 6 ? "night" : "day";
        root.setAttribute("data-theme", theme);
    }
}

// Save and apply a theme
function setTheme(theme) {
    localStorage.setItem("theme", theme);
    root.setAttribute('data-theme', theme);
}

// Toggle theme via button click
const toggleBtn = document.getElementById('theme-toggle');
if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
        const currentTheme = root.getAttribute('data-theme');
        setTheme(currentTheme === 'day' ? 'night' : 'day');
    });
}

// Initialize theme
loadTheme();
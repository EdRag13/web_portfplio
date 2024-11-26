// Hozzáférés a theme-link elemhez és a gombhoz
const themeLink = document.getElementById('theme-link');
const toggleButton = document.getElementById('theme-toggle');

// Ellenőrizzük a helyi tárban tárolt témát
let currentTheme = localStorage.getItem('theme') || 'light';
setTheme(currentTheme);

// Gombra kattintás eseményfigyelő
toggleButton.addEventListener('click', () => {
    // Válogatás a témák között
    currentTheme = currentTheme === 'light' ? 'dark' : 'light';
    setTheme(currentTheme);

    // Tárolás a helyi tárban
    localStorage.setItem('theme', currentTheme);
});

// Téma beállítása
function setTheme(theme) {
    if (theme === 'dark') {
        themeLink.href = 'style1.css';
        toggleButton.textContent = 'Light_Mode';
    } else {
        themeLink.href = 'style2.css';
        toggleButton.textContent = 'Dark_Mode';
    }
}
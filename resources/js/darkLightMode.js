function updateTheme() {
    const toggleBtn = document.getElementById("themeToggle");
    const icon = document.getElementById("themeIcon");
    const html = document.documentElement;
    const themeToggleLabel = document.getElementById("themeToggleLabel");
    const navLogo = document.getElementById("navLogo");

    // 1. FIRST: Apply the saved theme from memory (localStorage)
    // This fixes the bug where it reverts to dark mode after clicking a tab
    if (localStorage.getItem("theme") === "light") {
        html.classList.add("light");
    } else {
        html.classList.remove("light");
    }

    // 2. SECOND: Make sure the Icons, Text, and Logo match the current mode
    if (html.classList.contains("light")) {
        if(icon) icon.classList.replace("hgi-moon-02", "hgi-sun-01");
        if(themeToggleLabel) themeToggleLabel.textContent = "Light Mode";
        if(navLogo) navLogo.src = navLogo.dataset.light;
    } else {
        if(icon) icon.classList.replace("hgi-sun-01", "hgi-moon-02");
        if(themeToggleLabel) themeToggleLabel.textContent = "Dark Mode";
        if(navLogo) navLogo.src = navLogo.dataset.dark;
    }

    // 3. THIRD: Set up the click event for the toggle button
    if (toggleBtn) {
        toggleBtn.onclick = () => {
            html.classList.toggle("light");

            // Save the new choice and update the UI
            if (html.classList.contains("light")) {
                localStorage.setItem("theme", "light");
                if(icon) icon.classList.replace("hgi-moon-02", "hgi-sun-01");
                if(themeToggleLabel) themeToggleLabel.textContent = "Light Mode";
                if(navLogo) navLogo.src = navLogo.dataset.light;
            } else {
                localStorage.setItem("theme", "dark");
                if(icon) icon.classList.replace("hgi-sun-01", "hgi-moon-02");
                if(themeToggleLabel) themeToggleLabel.textContent = "Dark Mode";
                if(navLogo) navLogo.src = navLogo.dataset.dark;
            }
        };
    }
}

// These lines make sure everything runs when you first arrive or change pages
document.addEventListener('DOMContentLoaded', updateTheme);
document.addEventListener('livewire:navigated', updateTheme);
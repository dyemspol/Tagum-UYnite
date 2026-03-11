const toggleBtn = document.getElementById("themeToggle");
const icon = document.getElementById("themeIcon");
const html = document.documentElement;
const themeToggleLabel = document.getElementById("themeToggleLabel");
// Sync icon state on page load
if (html.classList.contains("light")) {
    icon.classList.replace("hgi-moon-02", "hgi-sun-01");
  
} else {
    icon.classList.replace("hgi-sun-01", "hgi-moon-02");
   
}

toggleBtn.addEventListener("click", () => {
    html.classList.toggle("light");

    if (html.classList.contains("light")) {
        icon.classList.replace("hgi-moon-02", "hgi-sun-01");
        localStorage.setItem("theme", "light");
         themeToggleLabel.textContent = "Light Mode";
    } else {
        icon.classList.replace("hgi-sun-01", "hgi-moon-02");
        localStorage.setItem("theme", "dark");
          themeToggleLabel.textContent = "Dark Mode";
    }
});
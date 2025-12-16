const notifContainer = document.getElementById("notificationModal");
const notifClose = document.getElementById("closeModalBtn");
const notifLink = document.getElementById("notifLink");

if (notifLink) {
    notifLink.addEventListener("click", () => {
        notifContainer.classList.remove("hidden");
        notifContainer.classList.add("flex");
        profilesidebar.classList.remove("flex");
        profilesidebar.classList.add("hidden");
    });
}

if (notifClose) {
    notifClose.addEventListener("click", () => {
        notifContainer.classList.add("hidden");
        notifContainer.classList.remove("flex");
    });
}

if (notifContainer) {
    notifContainer.addEventListener("click", (e) => {
        if (e.target === notifContainer) {
            notifContainer.classList.add("hidden");
            notifContainer.classList.remove("flex");
        }
    });
}

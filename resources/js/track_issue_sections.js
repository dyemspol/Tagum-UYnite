const activeIssuesSection = document.getElementById("activeIssuesSection");
const scheduledSection = document.getElementById("scheduledSection");
const historySection = document.getElementById("historySection");

const activeIssueNavigation = document.getElementById("activeIssueNavigation");
const scheduledNavigation = document.getElementById("scheduledNavigation");
const historyNavigation = document.getElementById("historyNavigation");

activeIssuesSection.classList.remove("hidden");
scheduledSection.classList.add("hidden");
historySection.classList.add("hidden");
activeIssueNavigation.classList.add("text-blue-500");
// Show Active Issues
activeIssueNavigation.addEventListener("click", () => {
    activeIssuesSection.classList.remove("hidden");
    scheduledSection.classList.add("hidden");
    historySection.classList.add("hidden");
    activeIssueNavigation.classList.add("text-blue-500");
    scheduledNavigation.classList.remove("text-blue-500");
    historyNavigation.classList.remove("text-blue-500");
});

// Show Scheduled
scheduledNavigation.addEventListener("click", () => {
    activeIssuesSection.classList.add("hidden");
    scheduledSection.classList.remove("hidden");
    historySection.classList.add("hidden");
    activeIssueNavigation.classList.remove("text-blue-500");
    scheduledNavigation.classList.add("text-blue-500");
    historyNavigation.classList.remove("text-blue-500");
});

// Show History
historyNavigation.addEventListener("click", () => {
    activeIssuesSection.classList.add("hidden");
    scheduledSection.classList.add("hidden");
    historySection.classList.remove("hidden");
    activeIssueNavigation.classList.remove("text-blue-500");
    scheduledNavigation.classList.remove("text-blue-500");
    historyNavigation.classList.add("text-blue-500");
});

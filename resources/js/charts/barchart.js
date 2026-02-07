import Chart from "chart.js/auto";

document.addEventListener("DOMContentLoaded", () => {
    const ctx = document.getElementById("issuesBarChart");

    if (!ctx) return;

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Road", "Power", "Water", "Garbage", "Flood"],
            datasets: [
                {
                    label: "Issues by Category",
                    data: [12, 19, 8, 15, 6],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            scales: {
                x: { ticks: { color: "white" } },
                y: { ticks: { color: "white" }, beginAtZero: true },
            },
            plugins: {
                legend: { labels: { color: "white" } },
            },
        },
    });
});

// Define the boundaries for Tagum City (South-West and North-East coordinates)
const tagumBounds = [
    [7.3500, 125.7000], // South-West
    [7.5500, 125.9500]  // North-East
];

// Initialize map with restrictions
const map = L.map("map", {
    center: [7.4477, 125.8094],
    zoom: 14,
    minZoom: 12,           // Prevents zooming out too far
    maxBounds: tagumBounds, // Fences the user inside Tagum
    maxBoundsViscosity: 1.0 // Makes the edges "hard" (bounces back immediately)
});

// Green Topographical Map Tiles (OpenTopoMap)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19
}).addTo(map);

// Marker icons by status
const icons = {
    Resolved: L.icon({
        iconUrl:
            "https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png",
        shadowUrl:
            "https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png",
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41],
    }),
    Ongoing: L.icon({
        iconUrl:
            "https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-yellow.png",
        shadowUrl:
            "https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png",
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41],
    }),
    Issue: L.icon({
        iconUrl:
            "https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png",
        shadowUrl:
            "https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png",
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41],
    }),
};

const issues = window.reportsData || [];
issues.forEach((report) => {
    // Determine the status color
    let statusLabel = report.report_status; // e.g., "Pending", "Ongoing"
    let icon = icons.Issue; // Default
    if (statusLabel === 'in_review') icon = icons.Ongoing;
    if (statusLabel === 'resolved') icon = icons.Resolved;
    L.marker([report.latitude, report.longitude], { icon: icon })
        .addTo(map)
        .bindPopup(
            `<b>Issue:</b> ${report.title}<br>` +
            `<b>Status:</b> ${statusLabel}<br>` +
            `<b>Location:</b> ${report.address_details ?? 'N/A'}<br>` +
            `<a href="/tracker?id=${report.id}" class="text-blue-500 font-bold hover:underline">View Details →</a>`
        );
});

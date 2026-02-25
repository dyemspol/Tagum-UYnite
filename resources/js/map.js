// Define the boundaries for Tagum City (South-West and North-East coordinates)
const tagumBounds = [
    [7.35, 125.7], // South-West
    [7.55, 125.95], // North-East
];

// Initialize map with restrictions
const map = L.map("map", {
    center: [7.4477, 125.8094],
    zoom: 14,
    minZoom: 12, // Prevents zooming out too far
    maxBounds: tagumBounds, // Fences the user inside Tagum
    maxBoundsViscosity: 1.0, // Makes the edges "hard" (bounces back immediately)
});

// Street Map (OpenStreetMap)
var street = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "&copy; OpenStreetMap contributors",
});

// Satellite (Esri World Imagery)
var satellite = L.tileLayer(
    "https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}",
    { attribution: "Tiles &copy; Esri" },
);

// Topographic (OpenTopoMap)
var topo = L.tileLayer("https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png", {
    maxZoom: 17,
    attribution:
        "Map data: &copy; OpenStreetMap contributors, SRTM | Map style: &copy; OpenTopoMap",
});

// Humanitarian (HOT OSM)
var humanitarian = L.tileLayer(
    "https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png",
    {
        attribution: "&copy; OpenStreetMap contributors, Humanitarian",
    },
);

// Dark Mode (CartoDB Dark Matter)
var dark = L.tileLayer(
    "https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png",
    {
        attribution:
            '&copy; <a href="https://www.openstreetmap.org/copyright">OSM</a> &copy; CARTO',
        subdomains: "abcd",
        maxZoom: 19,
    },
);

// --- Add default layer to display immediately ---
street.addTo(map);

// --- Layer Control ---
L.control
    .layers({
        "Street Map": street,
        Satellite: satellite,
        Topographic: topo,

        Humanitarian: humanitarian,
        "Dark Mode": dark,
    })
    .addTo(map);
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
    if (statusLabel === "in_review") icon = icons.Ongoing;
    if (statusLabel === "resolved") icon = icons.Resolved;
    L.marker([report.latitude, report.longitude], { icon: icon })
        .addTo(map)
        .bindPopup(
            `<b>Issue:</b> ${report.title}<br>` +
                `<b>Status:</b> ${statusLabel}<br>` +
                `<b>Location:</b> ${report.address_details ?? "N/A"}<br>` +
                `<a href="/tracker?id=${report.id}" class="text-blue-500 font-bold hover:underline">View Details →</a>`,
        );
});

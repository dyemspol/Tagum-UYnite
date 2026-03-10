// Define the boundaries for Tagum City
const tagumBounds = [
    [7.35, 125.7], // South-West
    [7.55, 125.95], // North-East
];

// --- Tile Layers ---
const street = L.tileLayer(
    "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
    {
        attribution: "&copy; OpenStreetMap contributors",
    },
);

const satellite = L.tileLayer(
    "https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}",
    { attribution: "Tiles &copy; Esri" },
);

const dark = L.tileLayer(
    "https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png",
    {
        attribution: "&copy; CARTO",
        subdomains: "abcd",
        maxZoom: 19,
    },
);

// --- Initialize Map ---
const map = L.map("map", {
    center: [7.4477, 125.8094],
    zoom: 14,
    minZoom: 12,
    maxBounds: tagumBounds,
    maxBoundsViscosity: 1.0,
    layers: [dark], // Default layer
    zoomControl: true,
    attributionControl: false,
});

// --- Layer Selection ---
L.control
    .layers({
        "Dark Mode": dark,
        "Street View": street,
        "Satellite View": satellite,
    })
    .addTo(map);

// --- Marker Branding ---
const icons = {
    Resolved: L.icon({
        iconUrl:
            "https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png",
        shadowUrl:
            "https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png",
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
    }),
    Ongoing: L.icon({
        iconUrl:
            "https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-yellow.png",
        shadowUrl:
            "https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png",
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
    }),
    Issue: L.icon({
        iconUrl:
            "https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png",
        shadowUrl:
            "https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png",
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
    }),
};

// --- Populate Markers ---
const reports = window.reportsData || [];

reports.forEach((report) => {
    let statusLabel = report.report_status;
    let icon = icons.Issue; // Default

    if (statusLabel === "in_review") icon = icons.Ongoing;
    if (statusLabel === "resolved") icon = icons.Resolved;

    L.marker([report.latitude, report.longitude], { icon: icon }).addTo(map)
        .bindPopup(`
            <div class="p-1">
                <h4 class="text-sm font-bold text-white mb-1">${report.title}</h4>
                <p class="text-[10px] text-gray-400 mb-2 font-medium uppercase tracking-tight">${statusLabel.replace("_", " ")}</p>
                <div class="h-[1px] bg-gray-700/50 mb-2"></div>
                <a href="/tracker?id=${report.id}" class="text-[11px] font-bold text-[#00d4aa] hover:text-[#00e6b8] flex items-center gap-1 transition-colors">
                    View Full Details
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>
        `);
});

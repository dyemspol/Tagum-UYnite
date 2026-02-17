// Initialize map centered on Tagum City
const map = L.map("map").setView([7.1907, 125.4553], 13);

// Dark theme tiles
L.tileLayer("https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png", {
    attribution: "&copy; OSM &copy; CARTO",
    subdomains: "abcd",
    maxZoom: 19,
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

// Hard-coded issues array
const issues = [
    {
        lat: 7.442412,
        lng: 125.774738,
        status: "Issue",
        issue: "Electric Outage",
        reportedBy: "Juan Dela Cruz",
        date: "Feb 15, 2026",
    },
    {
        lat: 7.450123,
        lng: 125.765432,
        status: "Ongoing",
        issue: "Water Pipe Leakage",
        reportedBy: "Maria Santos",
        date: "Feb 16, 2026",
    },
    {
        lat: 7.438567,
        lng: 125.770987,
        status: "Resolved",
        issue: "Blackout",
        reportedBy: "Khristan Divv",
        date: "Feb 12, 2026",
    },
    {
        lat: 7.445678,
        lng: 125.779012,
        status: "Ongoing",
        issue: "Street Light Failure",
        reportedBy: "Alfred Reyes",
        date: "Feb 17, 2026",
    },
    {
        lat: 7.439876,
        lng: 125.766543,
        status: "Issue",
        issue: "Traffic Light Malfunction",
        reportedBy: "Lisa Gomez",
        date: "Feb 18, 2026",
    },
];

// Add markers with popup info
issues.forEach((loc) => {
    const icon = icons[loc.status]; // choose icon based on status

    L.marker([loc.lat, loc.lng], { icon: icon })
        .addTo(map)
        .bindPopup(
            `<b>Status:</b> ${loc.status}<br>` +
            `<b>Issue:</b> ${loc.issue}<br>` +
            `<b>Reported by:</b> ${loc.reportedBy}<br>` +
            `<b>Date:</b> ${loc.date}<br>` +
            `<b>Coordinates:</b> ${loc.lat.toFixed(5)}, ${loc.lng.toFixed(5)}`,
        );
});

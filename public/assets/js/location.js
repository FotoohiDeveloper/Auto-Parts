var map = L.map("map").setView([51.505, -0.09], 13);
var tiles = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: 19,
    attribution: "<a>Ali</a>",
}).addTo(map);
var latlngs = [
    [45.51, -122.68],
    [37.77, -122.43],
    [34.04, -118.2],
];

var polyline = L.polyline(latlngs, {
    color: "red",
}).addTo(map);

// zoom the map to the polyline
map.fitBounds(polyline.getBounds());

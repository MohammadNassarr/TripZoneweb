<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" 
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
 integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" 
 crossorigin=""></script>

<style>
    #map{
        height:350px;
    }
</style>
</head>
<body>
    <h1>map<h1>
        <div id="map"></div>
</body>
<script>

var map=L.map('map');
map.setView([51.505, -0.09], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);

navigator.geolocation.watchPosition(success, error);

let marker, circle, zoomed;


function success(pos){
const lat = pos.coords.latitude;
const lng = pos.coords.longitude;
const accuracy =pos.coords.accuracy;

if(marker){
    map.removeLayer(marker);
    map.removeLayer(circle);
}

marker= L.marker([lat,lng]).addTo(map);
circle = L.circle([lat,lng], {radius: accuracy}).addTo(map);


if(!zoomed){
    zoomed = map.fitBounds(circle.getBounds());
}
map.setView([lat, lng]);

}


function error(err) {
    if(err.code === 1){
        alert("Please allow geolocation access");
    } else {
        alert("Cannot get current location");
    }
}


</script>
</html>
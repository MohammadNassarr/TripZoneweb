<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <style>
        #map{
            height: 350px;
        }
    </style>
</head>
<body>
    <h1>Map</h1>
    <div id="map"></div>

    <script>
        var map = L.map('map'); // Initialize Leaflet map without setting the view initially
        var marker, circle, zoomed;

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        // Make a request to ipinfo.io API to get location based on IP address
        fetch('https://ipinfo.io/json?token=6c543afdbef4ef')
            .then(response => response.json())
            .then(data => {
                const [lat, lng] = data.loc.split(',').map(parseFloat); // Extract latitude and longitude from API response
                const accuracy = 1000; // You can set the accuracy as needed
                if (marker) {
                    map.removeLayer(marker);
                    map.removeLayer(circle);
                    
                }
                marker = L.marker([lat, lng]).addTo(map);
                circle = L.circle([lat, lng], { radius: accuracy }).addTo(map);
                if (!zoomed) {
                    zoomed = map.setView([lat, lng], 13); // Set the map view to the retrieved location
                }
            })
            .catch(error => {
                console.error('Error fetching IP information:', error);
                alert("Cannot get current location");
            });

    </script>
</body>
</html>

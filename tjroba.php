<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Google Maps Nearby Places</title>
    <!-- Include Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxqXy-3XZs29_z6Mdk679OouONXVbsV1g&libraries=places"></script>
    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include your JavaScript code -->
    <script>
        var map;
        var myLatLng;

        $(document).ready(function(){
            geoLocationInit();

            function geoLocationInit() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(success, fail);
                } else {
                    alert("Browser not supported !");
                }
            }

            function success(position) {
                console.log(position);
                var latval = position.coords.latitude;
                var lngval = position.coords.longitude;

                myLatLng = new google.maps.LatLng(latval, lngval);
                createMap(myLatLng);
                nearbySearch(myLatLng, "restaurant");
            }

            function fail() {
                alert('Geolocation failed');
            }

            function createMap(myLatLng) {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: myLatLng,
                    zoom: 12
                });

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map
                });
            }

            function nearbySearch(myLatLng, type) {
                var request = {
                    location: myLatLng,
                    radius: '2500',
                    types: [type]
                };

                var service = new google.maps.places.PlacesService(map); // Define service here
                function performSearch() {
                    service.nearbySearch(request, callback);
                }

                performSearch(); // Call the performSearch function

                function callback(results, status) {
                    if (status == google.maps.places.PlacesServiceStatus.OK) {
                        for (var i = 0; i < results.length; i++) {
                            var place = results[i];
                            var latlng = place.geometry.location;
                            var name = place.name;
                            createMarker(latlng, name);
                        }
                    }
                }
            }

            function createMarker(latlng, name) {
                var marker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    title: name
                });
            }

        });
    </script>
</head>
<body>
    <h1>Google Maps Nearby Places</h1>
    <div id="map" style="height: 400px; width: 100%;"></div>
</body>
</html>

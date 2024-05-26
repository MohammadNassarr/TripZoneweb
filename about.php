<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
<meta name="viewport"
content="width=device-width.initial-scale=1">
    <title>Nearest Addresses</title>
    <link rel="stylesheet" type="text/css" href="tripzone.css" >
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxqXy-3XZs29_z6Mdk679OouONXVbsV1g&libraries=places"></script>
    <script>
        var map;
        var service;
        var infowindow;
        var userLocation;

        function initMap() {
            infowindow = new google.maps.InfoWindow();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    map = new google.maps.Map(document.getElementById('map'), {
                        center: userLocation,
                        zoom: 15
                    });

                }, function () {
                    handleLocationError(true, infowindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infowindow, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infowindow, userLocation) {
            infowindow.setPosition(userLocation);
            infowindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infowindow.open(map);
        }

        function findNearestPlaces() {
            
            var selectedInterest = document.getElementById('interest').value;
            var selectedDistance = document.getElementById('distance').value;

            var request = {
                location: userLocation,
                radius: selectedDistance,
                type: [selectedInterest]
            };

            service = new google.maps.places.PlacesService(map);
            service.nearbySearch(request, function(results, status) {
                
                    var addresses = results.map(function(result) {
                       
                        return result.vicinity;
                        
                    });
                    localStorage.setItem("addresses", JSON.stringify(addresses));
                    localStorage.setItem("userLocation", JSON.stringify(userLocation));
                    localStorage.setItem("selectedDistance", selectedDistance);
                   
                    window.location.href = "nearest.html";
                
            });
        }
    
    </script>
</head>
<body onload="initMap()">
<h1>Trip Zone</h1>
    <div class="nav-buttons">
        <button class="login"><a href="loginpage.php">Login</a></button>
       <button class="signup"><a href="signup.php">Sign Up</a></button>
        
       
  
 
    </div>

    <nav class="Menu">
        
           <a href="calculator.php" name="calculator">Home</a>
            <a href="services.php" name="services">Your Interest</a>
            <a href="productstore.php">Contact Us</a>
           <a href="aboutus.html">About us</a>

         
          
           

        
        
    </nav>








    <h1>Find Nearest Places</h1>
    <label for="interest">Select Interest:</label>
    <select id="interest">
        <option value="restaurant">Eat</option>
        <option value="cafe">Cafe</option>
        <option value="gym">Sport</option>
    </select>
    <label for="distance">Select Distance (in meters):</label>
    <select id="distance">
        <option value="100">100</option>
        <option value="200">200</option>
        <option value="300">300</option>
        <option value="400">400</option>
        <option value="500">500</option>
        <option value="600">600</option>
        <option value="700">700</option>
        <option value="800">800</option>
    </select>
    <button onclick="findNearestPlaces()">Find Nearest Places</button>
    <div id="map" style="height: 400px; width: 100%;"></div>
</body>
</html>
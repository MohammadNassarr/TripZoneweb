<style>
        #map {
            width: 450px;
            height: 450px;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxqXy-3XZs29_z6Mdk679OouONXVbsV1g&libraries=places"></script>
</head>
<body>
    <input  id="lati" name="latitude" value="">
    <input  id="longi" name="longitude" value="">
    <div id="map"></div>

    <script>
        function showPosition(position){
    document.querySelector('.myForm input[name = "latitude"]').value=position.coords.latitude;
    document.querySelector('.myForm input[name = "longitude"]').value=position.coords.longitude;
}
function initMap() {
            
            var latitude = document.getElementById("lati").value;
            var longitude = document.getElementById("longi").value;
            var chestersLoc = {lat: latitude, lng: longitude};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: chestersLoc
            });

            // Get user's current location and mark it on the map
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var userMarker = new google.maps.Marker({
                        position: userLocation,
                        map: map,
                        title: "Your Location"
                    });
                });
            }
        }
        // Call the initMap function after the page has loaded
        window.onload = initMap;
    </script>
</body>
</html>


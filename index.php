<?php
include "connect.php";
if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];

    $query = "INSERT INTO tb_data VALUES('','$name','$email','$latitude','$longitude')";
    mysqli_query($con, $query);

    echo
    "
    <script>
    alert('Data added Succefully!');
    document.location.href='data.php';
    </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSSERT DATA</title>
    <script>
function initMap() {
    var chestersLoc = {lat: 33.7225, lng: -2.21880075},
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: chestersLoc
        });
    var marker = new google.maps.Marker({
            position: chestersLoc,
            map: map
        });
}

var showPosition = function(position) {
    var userLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
        marker = new google.maps.Marker({
            position: userLatLng,
            title: 'Your Location',
            draggable: true,
            map: map
        });

}

navigator.geolocation.getCurrentPosition(showPosition);</script>
</head>
<body onload="getLocation();">
    <form class="myForm" action="" method="post" autocomplete="off">
        <label for="">Name</label>
        <input type="text" name="name" required value=""><br>
<label for="">Email</label>
<input type="email" name="email" required value=""><br>
<input type="text" name="latitude" value="">
<input type="text" name="longitude" value="">
<button type="submit" name="submit">submit</button>
</form>
<script type="text/javascript">
function getLocation(){
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition,showError);
    }
}

function showPosition(position){
    document.querySelector('.myForm input[name = "latitude"]').value=position.coords.latitude;
    document.querySelector('.myForm input[name = "longitude"]').value=position.coords.longitude;
}
function showError(){
    switch(error.code){
        case error.PERMISSION_DENIED
      
        location.reload();
        break;
    }
}
</script>
<br>
<a href="data.php">Database page</a>
</body>
</html>
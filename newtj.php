
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    
}
function showError(){
    switch(error.code){
        case error.PERMISSION_DENIED
        alert("you must allow the request for geolocetin to fill out the form");
        location.reload();
        break;
    }
}

</script>
<br>
<a href="data.php">Database page</a>
</body>

</html>

<?php

include "connect.php";
if (isset($_POST['submit'])){

$latitude= $_POST["latitude"];
$longitude= $_POST["longitude"];

$query = "INSERT INTO tb_data VALUES('','$latitude','$longitude')";
mysqli_query($con, $query);
header("Location: newww.php?latitude=" . urlencode($latitude) . "&longitude=" . urlencode($longitude));
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Form</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000; /* Change background color to black */
        }
        .container {
            max-width: 600px; /* Increase max-width for a longer box */
            margin: 50px auto;
            padding: 60px; /* Increase padding for more vertical space inside the box */
            background-color: #298b9b; /* Set box color to #298b9b */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 4px solid #298b9b; /* Set border width and color */
        }
        h1 {
            text-align: center;
            color: #fff; /* Set heading color to white */
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #fff; /* Set label color to white */
            text-align: center; /* Center align the labels */
        }
        input[type="text"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: block;
            margin: 0 auto; /* Center align the text inputs */
            text-align: center; /* Center the text within input fields */
        }
        button[type="submit"] {
            background-color: #fff; /* Set background color to white */
            color: #007bff; /* Set text color to blue */
            border: none;
            padding: 8px 16px; /* Decrease padding to make the button smaller */
            border-radius: 4px;
            cursor: pointer;
            display: block;
            width: auto; /* Set width to auto */
            margin: 20px auto 0; /* Center align and adjust margin */
        }
        button[type="submit"]:hover {
            background-color: #eee; /* Change background color on hover */
        }
    </style>
</head>
<body onload="getLocation();">
    <div class="container">
        <h1>Location Form</h1>
        <form class="myForm" action="" method="post" autocomplete="off">
            <label for="latitude">Your Current Latitude:</label>
            <input type="text" name="latitude" id="latitude" value="" readonly>

            <label for="longitude">Your Current Longitude:</label>
            <input type="text" name="longitude" id="longitude" value="" readonly>

            <button type="submit" name="submit">Lets Get My Location</button>
        </form>
    </div>

    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }

        function showPosition(position) {
            const latInput = document.getElementById('latitude');
            const longInput = document.getElementById('longitude');
            latInput.value = position.coords.latitude;
            longInput.value = position.coords.longitude;
        }
    </script>
</body>
</html>

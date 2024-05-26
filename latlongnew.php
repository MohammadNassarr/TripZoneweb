<?php
include "connect.php";

// Function to get the client IP address
function getClientIp() {
    $ipAddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
    } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipAddress = $_SERVER['HTTP_FORWARDED'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ipAddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipAddress = 'UNKNOWN';
    }
    return $ipAddress;
}

if (isset($_POST['submit'])){
    $name= $_POST["name"];
    $email= $_POST["email"];
    $ipAddress = getClientIp(); // Get the IP address
    $latitude= ''; // Since we're not using geolocation, these values will be empty
    $longitude= ''; // They will be populated when showing the result
    $query = "INSERT INTO tb_data VALUES('', '$name', '$email', '$ipAddress', '$latitude', '$longitude')";
    mysqli_query($con, $query);
    header("Location: newnewww.php?latitude=" . urlencode($latitude) . "&longitude=" . urlencode($longitude));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="myForm" action="" method="post" autocomplete="off">
        <label for="">Name</label>
        <input type="text" name="name" required value=""><br>
        <label for="">Email</label>
        <input type="email" name="email" required value=""><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>

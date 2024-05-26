
<?php
include "connect.php";
if (isset($_POST['submit'])) {
       
    $d = $_POST['rating'];
    if (empty($d)) {
        echo '<script type="text/javascript">alert("Please select your rate");window.location.href="feedback.php";</script>';
    } else {
        $sql = "INSERT INTO rating (rating) VALUES ('$d')";
            $result = mysqli_query($con, $sql) or die("mysqli_error($con)");
            echo '<script type="text/javascript">alert("Thank You For Your Rating");window.location.href="feedback.php";</script>';
           
            mysqli_close($con);
        } 
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contactus.FitTrack</title>
    <link rel="stylesheet" href="contactus.css">
    <style>  
   .bod{margin-top: 66px;}
    select{width: 400px;
    height: 80px;} 
    .button{height: 70px;
        width: 30px;


    }
    .header-image {
        float: left; /* Float the image to the left */
        margin-right: 200px; /* Add margin to create space between the image and other content */
   width: 400px;
   height: 160px;
    }
    </style>
</head>
<body>

    <form method="post" action ="feedback.php">
    <h1>FeedBack<br>Give your rate to our website:</h1>
    <div class="contactus">
    <img  src="star-rating.avif" class="header-image">
    <select  name="rating" required class="bod">
            <option value="">Select Rating</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    
    <br><button type="submit" name = "submit" class="button">Submit</button>
</div>
</form>
<div class="footer">

       
            
    <a href="ppc.html">Privacy Policy</a>
   <a href="aboutus.php">about us</a>
  
   <a id="copy" href="home.php">copyright &copy;2023Jaber&Mohammad</a>


</div>
</body>
</html>
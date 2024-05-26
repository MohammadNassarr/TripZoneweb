
<?php
include "connect.php";
if (isset($_POST['submit'])) {
    $id=   
    $h = $_POST['help'];
    $n = $_POST['fullname'];
    $e = $_POST['email'];
    $s = $_POST['thesubject'];
    $d = $_POST['details'];
    if (empty($h) || empty($n) || empty($e) || empty($s) || empty($d)) {
        echo '<script type="text/javascript">alert("Please fill in all fields");window.location.href="contactus.php";</script>';
    } else {
        $sql = "INSERT INTO contactus VALUES ('$h','$n','$e', '$s','$d')";
            $result = mysqli_query($con, $sql) or die("mysqli_error($con)");
            echo '<script type="text/javascript">alert("we received your request we will be in touch shortly!");window.location.href="contactus.php";</script>';
            $result = mysqli_query($con, "INSERT INTO contactus(help, fullname, email, thesubject,details) 
                                          VALUES ('$h','$n','$e', '$s','$d')");
            if (!$result) {
                die('Record not added ...' . mysqli_error($con));
            }
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
    
</head>
<body>
    <form method="post" action ="contactus.php">
    <h1>Contact us<br>Contact the Help Team</h1>
    <div class="contactus">
    <p>What can we help you with?</p>
    <input type="text" name = "help">
    <p>Your name:</p> 
    <input type="text" placeholder="Example mohammad nassar" name = "fullname">
    <p>E-mail address associated with your FitTrack account:</p>
    <input type="email" placeholder="Example@gmail.com" name = "email">
    <p>Subject:</p>
    <input type="text" name = "thesubject">
    <p>Details:</p>
    <input type="text" placeholder="Please write your question or a description of the problem you're trying to solve here" style="padding-bottom: 8.5%;" name = "details">
    <br><button type="submit" name = "submit">Submit</button>
</div>
</form>
<div class="footer">

       
            
    <a href="ppc.html">Privacy Policy</a>
   <a href="aboutus.php">about us</a>
  
   <a id="copy" href="home.php">copyright &copy;2023Jaber&Mohammad</a>


</div>
</body>
</html>
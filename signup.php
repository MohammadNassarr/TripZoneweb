<?php
include "config.php";
define('SALT', 'd#f453dd');
if (isset($_POST['submit'])) {
    $e = $_POST['email'];
    $f = $_POST['fullname'];
    $u = $_POST['username'];
    $p = $_POST['password'];
    $r = $_POST['repass'];

    if (empty($e) || empty($f) || empty($u) || empty($p) || empty($r)) {
        echo '<script type="text/javascript">alert("Please fill in all fields");window.location.href="signup.php";</script>';
    } else {
        if (isStrong($p) && $p == $r) {
            $newP = md5(SALT . $p);
            $sql="INSERT INTO signupp (email,fullname,username,pass) VALUES ('$e','$f','$u', '$newP')";
            $result = mysqli_query($con, $sql) or die("mysqli_error($con)");
            header("location: login.php");
            
            if (!$result) {
                die('Record not added ...' . mysqli_error($con));
            }
            mysqli_close($con);
        } else if (!isStrong($p)) {
            echo '<script type="text/javascript">alert("Weak Password");window.location.href="signup.php";</script>';
        } else if ($p != $r) {
            echo '<script type="text/javascript">alert("Passwords does not match");window.location.href="signup.php";</script>';
        }
    }
}

function isStrong($p)
{
    $strong = false;
    $uppercase = preg_match('@[A-Z]@', $p);
    $lowercase = preg_match('@[a-z]@', $p);
    $number = preg_match('@[0-9]@', $p);
    $specialChars = preg_match('@[^\w]@', $p);
    $c = strlen($p);

    if ($uppercase && $lowercase && $number && $specialChars && $c > 8) {
        $strong = true;
    }
    return $strong;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp.tripzone</title>
    <link rel="stylesheet" href="signup.css">
    
    
</head>

<body>
    <form method="post" action ="signup.php">
    <h1>Take the first step toward a<br>healthier happier life with FitTrack</h1>
    <div class="signup">
        <input type="email" name="email" placeholder="Email address">
        <br><br>
        <input type="text" name="fullname" placeholder="Full Name"><br><br>
        <input type="text" name="username" placeholder="Username"><br><br>
        <input type="password" name="password" id="passwordInput" onkeyup="checkPassword()" placeholder="Password"><br><br>
        <input type = "password" name = "repass" placeholder = "confirm Password">
        <span id="passwordStrength"></span>

  <script>
   
  </script><br>
        <p>By signing up, you agree to our Terms , <span><a href="ppc.html"> Privacy Policy and Cookies
                    Policy.</a></span></p>
        <button type="submit" name="submit">Sign Up</button>
    </div>
    </form>                                                         
</body>

</html>
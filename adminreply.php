

<?php
include "connect.php";
if (isset($_POST['submit'])) {
       
    $reply = $_POST['reply'];
  
        $sql = "INSERT INTO reply (reply) VALUES ('$reply')";
            $result = mysqli_query($con, $sql) or die("mysqli_error($con)");
            echo '<script type="text/javascript">alert("Thank You For Your Reply");window.location.href="adminreply.php";</script>';
           
            mysqli_close($con);
        } 
    



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>adminreply</title>
    <link rel="stylesheet" href="adminreply.css">
   
  </head>
  <body>
    <h1>Contact User</h1>
    <form autocomplete="off" action="" method="post">
      
      <div class="inputs">
     
      <input type="text" name = "reply" placeholder="Reply here..."><br>
      <button 
      onclick="alert('Reply Has Bees Sent Successfully!')" type="submit" name="submit">Submit</button>
   
    </form>
    
    <a href="contactusadmin.php" style="color: rgb(130, 130, 130)">Back to issues page</a>
  </div>
    
  </body>
</html>
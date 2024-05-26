<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
    <link rel="stylesheet" href="contactusadmin.css">
  </head>
  <body>
    <h1>Users Issues</h1>
    <div class="table">
    <table border = 1 style="background-color:whitesmoke;">
      <tr style="background-color: rgb(220, 220, 220);">
        <td style="border: none;color: rgb(130, 130, 130)">#</td>
        <td style="border: none;color: rgb(130, 130, 130)">Help</td>
        <td style="border: none;color: rgb(130, 130, 130)">fullname</td>
        <td style="border: none;color: rgb(130, 130, 130)">email</td>
        <td style="border: none;color: rgb(130, 130, 130)">thesubject</td>
        <td style="border: none;color: rgb(130, 130, 130)">details</td>
        <td style="border: none;color: rgb(130, 130, 130);width:15%;">Action</td>
        
      
    </tr>
    
      <?php
      require 'config.php';
      $rows = mysqli_query($con, "SELECT * FROM contactus");
      $i = 1;
      ?>
      <?php foreach($rows as $row) : ?>
      
        <td><?php echo $i++; ?></td>
        <td style=""><?php echo $row["help"]; ?></td>
        <td><?php echo $row["fullname"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["thesubject"]; ?></td>
        <td><?php echo $row["details"]; ?></td>
        <td style="border: none;"><button style="padding:4%;width: 38%;background-color: rgb(203, 203, 203);border: none;"><a style="text-decoration: none;color: #298b9b;" href="adminreply.php">Reply</a></button></td>
          
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
    <br>

    <a href="adminpage.php" style="color: rgb(130, 130, 130); margin-left: 44%">Back To admin panel</a>
   
    
  </div>
  </body>
</html>
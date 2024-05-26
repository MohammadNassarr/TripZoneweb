<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database page</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxqXy-3XZs29_z6Mdk679OouONXVbsV1g&libraries=places"></script>
</head>
<body>
    <table border=1 cellspacing = 0 cellpadding = 10>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Email</td>
            <td>Maps</td>
        </tr>
        <?php
        include "connect.php";
        $rows = mysqli_query($con,"SELECT * FROM tb_data ORDER BY id DESC");
        $i=1;
        foreach($rows as $row):
        ?>
<tr>
    <td>
        <?php
        echo $i++;
        ?>
        </td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["email"] ?></td>
        <td style="width:450px;height:450px;"><iframe
  width="600"
  height="450"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCoZYufuVfcB7hiQ07uLdUVgvhzP-W7yIY&q=LATITUDE,LONGITUDE" allowfullscreen="" loading="lazy">
</iframe>



</td>
</tr>
        <?php
        endforeach;
        ?>
</table>
    <br>
    <a href="home.php">done</a>
</body>
</html>










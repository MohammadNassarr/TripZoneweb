<?php
define("db_SERVER", "localhost");
define("db_USER","root");
define("db_PASSWORD","");
define("db_DBNAME" , "tripzone");
$con = mysqli_connect(db_SERVER,db_USER , db_PASSWORD, db_DBNAME);
if($con){
   // echo "Connected";
   // echo "<br>";
}
else{
    echo "Not Connected";
}

?>
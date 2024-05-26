<?php
define('SALT', 'd#f453dd');
header("Cache-Control: no-cache, must-validate");
session_start();
if(isset($_POST['login'])){
    $_SESSION['emailsession']=$_POST['email'];
    $_SESSION['passwordsession']=$_POST['password'];
    
    include 'config.php';
    
    if(!$con){
        echo 'error connecting to database';
        exit();
    }

    if(empty($_SESSION['emailsession'])) 
    {echo '<script type="text/javascript">
    alert("Empty email");
    window.location.href="login.php";
    </script>';

    } 
    else if(empty($_SESSION['passwordsession']))
    {echo '<script type="text/javascript">
        alert("Empty password");
        window.location.href="login.php";
        </script>';
    
        }
  
        else 

    {
    mysqli_select_db($con,"tripzone");
    
   $sql="SELECT * from signupp where email='{$_SESSION['emailsession']}'";
   $check=mysqli_query($con,$sql);
           $result=mysqli_fetch_assoc($check);
           
           //on we get the data enterred from user and put them in the 2 variable: $user,$password 
          // $user=$_POST['email'];
           // $password=$_POST['password'];
          
           $username=$result['email'];
          
           
           $savedpass=(int)($encpass=$result['pass']);
           $enteredpass= (int)(md5(SALT.$_SESSION['passwordsession']));
           $_SESSION['idsession']=$result['id'];
           $_SESSION['fullname']=$result['fullname'];
           $_SESSION['admin']=$result['adminn'];
     
    if(mysqli_num_rows($check)==0){ 
        echo '<script type="text/javascript">
        alert("invalid email or password");
        window.location.href="login.php";
        </script>';
        exit(); 
    }

    if(mysqli_num_rows($check)>0){
        
        if($savedpass ==$enteredpass){
            if($result['adminn']=='yes')
        
            {echo '<script type="text/javascript">
            alert("logged in successfully");
            window.location.href="adminpage.php";
            </script>';
            exit();}
      
            else if($result['adminn']=='no'){
                echo '<script type="text/javascript">
                alert("logged in successfully");
                window.location.href="home.php";
                </script>';
                exit();
               }
      
       }
   
   
       else  {echo '<script type="text/javascript">
        alert("Invalid email or password");
        window.location.href="login.php";
        </script>';
          }
   mysqli_close($con);
}}
}
?>
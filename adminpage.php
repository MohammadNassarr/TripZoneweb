<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 24px;
            width: 100%;
        }

        h1 {
            margin: 0;
            font-size: 1.5em;
        }

        nav {
            background-color: #298b9b;
            color: white;
            padding: 20px;
            width: 200px;
            min-height: 100vh;
        }
.image{
   width: 1000px;
}
        nav a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin-bottom: 10px;
            transition: background 0.3s;
        }

        nav a:hover {
            background-color: #949494;
        }

        section {
            padding: 20px;
            flex: 1;
            position: relative;
        }

        .background-container {
            background: url('gymbackground.jpg') center center no-repeat;
            background-size: cover;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .quote {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            font-size: 24px;
            font-style: italic;
            width: 70%;
        }
    </style>
    <script>
        var inactivityTime = 100000; 
        var logoutTimer;

        function resetTimer() {
            clearTimeout(logoutTimer);
            logoutTimer = setTimeout(logout, inactivityTime);
        }

        function logout() {
            window.location.href = "loginpage.php";
        }

        document.addEventListener("mousemove", resetTimer);
        document.addEventListener("keydown", resetTimer);
        resetTimer();
    
        session_start();

       $username =  $_SESSION['fullname'];
       $email = $_SESSION['emailsession'];
       $admin=$_SESSION['admin']
       if ($admin!='yes') {
     
       alert('Please sign in to place an order.'); window.location.href='loginpage.php';
       exit();
}

    </script>
</head>

<body>

<nav>
        <h1>Admin Panel</h1>
        <a href="contactusadmin.php">Contact Us Page</a>
     
       
    </nav>
    <img  src="Openstreetmap_logo.svg" class="image">
    <section>
        <div class="background-container"></div>
    </section>
</body>

</html>

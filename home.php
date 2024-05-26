<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aboutus.Tripzone</title>
    <link rel="stylesheet" href="home.css">
    <style>     
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
        }
        p {
            text-align: center;
            margin-bottom: 20px;
        }
    button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            margin: 20px auto 0;
            transition: background-color 0.3s; /* Add transition effect */
        }
        button:hover {
            background-color: #000;/* Change background color on hover */
        }
        
        .header-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 263px; /* Increase the width of the image */
    height: auto;
    margin-top: 10px;
    margin-left: 81px;
}

    </style>
    
</head>

<body >
<h1>Trip Zone</h1>
    <div class="nav-buttons">
        <button class="login"><a href="login.php">Login</a></button>
       <button class="signup"><a href="signup.php">Sign Up</a></button>
        
       
  
 
    </div>

    <nav class="Menu">
        
           <a href="Home.php" >Home</a>
            <a href="latlong.php" >Your Interest</a>
            <a href="contactus.php">Contact Us</a>
           <a href="aboutus.php">About us</a>

         
          
           

        
        
    </nav>







   
    <div class="aboutus">
    <img  src="Earth_system_sum_parts.jpg.webp" class="header-image">
    <h1>Welcome to TripZone : Our Map Explorer</h1>
        <p>Are you curious about what's around you? Our Map Explorer helps you discover your surroundings with ease.</p>
        <h2>Discover Your Location</h2>
        <p>Our interactive map displays your current location with a marker, making it easy for you to visualize where you are. Whether you're in a bustling city or a quiet neighborhood, our map provides you with valuable information about your surroundings.</p>
        <h2>Find Nearby Places</h2>
        <p>Wondering where to grab a bite to eat or find the nearest coffee shop? Our Map Explorer allows you to search for nearby places of interest, including restaurants, cafes, parks, and more. Explore your options and make the most out of your surroundings.</p>
        <h2>Learn About Your Area</h2>
        <p>Curious about the address of a particular place or want to know more about local landmarks? Our map provides detailed information about points of interest, allowing you to learn more about the area you're in and discover new places to explore.</p>
        <h2>Get Started</h2>
        <p>Ready to start exploring? Simply allow location access, and our Map Explorer will guide you through your surroundings. Whether you're a local looking to discover hidden gems or a traveler exploring a new city, our map is your ultimate companion.</p>
        <button onclick="location.href='latlong.php'">Start Exploring Now</button>
    </div>
</body>

</html>
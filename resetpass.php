
<!DOCTYPE html>
<html lang="en" style="height: 100%;width: 100%;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resetpass.TripZone</title>
    <link rel="stylesheet" href="resetpass.css">
    <link rel="website icon" type="png" href="./logo.webp">
    <script>
        var inactivityTime = 100000; 
        var logoutTimer;

        function resetTimer() {
            clearTimeout(logoutTimer);
            logoutTimer = setTimeout(logout, inactivityTime);
        }

        function logout() {
            // Redirect to the login page
            window.location.href = "loginpage.php";
        }

        // Reset the timer on user activity
        document.addEventListener("mousemove", resetTimer);
        document.addEventListener("keydown", resetTimer);
        resetTimer();
    </script>
</head>

<body style="height: 100%; width: 100%;">
    <h1>TripZone</h1>
    <div class="box" style="background-color: #298b9b;">
       
        <p class="log">Trouble logging in?</p><br>
        <p class="enter">Enter your email, phone, or username and we'll send you a link to get back into your account.</p>
        <input type="email" id="emailInput" placeholder="Email, Phone, or Username">
        <button type="button" onclick="sendButtonClick()">Send</button>
        <p id="errorMessage" style="color: rgb(189, 189, 189); font-size: 1.2vw;"></p>
        <p class="or" style="font-size: 1.2vw;">OR</p>
        <p class="line">_________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________</p>
        <a id="create" href="signup.php">Create new account</a><br><br><br><br><br><br>
        <a id="backlog" href="login.php">Back to login</a>
    </div>

    <script>
        function sendButtonClick() {
            var email = document.getElementById("emailInput").value;
            var errorMessage = document.getElementById("errorMessage");

            if (email.trim() !== "") {
                // Check if the email contains the '@' symbol
                if (email.includes('@')) {
                    // You can perform additional email validation here if needed
                    errorMessage.textContent = "Please check your email to reset your password.";
                } else {
                    errorMessage.textContent = "Please enter a valid email address.";
                }
            } else {
                errorMessage.textContent = "Please enter your email, phone, or username.";
            }
        }
    </script>
 

</body>

</html>



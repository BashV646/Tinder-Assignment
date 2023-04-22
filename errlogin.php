<?php
    session_start();
    if($_SESSION["LOGGED IN"] == "TRUE"){
        header("location: ./profile.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <title>Tinder</title>
    <link href="./Assets/CSS/style_tinder.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>
<body class="container">
    
    <header class="css-header general-header">
        <a href="./index.php">

            <button type="button" class="css-button nav-button back-button">
                Home
            </button>

        </a>

        <a href="./create_account.php">

            <button type="button" class="css-button nav-button create_account_nav-button">
                Create Account
            </button>

        </a>
    </header>

    <hr class="css-hr">

    <br>

    <h1 class="css-body-heading">
        LOGIN TO YOUR ACCOUNT
    </h1>
    <br>

    <div class="css-div login-div">
        <img src="./Assets/Images/logo.jpg">
        <br>
    

        <div class="css-div credentials-div">

            <form method="POST" action="./authentication.php">
                <label for="email" class="css-label email-label">Email</label>
                <input type="email" placeholder="Enter your email" class="css-input email-input" name="email" required>
                <br>
                <label for="password" class="css-label password-label">Password</label>
                <input type="password" placeholder="Enter your password" class="css-input password-input" name="password" required>
                <p class="login-error-message">Wrong or Nonexistant credentials!!</p>
                <button type="submit" class="css-button login-button">
                    Login
                </button>
            </form>

        </div>

    </div>

    <script src="./Assets/JS/script.js">

    </script>
</body>
</html>
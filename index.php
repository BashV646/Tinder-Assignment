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
    
    <header class="css-header css-logo-header">
        <img src="./Assets/Images/logoEdited.png" class="css-logo"><br>
        <h1>Tinder</h1>
    </header>
    <hr class="css-hr">
    <div>
        <h2 class="css-body-heading">
            WHERE YOU MEET YOUR OTHER HALF
        </h2>
        <br>
        <img src="./Assets/Images/homePage.jpg" width="500px" class="css-home-image">
    </div>
    <br>
    <div class="css-div button-div">
        <a href="./login.php">

            <button type="button" class="css-button">
                Login
            </button>

        </a>

        <a href="./create_account.php">

            <button type="button" class="css-button">
                Create Account
            </button>

        </a>
    </div>
    <script src="./Assets/JS/script.js">

    </script>
</body>
</html>
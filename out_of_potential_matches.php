<?php
    session_start();
    if($_SESSION["LOGGED IN"] != "TRUE"){
        header("location: ./index.php");
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

        <a href="./matches_handling.php">

            <button type="button" class="css-button nav-button left-nav-button">
             Matches
            </button>

        </a>

        <a href="./profile.php">

            <button type="button" class="css-button nav-button right-nav-button">
            Profile
            </button>

        </a>

    </header>
    <hr class="css-hr">
    <div class="css-div tinder-div swipe-div-OOPM">

        <div class="css-div">
            <img src="./Assets/Images/dummyimg.png" width="400px" height="500px" class="css-img swipe-img-OOPM">    
        </div>

        <div class="css-div info-div-OOPM">
            <p class="css-OOPM-message">
                Out of Potential Matches!
                <br>
                Come back later to start liking!
            </p>
        </div>

        <div class="css-div interaction-div">
            <button class="css-button dislike-button-OOPM" disabled>
                Dislike
            </button>

            <button class="css-button like-button-OOPM" disabled>
                Like
            </button>
        </div>
    </div>
    
    
    <script src="./Assets/JS/script.js">

    </script>
</body>
</html>
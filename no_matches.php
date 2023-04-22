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
        <a href="./tinder.php">

            <button type="button" class="css-button nav-button left-nav-button">
                 Start Liking
            </button>

        </a>

        <a href="./profile.php">

            <button type="button" class="css-button nav-button right-nav-button">
                Profile
            </button>

        </a>
    </header>
    <hr class="css-hr">
    <div class="css-div tinder-div swipe-div-NM">

        <div class="css-div info-div-NM">
            <p class="css-OOPM-message">
                No Matches Yet!
                <br>
                Start Liking Now To Match!
            </p>
        </div>

    </div>
    
    
    <script src="./Assets/JS/script.js">

    </script>
</body>
</html>
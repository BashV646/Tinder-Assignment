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
        <a href="./profile.php">

            <button type="button" class="css-button nav-button left-nav-button">
                Profile
            </button>

        </a>

        <a href="./tinder.php">

            <button type="button" class="css-button nav-button right-nav-button">
                Start Liking
            </button>

        </a>
    </header>

    <hr class="css-hr">

    <h1 class="css-heading matches-heading">
        Your Matches
    </h1>

    <div class="css-div tinder-div profile-div">
        <div>
                <button type="button" class="css-button nav-button js-match-button">
                    Next Match
                </button>
        </div>
        <div>
            <img src="./uploads/<?php echo($_SESSION["Display_Match_PP"]) ?>" width="450px" height="550px" class="css-img swipe-img">    
        </div>

        <div class="css-div info-div">
            <span class="css-profile-info">
                Name:<?php echo(" ".$_SESSION["Display_Match_Fn"]." ".$_SESSION["Display_Match_Ln"]) ?>
            </span>
            <br>
            <span class="css-profile-info">
                Gender:<?php echo(" ".$_SESSION["Display_Match_Gender"]) ?>
            </span>
            <br>
            <span class="css-profile-info">
                Age:<?php echo(" ".$_SESSION["Display_Match_Age"]) ?>
            </span>
        </div>


    </div>
    <script src="./Assets/JS/script.js">

    </script>
</body>
</html>
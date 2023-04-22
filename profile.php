<?php
    session_start();
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
    <?php
        include("./includes/connection.php");
        if($_SESSION["LOGGED IN"] != "TRUE"){
            header("Location: ./index.php");
        }
    ?>
    <header class="css-header general-header">
        <a href="./tinder.php">

            <button type="button" class="css-button nav-button left-nav-button">
                Start Liking
            </button>
            
        </a>
        <a href="./matches_handling.php">

            <button type="button" class="css-button nav-button middle-nav-button">
                Matches
            </button>
            
        </a>
        <a href="./logout.php">
            
            <button type="button" class="css-button nav-button right-nav-button">
                Log-out
            </button>

        </a>
    </header>
    <hr class="css-hr">

    <div class="css-div tinder-div profile-div">
        <h2 class="css-body-heading profile-heading">
            Profile
        </h2>
        <div class="css-div">
            <?php
                $LoggedID = $_SESSION["ID"];
                $pic_query = "SELECT `ProfilePicture` FROM `users` WHERE users.ID = '$LoggedID'";
                $pic_response = mysqli_query($conn, $pic_query)->fetch_all(MYSQLI_ASSOC);
                $pic_name = $pic_response[0]["ProfilePicture"];
            ?>
            <img src="./uploads/<?php echo ($pic_name);?>" width="500px" height="600px" class="css-img profile-img">    
        </div>

        <div class="css-div info-div">
            <span class="css-profile-info">
                <?php
                    echo("Name:  ".$_SESSION["firstname"]." ". $_SESSION["lastname"]);
                ?>
            </span>
            <br>
            <span class="css-profile-info">
                <?php
                    echo("Gender:  ".$_SESSION["gender"]);
                ?>
                
            </span>
            <br>
            <span class="css-profile-info">
                <?php
                    echo("Age:  ".$_SESSION["age"]);
                ?>
            </span>
            <br>
        </div>

        <form method="POST" action="./upload.php" class="css-form upload-form" enctype="multipart/form-data">
            <label for="profile-pic" class="css-file-label">Change Profile Picture</label>
            <input  type="file" name="profile-pic" id="profile-pic" class="css-file-input" >
            <input type="submit" name= "submit" value="DONE" id="submit-button">
        </form>
    </div>
    
    <script src="./Assets/JS/script.js">

    </script>
</body>
</html>
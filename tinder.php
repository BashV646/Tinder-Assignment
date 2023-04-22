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
    <?php
    include("./includes/connection.php");
    if($conn == false){
        die("Error in connection");
    }

    $LoggedUserID = $_SESSION["ID"];

    // $Total_Unliked_Users_Query = "SELECT * FROM users 
    // where users.ID NOT IN(
    // SELECT users.ID FROM `users`
    // INNER JOIN likes ON users.ID = likes.LikedUserID
    // WHERE likes.LikingUserID = 1)";

    // $Total_Unliked_Users_Query = "SELECT * FROM users 
    // where users.ID NOT IN(
    // SELECT users.ID FROM `users`
    // INNER JOIN dislikes ON users.ID = dislikes.DislikedUserID
    // WHERE dislikes.DislikingUserID =1)";

    // $Total_Unliked_Users_Query = "SELECT * FROM users 
    // where users.ID NOT IN(
    // SELECT users.ID FROM `users`
    // INNER JOIN dislikes ON users.ID = dislikes.DislikedUserID
    // WHERE dislikes.DislikingUserID = 1)
    // AND users.ID NOT IN(
    // SELECT users.ID FROM `users`
    // INNER JOIN likes ON users.ID = likes.LikedUserID
    // WHERE likes.LikingUserID = 1)
    // AND users.ID != 1";

    // $Gender_ID_Select_Query = "SELECT G.ID from users AS U
    // INNER JOIN user_preferred_gender AS UPF ON U.ID = UPF.UserID
    // INNER JOIN gender as G ON UPF.PreferredGenderID = G.ID
    // WHERE U.ID = 1";

    // $Potential_Matches_Query = "SELECT * FROM users AS U 
    // where U.ID NOT IN(
    //     SELECT U.ID FROM users AS U
    //     INNER JOIN dislikes AS D ON U.ID = D.DislikedUserID
    //     WHERE D.DislikingUserID = 1)
    // AND U.ID NOT IN(
    //     SELECT U.ID FROM users AS U
    //     INNER JOIN likes AS L ON U.ID = L.LikedUserID
    //     WHERE L.LikingUserID = 1)
    // AND U.ID != 1
    // AND U.GenderID IN (
    //     SELECT G.ID from users AS U
    //     INNER JOIN user_preferred_gender AS UPF ON U.ID = UPF.UserID
    //     INNER JOIN gender as G ON UPF.PreferredGenderID = G.ID
    //     WHERE U.ID = 1)";

    // $Small_Adjustment = "SELECT * from users AS U
    //     INNER JOIN user_preferred_gender AS UPF ON U.ID = UPF.UserID
    //     INNER JOIN gender as G ON UPF.PreferredGenderID = G.ID
    //     WHERE UPF.PreferredGenderID IN (
    //         SELECT U.GenderID FROM users AS U
    //         WHERE U.ID = 1)";

    $Final_Potential_Matches_Query = "SELECT * FROM users AS U
                where U.ID NOT IN
                ( SELECT U.ID FROM users AS U 
                INNER JOIN dislikes AS D ON U.ID = D.DislikedUserID
                WHERE D.DislikingUserID = $LoggedUserID) AND U.ID NOT IN(
                SELECT U.ID FROM users AS U
                INNER JOIN likes AS L ON U.ID = L.LikedUserID
                WHERE L.LikingUserID = $LoggedUserID)
            AND U.ID != $LoggedUserID
            AND U.GenderID IN (
                SELECT G.ID from users AS U
                INNER JOIN user_preferred_gender AS UPF ON U.ID = UPF.UserID
                INNER JOIN gender as G ON UPF.PreferredGenderID = G.ID
                WHERE U.ID = $LoggedUserID)
            AND U.ID IN (
                SELECT U.ID from users AS U
                INNER JOIN user_preferred_gender AS UPF ON U.ID = UPF.UserID
                INNER JOIN gender as G ON UPF.PreferredGenderID = G.ID
                WHERE UPF.PreferredGenderID = (
                    SELECT U.GenderID FROM users AS U
                    WHERE U.ID = $LoggedUserID))";

    $Potential_Matches_Response = mysqli_query($conn, $Final_Potential_Matches_Query)->fetch_all(MYSQLI_ASSOC);
    
    

    ?>
    <header class="css-header general-header">
        <a href="./profile.php">

            <button type="button" class="css-button nav-button left-nav-button">
                Profile
            </button>
            
        </a>
    </header>
    <hr class="css-hr">
    

    <div class="css-div tinder-div swipe-div">
        <?php
            $PM_Fn = "";
            $PM_Ln = "";
            $PM_G_ID = "";
            $PM_Age = "";
            $PM_ID = "";
            $PM_PP = "";
            $PM_Gender = "";
            if(count($Potential_Matches_Response) != 0){

                $PM_Fn = $Potential_Matches_Response[0]["Firstname"];
                $PM_Ln = $Potential_Matches_Response[0]["Lastname"];
                $PM_G_ID = $Potential_Matches_Response[0]["GenderID"];
                $PM_Age = $Potential_Matches_Response[0]["Age"];
                $PM_ID = $Potential_Matches_Response[0]["ID"];
                $PM_PP = $Potential_Matches_Response[0]["ProfilePicture"];

                $_SESSION["MatchID"] = $PM_ID;

                if($PM_G_ID == 1){
                    $PM_Gender = "Male";
                }
                elseif($PM_G_ID == 2){
                    $PM_Gender = "Female";
                }
                elseif($PM_G_ID == 3){
                    $PM_Gender = "LGBTQ+";
                }
            }
            else{
            ?>
            <script type="text/javascript">
                 window.location.href = "./out_of_potential_matches.php";
            </script>
            <?php
            }
            
        ?>

        <div class="css-div">
            <img src="./uploads/<?php echo($PM_PP) ?>" width="450px" height="550px" class="css-img swipe-img">    
        </div>

        <div class="css-div info-div">
            <span class="css-profile-info">
                Name:<?php echo(" ".$PM_Fn." ".$PM_Ln) ?>
            </span>
            <br>
            <span class="css-profile-info">
                Gender:<?php echo(" ".$PM_Gender) ?>
            </span>
            <br>
            <span class="css-profile-info">
                Age:<?php echo(" ".$PM_Age) ?>
            </span>
        </div>

        <div class="css-div interaction-div">
            <button class="css-button dislike-button">
                Dislike
            </button>

            <button class="css-button like-button">
                Like
            </button>
        </div>
    </div>
    
    
    <script src="./Assets/JS/script.js">

    </script>
</body>
</html>
<?php
    session_start();
    include("./includes/connection.php");
    if($conn == false){
        die("Connection error");
    }

    $LoggedUserID = $_SESSION["ID"];
    $MatchID = $_SESSION["MatchID"];

    $Like_Query = "INSERT INTO `likes`(`ID`, `LikingUserID`, `LikedUserID`, `Created`) VALUES (NULL,'$LoggedUserID','$MatchID',NULL)";

    if(mysqli_query($conn,$Like_Query) == true){

        header("Location: ./tinder.php");
    }
    else{
        echo ("error");
    }

?>
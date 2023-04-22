<?php
    session_start();
    include("./includes/connection.php");
    if($conn == false){
        die("Connection error");
    }

    $LoggedUserID = $_SESSION["ID"];
    $MatchID = $_SESSION["MatchID"];

    $Dislike_Query = "INSERT INTO `dislikes`(`ID`, `DislikingUserID`, `DislikedUserID`, `Created`) VALUES (NULL,'$LoggedUserID','$MatchID',NULL)";

    if(mysqli_query($conn,$Dislike_Query) == true){

        header("Location: ./tinder.php");
    }
    else{
        echo ("error");
    }
?>
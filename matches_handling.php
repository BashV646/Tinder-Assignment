<?php
    session_start();
    $LoggedUserID = $_SESSION["ID"];

    include("./includes/connection.php");
    if($conn == false){
        die("Connection error");
    }


    $Matches_Query = "SELECT * FROM users AS U
    WHERE U.ID IN(
        SELECT U.ID FROM users AS U
        INNER JOIN likes AS L ON U.ID = L.LikingUserID
        WHERE L.LikedUserID = $LoggedUserID)
        AND U.ID IN(
            SELECT U.ID FROM users AS U
            INNER JOIN likes AS L ON U.ID = L.LikedUserID
            WHERE L.LikingUserID = $LoggedUserID)
            ORDER BY 1";

    $Matches_Assoc = mysqli_query($conn, $Matches_Query)->fetch_all(MYSQLI_ASSOC);
    // echo (count($Matches_Assoc));
    // var_dump($Matches_Assoc);

    $Display_Match_Gender_ID = 0;
    if(count($Matches_Assoc) > 0){
        
        foreach($Matches_Assoc as $array){
            // var_dump($array);
            // echo ("<br>"."<br>");
            // echo ($_SESSION["Current_Displayed_Match_ID"]);
            if($array["ID"] > $_SESSION["Current_Displayed_Match_ID"]){
                $_SESSION["Current_Displayed_Match_ID"] = $array["ID"];
                // echo ($_SESSION["Current_Displayed_Match_ID"]);
                $_SESSION["Display_Match_PP"] = $array["ProfilePicture"];
                $_SESSION["Display_Match_Fn"] = $array["Firstname"];
                $_SESSION["Display_Match_Ln"] = $array["Lastname"];
                $_SESSION["Display_Match_Age"] = $array["Age"];
                $Display_Match_Gender_ID = intval($array["GenderID"]);
                if($array["ID"] == $Matches_Assoc[count($Matches_Assoc) - 1]["ID"]){
                    $_SESSION["Current_Displayed_Match_ID"] = 0;
                }
                break;
            }
        }
        
        
        
        if($Display_Match_Gender_ID == 1){
            $_SESSION["Display_Match_Gender"] = "Male";
        }
        elseif($Display_Match_Gender_ID == 2){
            $_SESSION["Display_Match_Gender"] = "Female";
        }
        header("Location: ./matches.php");
    }
    else
    {
        header("Location: ./no_matches.php");
    }


?>
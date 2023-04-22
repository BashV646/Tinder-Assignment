<?php
    $email = strtolower($_POST["email"]);
    $password = $_POST["password"];

    include("./includes/connection.php");
    if($conn==false){
        echo ("Connection Error");
    }

    $query = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'";
    $response = mysqli_query($conn,$query)->fetch_all(MYSQLI_ASSOC);
    if(count($response) == 0){
        header("Location: ./errlogin.php");
    }
    else{
        session_start();
        $_SESSION["LOGGED IN"] = "TRUE";
        $_SESSION["Current_Displayed_Match_ID"] = 0;
        $_SESSION["Display_Match_Gender"] = "Male";
        // $_SESSION["Current_Displayed_Match_ID"] = 0;
        foreach($response as $array){
            foreach($array as $key => $value){
                if($key == "ID")
                {
                    $_SESSION["ID"] = $value;
                    
                }
                elseif($key == "Firstname"){
                    $_SESSION["firstname"] = $value;
                }
                elseif($key == "Lastname"){
                    $_SESSION["lastname"] = $value;
                }
                elseif($key == "Age"){
                    $_SESSION["age"] = $value;
                }
                elseif($key == "GenderID"){
                    $GenderID = $value;
                }
                elseif($key == "ProfilePicture"){
                    $_SESSION["picture"] = $value;
                }
            }
        }

        if($GenderID == 1){
            $_SESSION["gender"] = "Male";
        }
        elseif($GenderID == 2){
            $_SESSION["gender"] = "Female";
        }

        $UserID = $_SESSION["ID"];
        $PFG_request_query = "SELECT * FROM user_preferred_gender WHERE UserID = '$UserID'";
        $PFG_response = mysqli_query($conn,$PFG_request_query)->fetch_all(MYSQLI_ASSOC);
        if(count($PFG_response) == 2){
            $PFG = "Both";
            $_SESSION["PFG"] = $PFG;
        }
        elseif(count($PFG_response) == 1){

            foreach($PFG_response as $array){
                foreach ($array as $key => $value) {
                    if($key == "PreferredGenderID")
                    {
                        $PFGID = $value;
                        if($PFGID == 1){
                            $PFG = "Male";
                            $_SESSION["PFG"] = $PFG;
                        }
                        elseif($PFGID == 2)
                        {
                            $PFG = "Female";
                            $_SESSION["PFG"] = $PFG;
                        }
                    }
                }
            }        
        }



        header("Location: ./profile.php");

    }
    // echo ("<br>");
    // echo("Email: ".$email);
    // echo ("<br>");
    // echo ("<br>");
    // echo ("Password: ".$password);
    // echo("Name:  ".$_SESSION["firstname"]." ". $_SESSION["lastname"]);
    // header("Location: ./login.php")
?>
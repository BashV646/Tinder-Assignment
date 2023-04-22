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
        if($conn==false){
            echo ("Connection Error");
        }

            $firstname = $_POST["fn"];
            $lastname = $_POST["ln"];
            $phone_number = $_POST["phone_num"];
            $age = $_POST["age"];
            $gender = $_POST["gender"];
            $email = strtolower($_POST["email"]);
            $password = $_POST["password"];
            $con_password = $_POST["con_password"];
            $PFG = $_POST["PFG"];

            $email_check_query = "SELECT Email FROM users WHERE Email = '$email' LIMIT 1";
            $email_check_result = mysqli_query($conn,$email_check_query)->fetch_all(MYSQLI_ASSOC);
            if(count($email_check_result)){
                ?>
                <script type="text/javascript">
                    window.location.href = "./login.php";
                </script>
                <?php
            }
            
            if($password == $con_password)
            {
                #Requesting an associtave array holding the latest userID so we can add 1 to it to use in the PF table
                $query = "INSERT INTO `users`(`ID`, `Firstname`, `Lastname`, `Age`, `GenderID`, `Email`, `Password`, `PhoneNumber`, `ProfilePicture`, `Created`) VALUES (NULL,'$firstname','$lastname','$age','$gender','$email','$password','$phone_number', 'dummyimg.png', NULL)";
                $Insert_Query = mysqli_query($conn,$query);
                
                
                $request_query = "SELECT ID FROM users ORDER BY 1 DESC LIMIT 1";
                $request_response = mysqli_query($conn, $request_query)->fetch_all(MYSQLI_ASSOC);
                $LatestID = 1;  
                foreach ($request_response as $array) {
                    foreach ($array as $key => $value) {
                        $LatestID = $value;
                    } 
                }
                $NewID = intval($LatestID);
                
                
                if($PFG == 1){
                    $PrefGender_m = "INSERT INTO `user_preferred_gender`(`UserID`, `PreferredGenderID`) VALUES ('$NewID','1')";
                    $PFG_Insert_Query = mysqli_query($conn,$PrefGender_m);
                    
                }
                elseif($PFG == 2){
                    $PrefGender_f = "INSERT INTO `user_preferred_gender`(`UserID`, `PreferredGenderID`) VALUES ('$NewID','2')";
                    $PFG_Insert_Query = mysqli_query($conn,$PrefGender_f);
                }
                elseif($PFG == 3){
                    $PrefGender_m = "INSERT INTO `user_preferred_gender`(`UserID`, `PreferredGenderID`) VALUES ('$NewID','1')";
                    $PFG_Insert_Query = mysqli_query($conn, $PrefGender_m);
                    $PrefGender_f = "INSERT INTO `user_preferred_gender`(`UserID`, `PreferredGenderID`) VALUES ('$NewID','2')";
                    $PFG_Insert_Query = mysqli_query($conn,$PrefGender_f);
                }
            }
            else{
                ?>
                <script type="text/javascript">
                    window.location.href = "./create_account.php";
                </script>
                <?php
            }

            // echo($firstname);
            // echo ("\n");
            // echo($lastname);
            // echo ("\n");
            // echo($phone_number); 
            // echo ("\n");
            // echo($age); 
            // echo ("\n");
            // echo($gender);
            // echo ("\n");
            // echo($email);
            // echo ("\n");
            // echo($password);
            // echo ("\n");
            // echo($con_password);
            // echo ("\n");
            // echo ($PFG);
            

        ?>
    <h1>
        Account Created successfully <br>
        You Can Login Now!
    </h1>
    <a href="./login.php">
        <button class="css-button">
            Go To Login
        </button>
    </a>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>
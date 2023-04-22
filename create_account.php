<?php
    session_start();
    if($_SESSION["LOGGED IN"] == "TRUE"){
        header("location: ./profile.php");
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
        <a href="./index.php">

            <button type="button" class="css-button nav-button back-button">
                Home
            </button>

        </a>
    </header>

    <hr class="css-hr">

    <br>

    <h1 class="css-body-heading">
        CREATE AN ACCOUNT
    </h1>

    <br>

    <div class="css-div create_account-div">

        <form class="css-form create_account-form" method="POST" action="./adding_user.php">
            <label for="fn" class="css-label fn-label">Firstname</label>
            <input type="text" placeholder="Enter your Firstname" class="css-input fn-input" name="fn" id="fn" required>
            <br>
            <label for="ln" class="css-label ln-label">Lastname</label>
            <input type="text" placeholder="Enter your Lastname" class="css-input ln-input" name="ln" id="ln" required>
            <br>
            <label for="phone_num" class="css-label phone_num-label">Phone Number</label>
            <input type="tel" placeholder="Enter your phone number" class="css-input phone_num-input" name="phone_num" id="phone_num" required>
            <br>
            <label for="age" class="css-label age-label">Age</label>
            <input type="number" placeholder="Enter your Age" class="css-input age-input" name="age" id="age" required>
            <br>
            <label for="gender" class="css-label gender-label">Gender</label>
            <select id="gender" name="gender" class="css-input gender-input"  required>

                <option value="" hidden selected disabled>
                    Choose your gender
                </option>
                <option value="1">
                    Male
                </option>
                <option value="2">
                    Female
                </option>

            </select>
            <br>
            <label for="PFG" class="css-label PFG-label">Preferred Gender</label>
            <select id="PFG" name="PFG" class="css-input gender-input"  required>

                <option value="" hidden selected disabled>
                    Choose your Preferred gender
                </option>
                <option value="1">
                    Male
                </option>
                <option value="2">
                    Female
                </option>
                <option value="3">
                    Both
                </option>

            </select>
            <!-- <fieldset class="css-section" id="PFG_section" required>
                
                <label for="PFG_section" class="css-label PFG-label">Preferred Gender:</label>
                <br>
                <label for="PFG_m" class="css-label PFG-label_m">Male</label>
                <input value="1" type="checkbox" class="css-input PFG-input_m" name="PFG" id="PFG_m">
                <br>
                <label for="PFG_f" class="css-label PFG-label_f">Female</label>
                <input value="2" type="checkbox" class="css-input PFG-input_f" name="PFG" id="PFG_f">
                

            </fieldset> -->
            <br>
            <label for="email" class="css-label email-label">Email</label>
            <input type="email" placeholder="Enter your email" class="css-input email-input" id="email" name="email" required>
            <br>
            <label for="password" class="css-label password-label">Password</label>
            <input type="password" placeholder="Enter your password" class="css-input password-input" id="password" name="password" required>
            <br>
            <label for="con_password" class="css-label con_password-label">Confirm Password</label>
            <input type="password" placeholder="Confirm your password" class="css-input con_password-input" id="con_password" name="con_password" required>

            <button type="submit" class="css-button create_account-button">
                Create Account
            </button>
        </form>

    </div>
    <script src="./Assets/JS/script.js">

    </script>
</body>
</html>
<?php
    session_start();
    include("./includes/connection.php");
    if($conn == false){
        die("Connection error");
    }
    $LoggedID = $_SESSION["ID"];
    // echo ($LoggedID . " ");

    // File upload path
    $targetDir = "uploads/";
    $Old_fileName = basename($_FILES["profile-pic"]["name"]);
    $_FILES["profile-pic"]["name"] = "User_".$LoggedID."_".$Old_fileName;
    $fileName = basename($_FILES["profile-pic"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


    if(isset($_POST["submit"]) && !empty($_FILES["profile-pic"]["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $conn->query("UPDATE `users` SET `ProfilePicture` = '$fileName' WHERE users.ID = '$LoggedID'");
                if($insert){
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                }else{
                    $statusMsg = "File upload failed, please try again.";
                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }

    ?>
        <script type="text/javascript">
            window.location.href = "./profile.php";
        </script>
    <?php
?>
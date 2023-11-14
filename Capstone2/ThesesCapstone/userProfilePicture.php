<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesisarchive_db";

$conn = new mysqli($servername, $username, $password, $dbname);
    
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['updateProfilePicture'])) {
    $targetDirectory = "Uploads/"; // Change this to the actual folder path where you want to save the images.

    // Check if the directory exists, create it if not
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    $originalFileName = $_FILES["profilePicture"]["name"];
    $targetFile = $targetDirectory . $originalFileName;
    $uploadOk = 1;

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, the file already exists.";
        $uploadOk = 0;
    }

    // Check file size (you can set a maximum size, e.g., 2MB)
    if ($_FILES["profilePicture"]["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Check file type (you can restrict to specific image types, e.g., JPEG, PNG)
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is OK, try to upload the file
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile)) {
            echo "The file " . $originalFileName . " has been uploaded.";

            // Update the database with the file name (assuming you have a 'profile_picture' column)
            $updateSql = "UPDATE tbl_allusers SET picture = '$originalFileName' WHERE username = '" . $_SESSION['username'] . "'";
            if ($conn->query($updateSql) === TRUE) {
                echo "Profile picture updated in the database.";
            } else {
                echo "Error updating profile picture in the database: " . $conn->error;
            }

            // Redirect to the studentProfile page
            header("Location: studentProfile.php");
            exit; // Ensure no further code execution after the redirect
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}


?>
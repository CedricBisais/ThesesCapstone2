<?php
session_start();

// Establish a database connection (replace with your own credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesisarchive_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function validate($data){
		$data= trim($data);
		$data= stripslashes($data);
		$data= htmlspecialchars($data);
		return $data;
	}


    $oldPassword=validate($_POST["oldpassword"]);
    $newPassword =validate($_POST["newpassword"]);  // Assuming you have an input field with the name "newpassword"
    $confirmPassword =validate($_POST["confirmpassword"]);
    $username = $_SESSION["username"];  // Get the username from the session

    if(empty($oldPassword)){
        header("Location: studentProfile.php?error=Old Password is Required");
        exit();
    }else if(empty($newPassword)){
        header("Location: studentProfile.php?error=New Password is Required");
        exit();
    }else if($newPassword !=$confirmPassword){
        header("Location: studentProfile.php?error=The Confirmation Password does not match");
        exit();
    }else{
        $updatePasswordQuery = "UPDATE tbl_allusers SET password = '$newPassword' WHERE username = '$username'";
        if ($conn->query($updatePasswordQuery) === TRUE) {
            echo "Password updated successfully!";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    }
 }


$conn->close();
header("location:studentProfile.php");

?>
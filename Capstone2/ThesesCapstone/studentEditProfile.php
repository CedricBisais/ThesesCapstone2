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

if (!isset($_SESSION["username"])) {
    // Redirect to the login page if the user is not logged in
    header("location:Login.php");
    exit;
}

if (isset($_POST["updateData"])) {
    // Process the form submission and update the user's information in the database
    $newUsername = $_POST["username"];
    $newContactNumber = $_POST["contact_number"];
    $newEmail = $_POST["email"];

    // Update the user's information in the database (You should use prepared statements for security)
    $updateSql = "UPDATE tbl_allusers SET username = '$newUsername', contact_number = '$newContactNumber', email = '$newEmail' WHERE username = '" . $_SESSION["username"] . "'";
    if ($conn->query($updateSql) === TRUE) {
        // Update the session username to reflect the new username
        $_SESSION["username"] = $newUsername;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Fetch the updated user information
$sql = "SELECT * FROM tbl_allusers WHERE username = '" . $_SESSION['username'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $contactNumber = $row['contact_number'];
    $email = $row['email'];
} 
$conn->close();

header("location:studentProfile.php");
?>
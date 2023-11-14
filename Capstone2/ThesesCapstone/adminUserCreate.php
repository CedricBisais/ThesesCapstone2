<?php
$con = new mysqli('localhost', 'root', '', 'thesisarchive_db');

session_start();

// checks if connected to the database
if (!$con) {
    die(mysqli_error($con));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validate data for user creation
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $type = validate($_POST['type']);
    $contact_number = validate($_POST['contact_number']);
    $email = validate($_POST['email']);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $sql = "INSERT INTO tbl_allusers (username, password, type, contact_number, email) VALUES ('$username', '$hashedPassword', '$type', '$contact_number', '$email')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // User created successfully
        $_SESSION['status'] = 'User created successfully';
        $_SESSION['status_code'] = 'success';
    } else {
        // Handle database insertion error
        $_SESSION['status'] = 'User creation failed';
        $_SESSION['status_code'] = 'error';
    }

    header("location: adminUserManagement.php");
    exit();
}

?>
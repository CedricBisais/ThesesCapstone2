<?php

$con = new mysqli('localhost', 'root', '', 'thesisarchive_db');

session_start();

// checks if connected to database
if (!$con) {
    die(mysqli_error($con));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validate data for login
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    // checks username field
    if (empty($username)) {
        header("Location: login.php?error=Username is required");
        exit();
    } else if (empty($password)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        // check if the username exists
        $sql = "SELECT * FROM tbl_allusers WHERE username = '$username'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        if ($row) {
            $hashedPassword = $row['password'];

            // Verify the user's input password against the stored hash
            if (password_verify($password, $hashedPassword)) {
                // Password is correct
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $hashedPassword;

                if ($row["type"] == "Admin") {
                    header("location: adminDashboard.php");
                } elseif ($row["type"] == "Student") {
                    header("location: studentHomepage.php");
                } elseif ($row["type"] == "Librarian") {
                    header("location: librarianThesisManagement.php");
                } else {
                    // Handle other user types as needed
                }
            } else {
                // Incorrect password
                header("location: login.php?error=Incorrect Password");
                exit();
            }
        } else {
            // User not found
            header("location: login.php?error=User not found");
            exit();
        }
    }
}
?>
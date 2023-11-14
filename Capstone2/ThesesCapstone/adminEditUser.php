<?php
session_start();

$connection = mysqli_connect("localhost", "root", "");
$database = mysqli_select_db($connection, 'thesisarchive_db');

if (isset($_POST['updateData'])) {
    $id = $_POST['update_id'];
    $username = $_POST['username'];
    $type = $_POST['type'];
    $contact = $_POST['contact_number'];
    $email = $_POST['email'];

    $new_password = $_POST['password']; // Get the new password from the form
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT); // Hash the new password

    $query = "UPDATE tbl_allusers SET username='$username', password='$hashed_password', type='$type', contact_number='$contact', email='$email' WHERE id='$id' ";

    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Data Updated Successfully!";
        $_SESSION['status_code'] = 'success';
        header('Location: adminUserManagement.php');
    } else {
        $_SESSION['status'] = "Data not updated!";
        $_SESSION['status_code'] = 'error';
        header('Location: adminUserManagement.php');
    }
}
?>
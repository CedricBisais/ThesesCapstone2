<?php
session_start();
$connection = mysqli_connect("localhost", "root", "");
$database = mysqli_select_db($connection, 'thesisarchive_db');

if (isset($_POST['updateData'])) {
    $id = $_POST['update_id'];
    $department = $_POST ['department'];
    $course = $_POST ['course'];

    $query = "UPDATE tbl_coursedept SET department='$department', course='$course' WHERE id='$id' ";

    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status']= "Data Updated Successfully!";
        $_SESSION['status_code']= 'success';
        header('Location: adminCourseManagement.php');
    } else {
        $_SESSION['status']= "ERROR!";
        $_SESSION['status_code']= 'error';
    }
}
?>
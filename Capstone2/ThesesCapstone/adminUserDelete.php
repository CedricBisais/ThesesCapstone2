<?php 
session_start();
$connection = mysqli_connect("localhost", "root", "");
$database = mysqli_select_db($connection, 'thesisarchive_db');

if (isset($_POST['deleteData'])) {
    $id = $_POST['delete_id'];
 
    $query = "DELETE FROM tbl_allusers WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status']= "Data Deleted Successfully!";
        $_SESSION['status_code']= 'success';
        header('Location: adminUserManagement.php');
    } else {
        $_SESSION['status']= "Data Deleted unsuccessfully!";
        $_SESSION['status_code']= 'error';
        header('Location: adminUserManagement.php');
    }
}
?>
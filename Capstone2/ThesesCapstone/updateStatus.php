<?php
$con= mysqli_connect('localhost','root','','thesisarchive_db');

if(isset($_GET['id']) && isset($_GET['status'])){
    $id = $_GET['id'];
    $status = $_GET['status'];
    mysqli_query($con,"update tbl_theses set status='$status' where id='$id'");
    header ("Location:adminArchiveManagement.php");
}

function update_status(){
    if (isset($_POST['id']) && isset($_POST['status'])) {
        extract($_POST);

        // Assuming $this->conn is your database connection
        $stmt = $con("UPDATE `tbl_theses` SET status = ? WHERE id = ?");
        $stmt->bind_param("ss", $status, $id);

        if ($stmt->execute()) {
            $resp['status'] = 'success';
            $resp['msg'] = "Archive status has been successfully updated.";
        } else {
            $resp['status'] = 'failed';
            $resp['msg'] = "An error occurred. Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $resp['status'] = 'failed';
        $resp['msg'] = "Invalid or incomplete data received.";
    }


    // Send the JSON response back to the client
    echo json_encode($resp);
}

?>

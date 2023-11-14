<?php 
 session_start();
  $connection = mysqli_connect("localhost","root","");
  $database= mysqli_select_db($connection,'thesisarchive_db');


  if(isset($_POST['addCourse'])){
    $department = $_POST ['department'];
    $course = $_POST ['course'];

    $query="INSERT INTO tbl_coursedept (department, course) " .
    "VALUES ('$department', '$course')";

    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $_SESSION['status']= "Course Created Successfully!";
        $_SESSION['status_code']= 'success';
      header('Location: adminCourseManagement.php');
    }else{
        $_SESSION['status']= "Data not inserted successfully!";
        $_SESSION['status_code']= 'error';
    }
  }
?>
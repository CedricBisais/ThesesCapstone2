<?php
$connection = mysqli_connect('localhost', 'root', '', 'thesisarchive_db');

$thesisTitle = $authors = $course = $dateOfPublication = $abstract = $targetFile = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted

    // Sanitize and retrieve form data
    $thesisTitle = mysqli_real_escape_string($connection, $_POST["thesis_title"]);
    $authors = mysqli_real_escape_string($connection, $_POST["author"]);
    $course = mysqli_real_escape_string($connection, $_POST["course"]);
    $dateOfPublication = mysqli_real_escape_string($connection, $_POST["date_of_publication"]);
    $abstract = mysqli_real_escape_string($connection, $_POST["abstract"]);

    // Process the file upload if needed
    if (isset($_FILES["thesisFile"]) && $_FILES["thesisFile"]["error"] == UPLOAD_ERR_OK) {
        $targetDir = "Capstone2/ThesesCapstone/Uploads/Archives/"; // Specify your target directory
        $targetFile = $targetDir . basename($_FILES["thesisFile"]["name"]);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["thesisFile"]["tmp_name"], $targetFile)) {
            echo "Thesis Submitted Successfully.";
        } else {
            echo "Error uploading file.";
            exit();
        }
    }

    // Insert data into the database
    $query = "INSERT INTO tbl_theses (thesis_title, author, course, date_of_publication, abstract, document_path) 
              VALUES ('$thesisTitle', '$authors', '$course', '$dateOfPublication', '$abstract', '$targetFile')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Data inserted successfully
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Thesis submitted successfully!',
                showConfirmButton: false,
                timer: 1500
            });
            setTimeout(function(){
                window.location.href = 'studentThesesSubmission.php';
            }, 1500);
        </script>";
    } else {
        // Error in inserting data
        echo "Error: " . mysqli_error($connection);
    }

}
?>
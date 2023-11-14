<?php
session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
    header("location:Login.php");
}

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
        $targetDir = "Uploads/Archives/"; // Specify your target directory
        $targetFile = $targetDir . basename($_FILES["thesisFile"]["name"]);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["thesisFile"]["tmp_name"], $targetFile)) {
            echo "File uploaded successfully!";
        } else {
            echo "Error uploading file.";
        }
    }

    // Insert data into the database
    $query = "INSERT INTO tbl_theses (thesis_title, author, course, date_of_publication, abstract, document_path) 
              VALUES ('$thesisTitle', '$authors', '$course', '$dateOfPublication', '$abstract', '$targetFile')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Data inserted successfully
        echo "Thesis submitted successfully!";
    } else {
        // Error in inserting data
        echo "Error: " . mysqli_error($connection);
    }

}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Thesis Submit</title>

    <!-- Socials Logo -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>

    <!-- css and js -->
    <link href="Css/studentHomePage.css" rel="stylesheet" type="text/css">
    <script src="Js/scrollreveal.min.js"></script>
    <script src="Js/studentHome.js"></script>

    <!-- Theses Submission -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Tiny MCE -->
    <script src="https://cdn.tiny.cloud/1/yf3ltynrh66mirvm6k5x58l8mdk72raowlpe51g7t6ako7k0/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
<header>
    <nav class="nav container">
    <a class="navbar-brand mt-2 mt-lg-0" href="studentHomepage.php">
      <img src="STI LOGO.png" height="65" alt="MDB Logo" loading="lazy"
        />
      </a>
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list me-auto mb-2 mb-lg-0">
                        <li class="nav__item">
                            <a class="nav-link" href="studentHomePage.php">Home</a>
                        </li>
                        <li class="nav__item">
                            <a class="nav-link" href="studentThesesSubmission.php">Theses Submission</a>
                        </li>
                        <li class="nav__item">
                            <a class="nav-link" href="studentThesesOutlook.php">Theses Outlook</a>
                        </li>
                    </ul>

                    <div class="nav__close" id="nav-close">
                        <i class='bx bx-x'></i>
                    </div>
                </div>

                <!-- Toggle button -->
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>
            </nav>
</header>
    <!-- Collapsible wrapper -->


    <!-- Right elements -->
    <div class="d-flex align-items-center">
    
      <!-- Notifications -->
      <div class="dropdown">
        <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-bell"></i> <span class="badge rounded-pill badge-notification bg-danger">1</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
          <li>
            <a class="dropdown-item" href="#">Some news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another news</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Something else here</a>
          </li>
        </ul>
      </div>
      <!-- Avatar -->
      <div class="dropdown">
        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
        <img src="STI LOGO.png" class="rounded-circle" height="50" width="50" alt="Black and White Portrait of a Man" loading="lazy"/>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar" >
          <li>
            <a class="dropdown-item" href="studentProfile.php">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="Logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
</head>

<style>
/* Center the form within the card body */
.container-fluid2 {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
}

/* Center text and form elements within their containers */
.card-title {
    text-align: center;
}

</style>

<body>
<div class="content py-4">
    <div class="card card-outline card-primary shadow rounded-0">
        <div class="card-header rounded-0">
            <h5 class="card-title">Submit Thesis</h5>
        </div>
        <div class="card-body rounded-0">
            <div class="container-fluid2">
                <form action="" id="archive-form"  method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="title" class="control-label text-navy">Thesis Title</label>
                                <input type="text" name="thesis_title" id="title" autofocus placeholder="Thesis Title" class="form-control form-control-border" value="<?php echo $thesisTitle; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="author" class="control-label text-navy">Author/s</label>
                                    <textarea rows="3" name="author" id="author" placeholder="Author/s" class="form-control form-control-border summernote" required><?php echo $authors; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="course" class="control-label text-navy">Course</label>
                                    <select name="course" id="course" class="form-control form-control-border" required>
                                        <option <?php if ($course == 'BSIT') echo 'selected'; ?>>BSIT</option>
                                        <option <?php if ($course == 'BSHM') echo 'selected'; ?>>BSHM</option>
                                        <option <?php if ($course == 'BSBAOM') echo 'selected'; ?>>BSBAOM</option>
                                        <option <?php if ($course == 'BSTM') echo 'selected'; ?>>BSTM</option>
                                        <option <?php if ($course == 'BSCPE') echo 'selected'; ?>>BSCPE</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="date_of_publication" class="control-label text-navy">Date of Publication</label>
                                <input type="date" class="form-control" name="date_of_publication" value="<?php echo $dateOfPublication; ?>" required>
                            </div>
                        </div>      
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="abstract" class="control-label text-navy">Abstract</label>
                                <input type="textarea" name="abstract" id="abstract" placeholder="abstract" class="form-control form-control-border summernote" value="<?php echo $abstract; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="thesisFile" class="control-label text-muted">Thesis Document (PDF File Only)</label>
                                <input type="file" id="thesisFile" name="thesisFile" class="form-control form-control-border" accept="application/pdf" value="<?php echo $targetFile; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-default bg-navy btn-flat">Submit</button>
                                <a href="./?ThesesCapstone=studentThesesSubmission" class="btn btn-light border btn-flat"> Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>STI College Carmona</h3>
                        <ul>
                            <li>Location: Lot 2A Brgy. Maduya, Carmona, Cavite, Carmona, Philippines</li>
                            <li>Phone: (046) 430 1671</li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>School Name</h3>
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                    </div>
                    <div class="col item social"><a href="https://www.facebook.com/carmona.sti.edu"><i class="icon fa fa-facebook"></i></a><a href="https://twitter.com/sticollege"><i class="icon fa fa-twitter"></i></a><a href="https://www.youtube.com/user/STIdotEdu"><i class="icon fa fa-youtube"></i></a><a href="https://www.instagram.com/stidotedu/"><i class="icon fa fa-instagram"></i></a></div>
                </div>
                <p class="copyright">STI College Carmona © 2023</p>
            </div>
        </footer>
    </div>


<script>

tinymce.init({
  selector: '#abstract',
  height: 300, // Adjust the height as needed
  menubar: false, // Hide the menu bar if desired
  plugins: 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
  toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
});
</script>
</body>

</html>
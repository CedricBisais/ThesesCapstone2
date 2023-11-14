<?php
    session_start();

    // Assuming you have a database connection, replace 'your_db_connection' with your actual database connection
    // Also, make sure to handle database connections securely (e.g., use PDO, prepared statements) to prevent SQL injection.

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thesisarchive_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
        header("location:Login.php");
    }

    // Assuming you have a table named 'users' with columns 'username', 'contact_number', and 'email'
    $sql = "SELECT * FROM tbl_allusers WHERE username = '" . $_SESSION['username'] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $contactNumber = $row['contact_number'];
        $email = $row['email'];
        $password =$row['password'];
    } else {
        // Handle the case where user data is not found
        $username = "N/A";
        $contactNumber = "N/A";
        $email = "N/A";
        $password = "N/A";
    }

    $conn->close();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Profile</title>

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
        
        <!-- Theses Submission -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Tiny MCE -->
        <script src="https://cdn.tiny.cloud/1/yf3ltynrh66mirvm6k5x58l8mdk72raowlpe51g7t6ako7k0/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

        <!-- Modal -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


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
            <img src="Uploads/<?php echo $row['picture']; ?>" class="rounded-circle" height="50" width="50" alt="Black and White Portrait of a Man" loading="lazy"/>
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
  .container-fluid2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    
    .card-title {
        text-align: center;
    }

   
    .card-outline {
        border: 15px solid #ccc;
    }

    .user-info-card {
        border: 3px solid #ccc;
        padding: 15px;
        border-radius: 10px;
        margin-top: 20px;
        width: 100%; 
    }
    @media (min-width: 768px) {
      
        .user-info-card {
            width: 65%; 
        }
    }

    @media (max-width: 768px) {
        
        .user-info-card {
            width: 90%; 
            margin: 10px auto; 
        }
    }
        .student-img {
            margin: 0; 
    }
        

    </style>
    <body>

    <!-- Your Information -->
    <div class="content py-4">
        <div class="card card-outline card-primary shadow rounded-0">
            <div class="card-header rounded-0">
                <h5 class="card-title">Your Information:</h5>
            </div>
            <div class="card-body rounded-0">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-4 col-sm-12">
                                <img src="Uploads/<?php echo $row['picture']; ?>" alt="" class="img-fluid student-img bg-gradient-dark border" height= "400" width= "400">
                            </div>
                            <div class="col-lg-8 col-sm-12">
                            <div class="user-info-card">
                                <dl>
                                <dt class="text-navy">Username:</dt>
                                    <dd class="pl-4"><?php echo $username; ?></dd>
                                    <dt class="text-navy">Contact Number:</dt>
                                    <dd class="pl-4"><?php echo $contactNumber; ?></dd>
                                    <dt class="text-navy">Email:</dt>
                                    <dd class="pl-4"><?php echo $email; ?></dd>
                                    <dt class="text-navy">Password:</dt>
                                    <dd class="pl-4"><?php echo $password; ?></dd>
                                </dl>
                                <a href="#updateProfile" class="updateProfile btn btn btn-default bg-navy btn-flat editbtn" data-toggle='modal'> <i class="fa fa-edit" data-toggle='tooltip'></i> Update Profile</a> 
                                <a href="#changePassword" class="changePassword btn btn btn-default bg-navy btn-flat editbtn" data-toggle='modal'> <i class="fa fa-key" data-toggle='tooltip'></i> Change Password</a> 
                                <a href="#profilePicture" class="profilePicture btn btn btn-default bg-navy btn-flat editbtn" data-toggle='modal'> <i class="fa fa-user" data-toggle='tooltip'></i> Profile Picture</a> 
                            </div>
                            </div>
                        </div>
                    </div>
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
                        <div class="col item social"><a href="https://www.facebook.com/carmona.sti.edu"><i class="bi bi-facebook"></i></a><a href="https://twitter.com/sticollege"><i class="bi bi-twitter"></i></a><a href="https://www.youtube.com/user/STIdotEdu"><i class="bi bi-youtube"></i></a><a href="https://www.instagram.com/stidotedu/"><i class="bi bi-instagram"></i></a></div>
                    </div>
                    <p class="copyright">STI College Carmona Â© 2023</p>
                </div>
            </footer>
    </div>        
    <style>
        .modal-xl {
                max-width: 50%;
            }

            /* Center the modal vertically */
            .modal.vertical-alignment {
                top: 50%;
                transform: translateY(-50%);
            }
    </style>

            <!-- Modal Update Profile-->            
    <div class="modal fade" id="updateProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create User</h1>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="studentEditProfile.php" method="POST">
            <div class="modal-body">
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Contact Number</label>
                        <input type="number" name="contact_number"class="form-control" value="<?php echo $contactNumber; ?>"required>
                    </div>
                    <div class="mb-3">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="" value="<?php echo $email; ?>" required>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <button type="submit" name="updateData" class="btn btn-primary">Update</button>
            </div>
            </form>
		</div>
	</div>
</div>

            <!-- Modal Change Password-->
    <div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="studentChangePassword.php" method="POST">
                
                <?php if (isset($_GET['error'])){?>
                    <p class="error"> <?php echo $_GET['error']; ?></p>
                <?php } ?>

            <div class="modal-body">
        <div class="mb-3">
            <label for="oldpassword">Old Password</label>
            <div class="input-group">
                <input type="password" id="oldpassword" name="oldpassword" class="form-control">
                <button class="btn btn-outline-secondary" type="button" id="toggleOldPassword" title="Toggle Password Visibility">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <div class="mb-3">
            <label for="password">New Password</label>
            <div class="input-group">
                <input type="password" id="password" name="newpassword" class="form-control" >
                <button class="btn btn-outline-secondary" type="button" id="togglePassword" title="Toggle Password Visibility">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <div class="mb-3">
            <label for="cpassword">Confirm Password</label>
            <div class="input-group">
                <input type="password" id="cpassword" name="confirmpassword" class="form-control" >
                <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword" title="Toggle Password Visibility">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <button type="submit" name="updatePassword" class="btn btn-primary">Update</button>
            </div>
            </form>
		</div>
	</div>
</div>

            <!-- Modal Profile Picture --> 
    <div class="modal fade" id="profilePicture" tabindex="-1" aria-labelledby="profilePictureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="profilePictureModalLabel">Update Profile Picture</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
            <form action="userProfilePicture.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="profilePicture">Choose Image</label>
                        <input type="file" name="profilePicture" class="form-control-file" accept="image/*" required onchange="previewImage(this);">
                            <img id="imagePreview" src="#" alt="Preview" style="max-width: 100%; max-height: 300px;">
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" name="updateProfilePicture" class="btn btn-primary">Update</button>
                </div>
            </form>


<script>
    // Get references to the eye icons and password fields
    const toggleOldPassword = document.getElementById('toggleOldPassword');
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

    const oldPassword = document.getElementById('oldpassword');
    const newPassword = document.getElementById('password');
    const confirmPassword = document.getElementById('cpassword');

    // Add event listeners to the eye icons
    toggleOldPassword.addEventListener('click', togglePasswordVisibility.bind(null, oldPassword));
    togglePassword.addEventListener('click', togglePasswordVisibility.bind(null, newPassword));
    toggleConfirmPassword.addEventListener('click', togglePasswordVisibility.bind(null, confirmPassword));

    // Function to toggle password visibility
    function togglePasswordVisibility(passwordField) {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
        } else {
            passwordField.type = 'password';
        }
    }

    // JavaScript to display a preview of the selected image
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
</script>


    </body>

    </html>
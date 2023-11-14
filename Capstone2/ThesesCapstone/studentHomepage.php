<?php
session_start();

if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])){
    header("location:Login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>HomePage</title>
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
    <link href="css/studentHomePage.css" rel="stylesheet" type="text/css">
    <script src="js/scrollreveal.min.js"></script>
    <script src="js/studentHome.js"></script>




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
    <a class="navbar-brand mt-2 mt-lg-0" href="studentHomePage.php">
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

  <!--==================== MAIN ====================-->
  <main class="main">
            <!--==================== HOME ====================-->
            <section class="home">
                <div class="home__container container">
                    <div class="home__data">
                        <span class="home__subtitle">Welcome, <?php echo ucfirst($_SESSION['username']); ?>!</span>
                        <h1 class="home__title">Hey STIer!</h1>
                        <p class="home__description">
                        Welcome to the STI College Carmona Library Online! Dive into a world of knowledge right from your screen.  Our virtual library is a digital haven for STI students, offering a vast collection of e-books, research materials, and academic resources. Explore, learn, and excel with easy access to a wealth of information. The STI College Library Online is your gateway to a seamless and enriching learning experience. Welcome to a new chapter of digital discovery!
                        </p>
                        <a href="studentThesesSubmission.php" class="home__button">
                            Submit a Thesis!
                        </a>
                    </div>

                    <div class="home__img">
                        <img src="STI LOGO.png" alt="">
                        <div class="home__shadow"></div>
                    </div>
                </div>
            </section>
    </main>
</head>
<body>
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
</body>
</html>
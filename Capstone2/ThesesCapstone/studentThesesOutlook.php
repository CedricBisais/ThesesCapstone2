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
        <title>Thesis Outlook</title>

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
    <link href="css/studentHomepage.css" rel="stylesheet" type="text/css">
    <script src="js/scrollreveal.min.js"></script>
    <script src="js/studentHome.js"></script>


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
          <img src="Uploads/<?php echo $row['picture']; ?>" class="rounded-circle" height="50" width="50" loading="lazy"/>
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
<section class="content ">
          <div class="container">
            <div class="content py-2">
    <div class="col-12">
        <div class="card card-outline card-primary shadow rounded-0">
            <div class="card-body rounded-0">
                <h2>Archive List</h2>
                <hr class="bg-navy">
                                                <div class="list-group">
                                        <a href="./?page=view_archive&id=3" class="text-decoration-none text-dark list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-lg-4 col-md-5 col-sm-12 text-center">
                                <img src="http://localhost/otas/uploads/banners/archive-3.png?v=1639377036" class="banner-img img-fluid bg-gradient-dark" alt="Banner Image">
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-12">
                                <h3 class="text-navy"><b>Online Point of Sale System for XYZ Corp.</b></h3>
                                <small class="text-muted">By <b class="text-info">cblake@sample.com</b></small>
                                <p class="truncate-5">Curabitur a lorem vitae arcu tincidunt suscipit. Vivamus posuere sodales diam, iaculis tempus sem rhoncus ac. Aenean elementum dolor sed augue gravida, vel ultrices mi sollicitudin. Sed semper sapien non tellus gravida imperdiet. Ut condimentum libero elementum ligula congue, rhoncus euismod orci ultricies. Suspendisse potenti. Vivamus rhoncus iaculis justo, non ultricies odio iaculis malesuada. Vivamus vitae odio nec est consectetur elementum. Nam et tellus pellentesque, efficitur nibh nec, sodales nulla. Phasellus vel nunc orci. Vestibulum vitae libero felis.Fusce tellus odio, pellentesque id justo at, euismod eleifend nulla. Sed at dui non dolor porta tempus vel at justo. Curabitur condimentum, ipsum eu vehicula eleifend, lectus libero rhoncus risus, mollis porta nulla tortor vitae felis. Cras molestie lectus diam, fermentum posuere tellus facilisis ac. Nulla eu ante venenatis orci egestas tempor. Sed sed ante nisl. Nulla vitae risus quam. Donec eu neque eget urna pellentesque maximus. Mauris et lacus elit. Vivamus ligula leo, rutrum vitae semper id, gravida in dui. Maecenas augue arcu, egestas non dolor ut, fermentum rutrum sem. Duis a augue et mauris efficitur finibus nec nec neque. Nulla pulvinar, lorem sed efficitur pulvinar, nunc ex pellentesque eros, ac volutpat mauris felis sed nunc. Phasellus porta quam a nulla bibendum, a volutpat nisi tincidunt. Fusce sed semper ante, ullamcorper varius eros. In feugiat est sit amet mi accumsan, vel tempus eros pulvinar.Aenean rhoncus massa vel convallis suscipit. Etiam pharetra, tortor vitae ornare tincidunt, ipsum purus blandit elit, a interdum libero felis id lectus. Curabitur eleifend pulvinar eros non mollis. Phasellus porttitor sollicitudin metus quis congue. Maecenas sollicitudin fermentum ullamcorper. Aenean blandit vehicula diam, a porta nisl auctor sed. Phasellus dignissim tristique mi et faucibus.</p>
                            </div>
                        </div>
                    </a>
                                        <a href="./?page=view_archive&id=2" class="text-decoration-none text-dark list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-lg-4 col-md-5 col-sm-12 text-center">
                                <img src="http://localhost/otas/uploads/banners/archive-3.png?v=1639212829" class="banner-img img-fluid bg-gradient-dark" alt="Banner Image">
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-12">
                                <h3 class="text-navy"><b>Sample 102</b></h3>
                                <small class="text-muted">By <b class="text-info">jsmith@sample.com</b></small>
                                <p class="truncate-5">In hac habitasse platea dictumst. Curabitur commodo nunc ac diam laoreet tempor. Donec sollicitudin lorem ullamcorper pretium ultrices. In varius risus in erat bibendum commodo. Ut volutpat est a mi volutpat molestie. In blandit, leo ut gravida vulputate, metus enim rutrum nunc, id mollis felis libero eu enim. Aenean placerat quis sapien sit amet blandit. Sed nec lorem efficitur, congue lorem vitae, egestas justo. Cras pulvinar, sapien vitae maximus porta, nibh libero porta risus, lobortis porta ante sapien eu massa.Aliquam laoreet condimentum felis eu tristique. Sed a massa nulla. Donec aliquet id ante vel porta. Vestibulum maximus dictum aliquam. Sed molestie lobortis ultrices. Nunc commodo dui nunc, a tincidunt lacus molestie eget. Nullam metus enim, accumsan ac iaculis et, sollicitudin vitae erat. Praesent molestie imperdiet libero, vel congue velit fringilla quis. Suspendisse sollicitudin aliquet enim nec elementum. Morbi nec aliquet mauris. Donec eleifend metus ex.In sollicitudin elementum ante, ut elementum tortor porttitor sit amet. Vestibulum vehicula scelerisque porta. Maecenas vestibulum purus orci, in imperdiet velit congue fermentum. Nulla aliquam ante ut erat sagittis, et porta arcu condimentum. Praesent scelerisque nunc vel felis malesuada venenatis. Donec blandit mauris eros, eget placerat nunc convallis a. Etiam ac elementum arcu. In varius fringilla massa, at volutpat nisi blandit vel. In hac habitasse platea dictumst. Nunc blandit venenatis felis, a mattis nunc. Vestibulum a tempus mi. In interdum semper laoreet. Ut vitae urna arcu. Suspendisse ac arcu quam.</p>
                            </div>
                        </div>
                    </a>
                                    </div>
            </div>
            <div class="card-footer clearfix rounded-0">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6"><span class="text-muted">Display Items: 2</span></div>
                        <div class="col-md-6">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="./?page=projects&p=0" disabled>«</a></li>
                                                                <li class="page-item"><a class="page-link active" href="./?page=projects&p=1">1</a></li>
                                                                <li class="page-item"><a class="page-link" href="./?page=projects&p=2" disabled>»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
          </div>
        </section>


    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design  </a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
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
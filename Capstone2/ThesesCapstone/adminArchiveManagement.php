<?php

session_start();


if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])){
    header("location:Login.php");
}
$con= mysqli_connect('localhost','root','','thesisarchive_db');

    if(isset($_GET['id']) && isset($_GET['status'])){
        $id = $_GET['id'];
        $status = $_GET['status'];
        mysqli_query($con,"update tbl_theses set status='$status' where id='$id'");
        header ("Location:adminArchiveManagement.php");
    }
?>

<!DOCTYPE html>
<html>
<head>

    <!-- Sidebar -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar Logo -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    
    <!-- Socials Logo -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <!-- css and js -->
    <link href="css/adminDashboard.css" rel="stylesheet" type="text/css">
    <script src="js/adminDashboard.js"></script>

    <!-- Table and Modal -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	
    <!-- Search and Pagination CSS JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
   

</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"><i class='bx bx-menu' id="header-toggle"></i></div>
        <div class="header_img"><img src="https://i.imgur.com/hczKIze.jpg" alt=""></div>    
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div><a href="#" class="nav_logo"><i class='bx bx-layer nav_logo-icon'></i><span class="nav_logo-name">STI</span></a>
                <div class="nav_list">
                    <a href="adminDashboard.php" class="nav_link active"><i class='bx bx-grid-alt nav_icon'></i><span class="nav_name">Dashboard</span></a>
                    <a href="adminUserManagement.php" class="nav_link"><i class='bx bx-user nav_icon'></i><span class="nav_name">User Management</span></a>
                    <a href="adminArchiveManagement.php" class="nav_link"><i class='bx bx-message-square-detail nav_icon'></i><span class="nav_name">Archive Management</span></a>
                    <a href="adminCourseManagement.php" class="nav_link"><i class='bx bx-bookmark nav_icon'></i><span class="nav_name">Course Management</span></a>
                    <a href="adminReports.php" class="nav_link"><i class='bx bx-flag nav_icon'></i><span class="nav_name">Reports</span></a>
                </div>
            </div>
            <a href="Logout.php" class="nav_link"><i class='bx bx-log-out nav_icon'></i><span class="nav_name">Log out</span></a>
        </nav>
    </div>
    <!-- Container Main start -->
    <div class="height-auto bg-light">
        <h4>User Management</h4>
    </div>
    <!-- Container Main end -->

    
<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}
#password-container {
    position: relative;
}
#togglePassword {
    position: absolute;
    top: 70%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
}	
</style>
</head>
<body>

<div class="center">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Archive Management</h2>
					</div>
				</div>
			</div>
            <table id="ArchiveTable" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>ASC Num</th>
            <th>Thesis Title</th>
            <th>Department</th>
            <th>Status</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "thesisarchive_db";

        $connection = new mysqli($servername, $username, $password, $database);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        $sql = "SELECT * FROM tbl_theses";
        $result = $connection->query($sql);

        if (!$result) {
            die("Invalid query: " . $connection->error);
        }

        while ($row = $result->fetch_assoc()): 
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['asc_number']; ?></td>
                <td><?php echo $row['thesis_title']; ?></td>
                <td><?php echo $row['course']; ?></td>
                <td class='update-status'>
                    <?php
                        switch ($row['status']) {
                            case '1':
                                echo "<span class='badge badge-success badge-pill'>Published</span>";
                                break;
                            case '0':
                                echo "<span class='badge badge-secondary badge-pill'>Not Published</span>";
                                break;
                        }
                    ?>
                </td>
                <td><?php echo $row['date_created']; ?></td>
                <td><?php echo $row['date_updated']; ?></td>
                 <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="actionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="actionDropdown">
                            <a class="dropdown-item" href="archiveView.php?id=<?php echo $row['id']; ?>" target="_blank"> <span class="fa-regular fa-file"></span> View</a>
                            <a class="dropdown-item update-status-btn" href="#" data-id="<?php echo $row['id'] ?>" data-status="<?php echo $row['status'] ?>"><span class="fa fa-check text-dark"></span> Update Status</a>
                            <a class="drowdown-item" href='#deleteArchiveModal' class='deletebtn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
		</div>
	</div>        
</div>


<!-- Delete Modal HTML -->
<div id="deleteArchiveModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="archiveDelete.php" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Delete Archive</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">		
                    <input type="hidden" name="delete_id" id="delete_id">			
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="deleteData" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Update Status Modal Form -->
<div id="updateStatusModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="update_status_form">
                <input type="hidden" name="id" id="update_status_id">
                <div class="modal-header">
                    <h4 class="modal-title">Update Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status" class="control-label text-navy">Status</label>
                        <select id="update_status_status" class="form-control form-control-border" required>
                            <option value="0">Unpublish</option>
                            <option value="1">Publish</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="updateStatus()">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Update Status Modal
$(document).ready(function () {
    $('.update-status-btn').on('click', function () {
        $('#updateStatusModal').modal('show');

        // Get data attributes from the button
        var id = $(this).data('id');
        var status = $(this).data('status');

        // Set values in the modal
        $('#update_status_id').val(id);
        $('#update_status_status').val(status);
    });
});

// Function to handle status update
function updateStatus() {
    var id = $('#update_status_id').val();  
    var status = $('#update_status_status').val();

    // Call your PHP script to update the status using AJAX
    $.ajax({
        type: 'GET',
        url: 'http://localhost/Capstone2/ThesesCapstone/adminArchiveManagement.php?id=1updateStatus.php', // Replace with the actual URL of your PHP script
        data: { id: id, status: status },
        success: function (response) {
            // Handle success, if needed
            console.log(response);
            // Optionally close the modal after successful update
            $('#updateStatusModal').modal('hide');
            location.reload();
        },
        error: function (error) {
            // Handle error, if needed
            console.error(error);
        }
    });
}
</script>


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
    
        //Delete Archive
        $(document).ready(function() {
            $('.deletebtn').on('click',function(){
                $('#deleteArchiveModal').modal('show');

                $tr= $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                        return $(this).text();
                }).get();
                console.log(data);
                $('#delete_id').val(data[0]);
                $('#asc_number').val(data[1])
                $('#course').val(data[2]);
                $('#update-status').val(data[3]);
                $('#date_created').val(data[4]);
                $('#date_updated').val(data[5]);
            });
        });
 
    </script>                  

    <script>let table = new DataTable('#ArchiveTable');</script>

    <script src="js/sweetalert.js"></script>
    <?php 
        if(isset($_SESSION['status']) && $_SESSION['status'] !== '')
            {
                ?>
             <script> swal({
                title: "<?php echo $_SESSION['status']; ?>",
                // text: "You clicked the button!",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "OK",
                }); 
             </script>  
                <?php

                unset($_SESSION['status']);
            }
    ?>

  
</body>

<script>
      // Update Status Modal
      $(document).ready(function () {
        $('.update-status-btn').on('click', function () {
            $('#updateStatusModal').modal('show');

            // Get data attributes from the button
            var id = $(this).data('id');
            var status = $(this).data('status');

            // Set values in the modal
            $('#update_status_id').val(id);
            $('#update_status_status').val(status);
        });
    });

    function status_update(value, id) {
        // You can perform additional actions here if needed
        console.log("ID: " + id + ", Status: " + value);

        // Call your PHP script to update the status using AJAX or any other method
        // Example using jQuery AJAX:
        $.ajax({
            type: 'GET',
            url: 'your_php_script.php', // Replace with the actual URL of your PHP script
            data: { id: id, status: value },
            success: function (response) {
                // Handle success, if needed
                console.log(response);
            },
            error: function (error) {
                // Handle error, if needed
                console.error(error);
            }
        });
    }

</script>
</html>
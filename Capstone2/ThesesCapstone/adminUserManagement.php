<?php
session_start();

if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])){
    header("location:Login.php");
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
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>

<div class="center">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Users<b>Management</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#CreateUserModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
											
					</div>
				</div>
			</div>
			<table id="UserTable" table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
					</tr>
				</thead>
                <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "thesisarchive_db";

                        $connection = new mysqli($servername, $username, $password, $database);

                        if ($connection->connect_error) {
                            die("Connection failed: " . $connection->connect_error);
                        }

                        $sql = "SELECT * FROM tbl_allusers";
                        $result = $connection->query($sql);

                        if (!$result) {
                            die("Invalid query: " . $connection->error);
                        }
                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>{$row['id']}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['type']}</td>
                                <td>{$row['contact_number']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['password']}</td>
                                <td>
                                    <a href='#editUserModal' class='editbtn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                                    <a href='#deleteUserModal' class='deletebtn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>
                                </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
			</table>
		</div>
	</div>        
</div>
<!-- Add User Modal HTML -->
<div class="modal fade" id="CreateUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create User</h1>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="adminUserCreate.php" method="POST">
            <div class="modal-body">
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3" id="password-container">
                        <label>Password</label>
                        <input type="password" name="password"class="form-control" id="pword" required>
                        <i id="togglePassword" class="fa fa-eye-slash" aria-hidden="true"></i>
                       </div>
                       <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Type</label>
                        <div class="col-sm-6">
                            <select class="form-select" name="type" required>
                                <option value="Student">Student</option>
                                <option value="Admin">Admin</option>
                                <option value="Faculty">Faculty</option>
                                <option value="Librarian">Librarian</option>
                                <option value="Guest">Guest</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Contact</label>
                        <input type="number" name="contact_number"class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="" required>
                        
                    </div>
            </div>
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <button type="submit" name="createUser" class="btn btn-primary">Create User</button>
            </div>
            </form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editUserModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
        <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User Data</h1>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="adminEditUser.php" method="POST">
                <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">
                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control" required >
                        </div>
                        <div class="mb-3"id="password-container">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                            <i id="togglePassword" class="fa fa-eye-slash" aria-hidden="true"></i>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Type</label>
                            <div class="col-sm-6">
                                <select class="form-select" name="type" id="type" required>
                                    <option value="Student">Student</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Faculty">Faculty</option>
                                    <option value="Librarian">Librarian</option>
                                    <option value="Guest">Guest</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Contact</label>
                            <input type="text" name="contact_number" id="contact_number" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Email address</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="" required>
                            
                        </div>					
				</div>
				<div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="updateData"class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteUserModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="adminUserDelete.php" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
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
        // Edit User
        $(document).ready(function() {
            $('.editbtn').on('click',function(){
                $('#editUserModal').modal('show');

                $tr= $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                        return $(this).text();
                }).get();
                console.log(data);
                $('#update_id').val(data[0]);
                $('#username').val(data[1])
                $('#type').val(data[2]);
                $('#contact_number').val(data[3]);
                $('#email').val(data[4]);
                $('#password').val(data[5]);
            });
        });
        //Delete Button
        $(document).ready(function() {
            $('.deletebtn').on('click',function(){
                $('#deleteUserModal').modal('show');

                $tr= $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                        return $(this).text();
                }).get();
                console.log(data);
                $('#delete_id').val(data[0]);
                $('#username').val(data[1])
                $('#type').val(data[2]);
                $('#contact_number').val(data[3]);
                $('#email').val(data[4]);
                $('#password').val(data[5]);
            });
        });
        // Password Toggle
        $(document).ready(function() {
            $("#togglePassword").click(function() {
                var passwordField = $("#pword");
                var type = passwordField.attr("type");
        if (type === "password") {
            passwordField.attr("type", "text");
                $("#togglePassword").removeClass("fa-eye-slash");
                $("#togglePassword").addClass("fa-eye");
        } else {
            passwordField.attr("type", "password");
                $("#togglePassword").removeClass("fa-eye");
                $("#togglePassword").addClass("fa-eye-slash");
            }
        });
    });
    </script>                  

    <script>let table = new DataTable('#UserTable');</script>
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
</html>
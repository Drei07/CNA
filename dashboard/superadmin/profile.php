<?php
include_once '../../database/dbconfig2.php';
require_once 'authentication/superadmin-class.php';
include_once 'controller/select-settings-configuration-controller.php';


$superadmin_home = new SUPERADMIN();

if(!$superadmin_home->is_logged_in())
{
 $superadmin_home->redirect('../../public/superadmin/signin');
}

$stmt = $superadmin_home->runQuery("SELECT * FROM superadmin WHERE superadminId=:uid");
$stmt->execute(array(":uid"=>$_SESSION['superadminSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="../../src/img/<?php echo $logo ?>">
	<link rel="stylesheet" href="../../src/node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../src/node_modules/boxicons/css/boxicons.min.css">
	<link href="../../src/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="../../src/css/sb-admin-2.min.css?v=<?php echo time(); ?>" rel="stylesheet">
	<title>Profile</title>

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="home  ">
				<div class="sidebar-brand-icon rotate-n-15">
					<img src="../../src/img/<?php echo $logo ?>" alt="logo" width="50px">
				</div>
				<div class="sidebar-brand-text mx-3">DHVSU CNA</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="home">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
      <div class="sidebar-heading">
        Main
      </div>

			<!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>Admin</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="admin-data">Data</a>
            <a class="collapse-item" href="add-admin">Add Admin</a>
          </div>
        </div>
      </li>

			<!-- Nav Item - Utilities Collapse Menu -->
			<!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li> -->
			<!-- 
      Divider
      <hr class="sidebar-divider"> -->

			<!-- Heading -->
			<!-- <div class="sidebar-heading">
        Addons
      </div> -->

			<!-- Nav Item - Pages Collapse Menu -->
			<!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li> -->

			<!-- Nav Item - Charts -->

			<li class="nav-item">
				<a class="nav-link" href="user-data">
					<i class="fas fa-fw fa-user"></i>
					<span>User</span></a>
			</li>

			<li class="nav-item active">
				<a class="nav-link" href="profile">
					<i class="fas fa-fw fa-user"></i>
					<span>Profile</span></a>
			</li>

			<li class="nav-item ">
				<a class="nav-link" href="logs">
					<i class="fas fa-fw fa-book"></i>
					<span>Audit trail</span></a>
			</li>


			<!-- Nav Item - Tables -->
			<li class="nav-item">
				<a class="nav-link" href="settings">
					<i class="fas fa-fw fa-wrench"></i>
					<span>Settings</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">


		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Search -->
					<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="input-group">
							<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>

						<!-- Nav Item - Alerts -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-bell fa-fw"></i>
								<!-- Counter - Alerts -->
								<span class="badge badge-danger badge-counter">3+</span>
							</a>
							<!-- Dropdown - Alerts -->
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
								<h6 class="dropdown-header">
									Alerts Center
								</h6>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-primary">
											<i class="fas fa-file-alt text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 12, 2019</div>
										<span class="font-weight-bold">A new monthly report is ready to download!</span>
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-success">
											<i class="fas fa-donate text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 7, 2019</div>
										$290.29 has been deposited into your account!
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-warning">
											<i class="fas fa-exclamation-triangle text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 2, 2019</div>
										Spending Alert: We've noticed unusually high spending for your account.
									</div>
								</a>
								<a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
							</div>
						</li>

						<!-- Nav Item - Messages -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-envelope fa-fw"></i>
								<!-- Counter - Messages -->
								<span class="badge badge-danger badge-counter">7</span>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
								<h6 class="dropdown-header">
									Message Center
								</h6>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="dropdown-list-image mr-3">
										<img class="rounded-circle" src="../../src/img/undraw_profile_1.svg" alt="...">
										<div class="status-indicator bg-success"></div>
									</div>
									<div class="font-weight-bold">
										<div class="text-truncate">Hi there! I am wondering if you can help me with a
											problem I've been having.</div>
										<div class="small text-gray-500">Emily Fowler · 58m</div>
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="dropdown-list-image mr-3">
										<img class="rounded-circle" src="../../src/img/undraw_profile_2.svg" alt="...">
										<div class="status-indicator"></div>
									</div>
									<div>
										<div class="text-truncate">I have the photos that you ordered last month, how
											would you like them sent to you?</div>
										<div class="small text-gray-500">Jae Chun · 1d</div>
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="dropdown-list-image mr-3">
										<img class="rounded-circle" src="../../src/img/undraw_profile_3.svg" alt="...">
										<div class="status-indicator bg-warning"></div>
									</div>
									<div>
										<div class="text-truncate">Last month's report looks great, I am very happy with
											the progress so far, keep up the good work!</div>
										<div class="small text-gray-500">Morgan Alvarez · 2d</div>
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="dropdown-list-image mr-3">
										<img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
										<div class="status-indicator bg-success"></div>
									</div>
									<div>
										<div class="text-truncate">Am I a good boy? The reason I ask is because someone
											told me that people say this to all dogs, even if they aren't good...</div>
										<div class="small text-gray-500">Chicken the Dog · 2w</div>
									</div>
								</a>
								<a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
							</div>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row['name']; ?></span>
								<img class="img-profile rounded-circle" src="../../src/img/<?php echo $profile ?>">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="profile">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profile
								</a>
								<a class="dropdown-item" href="settings">
									<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
									Settings
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Profile</h1>
					</div>

					<!-- PROFILE CONFIGURATION -->

					<section class="profile-form">
				<div class="header"></div>
				<div class="profile">
					<div class="profile-img">
						<img src="../../src/img/<?php echo $profile ?>" alt="logo">

						<a href="controller/delete-profile-controller.php" class="delete"><i class='bx bxs-trash'></i></a>
						<button class="primary change" onclick="edit()"><i class='bx bxs-edit'></i> Edit Profile</button>
						<button class="primary change" onclick="avatar()"><i class='bx bxs-user'></i> Change Avatar</button>
						<button class="primary change" onclick="password()"><i class='bx bxs-key'></i> Change Password</button>

					</div>
					
					<div id="Edit">
					<form action="controller/update-profile-controller.php" method="POST" class="row gx-5 needs-validation" name="form" onsubmit="return validate()"  novalidate style="overflow: hidden;">
						<div class="row gx-5 needs-validation">

							<label class="form-label" style="text-align: left; padding-top: .5rem; padding-bottom: 1rem; font-size: 1rem; font-weight: bold;"><i class='bx bxs-edit'></i> Edit Profile<p>Last update: <?php  echo $superadmin_profile_last_update  ?></p></label>

							<div class="col-md-12">
								<label for="name" class="form-label">Name<span> *</span></label>
								<input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="Name" id="name" required value="<?php  echo $superadmin_name  ?>">
								<div class="invalid-feedback">
								Please provide a Old Password.
								</div>
							</div>

							<div class="col-md-12">
								<label for="email" class="form-label">Email<span> *</span></label>
								<input type="email" class="form-control" autocapitalize="off" autocomplete="off" name="Email" id="email" required value="<?php  echo $superadmin_email  ?>">
								<div class="invalid-feedback">
								Please provide a valid Email.
								</div>
							</div>

							<div class="col-md-12" style="opacity: 0;">
								<label for="sname" class="form-label">Old Password<span> *</span></label>
								<input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="SName" id="sname" required value="<?php  echo $system_name  ?>">
								<div class="invalid-feedback">
								Please provide a Old Password.
								</div>
							</div>

						</div>

						<div class="addBtn">
							<button type="submit" class="primary" name="btn-update" id="btn-update" onclick="return IsEmpty(); sexEmpty();">Update</button>
						</div>
					</form>
					</div>

					<div id="avatar" style="display: none;">
					<form action="controller/update-profile-avatar-controller.php" method="POST" enctype="multipart/form-data" class="row gx-5 needs-validation" name="form" onsubmit="return validate()"  novalidate style="overflow: hidden;">
						<div class="row gx-5 needs-validation">

							<label class="form-label" style="text-align: left; padding-top: .5rem; padding-bottom: 1rem; font-size: 1rem; font-weight: bold;"><i class='bx bxs-user'></i> Change Avatar<p>Last update: <?php  echo $superadmin_profile_last_update  ?></p></label>

							<div class="col-md-12">
								<label for="logo" class="form-label">Upload Logo<span> *</span></label>
								<input type="file" class="form-control" name="Logo" id="logo" style="height: 33px ;" required>
								<div class="invalid-feedback">
								Please provide a Logo.
								</div>
							</div>

							<div class="col-md-12" style="opacity: 0;">
								<label for="email" class="form-label">Default Email<span> *</span></label>
								<input type="email" class="form-control" autocapitalize="off" autocomplete="off" name="" id="email" required value="<?php  echo $system_email  ?>">
								<div class="invalid-feedback">
								Please provide a valid Email.
								</div>
							</div>

							<div class="col-md-12" style="opacity: 0; padding-bottom: 1.3rem;">
								<label for="sname" class="form-label">Old Password<span> *</span></label>
								<input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="" id="sname" required value="<?php  echo $system_name  ?>">
								<div class="invalid-feedback">
								Please provide a Old Password.
								</div>
							</div>

						</div>

						<div class="addBtn">
							<button type="submit" class="primary" name="btn-update" id="btn-update" onclick="return IsEmpty(); sexEmpty();">Update</button>
						</div>
					</form>
					</div>

					<div id="password" style="display: none;">
					<form action="controller/update-password-controller.php" method="POST" class="row gx-5 needs-validation" name="form" onsubmit="return validate()"  novalidate style="overflow: hidden;">
						<div class="row gx-5 needs-validation">

							<label class="form-label" style="text-align: left; padding-top: .5rem; padding-bottom: 1rem; font-size: 1rem; font-weight: bold;"><i class='bx bxs-key'></i> Change Password<p>Last update: <?php  echo $superadmin_profile_last_update  ?></p></label>

							<div class="col-md-12">
								<label for="old_pass" class="form-label">Old Password<span> *</span></label>
								<input type="password" class="form-control" autocapitalize="on" autocomplete="off"  name="Old" id="old_pass" required>
								<div class="invalid-feedback">
								Please provide a Old Password.
								</div>
							</div>

							<div class="col-md-12">
								<label for="new_pass" class="form-label">New Password<span> *</span></label>
								<input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="New" id="new_pass" required>
								<div class="invalid-feedback">
								Please provide a New Password.
								</div>
							</div>

							<div class="col-md-12">
								<label for="confirm_pass" class="form-label">Confirm Password<span> *</span></label>
								<input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="Confirm" id="confirm_pass" required>
								<div class="invalid-feedback">
								Please provide a Confirm Password.
								</div>
							</div>

						</div>

						<div class="addBtn">
							<button type="submit" class="btn-primary" name="btn-update-password" id="btn-update" onclick="return IsEmpty(); sexEmpty();">Update</button>
						</div>
					</form>
					</div>
                </div>
            </section>		
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->

	</div>
	<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="authentication/superadmin-signout">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="../../src/vendor/jquery/jquery.min.js"></script>
	<script src="../../src/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="../../src/js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<script src="../../src/vendor/chart.js/Chart.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="../../src/js/demo/chart-area-demo.js"></script>
	<script src="../../src/js/demo/chart-pie-demo.js"></script>

	<script src="../../src/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="../../src/node_modules/sweetalert/dist/sweetalert.min.js"></script>

	<script>
		// Form
		(function() {
			'use strict'
			var forms = document.querySelectorAll('.needs-validation')
			Array.prototype.slice.call(forms)
				.forEach(function(form) {
					form.addEventListener('submit', function(event) {
						if (!form.checkValidity()) {
							event.preventDefault()
							event.stopPropagation()
						}

						form.classList.add('was-validated')
					}, false)
				})
		})();

		//PROFILE

		window.onpageshow = function() {
			document.getElementById('avatar').style.display = 'none';
			document.getElementById('password').style.display = 'none';
		};

		function edit() {
			document.getElementById('Edit').style.display = 'block';
			document.getElementById('password').style.display = 'none';
			document.getElementById('avatar').style.display = 'none';
		}

		function avatar() {
			document.getElementById('avatar').style.display = 'block';
			document.getElementById('Edit').style.display = 'none';
			document.getElementById('password').style.display = 'none';
		}

		function password() {
			document.getElementById('password').style.display = 'block';
			document.getElementById('avatar').style.display = 'none';
			document.getElementById('Edit').style.display = 'none';
		}

		//numbers only----------------------------------------------------------------------------------------------------->
		$('.numbers').keypress(function(e) {
			var x = e.which || e.keycode;
			if ((x >= 48 && x <= 57) || x == 8 ||
				(x >= 35 && x <= 40) || x == 46)
				return true;
			else
				return false;
		});

		//Delete Profile

		$('.delete').on('click', function(e) {
			e.preventDefault();
			const href = $(this).attr('href')

			swal({
					title: "Delete?",
					text: "Do you want to delete?",
					icon: "info",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						document.location.href = href;
					}
				});
		})
	</script>

	<!-- SWEET ALERT -->
	<?php

	if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
	?>
		<script>
			swal({
				title: "<?php echo $_SESSION['status_title']; ?>",
				text: "<?php echo $_SESSION['status']; ?>",
				icon: "<?php echo $_SESSION['status_code']; ?>",
				button: false,
				timer: <?php echo $_SESSION['status_timer']; ?>,
			});
		</script>
	<?php
		unset($_SESSION['status']);
	}
	?>
</body>

</html>
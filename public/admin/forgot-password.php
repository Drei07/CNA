<?php
include_once '../../dashboard/admin/authentication/admin-forgot-password.php';
include_once '../../dashboard/superadmin/controller/select-settings-configuration-controller.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../../src/img/<?php echo $logo ?>">
	<link rel="stylesheet" type="text/css" href="../../src/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../src/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../src/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../../src/vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="../../src/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../../src/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../../src/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="../../src/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../../src/css/util.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="../../src/css/main.css?v=<?php echo time(); ?>">

	<script src="https://www.google.com/recaptcha/api.js?render=<?php echo $SiteKEY ?>"></script>

    <title>Admin | Forgot Password?</title>
</head>
<body>
<div class="container-login100">
		<div class="wrap-login100">
			<form action="../../dashboard/admin/authentication/admin-forgot-passwor" method="POST" novalidate="" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
				<span class="login100-form-title">
					Forgot Password?
				</span>


				<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
					<input class="input100" type="text" name="email" placeholder="email">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" style="opacity: 0;" data-validate="Please enter password">
					<input class="input100" type="" name="" placeholder="">
					<span class="focus-input100"></span>
				</div>

				<div class="text-right p-t-13 p-b-23">
					<span class="txt1">
						Back
					</span>

					<a href="signin" class="txt2">
						Signin >
					</a>
				</div>

				<div class="container-login100-form-btn">
					<button type="submit" name="btn-forgot-password" id="submit" class="login100-form-btn">
						Send
					</button>
				</div><br><br>
			</form>
		</div>
	</div>

	<script src="../../src/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../../src/vendor/animsition/js/animsition.min.js"></script>
	<script src="../../src/vendor/bootstrap/js/popper.js"></script>
	<script src="../../src/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../src/vendor/select2/select2.min.js"></script>
	<script src="../../src/vendor/daterangepicker/moment.min.js"></script>
	<script src="../../src/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="../../src/vendor/countdowntime/countdowntime.js"></script>
	<script src="../../src/js/main.js"></script>
	<script src="../../src/node_modules/sweetalert/dist/sweetalert.min.js"></script>
	<script src="../../src/node_modules/jquery/dist/jquery.min.js"></script>


	<script>

		// CAPTCHA
		grecaptcha.ready(function() {
		grecaptcha.execute('<?php echo $SiteKEY ?>', {action: 'submit'}).then(function(token) {
			document.getElementById("g-token").value = token;
		});
		});

	</script>

<!-- SWEET ALERT -->
<?php

	if(isset($_SESSION['status']) && $_SESSION['status'] !='')
	{
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
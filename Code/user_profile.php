<?php
	session_start();
	require "config.php";
	require "databasefunctions.php";
	$flag = false;
	
	if(isset($_POST['submit'])){
		$flag = true;
		$upd = updateUser($_SESSION['userid'],$_POST['password'],$_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['phonenumber']);
	}
	
	$cust = getUser($_SESSION['userid']);
?>

<!doctype html>
<html lang="en">

<head>
	<title>My Profile</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS v5.2.1 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<script defer src="https://kit.fontawesome.com/03a7f19bd7.js" crossorigin="anonymous"></script>
	<link rel="shortcut icon" type="image/x-icon" href="logo.png" />
	<link rel="stylesheet" href="profiles.css">
	<link rel="stylesheet" href="foot.css">
	<link rel="stylesheet" href="head.css">
</head>

<body class="back">
	<header>
		<!-- place navbar here -->
		<?php
			require "head.php";
			?>
	</header>
	<main class="back">
		<form action="user_profile.php" method="POST" class="form-control back">
			<div class="container border border-dark bg-light my-5 py-4 ps-5" style="border-radius: 10px;">

				<div class="row justify-content-start align-items-center my-4">
					<div class="col col-1">User Name</div>
					<div class="col col-10"> <input disabled value="<?php echo $_SESSION['username']; ?>" type="text" name="usr"class="form-control form-control-lg w-100"> </div>
					<div class="col col-1"></div>
				</div>

				<div class="row justify-content-start align-items-center my-4">
					<div class="col col-1">First name</div>
					<div class="col col-4"> <input value="<?php echo $cust['C_FirstName']; ?>" type="text" name="fname"class="form-control form-control-lg w-100"> </div>

					<div class="col col-1 text-center"><!--spacer--></div>

					<div class="col col-1">Last name</div>
					<div class="col col-4"> <input value="<?php echo $cust['C_LastName']; ?>" type="text" name="lname"class="form-control form-control-lg w-100"> </div>

					<div class="col col-1 text-center"></div>
				</div>

				<div class="row justify-content-start align-items-center my-4">
					<div class="col col-1">Password</div>
					<div class="col col-4"> <input required value="<?php echo $cust['C_Pass']; ?>" type="password" name="password"class="form-control form-control-lg w-100"> </div>

					<div class="col col-1 text-center"></div>

					<div class="col col-1">Phone no.</div>
					<div class="col col-4"> <input value="<?php echo $cust['C_Phone']; ?>" type="tel" name="phonenumber"class="form-control form-control-lg w-100"> </div>

					<div class="col col-1 text-center"></div>
				</div>

				<div class="row justify-content-start align-items-center my-4">

					<div class="col col-1">Email</div>
					<div class="col col-10"> <input required value="<?php echo $cust['C_Email']; ?>" type="email" name="email"class="form-control form-control-lg w-100"> </div>

					<div class="col col-1"></div>
				</div>
				
				<div class="row justify-content-center align-items-center my-4">
					<div class="col col-9"></div>
					<div class="col col-2"><input type="submit" class="btn btn-outline-success btn-lg w-100" name="submit" value="Update"></div>
					<div class="col col-1"></div>
				</div>

			</div>
		</form>
		<?php
			if($flag && $upd){
				?>
				<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fixed-bottom m-5 ms-auto"
					data-bs-autohide="false">
					<div class="toast-header">
						<strong class="me-auto">
						<i class="fa-solid fa-circle-check" style="color: greenyellow;"></i>
						&nbsp; Hooray!</strong>
						<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
					<div class="toast-body">
						The update is successful!
					</div>
				</div>
				<script>
					window.onload = (event) => {
						let myAlert = document.querySelector('.toast');
						let bsAlert = new bootstrap.Toast(myAlert);
						
						setTimeout(function () {
							bsAlert.show();
						}, 10);
					};
				</script>
				<?php
			} elseif($flag && !$upd) {

				?>
				<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fixed-bottom m-5 ms-auto"
					data-bs-autohide="false">
					<div class="toast-header">
						<strong class="me-auto">
						<i class="fa-solid fa-circle-xmark" style="color: red;"></i>
						&nbsp; OOPS!</strong>
						<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
					<div class="toast-body">
						The update wasn't successful, Please check your input.
					</div>
				</div>
				<script>
					window.onload = (event) => {
						let myAlert = document.querySelector('.toast');
						let bsAlert = new bootstrap.Toast(myAlert);
						
						setTimeout(function () {
							bsAlert.show();
						}, 10);
					};
				</script>
				
				<?php
			}
		?>
	</main>
	<footer>
		<!-- place footer here -->
		<?php
            include "foot.html";
			?>
	</footer>
	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
		integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
		integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
	</script>
</body>

</html>
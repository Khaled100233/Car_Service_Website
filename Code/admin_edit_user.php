<?php 
session_start();
if(!$_SESSION['Admin']){
	header("Location: Home.php");
}
?>
<?php
require "config.php";
require "databasefunctions.php";


$user = getUser($_GET['uid']);

?>

<!doctype html>
<html lang="en">

<head>
  <title>Edit User</title>
  	<!-- Required meta tags -->
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  	<!-- Bootstrap CSS v5.2.1 -->
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="shortcut icon" type="image/x-icon" href="logo.png" />
	<!--link rel="stylesheet" href="profile.css"-->
	<link rel="stylesheet" href="foot.css">
	<link rel="stylesheet" href="head.css">
</head>

<body class="back">
	<header>
		<!-- place navbar here -->
		<?php 
		require "admin_head.html";
		?>
	</header>
	<main class="back">
		<form action="admin_update_user.php?uid=<?php echo $user['C_ID']; ?>" method="POST" class="form-control back">
			<div class="container border border-dark bg-light my-5 py-4 ps-5" style="border-radius: 10px;">

				<div class="row justify-content-start align-items-center my-4">
					<div class="col col-1">User Name</div>
					<div class="col col-10"> <input value="<?php echo $user['C_UserName']; ?>" type="text" name="usern"class="form-control form-control-lg w-100"> </div>
					<div class="col col-1"></div>
				</div>

				<div class="row justify-content-start align-items-center my-4">
					<div class="col col-1">First name</div>
					<div class="col col-4"> <input value="<?php echo $user['C_FirstName']; ?>" type="text" name="fname"class="form-control form-control-lg w-100" disabled> </div>

					<div class="col col-1 text-center"><!--spacer--></div>

					<div class="col col-1">Last name</div>
					<div class="col col-4"> <input value="<?php echo $user['C_LastName']; ?>" type="text" name="lname"class="form-control form-control-lg w-100" disabled> </div>

					<div class="col col-1 text-center"></div>
				</div>

				<div class="row justify-content-start align-items-center my-4">
					<div class="col col-1">Password</div>
					<div class="col col-4"> <input value="<?php echo $user['C_Pass']; ?>" type="password" name="password"class="form-control form-control-lg w-100" disabled> </div>

					<div class="col col-1 text-center"></div>

					<div class="col col-1">Phone no.</div>
					<div class="col col-4"> <input value="<?php echo $user['C_Phone']; ?>" type="tel" name="phonenumber"class="form-control form-control-lg w-100" disabled> </div>

					<div class="col col-1 text-center"></div>
				</div>

				<div class="row justify-content-start align-items-center my-4">

					<div class="col col-1">Email</div>
					<div class="col col-10"> <input value="<?php echo $user['C_Email']; ?>" type="email" name="email"class="form-control form-control-lg w-100" disabled> </div>

					<div class="col col-1"></div>
				</div>
				
				<div class="row justify-content-center align-items-center my-4">
					<div class="col col-2"><a href="admin_veiw_users.php" type="submit" class="btn btn-warning btn-lg w-100" value="Back">Back</a></div>
					<div class="col col-5"></div>
					<div class="col col-2"><input type="submit" class="btn btn-outline-success btn-lg w-100" value="Update"></div>
					<div class="col col-2"><a href="admin_delete_user.php?uid=<?php echo $user['C_ID']; ?>" class="btn btn-outline-danger btn-lg w-100">Delete</a>
					<div class="col col-1"></div>
				</div>

			</div>
		</form>
	</main>

	<footer>
		<!-- place footer here -->

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
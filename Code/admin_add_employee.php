<?php 
session_start();
if(!$_SESSION['Admin']){
	header("Location: Home.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  	<title>Add Employee</title>
  	<!-- Required meta tags -->
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  	<!-- Bootstrap CSS v5.2.1 -->
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="shortcut icon" type="image/x-icon" href="logo.png" />

	<link rel="stylesheet" href="foot.css">
	<link rel="stylesheet" href="head.css">
</head>

<body>
	<header>
		<!-- place navbar here -->
		<?php 
		require "admin_head.html";
		?>
		
	</header>
	<main>
		<div class="container d-grid gap-2 mt-5 my-2">
			<div class="container">
				<div class="col text-center wd-100"> <a href="admin.php" type="button" class="btn btn-primary" style="width: 100%;">HOME</a> </div>
			</div>
		</div>
		<div class="container">
			<form method="POST" action="admin_add_employee_controller.php">
				<div class="mb-3 my-2 row">
					<label for="inputName" class="col-2 col-form-label">Employee Name</label>
					<div class="col-10">
						<input type="text" class="form-control form-control-lg" name="inputName" id="inputName" placeholder="Username">
					</div>
				</div>
				<div class="row my-2 mb-3">
					<label for="inputPassword" class="col-2 col-form-label">Password</label>
					<div class="col-10">
						<input type="password" class="form-control form-control-lg" name="inputPass" id="inputPassword" placeholder="Password">
					</div>
				</div>
				<div class="row input-group mb-3">					
					<div class="col col-2">
						Job title
					</div>
					<div class="col col-2 ms-1">
						<input type="radio" class="btn-check" name="job" value="manager" id="success-outlined" autocomplete="off">
						<label class="btn btn-outline-secondary w-100" for="success-outlined">Manager</label>
					</div>
					<div class="col col-2">
						<input type="radio" class="btn-check" name="job" value="admin" id="danger-outlined" autocomplete="off">
						<label class="btn btn-outline-secondary w-100" for="danger-outlined">Admin</label>
					</div>
					<div class="col col-6"></div>
				</div>
				
			</div>
		</main>
		<footer>
			<!-- place footer here -->
			<div class="container d-grid gap-2">
				<div class="row container">
					<div class="col col-10"></div>
					<div class="col d-grid gap-2 col-2 text-center my-2"> <button type="submit" class="  btn btn-outline-success" style="width: 100%;">ADD</button> </div>
				</div>
			</div>
		</footer>
	</form>
	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
		integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
		integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
	</script>
</body>

</html>
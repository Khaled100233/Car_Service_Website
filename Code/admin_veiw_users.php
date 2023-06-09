<?php 
session_start();
if(!$_SESSION['Admin']){
	header("Location: Home.php");
}
?>

<?php
require "config.php";
require "databasefunctions.php";


$users = getUsers();

?>

<!doctype html>
<html lang="en">

<head>
  <title>Veiw User</title>
  	<!-- Required meta tags -->
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  	<!-- Bootstrap CSS v5.2.1 -->
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	
	<script defer src="https://kit.fontawesome.com/03a7f19bd7.js" crossorigin="anonymous"></script>
	<link rel="shortcut icon" type="image/x-icon" href="logo.png" />


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
		<div class="container my-3">
			<div class="table-responsive rounded-3">
				<table class="table table-light table-hover">
					<thead class="table-primary">
						<tr heigh="50px">
							<th scope="col" width="10%">ID</th>
							<th scope="col" width="20%">Username</th>
							<th scope="col" width="30%">Email</th>
							<th scope="col" width="20%">Phone no.</th>
							<th scope="col" width="20%" class="text-center">Update/Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($users as $customer){ ?>
						<tr class="table-group-divider">
							<th scope="row">#<?php echo $customer['C_ID']; ?></th>
							<td scope="row" ><?php echo $customer['C_UserName']; ?></td>
							<td><?php echo $customer['C_Email']; ?></td>
							<td><?php echo $customer['C_Phone']; ?></td>
							<td class="text-center">
								<a class="btn btn-warning" href="admin_edit_user.php?uid=<?php echo $customer['C_ID']; ?>" name="edit" value="edit"><i class="fa-solid fa-pencil"></i></a>
								<a class="btn btn-danger" href="admin_delete_user.php?uid=<?php echo $customer['C_ID']; ?>" name="delete" value="Delete"><i class="fa-solid fa-user-xmark"></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			
		</div>
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
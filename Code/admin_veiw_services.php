<?php 
session_start();
if(!$_SESSION['Admin']){
	header("Location: Home.php");
}
?>
<?php
require "config.php";
require "databasefunctions.php";


$services = getServices();

?>

<!doctype html>
<html lang="en">

<head>
  <title>Veiw Services</title>
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
				<table class="table table-light table-hover text-break">
					<thead class="table-primary">
						<tr heigh="50px">
							<th scope="col" width="10%">ID</th>
							<th scope="col" width="20%">Service Name</th>
							<th scope="col" width="10%">Price $</th>
							<th scope="col" width="40%">Description</th>
							<th scope="col" width="20%" class="text-center">Update/Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($services as $service) { ?>
						<tr class="table-group-divider">
							<th scope="row">#<?php echo $service['S_ID']; ?></th>
							<td scope="row" ><?php echo $service['S_Name']; ?></td>
							<td><?php echo $service['S_Price']; ?></td>
							<td><?php echo $service['S_Desc']; ?></td>
							<td class="text-center">
								<a class="btn btn-warning" href="admin_edit_services.php?sid=<?php echo $service['S_ID']; ?>" name="edit" value="edit"><i class="fa-solid fa-pencil"></i></a>
								<a class="btn btn-danger" href="admin_delete_service.php?sid=<?php echo $service['S_ID']; ?>" name="delete" value="Delete"><i class="fa-solid fa-xmark"></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			
		</div>
	</main>

	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
		integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
		integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
	</script>
</body>

</html>
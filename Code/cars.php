<?php
	require "config.php";
	require "databasefunctions.php";
	session_start();
	$flag =false;
	
	if(isset($_GET['cc'])){
		$false = true;
		$del = deleteCar($_GET['cc']);
		header("Location: cars.php");
	}

	$cars = getCars($_SESSION['userid']);
?>


<!doctype html>
<html lang="en">

<head>
  <title>My Cars</title>
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
	<link rel="stylesheet" href="userCars.css">
</head>

<body class="back">
	<header>
		<!-- place navbar here -->
		<?php
			require "head.php";
		?>
	</header>
	<main>
		<div class="container">
			<?php
				if(empty($cars)){
					?>
					
					<script>
						window.onload = function() {

							window.alert("You have no cars! Try adding some.");
						}
					
					</script>
					<?php
				}
			?>
			<div class="table-responsive border border-dark rounded-3 " id="cartable">
				<table class="table table-light table-hover">
					<thead class="table-secondary">
						<tr>
							<th scope="col" width="35%">Car Name</th>
							<th scope="col" width="45%">Plate Number</th>
							<th scope="col" width="20%"></th>
						</tr>
					</thead>
					<tbody>

						<?php
						
							foreach($cars as $car){
						?>

						<tr class="trow">
							<td scope="row" >
								<?php echo $car['Name']; ?>
							</td>
							<td>
								<?php echo $car['CC_PlateNumber']; ?>
							</td>
							<td>
								<a href="cars_edit.php?cc=<?php echo $car['CC_ID'] ?>" class="btn btn-light border-dark"><i class="fa-solid fa-pen-to-square"></i></a>
								&nbsp;&nbsp;
								<a href="cars.php?cc=<?php echo $car['CC_ID'] ?>" class="btn btn-outline-danger"><i class="fa-solid fa-xmark"></i></a>
							</td>
						</tr>

						<?php } ?>
						
					</tbody>
				</table>
			</div>
			<div class="row">
				<div class="col-sm-9"></div>
				<div class="col-sm-3">
						<a id="addbut" href="cars_add.php" class="btn btn-success w-100">Add New Car</a>
				</div>
			</div>

			
		</div>
		
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
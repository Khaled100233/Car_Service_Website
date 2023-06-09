<?php 
session_start();
if(!$_SESSION['Admin']){
	header("Location: Home.php");
}
?>
<?php
require "config.php";
require "databasefunctions.php";


$service = getService($_GET['sid']);

?>

<!doctype html>
<html lang="en">

<head>
  <title>Edit Service</title>
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
		<form action="admin_update_service.php?sid=<?php echo $service['S_ID']; ?>" method="POST" class="form-control back">
			<div class="container border border-dark bg-light my-5 py-4 ps-5" style="border-radius: 10px;">

				<div class="mb-3 my-2 row">
					<label for="inputName" class="col-2 col-form-label">Service Name</label>
					<div class="col-7">
						<input type="text" class="form-control form-control-lg" name="inputName" id="inputName" placeholder="Name" value="<?php echo $service['S_Name']; ?>">
					</div>
					<label for="inputPrice" class="col-1 col-form-label">Price</label>
					<div class="col-2">
						<input type="text" onkeydown="adminVerifyAddPrice()" class="form-control form-control-lg" name="inputPrice" id="inputPrice" placeholder="price" value="<?php echo $service['S_Price'];?>">
					</div>
				</div>
				<div class="mb-3">
					<label for="exampleFormControlTextarea1" class="form-label">Description</label>
					<textarea class="form-control" name="inputDesc" id="exampleFormControlTextarea1" rows="3" placeholder="Description"><?php echo $service['S_Desc']; ?></textarea>
				</div>
				<div class="input-group mb-3">
					
					<div class="input-group-text">
						<label for="formCheck" class="form-label pt-1">Require parts &nbsp;</label>
					  	<input class="form-check-input mt-0" name="inputR[]" type="checkbox" value="yes" aria-label="Checkbox for following text input" id="formCheck" <?php if($service['RequirePart']) echo "checked"; ?>>
					</div>
					<input type="text" class="form-control" aria-label="Text input with checkbox">
				</div>
				<div class="mb-3">
					<label for="formFile" class="form-label">Image</label>
					<input name="inputLink" class="form-control" value="<?php echo $service['S_Link']; ?>" type="text" id="formFile">
				</div>
				<div class="row container">
					<div class="col d-grid gap-2 col-2 text-center my-2"> <a href="admin_veiw_services.php" type="button" class="btn btn-warning" style="width: 100%;">BACK</a> </div>
					<div class="col col-8"></div>
					<div class="col d-grid gap-2 col-2 text-center my-2"> <button type="submit" class="btn btn-outline-success" style="width: 100%;">UPDATE</button> </div>
				</div>
			</div>
		</form>
	</main>

	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
		integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
		integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
	</script>
	<script src="verification.js">
		
		</script>
</body>

</html>
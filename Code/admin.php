<?php 
session_start();
if(!$_SESSION['Admin']){
	header("Location: Home.php");
}
?>

<!doctype html>
<html lang="en">

<head>
  	<title>Admin Page</title>
  	<!-- Required meta tags -->
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  	<!-- Bootstrap CSS v5.2.1 -->
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="shortcut icon" type="image/x-icon" href="logo.png" />

	<link rel="stylesheet" href="foot.css">
    <link rel="stylesheet" href="head.css">
	<style>
		.headul{
		position: relative;
		left: 16%;
		}

		.headul li a{
		line-height: 80px;
		color: rgb(61, 209, 204);
		padding: 12px 30px;
		text-decoration: none;
		font-size: 17px;
		font-weight: bold;
		text-transform: uppercase;
		transition: 0.5s;
		border: 1px;
		}

		.headul li a:hover{
		background-color: rgba(8, 8, 8, 0.7);
		border-radius: 6px;
		color: rgb(220, 223, 223);
		}
	</style>
</head>

<body>
	<header>
		<!-- place navbar here -->
		<?php 
		require "admin_head.html";
		?>
	</header>
	<main>

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
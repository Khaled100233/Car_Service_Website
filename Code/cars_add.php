<?php
	session_start();
	require "config.php";
	require "databasefunctions.php";
	$flag = false;
	
	if(isset($_POST['submit'])){
		$flag = true;
		if(addCar($_POST['ctype'],$_POST['cyear'],$_POST['pltn'],$_SESSION['userid'])){
            header("Location: cars.php");
        }
        else {
            ?>
                <script>
                    window.onload = function() {
                        window.alert("The addition wasn't successful.");
                    }
                </script>
            <?php
        }
	}
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
	<script>
		let verifyCarYear = () => {
			let inputS = document.getElementById('carY').value;
			if(inputS == ""){
				document.getElementById('carY').classList.remove('is-valid');
				document.getElementById('carY').classList.remove('is-invalid');
				console.log("what");
				return;
			}
			let input = Number(inputS);
			if(!Number.isInteger(input) || inputS.length < 4 || inputS.length > 4 || input > new Date().getFullYear()){
				if(!document.getElementById('carY').classList.contains('is-invalid')){
					if(document.getElementById('carY').classList.contains('is-valid')){
						document.getElementById('carY').classList.remove('is-valid');
					}
					document.getElementById('carY').classList.add('is-invalid');
					document.getElementById("buybtn").setAttribute("disabled","true");
				}
				return;
			}
			if(document.getElementById('carY').classList.contains('is-invalid')){
				document.getElementById('carY').classList.remove('is-invalid');
			}
			document.getElementById('carY').classList.add('is-valid');
    		document.getElementById("buybtn").removeAttribute("disabled");
		}
	</script>
	<main>
		<form action="cars_add.php" method="POST" class="form-control" style="background: transparent !important; margin-bottom: 10%;">
			<div class="container border border-dark bg-light my-5 py-4 ps-5" style="border-radius: 10px;">

				<div class="row justify-content-start align-items-center my-4">
					<div class="col col-1">Plate Number</div>
					<div class="col col-10"> <input required type="text" name="pltn" class="form-control form-control-lg w-100"> </div>
					<div class="col col-1"></div>
				</div>

				<div class="row justify-content-start align-items-center my-4">
					<div class="col col-1">Type</div>
					<div class="col col-4"> <input required type="text" name="ctype" id="carYear" class="form-control form-control-lg w-100"> </div>

					<div class="col col-1 text-center"><!--spacer--></div>

					<div class="col col-1">Year</div>
					<div class="col col-4"> <input id="carY" required oninput="verifyCarYear()" onkeydown="verifyCarYear()" type="text" name="cyear"class="form-control form-control-lg w-100"> </div>

					<div class="col col-1 text-center"></div>
				</div>

				
				<div class="row justify-content-center align-items-center my-4">
					<div class="col col-9"></div>
					<div class="col col-2"><input id="buybtn" type="submit" class="btn btn-outline-success btn-lg w-100" name="submit" value="Add Car"></div>
					<div class="col col-1"></div>
				</div>

			</div>
		</form>
		
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
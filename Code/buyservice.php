<?php
    require "config.php";
    require "databasefunctions.php";
    session_start();

    if(!isset($_SESSION['userid'])){
        header("Location: Home.php");
        die();
    }

    $cars = getCars($_SESSION['userid']);
    $services = getServices();
?>

<!doctype html>
<html lang="en">

<head>
  <title>Buy a service</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <script src="https://kit.fontawesome.com/03a7f19bd7.js" crossorigin="anonymous"></script>

    <link rel="shortcut icon" type="image/x-icon" href="logo.png" />
    <link rel="stylesheet" href="foot.css">
    <link rel="stylesheet" href="head.css">
    <link rel="stylesheet" href="buyservices.css">

    
</head>

<body class="back">
  <header>
            <?php
                require "head.php";
            ?>
  </header>
  <main>
        <form name="buyingS" action="buy_service_controller.php" method="POST" class="form-control" style="background: transparent !important; margin-bottom: 10%;">
			<div class="container border border-dark bg-light my-5 py-4 ps-5" style="border-radius: 10px;">

				<div class="row justify-content-start align-items-center my-4">
					<div class="col col-1">Car</div>
					<div class="col col-10"> <select class="form-select" name="userCar" id="">
                        <?php foreach($cars as $car){ ?>
                            <option value="<?php echo $car['CC_ID']; ?>"><?php echo $car['Name'] ?></option>
                        <?php } ?>
                    </select> </div>
					<div class="col col-1"></div>
				</div>

				<div class="row justify-content-start align-items-center my-4">
                    <script>
                        let checkServices = () => {
                            let a = document.forms["buyingS"];
                            let x =a.querySelectorAll('input[type="checkbox"]:checked');
                            console.log("I am here");
                            if(x.length > 0){
                                document.getElementById("buybtn").removeAttribute("disabled");
                            }
                            else {
                                document.getElementById("buybtn").setAttribute("disabled","true");
                            }
                        }
                    </script>
                    <div class="col-1">Services</div>
					<?php $i=1; foreach($services as $service) { 
                        if($i%11==0){
                            ?>
                            <div class="col-1"></div>
                            <?php
                        }
                        ?>
                        <div class="col hiii">
                            <input onclick="checkServices()" name="serve[]" value="<?php echo $service['S_ID']; ?>" type="checkbox" class="btn-check" id="SE<?php echo $service['S_ID']; ?>" autocomplete="off">
                            <label class="hiii btn btn-outline-primary" for="SE<?php echo $service['S_ID']; ?>"><?php echo $service['S_Name']; ?></label>
                        </div>
                    <?php $i++; }?>
                    
				</div>

				
				<div class="row justify-content-center align-items-center my-4">
					<div class="col col-1"></div>
                    <div class="col-7"></div>
                    <div class="col-1"> <a href="services.php" type="button" class="btn btn-warning" style="width: 100%;">BACK</a> </div>
					<div class="col col-2">
                        <!-- Button trigger modal -->
                        <button id="buybtn" type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#exampleModal" disabled>
                        BUY NOW
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to buy these services? <br>
                                An Email will be sent after confirmation <br>
                                If you want to cancel, Contact Us!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                            </div>
                        </div>
                        </div>
                </div>
					<div class="col col-1"></div>
				</div>

			</div>
		</form>
  </main>
  <footer>
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
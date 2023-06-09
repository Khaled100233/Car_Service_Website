<?php 
session_start();
if(!$_SESSION['Manager']){
	header("Location: Home.php");
}

require "config.php";
require "databasefunctions.php";

$sales = getReceiptSales();

?>

<!doctype html>
<html lang="en">

<head>
  <title>Manager Home</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<script defer src="https://kit.fontawesome.com/03a7f19bd7.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="head.css">
    <link rel="shortcut icon" type="image/x-icon" href="logo.png"/>


</head>

<body>
  <header>
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">		
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto ml-md-4 headul">
                        <li>
                            <a href="logout.php">logout</a>
                        </li>
                    </ul>
                    <h3 class="wady">Welcome Manager &nbsp; <i class="fa-solid fa-user"></i> </h3> 
                </div>
            </div>
        </nav>
  </header>
  <main>
        <div>
            <canvas height="100" id="myChart"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
        const ctx = document.getElementById('myChart');
        let x = <?php echo json_encode($sales[0]); ?>;
        console.log(x);
        let y = <?php echo json_encode($sales[1]); ?>;
        console.log(y);

        new Chart(ctx, {
                type: 'line',
                data: {
                labels: x,
                datasets: [{
                    label: 'Sales vs Time(Month Year)',
                    data: y,
                    borderColor: 'rgba(14, 26, 244, 0.4)',
                    backgroundColor: 'rgba(240, 22, 207, 0.4)',
                    borderWidth: 1
                }]
            },
            
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Sales'
                    }
                },
                scales: {
                    y: {
                    beginAtZero: true
                    }
                },
                layout: {
                    padding: 50
                }
            }
        });
        </script>
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
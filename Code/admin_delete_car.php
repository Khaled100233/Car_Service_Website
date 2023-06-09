<?php 
session_start();
if(!$_SESSION['Admin']){
	header("Location: Home.php");
}
?>
<?php
	require "config.php";
	require "databasefunctions.php";
	
	if(isset($_GET['ccid'])){
		$del = deleteCar($_GET['ccid']);
		header("Location: admin_veiw_cars.php");
	}
?>
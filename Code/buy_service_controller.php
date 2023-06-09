<?php
require "config.php";
require "databasefunctions.php";

$carid = $_POST['userCar'];
$chosenServices = $_POST['serve'];
$services = getServices();
$totalPrice = 0;

//getting prices and calculating total
foreach($chosenServices as $chosen){
    $totalPrice += $services[$chosen]['S_Price'];
}

$newRid = addReceipt($totalPrice,date("Y-m-d"),$carid);

//binding receipt with services
$mysqli = new mysqli(SERVER,DBUSER,DBPASS,DBNAME);
if($mysqli->connect_error) {
    exit('Error connecting to database'); //Should be a message a typical user could understand in production
  }
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$stmt = $mysqli -> prepare("INSERT INTO `service_receipt`(`S_ID`, `R_ID`) VALUES (?,?)");
foreach($chosenServices as $chosen){
    $stmt -> bind_param("ii",$chosen,$newRid);
    $stmt -> execute();
}
$stmt -> close();
$mysqli -> close();




header("Location: Home.php");

?>
<?php 
session_start();
if(!$_SESSION['Admin']){
	header("Location: Home.php");
}
?>
<?php 
require "config.php";
require "databasefunctions.php";

$name = $_POST['inputName'];
$pass =  $_POST['inputPass'];
$job =  $_POST['job'];

if($job == "admin"){
    $done = addEmployee($name,$pass,0,1);
}
elseif($job == "manager") {
    $done = addEmployee($name,$pass,1,0);
}

header("Location: admin_add_employee.php");



?>
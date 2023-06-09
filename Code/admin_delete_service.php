<?php 
session_start();
if(!$_SESSION['Admin']){
	header("Location: Home.php");
}
?>
<?php 
require "config.php";
require "databasefunctions.php";

$id = $_GET['sid'];
$done = deleteService($id);
header("Location: admin_veiw_services.php");
?>
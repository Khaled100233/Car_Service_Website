<?php 
session_start();
if(!$_SESSION['Admin']){
	header("Location: Home.php");
}
?>
<?php
require "config.php";
require "databasefunctions.php";

$done = setToComplete($_GET['rid']);
header("Location: admin_veiw_receipts.php");

?>
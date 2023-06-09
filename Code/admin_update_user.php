<?php 
session_start();
if(!$_SESSION['Admin']){
	header("Location: Home.php");
}
?>
<?php 
require "config.php";
require "databasefunctions.php";

$done = updateUserName($_GET['uid'],$_POST['usern']);


header("Location: admin_veiw_users.php");



?>
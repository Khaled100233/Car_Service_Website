<?php 
session_start();
if(!$_SESSION['Admin']){
	header("Location: Home.php");
}
?>
<?php 
require "config.php";
require "databasefunctions.php";

$id = $_GET['uid'];
$done = deleteUser($id);
$donecars = deleteCars($id);
header("Location: admin_veiw_users.php");
?>
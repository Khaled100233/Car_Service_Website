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
$price =  $_POST['inputPrice'];
$desc =  $_POST['inputDesc'];
$require = isset($_POST['inputR']);
$link =  $_POST['inputLink'];

if($require){
    $require = 1;
}
else {
    $require = 0;
}

$done = updateService($_GET['sid'],$name,$price,$desc,$require,$link);


header("Location: admin_veiw_services.php");



?>
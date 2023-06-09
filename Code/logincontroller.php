<?php 

session_start();

require "config.php";
require "databasefunctions.php";

$username = $_POST['lusername'];
$userpass = $_POST['luserpass'];

if(userLogin($username,$userpass)){
    header("Location: Home.php");
    exit();
}
if(empLogin($username,$userpass)){
    if($_SESSION['Manager']){
        header("Location: manager.php");
        exit();
    }elseif($_SESSION['Admin']){
        header("Location: admin.php");
        exit();
    }

}

header("Location: logsign.php");


?>
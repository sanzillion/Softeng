<?php 
session_start();
include "../process/functions.php";
$db = connect();

$_SESSION['error']='none';

header('Location:../pages/admin.php#popup');

?>
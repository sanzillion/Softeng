<?php 
session_start();
include "../process/functions.php";
$db = connect();

$_SESSION['error']='none';
$_SESSION['id']=$_GET['id'];

header('Location:../pages/meeting.php#popup');

?>
<?php
session_start();
include "../process/functions.php";
if(!isset($_SESSION['admin'])){
	header('Location: ../index.php?error=2');
}
 ?>

<?php
session_start();
include "../process/functions.php";
if(!isset($_SESSION['admin'])){
	header('Location: ../index.php?error=2');
}

$db = connect();

if(isset($_GET['action']) && $_GET['action']=='delete'){
	$id_sanc = $_GET['id'];
	deleteone($id_sanc);
	header('Location: ../pages/sanction.php');
}
elseif(isset($_GET['action']) && $_GET['action']=='deleteall'){
	deleteallsanction();
	header('Location: ../pages/sanction.php');
}

if(isset($_POST['delete'])){
	deletebulletin();
	if(unlink($_SESSION['src'])){
		echo "deleted";
	}
	else {
		echo "not deleted";
	}
	header('Location: ../pages/index.php?success');
}

?>

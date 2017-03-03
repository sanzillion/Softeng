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

if(isset($_GET['action']) && $_GET['action']=='deleteadmins'){
	if(deleteadmins()){
		header('Location: ../pages/superuser.php?succes');
	}
	else{
		header('Location: ../pages/superuser.php?error=2');
	}
}

if(isset($_POST['d-log'])){
	if(dLog()){
		header('Location: ../pages/superuser.php?success=2');
	}
	else{
		header('Location: ../pages/superuser.php?error=2');
	}
}

if(isset($_POST['d-system'])){
	$meet = [];
  foreach (getdescription2() as $g) {
    $meet[] = $g['description'];
  }
  $arraycount = count(getdescription());
	for ($x = 0; $x < $arraycount; $x++){
		$query = $db->prepare("ALTER TABLE `sanction` DROP `$meet[$x]`");
		$query->execute();
	}

	if(deleteallmeetings() && deleteall() && deleteallsanction()){
		header('Location: ../pages/superuser.php?success=2');
	}
	else{
		header('Location: ../pages/superuser.php?error=2');
	}
}

?>

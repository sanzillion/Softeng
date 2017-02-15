<?php
session_start();
include "../process/functions.php";
if(!isset($_SESSION['admin'])){
	header('Location: ../pages/login.php?error2');
}

$db = connect();

if(isset($_GET['action']) && $_GET['action']=='deleteall'){
	$getmeet = getdescription();

  $meet = [];
  foreach (getdescription() as $g) {
    $meet[] = $g->description;
  }
      //CLEAN THESE
  $arraycount = count($getmeet);

	for ($x = 0; $x < $arraycount; $x++){
		$query = $db->prepare("ALTER TABLE `sanction` DROP `$meet[$x]`");
		$query->execute();
	}

	if(deleteallmeetings()){
		header('Location: ../pages/meetings.php');
	}

}

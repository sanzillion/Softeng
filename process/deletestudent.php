<?php

session_start();
include "../process/functions.php";
if(!isset($_SESSION['admin'])){
	header('Location: ../pages/login.php?error2');
}

$db = connect();

if(isset($_GET['action']) && $_GET['action']=='delete'){
	//delete from student record also delete the student from sanction record
	$g = getstudentsbyid($_GET['id']);
	$name = $g->name;
	deletefromsanc($name);
	deleteonestudent($_GET['id']);
	header('Location:../pages/student.php');
}
elseif(isset($_GET['action']) && $_GET['action']=='deleteall'){
	//if click deleteALL then delete also all from sanction records
	if(deleteall() && deleteallsanction()){
		header('Location:../pages/students.php?success');
	}
	else{
		header('Location:../pages/students.php?error');
	}


}

?>

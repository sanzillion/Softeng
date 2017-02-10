<?php
session_start();
include "../process/functions.php";
$db = connect();

if(isset($_POST['sub'])){
	$desc = $_POST['desc'];
	$date = $_POST['dato'];

	$query = $db->prepare("INSERT INTO meeting SET 
		                 		description = :descs,
		                 		m_date = :datet");

	$execute_query = [':descs' => $desc, 
						':datet' => $date];

	$query->execute($execute_query);

	$sth = $db->prepare("ALTER TABLE  `sanction` ADD  `$desc` VARCHAR(11) NOT NULL");
	$sth->execute();

	header('Location: ../pages/meeting.php');
	}

if(isset($_POST['submitstudent'])){ //Register Student
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$cpnum = $_POST['cpnum'];
	$name = $fname." ".$lname;
	$yr = $_POST['yr'];

		if(findstudents($name)){
			header('Location: student.php?error=1');
		}
		else{
		$query = $db->prepare("INSERT INTO student SET 
			                 		name = ?,
			                 		year = ?,
			                 		cpnum = ?");

		$query->bindParam(1,$name);
		$query->bindParam(2,$yr);
		$query->bindParam(3,$cpnum);

		$query->execute();
		header('Location: ../pages/student.php');

		}
	}


?>
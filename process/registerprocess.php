<?php
session_start();
include "../process/functions.php";
$db = connect();

if(isset($_POST['addmeeting'])){ //from meeting.php
	$results = getdescription();
	$arraycount = count($results);
	if($arraycount > 7){
		header('Location: ../pages/meetings.php?unable');
	}
	else{
		$desc = $_POST['desc']; //description
		$date = $_POST['dato']; //date

		$query = $db->prepare("INSERT INTO meeting SET
													description = :descs,
													m_date = :datet");

		$execute_query = [':descs' => $desc,
							':datet' => $date];

		if(empty(getmeet())){
			$beforetotal = "s_name";
		}else{
			$result = getdescription();
			foreach ($result as $d) {
				$beforetotal = $d->description;
			}
		}

		$sth = $db->prepare("ALTER TABLE  `sanction` ADD  `$desc` VARCHAR(11) NOT NULL
												AFTER `$beforetotal`");

		if($query->execute($execute_query) && $sth->execute()){
				header('Location: ../pages/meetings.php?success=1');
		}else{
				//header('Location: ../pages/meetings.php?error');
		}
	}



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
		header('Location: ../pages/students.php');

		}
	}


?>

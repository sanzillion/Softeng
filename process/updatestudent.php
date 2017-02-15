<?php
session_start();
include "../process/functions.php";
$db = connect();

if(isset($_POST['update'])){

	$id = $_POST['id'];
 	$name = $_POST['name'];
 	$cpnum = $_POST['cpnum'];
	$year = $_POST['yr'];

	$stmt = $db->prepare("UPDATE student SET
												name = :name,
		                 		year = :year,
		                 		cpnum = :cpnum
		                 		WHERE s_id = :id");

			$stmt->bindValue('name',$name);
			$stmt->bindValue('year',$year);
			$stmt->bindValue('id',$id);
			$stmt->bindValue('cpnum',$cpnum);

			$stmt->execute();
			header('Location:../pages/students.php?success=1');
}

if(isset($_POST['updato'])){ //update meeting

	$id = $_POST['id'];
 	$des = $_POST['des'];
	$dat = $_POST['dat'];

	$account = getmeetbyid($id); // get description name
	$desc = $account->description;

	$sth = $db->prepare("ALTER TABLE `sanction` CHANGE `$desc` `$des` VARCHAR(11) NOT NULL");

	$stmt = $db->prepare("UPDATE meeting SET
												description = :des,
												m_date = :dat
						            WHERE m_id = :id");

			$stmt->bindValue('des',$des);
			$stmt->bindValue('dat',$dat);
			$stmt->bindValue('id',$id);

			//the 2 must be executed properly or else update fail
	if($stmt->execute() && $sth->execute()){
		header('Location:../pages/meetings.php?success=2');
	}else{
		header('Location:../pages/meetings.php?error');
	}



}

?>

<?php
session_start();
include "../process/functions.php";
$db = connect();

if(isset($_POST['update'])){

	$id = $_POST['id'];
 	$fname = $_POST['fname'];
 	$lname = $_POST['sname'];
 	$cpnum = $_POST['cpnum'];
	$year = $_POST['yr'];
	$fname = htmlspecialchars($fname, ENT_QUOTES);
	$lname = htmlspecialchars($lname, ENT_QUOTES);
	$fname = strtoupper($fname);
	$lname = strtoupper($lname);
	$name = $fname.' '.$lname;

	if(samename($fname,$lname,$id)){
		header('Location: ../pages/students.php?error=2');
	}
	else{
		$stmt = $db->prepare("UPDATE student SET
													surname = :sname,
													firstname = :fname,
													year = :year,
													cpnum = :cpnum,
													name = :name
													WHERE s_id = :id");

				$stmt->bindValue('sname',$lname);
				$stmt->bindValue('fname',$fname);
				$stmt->bindValue('year',$year);
				$stmt->bindValue('id',$id);
				$stmt->bindValue('cpnum',$cpnum);
				$stmt->bindValue('name',$name);

		if($stmt->execute()){
			echo "success";
			header('Location:../pages/students.php?success=1');
		}
		else{
			echo "fail";
			header('Location: ../pages/students.php?dberror');
		}
	}
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

if(isset($_POST['updateadmin'])){
	$id = $_POST['id'];
	$user = $_POST['user'];
	$pw = $_POST['pw'];

	if(preg_match('/[^a-z_\-0-9]/i', $user) ||
			preg_match('/[^a-z_\-0-9]/i', $pw)){
		header('Location: ../pages/superuser.php?invalid-inputs');
	}
	elseif (findadmin($user)){
		header('Location: ../pages/superuser.php?nametaken');
	}
	else{
		$stmt = $db->prepare("UPDATE admin SET
													user = :u,
													pass = :p
													WHERE id = :id");

				$stmt->bindValue('u',$user);
				$stmt->bindValue('p',$pw);
				$stmt->bindValue('id',$id);

				if($stmt->execute()){
					header('Location:../pages/superuser.php?success');
				}else{
					header('Location:../pages/superuser.php?error');
				}
	}
}

?>

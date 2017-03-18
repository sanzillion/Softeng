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
		$pen = $_POST['penalty']; //penalty

		$query = $db->prepare("INSERT INTO meeting SET
													description = :descs,
													penalty = :pen,
													m_date = :datet");

		$execute_query = [':descs' => $desc,
							':pen' => $pen,
							':datet' => $date];

		if(empty(getmeet())){
			$beforetotal = "s_id";
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
				header('Location: ../pages/meetings.php?error');
		}
	}
}

if(isset($_POST['submitstudent'])){ //Register Student
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$cpnum = $_POST['cpnum'];
	$fname = htmlspecialchars($fname, ENT_QUOTES);
	$lname = htmlspecialchars($lname, ENT_QUOTES);
	$fname = strtoupper($fname);
	$lname = strtoupper($lname);
	$name = $fname.' '.$lname;
	$yr = $_POST['yr'];

		if(findstudents($fname,$lname)){
			header('Location: ../pages/students.php?error=2');
		}
		else{
			echo "inside";
		$query = $db->prepare("INSERT INTO student SET
			                 		surname = ?,
			                 		firstname = ?,
			                 		year = ?,
			                 		cpnum = ?,
													name = ?");

		$query->bindParam(1,$lname);
		$query->bindParam(2,$fname);
		$query->bindParam(3,$yr);
		$query->bindParam(4,$cpnum);
		$query->bindParam(5,$name);

		if($query->execute()){
			echo "success";
			header('Location: ../pages/students.php?success=2');
		}else{
			echo "fail";
			header('Location: ../pages/students.php?error=3');
		}


		}
	}

if(isset($_POST['add-admin'])){
	$name = $_POST['name'];
	$pw = $_POST['pass'];
	$priv = $_POST['priv'];

	if(preg_match('/[^a-z_\-0-9]/i', $name) ||
			preg_match('/[^a-z_\-0-9]/i', $pw)){
		header('Location: ../pages/superuser.php?error=1');
		//invalid username
	}
	elseif (count(getadmins()) > 2) {
		//max admin = 3
		header('Location: ../pages/superuser.php?error=2');
	}
	elseif (findadmin($name, $priv)){
		//privilege taken or username taken
		header('Location: ../pages/superuser.php?error=3');
	}
	else{
		$query = $db->prepare("INSERT INTO admin SET
			                 		user = ?,
			                 		pass = ?,
													privilege = ?");

		$query->bindParam(1,$name);
		$query->bindParam(2,$pw);
		$query->bindParam(3,$priv);

		if($query->execute()){
			header('Location: ../pages/superuser.php?succes=1');
		}else{
			header('Location: ../pages/superuser.php?error=4');
		}
	}



}

?>

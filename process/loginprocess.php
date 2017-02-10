
<?php
session_start();
include "functions.php";
$db = connect();

if(isset($_POST['submit'])){
		$_SESSION['updateerror']="0";
		$_SESSION['regerror']="0";
		$_SESSION['error']="0";
		$user = $_POST['user'];
		$password = $_POST['pass'];

		if(finduser($user,$password)){

			$query = $db->prepare("INSERT INTO record SET
								name = :fname,
		                 		dates = curdate(),
		                 		time = curtime(),
		                 		day = dayname(curdate())");

			$execute_query = [':fname' => $user];

			$query->execute($execute_query);

			if($user == "admin" || $user == "admin2" || $user == "admin3"){
				$stmt2 = $db->prepare("SELECT * from admin where user = :user");
				$stmt2->bindValue(':user',$user);
				$stmt2->execute();
				$account2 = $stmt2->fetch(PDO::FETCH_OBJ);
				$id = $account2->user_id;
				$_SESSION['admin']=$user;
				$_SESSION['id']=$id;
				header("Location:../pages/index.php");
			}
			// else{
			// 	$stmt2 = $db->prepare("SELECT * from student where user = :user");
			// 	$stmt2->bindValue(':user',$user);
			// 	$stmt2->execute();
			// 	$account2 = $stmt2->fetch(PDO::FETCH_OBJ);
			// 	$id = $account2->emp_id;
			// 	$_SESSION['id']=$id;
			// 	$_SESSION['user']=$user;
			// 	header("Location:../pages/user.php");
			// }

	}
	else{
		header("Location:../index.php?error=1");
	}
}
else{
	header("Location:../index.php");
}

?>

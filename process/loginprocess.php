
<?php
session_start();
include "functions.php";
if($db = connect()){
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

					$stmt2 = $db->prepare("SELECT * from admin where user = :user");
					$stmt2->bindValue(':user',$user);
					$stmt2->execute();
					$account2 = $stmt2->fetch(PDO::FETCH_OBJ);
					$priv = $account2->privilege;
					$id = $account2->user_id;
					$_SESSION['admin']=$user;
					$_SESSION['id']=$id;
					$_SESSION['priv']=$priv;

					header("Location:../pages/index.php");
		}
		else{
			header("Location:../index.php?error=1");
		}
	}
	else{
		header("Location:../index.php");
	}
}
else{
	header('Location: ../index.php');
}


?>

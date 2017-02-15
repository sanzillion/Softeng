<?php
session_start();
include "functions.php";
$db = connect();

if(isset($_POST['change'])){
		 $_SESSION['error']='none';
		 $stmt = $db->prepare("SELECT * from admin
		 		where id = :id");
				$stmt->bindValue('id',$_POST['id']);
				$stmt->execute();
				$account = $stmt->fetch(PDO::FETCH_OBJ);

 		$id = $_POST['id'];
 		$oldpass = $_POST['old'];
 		$newpass = $_POST['new'];
 		$conpass = $_POST['con'];

 	if(finduser($account->user,$oldpass)){

 		if($oldpass != $newpass)
 		{
 			if($newpass == $conpass)
 			{


				$stmt = $db->prepare("UPDATE admin set pass=:password where id = :user_id");
				$stmt->bindValue('user_id',$id);
				$stmt->bindValue('password',$conpass);
				$stmt->execute();
				header('Location:../pages/index.php?success');
 			}
 			else{
 				$_SESSION['error']='3';
 				header('Location:../pages/admin.php?error=3');
 			}
 		}
 		else{
 			$_SESSION['error']='2';
 			header('Location:../pages/admin.php?error=2');
 		}
 	}
 	else{
 		$_SESSION['error']='1';
 		header('Location:../pages/admin.php?error=1');
 	}}

?>

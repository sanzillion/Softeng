<?php

session_start();
include "functions.php";
$db = connect();
if(!isset($_SESSION['admin'])){
	header('Location: ../index.php?error2');
}

if(isset($_POST['sub'])){
	if(!empty(getmeet())){ //check if there are already meetings
		//cannot automatically register students in sanction if there is
		header('Location: ../pages/students.php?error=1');
	}else{
		if(is_uploaded_file($_FILES['csv']['tmp_name'])){
				echo $_FILES['csv']['type'];
				if($_FILES['csv']['type'] == "application/vnd.ms-excel"
					|| $_FILES['csv']['type'] == "application/octet-streamfile"){
				$uploaddir = '../uploads/';
				$uploadfile = $uploaddir . basename($_FILES['csv']['name']);
				echo $uploadfile.'<br>';
				if(move_uploaded_file($_FILES['csv']['tmp_name'],$uploadfile)){
					echo "good!<br>";
				}
				else{
					echo "not good!<br>";
				}

				$name = $_FILES['csv']['name'];
				$query = $db->prepare("LOAD DATA LOCAL INFILE '$uploadfile' INTO TABLE `student` FIELDS
				TERMINATED BY ',' LINES TERMINATED BY '\n' (`name` , `year`, `cpnum`)");

				if($query->execute()){
					echo 'successfully uploaded <br>';

					foreach(disname() as $name){
						$clear = 0;
						$query2 = $db->prepare("INSERT INTO sanction SET s_name = ?, total = ?");
						$query2->bindParam(1,$name->name);
						$query2->bindParam(2,$clear);
						$query2->execute();
						echo "inside";
					}
					echo "Attempt 1 Success";
							//CLEAN
					header('Location: ../pages/students.php?success');
				}
				else{
					echo 'failed! <br>';
					$name = $_FILES['csv']['name'];
					$query = $db->prepare("LOAD DATA INFILE '$uploadfile' INTO TABLE `student` FIELDS
					TERMINATED BY ',' LINES TERMINATED BY '\n' (`name` , `year`, `cpnum`)");

					if($query->execute()){
						echo 'successfully uploaded <br>';

						foreach(disname() as $name){
							$query2 = $db->prepare("INSERT INTO sanction SET s_name = ?");
							$query2->bindParam(1,$name->name);
							$query2->execute();
						}
								//CLEAN

						header('Location: ../pages/students.php?success');
					}else{
						echo "Attempt 2 Still fail!";
					}
					$query->closeCursor();
					$_SESSION['QUE_ERROR'] += 1;
					header('Location: ../pages/students.php?error=dberror');
				}
			}
			else{
				header('Location: ../pages/students.php?filetypeinvalid');
			}

		}
		else{
			header('Location: ../pages/students.php?error=nofile');
		}
	}
} //end of isset post submit

if(isset($_POST['submit'])){
	if(!empty(getmeet())){ //check if there are already meetings
		//cannot automatically register students in sanction if there is
		header('Location: ../pages/students.php?error=1');
	}else{
		if(is_uploaded_file($_FILES['userfile']['tmp_name']) &&
			is_uploaded_file($_FILES['yrs']['tmp_name']) &&
			is_uploaded_file($_FILES['cpnum']['tmp_name'])){
			if($_FILES['userfile']['type'] != "text/plain" &&
				$_FILES['yrs']['type'] != "text/plain" &&
				$_FILES['cpnum']['type'] != "text/plain" ){
				echo "Invalid Filetype";
			}
			elseif($_FILES['userfile']['size'] > 5000 &&
				$_FILES['yrs']['size'] > 5000 &&
				$_FILES['cpnum']['size'] > 5000){
				echo "File too large";
			}
			elseif($_FILES['userfile']['size'] < 50 &&
				$_FILES['yrs']['size'] < 50 &&
				$_FILES['cpnum']['size'] < 50){
				echo "File too small";
			}
			elseif($_FILES['userfile']['error'] > 0 &&
				$_FILES['yrs']['error'] > 0 &&
				$_FILES['cpnum']['error'] > 0){
				echo "Invalid File/ No file";
			}
			else{

				$name = $_FILES['userfile']['name'].'<br>';

				$string = file_get_contents($_FILES['userfile']['tmp_name'], "r");
				$string2 = file_get_contents($_FILES['yrs']['tmp_name'], "r");
				$string3 = file_get_contents($_FILES['cpnum']['tmp_name'], "r");
				$names = explode("\n", $string);
				$yrs = explode("\n", $string2);
				$cpnum = explode("\n", $string3);

				echo $arraycount = count($names);
				echo $arraycount2 = count($yrs);
				echo $arraycount3 = count($cpnum);
				if($arraycount == $arraycount2 &&
					$arraycount == $arraycount3 &&
					$arraycount2 == $arraycount3){

					for($i = 0; $i < $arraycount; $i++){
					echo '<br>'.$i." - ".$yrs[$i];
					$yrs[$i] = substr($yrs[$i],0,3);
						$query = $db->prepare("INSERT INTO student SET
									name = ?, year = ?, cpnum = ?");
					$query->bindParam(1,$names[$i]);
					$query->bindParam(2,$yrs[$i]);
					$query->bindParam(3,$cpnum[$i]);
					$query->execute();
					}

					foreach(disname() as $name){
						$query2 = $db->prepare("INSERT INTO sanction SET s_name = ?");
						$query2->bindParam(1,$name->name);
						$query2->execute();
					}

					header('Location: ../pages/students.php?success');

				}
				else{
					echo "Data are inconsistent!";
				}
			}
		}
		else{
			echo "insufficient files";
		}
	}

}

 ?>

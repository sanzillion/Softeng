<?php
session_start();
include "../process/functions.php";
$db = connect();

$getdesc = getdescription2();
$arraycount = count($getdesc);

for ($i = 0; $i <$arraycount; $i++){
	$desc[] = implode(',', $getdesc[$i]);
}

print_r($desc);

if($arraycount >= 1){$meet1 = $desc[0];}
if($arraycount >= 2){$meet2 = $desc[1];}
if($arraycount >= 3){$meet3 = $desc[2];}
if($arraycount >= 4){$meet4 = $desc[3];}
if($arraycount >= 5){$meet5 = $desc[4];}
if($arraycount >= 6){$meet6 = $desc[5];}
if($arraycount >= 7){$meet7 = $desc[6];}
if($arraycount >= 8){$meet8 = $desc[7];}

if(isset($_POST['addsanc'])){
	if($arraycount >= 1){ $r1 = $_POST["$meet1"];	}
	if($arraycount >= 2){ $r2 = $_POST["$meet2"];	}
	if($arraycount >= 3){ $r3 = $_POST["$meet3"];	}
	if($arraycount >= 4){ $r4 = $_POST["$meet4"];	}
	if($arraycount >= 5){ $r5 = $_POST["$meet5"];	}
	if($arraycount >= 6){ $r6 = $_POST["$meet6"];	}
	if($arraycount >= 7){ $r7 = $_POST["$meet7"];	}
	if($arraycount >= 8){ $r8 = $_POST["$meet8"];	}
	$name = $_POST['name'];

	if(find($name)){
		header('Location: ../pages/sanction.php?error=1');
	}
	else{

		if($arraycount == 1){
			$stmt = $db->prepare("INSERT INTO sanction (s_name, $meet1)
		    VALUES (:name, :m1)");
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':m1', $r1);

		}
		elseif($arraycount == 2){
			$stmt = $db->prepare("INSERT INTO sanction (s_name, $meet1, $meet2)
		    VALUES (:name, :m1, :m2)");
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':m1', $r1);
		    $stmt->bindParam(':m2', $r2);

		}
		elseif($arraycount == 3){
			$stmt = $db->prepare("INSERT INTO sanction (s_name, $meet1, $meet2, $meet3)
		    VALUES (:name, :m1, :m2, :m3)");
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':m1', $r1);
		    $stmt->bindParam(':m2', $r2);
		    $stmt->bindParam(':m3', $r3);

		}
		elseif($arraycount == 4){
			$stmt = $db->prepare("INSERT INTO sanction (s_name, $meet1, $meet2, $meet3, $meet4)
		    VALUES (:name, :m1, :m2, :m3, :m4)");
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':m1', $r1);
		    $stmt->bindParam(':m2', $r2);
		    $stmt->bindParam(':m3', $r3);
		    $stmt->bindParam(':m4', $r4);

		}
		elseif($arraycount == 5){
			$stmt = $db->prepare("INSERT INTO sanction (s_name, $meet1, $meet2, $meet3, $meet4, $meet5)
		    VALUES (:name, :m1, :m2, :m3, :m4, :m5)");
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':m1', $r1);
		    $stmt->bindParam(':m2', $r2);
		    $stmt->bindParam(':m3', $r3);
		    $stmt->bindParam(':m4', $r4);
		    $stmt->bindParam(':m5', $r5);

		}
		elseif($arraycount == 6){
			$stmt = $db->prepare("INSERT INTO sanction (s_name, $meet1, $meet2, $meet3,
															$meet4, $meet5, $meet6)
		    VALUES (:name, :m1, :m2, :m3, :m4, :m5, :m6)");
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':m1', $r1);
		    $stmt->bindParam(':m2', $r2);
		    $stmt->bindParam(':m3', $r3);
		    $stmt->bindParam(':m4', $r4);
		    $stmt->bindParam(':m5', $r5);
		    $stmt->bindParam(':m6', $r6);

		}
		elseif($arraycount == 7){
			$stmt = $db->prepare("INSERT INTO sanction (s_name, $meet1, $meet2, $meet3,
															$meet4, $meet5, $meet6, $meet7)
		    VALUES (:name, :m1, :m2, :m3, :m4, :m5, :m6, :m7)");
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':m1', $r1);
		    $stmt->bindParam(':m2', $r2);
		    $stmt->bindParam(':m3', $r3);
		    $stmt->bindParam(':m4', $r4);
		    $stmt->bindParam(':m5', $r5);
		    $stmt->bindParam(':m6', $r6);
		    $stmt->bindParam(':m7', $r7);

		}
		elseif($arraycount == 8){
			$stmt = $db->prepare("INSERT INTO sanction (s_name, $meet1, $meet2, $meet3, $meet4,
														$meet5, $meet6, $meet7, $meet8)
		    VALUES (:name, :m1, :m2, :m3, :m4, :m5, :m6, :m7, :m8)");
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':m1', $r1);
		    $stmt->bindParam(':m2', $r2);
		    $stmt->bindParam(':m3', $r3);
		    $stmt->bindParam(':m4', $r4);
		    $stmt->bindParam(':m5', $r5);
		    $stmt->bindParam(':m6', $r6);
		    $stmt->bindParam(':m7', $r7);
		    $stmt->bindParam(':m8', $r8);

		}

	if($stmt->execute())
	{
		echo "Query executed!";
		header('Location: ../pages/sanctions.php?success');
	}
	else{
		echo "db error";
		header('Location: ../pages/sanctions.php?error=dberror');
	}

}
}

if(isset($_POST['updatesanc'])){

	if($arraycount >= 1){ $r1 = $_POST["$meet1"];	}
	if($arraycount >= 2){ $r2 = $_POST["$meet2"];	}
	if($arraycount >= 3){ $r3 = $_POST["$meet3"];	}
	if($arraycount >= 4){ $r4 = $_POST["$meet4"];	}
	if($arraycount >= 5){ $r5 = $_POST["$meet5"];	}
	if($arraycount >= 6){ $r6 = $_POST["$meet6"];	}
	if($arraycount >= 7){ $r7 = $_POST["$meet7"];	}
	if($arraycount >= 8){ $r8 = $_POST["$meet8"];	}
	$id = $_POST['id'];

	if($arraycount == 1){
		$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1 WHERE sanc_id = :id");
	    $stmt->bindParam(':m1', $r1);
	    $stmt->bindParam(':id', $id);
	}
	elseif($arraycount == 2){
		$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2 WHERE sanc_id = :id");
	    $stmt->bindParam(':m1', $r1);
	    $stmt->bindParam(':m2', $r2);
	    $stmt->bindParam(':id', $id);
	}
	elseif($arraycount == 3){
		$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3 WHERE sanc_id = :id");
	    $stmt->bindParam(':m1', $r1);
	    $stmt->bindParam(':m2', $r2);
	    $stmt->bindParam(':m3', $r3);
	    $stmt->bindParam(':id', $id);
	}
	elseif($arraycount == 4){
		$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3, $meet4 = :m4 WHERE sanc_id = :id");
	    $stmt->bindParam(':m1', $r1);
	    $stmt->bindParam(':m2', $r2);
	    $stmt->bindParam(':m3', $r3);
	    $stmt->bindParam(':m4', $r4);
	    $stmt->bindParam(':id', $id);
	}
	elseif($arraycount == 5){
		$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3,
								$meet4 = :m4, $meet5 = :m5 WHERE sanc_id = :id");
	    $stmt->bindParam(':m1', $r1);
	    $stmt->bindParam(':m2', $r2);
	    $stmt->bindParam(':m3', $r3);
	    $stmt->bindParam(':m4', $r4);
	    $stmt->bindParam(':m5', $r5);
	    $stmt->bindParam(':id', $id);
	}
	elseif($arraycount == 6){
		$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3,
							$meet4 = :m4, $meet5 = :m5, $meet6 = :m6 WHERE sanc_id = :id");
	    $stmt->bindParam(':m1', $r1);
	    $stmt->bindParam(':m2', $r2);
	    $stmt->bindParam(':m3', $r3);
	    $stmt->bindParam(':m4', $r4);
	    $stmt->bindParam(':m5', $r5);
	    $stmt->bindParam(':m6', $r6);
	    $stmt->bindParam(':id', $id);
	}
	elseif($arraycount == 7){
		$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3,
							$meet4 = :m4, $meet5 = :m5, $meet6 = :m6, $meet7 = :m7 WHERE sanc_id = :id");
	    $stmt->bindParam(':m1', $r1);
	    $stmt->bindParam(':m2', $r2);
	    $stmt->bindParam(':m3', $r3);
	    $stmt->bindParam(':m4', $r4);
	    $stmt->bindParam(':m5', $r5);
	    $stmt->bindParam(':m6', $r6);
	    $stmt->bindParam(':m7', $r7);
	    $stmt->bindParam(':id', $id);
	}
	elseif($arraycount == 8){
		$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3,
							$meet4 = :m4, $meet5 = :m5, $meet6 = :m6, $meet7 = :m7, $meet8 = :m8 WHERE sanc_id = :id");
	    $stmt->bindParam(':m1', $r1);
	    $stmt->bindParam(':m2', $r2);
	    $stmt->bindParam(':m3', $r3);
	    $stmt->bindParam(':m4', $r4);
	    $stmt->bindParam(':m5', $r5);
	    $stmt->bindParam(':m6', $r6);
	    $stmt->bindParam(':m7', $r7);
	    $stmt->bindParam(':m8', $r8);
	    $stmt->bindParam(':id', $id);
	}

	if($stmt->execute()){
		echo "Query executed!";
		header('Location: ../pages/sanctions.php?success');
	}
	else{
		echo "db error";
		header('Location: ../pages/sanctions.php?error=dberror');
	}

}

if(isset($_POST['updatebyyr'])){

	foreach($_POST['meeting'] as $g){
		if($arraycount >= 1){ $r1 = $g['m1'];	}
		if($arraycount >= 2){ $r2 = $g['m2'];	}
		if($arraycount >= 3){ $r3 = $g['m3'];	}
		if($arraycount >= 4){ $r4 = $g['m4'];	}
		if($arraycount >= 5){ $r5 = $g['m5'];	}
		if($arraycount >= 6){ $r6 = $g['m6'];	}
		if($arraycount >= 7){ $r7 = $g['m7'];	}
		if($arraycount >= 8){ $r8 = $g['m8'];	}
		$id = $g['m0'];

		if($arraycount == 1){
			$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1 WHERE sanc_id = :id");
				$stmt->bindParam(':m1', $r1);
				$stmt->bindParam(':id', $id);
		}
		elseif($arraycount == 2){
			$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2 WHERE sanc_id = :id");
				$stmt->bindParam(':m1', $r1);
				$stmt->bindParam(':m2', $r2);
				$stmt->bindParam(':id', $id);
		}
		elseif($arraycount == 3){
			$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3 WHERE sanc_id = :id");
				$stmt->bindParam(':m1', $r1);
				$stmt->bindParam(':m2', $r2);
				$stmt->bindParam(':m3', $r3);
				$stmt->bindParam(':id', $id);
		}
		elseif($arraycount == 4){
			$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3, $meet4 = :m4 WHERE sanc_id = :id");
				$stmt->bindParam(':m1', $r1);
				$stmt->bindParam(':m2', $r2);
				$stmt->bindParam(':m3', $r3);
				$stmt->bindParam(':m4', $r4);
				$stmt->bindParam(':id', $id);
		}
		elseif($arraycount == 5){
			$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3,
									$meet4 = :m4, $meet5 = :m5 WHERE sanc_id = :id");
				$stmt->bindParam(':m1', $r1);
				$stmt->bindParam(':m2', $r2);
				$stmt->bindParam(':m3', $r3);
				$stmt->bindParam(':m4', $r4);
				$stmt->bindParam(':m5', $r5);
				$stmt->bindParam(':id', $id);
		}
		elseif($arraycount == 6){
			$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3,
								$meet4 = :m4, $meet5 = :m5, $meet6 = :m6 WHERE sanc_id = :id");
				$stmt->bindParam(':m1', $r1);
				$stmt->bindParam(':m2', $r2);
				$stmt->bindParam(':m3', $r3);
				$stmt->bindParam(':m4', $r4);
				$stmt->bindParam(':m5', $r5);
				$stmt->bindParam(':m6', $r6);
				$stmt->bindParam(':id', $id);
		}
		elseif($arraycount == 7){
			$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3,
								$meet4 = :m4, $meet5 = :m5, $meet6 = :m6, $meet7 = :m7 WHERE sanc_id = :id");
				$stmt->bindParam(':m1', $r1);
				$stmt->bindParam(':m2', $r2);
				$stmt->bindParam(':m3', $r3);
				$stmt->bindParam(':m4', $r4);
				$stmt->bindParam(':m5', $r5);
				$stmt->bindParam(':m6', $r6);
				$stmt->bindParam(':m7', $r7);
				$stmt->bindParam(':id', $id);
		}
		elseif($arraycount == 8){
			$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3,
								$meet4 = :m4, $meet5 = :m5, $meet6 = :m6, $meet7 = :m7, $meet8 = :m8 WHERE sanc_id = :id");
				$stmt->bindParam(':m1', $r1);
				$stmt->bindParam(':m2', $r2);
				$stmt->bindParam(':m3', $r3);
				$stmt->bindParam(':m4', $r4);
				$stmt->bindParam(':m5', $r5);
				$stmt->bindParam(':m6', $r6);
				$stmt->bindParam(':m7', $r7);
				$stmt->bindParam(':m8', $r8);
				$stmt->bindParam(':id', $id);
		}

		if($stmt->execute()){
			echo "Query executed!";
		}
		else{
			echo "db error";
		}
	}

	header('Location: ../pages/sanctions.php?success');

}

?>

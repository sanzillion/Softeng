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
	$total = 0; //initialize total

	if($arraycount >= 1){ $r1 = $_POST["$meet1"];
	 		if(is_numeric($r1)){$total += $r1;} }
	if($arraycount >= 2){ $r2 = $_POST["$meet2"];
			if(is_numeric($r2)){$total += $r2;} }
	if($arraycount >= 3){ $r3 = $_POST["$meet3"];
			if(is_numeric($r3)){$total += $r3;} }
	if($arraycount >= 4){ $r4 = $_POST["$meet4"];
			if(is_numeric($r4)){$total += $r4;} }
	if($arraycount >= 5){ $r5 = $_POST["$meet5"];
			if(is_numeric($r5)){$total += $r5;} }
	if($arraycount >= 6){ $r6 = $_POST["$meet6"];
			if(is_numeric($r6)){$total += $r6;} }
	if($arraycount >= 7){ $r7 = $_POST["$meet7"];
			if(is_numeric($r7)){$total += $r7;} }
	if($arraycount >= 8){ $r8 = $_POST["$meet8"];
			if(is_numeric($r8)){$total += $r8;} }

	$student = getstudentsbyname($_POST['name']);
	$name = $student->s_id;

	if(find($name)){
		header('Location: ../pages/sanction.php?error=1');
	}
	else{

		if($arraycount == 1){
			$stmt = $db->prepare("INSERT INTO sanction (s_id, $meet1, total)
		    VALUES (:name, :m1, :total)");
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':m1', $r1);
		    $stmt->bindParam(':total', $total);

		}
		elseif($arraycount == 2){
			$stmt = $db->prepare("INSERT INTO sanction (s_id, $meet1, $meet2, total)
		    VALUES (:name, :m1, :m2, :total)");
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':m1', $r1);
		    $stmt->bindParam(':m2', $r2);
				$stmt->bindParam(':total', $total);

		}
		elseif($arraycount == 3){
			$stmt = $db->prepare("INSERT INTO sanction (s_id, $meet1, $meet2, $meet3, total)
		    VALUES (:name, :m1, :m2, :m3, :total)");
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':m1', $r1);
		    $stmt->bindParam(':m2', $r2);
		    $stmt->bindParam(':m3', $r3);
				$stmt->bindParam(':total', $total);

		}
		elseif($arraycount == 4){
			$stmt = $db->prepare("INSERT INTO sanction (s_id, $meet1, $meet2, $meet3, $meet4, total)
		    VALUES (:name, :m1, :m2, :m3, :m4, :total)");
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':m1', $r1);
		    $stmt->bindParam(':m2', $r2);
		    $stmt->bindParam(':m3', $r3);
		    $stmt->bindParam(':m4', $r4);
				$stmt->bindParam(':total', $total);

		}
		elseif($arraycount == 5){
			$stmt = $db->prepare("INSERT INTO sanction (s_id, $meet1, $meet2, $meet3, $meet4, $meet5, total)
		    VALUES (:name, :m1, :m2, :m3, :m4, :m5, :total)");
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':m1', $r1);
		    $stmt->bindParam(':m2', $r2);
		    $stmt->bindParam(':m3', $r3);
		    $stmt->bindParam(':m4', $r4);
		    $stmt->bindParam(':m5', $r5);
				$stmt->bindParam(':total', $total);

		}
		elseif($arraycount == 6){
			$stmt = $db->prepare("INSERT INTO sanction (s_id, $meet1, $meet2, $meet3,
															$meet4, $meet5, $meet6, total)
		    VALUES (:name, :m1, :m2, :m3, :m4, :m5, :m6, :total)");
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':m1', $r1);
		    $stmt->bindParam(':m2', $r2);
		    $stmt->bindParam(':m3', $r3);
		    $stmt->bindParam(':m4', $r4);
		    $stmt->bindParam(':m5', $r5);
		    $stmt->bindParam(':m6', $r6);
				$stmt->bindParam(':total', $total);

		}
		elseif($arraycount == 7){
			$stmt = $db->prepare("INSERT INTO sanction (s_id, $meet1, $meet2, $meet3,
															$meet4, $meet5, $meet6, $meet7, total)
		    VALUES (:name, :m1, :m2, :m3, :m4, :m5, :m6, :m7, :total)");
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':m1', $r1);
		    $stmt->bindParam(':m2', $r2);
		    $stmt->bindParam(':m3', $r3);
		    $stmt->bindParam(':m4', $r4);
		    $stmt->bindParam(':m5', $r5);
		    $stmt->bindParam(':m6', $r6);
		    $stmt->bindParam(':m7', $r7);
				$stmt->bindParam(':total', $total);

		}
		elseif($arraycount == 8){
			$stmt = $db->prepare("INSERT INTO sanction (s_id, $meet1, $meet2, $meet3, $meet4,
														$meet5, $meet6, $meet7, $meet8, total)
		    VALUES (:name, :m1, :m2, :m3, :m4, :m5, :m6, :m7, :m8, :total)");
		    $stmt->bindParam(':name', $name);
		    $stmt->bindParam(':m1', $r1);
		    $stmt->bindParam(':m2', $r2);
		    $stmt->bindParam(':m3', $r3);
		    $stmt->bindParam(':m4', $r4);
		    $stmt->bindParam(':m5', $r5);
		    $stmt->bindParam(':m6', $r6);
		    $stmt->bindParam(':m7', $r7);
		    $stmt->bindParam(':m8', $r8);
				$stmt->bindParam(':total', $total);

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
 	$total = 0; //initialize
	//the is_numeric condition adds into total if the variable is a number
	if($arraycount >= 1){ $r1 = $_POST["$meet1"];
			if(is_numeric($r1)){$total += $r1;} }
	if($arraycount >= 2){ $r2 = $_POST["$meet2"];
			if(is_numeric($r2)){$total += $r2;} }
	if($arraycount >= 3){ $r3 = $_POST["$meet3"];
			if(is_numeric($r3)){$total += $r3;} }
	if($arraycount >= 4){ $r4 = $_POST["$meet4"];
			if(is_numeric($r4)){$total += $r4;} }
	if($arraycount >= 5){ $r5 = $_POST["$meet5"];
			if(is_numeric($r5)){$total += $r5;} }
	if($arraycount >= 6){ $r6 = $_POST["$meet6"];
			if(is_numeric($r6)){$total += $r6;} }
	if($arraycount >= 7){ $r7 = $_POST["$meet7"];
			if(is_numeric($r7)){$total += $r7;} }
	if($arraycount >= 8){ $r8 = $_POST["$meet8"];
			if(is_numeric($r8)){$total += $r8;} }

	$id = $_POST['id'];

	if($arraycount == 1){
		$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, total = :total WHERE sanc_id = :id");
	    $stmt->bindParam(':m1', $r1);
	    $stmt->bindParam(':id', $id);
	    $stmt->bindParam(':total', $total);
	}
	elseif($arraycount == 2){
		// echo $meet1." ".$meet2." ".$r1." ".$r2." ".$id."<br>";
		// echo "in here";
		$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, total = :total WHERE sanc_id = :id");
	    $stmt->bindParam(':m1', $r1);
	    $stmt->bindParam(':m2', $r2);
	    $stmt->bindParam(':id', $id);
			$stmt->bindParam(':total', $total);
	}
	elseif($arraycount == 3){
		$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3, total = :total WHERE sanc_id = :id");
	    $stmt->bindParam(':m1', $r1);
	    $stmt->bindParam(':m2', $r2);
	    $stmt->bindParam(':m3', $r3);
	    $stmt->bindParam(':id', $id);
			$stmt->bindParam(':total', $total);
	}
	elseif($arraycount == 4){
		$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3, $meet4 = :m4, total = :total WHERE sanc_id = :id");
	    $stmt->bindParam(':m1', $r1);
	    $stmt->bindParam(':m2', $r2);
	    $stmt->bindParam(':m3', $r3);
	    $stmt->bindParam(':m4', $r4);
	    $stmt->bindParam(':id', $id);
			$stmt->bindParam(':total', $total);
	}
	elseif($arraycount == 5){
		$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3,
								$meet4 = :m4, $meet5 = :m5, total = :total WHERE sanc_id = :id");
	    $stmt->bindParam(':m1', $r1);
	    $stmt->bindParam(':m2', $r2);
	    $stmt->bindParam(':m3', $r3);
	    $stmt->bindParam(':m4', $r4);
	    $stmt->bindParam(':m5', $r5);
	    $stmt->bindParam(':id', $id);
			$stmt->bindParam(':total', $total);
	}
	elseif($arraycount == 6){
		$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3,
							$meet4 = :m4, $meet5 = :m5, $meet6 = :m6, total = :total WHERE sanc_id = :id");
	    $stmt->bindParam(':m1', $r1);
	    $stmt->bindParam(':m2', $r2);
	    $stmt->bindParam(':m3', $r3);
	    $stmt->bindParam(':m4', $r4);
	    $stmt->bindParam(':m5', $r5);
	    $stmt->bindParam(':m6', $r6);
	    $stmt->bindParam(':id', $id);
			$stmt->bindParam(':total', $total);
	}
	elseif($arraycount == 7){
		$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3,
							$meet4 = :m4, $meet5 = :m5, $meet6 = :m6, $meet7 = :m7, total = :total WHERE sanc_id = :id");
	    $stmt->bindParam(':m1', $r1);
	    $stmt->bindParam(':m2', $r2);
	    $stmt->bindParam(':m3', $r3);
	    $stmt->bindParam(':m4', $r4);
	    $stmt->bindParam(':m5', $r5);
	    $stmt->bindParam(':m6', $r6);
	    $stmt->bindParam(':m7', $r7);
	    $stmt->bindParam(':id', $id);
			$stmt->bindParam(':total', $total);
	}
	elseif($arraycount == 8){
		$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3,
							$meet4 = :m4, $meet5 = :m5, $meet6 = :m6, $meet7 = :m7, $meet8 = :m8, total = :total WHERE sanc_id = :id");
	    $stmt->bindParam(':m1', $r1);
	    $stmt->bindParam(':m2', $r2);
	    $stmt->bindParam(':m3', $r3);
	    $stmt->bindParam(':m4', $r4);
	    $stmt->bindParam(':m5', $r5);
	    $stmt->bindParam(':m6', $r6);
	    $stmt->bindParam(':m7', $r7);
	    $stmt->bindParam(':m8', $r8);
	    $stmt->bindParam(':id', $id);
			$stmt->bindParam(':total', $total);
	}

 	$stmt->execute();
	// if($stmt->execute()){
	// 	echo "Query executed!";
	// 	header('Location: ../pages/sanctions.php?success');
	// }
	// else{
	// 	echo "db error";
	// 	header('Location: ../pages/sanctions.php?error=dberror');
	// }

}

if(isset($_POST['updatebyyr'])){

	foreach($_POST['meeting'] as $g){
		$total = 0; //initialize
		if($arraycount >= 1){ $r1 = $g['m1'];
			if(is_numeric($r1)){$total += $r1;} }
		if($arraycount >= 2){ $r2 = $g['m2'];
			if(is_numeric($r2)){$total += $r2;} }
		if($arraycount >= 3){ $r3 = $g['m3'];
			if(is_numeric($r3)){$total += $r3;} }
		if($arraycount >= 4){ $r4 = $g['m4'];
			if(is_numeric($r4)){$total += $r4;} }
		if($arraycount >= 5){ $r5 = $g['m5'];
			if(is_numeric($r5)){$total += $r5;} }
		if($arraycount >= 6){ $r6 = $g['m6'];
			if(is_numeric($r6)){$total += $r6;} }
		if($arraycount >= 7){ $r7 = $g['m7'];
			if(is_numeric($r7)){$total += $r7;} }
		if($arraycount >= 8){ $r8 = $g['m8'];
			if(is_numeric($r8)){$total += $r8;} }
		$id = $g['m0'];

		if($arraycount == 1){
			$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, total = :total WHERE sanc_id = :id");
				$stmt->bindParam(':m1', $r1);
				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':total', $total);
		}
		elseif($arraycount == 2){
			$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, total = :total WHERE sanc_id = :id");
				$stmt->bindParam(':m1', $r1);
				$stmt->bindParam(':m2', $r2);
				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':total', $total);
		}
		elseif($arraycount == 3){
			$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3, total = :total WHERE sanc_id = :id");
				$stmt->bindParam(':m1', $r1);
				$stmt->bindParam(':m2', $r2);
				$stmt->bindParam(':m3', $r3);
				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':total', $total);
		}
		elseif($arraycount == 4){
			$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3, $meet4 = :m4, total = :total WHERE sanc_id = :id");
				$stmt->bindParam(':m1', $r1);
				$stmt->bindParam(':m2', $r2);
				$stmt->bindParam(':m3', $r3);
				$stmt->bindParam(':m4', $r4);
				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':total', $total);
		}
		elseif($arraycount == 5){
			$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3,
									$meet4 = :m4, $meet5 = :m5, total = :total WHERE sanc_id = :id");
				$stmt->bindParam(':m1', $r1);
				$stmt->bindParam(':m2', $r2);
				$stmt->bindParam(':m3', $r3);
				$stmt->bindParam(':m4', $r4);
				$stmt->bindParam(':m5', $r5);
				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':total', $total);
		}
		elseif($arraycount == 6){
			$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3,
								$meet4 = :m4, $meet5 = :m5, $meet6 = :m6, total = :total WHERE sanc_id = :id");
				$stmt->bindParam(':m1', $r1);
				$stmt->bindParam(':m2', $r2);
				$stmt->bindParam(':m3', $r3);
				$stmt->bindParam(':m4', $r4);
				$stmt->bindParam(':m5', $r5);
				$stmt->bindParam(':m6', $r6);
				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':total', $total);
		}
		elseif($arraycount == 7){
			$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3,
								$meet4 = :m4, $meet5 = :m5, $meet6 = :m6, $meet7 = :m7, total = :total WHERE sanc_id = :id");
				$stmt->bindParam(':m1', $r1);
				$stmt->bindParam(':m2', $r2);
				$stmt->bindParam(':m3', $r3);
				$stmt->bindParam(':m4', $r4);
				$stmt->bindParam(':m5', $r5);
				$stmt->bindParam(':m6', $r6);
				$stmt->bindParam(':m7', $r7);
				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':total', $total);
		}
		elseif($arraycount == 8){
			$stmt = $db->prepare("UPDATE sanction SET $meet1 = :m1, $meet2 = :m2, $meet3 = :m3,
								$meet4 = :m4, $meet5 = :m5, $meet6 = :m6, $meet7 = :m7, $meet8 = :m8, total = :total WHERE sanc_id = :id");
				$stmt->bindParam(':m1', $r1);
				$stmt->bindParam(':m2', $r2);
				$stmt->bindParam(':m3', $r3);
				$stmt->bindParam(':m4', $r4);
				$stmt->bindParam(':m5', $r5);
				$stmt->bindParam(':m6', $r6);
				$stmt->bindParam(':m7', $r7);
				$stmt->bindParam(':m8', $r8);
				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':total', $total);
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

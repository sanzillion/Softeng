<?php
 function connect(){
   try {
     $db = new PDO("mysql:host=localhost;dbname=srs","root","", array(
    		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
    		PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => TRUE,
    		//PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    		PDO::MYSQL_ATTR_LOCAL_INFILE => TRUE,
    		PDO::MYSQL_ATTR_USE_BUFFERED_QUERY));
    	return $db;
   } catch (Exception $e) {
     //this catches the error upon deployment when the Database
     //is not installed yet in the server... proceeds and
     //creates its own DB and tables and the default admin values
     header('Location: process/installdb.php');
   }
 }

  function finduser($user, $password){
 	$db = connect();
	$query = $db->prepare("SELECT * From admin WHERE user = ? AND pass = ?");
	$query->bindParam(1,$user);
	$query->bindParam(2,$password);

		if($query->execute()){
			if($query->rowCount() > 0){
				return true;
			}
			else{
				return false;
			}
		}
	}

function find($name){
	$db = connect();
	$query = $db->prepare("SELECT * From sanction
    INNER JOIN student ON sanction.s_id=student.s_id
    WHERE name = ?");
	$query->bindParam(1,$name);
	if($query->execute()){
		if($query->rowCount() > 0){
			return true;
		}
		else{
			return false;
		}
	}
}

function getstudentsbyid($id){
	$db = connect();
	$sth = $db->prepare("SELECT * From student WHERE s_id = ?");
	$sth->bindParam(1,$id);
	$sth->execute();
	$results = $sth->fetch(PDO::FETCH_OBJ);
	return $results;
}

function getstudentsbyname($name){
	$db = connect();
	$sth = $db->prepare("SELECT * From student WHERE name = ?");
	$sth->bindParam(1,$name);
	$sth->execute();
	$results = $sth->fetch(PDO::FETCH_OBJ);
	return $results;
}

function findstudents($fname,$lname){
	$db = connect();
	$query = $db->prepare("SELECT * From student WHERE
    surname = ? AND firstname = ?");
	$query->bindParam(1,$lname);
	$query->bindParam(2,$fname);

	if($query->execute()){
		if($query->rowCount() > 0){
			return true;
		}
		else{
			return false;
		}
	}
}

function samename($fname,$lname,$id){
	$db = connect();
	$query = $db->prepare("SELECT * From student WHERE
    surname = ? AND firstname = ? AND s_id <> ?");
	$query->bindParam(1,$lname);
	$query->bindParam(2,$fname);
	$query->bindParam(3,$id);
	if($query->execute()){
		if($query->rowCount() > 0){
			return true;
		}
		else{
			return false;
		}
	}
}


function getstudents(){
	$db = connect();
	$sth = $db->prepare("SELECT * From student ORDER BY year,surname");
	$sth->execute();
	$results = $sth->fetchAll(PDO::FETCH_OBJ);
	return $results;
}

function getbyyr($yr){
	$db = connect();
	$query = $db->prepare("SELECT * FROM student WHERE year = ?");
	$query->bindParam(1,$yr);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	return $results;
}

function getmeet(){
	$db = connect();
	$sth = $db->prepare("SELECT * From meeting");
	$sth->execute();
	$results = $sth->fetchAll(PDO::FETCH_OBJ);
	return $results;
}

function getmeetbyid($id){
	$db = connect();
	$stmt = $db->prepare("SELECT * from meeting where m_id = :id");
	$stmt->bindValue('id',$id);
	$stmt->execute();
	return $account = $stmt->fetch(PDO::FETCH_OBJ);
}

function deletemeetbyid($id){
	$db = connect();
	$sth = $db->prepare("DELETE FROM meeting Where m_id = :id");
	$sth->bindValue('id',$id);
  if($sth->execute()){
    return true;
  }
  else{
    return false;
  }
}

function getdescription(){
	$db = connect();
	$sth = $db->prepare("SELECT DISTINCT description From meeting");
	$sth->execute();
	$results = $sth->fetchAll(PDO::FETCH_OBJ);
	return $results;
}

//CLEAN THIS!
function getdescription2(){
	$db = connect();
	$sth = $db->prepare("SELECT DISTINCT description From meeting");
	$sth->execute();
	$results = $sth->fetchAll(PDO::FETCH_ASSOC);
	return $results;
}

function descrow(){
	$db = connect();
	$sth = $db->prepare("SELECT DISTINCT description From meeting");
	$sth->execute();
	$results = $sth->rowCount();
	return $results;
}

function disname(){
	$db = connect();
	$stmt2 = $db->prepare("SELECT distinct name from student");
	$stmt2->execute();
	$data = $stmt2->fetchAll(PDO::FETCH_OBJ);
	return $data;
}

function disid(){
	$db = connect();
	$stmt2 = $db->prepare("SELECT distinct s_id from student");
	$stmt2->execute();
	$data = $stmt2->fetchAll(PDO::FETCH_OBJ);
	return $data;
}

function disfullname(){
	$db = connect();
	$stmt2 = $db->prepare("SELECT s_id,surname,firstname from student");
	$stmt2->execute();
	$data = $stmt2->fetchAll(PDO::FETCH_OBJ);
	return $data;
}

function getsanction(){
	$db = connect();
	$sth = $db->prepare("SELECT * From sanction
    INNER JOIN student ON sanction.s_id = student.s_id
    ORDER BY student.year,student.surname");
	$sth->execute();
	$results = $sth->fetchAll(PDO::FETCH_OBJ);
	return $results;
}

function getsanction2(){
	$db = connect();
	$sth = $db->prepare("SELECT * From sanction");
	$sth->execute();
	$results = $sth->fetchAll(PDO::FETCH_ASSOC);
	return $results;
}

function getsanction3(){
  $db = connect();
	$sth = $db->prepare("SELECT * From sanction
  INNER JOIN student ON sanction.s_id = student.s_id
  ORDER BY student.year,student.surname");
	$sth->execute();
	$results = $sth->fetchAll(PDO::FETCH_ASSOC);
	return $results;
}

// function getsanctionbyname($name){
// 	$db = connect();
// 	$sth = $db->prepare("SELECT * From sanction WHERE s_name = ?");
// 	$sth->bindParam(1,$name);
// 	$sth->execute();
// 	$results = $sth->fetchAll(PDO::FETCH_OBJ);
// 	return $results;
// }

function getsanctionbyid($id){
	$db = connect();
	$stmt = $db->prepare("SELECT * from sanction
    INNER JOIN student ON sanction.s_id = student.s_id
    where sanc_id = :id");
	$stmt->bindValue('id',$id);
	$stmt->execute();
	$account = $stmt->fetch(PDO::FETCH_OBJ);
	return $account;
}

function sancbyyear($yr){
	$db = connect();
	$sth = $db->prepare("SELECT *
						FROM sanction
						INNER JOIN student
						ON sanction.s_id = student.s_id
						WHERE student.year = ? ORDER BY student.year,student.surname");

	$sth->bindParam(1,$yr);
	$sth->execute();
	$results = $sth->fetchAll(PDO::FETCH_OBJ);
	return $results;
}

function gn(){
	$db = connect();
	$sth = $db->prepare("SELECT meeting From sanction");

	if($sth->execute()){
		if($sth->rowCount() > 0){
			return true;
		}
		else{
			return false;
		}
	}
}

function getrecord(){
	$db = connect();
	$stmt = $db->prepare("SELECT * from record ORDER BY r_id DESC LIMIT 10");
	$stmt->execute();
	$account = $stmt->fetchAll(PDO::FETCH_OBJ);
	return $account;
}

function downloadrecord(){
	$db = connect();
	$stmt = $db->prepare("SELECT * from record ORDER BY r_id DESC LIMIT 10");
	$stmt->execute();
	$account = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $account;
}

function getrecordmodal(){
	$db = connect();
	$stmt = $db->prepare("SELECT * from record ORDER BY r_id DESC LIMIT 100");
	$stmt->execute();
	$account = $stmt->fetchAll(PDO::FETCH_OBJ);
	return $account;
}

function searchstudent($name){ //getemp2
	$names = "";
	$names.= '%';
	$names.= $name;
	$names.= '%';
	$db = connect();
	$query = $db->prepare("SELECT * From student
		WHERE name LIKE ? ");
	$query->bindParam(1,$names);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	return $results;
}

function searchsanction($name){
	$names = "";
	$names.= '%';
	$names.= $name;
	$names.= '%';
	$db = connect();
	$query = $db->prepare("SELECT * From sanction
    INNER JOIN student ON sanction.s_id=student.s_id
		WHERE student.name LIKE ? ");
	$query->bindParam(1,$names);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	return $results;
}

 function findname($fname,$lname){
 	$fnames = "";
 	$fnames.= '%';
 	$fnames.= $fname;
 	$fnames.= '%';
 	$lnames = "";
 	$lnames.= '%';
 	$lnames.= $lname;
 	$lnames.= '%';
 	$db = connect();
	$query = $db->prepare("SELECT * From student
		WHERE surname LIKE ? OR firstname LIKE ? ");
	$query->bindParam(1,$lnames);
  $query->bindParam(2,$fnames);

		if($query->execute()){
			if($query->rowCount() > 0){
				return true;
			}
			else{
				return false;
			}
		}
	}

 function deleteall(){
 	$db = connect();
	$sth = $db->prepare("DELETE FROM student");
  if($sth->execute()){
      return true;
    }else {
      return false;
    }
	}

 function dLog(){
 	$db = connect();
	$sth = $db->prepare("DELETE FROM record");
  if($sth->execute()){
      return true;
    }else {
      return false;
    }
	}

 function deleteallsanction(){
 	$db = connect();
	$sth = $db->prepare("DELETE FROM sanction");
  if($sth->execute()){
      return true;
    }else {
      return false;
    }
	}

 function deletesanctionbyid($id){
 	$db = connect();
	$sth = $db->prepare("DELETE FROM sanction Where sanc_id = :id");
	$sth->bindValue('id',$id);
  if($sth->execute()){
      return true;
    }else {
      return false;
    }
 }

 function deleteallmeetings(){
 	$db = connect();
	$sth = $db->prepare("DELETE FROM meeting");
  if($sth->execute()){
      return true;
    }else {
      return false;
    }
	}

function deletefromsanc($id){
	$db = connect();
	$sth = $db->prepare("DELETE FROM sanction WHERE s_id = ?");
	$sth->bindParam(1,$id);
  if($sth->execute()){
      return true;
    }else {
      return false;
    }
}

function getadmin($var){
	$db = connect();
	$stmt = $db->prepare("SELECT * from admin where user = ?");
	$stmt->bindParam(1,$var);
	$stmt->execute();
	return $account = $stmt->fetch(PDO::FETCH_OBJ);
}

function deleteonestudent($var){
	$db = connect();
	$sth = $db->prepare("DELETE FROM student Where s_id = :id");
	$sth->bindValue('id',$var);
  if($sth->execute()){
      return true;
    }else {
      return false;
    }
}
function getbulletin(){
	$db = connect();
	$stmt = $db->prepare("SELECT * from bulletin");
	$stmt->execute();
	return $account = $stmt->fetch(PDO::FETCH_OBJ);
}

function deletebulletin(){
  $db = connect();
  $query = $db->prepare("DELETE FROM bulletin");
  if($query->execute()){
      return true;
    }else {
      return false;
    }
}

//normalizing options for changes
//you can add another options here
//a feature will be added later
function options(){
  $output = '';
  $r = getmeet();
  $penaltyarray = [];
  $count = 0;
  //isolate penalty column
  foreach ($r as $pen) {
    $penalty[] = $pen->penalty;
    $count++;
  }
    //mark x the first instance of a value with similarity
    for($i = 0; $i < $count-1; $i++){
      for($x = $i; $x < $count-1; $x++){
        if($penalty[$i] == $penalty[$x+1]){
          $penalty[$i] = "x";
          echo "trying";
        }
      }
    }
    //move to new array
    $new_arr = [];
    $new_count = 0;
    foreach($penalty as $a){
      if($a != 'x'){
        $new_arr[] = $a;
        $new_count++;
      }
    }
    //arrange the array in ascending order
    for($i = 0; $i < $new_count-1; $i++){
      for($x = $i; $x < $new_count-1; $x++){
        if($new_arr[$i] > $new_arr[$x+1]){
          $temp = $new_arr[$i];
          $new_arr[$i] = $new_arr[$x+1];
          $new_arr[$x+1] = $temp;
        }
      }
    }
    //pass into html entity
    foreach ($new_arr as $pen) {
      $output .= '<option>';
      $output .= $pen;
      $output .= '</option>';
    }
    $output .= '
    <option>PAID</option>
    <option>PRESENT</option>
    <option>CLEARED</option>';
    return $output;
}

function getadmins(){
	$db = connect();
	$sth = $db->prepare("SELECT * From admin WHERE user <> 'dean'");
	$sth->execute();
	$results = $sth->fetchAll(PDO::FETCH_OBJ);
	return $results;
}

function findadmin($name,$priv){
  $db = connect();
  $q = $db->prepare("SELECT * FROM admin WHERE user = :user OR
  privilege = :priv");
  $q->bindValue('user',$name);
  $q->bindValue('priv',$priv);
  if($q->execute()){
      if($q->rowCount() > 0){
        return true;
      }
      else{
        return false;
      }
    }
}

function findadminuser($name){
  $db = connect();
  $q = $db->prepare("SELECT * FROM admin WHERE user = :user");
  $q->bindValue('user',$name);
  if($q->execute()){
      if($q->rowCount() > 0){
        return true;
      }
      else{
        return false;
      }
    }
}

function findsameuser($name,$id){
  $db = connect();
  $q = $db->prepare("SELECT * FROM admin WHERE user = :user AND id <> :id");
  $q->bindValue('user',$name);
  $q->bindValue('id',$id);
  if($q->execute()){
      if($q->rowCount() > 0){
        return true;
      }
      else{
        return false;
      }
    }
}

function findsamepriv($priv, $id){
  $db = connect();
  $q = $db->prepare("SELECT * FROM admin WHERE privilege = :priv
  AND id <> :id");
  $q->bindValue('priv',$priv);
  $q->bindValue('id',$id);
  if($q->execute()){
      if($q->rowCount() > 0){
        return true;
      }
      else{
        return false;
      }
    }
}

function deleteadmin($id){
  $db = connect();
  $query = $db->prepare("DELETE FROM admin WHERE id = :id");
  $query->bindValue('id',$id);
  if($query->execute()){
      return true;
    }else {
      return false;
    }
}
function deleteadmins(){
  $id = 1;
  $db = connect();
  $query = $db->prepare("DELETE FROM admin WHERE id <> :id");
  $query->bindValue('id',$id);
  if($query->execute()){
      return true;
    }else {
      return false;
    }
}

function getadminbyid($id){
  $db = connect();
  $sth = $db->prepare("SELECT * From admin WHERE id = ?");
  $sth->bindParam(1,$id);
  $sth->execute();
  $result = $sth->fetch(PDO::FETCH_OBJ);
  return $result;
}

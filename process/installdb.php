<?php

$servername = "localhost";
$username = "srs";
$password = "o7kymdy4v1HLCUsJ";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE srs";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
    }
catch(PDOException $e)
    {
    echo "You are not suppose to be here";
    header('Location: ../index.php');
    }

 $con = new PDO("mysql:host=$servername; dbname=srs", $username, $password);
 $admin = $con->prepare("CREATE TABLE `admin` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `user` varchar(15) NOT NULL,
   `pass` varchar(15) NOT NULL,
   PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

 $adminvalues = $con->prepare("INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
 (1, 'dean', 'dean'),
 (2, 'admin', 'admin'),
 (3, 'admin2', 'admin2');");

 $bulletin = $con->prepare("CREATE TABLE `bulletin` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `imgname` varchar(200) NOT NULL,
   `title` varchar(50) NOT NULL,
   `post` varchar(500) NOT NULL,
   PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

 $meeting = $con->prepare("CREATE TABLE `meeting` (
   `m_id` int(11) NOT NULL AUTO_INCREMENT,
   `description` varchar(50) NOT NULL,
   `m_date` date NOT NULL,
   PRIMARY KEY (`m_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

 $record = $con->prepare("CREATE TABLE `record` (
   `r_id` int(2) NOT NULL AUTO_INCREMENT,
   `name` varchar(11) NOT NULL,
   `dates` date NOT NULL,
   `time` time NOT NULL,
   `day` varchar(11) NOT NULL,
   PRIMARY KEY (`r_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

 $sanction = $con->prepare("CREATE TABLE `sanction` (
   `sanc_id` int(11) NOT NULL AUTO_INCREMENT,
   `s_id` int(11) NOT NULL,
   `total` int(11) NOT NULL,
   PRIMARY KEY (`sanc_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

 $student = $con->prepare("CREATE TABLE `student` (
   `s_id` int(11) NOT NULL AUTO_INCREMENT,
   `surname` varchar(50) NOT NULL,
   `firstname` varchar(50) NOT NULL,
   `year` enum('1st','2nd','3rd','4th') NOT NULL,
   `cpnum` bigint(12) NOT NULL,
   `name` varchar(100) NOT NULL,
   PRIMARY KEY (`s_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


if($admin->execute() && $bulletin->execute()
&& $meeting->execute() && $record->execute()
&& $sanction->execute() && $student->execute()){
  $adminvalues->execute();
  header('Location: ../index.php');
}else{
  echo "something went wrong!".'<br>'."
  1: maybe PHP not parse.".'<br>'."
  Solution: Run this file in dir www";
}


 ?>

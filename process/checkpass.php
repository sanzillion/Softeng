<?php

session_start();
include 'functions.php';

if(isset($_POST['name']) && isset($_POST['pass'])){
  if(finduser($_POST['name'],$_POST['pass'])){
    $result = "true";
  } else {
    $result = "false";
  }
  echo json_encode($result);
}

 ?>

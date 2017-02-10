<?php
session_start();
include "functions.php";

if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $post = $_POST['post'];

  $target_dir = "../uploads/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  $_SESSION['img'] = $target_file;
  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
  } else {
      echo "File is not an image.";
      $uploadOk = 0;
  }
  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["image"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
    header('Location: ../pages/index.php?error=1');
  } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";

          $db = connect();
          $query = $db->prepare("INSERT INTO bulletin set
                                imgname = :imgn,
                                title = :title,
                                post = :post");

          $execute_query = [':imgn' => $_FILES["image"]["name"],
                          ':title' => $title,
                          ':post' => $post];

          if($query->execute($execute_query)){
            header('Location: ../pages/index.php?success');

          }else {
            header('Location: ../pages/index.php?error=2');
          }

      } else {
          echo "Sorry, there was an error uploading your file.";
          header('Location: ../pages/index.php?error=1');
      }
    }
  }

 ?>

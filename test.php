<?php
include "process/functions.php";

  if(isset($_POST['txt'])){
    echo $_POST['txt'];
    echo '<br>';
    $textToStore = nl2br(htmlentities($_POST['txt'], ENT_QUOTES, 'UTF-8'));
    echo $textToStore;
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="#" method="post">
      <textarea name="txt" rows="8" cols="80"></textarea>
      <button type="submit" name="button">Submit</button>
    </form>
  </body>
</html>

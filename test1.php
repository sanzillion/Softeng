<?php
include "process/functions.php";
	$results = getsanction2();
  print_r($results);

  $list = array (
      array('aaa', 'bbb', 'ccc'),
      array('123', '456', '789'),
      array('aaa', 'bbb', 'asdf')
  );

echo '<br>'.'<br>';
  print_r ($list);
  echo $list[0][0];
 ?>

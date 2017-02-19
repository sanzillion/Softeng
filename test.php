<?php
include "process/functions.php";

$results = getdescription();
print_r($results);

if(!empty(getmeet())){
  echo "Meeting not empty";
}
if(!empty(getsanction())){
  echo "Sanction not empty";
}

?>

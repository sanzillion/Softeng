<?php
include 'process/functions.php';

echo "im here";
$getdesc = getdescription2();
$arraycount = count($getdesc);
for ($i = 0; $i <$arraycount; $i++){
	$desc[] = implode(',', $getdesc[$i]);
}

$table = getsanction();
if(isset($_GET['year'])){
		$table = sancbyyear($_GET['year']);
}

print_r($desc);
echo $desc[0];
//print_r($table);

foreach ($table as $k) {
	echo $k->$desc[0].'<br>';
}


 ?>

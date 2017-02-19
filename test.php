<?php
include "process/functions.php";
$value = 2;

if($value == 1){
	//header('Content-Type: text/csv; charset=utf-8');
	//header('Content-Disposition: attachment; filename=StudentSanction.csv');
	$meetdate = [];
	$meetdate[] = "Id";
	$meetdate[] = "Name";

	foreach(getmeet() as $d){
		$month = date('M', strtotime($d->m_date));
		$day = date('d', strtotime($d->m_date));
		$meetdate[] = $month." ".$day;
	}

	// create a file pointer connected to the output stream
	$output = fopen('php://output', 'w');

	// output the column headings
	fputcsv($output, $meetdate);

	// fetch the data
	$db = connect();
	$results = getsanction2();

	// loop over the rows, outputting them
	// foreach ($results as $g) {
	// 	fputcsv($output, $results);
	// }

	// fetch mysql table rows
}
if($value == 2){
	
}





?>

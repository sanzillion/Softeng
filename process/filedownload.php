<?php
include "functions.php";

if(isset($_GET['file']) && $_GET['file'] == 1
|| $_GET['file'] == 2|| $_GET['file'] == 3){

	if($_GET['file'] == 1){
		$file = '../files/srs.sql';
	}

	if($_GET['file'] == 2){
		$file = '../files/Students.csv';
	}

	if($_GET['file'] == 3){
		$file = '../files/txt.rar';
	}

	if (file_exists($file)) {
		echo "exists";
		//THIS IS A WORKING EXAMPLE FOR FORCE-DOWNLOADS ANY FILES
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($file).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit;
			header('Location: ../pages/students.php?success');
	}else{
		header("Location: ../pages/students.php?errordownloading");
	}

}

if(isset($_GET['file']) && $_GET['file']== 4){
	if(empty(getmeet()) || empty(getsanction())){
		//if meeting and sanction fields are empty, you cannot download this file
		header('Location: ../pages/index.php?error=3');

	}
	else{
		// output headers so that the file is downloaded rather than displayed
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=StudentSanction.csv');

		//set headings
		$meetdate = [];
		$meetdate[] = "Sanction ID";
		$meetdate[] = "Student ID";
		foreach(getmeet() as $d){
			$month = date('M', strtotime($d->m_date));
			$day = date('d', strtotime($d->m_date));
			$meetdate[] = $month." ".$day;
		}
		$meetdate[] = "Total";
		$meetdate[] = "Lastname";
		$meetdate[] = "Firstname";
		$meetdate[] = "Year";
		$meetdate[] = "Number";
		$meetdate[] = "Fullname";

		//open file to write
		$fp = fopen('php://output', 'w');

		//write headings first
		fputcsv($fp, $meetdate);

		//fetch assoc array
		$results = getsanction3();

		//put every row into the file
		foreach ($results as $fields) {
		    fputcsv($fp, $fields);
		}

		//close the opened file
		fclose($fp);
	}

}

if(isset($_GET['file']) && $_GET['file'] == 5){
	//RECORD DOWNLOAD EXCEL FILE

	// output headers so that the file is downloaded rather than displayed
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=LoginRecords.csv');

	//set headings
	$heading = [];
	$heading[] = "ID";
	$heading[] = "User";
	$heading[] = "Date";
	$heading[] = "Time";
	$heading[] = "Day";

	//open file to write
	$fp = fopen('php://output', 'w');

	//write headings first
	fputcsv($fp, $heading);

	//fetch assoc array
	$results = downloadrecord();

	//put every row into the file
	foreach ($results as $fields) {
			fputcsv($fp, $fields);
	}

	//close the opened file
	fclose($fp);
}



?>

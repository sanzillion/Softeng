<?php

if(isset($_GET['file'])){

	if($_GET['file'] == 1){
		$file = '../files/sad.sql';
	}

	if($_GET['file'] == 2){
		$file = '../files/Book1.csv';
	}

	if($_GET['file'] == 3){
		$file = '../files/names.txt';
	}

	if (file_exists($file)) {
		echo "exists";
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



?>

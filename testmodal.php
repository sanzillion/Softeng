<?php
include 'process/functions.php';
$getdesc = getdescription2(); //2 means FETCH_ASSOC
$arraycount = count($getdesc);
for ($i = 0; $i <$arraycount; $i++){
  $desc[] = implode(',', $getdesc[$i]);
}

$output = '';
$string = "sa";
print_r($results = searchsanction($string));
foreach($results as $g){
	echo $g->name;
}
	if($results){
			foreach($results as $k){
				$output .= '<tr><td>'.$k->s_name.'</td>';
				try{
				if($arraycount >= 1){  $output .= '<td>'.$k->$desc[0].'</td>';}
				if($arraycount >= 2){  $output .= '<td>'.$k->$desc[1].'</td>';}
				if($arraycount >= 3){  $output .= '<td>'.$k->$desc[2].'</td>';}
				if($arraycount >= 4){  $output .= '<td>'.$k->$desc[3].'</td>';}
				if($arraycount >= 5){  $output .= '<td>'.$k->$desc[4].'</td>';}
				if($arraycount >= 6){  $output .= '<td>'.$k->$desc[5].'</td>';}
				if($arraycount >= 7){  $output .= '<td>'.$k->$desc[6].'</td>';}
				if($arraycount >= 8){  $output .= '<td>'.$k->$desc[7].'</td>';}
				 }catch(exception $e){echo $e;}
			 $output .= '<td></td>
			 <td class="text-center"><a data-toggle="modal" data-id="'.$k->sanc_id.'" title="Add this item"
				 class="editSanction btn btn-primary" data-target="#edit-sanction">
			 <i class="fa fa-edit"></i></a>
			 <a class="deleteSanction btn btn-danger" data-id="'.$k->sanc_id.'">
			 <i class="fa fa-trash"></i></a></td>
			 </tr>';
			}
		}else{
		$output .= '<tr><td rowspan="10"><div class="text-center"
		<h1> No results found. </h1></div></td></tr>';
		}
 ?>

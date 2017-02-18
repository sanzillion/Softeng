<?php

session_start();
include "process/functions.php";
$db = connect();

$getdesc = getdescription2();
$arraycount = count($getdesc);

for ($i = 0; $i <$arraycount; $i++){
	$desc[] = implode(',', $getdesc[$i]);
}

//convert dates
$meetdate = [];
foreach(getmeet() as $d){
	$month = date('M', strtotime($d->m_date));
	$day = date('d', strtotime($d->m_date));
	$meetdate[] = $month." ".$day;
}

if($arraycount >= 1){$meet1 = $desc[0];}
if($arraycount >= 2){$meet2 = $desc[1];}
if($arraycount >= 3){$meet3 = $desc[2];}
if($arraycount >= 4){$meet4 = $desc[3];}
if($arraycount >= 5){$meet5 = $desc[4];}
if($arraycount >= 6){$meet6 = $desc[5];}
if($arraycount >= 7){$meet7 = $desc[6];}
if($arraycount >= 8){$meet8 = $desc[7];}


      $output = '';
      $res = sancbyyear("3rd");

        $output .= '<table class="table table-responsive table-striped">
                    <thead class="text-center">
                      <tr class="">
                        <th>Student</th>';
            foreach ($meetdate as $g){
              $output .= '<th>'.$g.'</th>';
            }
            $output .= '</tr></thead>
          <tbody>';
          $i = 0;
        foreach ($res as $k){
          $output .= '<tr>
            <td>'.$k->s_name.'<input type="hidden" name="meeting['.$i.'][meet0]"
                value="'.$k->sanc_id.'"></td>';
            if($arraycount >= 1){  $output .= '<td><select class="form-control"
              name="meeting['.$i.'][meet1]" style="margin-bottom: 5px;" required>
              <option >'.$k->$desc[0].'</option>
              <option>50</option><option>100</option><option>PAID</option>
              <option>CLEARED</option><option>PRESENT</option></select></td>';}
            if($arraycount >= 2){  $output .= '<td><select class="form-control"
              name="meeting['.$i.'][meet2]" style="margin-bottom: 5px;" required>
              <option >'.$k->$desc[1].'</option>
              <option>50</option><option>100</option><option>PAID</option>
              <option>CLEARED</option><option>PRESENT</option></select></td>';}
            if($arraycount >= 3){  $output .= '<td><select class="form-control"
              name="meeting['.$i.'][meet3]" style="margin-bottom: 5px;" required>
              <option >'.$k->$desc[2].'</option>
              <option>50</option><option>100</option><option>PAID</option>
              <option>CLEARED</option><option>PRESENT</option></select></td>';}
            if($arraycount >= 4){  $output .= '<td><select class="form-control"
              name="meeting['.$i.'][meet4]" style="margin-bottom: 5px;" required>
              <option >'.$k->$desc[3].'</option>
              <option>50</option><option>100</option><option>PAID</option>
              <option>CLEARED</option><option>PRESENT</option></select></td>';}
            if($arraycount >= 5){  $output .= '<td><select class="form-control"
              name="meeting['.$i.'][meet5]" style="margin-bottom: 5px;" required>
              <option>'.$k->$desc[4].'</option>
              <option>50</option><option>100</option><option>PAID</option>
              <option>CLEARED</option><option>PRESENT</option></select></td>';}
            if($arraycount >= 6){  $output .= '<td><select class="form-control"
              name="meeting['.$i.'][meet6]" style="margin-bottom: 5px;" required>
              <option >'.$k->$desc[5].'</option>
              <option>50</option><option>100</option><option>PAID</option>
              <option>CLEARED</option><option>PRESENT</option></select></td>';}
            if($arraycount >= 7){  $output .= '<td><select class="form-control"
              name="meeting['.$i.'][meet7]" style="margin-bottom: 5px;" required>
              <option >'.$k->$desc[6].'</option>
              <option>50</option><option>100</option><option>PAID</option>
              <option>CLEARED</option><option>PRESENT</option></select></td>';}
            if($arraycount >= 8){  $output .= '<td><select class="form-control"
              name="meeting['.$i.'][meet8]" style="margin-bottom: 5px;" required>
              <option >'.$k->$desc[7].'</option>
              <option>50</option><option>100</option><option>PAID</option>
              <option>CLEARED</option><option>PRESENT</option></select></td>';}
            $output .=  '</tr>';
            $i++;
        }

        $output .= '</tbody></table>';

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>
     </title>
   </head>
   <body>
     <form class="" action="#" method="post">
       <table>
         <?php echo $output; ?>
       </table>
       <button type="submit" name="sub">SUBMEEEEEET POTA</button>
     </form>
   </body>
 </html>

 <?php
if(isset($_POST['sub'])){
  $i = 1;
  print_r($_POST['meeting']);
  foreach ($_POST['meeting'] as $g) {
    echo "Batch!".$i;
    echo $g['meet0'].'<br>';
     echo $g['meet1'].'<br>';
     echo $g['meet2'].'<br>';
     echo $g['meet3'].'<br>';
     echo $g['meet4'].'<br>';
     $i++;
  }
}

  ?>

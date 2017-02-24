<?php
session_start();
include '../process/functions.php';

$getdesc = getdescription2(); //2 means FETCH_ASSOC
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

$options = options();

if(isset($_POST["view"])){
      $output = '';
      $res = getsanctionbyid($_POST["view"]);

      $output .= '<div class="row">
        <div class="col-md-12 text-center">
            <h4>'.$res->s_name.'</h4>
              <div class="col-md-6">
              <input type="hidden" name="id"
                value="'.$res->sanc_id.'"></td>';

          if($arraycount >= 1){
            $output .= '<select class="form-control"
              name="'.$desc[0].'" style="margin-bottom: 5px;" required>
              <option >'.$res->$desc[0].'</option>'.$options.'</select>';
          }
          if($arraycount >= 3){
            $output .= '<select class="form-control"
              name="'.$desc[2].'" style="margin-bottom: 5px;" required>
              <option >'.$res->$desc[2].'</option>'.$options.'</select>';
          }
          if($arraycount >= 5){
            $output .= '<select class="form-control"
              name="'.$desc[4].'" style="margin-bottom: 5px;" required>
              <option >'.$res->$desc[4].'</option>'.$options.'</select>';
          }
          if($arraycount >= 7){
            $output .= '<select class="form-control"
              name="'.$desc[6].'" style="margin-bottom: 5px;" required>
              <option >'.$res->$desc[6].'</option>'.$options.'</select>';
          }
           $output .= '</div><div class="col-md-6" style="margin-bottom: 10px;">';
          if($arraycount >= 2){
            $output .= '<select class="form-control"
              name="'.$desc[1].'" style="margin-bottom: 5px;" required>
              <option>'.$res->$desc[1].'</option>'.$options.'</select>';
          }
          if($arraycount >= 4){
            $output .= '<select class="form-control"
              name="'.$desc[3].'" style="margin-bottom: 5px;" required>
              <option >'.$res->$desc[3].'</option>'.$options.'</select>';
          }
          if($arraycount >= 6){
            $output .= '<select class="form-control"
              name="'.$desc[5].'" style="margin-bottom: 5px;" required>
              <option >'.$res->$desc[5].'</option>'.$options.'</select>';
          }
          if($arraycount >= 8){
            $output .= '<select class="form-control"
              name="'.$desc[7].'" style="margin-bottom: 5px;" required>
              <option >'.$res->$desc[7].'</option>'.$options.'</select>';
          }
           $output .= '</div></div></div>';
        echo $output;
}

if(isset($_POST['delete'])){ //delete the student from the student roll

    $output = ''; //initialize output

    if(deletesanctionbyid($_POST['delete'])){ //if delete successful
       foreach(getsanction() as $k){
           $output .= '<tr><td>'.$k->s_name.'</td>';
           try{ $total = 0;
             if($arraycount >= 1){  $output .= '<td>'.$k->$desc[0].'</td>';
                 if(is_numeric($k->$desc[0])){$total += $k->$desc[0];}}
             if($arraycount >= 2){  $output .= '<td>'.$k->$desc[1].'</td>';
                 if(is_numeric($k->$desc[1])){$total += $k->$desc[0];}}
             if($arraycount >= 3){  $output .= '<td>'.$k->$desc[2].'</td>';
                 if(is_numeric($k->$desc[2])){$total += $k->$desc[0];}}
             if($arraycount >= 4){  $output .= '<td>'.$k->$desc[3].'</td>';
                 if(is_numeric($k->$desc[3])){$total += $k->$desc[0];}}
             if($arraycount >= 5){  $output .= '<td>'.$k->$desc[4].'</td>';
                 if(is_numeric($k->$desc[4])){$total += $k->$desc[0];}}
             if($arraycount >= 6){  $output .= '<td>'.$k->$desc[5].'</td>';
                 if(is_numeric($k->$desc[5])){$total += $k->$desc[0];}}
             if($arraycount >= 7){  $output .= '<td>'.$k->$desc[6].'</td>';
                 if(is_numeric($k->$desc[6])){$total += $k->$desc[0];}}
             if($arraycount >= 8){  $output .= '<td>'.$k->$desc[7].'</td>';
                 if(is_numeric($k->$desc[7])){$total += $k->$desc[0];}}
              }catch(exception $e){echo $e;}
              if($total == 0){ echo $total = "CLEARED";}else{echo $total;}
            $output .= '<td>'.$total.'</td>
          <td class="text-center"><a data-toggle="modal" data-id="'.$k->sanc_id.'" title="Add this item"
            class="editSanction btn btn-primary" data-target="#edit-sanction">
          <i class="fa fa-edit"></i></a>
          <a class="deleteSanction btn btn-danger" data-id="'.$k->sanc_id.'">
          <i class="fa fa-trash"></i></a></td>
          </tr>';
       }
    }
    else{
      $output .= "<h2>Something Went Wrong!</h2>";
    }
    echo $output;
}

if(isset($_POST['searchname'])){

  $output = '';
  $results = searchsanction($_POST['searchname']);
    if($results){
        foreach($results as $k){
          $output .= '<tr><td>'.$k->s_name.'</td>';
          try{  $total = 0;
          if($arraycount >= 1){  $output .= '<td>'.$k->$desc[0].'</td>';
              if(is_numeric($k->$desc[0])){$total += $k->$desc[0];}}
          if($arraycount >= 2){  $output .= '<td>'.$k->$desc[1].'</td>';
              if(is_numeric($k->$desc[1])){$total += $k->$desc[1];}}
          if($arraycount >= 3){  $output .= '<td>'.$k->$desc[2].'</td>';
              if(is_numeric($k->$desc[2])){$total += $k->$desc[2];}}
          if($arraycount >= 4){  $output .= '<td>'.$k->$desc[3].'</td>';
              if(is_numeric($k->$desc[3])){$total += $k->$desc[3];}}
          if($arraycount >= 5){  $output .= '<td>'.$k->$desc[4].'</td>';
              if(is_numeric($k->$desc[4])){$total += $k->$desc[4];}}
          if($arraycount >= 6){  $output .= '<td>'.$k->$desc[5].'</td>';
              if(is_numeric($k->$desc[5])){$total += $k->$desc[5];}}
          if($arraycount >= 7){  $output .= '<td>'.$k->$desc[6].'</td>';
              if(is_numeric($k->$desc[6])){$total += $k->$desc[6];}}
          if($arraycount >= 8){  $output .= '<td>'.$k->$desc[7].'</td>';
              if(is_numeric($k->$desc[7])){$total += $k->$desc[7];}}
           }catch(exception $e){echo $e;}
           if($total == 0){ echo $total = "CLEARED";}else{echo $total;}
         $output .= '<td>'.$total.'</td>
         <td class="text-center"><a data-toggle="modal" data-id="'.$k->sanc_id.'" title="Add this item"
           class="editSanction btn btn-primary" data-target="#edit-sanction">
         <i class="fa fa-edit"></i></a>
         <a class="deleteSanction btn btn-danger" data-id="'.$k->sanc_id.'">
         <i class="fa fa-trash"></i></a></td>
         </tr>';
        }
      }else{
        $output .= '<tr><td colspan="12"><div class="text-center"
    		<p style="font-size: 1.5em !important;"> No results found </p></div></td></tr>';
      }
  echo $output;
}

if(isset($_POST['show'])){
  $output = '';
  foreach(getsanction() as $k){
      $output .= '<tr><td>'.$k->s_name.'</td>';
      try{ $total = 0;
        if($arraycount >= 1){  $output .= '<td>'.$k->$desc[0].'</td>';
            if(is_numeric($k->$desc[0])){$total += $k->$desc[0];}}
        if($arraycount >= 2){  $output .= '<td>'.$k->$desc[1].'</td>';
            if(is_numeric($k->$desc[1])){$total += $k->$desc[1];}}
        if($arraycount >= 3){  $output .= '<td>'.$k->$desc[2].'</td>';
            if(is_numeric($k->$desc[2])){$total += $k->$desc[2];}}
        if($arraycount >= 4){  $output .= '<td>'.$k->$desc[3].'</td>';
            if(is_numeric($k->$desc[3])){$total += $k->$desc[3];}}
        if($arraycount >= 5){  $output .= '<td>'.$k->$desc[4].'</td>';
            if(is_numeric($k->$desc[4])){$total += $k->$desc[4];}}
        if($arraycount >= 6){  $output .= '<td>'.$k->$desc[5].'</td>';
            if(is_numeric($k->$desc[5])){$total += $k->$desc[5];}}
        if($arraycount >= 7){  $output .= '<td>'.$k->$desc[6].'</td>';
            if(is_numeric($k->$desc[6])){$total += $k->$desc[6];}}
        if($arraycount >= 8){  $output .= '<td>'.$k->$desc[7].'</td>';
            if(is_numeric($k->$desc[7])){$total += $k->$desc[7];}}
         }catch(exception $e){echo $e;}
         if($total == 0){ echo $total = "CLEARED";}else{echo $total;}
       $output .= '<td>'.$total.'</td>
     <td class="text-center"><a data-toggle="modal" data-id="'.$k->sanc_id.'" title="Add this item"
       class="editSanction btn btn-primary" data-target="#edit-sanction">
     <i class="fa fa-edit"></i></a>
     <a class="deleteSanction btn btn-danger" data-id="'.$k->sanc_id.'">
     <i class="fa fa-trash"></i></a></td>
     </tr>';
  }
  echo $output;
}

if(isset($_POST["yr"])){
      $output = '';
      $res = sancbyyear($_POST["yr"]);

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
            <td>'.$k->s_name.'<input type="hidden" name="meeting['.$i.'][m0]"
                value="'.$k->sanc_id.'"></td>';
            if($arraycount >= 1){  $output .= '<td><select class="form-control"
              name="meeting['.$i.'][m1]" style="margin-bottom: 5px;" required>
              <option >'.$k->$desc[0].'</option>'.$options.'</select></td>';}
            if($arraycount >= 2){  $output .= '<td><select class="form-control"
              name="meeting['.$i.'][m2]" style="margin-bottom: 5px;" required>
              <option >'.$k->$desc[1].'</option>'.$options.'</select></td>';}
            if($arraycount >= 3){  $output .= '<td><select class="form-control"
              name="meeting['.$i.'][m3]" style="margin-bottom: 5px;" required>
              <option >'.$k->$desc[2].'</option>'.$options.'</select></td>';}
            if($arraycount >= 4){  $output .= '<td><select class="form-control"
              name="meeting['.$i.'][m4]" style="margin-bottom: 5px;" required>
              <option >'.$k->$desc[3].'</option>'.$options.'</select></td>';}
            if($arraycount >= 5){  $output .= '<td><select class="form-control"
              name="meeting['.$i.'][m5]" style="margin-bottom: 5px;" required>
              <option>'.$k->$desc[4].'</option>'.$options.'</select></td>';}
            if($arraycount >= 6){  $output .= '<td><select class="form-control"
              name="meeting['.$i.'][m6]" style="margin-bottom: 5px;" required>
              <option >'.$k->$desc[5].'</option>'.$options.'</select></td>';}
            if($arraycount >= 7){  $output .= '<td><select class="form-control"
              name="meeting['.$i.'][m7]" style="margin-bottom: 5px;" required>
              <option >'.$k->$desc[6].'</option>'.$options.'</select></td>';}
            if($arraycount >= 8){  $output .= '<td><select class="form-control"
              name="meeting['.$i.'][m8]" style="margin-bottom: 5px;" required>
              <option >'.$k->$desc[7].'</option>'.$options.'</select></td>';}
            $output .=  '</tr>';
            $i++;
        }

        $output .= '</tbody></table>';
        echo $output;
}

if(isset($_POST['searchnameindex'])){

  $output = '';
  $results = searchsanction($_POST['searchnameindex']);
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
        if($k->total == 0){$total = "CLEARED";}else{$total = $k->total;}
         $output .= '<td>'.$total.'</td></tr>';
        }
      }else{
        $output .= '<tr><td colspan="12"><div class="text-center"
    		<p style="font-size: 1.5em !important;"> No results found </p></div></td></tr>';
      }
  echo $output;
}

if(isset($_POST['showindex'])){
  $output = '';
  foreach(getsanction() as $k){
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
         if($k->total == 0){$total = "CLEARED";}else{$total = $k->total;}
       $output .= '<td>'.$total.'</td>
     </tr>';
  }
  echo $output;
}

 ?>

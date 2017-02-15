<?php
include '../process/functions.php';
if(isset($_POST["view"])){

      $output = '';
      $res = getstudentsbyid($_POST["view"]);

      $output .= '
      <div class="table-responsive">
           <table class="table table-striped">';

           $output .= '
                <tr>
                     <td width="30%"><label>ID :</label></td>
                     <td width="70%">'.$res->s_id.'<input type="hidden" name="id" value="'.$res->s_id.'"></td>
                </tr>
                <tr>
                     <td width="30%"><label>Name :</label></td>
                     <td width="70%"><input class="form-control" type="text" name="name" value="'.$res->name.'"></td>
                </tr>
                <tr>
                     <td width="30%"><label>Year :</label></td>
                     <td width="70%"><input class="form-control" type="text" name="cpnum" value="'.$res->cpnum.'"></td>
                </tr>
                 <tr>
                     <td width="30%"><label>Mobile no. :</label></td>
                     <td width="70%"><select class="form-control" name="yr" reuired>
              					<option>'.$res->year.'</option>
              					<option>1st</option>
              					<option>2nd</option>
              					<option>3rd</option>
              					<option>4th</option>
      				      </select></td>
                </tr>';

           $output .= '</table></div>';
        echo $output;
}

if(isset($_POST['delete'])){ //delete the student from the student roll

    $output = ''; //initialize output
    $a = getstudentsbyid($_POST['delete']);
    $name = $a->name;
    //as well as delete the student from the sanction record
    //case probably a drop out
    if(deletefromsanc($name) && deleteonestudent($_POST['delete'])){
      $output .= '<table class="table table-hover table-striped">
        <tbody>';
       foreach(getstudents() as $g){
           $output .= '<tr>
             <td class="indent">'.$g->name.'</td>
             <td>'.$g->year.'</td>
             <td class="text-center">'.$g->cpnum.'</td>
             <td class="text-center"><a data-toggle="modal" data-id="'.$g->s_id.'" title="Add this item"
               class="editStudents btn btn-primary" href="#edit-students" data-target="#edit-students">
             <i class="fa fa-edit"></i></a>
             <a class="deleteStudent btn btn-danger" data-id="'.$g->s_id.'"
             onclick="return confirm("Are you sure?")">
             <i class="fa fa-trash"></i></a></td>
           </tr>';
       }
           $output .= '</tbody></table>';
    }else{
      $output .= "<h2>Something Went Wrong!</h2>";
    }

    echo $output;
}

if(isset($_POST['searchname'])){

  $output = '';
  $output .= '<table class="table table-hover table-striped">
      <tbody>';

      $results = searchstudent($_POST['searchname']);
          if($results){
            foreach($results as $g){
              $output .= '<tr>
                <td class="indent">'.$g->name.'</td>
                <td>'.$g->year.'</td>
                <td class="text-center">'.$g->cpnum.'</td>
                <td class="text-center"><a data-toggle="modal" data-id="'.$g->s_id.'" title="Add this item"
                  class="editStudents btn btn-primary" href="#edit-students" data-target="#edit-students">
                <i class="fa fa-edit"></i></a>
                <a class="deleteStudent btn btn-danger" data-id="'.$g->s_id.'"
                onclick="return confirm("Are you sure?")">
                <i class="fa fa-trash"></i></a></td>
              </tr>';
            }
      }
      else{
        $output .= '<tr><td colspan="10"><div class="text-center"
        <p style="font-size: 1.5em !important;"> No results found </p></div></td></tr>';
      }

  $output .= '</tbody></table>';
  echo $output;

}

if(isset($_POST['show'])){
  $output = '';
  $output .= '<table class="table table-hover table-striped">
              <tbody>';
  foreach(getstudents() as $g){
        $output .= '<tr>
          <td class="indent">'.$g->name.'</td>
          <td>'.$g->year.'</td>
          <td class="text-center">'.$g->cpnum.'</td>
          <td class="text-center"><a data-toggle="modal" data-id="'.$g->s_id.'" title="Add this item"
            class="editStudents btn btn-primary" href="#edit-students" data-target="#edit-students">
          <i class="fa fa-edit"></i></a>
          <a class="deleteStudent btn btn-danger" data-id="'.$g->s_id.'"
          onclick="return confirm("Are you sure?")">
          <i class="fa fa-trash"></i></a></td>
        </tr>';
  }
      $output .= '</tbody></table>';

  echo $output;
}

 ?>

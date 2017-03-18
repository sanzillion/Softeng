<?php
include '../process/functions.php';

if(isset($_POST['delete'])){
    $account = getmeetbyid($_POST['delete']);
	  $desc = $account->description;
    $db = connect();
    $output = '';
    $query = $db->prepare("ALTER TABLE `sanction` DROP `$desc`");
      if($query->execute() && deletemeetbyid($_POST['delete'])){
        foreach(getmeet() as $g){
            $output .= '<tr class="text-center">
              <td>'.$g->m_id.'</td>
              <td>'.$g->description.'</td>
              <td>'.$g->penalty.'</td>
              <td class="text-center">'.$g->m_date.'</td>
              <td class="text-center"><a data-toggle="modal" data-id="'.$g->m_id.'" title="Add this item"
                class="editMeeting btn btn-primary" data-target="#edit-meeting">
              <i class="fa fa-edit"></i></a>
              <a class="deleteMeeting btn btn-danger" data-id="'.$g->m_id.'">
              <i class="fa fa-trash"></i></a></td>
            </tr>';
        }
      }
      else{
        $output .= "<h2>Something Went Wrong!</h2>";
      }

    echo $output;
}

if(isset($_POST["view"])){

      $output = '';
      $res = getmeetbyid($_POST["view"]);

      $output .= '
      <div class="table-responsive">
           <table class="table table-striped">';

           $output .= '
                <tr>
                     <td width="30%"><label>ID :</label></td>
                     <td width="70%">'.$res->m_id.'<input type="hidden" name="id" value="'.$res->m_id.'"></td>
                </tr>
                <tr>
                     <td width="30%"><label>Description :</label></td>
                     <td width="70%"><input class="form-control" type="text" name="des" value="'.$res->description.'"></td>
                </tr>
                <tr>
                     <td width="30%"><label>Penalty :</label></td>
                     <td width="70%"><input class="form-control" type="text" name="pen" value="'.$res->penalty.'"></td>
                </tr>
                <tr>
                     <td width="30%"><label>Date :</label></td>
                     <td width="70%"><input class="form-control" type="date" name="dat" value="'.$res->m_date.'"></td>
                </tr>';

           $output .= '</table></div>';
        echo $output;
}

?>

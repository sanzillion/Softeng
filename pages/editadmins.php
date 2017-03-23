<?php
include_once '../process/functions.php';
if(isset($_POST['delete'])){
  //delete the admin.. POST from master js ajax request
    $output = ''; //initialize output
    if(deleteadmin($_POST['delete'])){
      $output .= '<table class="table table-hover table-striped">
        <tbody>';
       foreach(getadmins() as $g){
           $output .= '<tr>
             <td class="indent">'.$g->id.'</td>
             <td class="text-center">'.$g->user.'</td>
             <td class="text-center">'.$g->privilege.'</td>
             <td class="text-center"><a data-toggle="modal" data-id="'.$g->id.'"
             title="Add this item"
               class="editAdmin btn btn-primary" data-target="#edit-admin">
             <i class="fa fa-edit"></i></a>
             <a class="deleteAdmin btn btn-danger" data-id="'.$g->id.'"
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

if(isset($_POST['edit'])){

      $output = '';
      $res = getadminbyid($_POST["edit"]);

      $output .= '
      <div class="table-responsive">
           <table class="table table-striped">';

           $output .= '
                <tr>
                     <td width="30%"><label>ID :</label></td>
                     <td width="70%">'.$res->id.'<input type="hidden" name="id" value="'.$res->id.'"></td>
                </tr>
                <tr>
                     <td width="30%"><label>Name :</label></td>
                     <td width="70%"><input class="form-control" type="text" name="user" value="'.$res->user.'"></td>
                </tr>
                <tr>
                     <td width="30%"><label>Password :</label></td>
                     <td width="70%"><input class="form-control" type="password" name="pw" value="'.$res->pass.'"></td>
                </tr>
                <tr>
                     <td width="30%"><label>Privilege :</label></td>
                     <td width="70%"><select name="priv" class="form-control">
                      <option>'.$res->privilege.'</option>
                      <option>PRESIDENT</option>
                      <option>TREASURER</option>
                      <option>ASSISTANT</option>
                     </select></td>
                </tr>';

           $output .= '</table></div>';
        echo $output;
}
 ?>

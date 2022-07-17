 <?php
if(isset($_POST["action"]))
{ 
 include( 'db.php');
if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM landp";
  $result = mysqli_query($connect, $query);
  $output = '
  <div class="table-responsive">
   <table class="table table-bordered table-striped">  
    <tr>
     <th width="10%">ID</th>
     <th width="70%">Image</th>
     <th width="20%">Head</th>
     <th width="20%">Title</th>
     <th width="20%">Link</th>
     <th width="10%">Change</th>
     <th width="10%">Remove</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
     <td>'.$row["id"].'</td>
     <td>
      <img src="data:image/jpeg;base64,'.base64_encode($row['fpimg'] ).'" height="60" width="225" class="img-thumbnail" />
     </td>
     <td>'.$row["fphead"].'</td>
     <td>'.$row["fptitle"].'</td>
     <td>'.$row["fpbtn"].'</td>
     <td><button type="button" name="update" class="btn btn-warning bt-xs update" id="'.$row["id"].'">Change</button></td>
     <td><button type="button" name="delete" class="btn btn-danger bt-xs delete" id="'.$row["id"].'">Remove</button></td>
    </tr>
   ';
  }
  $output .= '</table></div>';
  echo $output;
 }
 if($_POST["action"] == "insert")
 {     
    $fptitle = $_POST['fptitle'];   
    $fphead = $_POST['fphead'];   
    $fpbtn = $_POST['fpbtn'];   
     
  $file = addslashes(file_get_contents($_FILES["fpimg"]["tmp_name"]));
  $query = "INSERT INTO landp(fpimg,fptitle,fphead,fpbtn) VALUES ('$file','$fptitle' ,'$fphead','$fpbtn')";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Inserted into Database';
  }
 }
    
    
if($_POST["action"] == "update")
 {
     $fptitle = $_POST['fptitle'];   
    $fphead = $_POST['fphead'];   
    $fpbtn = $_POST['fpbtn'];  
  $file = addslashes(file_get_contents($_FILES["fpimg"]["tmp_name"]));
  $query = "UPDATE landp SET fpimg = '$file', fptitle = '$fptitle', fphead = '$fphead', fpbtn = '$fpbtn' WHERE id = '".$_POST["image_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Updated into Database';
  }
 }
 if($_POST["action"] == "delete")
 {
  $query = "DELETE FROM landp WHERE id = '".$_POST["image_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Deleted from Database';
  }
 }
}
?>
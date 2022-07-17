
<?php 
if(isset($_POST["action"]))
{
include('db.php');
if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM devotianal ";
  $result = mysqli_query($connect, $query);
  $output = '
  <div class="table-responsive">
   <table class="table table-bordered table-striped mb-5">  
    <tr>
     <th>ID</th>
     <th >videos</th>
     <th >Links</th>
     <th >Change</th>
     <th >Remove</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
     <td>'.$row["id"].'</td>
     <td> <iframe src="https://www.youtube.com/embed/'.$row["devlink"].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
    <td>'.$row["devlink"].'</td>

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
    $devlink = $_POST['devlink'];   
  $query = "INSERT INTO devotianal (devlink) VALUES ('$devlink')";
  if(mysqli_query($connect, $query))
  {
   echo 'video Inserted into Database';
  } 
 }
if($_POST["action"] == "update")
 {
    $devlink = $_POST['devlink'];
    $query = "UPDATE devotianal SET devlink = '$devlink' WHERE id = '".$_POST["li_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Updated into Database';
  }
 }
     if($_POST["action"] == "delete")
 {
  $query = "DELETE FROM devotianal WHERE id = '".$_POST["li_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Video Deleted from Database';
  }
 }

}
?>
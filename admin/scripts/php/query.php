<?php
if(isset($_POST["action"]))
{
 include('db.php');
    if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM query";
  $result = mysqli_query($connect, $query);
  $output = '
  <div class="table-responsive">
   <table style="width: 100%;" class="table table-bordered table-striped">  
    <tr>
     <th width="10%">ID</th>
     <th width="10%">Name</th>
     <th width="10%">Number</th>
     <th width="10%">Mail</th>
     <th width="60%">Message</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
    
     <td>'.$row["id"].'</td>
     
    
     <td>
      <div> '.$row['name'].'</div>
     </td>     
               
     <td>
      <div> '.$row['num'].'</div>
     </td>     
     
          
     <td>
      <div> '.$row['mail'].'</div>
     </td>     
     <td>
      <div> '.$row['message'].'</div>
     </td>     
     

    </tr>
   ';
  }
  $output .= '</table> </div>';
  echo $output;
 }
}
?>
<html lang="en">
<head>
        <title>A2Music</title>
</head>
<body>
<?php
include('db.php');
    if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM landp ";
  $result = mysqli_query($con, $query);
  $output = '<div class="hero-slider" data-carousel>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   
   <div class="carousel-cell img-responsive" style="background-image:url(data:image/jpeg;base64,'.base64_encode($row['fpimg'] ).')"> 
    <div class="overlay"></div>
                <div class="inner">
                            <div class="olap mx-auto d-block">

                    <div class="subtitle fon1"><span class="hdul">'.$row["fphead"].'</span></div>
                    <div class="title mt-3 fon2"><span class="hdbg  p-2">'.$row["fptitle"].'</span></div>
                    <a href="'.$row["fpbtn"].'" target="_blank" class="btn fon1">Watch Now</a>
                </div>
            </div>
   
   </div>

   ';
  }
  $output .= '</div>';
  echo $output;
 } 
    
    
?>


    
    
                            <?php 
//$db = mysqli_connect("localhost","root","","atwom");
//mysqli_select_db($db,'atwom');
//$query = "select * from landp";
//$queryform = mysqli_query($db,$query);
//if(mysqli_num_rows($queryform) > 0){
//while($result= mysqli_fetch_array($queryform)){
?>
<!--
            <div class="carousel-cell" style="background-image:url(data:image/jpeg;base64, <?php // echo base64_encode($result['fpimg']) ?>) ">
                
                
                <div class="overlay"></div>
                <div class="inner">
                    <h3 class="subtitle"> <?php // echo $result['fptitle']?></h3>
                    <h2 class="title"> <?php // echo $result['fphead']?></h2>
                    <a href=" <?php // echo $result['fpbtn']?>" target="_blank" class="btn btn-primary">Watch Now</a>
                </div>
-->

                <?php
//}
//}
?>
  
    <script type="text/javascript" src="scripts/main.js"></script>
</body>
</html>

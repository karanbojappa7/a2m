  <?php
include "db.php";
$name = $_POST['name'];
$num = $_POST['num'];
$mail = $_POST['mail'];
$message = $_POST['message'];
$query=("INSERT INTO query(name,num,mail,message) VALUES('$name','$num','$mail','$message')");
mysqli_query($con,$query);
?>
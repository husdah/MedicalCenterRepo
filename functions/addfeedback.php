<?php
require('../config/dbcon.php');
$feedback=$_POST['feedback'];
$did=$_POST['did'];
if(isset($_POST['feedback']) && $_POST['feedback']!="" )
{
$query="insert into feedback (doctorId,message) values('$did','$feedback')";
mysqli_query($con,$query);
}
header('location:../doctorpage.php?did='.$did); 
?>
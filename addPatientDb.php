<?php
require('config/dbcon.php');
$pname=$_POST['pname'];
$pid=$_POST['pid'];
$newappdate=$_POST['nappdate'];
$tapp=$_POST['tapp'];

$query2="select patientId from patient where userId='$pid'";
$res=mysqli_query($con,$query2);
while($row=mysqli_fetch_assoc($res))
{
    $pid2=$row['patientId'];
}
if(isset($_POST['pname']) && $_POST['pname']!='')
{
    $query1 = "insert into appointement(doctorId,patientId,date,time,status) values ('1','$pid2','$newappdate','$tapp','accepted')";
		mysqli_query($con, $query1);
    
        
		
}
?>
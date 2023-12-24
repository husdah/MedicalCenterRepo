<?php
//header('Content-Type: application/json');
require('../../config/dbcon.php');
$pname=$_POST['pname'];
$newappdate=$_POST['nappdate'];
$tapp=$_POST['tapp'];

$query2="select userId from user where email='$pname'";
$res=mysqli_query($con,$query2);

while($row=mysqli_fetch_assoc($res))
{
    $pid2=$row['userId'];
}
$query3="select patientId from patient where patient.userId='$pid2'";
$res3=mysqli_query($con,$query3);

while($row=mysqli_fetch_assoc($res3))
{
    $pid3=$row['patientId'];
}
if(isset($_POST['pname']) && $_POST['pname']!='')
{
    $query1 = "insert into appointment(doctorId,patientId,date,time,status) values ('1','$pid3','$newappdate','$tapp','accepted')";
		mysqli_query($con, $query1);
    
        
		
}
?>
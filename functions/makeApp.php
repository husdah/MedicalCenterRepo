<?php
session_start();
require('../config/dbcon.php');

$did = $_POST['did'] ;
$date = $_POST['day'] ;
$time = $_POST['time'];
$status = 'pending';
$pid=$_SESSION['patientId'];

if (isset($_POST['time']) && $_POST['time'] !== "") {
    $query = "INSERT INTO appointment(doctorId, patientId, date, time, status) VALUES ('$did', '$pid', '$date', '$time', '$status')";
    // Execute the query here
    mysqli_query($con,$query);  
}
?>

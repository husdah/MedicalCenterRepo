<?php
session_start();
include('../../config/dbcon.php');

if(isset($_POST['del-btn'])){
    $appointmentId= $_POST['appId'];
    $update_query = "UPDATE `appointment` SET `status`='canceled' WHERE appId = $appointmentId";
    mysqli_query($con,$update_query);
}
else if(isset($_POST['acc-btn'])){
    $appointmentId= $_POST['appId'];
    $update_query = "UPDATE `appointment` SET `status`='confirmed' WHERE appId = $appointmentId";
    mysqli_query($con,$update_query);
}

?>
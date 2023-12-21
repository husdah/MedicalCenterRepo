<?php

require_once('../../config/dbcon.php');
header('Content-type: application/json');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = json_decode(file_get_contents('php://input'));

    $doctorId = mysqli_real_escape_string($con, trim($json->id));

    $update_doctor_query = "UPDATE doctor SET deleted=1 WHERE doctorId=?";
    $update_doctor_query_run = mysqli_prepare($con, $update_doctor_query);
    mysqli_stmt_bind_param($update_doctor_query_run, "i" , $doctorId);
    
    if(mysqli_stmt_execute($update_doctor_query_run))
    {
        mysqli_stmt_close($update_doctor_query_run);
        mysqli_close($con);
        echo json_encode("deleted");
    } else {
        mysqli_stmt_close($update_doctor_query_run);
        mysqli_close($con);
        echo json_encode("could not delete from database");
    }
}
?>
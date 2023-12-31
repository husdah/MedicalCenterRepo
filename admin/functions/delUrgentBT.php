<?php

require_once('../../config/dbcon.php');
header('Content-type: application/json');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = json_decode(file_get_contents('php://input'));

    $bloodType = mysqli_real_escape_string($con, trim($json->bloodType));

    $delete_query = "DELETE FROM urgentBT WHERE bloodType=?";
    $delete_query_run = mysqli_prepare($con, $delete_query);
    mysqli_stmt_bind_param($delete_query_run, "s", $bloodType);

    if(mysqli_stmt_execute($delete_query_run))
    {
        mysqli_stmt_close($delete_query_run);
        mysqli_close($con);
        echo json_encode("deleted");
    } else {
        mysqli_stmt_close($delete_query_run);
        mysqli_close($con);
        echo json_encode("could not delete from database");
    }
}
?>
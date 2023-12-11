<?php

include("../config/dbcon.php");

function redirect($url, $message){
    $_SESSION['message']= $message;
    header('Location: ' .$url);
    exit();
}

function getRowCount($table){
    global $con;
    $query= "SELECT * FROM $table";
    $query_run = mysqli_query($con,$query);
    return mysqli_num_rows($query_run);
}

function getAppointments(){
    global $con;
    /* $query = "SELECT user.Fname AS fname, user.Lname AS lname, app.date AS date, app.time AS time, app.status AS status
        FROM user, appointment AS app, patient
        WHERE app.patientId = patient.patientId 
        AND patient.userId = user.userId"; */
        $query = "SELECT user.Fname AS Fname, user.Lname AS Lname, app.date AS date, app.time AS time, app.status AS status
        FROM appointment AS app
        INNER JOIN patient
        on app.patientId = patient.patientId
        INNER JOIN user
        on patient.userId = user.userId;";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getReminders(){
    global $con;
    $query= "SELECT * FROM reminders ORDER BY date DESC";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getAll($table){
    global $con;
    $query= "SELECT * FROM $table";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getClinicById($id){
    global $con;
    $query= "SELECT * FROM clinic WHERE clinicId = $id";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getNameById($id){
    global $con;
    $query= "SELECT user.Fname AS Fname, user.Lname AS Lname FROM user, doctor 
    WHERE user.userId = doctor.userId
    AND doctor.doctorId = $id";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getProfilePicById($id){
    global $con;
    $query= "SELECT profilePic FROM doctor WHERE doctorId = $id";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getSpecificDoc($deleted){
    global $con;
    $query= "SELECT * FROM doctor WHERE deleted = $deleted";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getDocInfoById($id){
    global $con;
    $query= "SELECT user.Fname AS Fname, user.Lname AS Lname, user.email AS email, user.password AS password, doctor.userId As userId, doctor.clinicId As clinicId, doctor.phoneNumber As phoneNumber 
    FROM user, doctor 
    WHERE user.userId = doctor.userId
    AND doctor.doctorId = $id";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getExceptionsById($id){
    global $con;
    $query= "SELECT * FROM workingexception WHERE doctorId = $id";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getAdminInfo(){
    global $con;
    $query= "SELECT * FROM user WHERE role =0";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

?>
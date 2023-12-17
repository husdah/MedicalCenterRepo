<?php

require("../config/dbcon.php");

function redirect($url, $message){
    $_SESSION['message']= $message;
    header('Location: ' .$url);
    exit();
}

function getRowCount($table){
    global $con;
    $query= "SELECT * FROM $table";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return mysqli_num_rows($result);
}

function getAppointments(){
    global $con;
    $query = "SELECT user.Fname AS Fname, user.Lname AS Lname, app.date AS date, app.time AS time, app.status AS status
              FROM appointment AS app
              INNER JOIN patient
              ON app.patientId = patient.patientId
              INNER JOIN user
              ON patient.userId = user.userId;";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

function getAppByPatient($id) {
    global $con;

    // Cast $id to an integer
    $pid = (int)$id;

    $query = "SELECT user.Fname AS fname, user.Lname AS lname, app.date AS date, app.time AS time, app.status AS status, doctor.doctorId As doctorId , doctor.profilePic As profilePic
    FROM user, appointment AS app, patient, doctor
    WHERE app.patientId = patient.patientId 
    AND doctor.userId = user.userId
    AND patient.patientId=? ";

    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($query_run, "i", $pid);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

function getReminders(){
    global $con;
    $query= "SELECT * FROM reminders ORDER BY date DESC";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

function getAll($table){
    global $con;
    $query= "SELECT * FROM $table";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

function getClinicById($id){
    global $con;
    $query= "SELECT * FROM clinic WHERE clinicId =?";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($query_run, "i", $id);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

function getNameById($id){
    global $con;
    $query= "SELECT user.Fname AS Fname, user.Lname AS Lname FROM user, doctor 
    WHERE user.userId = doctor.userId
    AND doctor.doctorId =?";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($query_run, "i", $id);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

function getPatientInfoById($id){
    global $con;
    $query= "SELECT user.Fname AS Fname, user.Lname AS Lname, user.email AS email, patient.patientId As patientId , patient.gender AS gender, patient.bloodType AS bloodType, patient.dateOfBirth AS dateOfBirth, patient.phoneNumber AS phoneNumber
    FROM user, patient 
    WHERE user.userId = patient.userId
    AND user.userId =?";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($query_run, "i", $id);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

function getProfilePicById($id){
    global $con;
    $query= "SELECT profilePic FROM doctor WHERE doctorId =?";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($query_run, "i", $id);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

function getSpecificDoc($deleted){
    global $con;
    $query= "SELECT * FROM doctor WHERE deleted =?";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($query_run, "i", $deleted);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

function getDocInfoById($id){
    global $con;
    $query= "SELECT user.Fname AS Fname, user.Lname AS Lname, user.email AS email, user.password AS password, doctor.userId As userId, doctor.clinicId As clinicId, doctor.phoneNumber As phoneNumber 
    FROM user, doctor 
    WHERE user.userId = doctor.userId
    AND doctor.doctorId =?";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($query_run, "i", $id);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

function getPatients(){
    global $con;
    $query= "SELECT userId, Fname, Lname, registrationDate, restricted FROM user WHERE role = 2";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

function getExceptionsById($id){
    global $con;
    $query= "SELECT * FROM workingexception WHERE doctorId =?";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($query_run, "i", $id);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

function getAdminInfo(){
    global $con;
    $query= "SELECT * FROM user WHERE role =0";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

function getDocWhours(){
    global $con;
    $query= "SELECT user.Fname AS Fname, user.Lname AS Lname, doctor.doctorId As doctorId , doctor.profilePic As profilePic
    FROM user, doctor
    WHERE user.userId = doctor.userId";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

/* , wh.day As day, wh.fromHour As fromHour, wh.toHour As toHour, wh.available As available  */

function getDocWhours2($id){
    global $con;
    $query= "SELECT d.day As day, d.fromHour AS fromHour , d.toHour AS toHour , d.available AS available  FROM doctorhours AS d  WHERE d.doctorId =?  ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($query_run, "i", $id);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

function getMedHours(){
    global $con;
    $query= "SELECT * FROM medicalhours ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

function getWorkingDays(){
    global $con;
    $query= "SELECT day FROM medicalhours WHERE closed=0 ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');";
    $query_run = mysqli_prepare($con, $query);
    mysqli_stmt_execute($query_run);
    $result = mysqli_stmt_get_result($query_run);
    return $result;
}

?>
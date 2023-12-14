<?php

include("../config/dbcon.php");

function redirect($url, $message){
    $_SESSION['message']= $message;
    header('Location: ' .$url);
    exit();
}

function getAppoinmentCount($id){
    global $con;
    $query= "SELECT * FROM `appointment`,`doctor` WHERE doctor.doctorId = appointment.doctorId
    AND doctor.doctorId = $id";
    $query_run = mysqli_query($con,$query);
    return mysqli_num_rows($query_run);
}


function getRequestCount($id){
    global $con;
    $query= "SELECT * FROM `appointment`,`doctor` WHERE doctor.doctorId = appointment.doctorId
    AND doctor.doctorId = $id AND appointment.status = 'pending'";
    $query_run = mysqli_query($con,$query);
    return mysqli_num_rows($query_run);
}

function getPastAppointments($id){
    global $con;
    $query= "SELECT * FROM `appointment`,`patient` WHERE patient.patientId = appointment.patientId
    AND patient.patientId = $id AND appointment.status = 'completed'";
    $query_run = mysqli_query($con,$query);
    return mysqli_num_rows($query_run);
}

function getUpcomingAppointments($id){
    global $con;
    $query= "SELECT * FROM `appointment`,`patient` WHERE patient.patientId = appointment.patientId
    AND patient.patientId = $id AND (appointment.status = 'completed' OR appointment.status = 'accepted')";
    $query_run = mysqli_query($con,$query);
    return mysqli_num_rows($query_run);
}


function getPatientCount($id){
    global $con;
    $query= "SELECT COUNT(DISTINCT patient.patientId) AS patient_count FROM `patient`,`appointment`,`doctor` WHERE patient.patientId = appointment.patientId AND 
    doctor.doctorId = appointment.doctorId  AND doctor.doctorId = $id";
    $query_run = mysqli_query($con,$query);
    if ($query_run) {
        $row = mysqli_fetch_assoc($query_run);
        return $row['patient_count'];
    } else {
        return 0;
    }
}

function getDoctorId($id){
    global $con;
    $query= "SELECT doctor.doctorId FROM doctor 
             INNER JOIN user ON doctor.userId = user.userId
             WHERE user.userId = $id";
    $query_run = mysqli_query($con, $query);
    
    if ($query_run) {
        $doctorId = mysqli_fetch_assoc($query_run)['doctorId'];
        return $doctorId;
    } else {
        return null;
    }
}

function getAppointmentRequest($id){
    global $con;
    $query= "SELECT `Fname`, `Lname`, `date`, `time` FROM `appointment` ,`patient`,`user`,`doctor` WHERE 
    user.userId = patient.userId AND appointment.patientId = patient.patientId AND 
    appointment.status = 'pending' AND doctor.doctorId = appointment.doctorId AND doctor.doctorId = $id";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getAppointments(){
    global $con;
    $query= "SELECT `Fname`, `Lname`, `date`, `time` ,`status` FROM `appointment` ,`patient`,`user` WHERE 
    user.userId = patient.userId AND appointment.patientId = patient.patientId";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getAppointmentById($id){
    global $con;
    $query= "SELECT * FROM `appointment` ,`patient`,`user` WHERE 
    user.userId = patient.userId AND appointment.patientId = patient.patientId AND patient.patientId = $id ";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getPatients(){
    global $con;
    $query= "SELECT * FROM `patient`,`user` WHERE patient.userId = user.userId";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

function getPatientById($id){
    global $con;
    $query= "SELECT * FROM `patient`,`user` WHERE patient.userId = user.userId AND patient.PatientId = $id";
    $query_run = mysqli_query($con,$query);
    return $query_run;
}

?>
<?php

include("config/dbcon.php");

// Counter Section
function getRowCount($table){
    global $con;
    $query  = "SELECT * FROM $table";
    $result = mysqli_query($con,$query);
    return mysqli_num_rows($result);
}

// Doctor Section
function getDoctors(){
    global $con;
    $query    = 'SELECT doctor.profilePic AS doctorPhoto, CONCAT(user.Fname, " ", user.Lname) AS FullName, clinic.name AS clinicName, media.facebook, media.instagram, media.linkedin
    FROM doctor
    JOIN user   ON doctor.userId = user.userId
    JOIN clinic ON clinic.clinicId = doctor.clinicId
    JOIN media  ON doctor.doctorId = media.doctorId;
    ';
    $result   = mysqli_query($con,$query); 
    return $result;
}

// Clinic Section
function getClinics(){
    global $con;
    $query    = 'SELECT * FROM clinic';
    $result   = mysqli_query($con,$query); 
    return $result;
}

// Footer Section
function getOpeningHour(){
    global $con;
    $query    = 'SELECT * FROM medicalhours';
    $result   = mysqli_query($con,$query); 
    return $result;
}

?>
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


// Donation Section
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email-phone']) && isset($_POST['mySelect'])){
    /* echo '<script> alert("Clicked.")</script>'; */
    // Functions to check if the input is a valid email address or a phone number
    function isEmail($input) {
        return filter_var($input, FILTER_VALIDATE_EMAIL) !== false;
    }
    function isPhoneNumber($input) {
        $phonePattern = '/^\+?[0-9-()\s]+$/';
        return preg_match($phonePattern, $input);
    }

    $emailOrPhone = $_POST['email-phone'];
    $BloodType    = $_POST['mySelect'];
    if($emailOrPhone != "" && $BloodType != ""){
        if(isEmail($emailOrPhone)){
            $columnEmail = $emailOrPhone;
            $query  = "INSERT INTO donor (email, bloodType, phoneNumber) VALUES ('$columnEmail', '$BloodType', NULL);";
            $result = mysqli_query($con,$query);
            if($result){
                /* echo '<script> alert("Added Successfully.")</script>'; */
                header('Location: home.php'); 
            }else{
                /* echo '<script> alert("Something went wrong . Please try again.")</script>'; */
                header('Location: home.php'); 
            }
        }
        else if(isPhoneNumber($emailOrPhone)){
            $columnPhone = $emailOrPhone;
            $query  = "INSERT INTO donor (email, bloodType, phoneNumber) VALUES (NULL, '$BloodType', '$columnPhone');";
            $result = mysqli_query($con,$query);
            if($result){
                /* echo '<script> alert("Added Successfully.")</script>'; */
                header('Location: home.php'); 
            }else{
                /* echo '<script> alert("Something went wrong . Please try again.")</script>'; */
                header('Location: home.php'); 
            }
        }
    }
}

// Footer Section
function getOpeningHour(){
    global $con;
    $query    = 'SELECT * FROM medicalhours';
    $result   = mysqli_query($con,$query); 
    return $result;
}

?>
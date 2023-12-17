<?php
session_start();
require('../../config/dbcon.php');

function redirect($url, $message){
    $_SESSION['message']= $message;
    header('Location: ' .$url);
    exit();
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to validate name
function validateName($name) {
    $nameRegex = '/^[a-zA-Z]+$/';
    return preg_match($nameRegex, $name);
}

// Function to validate desc
function validateDesc($desc) {
    $descRegex = '/^[a-zA-Z\s]+$/';
    return preg_match($descRegex, $desc);
}

// Function to validate email
function validateEmail($email) {
    $emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
    return preg_match($emailRegex, $email);
}

// Function to validate password
function validatePass($pass) {
    $passRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
    return preg_match($passRegex, $pass);
}

// Function to validate phone
function validatePhone($phone) {
    $lebanesePhoneRegex = '/^\d{8}$/';
    /* $lebanesePhoneRegex = '/^(?:\+961|0\d{1,2}) \d{3} \d{3}$/'; */
    return preg_match($lebanesePhoneRegex, $phone);
}

if(isset($_POST['reminderInput'])){
    $reminder=test_input($_POST['reminderInput']);

    if($reminder != "" || !validateDesc($reminder)){
        /* $reminder_query= "INSERT INTO reminders (reminder) VALUES ('$reminder');";
        $reminder_query_run = mysqli_query($con,$reminder_query); */

        // Prepare the statement
        $reminder_query = "INSERT INTO reminders (reminder) VALUES (?)";
        $reminder_query_run = mysqli_prepare($con, $reminder_query);
        // Bind the parameters
        mysqli_stmt_bind_param($reminder_query_run, "s", $reminder);

        if(mysqli_stmt_execute($reminder_query_run))
        {
            mysqli_stmt_close($reminder_query_run);
            mysqli_close($con);
            redirect('../dashboard.php',"reminder Added Successfully!");
            /* header('Location: ../dashboard.php'); */
    
        }else{
            mysqli_stmt_close($reminder_query_run);
            mysqli_close($con);
            redirect('../dashboard.php',"Something Went Wrong!");
        }
    }else{
        redirect('../dashboard.php',"Please Enter a valid reminder!");
    }
}
else if(isset($_POST['delete_reminder_btn'])){

    $reminderId= mysqli_real_escape_string($con, $_POST['reminderId']); 
    
  /*   $delete_query= "DELETE FROM reminders WHERE reminderId='$remiderId';";
    $delete_query_run = mysqli_query($con,$delete_query);  */
    
    $delete_query = "DELETE FROM reminders WHERE reminderId=?";
    $delete_query_run = mysqli_prepare($con, $delete_query);
    mysqli_stmt_bind_param($delete_query_run, "i", $reminderId);

    if(mysqli_stmt_execute($delete_query_run))
    {
        mysqli_stmt_close($delete_query_run);
        mysqli_close($con);
        echo 200;

    }else{
        mysqli_stmt_close($delete_query_run);
        mysqli_close($con);
        echo 500;
    }

}
else if(isset($_POST['clinicName']) && isset($_POST['clinicDesc'])){
    $name=test_input($_POST['clinicName']);
    $description=test_input($_POST['clinicDesc']);

    $image = $_FILES['clinicImg']['name'];
    $path="../../uploads";
    $image_ext =pathinfo($image,PATHINFO_EXTENSION);
    $filename= time().'.'.$image_ext;

    $icon = $_FILES['clinicIcon']['name'];
    $icon_ext =pathinfo($icon,PATHINFO_EXTENSION);
    $filename2= time()+1 .'.'.$icon_ext;

   /*  $clinic_check_query= "SELECT * FROM clinic WHERE name='$name';";
    $clinic_check_query_run = mysqli_query($con,$clinic_check_query);
    if(mysqli_num_rows($clinic_check_query_run) >0){
        redirect('../clinics.php',"Clinic already exist!");
    } */

    if($name == ""){
        redirect('../clinics.php', "Please Enter Clinic Name!");
    }else if(!validateName($name)){
        redirect('../clinics.php', "Please Enter a Valid Name!");
    }else if($description == ""){
        redirect('../clinics.php', "Please Enter Clinic Description!");
    }else if(!validateDesc($description)){
        redirect('../clinics.php', "Please Enter a Valid  Description!");
    }else if($filename == ""){
        redirect('../clinics.php', "Please Enter Clinic Image!");
    }else if($filename2 == ""){
        redirect('../clinics.php', "Please Enter Clinic Icon!");
    }
    else{
       /*  $clinic_query= "INSERT INTO clinic (name,description,photo,icon) VALUES ('$name','$description','$filename','$filename2');";
        $clinic_query_run = mysqli_query($con,$clinic_query); */

        $clinic_check_query = "SELECT * FROM clinic WHERE name=?";
        $clinic_check_query_run = mysqli_prepare($con, $clinic_check_query);
        mysqli_stmt_bind_param($clinic_check_query_run, "s", $name);
        mysqli_stmt_execute($clinic_check_query_run);
        mysqli_stmt_store_result($clinic_check_query_run);
        if (mysqli_stmt_num_rows($clinic_check_query_run) > 0) {
            mysqli_stmt_close($clinic_check_query_run);
            mysqli_close($con);
            redirect('../clinics.php', "Clinic already exists!");
        }else{
            // Prepare the statement
            $clinic_query = "INSERT INTO clinic (name, description, photo, icon) VALUES (?, ?, ?, ?)";
            $clinic_query_run = mysqli_prepare($con, $clinic_query);
            // Bind the parameters
            mysqli_stmt_bind_param($clinic_query_run, "ssss", $name, $description, $filename, $filename2);

            if(mysqli_stmt_execute($clinic_query_run))
            {
                move_uploaded_file($_FILES['clinicImg']['tmp_name'],$path.'/'.$filename);
                move_uploaded_file($_FILES['clinicIcon']['tmp_name'],$path.'/'.$filename2);
                mysqli_stmt_close($clinic_check_query_run);
                mysqli_stmt_close($clinic_query_run);
                mysqli_close($con);
                redirect('../clinics.php',"Clinic Added Successfully!");

            }else{
                mysqli_stmt_close($clinic_check_query_run);
                mysqli_stmt_close($clinic_query_run);
                mysqli_close($con);
                redirect('../clinics.php',"Something Went Wrong!");
            }
        } 
    }
   
}
else if(isset($_POST['deleteClinicBtn'])){
    $clinic_id= mysqli_real_escape_string($con, $_POST['clinicId']);

    /* $clinic_query= "SELECT * FROM clinic WHERE clinicId='$clinic_id';";
    $clinic_query_run = mysqli_query($con,$clinic_query);
    $clinic_data=mysqli_fetch_array($clinic_query_run);
    $image = $clinic_data['photo'];
    $icon = $clinic_data['icon']; */

    $clinic_query = "SELECT * FROM clinic WHERE clinicId=?";
    $clinic_query_run = mysqli_prepare($con, $clinic_query);
    mysqli_stmt_bind_param($clinic_query_run, "i", $clinic_id);
    mysqli_stmt_execute($clinic_query_run);
    $clinic_result = mysqli_stmt_get_result($clinic_query_run);
    $clinic_data = mysqli_fetch_array($clinic_result);
    $image = $clinic_data['photo'];
    $icon = $clinic_data['icon'];
    
  /*   $delete_query= "DELETE FROM clinic WHERE clinicId='$clinic_id';";
    $delete_query_run = mysqli_query($con,$delete_query);   */

    $delete_query = "DELETE FROM clinic WHERE clinicId=?";
    $delete_query_run = mysqli_prepare($con, $delete_query);
    mysqli_stmt_bind_param($delete_query_run, "i", $clinic_id);

    if(mysqli_stmt_execute($delete_query_run))
    {  
        if(file_exists("../../uploads/".$image)){
            unlink("../../uploads/".$image);
        }
        if(file_exists("../../uploads/".$icon)){
            unlink("../../uploads/".$icon);
        }
        mysqli_stmt_close($clinic_query_run);
        mysqli_stmt_close($delete_query_run);
        mysqli_close($con);
        echo 200;
    }else{
        mysqli_stmt_close($clinic_query_run);
        mysqli_stmt_close($delete_query_run);
        mysqli_close($con);
        echo 500;
    }
}
else if(isset($_POST['editClinicFormId']) && isset($_POST['editClinicName']) && isset($_POST['editClinicDesc'])){
    $clinicId= mysqli_real_escape_string($con, $_POST['editClinicFormId']);
    $name=test_input($_POST['editClinicName']);
    $description=test_input($_POST['editClinicDesc']);

    $path="../../uploads";

    $new_image = $_FILES['editClinicImg']['name'];
    $old_image = $_POST['old_image'];

    $new_icon = $_FILES['editClinicIcon']['name'];
    $old_icon = $_POST['old_icon'];

    if($new_image !=""){
        $image_ext =pathinfo($new_image,PATHINFO_EXTENSION);
        $update_filename= time().'.'.$image_ext;
    }else{
        $update_filename = $old_image;
    }

    if($new_icon !=""){
        $icon_ext =pathinfo($new_icon,PATHINFO_EXTENSION);
        $update_filename2= time()+1 .'.'.$icon_ext;
    }else{
        $update_filename2 = $old_icon;
    }

    if($clinicId == ""){
        redirect('../clinics.php', "Invalid Clinic ID!");
    }
    else if($name == ""){
        redirect('../clinics.php', "Please Enter Clinic Name!");
    }else if(!validateName($name)){
        redirect('../clinics.php', "Please Enter a Valid Name!");
    }else if($description == ""){
        redirect('../clinics.php', "Please Enter Clinic Description!");
    }else if(!validateDesc($description)){
        redirect('../clinics.php', "Please Enter a Valid Description!");
    }else if($update_filename == ""){
        redirect('../clinics.php', "Please Enter Clinic Image!");
    }else if($update_filename2 == ""){
        redirect('../clinics.php', "Please Enter Clinic Icon!");
    }
    else{
        /* $update_clinic_query= "UPDATE clinic SET name='$name', description='$description' , photo='$update_filename' , icon='$update_filename2' WHERE clinicId='$clinicId'; ";
        $update_clinic_query_run = mysqli_query($con,$update_clinic_query); */

        $update_clinic_query = "UPDATE clinic SET name=?, description=?, photo=?, icon=? WHERE clinicId=?";
        $update_clinic_query_run = mysqli_prepare($con, $update_clinic_query);
        mysqli_stmt_bind_param($update_clinic_query_run, "ssssi", $name, $description, $update_filename, $update_filename2, $clinicId);

        if(mysqli_stmt_execute($update_clinic_query_run))
        {
            if($_FILES['editClinicImg']['name'] != ""){
                move_uploaded_file($_FILES['editClinicImg']['tmp_name'],$path.'/'.$update_filename);
                if(file_exists("../../uploads/".$old_image)){
                    unlink("../../uploads/".$old_image);
                }

            }
            
            if($_FILES['editClinicIcon']['name'] != ""){
                move_uploaded_file($_FILES['editClinicIcon']['tmp_name'],$path.'/'.$update_filename2);
                if(file_exists("../../uploads/".$old_icon)){
                    unlink("../../uploads/".$old_icon);
                }
            }
            mysqli_stmt_close($update_clinic_query_run);
            mysqli_close($con);
            redirect("../clinics.php","Clinic Updated Successfully!");
    
        }else{
            mysqli_stmt_close($update_clinic_query_run);
            mysqli_close($con);
            redirect('../clinics.php',"Something Went Wrong!");
        }
    }

}else if(isset($_POST['doctorFN']) && isset($_POST['doctorLN']) && isset($_POST['doctorEmail']) && isset($_POST['doctorPhone']) && isset($_POST['doctorClinic']) && isset($_POST['doctorPass']) && isset($_POST['doctorPassConfirm'])){
    $fname = test_input($_POST['doctorFN']);
    $lname = test_input($_POST['doctorLN']);
    $email = test_input($_POST['doctorEmail']);
    $phone = test_input($_POST['doctorPhone']);
    $clinicId = mysqli_real_escape_string($con, $_POST['doctorClinic']);
    $password = test_input($_POST['doctorPass']);
    $confirmation = test_input($_POST['doctorPassConfirm']);
    $role = 1;

    if($fname == ""){
        redirect('../doctors.php', "Please Enter Doctor First Name!");
    }
    else if(!validateName($fname)){
        redirect('../doctors.php', "Please Enter a Valid Fname!");
    }
    else if($lname == ""){
        redirect('../doctors.php', "Please Enter Doctor Last Name!");
    }else if(!validateName($lname)){
        redirect('../doctors.php', "Please Enter a Valid Lname!");
    }else if($email == ""){
        redirect('../doctors.php', "Please Enter Doctor Email!");
    }else if(!validateEmail($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
        redirect('../doctors.php', "Please Enter a Valid Email!");
    }else if($phone == ""){
        redirect('../doctors.php', "Please Enter Doctor Phone Number!");
    }else if(!validatePhone($phone)){
        redirect('../doctors.php', "Please Enter a Valid Phone Number!");
    }else if($clinicId == "" || $clinicId == "clinic"){
        redirect('../doctors.php', "Please Enter Doctor Speciality!");
    }else if($password == ""){
        redirect('../doctors.php', "Please Enter Doctor Password!");
    }else if(!validatePass($password)){
        redirect('../doctors.php', "Please Enter a Valid Password!");
    }else if($confirmation == ""){
        redirect('../doctors.php', "Please Confirm Password!");
    }else if($password != $confirmation){
        redirect('../doctors.php', "Password Confirmation Incorrect!");
    }
    else {

        $Email_check_query = "SELECT * FROM user WHERE email=?";
        $Email_check_query_run = mysqli_prepare($con, $Email_check_query);
        mysqli_stmt_bind_param($Email_check_query_run, "s", $email);
        mysqli_stmt_execute($Email_check_query_run);
        mysqli_stmt_store_result($Email_check_query_run);
        if (mysqli_stmt_num_rows($Email_check_query_run) > 0) {
            mysqli_stmt_close($Email_check_query_run);
            mysqli_close($con);
            redirect('../doctors.php', "Email already exists!");
        }else{
            $user_query = "INSERT INTO user (Fname, Lname, email, password, role) VALUES (?, ?, ?, ?, ?)";
            $user_query_run = mysqli_prepare($con, $user_query);
            mysqli_stmt_bind_param($user_query_run, "ssssi", $fname, $lname, $email, $password, $role);
    
            if (mysqli_stmt_execute($user_query_run)) {
                $getUserId_query = "SELECT userId FROM user WHERE email=?";
                $getUserId_query_run = mysqli_prepare($con, $getUserId_query);
                mysqli_stmt_bind_param($getUserId_query_run, "s", $email);
                mysqli_stmt_execute($getUserId_query_run);
                mysqli_stmt_store_result($getUserId_query_run);
    
                if (mysqli_stmt_num_rows($getUserId_query_run) > 0) {
                    mysqli_stmt_bind_result($getUserId_query_run, $userId);
                    mysqli_stmt_fetch($getUserId_query_run);

                    $phoneCheckQuery = "SELECT phoneNumber FROM patient WHERE phoneNumber = ? 
                    UNION 
                    SELECT phoneNumber FROM doctor WHERE phoneNumber = ?";

                    $phoneCheckQueryRun = mysqli_prepare($con, $phoneCheckQuery);
                    mysqli_stmt_bind_param($phoneCheckQueryRun, "ii", $phone, $phone);
                    mysqli_stmt_execute($phoneCheckQueryRun);
                    mysqli_stmt_store_result($phoneCheckQueryRun);
                    if (mysqli_stmt_num_rows($phoneCheckQueryRun) > 0) {
                        mysqli_stmt_close($phoneCheckQueryRun);
                        mysqli_close($con);
                        redirect('../doctors.php', "Phone already exists!");
                    } else {
                        $doctor_query = "INSERT INTO doctor (userId, clinicId, phoneNumber) VALUES (?, ?, ?)";
                        $doctor_query_run = mysqli_prepare($con, $doctor_query);
                        mysqli_stmt_bind_param($doctor_query_run, "iii", $userId, $clinicId, $phone);
        
                        if (mysqli_stmt_execute($doctor_query_run)) {
                            mysqli_stmt_close($user_query_run);
                            mysqli_stmt_close($getUserId_query_run);
                            mysqli_stmt_close($doctor_query_run);
                            mysqli_close($con);
                            redirect('../doctors.php', "Doctor Added Successfully!");
                        } else {
                            mysqli_stmt_close($user_query_run);
                            mysqli_stmt_close($getUserId_query_run);
                            mysqli_stmt_close($doctor_query_run);
                            mysqli_close($con);
                            redirect('../doctors.php', "Something Went Wrong!");
                        }
                    }
                }
            }else{
                mysqli_stmt_close($user_query_run);
                redirect('../doctors.php',"Something Went Wrong!");
            }
        }
    }

}
else if(isset($_POST['deleteDocBtn'])){
    $doctorId= mysqli_real_escape_string($con, $_POST['doctorId']);
    
   /*  $delete_query= "UPDATE doctor SET deleted=1 WHERE doctorId='$doctorId';";
    $delete_query_run = mysqli_query($con,$delete_query);  */

    $update_doctor_query = "UPDATE doctor SET deleted=1 WHERE doctorId=?";
    $update_doctor_query_run = mysqli_prepare($con, $update_doctor_query);
    mysqli_stmt_bind_param($update_doctor_query_run, "i" , $doctorId);

    if(mysqli_stmt_execute($update_doctor_query_run))
    {
        mysqli_stmt_close($update_doctor_query_run);
        mysqli_close($con);
        echo 200;
    }else{
        mysqli_stmt_close($update_doctor_query_run);
        mysqli_close($con);
        echo 500;
    }
}
else if(isset($_POST['restoreDocBtn'])){
    $doctorId= mysqli_real_escape_string($con, $_POST['doctorId']);
    
    /* $delete_query= "UPDATE doctor SET deleted=0 WHERE doctorId='$doctorId';";
    $delete_query_run = mysqli_query($con,$delete_query);  */ 

    $update_doctor_query = "UPDATE doctor SET deleted=0 WHERE doctorId=?";
    $update_doctor_query_run = mysqli_prepare($con, $update_doctor_query);
    mysqli_stmt_bind_param($update_doctor_query_run, "i" , $doctorId);

    if(mysqli_stmt_execute($update_doctor_query_run))
    {
        mysqli_stmt_close($update_doctor_query_run);
        mysqli_close($con);
        echo 200;
    }else{
        mysqli_stmt_close($update_doctor_query_run);
        mysqli_close($con);
        echo 500;
    }
}
else if(isset($_POST['editDoctorFormId']) && isset($_POST['editUserId']) && isset($_POST['editDoctorFN']) && isset($_POST['editDoctorLN']) && isset($_POST['editDoctorEmail']) && isset($_POST['editDoctorPhone']) && isset($_POST['editDoctorClinic']) && isset($_POST['editDoctorPass']) && isset($_POST['editDoctorPassConfirm'])){
    $doctorId = mysqli_real_escape_string($con, $_POST['editDoctorFormId']);
    $userId = mysqli_real_escape_string($con, $_POST['editUserId']);
    $fname = test_input($_POST['editDoctorFN']);
    $lname = test_input($_POST['editDoctorLN']);
    $email = test_input($_POST['editDoctorEmail']);
    $phone = test_input($_POST['editDoctorPhone']);
    $clinicId = mysqli_real_escape_string($con, $_POST['editDoctorClinic']);
    $password = test_input($_POST['editDoctorPass']);
    $confirmation = test_input($_POST['editDoctorPassConfirm']);

    if($fname == ""){
        redirect('../edit-doctor.php?doctorId='.$doctorId, "Please Enter Doctor First Name!");
    }
    else if(!validateName($fname)){
        redirect('../edit-doctor.php?doctorId='.$doctorId, "Please Enter a Valid Fname!");
    }
    else if($lname == ""){
        redirect('../edit-doctor.php?doctorId='.$doctorId, "Please Enter Doctor Last Name!");
    }else if(!validateName($lname)){
        redirect('../edit-doctor.php?doctorId='.$doctorId, "Please Enter a Valid Lname!");
    }else if($email == ""){
        redirect('../edit-doctor.php?doctorId='.$doctorId, "Please Enter Doctor Email!");
    }else if(!validateEmail($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
        redirect('../edit-doctor.php?doctorId='.$doctorId, "Please Enter a Valid Email!");
    }else if($phone == ""){
        redirect('../edit-doctor.php?doctorId='.$doctorId, "Please Enter Doctor Phone Number!");
    }else if(!validatePhone($phone)){
        redirect('../edit-doctor.php?doctorId='.$doctorId, "Please Enter a Valid Phone Number!");
    }else if($clinicId == "" || $clinicId == "clinic"){
        redirect('../edit-doctor.php?doctorId='.$doctorId, "Please Enter Doctor Speciality!");
    }else if($password == ""){
        redirect('../edit-doctor.php?doctorId='.$doctorId, "Please Enter Doctor Password!");
    }else if(!validatePass($password)){
        redirect('../edit-doctor.php?doctorId='.$doctorId, "Please Enter a Valid Password!");
    }else if($confirmation == ""){
        redirect('../edit-doctor.php?doctorId='.$doctorId, "Please Confirm Password!");
    }else if($password != $confirmation){
        redirect('../edit-doctor.php?doctorId='.$doctorId, "Password Confirmation Incorrect!");
    }
    else{

/*         $user_query = "UPDATE user SET Fname='$fname', Lname='$lname', email='$email', password='$password' WHERE userId= $userId";
        $user_query_run = mysqli_query($con,$user_query); */

        $Email_check_query = "SELECT * FROM user WHERE email=? AND userId <> ?";
        $Email_check_query_run = mysqli_prepare($con, $Email_check_query);
        mysqli_stmt_bind_param($Email_check_query_run, "si", $email, $userId);
        mysqli_stmt_execute($Email_check_query_run);
        mysqli_stmt_store_result($Email_check_query_run);
        if (mysqli_stmt_num_rows($Email_check_query_run) > 0) {
            mysqli_stmt_close($Email_check_query_run);
            mysqli_close($con);
            redirect('../edit-doctor.php?doctorId='.$doctorId, "Email already exists!");
        }else{
            $user_query = "UPDATE user SET Fname=? , Lname=? , email=? , password=? WHERE userId=? ";
            $user_query_run = mysqli_prepare($con, $user_query);
            mysqli_stmt_bind_param($user_query_run, "ssssi", $fname, $lname, $email, $password, $userId);
    
            if(mysqli_stmt_execute($user_query_run)){
    
                /* $doctor_query = "UPDATE doctor SET clinicId= $clinicId, phoneNumber= $phone WHERE doctorId = $doctorId";
                $doctor_query_run = mysqli_query($con,$doctor_query); */

                $phoneCheckQuery = "SELECT phoneNumber FROM patient WHERE phoneNumber = ? 
                UNION 
                SELECT phoneNumber FROM doctor WHERE phoneNumber = ? AND doctorId <> ?";

                $phoneCheckQueryRun = mysqli_prepare($con, $phoneCheckQuery);
                mysqli_stmt_bind_param($phoneCheckQueryRun, "iii", $phone, $phone, $doctorId);
                mysqli_stmt_execute($phoneCheckQueryRun);
                mysqli_stmt_store_result($phoneCheckQueryRun);

                if (mysqli_stmt_num_rows($phoneCheckQueryRun) > 0) {
                    mysqli_stmt_close($phoneCheckQueryRun);
                    mysqli_close($con);
                    redirect('../edit-doctor.php?doctorId='.$doctorId, "Phone already exists!");
                } else {
                    $doctor_query = "UPDATE doctor SET clinicId=? , phoneNumber=? WHERE doctorId=? ";
                    $doctor_query_run = mysqli_prepare($con, $doctor_query);
                    mysqli_stmt_bind_param($doctor_query_run, "iii", $clinicId, $phone, $doctorId);
        
                    if(mysqli_stmt_execute($doctor_query_run))
                    {
                        mysqli_stmt_close($user_query_run);
                        mysqli_stmt_close($doctor_query_run);
                        mysqli_close($con);
                        redirect('../edit-doctor.php?doctorId='.$doctorId,"Doctor Account Updated Successfully!");
                        /* header('Location: ../edit-doctor.php?doctorId='.$doctorId); */
                
                    }else{
                        mysqli_stmt_close($user_query_run);
                        mysqli_stmt_close($doctor_query_run);
                        mysqli_close($con);
                        redirect('../edit-doctor.php?doctorId='.$doctorId,"Something Went Wrong!");
                    }
                }
                
            }else{
                mysqli_stmt_close($user_query_run);
                mysqli_close($con);
                redirect('../edit-doctor.php?doctorId='.$doctorId,"Something Went Wrong!");
            }
        }

    }

}
else if(isset($_POST['exceptionDay']) && isset($_POST['docId'])){
    $doctorId=mysqli_real_escape_string($con, $_POST['docId']);
    $date=test_input($_POST['exceptionDay']);
    $from= "";
    if(isset($_POST['exceptionFrom'])){
        $from= test_input($_POST['exceptionFrom']);
    }
    $to= "";
    if(isset($_POST['exceptionTO'])){
        $to= test_input($_POST['exceptionTO']);
    }
    $available= isset($_POST['availableException']) ? "1":"0";

    if($date != ""){
        $day= date("l", strtotime($date));
/*         $select_query= "SELECT * FROM medicalhours WHERE day='$day';";
        $select_query_run = mysqli_query($con,$select_query);
        $medicalHours_data=mysqli_fetch_array($select_query_run);
        $medFrom = $medicalHours_data['fromHour'];
        $medTo = $medicalHours_data['toHour']; */

        $select_query = "SELECT * FROM medicalhours WHERE day=?";
        $select_query_run = mysqli_prepare($con, $select_query);
        mysqli_stmt_bind_param($select_query_run, "s", $day);
        mysqli_stmt_execute($select_query_run);
        $select_result = mysqli_stmt_get_result($select_query_run);
        $select_data = mysqli_fetch_array($select_result);
        $medFrom = $select_data['fromHour'];
        $medTo = $select_data['toHour'];

        // Split the MFrom and MTo into hours, minutes, and seconds
        list($MFrom_hours, $MFrom_minutes, $MFrom_seconds) = explode(":", $medFrom);
        list($MTo_hours, $MTo_minutes, $MTo_seconds) = explode(":", $medTo);

        // Now, create DateTime objects for MFrom and MTo
        $MFrom_datetime = new DateTime("1970-01-01 $medFrom");
        $MTo_datetime = new DateTime("1970-01-01 $medTo");

        $MFrom_time = $MFrom_datetime->format('H:i:s');
        $MTo_time = $MTo_datetime->format('H:i:s');

        if($to != "" && $from != ""){
            // Now, create DateTime objects for DFrom and DTO with the same format
            $DFrom_datetime = new DateTime("1970-01-01 $from");
            $DTO_datetime = new DateTime("1970-01-01 $to");

            $DFrom_time = $DFrom_datetime->format('H:i:s');
            $DTO_time = $DTO_datetime->format('H:i:s');
            if($DFrom_time < $MFrom_time || $DTO_time > $MTo_time){
                mysqli_stmt_close($select_query_run);
                mysqli_close($con);
                redirect('../edit-doctor.php?doctorId='.$doctorId,"Exception Hour Not In Range!");
            }
        }

        /* $clinic_check_query= "SELECT * FROM workingexception WHERE doctorId=$doctorId AND date='$date';";
        $clinic_check_query_run = mysqli_query($con,$clinic_check_query); */

        $clinic_check_query = "SELECT * FROM workingexception WHERE doctorId=? AND date=?";
        $clinic_check_query_run = mysqli_prepare($con, $clinic_check_query);
        mysqli_stmt_bind_param($clinic_check_query_run, "is", $doctorId, $date);
        mysqli_stmt_execute($clinic_check_query_run);
        $clinic_check_result = mysqli_stmt_get_result($clinic_check_query_run);

        if(mysqli_num_rows($clinic_check_result) > 0){

/*             $exception_query= "UPDATE workingexception SET fromHour='$from' , toHour='$to' , available='$available' WHERE doctorId=$doctorId AND date='$date';";
            $exception_query_run = mysqli_query($con,$exception_query); */

            $exception_query = "UPDATE workingexception SET fromHour=? , toHour=?, available=? WHERE doctorId=? AND date=? ";
            $exception_query_run = mysqli_prepare($con, $exception_query);
            mysqli_stmt_bind_param($exception_query_run, "ssiis", $from, $to, $available,$doctorId,$date);

            if(mysqli_stmt_execute($exception_query_run))
            {
                mysqli_stmt_close($select_query_run);
                mysqli_stmt_close($clinic_check_query_run);
                mysqli_stmt_close($exception_query_run);
                mysqli_close($con);
                redirect('../edit-doctor.php?doctorId='.$doctorId,"Exception Updated Successfully!");
        
            }else{
                mysqli_stmt_close($select_query_run);
                mysqli_stmt_close($clinic_check_query_run);
                mysqli_stmt_close($exception_query_run);
                mysqli_close($con);
                redirect('../edit-doctor.php?doctorId='.$doctorId,"Something Went Wrong!");
            }
            
        }else{
            /* $exception_query= "INSERT INTO workingexception (doctorId, date, fromHour, toHour, available) VALUES ('$doctorId', '$date', '$from', '$to', '$available');";
            $exception_query_run = mysqli_query($con,$exception_query); */

            $exception_query = "INSERT INTO workingexception (doctorId, date, fromHour, toHour, available) VALUES (?, ?, ?, ?,?)";
            $exception_query_run = mysqli_prepare($con, $exception_query);
            mysqli_stmt_bind_param($exception_query_run, "isssi", $doctorId, $date, $from, $to, $available);
    
            if(mysqli_stmt_execute($exception_query_run))
            {
                mysqli_stmt_close($select_query_run);
                mysqli_stmt_close($clinic_check_query_run);
                mysqli_stmt_close($exception_query_run);
                mysqli_close($con);
                redirect('../edit-doctor.php?doctorId='.$doctorId,"Exception Added Successfully!");
        
            }else{
                mysqli_stmt_close($select_query_run);
                mysqli_stmt_close($clinic_check_query_run);
                mysqli_stmt_close($exception_query_run);
                mysqli_close($con);
                redirect('../edit-doctor.php?doctorId='.$doctorId,"Something Went Wrong!");
            }
        }
    }else{
        redirect('../edit-doctor.php?doctorId='.$doctorId,"Please Enter Exception Date!");
    }
}
else if(isset($_POST['deleteWExceptionBtn'])){

    $drId= mysqli_real_escape_string($con, $_POST['drId']); 
    $date=test_input($_POST['date']);
    
    /* $delete_query= "DELETE FROM workingexception WHERE wExcepId='$wExId';";
    $delete_query_run = mysqli_query($con,$delete_query);   */

    $delete_query = "DELETE FROM workingexception WHERE doctorID=? AND date=?";
    $delete_query_run = mysqli_prepare($con, $delete_query);
    mysqli_stmt_bind_param($delete_query_run, "is", $drId,$date);

    if(mysqli_stmt_execute($delete_query_run))
    {
        mysqli_stmt_close($delete_query_run);
        mysqli_close($con);
        echo 200;

    }else{
        mysqli_stmt_close($delete_query_run);
        mysqli_close($con);
        echo 500;
    }

}
else if(isset($_POST['urgentBT']) && isset($_POST['urgentBTN'])){
    $urgentBT=test_input($_POST['urgentBT']);
    $number=test_input($_POST['urgentBTN']);

    if($urgentBT == ""){
        redirect('../donors.php',"Please Enter BloodType");
    }else if($number == ""){
        redirect('../donors.php',"Please Enter Number Needed");
    }
    else{
     /*    $urgentbt_query= "INSERT INTO urgentbt (bloodType, number) VALUES ('$urgentBT', $number);";
        $urgentbt_query_run = mysqli_query($con,$urgentbt_query); */

        $urgentbt_query = "INSERT INTO urgentbt (bloodType, number) VALUES (?, ?)";
        $urgentbt_query_run = mysqli_prepare($con, $urgentbt_query);
        mysqli_stmt_bind_param($urgentbt_query_run, "si", $urgentBT, $number);

        if(mysqli_stmt_execute($urgentbt_query_run))
        {
            mysqli_stmt_close($urgentbt_query_run);
            mysqli_close($con);
            redirect('../donors.php',"UrgentBT Added Successfully!");
    
        }else{
            mysqli_stmt_close($urgentbt_query_run);
            mysqli_close($con);
            redirect('../donors.php',"Something Went Wrong!");
        }
    }
}
else if(isset($_POST['delete_reminder_btn'])){

    $remiderId= mysqli_real_escape_string($con, $_POST['reminderId']); 
    
   /*  $delete_query= "DELETE FROM reminders WHERE reminderId='$remiderId';";
    $delete_query_run = mysqli_query($con,$delete_query);   */
    
    $delete_query = "DELETE FROM reminders WHERE reminderId=?";
    $delete_query_run = mysqli_prepare($con, $delete_query);
    mysqli_stmt_bind_param($delete_query_run, "i", $remiderId);

    if(mysqli_stmt_execute($delete_query_run))
    {
        mysqli_stmt_close($delete_query_run);
        mysqli_close($con);
        echo 200;

    }else{
        mysqli_stmt_close($delete_query_run);
        mysqli_close($con);
        echo 500;
    }

}
else if(isset($_POST['deleteDonorBtn'])){

    $donorId= mysqli_real_escape_string($con, $_POST['donorId']); 
    
/*     $delete_query= "DELETE FROM donor WHERE donorId='$donorId';";
    $delete_query_run = mysqli_query($con,$delete_query);   */

    $delete_query = "DELETE FROM donor WHERE donorId=?";
    $delete_query_run = mysqli_prepare($con, $delete_query);
    mysqli_stmt_bind_param($delete_query_run, "i", $donorId);

    if(mysqli_stmt_execute($delete_query_run))
    {
        mysqli_stmt_close($delete_query_run);
        mysqli_close($con);
        echo 200;

    }else{
        mysqli_stmt_close($delete_query_run);
        mysqli_close($con);
        echo 500;
    }

}
else if(isset($_POST['deleteUrgentBTBtn'])){

    $urgentBTId= mysqli_real_escape_string($con, $_POST['urgentBTId']); 
    
    /* $delete_query= "DELETE FROM urgentbt WHERE urgentBTId='$urgentBTId';";
    $delete_query_run = mysqli_query($con,$delete_query);   */

    $delete_query = "DELETE FROM urgentbt WHERE urgentBTId=?";
    $delete_query_run = mysqli_prepare($con, $delete_query);
    mysqli_stmt_bind_param($delete_query_run, "i", $urgentBTId);

    if(mysqli_stmt_execute($delete_query_run))
    {
        mysqli_stmt_close($delete_query_run);
        mysqli_close($con);
        echo 200;

    }else{
        mysqli_stmt_close($delete_query_run);
        mysqli_close($con);
        echo 500;
    }

}
else if(isset($_POST['signup-name']) && isset($_POST['signup-email']) && isset($_POST['signup-password']) && isset($_POST['signup-passwordConfirm'])){
    $name = test_input($_POST['signup-name']);
    $email = test_input($_POST['signup-email']);
    $password = test_input($_POST['signup-password']);
    $confirmation = test_input($_POST['signup-passwordConfirm']);

    if($name == ""){
        redirect('../settings.php',"Please Enter Admin Name!");
    }else if(str_word_count($name) != 2 || !validateDesc($name)){
        redirect('../settings.php',"Please Enter Valid Name!");
    }else if($email == ""){
        redirect('../settings.php',"Please Enter Admin Email!");
    }
    else if(!validateEmail($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
        redirect('../settings.php', "Please Enter a Valid Email!");
    }
    else if($password == ""){
        redirect('../settings.php',"Please Enter Admin Password!");
    }
    else if(!validatePass($password)){
        redirect('../settings.php', "Please Enter a Valid Password!");
    }
    else if($confirmation == ""){
        redirect('../settings.php',"Please Confirm Password!");
    }
    else if($password != $confirmation){
        redirect('../settings.php',"Password Confirmation Incorrect!");
    }
    else{
        $Email_check_query = "SELECT * FROM user WHERE email=? AND role <> 0";
        $Email_check_query_run = mysqli_prepare($con, $Email_check_query);
        mysqli_stmt_bind_param($Email_check_query_run, "s", $email);
        mysqli_stmt_execute($Email_check_query_run);
        mysqli_stmt_store_result($Email_check_query_run);
        if (mysqli_stmt_num_rows($Email_check_query_run) > 0) {
            mysqli_stmt_close($Email_check_query_run);
            mysqli_close($con);
            redirect('../settings.php', "Email already exists!");
        }else{
            $fullname = explode(" ",$name);
            $fname = $fullname[0];
            $lname = $fullname[1];
    
    /*         $user_query = "UPDATE user SET Fname='$fname', Lname='$lname', email='$email', password='$password' WHERE role=0";
            $user_query_run = mysqli_query($con,$user_query); */
    
            $user_query = "UPDATE user SET Fname=? , Lname=?, email=?, password=? WHERE role=0 ";
            $user_query_run = mysqli_prepare($con, $user_query);
            mysqli_stmt_bind_param($user_query_run, "ssss", $fname, $lname, $email,$password);
    
            if(mysqli_stmt_execute($user_query_run))
            {
                mysqli_stmt_close($user_query_run);
                mysqli_close($con);
                redirect('../settings.php',"Account Updated Successfully!");
        
            }else{
                mysqli_stmt_close($user_query_run);
                mysqli_close($con);
                redirect('../settings.php',"Something Went Wrong!");
            }
        }
    }

}
else if(isset($_POST['WHDay'])){
    $day=test_input($_POST['WHDay']);
    $from=test_input($_POST['WHFrom']);
    $to=test_input($_POST['WHTO']);
    $closed= isset($_POST['closed']) ? "1":"0";
    
    if($day!= "" && $day != "WHDay"){
       /*  $check_query= "SELECT * FROM medicalHours WHERE day='$day';";
        $check_query_run = mysqli_query($con,$check_query); */

        $check_query = "SELECT * FROM medicalHours WHERE day=?";
        $check_query_run = mysqli_prepare($con, $check_query);
        mysqli_stmt_bind_param($check_query_run, "s",$day);
        mysqli_stmt_execute($check_query_run);
        $check_result = mysqli_stmt_get_result($check_query_run);

        if(mysqli_num_rows($check_result) > 0){

           /*  $update_query = "UPDATE medicalHours SET fromHour='$from', toHour='$to', closed='$closed' WHERE day='$day'";
            $update_query_run = mysqli_query($con,$update_query); */

            $update_query = "UPDATE medicalHours SET fromHour=? , toHour=?, closed=? WHERE day=? ";
            $update_query_run = mysqli_prepare($con, $update_query);
            mysqli_stmt_bind_param($update_query_run, "ssis", $from, $to, $closed,$day);
    
            if(mysqli_stmt_execute($update_query_run))
            {
                mysqli_stmt_close($check_query_run);
                mysqli_stmt_close($update_query_run);
                mysqli_close($con);
                redirect('../workingHours.php',"Medical Hour Updated Successfully!");
        
            }else{
                mysqli_stmt_close($check_query_run);
                mysqli_stmt_close($update_query_run);
                mysqli_close($con);
                redirect('../workingHours.php',"Something Went Wrong!");
            }

        }else{
           /*  $medicalHours_query= "INSERT INTO medicalHours (day, fromHour, toHour, closed) VALUES ('$day', '$from', '$to', '$closed');";
            $medicalHours_query_run = mysqli_query($con,$medicalHours_query); */

            $medicalHours_query = "INSERT INTO medicalHours (day, fromHour, toHour, closed) VALUES (?, ?, ?, ?)";
            $medicalHours_query_run = mysqli_prepare($con, $medicalHours_query);
            mysqli_stmt_bind_param($medicalHours_query_run, "sssi", $day, $from, $to, $closed);
    
            if(mysqli_stmt_execute($medicalHours_query_run))
            {
                mysqli_stmt_close($check_query_run);
                mysqli_stmt_close($medicalHours_query_run);
                mysqli_close($con);
                redirect('../workingHours.php',"Medical Hour Added Successfully!");
        
            }else{
                mysqli_stmt_close($check_query_run);
                mysqli_stmt_close($medicalHours_query_run);
                mysqli_close($con);
                redirect('../workingHours.php',"Something Went Wrong!");
            }
        }

      
    }else{
        redirect('../workingHours.php',"Please Enter Working Day!");
    }
   
}
else if(isset($_POST['deleteMedHoursBtn'])){
    $day=test_input($_POST['medDay']);
   /*  $medHourId= mysqli_real_escape_string($con, $_POST['medHourId']);  */
    
    /* $delete_query= "DELETE FROM medicalhours WHERE medHourId='$medHourId';";
    $delete_query_run = mysqli_query($con,$delete_query);   */

    $delete_query = "DELETE FROM medicalhours WHERE day=?";
    $delete_query_run = mysqli_prepare($con, $delete_query);
    mysqli_stmt_bind_param($delete_query_run, "s", $day);

    if(mysqli_stmt_execute($delete_query_run))
    {
        mysqli_stmt_close($delete_query_run);
        mysqli_close($con);
        echo 200;

    }else{
        mysqli_stmt_close($delete_query_run);
        mysqli_close($con);
        echo 500;
    }

}
else if(isset($_POST['manageDWHFormId']) && isset($_POST['DWHDay'])){
    $doctorId=mysqli_real_escape_string($con, $_POST['manageDWHFormId']);
    $day=test_input($_POST['DWHDay']);
    $from= "";
    if(isset($_POST['DWHFrom'])){
        $from= test_input($_POST['DWHFrom']);
    }
    $to= "";
    if(isset($_POST['DWHTO'])){
        $to= test_input($_POST['DWHTO']);
    }
    $available= isset($_POST['available']) ? "1":"0";
    
    if($day!= "" && $day != "WHDay"){
       /*  $check_query= "SELECT * FROM doctorhours WHERE doctorId=$doctorId AND day='$day';";
        $check_query_run = mysqli_query($con,$check_query); */

        $check_query = "SELECT * FROM doctorhours WHERE doctorId=? AND day=?";
        $stmt = mysqli_prepare($con, $check_query);
        mysqli_stmt_bind_param($stmt, "is", $doctorId, $day);
        mysqli_stmt_execute($stmt);
        $check_query_run = mysqli_stmt_get_result($stmt);

        /* $select_query= "SELECT * FROM medicalhours WHERE day='$day';";
        $select_query_run = mysqli_query($con,$select_query);
        $medicalHours_data=mysqli_fetch_array($select_query_run);
        $medFrom = $medicalHours_data['fromHour'];
        $medTo = $medicalHours_data['toHour']; */

        $select_query = "SELECT * FROM medicalhours WHERE day=?";
        $select_query_run = mysqli_prepare($con, $select_query);
        mysqli_stmt_bind_param($select_query_run, "s", $day);
        mysqli_stmt_execute($select_query_run);
        $select_result = mysqli_stmt_get_result($select_query_run);
        $select_data = mysqli_fetch_array($select_result);
        $medFrom = $select_data['fromHour'];
        $medTo = $select_data['toHour'];

        // Split the MFrom and MTo into hours, minutes, and seconds
        list($MFrom_hours, $MFrom_minutes, $MFrom_seconds) = explode(":", $medFrom);
        list($MTo_hours, $MTo_minutes, $MTo_seconds) = explode(":", $medTo);

        // Now, create DateTime objects for MFrom and MTo
        $MFrom_datetime = new DateTime("1970-01-01 $medFrom");
        $MTo_datetime = new DateTime("1970-01-01 $medTo");

        $MFrom_time = $MFrom_datetime->format('H:i:s');
        $MTo_time = $MTo_datetime->format('H:i:s');

        if($to != "" && $from != ""){
            // Now, create DateTime objects for DFrom and DTO with the same format
            $DFrom_datetime = new DateTime("1970-01-01 $from");
            $DTO_datetime = new DateTime("1970-01-01 $to");

            $DFrom_time = $DFrom_datetime->format('H:i:s');
            $DTO_time = $DTO_datetime->format('H:i:s');
            if($DFrom_time < $MFrom_time || $DTO_time > $MTo_time){
                mysqli_stmt_close($select_query_run);
                mysqli_close($con);
                redirect('../edit-doctor.php?doctorId='.$doctorId,"Working Hour Not In Range!");
            /* die("DFrom->" .$DFrom_time ." MFrom->"  .$MFrom_time  ." DTO->" .$DTO_time  ." MTo->" .$MTo_time); */
            }
        }

        /* $from >= $medFrom && $to <= $medTo */
        /* if($DFrom_time >= $MFrom_time && $DTO_time <= $MTo_time) */

            if(mysqli_num_rows($check_query_run) >0){

/*                 $update_query = "UPDATE doctorhours SET fromHour='$from', toHour='$to', available='$available' WHERE doctorId=$doctorId AND day='$day'";
                $update_query_run = mysqli_query($con,$update_query); */

                $update_query = "UPDATE doctorhours SET fromHour=? , toHour=?, available=? WHERE doctorId=? AND day=? ";
                $update_query_run = mysqli_prepare($con, $update_query);
                mysqli_stmt_bind_param($update_query_run, "ssiis", $from, $to, $available,$doctorId,$day);
        
                if(mysqli_stmt_execute($update_query_run))
                {
                    mysqli_stmt_close($select_query_run);
                    mysqli_stmt_close($update_query_run);
                    mysqli_close($con);
                    redirect('../edit-doctor.php?doctorId='.$doctorId,"Doctor WH Updated Successfully!");
            
                }else{
                    mysqli_stmt_close($select_query_run);
                    mysqli_stmt_close($update_query_run);
                    mysqli_close($con);
                    redirect('../edit-doctor.php?doctorId='.$doctorId,"Something Went Wrong!");
                }

            }else{
                /* $doctorHours_query= "INSERT INTO doctorhours (doctorId,day, fromHour, toHour, available) VALUES ($doctorId,'$day', '$from', '$to', '$available');";
                $doctorHours_query_run = mysqli_query($con,$doctorHours_query); */

                $doctorHours_query = "INSERT INTO doctorhours (doctorId,day, fromHour, toHour, available) VALUES (?, ?, ?, ?, ?)";
                $doctorHours_query_run = mysqli_prepare($con, $doctorHours_query);
                mysqli_stmt_bind_param($doctorHours_query_run, "isssi", $doctorId, $day, $from, $to, $available);
        
                if(mysqli_stmt_execute($doctorHours_query_run))
                {
                    mysqli_stmt_close($select_query_run);
                    mysqli_stmt_close($doctorHours_query_run);
                    mysqli_close($con);
                    redirect('../edit-doctor.php?doctorId='.$doctorId,"Doctor WH Added Successfully!");
            
                }else{
                    mysqli_stmt_close($select_query_run);
                    mysqli_stmt_close($doctorHours_query_run);
                    mysqli_close($con);
                    redirect('../edit-doctor.php?doctorId='.$doctorId,"Something Went Wrong!");
                }
            }  
    }else{
        redirect('../edit-doctor.php?doctorId='.$doctorId,"Please Enter Working Day!");
    }
    
}
else if(isset($_POST['restrictUserBtn'])){
    $userId= mysqli_real_escape_string($con, $_POST['userId']);
    
/*     $delete_query= "UPDATE user SET restricted=1 WHERE userId='$userId';";
    $delete_query_run = mysqli_query($con,$delete_query);   */

    $user_query = "UPDATE user SET restricted=1 WHERE userId=? ";
    $user_query_run = mysqli_prepare($con, $user_query);
    mysqli_stmt_bind_param($user_query_run, "i", $userId);

    if(mysqli_stmt_execute($user_query_run))
    {
        mysqli_stmt_close($user_query_run);
        mysqli_close($con);
        echo 200;
    }else{
        mysqli_stmt_close($user_query_run);
        mysqli_close($con);
        echo 500;
    }
}
else if(isset($_POST['restoreUserBtn'])){
    $userId= mysqli_real_escape_string($con, $_POST['userId']);
    
   /*  $delete_query= "UPDATE user SET restricted=0 WHERE userId='$userId';";
    $delete_query_run = mysqli_query($con,$delete_query);   */

    $user_query = "UPDATE user SET restricted=0 WHERE userId=? ";
    $user_query_run = mysqli_prepare($con, $user_query);
    mysqli_stmt_bind_param($user_query_run, "i", $userId);

    if(mysqli_stmt_execute($user_query_run))
    {
        mysqli_stmt_close($user_query_run);
        mysqli_close($con);
        echo 200;
    }else{
        mysqli_stmt_close($user_query_run);
        mysqli_close($con);
        echo 500;
    }
}
else if(isset($_POST['patientFN']) && isset($_POST['patientLN']) && isset($_POST['gender']) && isset($_POST['patientDOB']) && isset($_POST['patientEmail']) && isset($_POST['patientPass']) && isset($_POST['patientPassConfirm'])){
    $fname = test_input($_POST['patientFN']);
    $lname = test_input($_POST['patientLN']);
    $gender = test_input($_POST['gender']);
    $DOB = test_input($_POST['patientDOB']);
    $bloodType = test_input($_POST['patientBT']);
    if ($bloodType == "BT") {
        $bloodType = "";
    }
    $email = test_input($_POST['patientEmail']);
    $phone = test_input($_POST['patientPhone']);
  /*   if ($phone == "") {
        $phone = 0;
    } */
    $password = test_input($_POST['patientPass']);
    $confirmation = test_input($_POST['patientPassConfirm']);
    $role = 2;

    if($fname == ""){
        redirect('../patients.php',"Please Enter First Name!");
    }
    else if(!validateName($fname)){
        redirect('../patients.php', "Please Enter a Valid Fname!");
    }
    else if($lname == ""){
        redirect('../patients.php',"Please Enter Last Name!");
    }
    else if(!validateName($lname)){
        redirect('../patients.php', "Please Enter a Valid Lname!");
    }
    else if($gender == ""){
        redirect('../patients.php',"Please Enter Patient Gender!");
    }
    else if($DOB == ""){
        redirect('../patients.php',"Please Enter Date Of Birth!");
    }else if($email == ""){
        redirect('../patients.php',"Please Enter Email!");
    }
    else if(!validateEmail($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
        redirect('../patients.php', "Please Enter a Valid Email!");
    }
    else if($password == ""){
        redirect('../patients.php',"Please Enter Password!");
    }
    else if(!validatePass($password)){
        redirect('../patients.php', "Please Enter a Valid Password!");
    }
    else if($confirmation == ""){
        redirect('../patients.php',"Please Confirm Password!");
    }
    else if($password != $confirmation){
        redirect('../patients.php',"Password Confirmation Incorrect!");
    }
    else{
        $Email_check_query = "SELECT * FROM user WHERE email=?";
        $Email_check_query_run = mysqli_prepare($con, $Email_check_query);
        mysqli_stmt_bind_param($Email_check_query_run, "s", $email);
        mysqli_stmt_execute($Email_check_query_run);
        mysqli_stmt_store_result($Email_check_query_run);
        if (mysqli_stmt_num_rows($Email_check_query_run) > 0) {
            mysqli_stmt_close($Email_check_query_run);
            mysqli_close($con);
            redirect('../patients.php', "Email already exists!");
        }else{
            $user_query = "INSERT INTO user (Fname, Lname, email, password, role) VALUES (?, ?, ?, ?, ?)";
            $user_query_run = mysqli_prepare($con, $user_query);
            mysqli_stmt_bind_param($user_query_run, "ssssi", $fname, $lname, $email, $password, $role);
    
            if (mysqli_stmt_execute($user_query_run)) {
    
                $getUserId_query = "SELECT userId FROM user WHERE email=?";
                $getUserId_query_run = mysqli_prepare($con, $getUserId_query);
                mysqli_stmt_bind_param($getUserId_query_run, "s", $email);
                mysqli_stmt_execute($getUserId_query_run);
                $getUserId_result = mysqli_stmt_get_result($getUserId_query_run);
    
                if (mysqli_num_rows($getUserId_result) > 0) {
                    $userId = mysqli_fetch_assoc($getUserId_result)['userId'];
    /* 
                    $patient_query = "INSERT INTO patient (userId, gender, bloodType, dateOfBirth, phoneNumber) VALUES (?, ?, ?, ?, ?)";
                    $patient_query_run = mysqli_prepare($con, $patient_query);
                    mysqli_stmt_bind_param($patient_query_run, "isssi", $userId, $gender, $bloodType, $DOB, $phone); */
                    if ($phone == "") {
                        
                        $patient_query = "INSERT INTO patient (userId, gender, bloodType, dateOfBirth) VALUES (?, ?, ?, ?)";
                        $patient_query_run = mysqli_prepare($con, $patient_query);
                        mysqli_stmt_bind_param($patient_query_run, "isss", $userId, $gender, $bloodType, $DOB);
    
                            
                        if (mysqli_stmt_execute($patient_query_run)) {
                            mysqli_stmt_close($user_query_run);
                            mysqli_stmt_close($getUserId_query_run);
                            mysqli_stmt_close($patient_query_run);
                            mysqli_close($con);
                            redirect('../patients.php', "Patient Added Successfully!");
                        } else {
                            mysqli_stmt_close($user_query_run);
                            mysqli_stmt_close($getUserId_query_run);
                            mysqli_stmt_close($patient_query_run);
                            mysqli_close($con);
                            redirect('../patients.php', "Something Went Wrong!");
                            /* redirect('../patients.php',  mysqli_stmt_error($patient_query_run)); */
                        }
                    } else {

                        $phoneCheckQuery = "SELECT phoneNumber FROM patient WHERE phoneNumber = ? 
                        UNION 
                        SELECT phoneNumber FROM doctor WHERE phoneNumber = ?";
    
                        $phoneCheckQueryRun = mysqli_prepare($con, $phoneCheckQuery);
                        mysqli_stmt_bind_param($phoneCheckQueryRun, "ii", $phone, $phone);
                        mysqli_stmt_execute($phoneCheckQueryRun);
                        mysqli_stmt_store_result($phoneCheckQueryRun);
                        if (mysqli_stmt_num_rows($phoneCheckQueryRun) > 0) {
                            mysqli_stmt_close($phoneCheckQueryRun);
                            mysqli_close($con);
                            redirect('../patients.php', "Phone already exists!");
                        } else {
                            $patient_query = "INSERT INTO patient (userId, gender, bloodType, dateOfBirth, phoneNumber) VALUES (?, ?, ?, ?, ?)";
                            $patient_query_run = mysqli_prepare($con, $patient_query);
                            mysqli_stmt_bind_param($patient_query_run, "isssi", $userId, $gender, $bloodType, $DOB, $phone);
                            
                            if (mysqli_stmt_execute($patient_query_run)) {
                                mysqli_stmt_close($user_query_run);
                                mysqli_stmt_close($getUserId_query_run);
                                mysqli_stmt_close($patient_query_run);
                                mysqli_close($con);
                                redirect('../patients.php', "Patient Added Successfully!");
                            } else {
                                mysqli_stmt_close($user_query_run);
                                mysqli_stmt_close($getUserId_query_run);
                                mysqli_stmt_close($patient_query_run);
                                mysqli_close($con);
                                redirect('../patients.php', "Something Went Wrong!");
                               /* redirect('../patients.php',  mysqli_stmt_error($patient_query_run)); */
                            }
                        }
                    }
    /* 
                    if (mysqli_stmt_execute($patient_query_run)) {
                        mysqli_stmt_close($user_query_run);
                        mysqli_stmt_close($getUserId_query_run);
                        mysqli_stmt_close($patient_query_run);
                        mysqli_close($con);
                        redirect('../patients.php', "Patient Added Successfully!");
                    } else {
                        mysqli_stmt_close($user_query_run);
                        mysqli_stmt_close($getUserId_query_run);
                        mysqli_stmt_close($patient_query_run);
                        mysqli_close($con);
                        redirect('../patients.php', "Something Went Wrong!");
                    } */
                }
            }else {
                mysqli_stmt_close($user_query_run);
                mysqli_close($con);
                redirect('../patients.php', "Something Went Wrong!");
               /*  redirect('../patients.php',  mysqli_stmt_error($user_query_run)); */
            }
        }
    }

}
else{
    mysqli_close($con);
    header('Location: ../dashboard.php');
}

?>
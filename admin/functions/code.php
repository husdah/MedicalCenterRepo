<?php
session_start();
include('../../config/dbcon.php');

if(isset($_POST['reminderInput'])){
    $reminder=$_POST['reminderInput'];

    if($reminder != ""){
        $reminder_query= "INSERT INTO reminders (reminder) VALUES ('$reminder');";

        $reminder_query_run = mysqli_query($con,$reminder_query);
        if($reminder_query_run)
        {
            /* redirect('dashboard.php',"reminder Added Successfully!"); */
            header('Location: ../dashboard.php');
    
        }else{
            /* redirect('dashboard.php',"Something Went Wrong!"); */
            header('Location: ../dashboard.php');
        }
    }
}
else if(isset($_POST['delete_reminder_btn'])){

    $remiderId= mysqli_real_escape_string($con, $_POST['reminderId']); 
    
    $delete_query= "DELETE FROM reminders WHERE reminderId='$remiderId';";
    $delete_query_run = mysqli_query($con,$delete_query);  

    if($delete_query_run)
    {
      echo 200;

    }else{
        echo 500;
    }

}
else if(isset($_POST['clinicName']) && isset($_POST['clinicDesc'])){
    $name=$_POST['clinicName'];
    $description=$_POST['clinicDesc'];
    /* $photo=$_POST['clinicImg']; */

    $image = $_FILES['clinicImg']['name'];
    $path="../../uploads";
    $image_ext =pathinfo($image,PATHINFO_EXTENSION);
    $filename= time().'.'.$image_ext;

    $clinic_check_query= "SELECT * FROM clinic WHERE name='$name';";
    $clinic_check_query_run = mysqli_query($con,$clinic_check_query);
    if(mysqli_num_rows($clinic_check_query_run) >0){
        /* redirect('category.php',"Category already exist!"); */
        header('Location: ../patient.php');
    }

    if($name != "" && $description != "" && $filename != ""){
        $clinic_query= "INSERT INTO clinic (name,description,photo) VALUES ('$name','$description','$filename');";

        $clinic_query_run = mysqli_query($con,$clinic_query);
        if($clinic_query_run)
        {
            /* redirect('dashboard.php',"reminder Added Successfully!"); */
            move_uploaded_file($_FILES['clinicImg']['tmp_name'],$path.'/'.$filename);
            header('Location: ../clinics.php');
    
        }else{
            /* redirect('dashboard.php',"Something Went Wrong!"); */
            header('Location: ../clinics.php');
        }
    }
   
}
else if(isset($_POST['deleteClinicBtn'])){
    $clinic_id= mysqli_real_escape_string($con, $_POST['clinicId']);

    $clinic_query= "SELECT * FROM clinic WHERE clinicId='$clinic_id';";
    $clinic_query_run = mysqli_query($con,$clinic_query);
    $clinic_data=mysqli_fetch_array($clinic_query_run);
    $image = $clinic_data['photo'];
    
    $delete_query= "DELETE FROM clinic WHERE clinicId='$clinic_id';";
    $delete_query_run = mysqli_query($con,$delete_query);  

    if($delete_query_run)
    {  
        if(file_exists("../../uploads/".$image)){
            unlink("../../uploads/".$image);
        }
        echo 200;
    }else{
        echo 500;
    }
}
else if(isset($_POST['editClinicFormId']) && isset($_POST['editClinicName']) && isset($_POST['editClinicDesc'])){
    $clinicId= $_POST['editClinicFormId'];
    $name=$_POST['editClinicName'];
    $description=$_POST['editClinicDesc'];

    $path="../../uploads";

    $new_image = $_FILES['editClinicImg']['name'];
    $old_image = $_POST['old_image'];

    if($new_image !=""){
        $image_ext =pathinfo($new_image,PATHINFO_EXTENSION);
        $update_filename= time().'.'.$image_ext;
    }else{
        $update_filename = $old_image;
    }

    if($clinicId != "" && $name != "" && $description != "" && $update_filename != ""){
        $update_clinic_query= "UPDATE clinic SET name='$name', description='$description' , photo='$update_filename' WHERE clinicId='$clinicId'; ";

        $update_clinic_query_run = mysqli_query($con,$update_clinic_query);
        if($update_clinic_query_run)
        {
            if($_FILES['editClinicImg']['name'] != ""){
                move_uploaded_file($_FILES['editClinicImg']['tmp_name'],$path.'/'.$update_filename);
                if(file_exists("../../uploads/".$old_image)){
                    unlink("../../uploads/".$old_image);
                }
            }
            header('Location: ../clinics.php');
            /* redirect("edit-project.php?id=$project_id","Project Updated Successfully!"); */
    
        }else{
            header('Location: ../clinics.php');
            /* redirect("edit-project.php?id=$project_id","Something Went Wrong!"); */
        }
    }

}else if(isset($_POST['doctorFN']) && isset($_POST['doctorLN']) && isset($_POST['doctorEmail']) && isset($_POST['doctorPhone']) && isset($_POST['doctorClinic']) && isset($_POST['doctorPass']) && isset($_POST['doctorPassConfirm'])){
    $fname = $_POST['doctorFN'];
    $lname = $_POST['doctorLN'];
    $email = $_POST['doctorEmail'];
    $phone = $_POST['doctorPhone'];
    $clinicId = $_POST['doctorClinic'];
    $password = $_POST['doctorPass'];
    $confirmation = $_POST['doctorPassConfirm'];
    $role = 1;

    if($fname != "" && $lname != "" && $email != "" && $phone != "" && $clinicId != "clinic" && $password != "" && $confirmation != "" && $password == $confirmation){

        $user_query = "INSERT INTO user (Fname, Lname, email, password, role) VALUES ('$fname', '$lname', '$email', '$password', $role);";
        $user_query_run = mysqli_query($con,$user_query);

        if($user_query_run){
            $getUserId_query = "SELECT userId FROM user WHERE email = '$email';";
            $getUserId_query_run = mysqli_query($con, $getUserId_query);

            if(mysqli_num_rows($getUserId_query_run) >0){
                foreach($getUserId_query_run as $item){
                    $userId = $item["userId"];
                    $doctor_query = "INSERT INTO doctor (userId, clinicId, phoneNumber) VALUES ($userId , $clinicId, $phone);";
                    $doctor_query_run = mysqli_query($con,$doctor_query);

                    if($doctor_query_run)
                    {
                        /* redirect('dashboard.php',"reminder Added Successfully!"); */
                        header('Location: ../doctors.php');
                
                    }else{
                        /* redirect('dashboard.php',"Something Went Wrong!"); */
                        header('Location: ../doctors.php');
                    }
                }
            }
        }
    }

}
else if(isset($_POST['deleteDocBtn'])){
    $doctorId= mysqli_real_escape_string($con, $_POST['doctorId']);
    
    $delete_query= "UPDATE doctor SET deleted=1 WHERE doctorId='$doctorId';";
    $delete_query_run = mysqli_query($con,$delete_query);  

    if($delete_query_run)
    {
        echo 200;
    }else{
        echo 500;
    }
}
else if(isset($_POST['restoreDocBtn'])){
    $doctorId= mysqli_real_escape_string($con, $_POST['doctorId']);
    
    $delete_query= "UPDATE doctor SET deleted=0 WHERE doctorId='$doctorId';";
    $delete_query_run = mysqli_query($con,$delete_query);  

    if($delete_query_run)
    {
        echo 200;
    }else{
        echo 500;
    }
}
else if(isset($_POST['editDoctorFormId']) && isset($_POST['editUserId']) && isset($_POST['editDoctorFN']) && isset($_POST['editDoctorLN']) && isset($_POST['editDoctorEmail']) && isset($_POST['editDoctorPhone']) && isset($_POST['editDoctorClinic']) && isset($_POST['editDoctorPass']) && isset($_POST['editDoctorPassConfirm'])){
    $doctorId = $_POST['editDoctorFormId'];
    $userId = $_POST['editUserId'];
    $fname = $_POST['editDoctorFN'];
    $lname = $_POST['editDoctorLN'];
    $email = $_POST['editDoctorEmail'];
    $phone = $_POST['editDoctorPhone'];
    $clinicId = $_POST['editDoctorClinic'];
    $password = $_POST['editDoctorPass'];
    $confirmation = $_POST['editDoctorPassConfirm'];

    if($fname != "" && $lname != "" && $email != "" && $phone != "" && $clinicId != "clinic" && $password != "" && $confirmation != "" && $password == $confirmation){

        $user_query = "UPDATE user SET Fname='$fname', Lname='$lname', email='$email', password='$password' WHERE userId= $userId";
        $user_query_run = mysqli_query($con,$user_query);

        if($user_query_run){

            $doctor_query = "UPDATE doctor SET clinicId= $clinicId, phoneNumber= $phone WHERE doctorId = $doctorId";
            $doctor_query_run = mysqli_query($con,$doctor_query);

            if($doctor_query_run)
            {
                /* redirect('dashboard.php',"reminder Added Successfully!"); */
                header('Location: ../edit-doctor.php?doctorId='.$doctorId);
        
            }else{
                /* redirect('dashboard.php',"Something Went Wrong!"); */
                header('Location: ../edit-doctor.php?doctorId='.$doctorId);
            }
            
        }
    }

}
else if(isset($_POST['exceptionDay']) && isset($_POST['docId'])){
    $doctorId=$_POST['docId'];
    $date=$_POST['exceptionDay'];
    $from=$_POST['exceptionFrom'];
    $to=$_POST['exceptionTO'];
    $available= isset($_POST['availableException']) ? "1":"0";

    if($date != ""){
        $exception_query= "INSERT INTO workingexception (doctorId, date, fromHour, toHour, available) VALUES ('$doctorId', '$date', '$from', '$to', '$available');";

        $exception_query_run = mysqli_query($con,$exception_query);
        if($exception_query_run)
        {
            /* redirect('dashboard.php',"exception Added Successfully!"); */
            header('Location: ../edit-doctor.php?doctorId='.$doctorId);
    
        }else{
            /* redirect('dashboard.php',"Something Went Wrong!"); */
            header('Location: ../edit-doctor.php?doctorId='.$doctorId);
        }
    }
}
else if(isset($_POST['deleteWExceptionBtn'])){

    $wExId= mysqli_real_escape_string($con, $_POST['wExcId']); 
    
    $delete_query= "DELETE FROM workingexception WHERE wExcepId='$wExId';";
    $delete_query_run = mysqli_query($con,$delete_query);  

    if($delete_query_run)
    {
      echo 200;

    }else{
        echo 500;
    }

}
else if(isset($_POST['urgentBT']) && isset($_POST['urgentBTN'])){
    $urgentBT=$_POST['urgentBT'];
    $number=$_POST['urgentBTN'];

    if($urgentBT != "" && $number != ""){
        $urgentbt_query= "INSERT INTO urgentbt (bloodType, number) VALUES ('$urgentBT', $number);";

        $urgentbt_query_run = mysqli_query($con,$urgentbt_query);
        if($urgentbt_query_run)
        {
            /* redirect('dashboard.php',"urgentbt Added Successfully!"); */
            header('Location: ../donors.php');
    
        }else{
            /* redirect('donors.php',"Something Went Wrong!"); */
            header('Location: ../donors.php');
        }
    }
}
else if(isset($_POST['delete_reminder_btn'])){

    $remiderId= mysqli_real_escape_string($con, $_POST['reminderId']); 
    
    $delete_query= "DELETE FROM reminders WHERE reminderId='$remiderId';";
    $delete_query_run = mysqli_query($con,$delete_query);  

    if($delete_query_run)
    {
      echo 200;

    }else{
        echo 500;
    }

}
else if(isset($_POST['deleteDonorBtn'])){

    $donorId= mysqli_real_escape_string($con, $_POST['donorId']); 
    
    $delete_query= "DELETE FROM donor WHERE donorId='$donorId';";
    $delete_query_run = mysqli_query($con,$delete_query);  

    if($delete_query_run)
    {
      echo 200;

    }else{
        echo 500;
    }

}
else if(isset($_POST['deleteUrgentBTBtn'])){

    $urgentBTId= mysqli_real_escape_string($con, $_POST['urgentBTId']); 
    
    $delete_query= "DELETE FROM urgentbt WHERE urgentBTId='$urgentBTId';";
    $delete_query_run = mysqli_query($con,$delete_query);  

    if($delete_query_run)
    {
      echo 200;

    }else{
        echo 500;
    }

}
else if(isset($_POST['signup-name']) && isset($_POST['signup-email']) && isset($_POST['signup-password']) && isset($_POST['signup-passwordConfirm'])){
    $name = $_POST['signup-name'];
    $email = $_POST['signup-email'];
    $password = $_POST['signup-password'];
    $confirmation = $_POST['signup-passwordConfirm'];

    if($name != "" && $email != "" && $password != "" && $confirmation != "" && $password == $confirmation){

        $user_query = "UPDATE user SET Fname='$name', Lname='$name', email='$email', password='$password' WHERE role=0";
        $user_query_run = mysqli_query($con,$user_query);

        if($user_query_run)
        {
            /* redirect('dashboard.php',"reminder Added Successfully!"); */
            header('Location: ../settings.php');
    
        }else{
            /* redirect('dashboard.php',"Something Went Wrong!"); */
            header('Location: ../settings.php');
        }
    }

}
else{
    header('Location: ../dashboard.php');
}

?>
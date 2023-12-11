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
else{
    header('Location: ../dashboard.php');
}

?>
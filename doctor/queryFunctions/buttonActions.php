<?php
session_start();

require '../../PHPMailer-master/src/Exception.php';
require '../../PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('../../config/dbcon.php');

if(isset($_POST['appId'])){
    $appointmentId= $_POST['appId'];
    $sql = "SELECT `email`, app.date as date, app.time as time FROM `appointment` AS app, `patient`, `user` WHERE app.appId = $appointmentId AND
    app.patientId = patient.patientId AND patient.userId = user.userId";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $date = $row['date'];
    $time = $row['time'];

    if(isset($_POST['del-btn'])){
        $update_query = "UPDATE `appointment` SET `status`='rejected' WHERE appId = $appointmentId";
        $res = mysqli_query($con,$update_query);
        if($res){
            echo "1";
            $mail = new PHPMailer();
            try {
                $mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host = "smtp.gmail.com"; // Define SMTP host
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->SMTPSecure = 'tls'; // Set type of encryption
                $mail->Port = 587; // Set port to connect SMTP
                $mail->Username = "healthhubcenter23@gmail.com"; // Set Gmail username
                $mail->Password = "clctytzjvtgjfhei"; // Set Gmail password
    
                //Email Composition
                $mail->setFrom("noreply@example.com");
                $mail->addAddress($email);
                $mail->Subject = "Appointment Rejection";
                $mail->Body = <<<END
                "Dear Patient, We regret to inform you that your appointment on $date at $time has been rejected."
                END;
                //$mail->IsHTML(true);
                $mail->send();
                } catch (Exception $e) {
                    echo "2";
                }
            } else{
                echo "2";
            }
    } else if(isset($_POST['acc-btn'])){
        $update_query = "UPDATE `appointment` SET `status`='accepted' WHERE appId = $appointmentId";
        $res2 = mysqli_query($con,$update_query);
        if($res2){
            $mail = new PHPMailer();
            try {
                $mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host = "smtp.gmail.com"; // Define SMTP host
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->SMTPSecure = 'tls'; // Set type of encryption
                $mail->Port = 587; // Set port to connect SMTP
                $mail->Username = "healthhubcenter23@gmail.com"; // Set Gmail username
                $mail->Password = "clctytzjvtgjfhei"; // Set Gmail password
    
                //Email Composition
                $mail->setFrom("noreply@example.com");
                $mail->addAddress($email);
                $mail->Subject = "Appointment Acception";
                $mail->Body = <<<END
                Dear Patient,
                
                Your appointment on $date at $time has been accepted.
                Please contact us if you have any questions.
                
                Sincerely,
                The Clinic
                END;
               // $mail->IsHTML(true);
                $mail->send();
                } catch (Exception $e) {
                    //echo "2"; 
                }
            } else{
                //echo "2";
            }
    }

}
?>
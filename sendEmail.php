<?php
    //Include required phpmailer files
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    //Define name spaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name    = $_POST['fname'] . " " . $_POST['lname'];
        $email   = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message']; 
            $mail = new PHPMailer(); // Create instance of phpmailer
            try {
                $mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host = "smtp.gmail.com"; // Define SMTP host
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->SMTPSecure = 'tls'; // Set type of encryption
                $mail->Port = 587; // Set port to connect SMTP
                $mail->Username = "healthhubcenter23@gmail.com"; // Set Gmail username
                $mail->Password = "clctytzjvtgjfhei"; // Set Gmail password
        
                //Email Composition
                $mail->setFrom($email, $name);// Set "From" address to the user-entered email
                $mail->addReplyTo($email, $name);
                $mail->addAddress('healthhubcenter23@gmail.com'); // Add recipient
                $mail->isHTML(true); // Set sender email
                $mail->Subject = "Subject: $subject"; // Set email subject
                $mail->Body = "Email: $email <br> $message "; // Set email body
                $mail->Send(); 
                echo "Message has been sent";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    }
?>
<?php
    //Include required phpmailer files
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    //Define name spaces
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo "<script>alert('clicked')</script>";
        /*$name    = $_POST['fname'].$_POST['lname'];
        $email   = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        
        $mail = new PHPMailer();//Create instance of phpmailer
    
        try{
            $mail->isSMTP();//Set mailer to use smtp
            $mail->Host = "smtp.gmail.com"; //define smtp  host
            $mail->SMTPAuth = true;//enable smtp authentication
            $mail->SMTPSecure = 'tls';//set type of encryption 
            $mail->Port = 587;//set port to connect smtp
            $mail->Username = "healthhubcenter23@gmail.com";//set gmail username    
            $mail->Password = "hhCenter@23";//set gmail password
            
            $mail->setFrom('healthhubcenter23@gmail.com', 'Admin');
            $mail->addAddress("healthhubcenter23@gmail.com");//add recipient
           
            $mail->isHTML(true);//set sender email
           
            $mail->Subject = "Sbject: $subject";//set email subject
            $mail->Body = "Name: $name <br> Email: $email <br> Message: $message";//set email body
            
            $mail->Send();
            echo "Message has been sent";
        }
        catch(Exception $e){
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }*/
    }
?>
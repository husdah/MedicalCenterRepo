<?php
    include('validateFunctions.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $fname   = test_input($_POST['firstName']);
        $lname   = test_input($_POST['lname']);
        $name    = test_input($fname . " " . $lname); 
        $email   = test_input($_POST['email']); 
        $subject = test_input($_POST['subject']);
        $message = test_input($_POST['message']);
       
        if(empty($fname) || empty($lname) || empty($email) || empty($subject) || empty($message)){
            echo '200';
        }
        else if(!validateName($fname) || !validateName($lname) || !validateEmail($email) || !validateSubjectStructure($subject)) {    
            echo '300';
        }
        else{
            include('../config/email.php');
            
            //Email Composition
            $mail->setFrom($email, $name);// Set "From" address to the user-entered email
            $mail->addReplyTo($email, $name);
            $mail->addAddress('healthhubcenter23@gmail.com'); // Add recipient
            $mail->isHTML(true); // Set sender email
            $mail->Subject = $subject; // Set email subject
            $mail->Body =  $message; // Set email body
            $mail->Send();

            echo '100';
        }
    }
?>
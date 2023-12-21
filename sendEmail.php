<?php
    // Function to test input
    function test_input($data){
        $data = trim($data);// Trim whitespace
        $data = stripslashes($data);// Remove HTML and PHP tags
        $data = htmlspecialchars($data);// Escape special characters to prevent SQL injection
        return $data;
    }

    // Function to validate name
    function validateName($name) {
        $nameRegex = '/^[a-zA-Z]+$/';
        return preg_match($nameRegex, $name);
    }

    // Function to validate email
    function validateEmail($email) {
        $emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
        return preg_match($emailRegex, $email);
    }

    // Function to validate subject
    function validateSubjectStructure($subject) {
        $subjectRegex = '/^.{1,}$/';
        return preg_match($subjectRegex, $subject);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname   = test_input($_POST['fname']);      //echo $fname;
        $lname   = test_input($_POST['lname']);      //echo $lname;
        $name    = test_input( $fname. " " .$lname); //echo $name;
        $email   = test_input($_POST['email']);      //echo $email;
        $subject = test_input($_POST['subject']);    //echo $subject;
        $message = test_input($_POST['message']);    //echo $message;
        
       
        if(!empty($fname) && !empty($lname) && !empty($email) && !empty($subject) && !empty($message)
        && validateName($fname) && validateName($lname) && validateEmail($email) && validateSubjectStructure($subject)) {    
            require_once('config/email.php');
            //Email Composition
            $mail->setFrom($email, $name);// Set "From" address to the user-entered email
            $mail->addReplyTo($email, $name);
            $mail->addAddress('healthhubcenter23@gmail.com'); // Add recipient
            $mail->isHTML(true); // Set sender email
            $mail->Subject = "Subject: $subject"; // Set email subject
            $mail->Body = " $message "; // Set email body
            $mail->Send(); 
            echo '200';
        }
        else{
            echo '500';
        }   
    }
?>
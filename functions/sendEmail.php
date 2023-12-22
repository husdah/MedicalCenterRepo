<?php
    header('Content-type: application/json');
    include('validateFunctions.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $json = json_decode(file_get_contents('php://input'));
        
        $fname   = test_input($json->firstName);
        $lname   = test_input($json->lastName);
        //$name    = test_input($json->firstName . " " . $json->lastName); 
        $email   = test_input($json->email);      
        $subject = test_input($json->subject);    
        $message = test_input($json->message);   
        
        $data = [];
       
        if(empty($fname) || empty($lname) || empty($email) || empty($subject) || empty($message)){
            $response = '200';
            $msg = "fields are empty";
        }
        else if(!validateName($fname) || !validateName($lname) || !validateEmail($email) || !validateSubjectStructure($subject)) {    
            $response = '300';
            $msg = "fields are not validated";
        }
        else{
            include('../config/email.php');
            
            //Email Composition
            $mail->setFrom($email, $fname);// Set "From" address to the user-entered email
            $mail->addReplyTo($email, $fname);
            $mail->addAddress('healthhubcenter23@gmail.com'); // Add recipient
            $mail->isHTML(true); // Set sender email
            $mail->Subject = "Subject: $subject"; // Set email subject
            $mail->Body = " $message "; // Set email body
            $mail->Send();

            $response = '100';
            $msg = "send";
        }

        $data["message"]  = $msg;
        $data["response"] = $response;
        echo json_encode($data);
    }
?>
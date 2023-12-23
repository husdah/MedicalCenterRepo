<?php
 
    session_start();
    $userId = $_SESSION['auth_user']['user_id'];

    header('Content-type: application/json');  

    // Function to test input
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
    
    // Function to validate email
    function validateEmail($email) {
        $emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
        return preg_match($emailRegex, $email);
    }

    // Function to validate phone
    function validatePhone($phone) {
        $lebanesePhoneRegex = '/^\d{8}$/';
        /* $lebanesePhoneRegex = '/^(?:\+961|0\d{1,2}) \d{3} \d{3}$/'; */
        return preg_match($lebanesePhoneRegex, $phone);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $json = json_decode(file_get_contents('php://input'));
        
        $updateFname     = test_input($_POST['First-Name']);
        $updateLname     = test_input($_POST['Last-Name']);
        $updateEmail     = test_input($_POST['pat-email']);

        /*$updateFname     = test_input($json->updateFname);
        $updateLname     = test_input($json->updateLname);
        $updateEmail     = test_input($json->updateEmail);
        $updatePhone     = test_input($json->updatePhone);
        $updateDate      = test_input($json->updateDate);
        $updateGender    = test_input($json->updateGender);
        $updateBloodType = test_input($json->updateBloodType);*/

        $data = [];

        if(empty($updateFname) || empty($updateLname) || empty($updateEmail)) {
            $msg = "All fields are required!";
            $response = '200';
        }
        else{
            include('../config/dbcon.php');
            global $con;
            /*$query  =  'UPDATE user
                        JOIN patient ON user.userId = patient.userId
                        SET
                            user.Fname = ?,          
                            user.Lname = ?,          
                            user.email = ?,          
                            patient.phoneNumber = ?, 
                            patient.dateOfBirth = ?, 
                            patient.gender = ?,      
                            patient.bloodType = ?    
                        WHERE user.userId = ?;     
                        ';*/
            $query  =  'UPDATE user
                        SET
                            user.Fname = ?,          
                            user.Lname = ?,          
                            user.email = ?,  
                        WHERE user.userId = ?;     
                        ';            

            $stmt = mysqli_prepare($con, $query);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sssi", $updateFname, $updateLname, $updateEmail, $userId);
                $result = mysqli_stmt_execute($stmt);
                if ($result) {
                    $msg = "Your informations are updated successfully.";
                    $response = '500';
                }
                else{
                    $msg = "in bind parameter.";
                    $response = '101';
                }
            } 
            else{
                $msg = "before execution.";
                $response = '100';
            }
            
        }
    
        $data["response"] = $response;
        $data["message"]  = $msg;
        echo json_encode($data);
    }
?>
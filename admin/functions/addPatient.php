<?php
include('validate.php');
header('Content-type: application/json');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = json_decode(file_get_contents('php://input'));

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
    $password = test_input($_POST['patientPass']);
    $confirmation = test_input($_POST['patientPassConfirm']);
    $role = 2;

    $data = [];
    $response = 200;

    if($fname == ""){
        $response = 500;
        $msg ="Please Enter First Name!";
    }
    else if(!validateName($fname)){
        $response = 500;
        $msg = "Please Enter a Valid Fname!";
    }
    else if($lname == ""){
        $response = 500;
        $msg ="Please Enter Last Name!";
    }
    else if(!validateName($lname)){
        $response = 500;
        $msg = "Please Enter a Valid Lname!";
    }
    else if($gender == ""){
        $response = 500;
        $msg ="Please Enter Patient Gender!";
    }
    else if($DOB == ""){
        $response = 500;
        $msg ="Please Enter Date Of Birth!";
    }else if($email == ""){
        $response = 500;
        $msg ="Please Enter Email!";
    }
    else if(!validateEmail($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
        $response = 500;
        $msg = "Please Enter a Valid Email!";
    }
    else if($password == ""){
        $response = 500;
        $msg ="Please Enter Password!";
    }
    else if(!validatePass($password)){
        $response = 500;
        $msg = "Please Enter a Valid Password!";
    }
    else if($confirmation == ""){
        $response = 500;
        $msg ="Please Confirm Password!";
    }
    else if($password != $confirmation){
        $response = 500;
        $msg ="Password Confirmation Incorrect!";
    }
    else{
        $Email_check_query = "SELECT * FROM user WHERE email=?";
        $Email_check_query_run = mysqli_prepare($con, $Email_check_query);
        mysqli_stmt_bind_param($Email_check_query_run, "s", $email);
        mysqli_stmt_execute($Email_check_query_run);
        mysqli_stmt_store_result($Email_check_query_run);
        if (mysqli_stmt_num_rows($Email_check_query_run) > 0) {
            $response = 500;
            $msg = "Email already exists!";
        }else if($phone != null){
            $phoneCheckQuery = "SELECT phoneNumber FROM patient WHERE phoneNumber = ? 
            UNION 
            SELECT phoneNumber FROM doctor WHERE phoneNumber = ?";
    
            $phoneCheckQueryRun = mysqli_prepare($con, $phoneCheckQuery);
            mysqli_stmt_bind_param($phoneCheckQueryRun, "ii", $phone, $phone);
            mysqli_stmt_execute($phoneCheckQueryRun);
            mysqli_stmt_store_result($phoneCheckQueryRun);
            if (mysqli_stmt_num_rows($phoneCheckQueryRun) > 0) {
                $response = 500;
                $msg = "Phone already exists!";
            } 
            mysqli_stmt_close($phoneCheckQueryRun);
        } 

        if($response != 500)
        {
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

                    if ($phone == "") {
                        $patient_query = "INSERT INTO patient (userId, gender, bloodType, dateOfBirth) VALUES (?, ?, ?, ?)";
                        $patient_query_run = mysqli_prepare($con, $patient_query);
                        mysqli_stmt_bind_param($patient_query_run, "isss", $userId, $gender, $bloodType, $DOB);
    
                            
                        if (mysqli_stmt_execute($patient_query_run)) {
                            $response = 200;
                            $msg = "Patient Added Successfully!";

                            $data["fname"] = $fname;
                            $data["lname"] = $lname;
                            $data["email"] = $email;
                            $data["phone"] = $phone;
                            $data["gender"] = $gender;
                            $data["bloodType"] = $bloodType;
                            $data["DOB"] = $DOB;
                        } else {
                            $response = 500;
                            $msg = "Something Went Wrong!";
                        }

                        mysqli_stmt_close($patient_query_run);
                    } else {

                        $patient_query = "INSERT INTO patient (userId, gender, bloodType, dateOfBirth, phoneNumber) VALUES (?, ?, ?, ?, ?)";
                        $patient_query_run = mysqli_prepare($con, $patient_query);
                        mysqli_stmt_bind_param($patient_query_run, "isssi", $userId, $gender, $bloodType, $DOB, $phone);
                        
                        if (mysqli_stmt_execute($patient_query_run)) {           
                            $response = 200;
                            $msg = "Patient Added Successfully!";

                            $data["fname"] = $fname;
                            $data["lname"] = $lname;
                            $data["email"] = $email;
                            $data["phone"] = $phone;
                            $data["gender"] = $gender;
                            $data["bloodType"] = $bloodType;
                            $data["DOB"] = $DOB;
                        } else {          
                            $response = 500;
                            $msg = "Something Went Wrong!";
                        }

                        mysqli_stmt_close($patient_query_run);                    
                    }
                }

                mysqli_stmt_close($getUserId_query_run);
            }else {
                $response = 500;
                $msg = "Something Went Wrong!";
            }

            mysqli_stmt_close($user_query_run);
        }

        mysqli_stmt_close($Email_check_query_run);
        mysqli_close($con);
    }

    $data["response"] = $response;
    $data["message"] = $msg;
    echo json_encode($data);
}
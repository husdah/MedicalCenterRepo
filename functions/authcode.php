<?php
session_start();
require("../config/dbcon.php");

header('Content-type: application/json');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = json_decode(file_get_contents('php://input'));

    $email = mysqli_real_escape_string($con, $json->email);
    $password = mysqli_real_escape_string($con, $json->password);

    $data = [];

    if ($email != "" && $password != "") {

        $login_query= "SELECT * FROM user WHERE email=? AND password=?";
        $login_query_run = mysqli_prepare($con, $login_query);
        mysqli_stmt_bind_param($login_query_run, "ss", $email, $password);
        mysqli_stmt_execute($login_query_run);
        $result = mysqli_stmt_get_result($login_query_run);
    
        if(mysqli_num_rows($result) > 0){
    
            $_SESSION['auth']=true;
    
            $userdata= mysqli_fetch_array($result);
            $username = $userdata['Fname'] ." " .$userdata['Lname'];
            $useremail = $userdata['email'];
            $userid = $userdata['userId'];
            $role_as= $userdata['role'];
    
            $_SESSION['auth_user']=[
                'user_id' =>  $userid,
                'name' => $username,
                'email' => $useremail
            ];
    
            $_SESSION['role_as']= $role_as;
    
            if($role_as == 0){
                $msg = "Welcome to Admin Dashboard";
                $response = 200;
            }else if($role_as == 1){

                $getId_query= "SELECT doctorId FROM doctor WHERE userId=?";
                $getId_query_run = mysqli_prepare($con, $getId_query);
                mysqli_stmt_bind_param($getId_query_run, "i", $userid);
                mysqli_stmt_execute($getId_query_run);
                $result = mysqli_stmt_get_result($getId_query_run);

                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    $doctorId = $row['doctorId'];
                    $_SESSION['doctorId'] = $doctorId;

                    $msg = "Welcome to Doctor Dashboard";
                    $response = 201;
                }else{
                    $msg = "Something Went Wrong!";
                    $response = 500;
                }

               
            }else if($role_as == 2){

                $getId_query= "SELECT patientId FROM patient WHERE userId=?";
                $getId_query_run = mysqli_prepare($con, $getId_query);
                mysqli_stmt_bind_param($getId_query_run, "i", $userid);
                mysqli_stmt_execute($getId_query_run);
                $result = mysqli_stmt_get_result($getId_query_run);

                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    $patientId = $row['patientId'];
                    $_SESSION['patientId']= $patientId;

                    $response = 202;
                    $msg = "Loged In Successfully As Patient";
                }else{
                    $msg = "Something Went Wrong!";
                    $response = 500;
                }
            }

          /*   
            $data["userId"] = $userid;
            $data["name"] = $username;
            $data["email"] = $useremail;
            $data["role"] = $role_as; */
            
    
        }else{
            $response = 500;
            $msg = "Invalid Credentials!";
        }

        mysqli_stmt_close($login_query_run);
        mysqli_close($con);
    } else{
        $response = 500;
        $msg = "Please Enter needed Information!";
    }

    $data["message"] = $msg;
    $data["response"] = $response;
    echo json_encode($data);
}
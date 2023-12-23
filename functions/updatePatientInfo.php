<?php
    session_start();
    $userId = $_SESSION['auth_user']['user_id'];

    header('Content-type: application/json');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $json = json_decode(file_get_contents('php://input'));
        //var_dump($json);
        $updateFname     = $_POST['First-Name'];
        $updateLname     = $_POST['Last-Name'];
        $updateEmail     = $_POST['pat-email'];
        $updatePhone     = $_POST['phone'];
        $updateDate      = $_POST['date'];
        $updateGender    = $_POST['gender'];
        $updateBloodType = $_POST['mySelect'];

        $data = [];

        if(empty($updateFname) || empty($updateLname) || empty($updateEmail) || empty($updatePhone)) {
            $response ='200';
            //$msg = "All fileds shouldd be required!";
        }
        else{
            include('../config/dbcon.php');
            global $con;
            $query  =  "UPDATE user JOIN patient ON user.userId = patient.userId
                        SET user.Fname = '$updateFname', user.Lname = '$updateLname', useremail = '$updateEmail', patient.gender = '$updateGender', patient.bloodType = '$updateBloodType', patient.dateOfBirth = '$updateDate', patient.phoneNumber = '$updatePhone'
                        WHERE user.userId = '$userId' ";
            var_dump($query);
            //$stmt = mysqli_prepare($con, $query);
            //mysqli_stmt_bind_param($stmt, "ssssssii", $updateFname, $updateLname, $updateEmail, $updateGender, $updateBloodType, $updateDate, $updatePhone, $userId);
            /*if (mysqli_query($con, $query)) {
                $data = [
                    'updateFname' => $updateFname,
                    'updateLname' => $updateLname,
                    'updateEmail' => $updateEmail,
                    'updatePhone' => $updatePhone,
                    'updateDate'  => $updateDate,
                    'updateGender'=>$updateGender,
                    'updateBloodType' => $updateBloodType
                ];
                
                //$msg = "Updated Successfully!";
                
                
            }
            else{
                $response ='100';
                //$msg ="Something Went Wrong!";
            }*/
            $response = '500';
        } 

        $data["response"] = $response;
        //$data["message"] = $msg;
        echo json_encode($data);
    }
?>
<?php
    session_start();
    $id = 8;//$id = $_SESSION['userId'];
    header('Content-type: application/json');

    // Function to test input
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
    // Function to validate password
    function validatePass($pass) {
        $passRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
        return preg_match($passRegex, $pass);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $json = json_decode(file_get_contents('php://input'));

        $currentPassword = test_input($json->currentPassword);
        $newPassword     = test_input($json->newPassword);
        $confirmPassword = test_input($json->confirmPassword);

        $msg      = "";
        $response = "";
        $data     = [];

        if(empty($currentPassword) || empty($newPassword) || empty($confirmPassword)){
            $msg = "All fields are required!";
            $response = '200';
        }
        else if(!validatePass($newPassword) || !validatePass($confirmPassword)){
            $msg = "All fields must be validated!";
            $response = '300';
        }
        else{
            //$msg = "Update!";
            if ($newPassword !== $confirmPassword) {
                $msg = "New password and confirm password do not match.";
                $response = '400';
            }
            else{
                //$msg = "New password and confirm password match.";
                require_once('config/dbcon.php');
                global $con;
                $query_select = 'SELECT password From user where user.userId = ?';
                $stmt_select  = mysqli_prepare($con, $query_select);
                if ($stmt_select) {
                    mysqli_stmt_bind_param($stmt_select, "i", $id);
                    mysqli_stmt_execute($stmt_select);
                    $result_select = mysqli_stmt_get_result($stmt_select);
                    if(mysqli_num_rows($result_select) > 0){
                        $row = mysqli_fetch_assoc($result_select);
                        $PasswordDB = $row['password'];
                        if($PasswordDB === $currentPassword){
                            //$msg = "Password Matched";
                            $query  = 'UPDATE user SET user.password = ? WHERE user.userId = ?';
                            $stmt = mysqli_prepare($con, $query);

                            if ($stmt) {
                                mysqli_stmt_bind_param($stmt, "si", $confirmPassword, $id);
                                $result = mysqli_stmt_execute($stmt);
                                if ($result) {
                                    $msg = "Password updated successfully.";
                                    $response = '500';
                                } else {
                                    // Handle execution error
                                    $msg = "Error executing prepared statement: " . mysqli_error($con);
                                }
                                mysqli_stmt_close($stmt);
                            } 
                            else {
                                $msg = "Error preparing statement: " . mysqli_error($con);
                            }   
                        }else{
                            $msg = "Please Enter The Correct Password.";
                            $response = '600';
                        }  
                    }
                }
                else {
                    $msg = "Error preparing statement: " . mysqli_error($con);
                }
            }
        }
        $data["response"] = $response;
        $data["message"]  = $msg;
        echo json_encode($data);
        // Close the database connection
        //mysqli_close($con);
    }
?>
<?php
session_start();
include("../../config/dbcon.php");
if ( isset($_POST['loginBtn'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $stmt = mysqli_prepare($con, "SELECT * FROM `user` WHERE email=? AND password=? ");
    mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        if($row['role'] == 0){
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['userId'];
            header('location:/admin/dashboard.php');
        } else if($row['role'] == 2) {
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['userId'];
            header('location:home.php');
        } else if($row['role'] == 1)
          $_SESSION['doctor_email'] = $row['email'];
          $_SESSION['doctor_id'] = $row['userId'];
          header('location:/doctor/dashboard.php');
        } else {
       $message[] = 'incorrect email or password!';
    }
  }
?>
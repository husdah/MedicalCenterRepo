<?php 

include("../config/dbcon.php");

$email = $_POST['email'];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$sql = "UPDATE user
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = mysqli_prepare($con, $sql);

mysqli_stmt_bind_param($stmt, "sss", $token_hash, $expiry, $email);

mysqli_stmt_execute($stmt);

if (mysqli_affected_rows($con) > 0) {
    require('../config/email.php');
    
    $mail->setFrom("healthhubcenter23@gmail.com");
    $mail->addAddress($email);
    $mail->Subject = "Password Reset";
    $mail->Body = <<<END

    Click <a href="http://example.com/reset-password.php?token=$token">here</a> 
    to reset your password.

    END;

    $mail->send();
    echo "Message sent, please check your inbox.";
}

?>
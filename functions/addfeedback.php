<?php
require('../config/dbcon.php');
$pid='2';

$response = [];

if (isset($_POST['feedback']) && $_POST['feedback'] != "") {
    $feedback = $_POST['feedback'];
    $did = $_POST['did'];
    $cquery = "SELECT COUNT(feedbackId) AS feedbackCount FROM feedback WHERE patientId = ?";
    $stmt = mysqli_prepare($con, $cquery);
    mysqli_stmt_bind_param($stmt, "i", $pid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $feedbackCount);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($feedbackCount <2) {
        $query = "INSERT INTO feedback (doctorId,patientId, message) VALUES (?, ?,?)";

        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'iis', $did,$pid, $feedback);

            if (mysqli_stmt_execute($stmt)) {
                $response["response"] = 200;
                $response["message"] = " ";
            } else {
                $response["response"] = 500; 
                $response["message"] = "Error executing statement: " . mysqli_error($con);
            }

            mysqli_stmt_close($stmt);
        } else {
            $response["response"] = 500;
            $response["message"] = "Error preparing statement: " . mysqli_error($con);
        }
  }
  else
  {
    $response["response"] = 400;
    $response["message"] = "You can't add more than 2 feedbacks.";
  }
} else {
    $response["response"] = 400;
    $response["message"] = "Invalid input or missing data!";
}

echo json_encode($response);
?>


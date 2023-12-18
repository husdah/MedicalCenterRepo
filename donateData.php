<?php
    include("config/dbcon.php");

    // Function to test input
    function test_input($data){
        // Trim whitespace
        $data = trim($data);
        // Remove HTML and PHP tags
        $data = stripslashes($data);
        // Escape special characters to prevent SQL injection
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate input
        $emailOrPhone = test_input($_POST['email-phone']);
        $BloodType = $_POST['mySelect'];
    
        // Perform additional validation as needed
        if (!empty($emailOrPhone) && $BloodType != "Blood-Type") {
            if (validateEmail($emailOrPhone)) {
                $columnEmail = $emailOrPhone;
                // Check if the email already exists in the database
                $query = "SELECT * FROM donor WHERE email = ?";
                $stmt  = mysqli_prepare($con, $query);
                mysqli_stmt_bind_param($stmt, "s", $columnEmail);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) > 0) {
                    echo '200';
                } else {
                    $query = "INSERT INTO donor (email, bloodType, phoneNumber) VALUES (?, ?, NULL)";
                    $stmt  = mysqli_prepare($con, $query);
                    mysqli_stmt_bind_param($stmt, "ss", $columnEmail, $BloodType);
                    $result = mysqli_stmt_execute($stmt);
                    if ($result) {
                        echo '300';
                    } 
                }
            } elseif (validatePhone($emailOrPhone)) {
                $columnPhone = $emailOrPhone;
                // Check if the phone already exists in the database
                $query = "SELECT * FROM donor WHERE phoneNumber = ?";
                $stmt = mysqli_prepare($con, $query);
                mysqli_stmt_bind_param($stmt, "s", $columnPhone);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) > 0) {
                    echo '200';
                } else {
                    $query = "INSERT INTO donor (email, bloodType, phoneNumber) VALUES (NULL, ?, ?)";
                    $stmt = mysqli_prepare($con, $query);
                    mysqli_stmt_bind_param($stmt, "ss", $BloodType, $columnPhone);
                    $result = mysqli_stmt_execute($stmt);
                    if ($result) {
                        echo '300';
                    }
                }
            } else {
                echo '500';
            }
        } else {
            echo '500';
        }
    }
?>
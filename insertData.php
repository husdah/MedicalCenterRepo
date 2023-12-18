<?php
    include("config/dbcon.php");

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
    
    // Function to validate subject
    function validateDesc($desc) {
        $descRegex = '/^[a-zA-Z\s]+$/';
        return preg_match($descRegex, $desc);
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

    // Donation Section
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $emailOrPhone = test_input($_POST['email-phone']);
        $BloodType    = $_POST['mySelect'];
        //echo $BloodType;
    
        if (!empty($emailOrPhone) && $BloodType != "Blood-Type") {
            if (validateEmail($emailOrPhone)) {
                $columnEmail = $emailOrPhone;
            } 
            elseif (validatePhone($emailOrPhone)) {
                $columnPhone = $emailOrPhone;
            } 
            else {
                echo '<script type="text/javascript">alert("Invalid email or phone number format.")</script>';
                exit; // Stop exeution if validation fails
            }
    
            // Check if the email or phone number already exists in the database
            $query = "SELECT * FROM donor WHERE email = '$columnEmail' OR phoneNumber = '$columnPhone' ";
            echo $query;
            $result = mysqli_query($con, $query);
    
            /*if (mysqli_num_rows($result) > 0) {
                echo '<script type="text/javascript">swal("Error!","PEmail already exist","error")</script>';
            }
            else {
                // Insert into the database
                $query = "INSERT INTO donor (email, bloodType, phoneNumber) VALUES ('$columnEmail', '$BloodType', '$columnPhone')";
                $result = mysqli_query($con, $query);
    
                if ($result) {
                    echo '<script type="text/javascript">alert("Your data has been sent successfully!")</script>';
                } else {
                    echo '<script type="text/javascript">alert("Something went wrong. Please try again.")</script>';
                }
            }*/
        } else {
            echo '<script type="text/javascript">swal("Error!","Please Fill the field;","error")</script>';
        }
    }
?>
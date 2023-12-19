<?php
    session_start();
    $userId = 10; //$userId = $_SESSION['userId'];
    
    class user{
        public $id;
        public $doctor;
        public $date;
        public $time;
    }
    class patient{
        public $firstName;
        public $lastName;
        public $email;
        public $phoneNumber;
        public $date;
        //public $gender;
        public $bloodType;
    }

    require_once('config/dbcon.php');
    $query = 'SELECT
	                appointment.appID AS appointmentID, concat(user.Fname, " ", user.Lname) AS doctor, appointment.date, appointment.time, patient.patientId, doctor.doctorId
                FROM
                    appointment
                JOIN
                    doctor ON appointment.doctorid = doctor.doctorId
                JOIN
                    patient ON appointment.patientId = patient.patientId
                JOIN
                    user ON doctor.userId = user.userId
                WHERE
                    patient.userId = ?; 
            ';
    $stmt = mysqli_prepare($con, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0){
            $data = [];
            // output data of each row
            for ($i = 0; $row = $result->fetch_assoc(); $i++) {
                $user = new user();
                $user-> id     = $row['appointmentID'];
                $user-> doctor = $row['doctor'];
                $user-> date   = $row['date'];
                $user-> time   = $row['time'];
                array_push($data, $user);
            }
        }
    } 
    else {
        die("Error in prepared statement: " . mysqli_error($con));
    }

    /*$select_patient_data = 'SELECT  
                                user.fname, user.lname, user.email, patient.phoneNumber, patient.dateOfBirth, patient.gender, patient.bloodType
                            FROM 
                                user
                            JOIN
                                patient ON user.userId = patient.userId 
                            WHERE
                                user.userId = ?; 
                            ';
    $stmt2 = mysqli_prepare($con, $select_patient_data);
    if ($stmt2) {
        mysqli_stmt_bind_param($stmt2, "i", $userId);
        mysqli_stmt_execute($stmt2);
        $result2 = mysqli_stmt_get_result($stmt2);
        if(mysqli_num_rows($result2) > 0){
            $data2 = [];
            // output data of each row
            for ($i = 0; $row = $result2->fetch_assoc(); $i++) {
                $patient = new patient();
                $patient-> firstName   = $row['fname'];
                $patient-> lastName    = $row['lname'];
                $patient-> email       = $row['email'];
                $patient-> phoneNumber = $row['phoneNumber'];
                $patient-> date        = $row['dateOfBirth'];
                //$patient-> gender      = $row['gender'];
                $patient-> bloodType   = $row['bloodType'];
                array_push($data2, $patient);
            }
        }
    } 
    else {
        die("Error in prepared statement: " . mysqli_error($con));
    }
    // $data["sub_count"] = $result->num_rows;
    // $conn->close();
    echo json_encode($data2);*/
    echo json_encode($data);

?>
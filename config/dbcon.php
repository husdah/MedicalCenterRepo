<?php
    $server='localhost';
    $user='root';
    $pass='#Daher@123#123@blizboy@123#';
    $mydb='healthhubdb';

    $con=mysqli_connect($server, $user, $pass, $mydb);

    if(!$con){
        die("Connection failed:" .mysqli_connect_error());
    }else{

        $createTableUserQuery= "CREATE TABLE IF NOT EXISTS user (
            userId INT PRIMARY KEY AUTO_INCREMENT,
            Fname VARCHAR(200) NOT NULL,
            Lname VARCHAR(200) NOT NULL,
            email VARCHAR(200) UNIQUE NOT NULL,
            password longtext NOT NULL,
            role int NOT NULL,
            registrationDate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            restricted int NOT NULL DEFAULT 0
        );";
        $createTableUserQuery_run = mysqli_query($con,$createTableUserQuery);

        $role = 0;
        // Check if the admin already exists
        $checkExistingQuery = "SELECT * FROM user WHERE role = $role";
        $checkExistingResult = mysqli_query($con, $checkExistingQuery);

        if (mysqli_num_rows($checkExistingResult) == 0) {
            // The role doesn't exist, so insert the new admin
            $addAdminQuery = "INSERT INTO `user`(`Fname`, `Lname`, `email`, `password`, `role`) 
                            VALUES ('admin', 'root', 'healthHubAdmin@gmail.com', 'Admin123', $role)";
            $addAdminQuery_run = mysqli_query($con, $addAdminQuery);

        }

        $createTableClinicQuery= "CREATE TABLE IF NOT EXISTS clinic (
            clinicId INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(200) NOT NULL,
            description VARCHAR(200) NOT NULL,
            photo VARCHAR(200) NOT NULL,
            icon VARCHAR(200) NOT NULL

        );";
        $createTableClinicQuery_run = mysqli_query($con,$createTableClinicQuery);

        $createTablePatientQuery= "CREATE TABLE IF NOT EXISTS patient (
            patientId INT PRIMARY KEY AUTO_INCREMENT,
            userId INT NOT NULL,
            gender VARCHAR(100) NOT NULL,
            bloodType VARCHAR(10) NULL,
            dateOfBirth date NOT NULL,
            phoneNumber int UNIQUE NULL,
            FOREIGN KEY (userId) REFERENCES user(userId)

        );";
        $createTablePatientQuery_run = mysqli_query($con,$createTablePatientQuery);

        $createTableDoctorQuery= "CREATE TABLE IF NOT EXISTS doctor (
            doctorId INT PRIMARY KEY AUTO_INCREMENT,
            userId INT NOT NULL,
            clinicId INT NULL,
            phoneNumber int UNIQUE NOT NULL,
            profilePic varchar(200) NULL,
            deleted tinyint NOT NULL DEFAULT 0,
            FOREIGN KEY (userId) REFERENCES user(userId),
            FOREIGN KEY (clinicId) REFERENCES clinic(clinicId) ON DELETE SET NULL

        );";
        $createTableDoctorQuery_run = mysqli_query($con,$createTableDoctorQuery);
    
        $createTableAppointmentQuery= "CREATE TABLE IF NOT EXISTS appointment (
            appId INT PRIMARY KEY AUTO_INCREMENT,
            doctorId INT NOT NULL,
            patientId INT NOT NULL,
            date date NOT NULL,
            time time NOT NULL,
            status varchar(200) NOT NULL,
            FOREIGN KEY (doctorId) REFERENCES doctor(doctorId),
            FOREIGN KEY (patientId) REFERENCES patient(patientId)

        );";
        $createTableAppointmentQuery_run = mysqli_query($con,$createTableAppointmentQuery);
    
        $createTableDoctorHoursQuery= "CREATE TABLE IF NOT EXISTS doctorHours (
            doctorId INT NOT NULL,
            day VARCHAR(200) NOT NULL,
            fromHour TIME NULL,
            toHour TIME NULL,
            available INT NOT NULL,
            PRIMARY KEY (doctorId, day),
            FOREIGN KEY (doctorId) REFERENCES doctor(doctorId)
        );";
        $createTableDoctorHoursQuery_run = mysqli_query($con,$createTableDoctorHoursQuery);

        $createTableDonorQuery= "CREATE TABLE IF NOT EXISTS donor (
            donorId INT PRIMARY KEY AUTO_INCREMENT,
            email varchar(200) UNIQUE NULL,
            bloodType varchar(10) NOT NULL,
            phoneNumber int UNIQUE NULL

        );";
        $createTableDonorQuery_run = mysqli_query($con,$createTableDonorQuery);
    
        $createTableFeedbackQuery= "CREATE TABLE IF NOT EXISTS feedback (
            feedbackId INT PRIMARY KEY AUTO_INCREMENT,
            doctorId INT NOT NULL,
            message mediumtext NOT NULL,
            date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (doctorId) REFERENCES doctor(doctorId)

        );";
        $createTableFeedbackQuery_run = mysqli_query($con,$createTableFeedbackQuery);
    
        $createTableMediaQuery= "CREATE TABLE IF NOT EXISTS media (
            mediaId INT PRIMARY KEY AUTO_INCREMENT,
            doctorId INT NOT NULL,
            facebook varchar(200) NULL,
            instagram varchar(200) NULL,
            linkedin varchar(200) NULL,
            FOREIGN KEY (doctorId) REFERENCES doctor(doctorId)

        );";
        $createTableMediaQuery_run = mysqli_query($con,$createTableMediaQuery);
    
        $createTableMedicalHoursQuery= "CREATE TABLE IF NOT EXISTS medicalHours (
            medHourId INT PRIMARY KEY AUTO_INCREMENT,
            day varchar(200) UNIQUE NOT NULL,
            fromHour time NULL,
            toHour time NULL,
            closed int NOT NULL

        );";
        $createTableMedicalHoursQuery_run = mysqli_query($con,$createTableMedicalHoursQuery);

        $createTableRemindersQuery= "CREATE TABLE IF NOT EXISTS reminders (
            reminderId INT PRIMARY KEY AUTO_INCREMENT,
            reminder varchar(200) NOT NULL,
            date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP

        );";
        $createTableRemindersQuery_run = mysqli_query($con,$createTableRemindersQuery);
    
        $createTableUrgentBTQuery= "CREATE TABLE IF NOT EXISTS urgentBT (
            urgentBTId INT PRIMARY KEY AUTO_INCREMENT,
            bloodType varchar(10) NOT NULL,
            number int NOT NULL

        );";
        $createTableUrgentBTQuery_run = mysqli_query($con,$createTableUrgentBTQuery);
    
        $createTableWorkingExceptionQuery= "CREATE TABLE IF NOT EXISTS workingException (
            wExcepId INT PRIMARY KEY AUTO_INCREMENT,
            doctorId INT NOT NULL,
            date date NOT NULL,
            fromHour time NULL,
            toHour time NULL,
            available int NOT NULL,
            FOREIGN KEY (doctorId) REFERENCES doctor(doctorId)

        );";
        $createTableWorkingExceptionQuery_run = mysqli_query($con,$createTableWorkingExceptionQuery);

        // Check if the stored procedure exists
        $checkProcedureQuery = "SHOW PROCEDURE STATUS LIKE 'delete_doctor_children'";
        $checkProcedureResult = mysqli_query($con, $checkProcedureQuery);

        if (mysqli_num_rows($checkProcedureResult) == 0) {
            // The stored procedure doesn't exist, so create it
            $deleteDocChildrenQuery = "
                CREATE PROCEDURE delete_doctor_children(IN doctorId INT)
                BEGIN
                    -- Delete child records based on the doctorId
                    DELETE FROM media WHERE doctorId = doctorId;
                    DELETE FROM feedback WHERE doctorId = doctorId;
                    DELETE FROM workingException WHERE doctorId = doctorId;
                    DELETE FROM doctorHours WHERE doctorId = doctorId;
                END";
            $deleteDocChildrenQuery_run = mysqli_query($con, $deleteDocChildrenQuery);
        }

        // Check if the trigger exists
        $checkTriggerQuery = "SHOW TRIGGERS LIKE 'before_update_doctor'";
        $checkTriggerResult = mysqli_query($con, $checkTriggerQuery);

        if (mysqli_num_rows($checkTriggerResult) == 0) {
            // The trigger doesn't exist, so create it
            $createTriggerQuery = "
                CREATE TRIGGER before_update_doctor
                BEFORE UPDATE ON doctor
                FOR EACH ROW
                BEGIN
                    IF NEW.deleted = 1 THEN
                        -- Call a stored procedure to handle the cascading delete
                        CALL delete_doctor_children(NEW.doctorId);
                    END IF;
                END";
            $createTriggerQuery_run = mysqli_query($con, $createTriggerQuery);
        }
    }
    
?>
<?php
    $server='localhost';
    $user='root';
    $pass='';
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
            password VARCHAR(200) NOT NULL,
            role int NOT NULL,
            registrationDate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        );";
        $createTableUserQuery_run = mysqli_query($con,$createTableUserQuery);

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
            clinicId INT NOT NULL,
            phoneNumber int UNIQUE NULL,
            profilePic varchar(200) NULL,
            FOREIGN KEY (userId) REFERENCES user(userId),
            FOREIGN KEY (clinicId) REFERENCES clinic(clinicId)

        );";
        $createTableDoctorQuery_run = mysqli_query($con,$createTableDoctorQuery);

        $createTableClinicQuery= "CREATE TABLE IF NOT EXISTS clinic (
            clinicId INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(200) NOT NULL,
            description VARCHAR(200) NOT NULL,
            photo VARCHAR(200) NOT NULL

        );";
        $createTableClinicQuery_run = mysqli_query($con,$createTableClinicQuery);
    
        $createTableAppointementQuery= "CREATE TABLE IF NOT EXISTS appointement (
            appId INT PRIMARY KEY AUTO_INCREMENT,
            doctorId INT NOT NULL,
            patientId INT NOT NULL,
            date date NOT NULL,
            time time NOT NULL,
            status varchar(200) NOT NULL,
            FOREIGN KEY (doctorId) REFERENCES doctor(doctorId),
            FOREIGN KEY (patientId) REFERENCES patient(patientId)

        );";
        $createTableAppointementQuery_run = mysqli_query($con,$createTableAppointementQuery);
    
        $createTableDoctorHoursQuery= "CREATE TABLE IF NOT EXISTS doctorHours (
            doctorHourId INT PRIMARY KEY AUTO_INCREMENT,
            doctorId INT NOT NULL,
            day varchar(200) NOT NULL,
            formHour time NULL,
            toHour time NULL,
            available int NOT NULL,
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
            day varchar(200) NOT NULL,
            formHour time NULL,
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
            formHour time NULL,
            toHour time NULL,
            available int NOT NULL,
            FOREIGN KEY (doctorId) REFERENCES doctor(doctorId)

        );";
        $createTableWorkingExceptionQuery_run = mysqli_query($con,$createTableWorkingExceptionQuery);
    }
?>
<?php 
require('../config/dbcon.php');                    
    if (isset($_POST['selectedDay']) && isset($_POST['did']) && isset($_POST['date'])) {
        $day = $_POST['selectedDay'];
        $did= $_POST['did'];
        $date= $_POST['date'];

        $formattedDate = date('Y-m-d', strtotime($date));
        $checkExc_query = "SELECT * FROM workingException WHERE date='$formattedDate' AND doctorId=$did";
        $checkExc_query_run = mysqli_query($con, $checkExc_query);

        if(mysqli_num_rows($checkExc_query_run) > 0){
            while ($row = mysqli_fetch_assoc($checkExc_query_run)) {
                if($row['available'] == 1){
                    $startTime = new DateTime($row['fromHour']);
                    $endTime = new DateTime($row['toHour']);
        
                    while ($startTime <= $endTime) {
                        echo '<div>' . $startTime->format('H:i') . '</div>';
                        $startTime->modify('+1 hour');  
    
                    }
                }else{
                    echo "No available hours for the selected day.";
                }
            }
        }else{
            $query3 = "SELECT fromHour, toHour, day FROM doctorHours WHERE doctorId=$did AND day='$day' AND available=1;";
            $result3 = mysqli_query($con, $query3);
        
            // Check if there's an error in the query
            if (!$result3) {
                die('Error in query: ' . mysqli_error($con));
            }
        
            // Check if there are rows in the result set
            if (mysqli_num_rows($result3) > 0) {
                // Rewind the result set pointer to the beginning
                mysqli_data_seek($result3, 0);
        
                while ($row = mysqli_fetch_assoc($result3)) {
                    $startTime = new DateTime($row['fromHour']);
                    $endTime = new DateTime($row['toHour']);
        
                    while ($startTime <= $endTime) {
                        echo '<div>' . $startTime->format('H:i') . '</div>';
                        $startTime->modify('+1 hour');  
    
                    }
                }
            } else {
                echo "No available hours for the selected day.";
            }
        }

    }else{
        die("not setted");
    }

?>
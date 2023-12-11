<?php
    session_start();
    include("functions/myfunctions.php");
    include('includes/header.php');

    $clinicsNb= getRowCount("clinic");
    $doctorsNb= getRowCount("doctor");
    $patientsNb= getRowCount("patient");
    $donorsNb= getRowCount("donor");

?>

    <main>
        <div class="header">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            Analytics
                        </a></li>
                    /
                    <li><a href="#" class="active">Appointments</a></li>
                </ul>
            </div>
            <a href="#" class="report">
                <i class='bx bx-receipt'></i>
                <span>View Appointments</span>
            </a>
        </div>

        <!-- Insights -->
        <ul class="insights">
            <li>
                <i class='bx bx-clinic'></i>
                <span class="info">
                    <h3>
                        <!-- 1,074 -->
                        <?= $clinicsNb ?>
                    </h3>
                    <p>Clinics</p>
                </span>
            </li>
            <li><i class='bx bx-first-aid'></i>
                <span class="info">
                    <h3>
                        <!-- 3,944 -->
                        <?= $doctorsNb ?>
                    </h3>
                    <p>Doctors</p>
                </span>
            </li>
            <li><i class='bx bx-group'></i>
                <span class="info">
                    <h3>
                        <!-- 14,721 -->
                        <?= $patientsNb ?>
                    </h3>
                    <p>Patients</p>
                </span>
            </li>
            <li><i class='bx bx-donate-blood'></i>
                <span class="info">
                    <h3>
                        <!-- 6,742 -->
                        <?= $donorsNb ?>
                    </h3>
                    <p>Donors</p>
                </span>
            </li>
        </ul>
        <!-- End of Insights -->

        <div class="bottom-data">
            <div class="orders">
                <div class="header">
                    <i class='bx bx-receipt'></i>
                    <h3>Recent Appts</h3>
                    <form class="expanding-search-form">
                        <div class="search-dropdown">
                            <button class="button dropdown-toggle" type="button">
                            <span class="toggle-active">Name</span>
                            <span class="ion-arrow-down-b"></span>
                            </button>
                            <ul class="dropdown-menu">
                            <li class="menu-active"><a href="#">Name</a></li>
                            <li><a href="#">Date</a></li>
                            <li><a href="#">Status</a></li>
                            </ul>
                        </div>
                        <input class="search-input" id="global-search" type="search" placeholder="Search">
                        <button class="button search-button" type="button">
                            <span class="icon ion-search">
                                <span class="sr-only">Search</span>
                            </span>
                        </button>
                    </form>
                </div>
                <table id="dataTable">
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $appt= getAppointments();
                        if(mysqli_num_rows($appt) >0){
                            foreach($appt as $item)
                            {
                                $time = date('h:i A', strtotime($item['time']));
                                ?>
                                    <tr>
                                        <td>
                                            <a href="view-patient.php"><p class="name"><?= $item['Fname']; ?> <?= $item['Lname'] ?></p></a>
                                        </td>
                                        <td class="date"><?= $item['date']; ?></td>
                                        <td class="date"><?= $time; ?></td>
                                        <td><span class="status <?= $item['status']; ?>"><?= $item['status']; ?></span></td>
                                    </tr>

                                <?php

                            }

                        }else{
                            echo "<tr><td colspan ='4'>no appointments found</td></tr>";
                        }
                    ?>
                        <!--  
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="patient Image">
                                </a>
                                <a href="view-patient.php"><p class="name">Zeinab Hijazi</p></a>
                            </td>
                            <td class="date">15-08-2023</td>
                            <td><span class="status process">Processing</span></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            <!-- Reminders -->
            <div class="reminders">
                <div class="header">
                    <i class='bx bx-note'></i>
                    <h3>Reminders</h3>
                    <div id="reminderContainer" class="searchContainer">
                        <span id="searchIcon" onclick="toggleReminderBox()"><i class='bx bx-plus'></i></span>
                        <div id="reminderBox" class="reminderBox">
                            <form class="form" id="addReminderForm" action="functions/code.php"  method="post" enctype="multipart/form-data">
                                <label for="">
                                    <input class="input" type="text" id="reminderInput" name="reminderInput" required placeholder="">
                                    <span class="reminder" id="reminderInputError">reminder</span>
                                </label>
                                <button id="addReminderFormBtn" name="addReminderFormBtn" type="button" class="submit">ADD</button>
                            </form>
                        </div>
                    </div>
                </div>
                <ul class="task-list" id="reminders_list">
                <?php 
                        $reminders= getReminders();
                        if(mysqli_num_rows($reminders) >0){
                            foreach($reminders as $item)
                            {
                                $originalDate = $item['date'];
                                $dateTime = new DateTime($originalDate);
                                $formattedDate = $dateTime->format('Y-m-d H:i');

                                ?>
                                    <li class="completed">
                                        <div class="task-title">
                                            <i class='bx bx-timer'></i>
                                            <div>
                                                <p><?= $item['reminder']; ?></p>
                                                <p><?= $formattedDate; ?></p>
                                            </div>
                                        </div>
                                        <button class="delete_reminder_btn" value="<?= $item['reminderId']; ?>"><i class="bx bx-trash-alt"></i></button>
                                    </li>

                                <?php

                            }

                        }
                    ?>
                   
                    <!--  <li class="not-completed">
                        <div class="task-title">
                            <i class='bx bx-x-circle'></i>
                            <p>Play Footbal</p>
                        </div>
                        <i class='bx bx-dots-vertical-rounded'></i>
                    </li> -->
                </ul>
            </div>
            <!-- End of Reminders-->

        </div>

    </main>

<?php
    include('includes/footer.php');
?>
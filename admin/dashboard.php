<?php
    include('includes/header.php');
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
                        1,074
                    </h3>
                    <p>Clinics</p>
                </span>
            </li>
            <li><i class='bx bx-first-aid'></i>
                <span class="info">
                    <h3>
                        3,944
                    </h3>
                    <p>Doctors</p>
                </span>
            </li>
            <li><i class='bx bx-group'></i>
                <span class="info">
                    <h3>
                        14,721
                    </h3>
                    <p>Patients</p>
                </span>
            </li>
            <li><i class='bx bx-donate-blood'></i>
                <span class="info">
                    <h3>
                        6,742
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
                            <th>Appointment Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <!-- <img src="../images/profile-1.jpg"> -->
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="patient Image">
                                </a>
                                <a href="view-patient.php"><p class="name">Hussein Daher</p></a>
                            </td>
                            <td class="date">18-08-2023</td>
                            <td><span class="status completed">Completed</span></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="patient Image">
                                </a>
                                <a href="view-patient.php"><p class="name">Haya Tfaily</p></a>
                            </td>
                            <td class="date">17-08-2023</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="patient Image">
                                </a>
                                <a href="view-patient.php"><p class="name">Loreen Baker</p></a>
                            </td>
                            <td class="date">16-08-2023</td>
                            <td><span class="status process">Processing</span></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="patient Image">
                                </a>
                                <a href="view-patient.php"><p class="name">Zeinab Hijazi</p></a>
                            </td>
                            <td class="date">15-08-2023</td>
                            <td><span class="status process">Processing</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Reminders -->
            <div class="reminders">
                <div class="header">
                    <i class='bx bx-note'></i>
                    <h3>Remiders</h3>
                    <div id="reminderContainer" class="searchContainer">
                        <span id="searchIcon" onclick="toggleReminderBox()"><i class='bx bx-plus'></i></span>
                        <div id="reminderBox" class="reminderBox">
                            <form action="" class="form">
                                <label for="">
                                    <input class="input" type="text" id="searchInput" placeholder="Enter Reminders...">
                                    <span>reminder</span>
                                </label>
                                <button class="submit" onclick="performSearch()">ADD</button>
                            </form>
                        </div>
                    </div>
                </div>
                <ul class="task-list">
                    <li class="completed">
                        <div class="task-title">
                            <i class='bx bx-check-circle'></i>
                            <p>Start Our Meeting</p>
                        </div>
                        <i class='bx bx-dots-vertical-rounded'></i>
                    </li>
                    <li class="completed">
                        <div class="task-title">
                            <i class='bx bx-check-circle'></i>
                            <p>Analyse Our Site</p>
                        </div>
                        <i class='bx bx-dots-vertical-rounded'></i>
                    </li>
                    <li class="not-completed">
                        <div class="task-title">
                            <i class='bx bx-x-circle'></i>
                            <p>Play Footbal</p>
                        </div>
                        <i class='bx bx-dots-vertical-rounded'></i>
                    </li>
                </ul>
            </div>
            <!-- End of Reminders-->

        </div>

    </main>

<?php
    include('includes/footer.php');
?>
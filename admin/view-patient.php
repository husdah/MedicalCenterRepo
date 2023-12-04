<?php
    include('includes/header.php');
?>

    <main>
        <div class="header">
            <div class="left">
                <h1>View Patient</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            View Info
                        </a></li>
                    /
                    <li><a href="#" class="active">Appointments</a></li>
                </ul>
            </div>
            <a href="patients.php" class="report">
                <i class='bx bx-arrow-back'></i>
                <span>Back</span>
            </a>
        </div>

        <div class="bottom-data">
            <div class="orders">
                <div class="header">
                    <i class='bx bx-receipt'></i>
                    <h3>Previous Appts</h3>
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
                            <th>Doctor</th>
                            <th>Appointment Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="doctor Image">
                                </a>
                                <a href="edit-doctor.php"><p class="name">Hussein Daher</p></a>
                            </td>
                            <td class="date">17-08-2023</td>
                            <td><span class="status completed">Completed</span></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="doctor Image">
                                </a>
                                <a href="edit-doctor.php"><p class="name">Haya Tfaily</p></a>
                            </td>
                            <td class="date">16-08-2023</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="doctor Image">
                                </a>
                                <a href="edit-doctor.php"><p class="name">Loreen Baker</p></a>
                            </td>
                            <td class="date">15-08-2023</td>
                            <td><span class="status process">Processing</span></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="doctor Image">
                                </a>
                                <a href="edit-doctor.php"><p class="name">Zeinab Hijazi</p></a>
                            </td>
                            <td class="date">14-08-2023</td>
                            <td><span class="status process">Processing</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="orders reminders">
                <div class="header">
                    <i class='bx bx-user'></i>
                    <h3>Patient Data</h3>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Info</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-weight: bold;">Name</td>
                            <td>Hussein Daher</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Email</td>
                            <td>husdaher579@gmail.com</td>      
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Gender</td>
                            <td>Male</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Blood Type</td>
                            <td>A+</td>                     
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Date Of Birth</td>
                            <td>28-12-2001</td>                             
                            </tr>
                    </tbody>
                </table>
            </div>
    </main>

<?php
  include('includes/footer.php');
?>
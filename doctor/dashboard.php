<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Doctor Dashboard</title>
    <link rel="icon" href="/images/favicon.PNG" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <!-- Sidebar -->
    <?php
        include('./includes/sidebar.php');
    ?>
    <!-- End of Sidebar -->

     <!-- Main Content -->
     <div class="content">
        <div class="left-side">
        <div class="top">
       <h1>Dashboard</h1>
       <span class="currentDay" id="currentDay"></span>,<span class="currentDate" id="currentDate"></span>
       </div>
       <div class="banner">
        <div class="banner-img"><img src="../images/ban.png"></div>
        <div class="title"><h2>Welcome, dr. <span>Doctor</span></h2>
        <p>Have a nice day at work.</p></div>
       </div>

       <ul class="insights">
        <li>
            <i class='bx bx-group'></i>
            <span class="insight">
                <h3>
                    333
                </h3>
                <p>Patients</p>
            </span>
        </li>
        <li>
            <i class='bx bx-calendar-check'></i>
            <span class="insight">
                <h3>
                    52
                </h3>
                <p>Appointments</p>
            </span>
        </li>
        <li>
            <i class='bx bx-phone-call'></i>
            <span class="insight">
                <h3>
                    7
                </h3>
                <p>Consultations</p>
            </span>
        </li>
    </ul>

       
       <div class="request">
        <h4>Appointment Requests</h4>
        <table class="request-table">
            <thead>
            <tr>
                <th>Name of Patient</th>
                <th>Date</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
            </thead>
            <tr>
                <td>patient 1</td>
                <td>11/12/2023</td>
                <td>10:00 am</td>
                <td>
                    <button class="acc-btn"><i class='bx bx-check-circle'></i></button>
                    <button class="del-btn"><i class='bx bx-x-circle'></i></button>
                </td>
            </tr>
            <tr>
                <td>patient 2</td>
                <td>11/12/2023</td>
                <td>10:00 am</td>
                <td>
                    <button class="acc-btn"><i class='bx bx-check-circle'></i></button>
                    <button class="del-btn"><i class='bx bx-x-circle'></i></button>
                </td>
            </tr>
            <tr>
                <td>patient 3</td>
                <td>11/16/2023</td>
                <td>12:00 pm</td>
                <td>
                    <button class="acc-btn"><i class='bx bx-check-circle'></i></button>
                    <button class="del-btn"><i class='bx bx-x-circle'></i></button>
                </td>
            </tr>
            <tr>
                <td>patient 4</td>
                <td>11/20/2023</td>
                <td>13:00 pm</td>
                <td>
                    <button class="acc-btn"><i class='bx bx-check-circle'></i></button>
                    <button class="del-btn"><i class='bx bx-x-circle'></i></button>
                </td>
            </tr>
        </table>
       </div>
       </div>
       <div class="right">
        <div class="right-side">
            <div class="top">
            <h2>Patients</h2>
           <div class="filter">
            <input type="text" id="searchInput" placeholder="Search..."><i class='bx bx-search-alt-2'></i>
           </div>
           </div>
           <table class="appointments">
            <tr>
                <td>
                    <div class="info">
                    <h3 id="name">Name</h3>
                    <label><i class='bx bxs-phone' >Phone:</i><span id="phone">12345560</span></label>
                    <label><i class='bx bxs-envelope' ></i>Email:<span id="email">email@gmail.com</span></label>
                </div>  
                </td>
                <td>
                    <div class="view-btn">
                        <a href="patient.php"><button id="view" name="view">View</button></a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="info">
                    <h3 id="name">Name</h3>
                    <label><i class='bx bxs-phone' >Phone:</i><span id="phone">12345560</span></label>
                    <label><i class='bx bxs-envelope' ></i>Email:<span id="email">email@gmail.com</span></label>
                </div>  
                </td>
                <td>
                    <div class="view-btn">
                        <a href="patient.php"><button id="view" name="view">View</button></a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="info">
                    <h3 id="name">Name</h3>
                    <label><i class='bx bxs-phone' >Phone:</i><span id="phone">12345560</span></label>
                    <label><i class='bx bxs-envelope' ></i>Email:<span id="email">email@gmail.com</span></label>
                </div>  
                </td>
                <td>
                    <div class="view-btn">
                        <a href="patient.php"><button id="view" name="view">View</button></a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="info">
                    <h3 id="name">Name</h3>
                    <label><i class='bx bxs-phone' >Phone:</i><span id="phone">12345560</span></label>
                    <label><i class='bx bxs-envelope' ></i>Email:<span id="email">email@gmail.com</span></label>
                </div>  
                </td>
                <td>
                    <div class="view-btn">
                        <a href="patient.php"><button id="view" name="view">View</button></a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="info">
                    <h3 id="name">Name</h3>
                    <label><i class='bx bxs-phone' >Phone:</i><span id="phone">12345560</span></label>
                    <label><i class='bx bxs-envelope' ></i>Email:<span id="email">email@gmail.com</span></label>
                </div>  
                </td>
                <td>
                    <div class="view-btn">
                        <a href="patient.html"><button id="view" name="view">View</button></a>
                    </div>
                </td>
            </tr>
           </table>
        </div>
        </div>
     </div>
     <!-- End of Main Content-->

    <script src="assets/js/dashboard.js"></script>

</body>
</html>
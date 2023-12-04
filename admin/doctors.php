<?php
    include('includes/header.php');
?>

    <main>
        <div class="header">
            <div class="left">
                <h1>Manage Doctors</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            Register
                        </a></li>
                    /
                    <li><a href="#" class="active">View & Manage</a></li>
                </ul>
            </div>
            <a href="#" class="report">
                <i class='bx bx-receipt'></i>
                <span>View Appointments</span>
            </a>
        </div>

        <div class="bottom-data">
            <div class="orders">
                <div class="header">
                    <i class='bx bx-receipt'></i>
                    <h3>Registered Doctors</h3>
                    <form class="expanding-search-form">
                        <div class="search-dropdown">
                            <button class="button dropdown-toggle" type="button">
                            <span class="toggle-active">Doctor</span>
                            <span class="ion-arrow-down-b"></span>
                            </button>
                            <ul class="dropdown-menu">
                            <li class="menu-active"><a href="#">Doctor</a></li>
                            <li><a href="#">Clinic</a></li>
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
                            <th>Clinic</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="doctor Image">
                                </a>
                                <a href="edit-doctor.php"><p class="doctor">Hussein Daher</p></a>
                            </td>
                            <td class="clinic">Surgery</td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="doctor Image">
                                </a>
                                <a href="edit-doctor.php"><p class="doctor">Zeinab Hijazi</p></a>
                            </td>
                            <td class="clinic">Cardiology</td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="doctor Image">
                                </a>
                                <a href="edit-doctor.php"><p class="doctor">Haya Tfaily</p></a>
                            </td>
                            <td class="clinic">Surgery</td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="doctor Image">
                                </a>
                                <a href="edit-doctor.php"><p class="doctor">Loreen Baker</p></a>
                            </td>
                            <td class="clinic">Cardiology</td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Reminders -->
            <div class="reminders centerBox">
                <div class="header">
                    <i class='bx bx-first-aid'></i>
                    <h3>Create Doctor Account</h3>
                </div>
                <form class="form" id="addDoctorForm">
                    <p class="title">Register Doctor</p>
                    <p class="message">Please Enter The Needed Information. </p>
                    <div class="flex">
                        <label>
                            <input id="doctorFN" name="doctorFN" required placeholder="" type="text" class="input">
                            <span class="FirstName" id="doctorFNError">First name</span>
                        </label>
                
                        <label>
                            <input id="doctorLN" name="doctorLN" required placeholder="" type="text" class="input">
                            <span class="LastName" id="doctorLNError">Last name</span>
                        </label>
                    </div>  
                            
                    <label>
                        <input id="doctorEmail" name="doctorEmail" required placeholder="" type="email" class="input">
                        <span id="doctorEmailError">Email</span>
                    </label>

                    <label>
                        <select id="doctorClinic" name="doctorClinic" class="input s2" required>
                            <option value="clinic">Choose Profession</option>
                            <option value="Surgery">Surgery</option>
                            <option value="Cardiology">Cardiology</option>
                            <option value="Physio">Physio</option>
                            <option value="Dental">Dental</option>
                        </select>
                        <span id="doctorClinicError">Clinic</span>
                    </label> 
                        
                    <label>
                        <input id="doctorPass" name="doctorPass" required placeholder="" type="password" class="input">
                        <span id="doctorPassError" class="sm">Password</span>
                    </label>
                    <label>
                        <input id="doctorPassConfirm" name="doctorPassConfirm" required placeholder="" type="password" class="input">
                        <span id="doctorPassConfirmError">Confirm password</span>
                    </label>
                    <button id="addDoctorFormBtn" type="button" class="submit">Submit</button>
                </form>
            </div>
            <!-- End of Reminders-->

        </div>

    </main>

<?php
    include('includes/footer.php');
?>
<?php
    include('includes/header.php');
?>

    <main>
        <div class="header">
            <div class="left">
                <h1>Manage Patients</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            View list
                        </a></li>
                    /
                    <li><a href="#" class="active">Manage</a></li>
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
                    <h3>Patients</h3>
                    <form class="expanding-search-form">
                        <div class="search-dropdown">
                            <button class="button dropdown-toggle" type="button">
                                <span class="toggle-active">Name</span>
                                <span class="ion-arrow-down-b"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="menu-active"><a href="#">Name</a></li>
                                <li><a href="#">Date</a></li>
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
                            <th>Name</th>
                            <th>Registration Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="patient Image">
                                </a>
                                <a href="view-patient.php">
                                    <p class="name">Hussein Daher</p>
                                </a>
                            </td>
                            <td class="date">17-08-2023</td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="patient Image">
                                </a>
                                <a href="view-patient.php">
                                    <p class="name">Haya Tfaily</p>
                                </a>
                            </td>
                            <td class="date">16-08-2023</td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="patient Image">
                                </a>
                                <a href="view-patient.php">
                                    <p class="name">Zeinab Hijazi</p>
                                </a>
                            </td>
                            <td class="date">15-08-2023</td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="patient Image">
                                </a>
                                <a href="view-patient.php">
                                    <p class="name">Loreen Baker</p>
                                </a>
                            </td>
                            <td class="date">14-08-2023</td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Reminders -->
            <div class="reminders centerBox">
                <div class="header">
                    <i class='bx bx-group'></i>
                    <h3>Create Patient Account</h3>
                </div>
                <form class="form" id="addPatientForm">
                    <p class="title">Register Patient</p>
                    <p class="message">Please Enter The Needed Information. </p>
                    <div class="flex">
                        <label>
                            <input id="patientFN" name="patientFN" required placeholder="" type="text" class="input">
                            <span class="FirstName" id="patientFNError">First name</span>
                        </label>
                
                        <label>
                            <input id="patientLN" name="patientLN" required placeholder="" type="text" class="input">
                            <span class="LastName" id="patientLNError">Last name</span>
                        </label>
                    </div>
                    
                    <div class="flex2">
                        <label class="check-container" id="check_display">Male
                            <input checked required type="radio" name="gender" id="male" value="male"> 
                            <span class="checkmark"></span>
                        </label>

                        <label class="check-container" id="check_display">Female
                            <input type="radio" name="gender" id="female" value="female">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    
                    <label>Date OF Birth:
                        <input id="patientDOB" name="patientDOB" required placeholder="" type="date" class="input">
                        <p id="patientDOBError" class="imgError">DOB</p>
                    </label>

                    <label>
                        <select name="patientBT" id="patientBT" class="input">
                            <option value="BT">Blood Type</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        <span id="patientBTError">BT</span>
                    </label>

                    <div class="flex">
                        <label>
                            <input id="patientEmail" name="patientEmail" required placeholder="" type="email" id="firstInput" class="input req">
                            <span id="patientEmailError">Email</span>
                        </label>
                        <label>or</label>
                        <label>
                            <!-- pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" maxlength="12" -->
                            <input id="patientPhone" name="patientPhone" required placeholder="" type="tel" id="secondInput" class="input req">
                            <span id="patientPhoneError">Phone</span>
                        </label>
                    </div>
                        
                    <label>
                        <input id="patientPass" name="patientPass" required placeholder="" type="password" class="input req">
                        <span id="patientPassError" class="sm">Password</span>
                    </label>
                    <label>
                        <input id="patientPassConfirm" name="patientPassConfirm" required placeholder="" type="password" class="input req">
                        <span id="patientPassConfirmError">Confirm password</span>
                    </label>

                    <label class="check-container" id="check_display">Create Account
                        <input checked type="checkbox" name="account" id="account" value="account">
                        <span class="checkmark"></span>
                    </label>

                    <button id="addPatientFormBtn" type="button" class="submit">Submit</button>
                </form>
            </div>
            <!-- End of Reminders-->
        </div>
    </main>

<?php
    include('includes/footer.php');
?>
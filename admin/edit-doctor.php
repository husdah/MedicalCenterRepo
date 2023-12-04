<?php
    include('includes/header.php');
?>

    <main>
        <div class="header">
            <div class="left">
                <h1>Edit Doctor</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            Edit Profile
                        </a></li>
                    /
                    <li><a href="#" class="active">Manage WH</a></li>
                </ul>
            </div>
            <a href="doctors.php" class="report">
                <i class='bx bx-arrow-back'></i>
                <span>Back</span>
            </a>
        </div>

        <div class="bottom-data">
<!--                 <div class="orders">
                <div class="header">
                    <i class='bx bx-time'></i>
                    <h3>Manage WH</h3>
                    <form class="expanding-search-form">
                        <div class="search-dropdown">
                            <button class="button dropdown-toggle" type="button">
                            <span class="toggle-active">Sort By</span>
                            <span class="ion-arrow-down-b"></span>
                            </button>
                            <ul class="dropdown-menu">
                            <li><a href="#">Day</a></li>
                            <li><a href="#">Availability</a></li>
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
                <table>
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Available</th>
                            <th>Exception</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="">
                        <tr>
                            <td>Monday</td>
                            <td>
                                <label class="check-container" id="check_display" style="margin: 0 25px;">
                                    <input type="checkbox" name="available">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td class="form" style="background: transparent;">
                                <div class="flex">
                                    <label>
                                        <input required="" placeholder="" type="text" class="input">
                                        <span>reason</span>
                                    </label>
                                    <label>
                                        <input type="date" class="input">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td>
                                <label class="check-container" id="check_display" style="margin: 0 25px;">
                                    <input type="checkbox" name="available">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td class="form" style="background: transparent;">
                                <div class="flex">
                                    <label>
                                        <input required="" placeholder="" type="text" class="input">
                                        <span>reason</span>
                                    </label>
                                    <label>
                                        <input required="" placeholder="" type="date" class="input">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td>
                                <label class="check-container" id="check_display" style="margin: 0 25px;">
                                    <input type="checkbox" name="available">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td class="form" style="background: transparent;">
                                <div class="flex">
                                    <label>
                                        <input required="" placeholder="" type="text" class="input">
                                        <span>reason</span>
                                    </label>
                                    <label>
                                        <input required="" placeholder="" type="date" class="input">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td>
                                <label class="check-container" id="check_display" style="margin: 0 25px;">
                                    <input type="checkbox" name="available">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td class="form" style="background: transparent;">
                                <div class="flex">
                                    <label>
                                        <input required="" placeholder="" type="text" class="input">
                                        <span>reason</span>
                                    </label>
                                    <label>
                                        <input required="" placeholder="" type="date" class="input">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>
                                <label class="check-container" id="check_display" style="margin: 0 25px;">
                                    <input type="checkbox" name="available">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td class="form" style="background: transparent;">
                                <div class="flex">
                                    <label>
                                        <input required="" placeholder="" type="text" class="input">
                                        <span>reason</span>
                                    </label>
                                    <label>
                                        <input required="" placeholder="" type="date" class="input">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        </form>
                    </tbody>
                </table>
            </div> -->

            <div class="orders">
                <div class="header">
                    <i class='bx bx-time'></i>
                    <h3>Manage Exceptions</h3>
                    <form class="expanding-search-form">
                        <div class="search-dropdown">
                            <button class="button dropdown-toggle" type="button">
                            <span class="toggle-active">Day</span>
                            <span class="ion-arrow-down-b"></span>
                            </button>
                            <ul class="dropdown-menu">
                            <li class="menu-active"><a href="#">Day</a></li>
                            </ul>
                        </div>
                        <input class="search-input" id="global-search" type="search" placeholder="Search">
                        <button class="button search-button" type="button">
                            <span class="icon ion-search">
                                <span class="sr-only">Search</span>
                            </span>
                        </button>
                    </form>
                    <form class="form" style="background: transparent;">
                        <div class="flex3">     
                            <label>ADD Exception: </label>
                            <label>
                                <input required="" placeholder="" type="date" class="input">
                            </label>
                            <label>
                                <input required="" placeholder="" type="text" class="input">
                                <span>reason</span>
                            </label>
                            <button class="submit">ADD</button>
                        </div>
                        <!-- <button class="submit">ADD Exception</button> -->
                    </form>
                </div>
                <table id="dataTable" class="exceptionTable">
                    <thead>
                        <tr>
                            <th>Day</th>  
                            <th>Exception</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="" class="form">
                        <tr>
                            <td class="day">15-12-2023</td>
                            <td style="background: transparent;">
                                <div class="form" style="background: transparent;">
                                    <label>
                                        <input required="" placeholder="" type="text" class="input">
                                        <span>reason</span>
                                    </label>
                                </div>
                            </td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                        <tr>
                            <td class="day">12-12-2023</td>
                            <td>
                                <div class="form" style="background: transparent;">
                                    <label>
                                        <input required="" placeholder="" type="text" class="input">
                                        <span>reason</span>
                                    </label>
                                </div>
                            </td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                        <tr>
                            <td class="day">11-12-2023</td>
                            <td>
                                <div class="form" style="background: transparent;">
                                    <label>
                                        <input required="" placeholder="" type="text" class="input">
                                        <span>reason</span>
                                    </label>
                                </div>
                            </td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                        <tr>
                            <td class="day">9-12-2023</td>
                            <td>
                                <div class="form" style="background: transparent;">
                                    <label>
                                        <input required="" placeholder="" type="text" class="input">
                                        <span>reason</span>
                                    </label>
                                </div>
                            </td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                        <tr>
                            <td class="day">10-12-2023</td>
                            <td>
                                <div class="form" style="background: transparent;">
                                    <label>
                                        <input required="" placeholder="" type="text" class="input">
                                        <span>reason</span>
                                    </label>
                                </div>
                            </td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                        </form>
                    </tbody>
                </table>
            </div>

            <!-- Reminders -->
            <div class="reminders centerBox">
                <div class="header">
                    <i class='bx bx-pencil'></i>
                    <h3>Edit Doctor Account</h3>
                </div>
                <form class="form" id="editDoctorForm">
                    <p class="title">Update Info</p>
                    <p class="message">Please Enter The Needed Information. </p>
                    <div class="flex">
                        <label>
                            <input id="editDoctorFN" name="editDoctorFN" required placeholder="" type="text" class="input">
                            <span class="FirstName" id="editDoctorFNError">Firstname</span>
                        </label>
                
                        <label>
                            <input id="editDoctorLN" name="editDoctorLN" required placeholder="" type="text" class="input">
                            <span class="LastName" id="editDoctorLNError">Lastname</span>
                        </label>
                    </div>  
                            
                    <label>
                        <input id="editDoctorEmail" name="editDoctorEmail" required placeholder="" type="email" class="input">
                        <span id="editDoctorEmailError">Email</span>
                    </label> 
            
                    <label>
                        <select id="editDoctorClinic" name="editDoctorClinic" class="input s2" required>
                            <option value="clinic">Choose Profession</option>
                            <option value="Surgery">Surgery</option>
                            <option value="Cardiology">Cardiology</option>
                            <option value="Physio">Physio</option>
                            <option value="Dental">Dental</option>
                        </select>
                        <span id="editDoctorClinicError">Clinic</span>
                    </label> 
                        
                    <label>
                        <input id="editDoctorPass" name="editDoctorPass" required placeholder="" type="password" class="input">
                        <span id="editDoctorPassError" class="sm">Password</span>
                    </label>
                    <label>
                        <input id="editDoctorPassConfirm" name="editDoctorPassConfirm" required placeholder="" type="password" class="input">
                        <span id="editDoctorPassConfirmError">Confirm password</span>
                    </label>
                    <button id="editDoctorFormBtn" type="button" class="submit">Save Changes</button>
                </form>
            </div>
            <!-- End of Reminders-->

        </div>

    </main>

<?php
    include('includes/footer.php');
?>
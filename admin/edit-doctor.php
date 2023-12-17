<?php
    session_start();
    require("functions/myfunctions.php");
    include('includes/header.php');
?>

<?php
        if(isset($_GET['doctorId']))
        {
            $id = $_GET['doctorId'];

            $docName = "";
            $doctorName = getNameById($id);
            foreach($doctorName as $name)
            {
                $docName = $name['Fname'] ." " .$name['Lname'];
            }
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
                        <li><a href="#" class="active">dr. <?= $docName; ?></a></li>
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

            <!-- Reminders -->
            <div class="reminders centerBox">
                <div class="header">
                    <i class='bx bx-timer'></i>
                    <h3>Doctor WHours</h3>
                </div>
                <form class="form" id="manageDWHForm" action="functions/code.php"  method="post" enctype="multipart/form-data">
                    <p class="title">Manage WH</p>
                    <p class="message">Please Enter The Needed Information. </p>

                    <input id="manageDWHFormId" name="manageDWHFormId" value="<?= $id; ?>" required type="hidden">

                    <label>
                        <select name="DWHDay" id="DWHDay" class="input" required>
                            <option value="WHDay">Day</option>
                            <!-- <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thurday">Thurday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option> -->
                            <?php
                                $wDays = getWorkingDays();
                                if(mysqli_num_rows($wDays) >0){
                                    foreach($wDays as $item){
                                        ?>
                                        <option value="<?= $item['day']; ?>">
                                            <?= $item['day']; ?>
                                        </option>                                                           
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                        <span id="DWHDayError">WHD</span>
                    </label>

                    <div class="flex">
                        <label>From:
                            <input id="DWHFrom" name="DWHFrom" required placeholder="" type="time" class="input">
                            <p id="DWHFromError" class="imgError">From</p>
                        </label>
                
                        <label>To:
                            <input id="DWHTO" name="DWHTO" required placeholder="" type="time" class="input">
                            <p id="DWHTOError" class="imgError">To</p>
                        </label>
                    </div>                        
                    
                    <label class="check-container" id="check_display">Available
                        <input type="checkbox" name="available" id="available" checked>
                        <span class="checkmark"></span>
                    </label>

                    <button id="manageDWHFormBtn" type="button" class="submit">Submit</button>
                </form>
            </div>
            <!-- End of Reminders-->

                        <!-- Reminders -->
                        <div class="reminders centerBox">
                <div class="header">
                    <i class='bx bx-timer'></i>
                    <h3>Exception Hours</h3>
                </div>
                <form class="form" id="manageExceptionForm" action="functions/code.php"  method="post" enctype="multipart/form-data">
                    <p class="title">Working Exceptions</p>
                    <p class="message">ADD Exception:</p>

                    <input type="hidden" value="<?= $id; ?>" id="docId" name="docId">

                    
                    <label>Date:
                        <input id="exceptionDay" name="exceptionDay" placeholder="" required type="date" class="input">
                        <p id="exceptionDayError" class="imgError">From</p>
                    </label>
                    <div class="flex">
                        <label>From:
                            <input id="exceptionFrom" name="exceptionFrom" required placeholder="" type="time" class="input">
                            <p id="exceptionFromError" class="imgError">From</p>
                        </label>
                
                        <label>To:
                            <input id="exceptionTO" name="exceptionTO" required placeholder="" type="time" class="input">
                            <p id="exceptionTOError" class="imgError">To</p>
                        </label>
                    </div>               
                    
                    <label class="check-container" id="check_display">Available
                        <input type="checkbox" name="availableException" id="availableException" checked>
                        <span class="checkmark"></span>
                    </label>

                    <button id="manageExceptionFormBtn" type="button" class="submit">ADD</button>
                </form>
            </div>
            <!-- End of Reminders-->
    
                <!-- Reminders -->
                <div class="reminders centerBox">
                    <div class="header">
                        <i class='bx bx-pencil'></i>
                        <h3>Edit Doctor Account</h3>
                    </div>
                    <form class="form" id="editDoctorForm" action="functions/code.php"  method="post" enctype="multipart/form-data">
                        <p class="title">Update Info</p>
                        <p class="message">Please Enter The Needed Information. </p>

                        <?php
                            $doctorInfo = getDocInfoById($id);
                            if(mysqli_num_rows($doctorInfo) >0){
                                foreach($doctorInfo as $info){
                                    ?>
                                        <input type="hidden" value="<?= $id; ?>" id="editDoctorFormId" name="editDoctorFormId">
                                        <input type="hidden" value="<?= $info['userId']; ?>" id="editUserId" name="editUserId">
                                        <div class="flex">
                                            <label>
                                                <input id="editDoctorFN" name="editDoctorFN" value="<?= $info['Fname']; ?>" required placeholder="" type="text" class="input">
                                                <span class="FirstName" id="editDoctorFNError">Firstname</span>
                                            </label>
                                    
                                            <label>
                                                <input id="editDoctorLN" name="editDoctorLN" value="<?= $info['Lname']; ?>" required placeholder="" type="text" class="input">
                                                <span class="LastName" id="editDoctorLNError">Lastname</span>
                                            </label>
                                        </div>  

                                        <label>
                                            <select id="editDoctorClinic" name="editDoctorClinic" class="input s2" required>
                                                <option value="clinic">Choose Profession</option>
                                                <?php
                                                $clinics = getAll('clinic');
                                                if(mysqli_num_rows($clinics) >0){
                                                    foreach($clinics as $item){
                                                        ?>
                                                        <option value="<?= $item['clinicId']; ?>" <?php if($info['clinicId'] ==  $item['clinicId']){ echo "selected";}; ?>>
                                                            <?= $item['name']; ?>
                                                        </option>                                                           
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <span id="editDoctorClinicError">Clinic</span>
                                        </label> 
                                                
                                        <label>
                                            <input id="editDoctorEmail" name="editDoctorEmail" value="<?= $info['email']; ?>" required placeholder="" type="email" class="input">
                                            <span id="editDoctorEmailError">Email</span>
                                        </label>
                                        
                                        <label>
                                            <input id="editDoctorPhone" name="editDoctorPhone" value="<?= $info['phoneNumber']; ?>" required placeholder="" type="tel" class="input">
                                            <span id="editDoctorPhoneError">Phone</span>
                                        </label>
                                            
                                        <label>
                                            <input id="editDoctorPass" name="editDoctorPass" value="<?= $info['password']; ?>" required placeholder="" type="password" class="input">
                                            <span id="editDoctorPassError" class="sm">Password</span>
                                        </label>
                                        <label>
                                            <input id="editDoctorPassConfirm" name="editDoctorPassConfirm" value="<?= $info['password']; ?>" required placeholder="" type="password" class="input">
                                            <span id="editDoctorPassConfirmError">Confirm password</span>
                                        </label>
                                        <button id="editDoctorFormBtn" type="button" class="submit">Save Changes</button>
                                   
                                    <?php
                                }
                            }
                        ?>
                    </form>
                </div>
                <!-- End of Reminders-->
    
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
    <!--                     <form class="form" style="background: transparent;">
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
                        </form> -->
<!--                     <form class="form" id="manageExceptionForm" action="functions/code.php"  method="post" enctype="multipart/form-data">
                        <p class="title">Working Exceptions</p>
                        <p class="message">ADD Exception:</p>

                        <input type="hidden" value="<?= $id; ?>" id="docId" name="docId">

                        <div class="flex">
                            <label>Date:
                                <input id="exceptionDay" name="exceptionDay" placeholder="" required type="date" class="input">
                                <p id="exceptionDayError" class="imgError">From</p>
                            </label>
                            <label>From:
                                <input id="exceptionFrom" name="exceptionFrom" required placeholder="" type="time" class="input">
                                <p id="exceptionFromError" class="imgError">From</p>
                            </label>
                    
                            <label>To:
                                <input id="exceptionTO" name="exceptionTO" required placeholder="" type="time" class="input">
                                <p id="exceptionTOError" class="imgError">To</p>
                            </label>
                        </div>               
                        
                        <label class="check-container" id="check_display">Available
                            <input type="checkbox" name="availableException" id="availableException">
                            <span class="checkmark"></span>
                        </label>
    
                        <button id="manageExceptionFormBtn" type="button" class="submit">ADD</button>
                    </form> -->
                    </div>
                    <table id="dataTable" class="exceptionTable">
                        <thead>
                            <tr>
                                <th>Day</th>  
                                <th>From</th>  
                                <th>To</th>  
                                <th>Available</th>  
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $exception = getExceptionsById($id);
                            if(mysqli_num_rows($exception) >0){
                                foreach($exception as $item){

                                    $fromHour="00:00:00";
                                    $toHour = '00:00:00';
                                    if($item['fromHour'] != '00:00:00'){
                                        $fromHour = date('h:i A', strtotime($item['fromHour']));
                                    }
                                    if($item['toHour'] != '00:00:00'){
                                        $toHour = date('h:i A', strtotime($item['toHour']));
                                    }
                                    ?>
                                        <tr>
                                            <td><?= $item['date']; ?></td>
                                            <td><?= $fromHour; ?></td>
                                            <td><?= $toHour; ?></td>
                                            <td>
                                                <label class="check-container" id="check_display"><i class="bx bx-check"></i>   
                                                    <input disabled type="checkbox" name="av" <?php if($item['available'] == 1){ echo "checked";}; ?>>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <input class="drExId" type="hidden" value="<?= $id; ?>">
                                                <button class="btn-delete deleteWExceptionBtn" value="<?= $item['date']; ?>"><i class="bx bx-trash-alt"></i><span>Delete</span></button>
                                            </td>
                                        </tr>

                                    <?php
                                }
                            }else{
                                echo "<tr><td colspan ='5'>no exceptions found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
    
            </div>
    
        </main>

        <?php

        }else{
            die("Id Missing From url");
        }

?>

<?php
    include('includes/footer.php');
?>
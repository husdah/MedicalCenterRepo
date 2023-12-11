<?php
    session_start();
    include("functions/myfunctions.php");
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
                    <div class="filterContainer">
                        <form class="form" method="get">
                            <label>
                                <select name="doctorDisplay" id="doctorDisplay" onchange="this.form.submit()" class="input">
                                    <option value="0" <?php if(isset($_GET['doctorDisplay']) && $_GET['doctorDisplay'] == 0){echo "selected";} ?>>Active</option>
                                    <option value="1" <?php if(isset($_GET['doctorDisplay']) && $_GET['doctorDisplay'] == 1){echo "selected";} ?>>Inactive</option>
                                    <option value="2" <?php if(isset($_GET['doctorDisplay']) && $_GET['doctorDisplay'] == 2){echo "selected";} ?>>All</option>
                                </select>
                                <span>Doctors</span>
                            </label> 
                        </form>

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
                    <?php 
                        $doctors= getSpecificDoc(0);
                        if(isset($_GET['doctorDisplay'])){
                            if($_GET['doctorDisplay'] == 0 || $_GET['doctorDisplay'] == 1){$doctors= getSpecificDoc($_GET['doctorDisplay']);}
                            else if($_GET['doctorDisplay'] == 2){$doctors= getAll('doctor');}   
                        }
                        if(mysqli_num_rows($doctors) >0){
                            foreach($doctors as $item)
                            {
                                $docName= "";
                                $clinicName = "";
                                $profilePic = "";
                                $clinic = getClinicById($item['clinicId']);
                                foreach($clinic as $name)
                                {
                                    $clinicName = $name['name'];
                                }
                                $doctorName = getNameById($item['doctorId']);
                                foreach($doctorName as $name)
                                {
                                    $docName = $name['Fname'] ." " .$name['Lname'];
                                }
                                $profile = getProfilePicById($item['doctorId']);
                                foreach($profile as $pic)
                                {
                                    if($pic['profilePic'] == null){
                                        $profilePic = "docImgPlaceholder.jpg";
                                    }else{
                                        $profilePic = $pic['profilePic'];
                                    }
                                }
                                ?>
                                    <tr>
                                        <td>
                                            <a href="../uploads/<?= $profilePic; ?>" class="imageLB"> 
                                                <img src="../uploads/<?= $profilePic; ?>" alt="doctor Image">
                                            </a>
                                            <?php
                                             if($item['deleted'] == 0){
                                                ?>
                                                <a href="edit-doctor.php?doctorId=<?= $item['doctorId']; ?>"><p class="doctor"><?= $docName; ?></p></a>
                                                <?php
                                            }else if($item['deleted'] == 1){
                                                ?>
                                                <p class="doctor"><?= $docName; ?></p>
                                                <?php
                                            }

                                            ?>
                                        </td>
                                        <td class="clinic"><?= $clinicName; ?></td>
                                        <td>
                                            <?php
                                             if($item['deleted'] == 0){
                                                ?>
                                                <button class="btn-delete deleteDocBtn" value="<?= $item['doctorId']; ?>"><i class="bx bx-trash-alt"></i><span>Delete</span></button>
                                                <?php
                                            }else if($item['deleted'] == 1){
                                                ?>
                                                <button class="btn-delete restoreDocBtn" value="<?= $item['doctorId']; ?>"><i class="bx bx-refresh"></i><span>Restore</span></button>
                                                <?php
                                            }

                                            ?>
                                        </td>
                                    </tr>

                                <?php

                            }

                        }else{
                            echo "<tr><td colspan ='3'>no doctors found</td></tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>

            <!-- Reminders -->
            <div class="reminders centerBox">
                <div class="header">
                    <i class='bx bx-first-aid'></i>
                    <h3>Create Doctor Account</h3>
                </div>
                <form class="form" id="addDoctorForm" action="functions/code.php"  method="post" enctype="multipart/form-data">
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
                        <select id="doctorClinic" name="doctorClinic" class="input s2" required>
                            <option value="clinic">Choose Profession</option>
                            <?php
                                $clinics = getAll('clinic');
                                if(mysqli_num_rows($clinics) >0){
                                    foreach($clinics as $item){
                                        ?>
                                        <option value="<?= $item['clinicId']; ?>">
                                            <?= $item['name']; ?>
                                        </option>                                                           
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                        <span id="doctorClinicError">Clinic</span>
                    </label> 
                            
                    <label>
                        <input id="doctorEmail" name="doctorEmail" required placeholder="" type="email" class="input">
                        <span id="doctorEmailError">Email</span>
                    </label>

                    <label>
                        <input id="doctorPhone" name="doctorPhone" required placeholder="" type="tel" class="input">
                        <span id="doctorPhoneError">Phone</span>
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
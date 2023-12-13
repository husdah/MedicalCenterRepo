<?php
    session_start();
    include("functions/myfunctions.php");
    include('includes/header.php');
?>

    <main>
        <div class="header">
            <div class="left">
                <h1>Manage Working Hours</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            Choose Hours
                        </a></li>
                    /
                    <li><a href="#" class="active">Available Doctors</a></li>
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
                    <i class='bx bx-time'></i>
                    <h3>Medical Hours</h3>
<!--                     <form class="expanding-search-form">
                        <div class="search-dropdown">
                            <button class="button dropdown-toggle" type="button">
                            <span class="toggle-active">Name</span>
                            <span class="ion-arrow-down-b"></span>
                            </button>
                            <ul class="dropdown-menu">
                            <li class="menu-active"><a href="#">Name</a></li>
                            <li><a href="#">Day</a></li>
                            </ul>
                        </div>
                        <input class="search-input" id="global-search" type="search" placeholder="Search">
                        <button class="button search-button" type="button">
                            <span class="icon ion-search">
                                <span class="sr-only">Search</span>
                            </span>
                        </button>
                    </form>    -->                 
                </div>
                <table id="dataTable2">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $medicalHours= getMedHours();
                            if(mysqli_num_rows($medicalHours) >0){
                                foreach($medicalHours as $info)
                                {
                                    $fromHour="00:00:00";
                                    $toHour = '00:00:00';
                                    if($info['fromHour'] != '00:00:00'){
                                        $fromHour = date('h:i A', strtotime($info['fromHour']));
                                    }
                                    if($info['toHour'] != '00:00:00'){
                                        $toHour = date('h:i A', strtotime($info['toHour']));
                                    }
                                    ?>
                                        <tr>
                                            <td class="day"><?= $info['day']; ?></td>
                                            <td class="from"><?= $fromHour; ?></td>
                                            <td class="to"><?= $toHour; ?></td>
                                            <td>
                                                <label class="check-container" id="check_display">Closed
                                                    <input type="checkbox" disabled <?php if($info['closed'] == 1){echo "checked";}; ?>>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </td>
                                            <td><button class="btn-delete deleteMedHoursBtn" value="<?= $info['medHourId']; ?>"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                                        </tr>
                                    <?php
                                }
                            }
                            ?>
                    </tbody>
                </table>
            </div>

            <!-- Reminders -->
            <div class="reminders centerBox">
                <div class="header">
                    <i class='bx bx-timer'></i>
                    <h3>Medical Hours</h3>
                </div>
                <form class="form" id="manageWHForm" action="functions/code.php"  method="post" enctype="multipart/form-data">
                    <p class="title">Manage WH</p>
                    <p class="message">Please Enter The Needed Information. </p>
                    <label>
                        <select name="WHDay" id="WHDay" class="input" required>
                            <option value="WHDay">Day</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thurday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                        <span id="WHDayError">WHD</span>
                    </label>

                    <div class="flex">
                        <label>From:
                            <input id="WHFrom" name="WHFrom" required placeholder="" type="time" class="input">
                            <p id="WHFromError" class="imgError">From</p>
                        </label>
                
                        <label>To:
                            <input id="WHTO" name="WHTO" required placeholder="" type="time" class="input">
                            <p id="WHTOError" class="imgError">To</p>
                        </label>
                    </div>                        
                    
                    <label class="check-container" id="check_display">Closed
                        <input type="checkbox" name="closed" id="closed">
                        <span class="checkmark"></span>
                    </label>

                    <button id="manageWHFormBtn" type="button" class="submit">Submit</button>
                </form>
            </div>
            <!-- End of Reminders-->

            <div class="orders">
                <div class="header">
                    <i class='bx bx-time'></i>
                    <h3>Working Hours</h3>
                    <form class="expanding-search-form">
                        <div class="search-dropdown">
                            <button class="button dropdown-toggle" type="button">
                            <span class="toggle-active">Name</span>
                            <span class="ion-arrow-down-b"></span>
                            </button>
                            <ul class="dropdown-menu">
                            <li class="menu-active"><a href="#">Name</a></li>
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
                <table id="dataTable" class="whTable">
                    <thead>
                        <tr>
                            <th>Doctors</th>
                          <!--   <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Saturday</th>
                            <th>Sunday</th> -->
                            <?php
                                $wDays = getWorkingDays();
                                if(mysqli_num_rows($wDays) >0){
                                    foreach($wDays as $item){
                                        ?>
                                        <th><?= $item['day']; ?></th>                                                        
                                        <?php
                                    }
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $doctorHours= getDocWhours();
                            if(mysqli_num_rows($doctorHours) >0){
                                foreach($doctorHours as $info)
                                {
                                    $docName = $info['Fname'] ." " .$info['Lname'];
                                    $profilePic = "docImgPlaceholder.jpg";
/*                                     $fromHour = date('h:i A', strtotime($info['fromHour']));
                                    $toHour = date('h:i A', strtotime($info['toHour'])); */
                                    if($info['profilePic'] != null){
                                        $profilePic = $info['profilePic'];
                                    }
                                    ?>
                                        <tr>
                                            <td>
                                                <a href="../uploads/<?= $profilePic; ?>" class="imageLB"> 
                                                    <img src="../uploads/<?= $profilePic; ?>" alt="doctor Image">
                                                </a>
                                                <a href="edit-doctor.php?doctorId=<?= $info['doctorId']; ?>"><p class="name"><?= $docName; ?></p></a>
                                            </td>
                                            <?php
                                                $wHours = getDocWhours2($info['doctorId']);
                                                if(mysqli_num_rows($wHours) >0){
                                                    foreach($wHours as $item){
                                                        $fromHour="00:00:00";
                                                        $toHour = '00:00:00';
                                                        $dispaly = false;
                                                        if($item['fromHour'] != '00:00:00'){
                                                            $fromHour = date('h:i A', strtotime($item['fromHour']));
                                                        }
                                                        if($item['toHour'] != '00:00:00'){
                                                            $toHour = date('h:i A', strtotime($item['toHour']));
                                                        }
                                                        foreach($wDays as $day){
                                                            if($item['day'] == $day['day']){
                                                                $dispaly = true;
                                                            }
                                                        }
                                                        if($dispaly){
                                                        ?>
                                                        <td>
                                                            <label class="check-container" id="check_display">
                                                                <div class="col">
                                                                    <span><?= $fromHour; ?></span>
                                                                    <span><?= $toHour; ?></span>
                                                                </div>
                                                                <input type="checkbox" disabled <?php if($item['available'] == 1){echo "checked";};?>>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </td>                                                        
                                                        <?php
                                                        }
                                                    }
                                                }
                                            ?>
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>

    </main>

<?php
  include('includes/footer.php');
?>
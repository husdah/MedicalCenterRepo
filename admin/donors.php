<?php
    session_start();
    include("functions/myfunctions.php");
    include('includes/header.php');
?>

    <main>
        <div class="header">
            <div class="left">
                <h1>Manage Donors</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            View Donors
                        </a></li>
                    /
                    <li><a href="#" class="active">Add blood type</a></li>
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
                    <h3>Possible Donors</h3>
                    <form class="expanding-search-form">
                        <div class="search-dropdown">
                            <button class="button dropdown-toggle" type="button">
                            <span class="toggle-active">Info</span>
                            <span class="ion-arrow-down-b"></span>
                            </button>
                            <ul class="dropdown-menu">
                            <li class="menu-active"><a href="#">Info</a></li>
                            <li><a href="#">BloodType</a></li>
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
                            <th>Donor Info</th>
                            <th>Blood Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $donors= getAll('donor');
                        if(mysqli_num_rows($donors) >0){
                            foreach($donors as $item)
                            {
                                $email = $item['email'];
                                $phone = $item['phoneNumber'];
                                $contact= "";
                                if($email != ""){
                                    $contact = $email;
                                }else if($phone != ""){
                                    $contact = $phone;
                                }
                                ?>
                                    <tr>
                                        <td>
                                            <p class="info"><?= $contact; ?></p>
                                        </td>
                                        <td class="bloodtype"><?= $item['bloodType']; ?></td>
                                        <td><button class="btn-delete deleteDonorBtn" value="<?= $item['donorId']; ?>"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                                    </tr>
                                <?php
                            }
                        }else{
                            echo "<tr><td colspan ='3'>no donors found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Reminders -->
            <div class="reminders centerBox">
                <div class="header">
                    <i class='bx bx-donate-blood'></i>
                    <h3>Urgent Blood Type</h3>
                </div>
                <form class="form" id="urgentBloodTypeForm" action="functions/code.php"  method="post" enctype="multipart/form-data">
                    <p class="title">ADD Needed Blood Type </p>
                    <p class="message">Please Enter The Needed Information. </p>
                    <label>
                        <select name="urgentBT" id="urgentBT" class="input" required>
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
                        <span id="urgentBTError">BT</span>
                    </label>
            
                    <label>
                        <input id="urgentBTN" name="urgentBTN" required placeholder="" type="number" min="0" class="input">
                        <span id="urgentBTNError">Number Needed</span>
                    </label>
                    <button id="urgentBloodTypeFormBtn" type="button" class="submit">Submit</button>
                </form>
            </div>
            <!-- End of Reminders-->

            <div class="orders">
                <div class="header">
                    <i class='bx bx-receipt'></i>
                    <h3>Urgent BloodTypes</h3>
                    <form class="expanding-search-form">
                        <div class="search-dropdown">
                            <button class="button dropdown-toggle" type="button">
                            <span class="toggle-active">bloodType</span>
                            <span class="ion-arrow-down-b"></span>
                            </button>
                            <ul class="dropdown-menu">
                            <li class="menu-active"><a href="#">bloodType</a></li>
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
                <table id="dataTable2">
                    <thead>
                        <tr>
                            <th>Blood Type</th>
                            <th>Number Needed</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $urgentBT= getAll('urgentbt');
                        if(mysqli_num_rows($urgentBT) >0){
                            foreach($urgentBT as $item)
                            {
                                ?>
                                    <tr>
                                        <td class="bloodtype"><?= $item['bloodType']; ?></td>
                                        <td>
                                            <p><?= $item['number']; ?></p>
                                        </td>
                                        <td><button class="btn-delete deleteUrgentBTBtn" value="<?= $item['urgentBTId']; ?>"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                                    </tr>
                                <?php
                            }
                        }else{
                            echo "<tr><td colspan ='3'>no Urgent BloodTypes found</td></tr>";
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
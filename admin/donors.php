<?php
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
                            <span class="toggle-active">Name</span>
                            <span class="ion-arrow-down-b"></span>
                            </button>
                            <ul class="dropdown-menu">
                            <li class="menu-active"><a href="#">Name</a></li>
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
                            <th>Donor</th>
                            <th>Blood Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="donor Image">
                                </a>
                                <a href="view-patient.php"><p class="name">Hussein Daher</p></a>
                            </td>
                            <td class="bloodtype">A+</td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="donor Image">
                                </a>
                                <a href="view-patient.php"><p class="name">Zeinab Hijazi</p></a>
                            </td>
                            <td class="bloodtype">O+</td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="donor Image">
                                </a>
                                <a href="view-patient.php"><p class="name">Haya Tfaily</p></a>
                            </td>
                            <td class="bloodtype">O-</td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="donor Image">
                                </a>
                                <a href="view-patient.php"><p class="name">Loreen Baker</p></a>
                            </td>
                            <td class="bloodtype">A+</td>
                            <td><button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Reminders -->
            <div class="reminders centerBox">
                <div class="header">
                    <i class='bx bx-donate-blood'></i>
                    <h3>Urgent Blood Type</h3>
                </div>
                <form class="form" id="urgentBloodTypeForm">
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

        </div>

    </main>

<?php
    include('includes/footer.php');
?>
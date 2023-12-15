<?php
    session_start();
    require("functions/myfunctions.php");
    include('includes/header.php');
?>

<?php
        if(isset($_GET['userId']))
        {
            $id = $_GET['userId'];

            $patientName = "";
            $userInfo = getPatientInfoById($id);
            foreach($userInfo as $info)
            {
                $patientName = $info['Fname'] ." " .$info['Lname'];

                ?>

                <main>
                <div class="header">
                    <div class="left">
                        <h1>View Patient</h1>
                        <ul class="breadcrumb">
                            <li><a href="#">
                                    View Info
                                </a></li>
                            ->
                            <li><a href="#" class="active"><?= $patientName; ?></a></li>
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
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $appoints = getAppByPatient($info['patientId']);
                                if(mysqli_num_rows($appoints) >0){
                                    foreach($appoints as $app){

                                        $docName = $app['fname'] ." " .$app['lname'];
                                        $profilePic = "docImgPlaceholder.jpg";
                                        $time = date('h:i A', strtotime($app['time']));
                                        if($app['profilePic'] != null){
                                            $profilePic = $app['profilePic'];
                                        }
                                        ?>
                                            <tr>
                                                <td>
                                                    <a href="../uploads/<?= $profilePic; ?>" class="imageLB"> 
                                                        <img src="../uploads/<?= $profilePic; ?>" alt="doctor Image">
                                                    </a>
                                                    <a href="edit-doctor.php?doctorId=<?= $app['doctorId']; ?>"><p class="name"><?= $docName; ?></p></a>
                                                </td>
                                                <td class="date"><?= $app['date']; ?></td>
                                                <td><?= $time; ?></td>
                                                <td><span class="status <?= $app['status']; ?>"><?= $app['status']; ?></span></td>
                                            </tr>
                                        <?php
                                    }
                                }else{
                                    echo "<tr><td colspan ='4'>no appointments found</td></tr>";
                                }
                                ?>
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
                                    <td><?= $patientName; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Email</td>
                                    <td><?= $info['email']; ?></td>      
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Phone</td>
                                    <td><?= $info['phoneNumber']; ?></td>      
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Gender</td>
                                    <td><?= $info['gender']; ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Blood Type</td>
                                    <td><?= $info['bloodType']; ?></td>                     
                                </tr>
                                <tr>
                                    <td style="font-weight: bold;">Date Of Birth</td>
                                    <td><?= $info['dateOfBirth']; ?></td>                             
                                    </tr>
                            </tbody>
                        </table>
                    </div>
            </main>

            <?php
            }

    }else{
        die("Id Missing From url");
    }

?>

<?php
  include('includes/footer.php');
?>
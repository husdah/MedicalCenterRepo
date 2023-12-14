<?php
    session_start();
    require("functions/myfunctions.php");
    include('includes/header.php');
?>

    <main>
        <div class="header">
            <div class="left">
                <h1>Manage Clinics</h1>
                <ul class="breadcrumb">
                    <li><a href="#">
                            ADD
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
                    <h3>Available Clinics</h3>
                    <form class="expanding-search-form">
                        <div class="search-dropdown">
                            <button class="button dropdown-toggle" type="button">
                            <span class="toggle-active">Name</span>
                            <span class="ion-arrow-down-b"></span>
                            </button>
                            <ul class="dropdown-menu">
                            <li class="menu-active"><a href="#">Name</a></li>
                            <!-- <li><a href="#">date</a></li> -->
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
                            <th>Image</th>
                            <th>Icon</th>
                            <th class="action_center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $clinics= getAll('clinic');
                        if(mysqli_num_rows($clinics) >0){
                            foreach($clinics as $item)
                            {
                                ?>
                                    <tr>
                                        <td class="ClinicNameRow"><p class="name"><?= $item['name']; ?></p></td>
                                        <td class="ClinicImgRow">
                                            <a href="/../uploads/<?= $item['photo']; ?>" class="imageLB"> 
                                                <img src="/../uploads/<?= $item['photo']; ?>" alt="category Image">
                                            </a>
                                        </td>
                                        <td class="ClinicIconRow">
                                            <a href="/../uploads/<?= $item['icon']; ?>" class="imageLB"> 
                                                <img src="/../uploads/<?= $item['icon']; ?>" alt="category Image">
                                            </a>
                                        </td>
                                        <td class="action_center">
                                            <input  class="desc" type="hidden" value="<?= $item['description']; ?>">
                                            <button class="btn-edit editClinic" id="edit" value="<?= $item['clinicId']; ?>"><i class="bx bx-edit"></i><span>Edit</span></button>
                                            <button class="btn-delete deleteClinicBtn" value="<?= $item['clinicId']; ?>"><i class="bx bx-trash-alt"></i><span>Delete</span></button>
                                        </td>
                                     </tr>

                                <?php

                            }

                        }else{
                            echo "<tr><td colspan ='3'>no clinics found</td></tr>";
                        }
                    ?>
   <!--                      <tr>
                            <td><a href="#clinicEdit"><p class="name">Cardiology</p></a></td>
                            <td>
                                <a href="../images/profile-1.jpg" class="imageLB"> 
                                    <img src="../images/profile-1.jpg" alt="category Image">
                                </a>
                            </td>
                            <td class="action_center">
                                <button class="btn-edit" id="edit" value="1"><i class="bx bx-edit"></i><span>Edit</span></button>
                                <button class="btn-delete"><i class="bx bx-trash-alt"></i><span>Delete</span></button>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            <!-- Reminders -->
            <div class="reminders view" id="clinicAdd">
                <div class="header">
                    <i class='bx bx-clinic'></i>
                    <h3 id="FormTitle">ADD Clinic</h3>
                </div>
                <form class="form" id="addClinicForm" action="functions/code.php"  method="post" enctype="multipart/form-data">
                    <p class="title">Fill The Form</p>
                    <p class="message">Please Enter The Needed Information. </p>

                    <label>
                        <input id="clinicName" name="clinicName" required placeholder="" type="text" class="input">
                        <span class="clinicName" id="clinicNameError">Clinic name</span>
                    </label>           
                    <label>
                        <textarea class="input" name="clinicDesc" id="clinicDesc" required cols="30" rows="5" maxlength="50" placeholder="Enter Description"></textarea>
                        <p class="description" id="clinicDescError">Counter</p>
                    </label> 
                    <label>
                        Image:
                        <input id="clinicImg" name="clinicImg" required="" placeholder="Upload Image" type="file" accept="image/*" class="input">
                        <p id="clinicImgError" class="imgError">error</p>
                    </label>
                    <label>
                        Icon:
                        <input id="clinicIcon" name="clinicIcon" required="" placeholder="Upload Image" type="file" accept="image/*" class="input">
                        <p id="clinicIconError" class="imgError">error</p>
                    </label>  
                    <button id="addClinicFormBtn" name="addClinicFormBtn" type="button" class="submit">Submit</button>
                </form>
            </div>
            <!-- End of Reminders-->


            <!-- Reminders -->
            <div class="reminders hide" id="clinicEdit">
            <div class="header">
                <i class='bx bx-pencil'></i>
                <h3>Edit Clinic</h3>
                <i id="viewAddForm" class='bx bx-plus'></i>
            </div>
            <form class="form" id="editClinicForm" action="functions/code.php"  method="post" enctype="multipart/form-data">
                <p class="title">Fill The Form</p>
                <p class="message">Please Enter The Needed Information. </p>
                <input type="hidden" value="" id="editClinicFormId" name="editClinicFormId">
                <label>
                    <input id="editClinicName" name="editClinicName" required placeholder="" type="text" class="input">
                    <span class="clinicName" id="editClinicNameError">Clinic name</span>
                </label>           
                <label>
                    <textarea id="editClinicDesc" name="editClinicDesc" class="input" name="description" required cols="30" rows="5" maxlength="50" placeholder="Enter Description"></textarea>
                    <p id="editClinicDescError">Counter</p>
                </label> 
                <label>
                    <input  id="editClinicImg" name="editClinicImg" placeholder="Upload Image" type="file" class="input">
                    <p id="editClinicImgError" class="imgError">error</p>
                </label>
                <label for=""><span>Current Image</span></label>
                <label>
                    <input type="hidden" id="old_image" name="old_image" value="">
                    <a href="" class="imageLB" id="oldClinicImgDisplayer"> 
                        <img id="oldClinicImg" name="oldClinicImg" src="" height="50px" width="50px" alt="category Image">
                    </a>    
                </label>
                <label>
                    Icon:
                    <input id="editClinicIcon" name="editClinicIcon" required="" placeholder="Upload Image" type="file" accept="image/*" class="input">
                    <p id="editClinicIconError" class="imgError">error</p>
                </label>
                <label for=""><span>Current Icon</span></label>
                <label>
                    <input type="hidden" id="old_icon" name="old_icon" value="">
                    <a href="" class="imageLB" id="oldClinicIconDisplayer"> 
                        <img id="oldClinicIcon" name="oldClinicIcon" src="" height="50px" width="50px" alt="category Image">
                    </a>    
                </label>  
                <button id="editClinicFormBtn" name="editClinicFormBtn" type="button" class="submit">Save Changes</button>
            </form>
        </div>
        <!-- End of Reminders-->


        </div>

    </main>

<?php
    include('includes/footer.php');
?>
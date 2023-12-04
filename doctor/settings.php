<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Doctor Dashboard</title>
    <link rel="icon" href="/images/favicon.PNG" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/css/settingscss.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <!-- Sidebar -->
    <?php
        include('./includes/sidebar.php');
    ?>
    <!-- End of Sidebar -->

    <div class="mainContent">
        <div class="center">
        <h2>Settings</h2>
       <div class="title">
        <div class="title1">
            <img src="../images/dr1.jpg" alt="">
            <i class="fa-solid fa-camera"></i>
        </div>
        <div class="title2">
            <div class="title2i">
                <input type="text" name="dname" id="dname" value="Doctor Name">
                <i class="fa-solid fa-pen"></i>
            </div>
            <div class="title2i">
                <input type="text" name="dclinic" id="dclinic" value="Cardiology">
                <i class="fa-solid fa-pen"></i>
            </div>
        </div>
       </div>
       <div class="changepass">
        <h3>Do you want to change the passsword?</h3>
        <form id="formsubmit">
            <div id="forpass1">
                <div class="div" id="div1">
            <label for="cpass">Current Password:</label> <input type="text" name="cpass" id="cpass">
        </div>
            </div>
            <div id="forpass2">
                <div class="div" id="div2">
            <label for="cpass">New password:</label> <input type="text" name="npass" id="npass">
                </div>
            </div>
            <div id="forpass3">
                <div class="div" id="div3">
            <label for="cpass">Re-type new password:</label> <input type="text" name="rnpass" id="rnpass">
                </div>
            </div>
            <div class="submit">
                <input type="submit" value="change" name="submit" id="submit">
            </div>
            
        </form>
       </div>
    </div>
    </div>
    
    <!-- <script src="assets/js/dashboard.js"></script> -->
    <script src="assets/js/settings.js"></script>
 </body>
</html>